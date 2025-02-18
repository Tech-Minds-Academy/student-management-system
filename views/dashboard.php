<!-- User Dashboard details -->

<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

echo "Welcome, " . $_SESSION['first_name'] . " " . $_SESSION['last_name'] . "!";
?>

<a href="../controllers/logout.php">Logout</a> 