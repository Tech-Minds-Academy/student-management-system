<?php
// Check if a session is already started before calling session_start()
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

include '../config/database.php';
include '../controllers/AuthController.php';

$auth = new AuthController();
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $message = $auth->createUser($first_name, $last_name, $email, $phone, $password);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Create User</h2>
        <?php if ($message) { echo "<p>$message</p>"; } ?>
        <form method="POST">
            <div class="name">
                <input type="text" name="first_name" placeholder="First Name" required>
            </div>
            <div class="name">
                <input type="text" name="last_name" placeholder="Last Name" required>
            </div>
            <div class="name">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="name">
                <input type="text" name="phone" placeholder="Phone" required>
            </div>
            <div class="password-container">
                <input type="password" name="password" id="password" placeholder="Password" required>
                <span class="toggle-password" onclick="togglePassword()">👁</span>
            </div>
            <button id="create" type="submit" name="create" class="btn">Create User</button>
        </form>
    </div>
    <script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }
    </script>
</body>
</html>