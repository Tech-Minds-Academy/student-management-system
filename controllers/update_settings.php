<?php
session_start();
require_once '../config/Database.php';
require_once '../models/User.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit();
}

// Get JSON input
$data = json_decode(file_get_contents('php://input'), true);

if (!$data) {
    echo json_encode(['success' => false, 'message' => 'Invalid input']);
    exit();
}

$database = new Database();
$db = $database->getConnection();
$user = new User($db);

$valid_updates = [];

// Validate font size
if (isset($data['font_size'])) {
    $allowed_sizes = ['small', 'medium', 'large'];
    if (in_array($data['font_size'], $allowed_sizes)) {
        $valid_updates['font_size'] = $data['font_size'];
    }
}

// Validate background color
if (isset($data['background_color'])) {
    if (preg_match('/^#[a-f0-9]{6}$/i', $data['background_color'])) {
        $valid_updates['background_color'] = $data['background_color'];
    }
}

if (empty($valid_updates)) {
    echo json_encode(['success' => false, 'message' => 'No valid updates']);
    exit();
}

// Update settings
$query = "UPDATE user_settings SET ";
$params = [];
foreach ($valid_updates as $key => $value) {
    $query .= "$key = ?, ";
    $params[] = $value;
}
$query = rtrim($query, ', ');
$query .= " WHERE user_id = ?";
$params[] = $_SESSION['user_id'];

$stmt = $db->prepare($query);

if ($stmt->execute($params)) {
    echo json_encode(['success' => true, 'message' => 'Settings updated']);
} else {
    echo json_encode(['success' => false, 'message' => 'Update failed']);
} 