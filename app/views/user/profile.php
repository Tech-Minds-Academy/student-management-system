<?php
session_start();

if (!isset($_SESSION['first_name'])) {
    // Redirect to login page if not logged in
    header("Location: /login");
    exit();
}

// Database connection
$conn = new mysqli("localhost", "root", "", "student_management_system");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch logged-in user's profile
$first_name = $_SESSION['first_name'];
$sql = "SELECT * FROM first WHERE name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $first_name);
$stmt->execute();
$result = $stmt->get_result();
$student = $result->fetch_assoc();

if (!$student) {
    echo "Student not found.";
    exit();
}
?>
