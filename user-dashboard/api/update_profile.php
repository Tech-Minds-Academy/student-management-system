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
    $data = json_decode(file_get_contents('php://input'), true);
    
    if (isset($data['username']) || isset($data['email'])) {
        $updates = [];
        $params = [];
        
        if (isset($data['username'])) {
            $updates[] = "name = ?";
            $params[] = $data['username'];
        }
        
        if (isset($data['email'])) {
            // Check if email is already taken
            $stmt = $conn->prepare("SELECT id FROM users WHERE email = ? AND id != ?");
            $stmt->execute([$data['email'], $_SESSION['user_id']]);
            if ($stmt->fetch()) {
                throw new Exception('Email already in use');
            }
            
            $updates[] = "email = ?";
            $params[] = $data['email'];
        }
        
        $params[] = $_SESSION['user_id'];
        
        $sql = "UPDATE users SET " . implode(", ", $updates) . " WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        
        if ($stmt->rowCount() > 0) {
            // Update session data
            if (isset($data['username'])) {
                $_SESSION['username'] = $data['username'];
                $response['username'] = $data['username'];
            }
            if (isset($data['email'])) {
                $_SESSION['email'] = $data['email'];
                $response['email'] = $data['email'];
            }
            $response['success'] = true;
        } else {
            throw new Exception('No changes made');
        }
    }
} catch (Exception $e) {
    $response['error'] = $e->getMessage();
}

echo json_encode($response);
?> 