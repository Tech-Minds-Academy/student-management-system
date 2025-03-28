<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['email']) || $_SESSION['role'] != 'admin') {
    header("Location: ../../auth/login.php");
    exit();
}

require_once __DIR__ . '/../../controllers/AdminAuthController.php';

$auth = new AdminAuthController();
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $message = $auth->register($first_name, $last_name, $email, $phone, $password, $role);
}
?>