<?php
session_start();
require_once '../config/Database.php';
require_once '../models/User.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit();
}

$database = new Database();
$db = $database->getConnection();

// Get recent activities
$query = "SELECT activity_type, created_at 
          FROM user_activity_log 
          WHERE user_id = ? 
          ORDER BY created_at DESC 
          LIMIT 10";

$stmt = $db->prepare($query);
$stmt->execute([$_SESSION['user_id']]);
$activities = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($activities); 