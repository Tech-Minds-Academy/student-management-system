<!-- Logout session -->
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

session_destroy();
header("Location: ../views/login.php");
include '../controllers/AuthController.php';
$auth = new AuthController();
$auth->logout();
exit();
?>