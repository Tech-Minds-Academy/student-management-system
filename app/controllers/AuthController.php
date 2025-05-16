<?php
// Check if a session is already started before calling session_start()
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once dirname(__DIR__, 1) . '/config/database.php';
require_once dirname(__DIR__, 1) . '/models/User.php';

class AuthController
{
    private $userModel;

    public function __construct()
    {
        $db = new Database();
        $conn = $db->getConnection();
        $this->userModel = new UserModel($conn);
    }

    public function register()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
            $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
            $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING);
            $role = $role ?: 'user'; // Default to 'user' if not provided

            // $password = password_hash($password, PASSWORD_DEFAULT);
            $newUser = $this->userModel->createUser($first_name, $last_name, $email, $phone, $password, $role);
            echo "new user" . $newUser;
            if ($newUser) {
                // redirect to login
                Header("Location: /login"); // Redirect to the login page
            } else {
                return;
            }
        } else {
            require_once dirname(__DIR__, 1) . '/views/auth/register.php';
        }
    }

    public function login()
    {
    

        if (isset($_SESSION['user_id'])) {
            // User is already logged in, redirect to profile page
            header("Location: /profile");
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

            if (empty($email) || empty($password)) {
                echo "Email and password are required!";
            }

            $user = $this->userModel->checkLoginDetails($email, $password);
        

            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['first_name'] = $user['first_name'];
                $_SESSION['last_name'] = $user['last_name'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['phone'] = $user['phone'];
                $_SESSION['role'] = $user['role']; // Store the user's role in the session
                header("Location: /profile"); // Redirect to the profile page
                // header("Location: /views/profile.php"); // Redirect to the profile page
                exit();
            } else {
                require_once dirname(__DIR__, 1) . '/views/auth/login.php';
                $error_message = "Invalid email or password!";
            }
        } else {
            require_once dirname(__DIR__, 1) . '/views/auth/login.php';

        }
    }
    public function logout()
    {
        session_destroy();
        // wipe history so user can't go back
        
        header("Location: /login", true,302);
        exit();

    }

    public function getAllUser()
    {
        $users = $this->userModel->getAllUsers();
        return $users ? $users : "Error: Could not retrieve the list of users.";
    }

    public function updateUser($id, $first_name, $last_name, $email, $phone)
    {
        try {
            return $this->userModel->updateUser($id, $first_name, $last_name, $email, $phone) ? 
                "User updated successfully!" : "Error: Could not update user.";
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function deleteUser($id)
    {
        try {
            return $this->userModel->deleteUser($id) ? 
                "User deleted successfully!" : "Error: Could not delete user.";
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
?>