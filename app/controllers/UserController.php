<?php
class UserController
{
    public function profile() 
    {
        // Ensure the user is logged in
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['email'])) {
            header("Location: /login");
            exit();
        }

        // Prepare data for the view
        $user_name = $_SESSION['first_name'] . ' ' . $_SESSION['last_name'];
        $user_email = $_SESSION['email'];

        // Pass data to the view
        require_once dirname(__DIR__, 1) . '/views/user/profile.php';
    }
}
?>  