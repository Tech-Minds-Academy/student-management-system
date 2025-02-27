<?php
session_start();
require_once '../config/Database.php';
require_once '../models/User.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit();
}

if (!isset($_FILES['profile_picture'])) {
    echo json_encode(['success' => false, 'message' => 'No file uploaded']);
    exit();
}

$file = $_FILES['profile_picture'];
$allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
$max_size = 5 * 1024 * 1024; // 5MB

// Validate file
if (!in_array($file['type'], $allowed_types)) {
    echo json_encode(['success' => false, 'message' => 'Invalid file type']);
    exit();
}

if ($file['size'] > $max_size) {
    echo json_encode(['success' => false, 'message' => 'File too large']);
    exit();
}

// Generate unique filename
$extension = pathinfo($file['name'], PATHINFO_EXTENSION);
$filename = uniqid('profile_') . '.' . $extension;
$upload_path = '../assets/images/profiles/' . $filename;

// Create directory if it doesn't exist
if (!file_exists('../assets/images/profiles/')) {
    mkdir('../assets/images/profiles/', 0777, true);
}

// Move file
if (move_uploaded_file($file['tmp_name'], $upload_path)) {
    $database = new Database();
    $db = $database->getConnection();
    $user = new User($db);
    
    // Update database
    $query = "UPDATE users SET profile_picture = ? WHERE id = ?";
    $stmt = $db->prepare($query);
    
    if ($stmt->execute([$filename, $_SESSION['user_id']])) {
        $_SESSION['profile_picture'] = $filename;
        echo json_encode(['success' => true, 'message' => 'Profile picture updated']);
    } else {
        unlink($upload_path); // Delete uploaded file
        echo json_encode(['success' => false, 'message' => 'Database update failed']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'File upload failed']);
} 