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
    $message = $auth->deleteUser($id);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Delete User</h2>
        <?php if ($message) { echo "<p>$message</p>"; } ?>
        <form method="POST">
            <div class="name">
                <input type="text" name="id" placeholder="User ID" required>
            </div>
            <button id="delete" type="submit" name="delete" class="btn">Delete User</button>
        </form>
    </div>
</body>
</html>