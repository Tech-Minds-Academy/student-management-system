<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<?php
include '../includes/header.php';
?>

<body>

    <!-- Background Video -->
    <div class="background">
        <video autoplay muted loop>
            <source src="../assets/images/bacground.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <!-- Content Wrapper for Content Boxes -->
    <div class="content-wrapper">
        <!-- left Content Box (first box) -->
        <div class="content-box">
            <!-- for honeycomb animation -->
            <div class="honeycomb">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <h2>Student Management System.</h2>
            <p>Welcome to the Student Management System. This platform allows administrators to efficiently manage
                student data, track academic progress, and facilitate communication between students and faculty
                members.
            </p>
            <p>Get started by
                <a href="/login">logging in</a>
                <!-- <a href="../models/login.php">logging in</a> -->
                or
                <a href="/register">registering</a>
                <!-- <a href="../models/register.php">registering</a> -->
                to access personalized dashboards and tools.
            </p>
        </div>
    </div>

    <?php
    include '../includes/footer.php';
    ?>

</body>

</html>