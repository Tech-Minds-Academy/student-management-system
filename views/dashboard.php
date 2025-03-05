<!-- User Dashboard details -->

<?php
// check if session is already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

echo "Welcome, " . $_SESSION['first_name'] . " " . $_SESSION['last_name'] . "!";

// Check if the user is an admin
if ($_SESSION['role'] == 'admin') {
    echo "<a href='create_user.php'>Create User</a>";
    echo "<a href='update_user.php'>Update User</a>";
    echo "<a href='delete_user.php'>Delete User</a>";
    echo "<a href='search.php'>Search Users</a>";
} else {
    echo "<h2>User Dashboard</h2>";
    // Add user dashboard details here
}
?>

<a href="../controllers/logout.php">Logout</a> 