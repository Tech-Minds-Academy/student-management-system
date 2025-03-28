<?php
class UserController {
    public function profile() {
        // Ensure the user is logged in
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['email'])) {
            header("Location: ../../auth/login.php");
            exit();
        }

        // Include the user profile view
        include __DIR__ . '/../views/user/profile.php';
    }

    public function dashboard() {
        // Ensure the user is logged in
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['email'])) {
            header("Location: ../../auth/login.php");
            exit();
        }

        // Include the user dashboard view
        include __DIR__ . '/../views/user/dashboard.php';
    }
}
?>