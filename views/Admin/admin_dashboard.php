<?php

// Check if a session is already started before calling session_start()
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include '../config/database.php';
include '../controllers/AuthController.php';

if (!isset($_SESSION['email']) || $_SESSION['role'] != 'Admin') {
    header("Location: login.php");
    exit();
}

echo "Welcome, " . $_SESSION['first_name'] . " " . $_SESSION['last_name'] . "!";

?>

<a href="../controllers/logout.php">Logout</a>
<a href="../views/Admin/create_user.php">Create User</a>
<a href="../views/Admin/update_user.php">Update User</a>
<a href="../views/Admin/delete_user.php">Delete User</a>
<a href="../views/Admin/search_user.php">Search Users</a>
<a href="../views/Admin/list_user.php">List Users</a>
