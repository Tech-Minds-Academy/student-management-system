<!-- Logout session -->
<?php
include '../controllers/AuthController.php';
$auth = new AuthController();
$auth->logout();
?>