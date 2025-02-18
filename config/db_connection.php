<!-- Database Connection -->
<!-- this is used to store database connection details -->
<!-- this file is included in all the files where database connection is required -->
<?php
$host = "localhost"; // Database Host name
$user = "root"; // Database Username
$password = ""; // Database Password
$database = "student_management_system"; // Database Name

// Create database connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>