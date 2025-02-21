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
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $auth->updateUser($id, $first_name, $last_name, $email, $phone);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Update User</h2>
        <?php if ($message) { echo "<p>$message</p>"; } ?>
        <form method="POST">
            <div class="name">
                <input type="hidden" name="id" placeholder="User ID" required>
            </div>
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
            <button id="update" type="submit" name="update" class="btn">Update User</button>
        </form>
    </div>
</body>
</html>