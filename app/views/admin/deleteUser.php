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
    $id = $_POST['id'];
    $message = $auth->deleteUser($id);
}
?>