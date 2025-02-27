<?php
require_once '../includes/session.php';
require_once '../config/database.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit();
}

$response = ['success' => false];

try {
    if (!isset($_FILES['profile_picture'])) {
        throw new Exception('No file uploaded');
    }

    $file = $_FILES['profile_picture'];
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    
    if (!in_array($file['type'], $allowed_types)) {
        throw new Exception('Invalid file type. Only JPG, PNG and GIF are allowed.');
    }

    // Create uploads directory if it doesn't exist
    $upload_dir = '../uploads/profile_pictures/';
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Generate unique filename
    $filename = uniqid('profile_') . '_' . basename($file['name']);
    $target_path = $upload_dir . $filename;

    if (move_uploaded_file($file['tmp_name'], $target_path)) {
        // Delete old profile picture if exists
        $stmt = $conn->prepare("SELECT profile_picture FROM users WHERE id = ?");
        $stmt->execute([$_SESSION['user_id']]);
        $old_picture = $stmt->fetchColumn();
        
        if ($old_picture && file_exists('../' . $old_picture)) {
            unlink('../' . $old_picture);
        }

        // Update database with new profile picture path
        $relative_path = 'uploads/profile_pictures/' . $filename;
        $stmt = $conn->prepare("UPDATE users SET profile_picture = ? WHERE id = ?");
        $stmt->execute([$relative_path, $_SESSION['user_id']]);

        // Update session
        $_SESSION['profile_picture'] = $relative_path;
        
        $response['success'] = true;
        $response['profile_picture'] = $relative_path;
    } else {
        throw new Exception('Failed to move uploaded file');
    }

} catch (Exception $e) {
    $response['error'] = $e->getMessage();
}

echo json_encode($response);
?> 