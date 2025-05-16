<?php
require_once dirname(__DIR__, 1) . '/config/database.php';
require_once dirname(__DIR__, 1) . '/models/User.php';

class UserController
{
    private $userModel;

    public function __construct()
    {
        $db = new Database();
        $conn = $db->getConnection();
        $this->userModel = new UserModel($conn);
    }

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

        try {
            // Fetch user data from the database
            $user_email = $_SESSION['email'];
            $user = $this->userModel->getUserByEmail($user_email);

            if (!$user) {
                // If the user is not found, display an error message
                echo "User not found.";
                exit();
            }

            // Pass user data to the view
            require_once dirname(__DIR__, 1) . '/views/user/profile.php';
        } catch (Exception $e) {
            // Handle any exceptions and display an error message
            echo "An error occurred while fetching user data: " . $e->getMessage();
            exit();
        }
    }
}
?>