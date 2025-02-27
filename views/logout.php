<?php
session_start();

// Log the logout activity if user was logged in
if (isset($_SESSION['user_id'])) {
    require_once '../config/Database.php';
    require_once '../models/User.php';
    
    $database = new Database();
    $db = $database->getConnection();
    $user = new User($db);
    
    $user->logActivity($_SESSION['user_id'], 'logout');
}

// Clear all session variables
$_SESSION = array();

// Destroy the session cookie
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-3600, '/');
}

// Destroy the session
session_destroy();

// Redirect to login page
header("Location: login.php");
exit();
?> 