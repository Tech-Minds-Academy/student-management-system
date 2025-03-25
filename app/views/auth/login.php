<?php
session_start();
include '../../config/database.php';
include '../../controllers/AuthController.php';

$auth = new AuthController();
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $message = $auth->login($email, $password);
}
?>