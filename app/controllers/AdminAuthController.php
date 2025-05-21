<?php
// Check if a session is already started before calling session_start()
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Include the Database and User model
require_once dirname(__DIR__, 1) . '/config/database.php';
require_once dirname(__DIR__, 1) . '/models/User.php';

class AdminAuthController
{
    private $userModel;

    // Initialize the User model with DB connection
    public function __construct()
    {
        $db = new Database();
        $conn = $db->getConnection();
        $this->userModel = new UserModel($conn); // Pass $conn here!
    }

    // Login function
    public function login()
    {
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            if (empty($email) || empty($password)) {
                $error = "Email and password are required!";
            } else {

                $user = $this->userModel->login($email);
                echo "<script>alert('User: " . json_encode($user) . "');</script>";
                // Check if the user exists and verify the password
                // Check if the user is an admin

            }
            if (empty($user) || $user['role'] !== 'admin') {
                $error = "User not found or unauthorized!";
                // } elseif ($user && password_verify($password, $user['password'])) {
            } elseif ($user && $user['password'] === $password) {
                // Set session variables
                $_SESSION['email'] = $email;
                $_SESSION['role'] = $user['role'];
                $_SESSION['id'] = $user['id'];
                // Redirect to the admin dashboard
                header("Location: /admin/dashboard");
                exit();
            } else {
                $error = "Invalid email or password!";
            }
        }
        include dirname(__DIR__, 1) . '/views/auth/admin/login.php';
    }


    public function logout()
    {
        session_destroy();
        header("Location: ../views/login.php");
        exit();
    }

    // Admin dashboard
    public function dashboard()
    {
        if (!isset($_SESSION['email']) || $_SESSION['role'] != 'admin') {
            header("Location: /login");
            exit();
        }
        include dirname(__DIR__, 1) . '/views/admin/dashboard.php';
    }

    // List all users
    public function getAllUser()
    {
        if (!isset($_SESSION['email']) || $_SESSION['role'] != 'admin') {
            header("Location: ../views/login.php");
            exit();
        }

        // Fetch all users from the UserModel
        return $this->userModel->getAllUser();
    }

    // Register a new user
    public function register($first_name, $last_name, $email, $phone, $password, $role)
    {
        return $this->userModel->createUser($first_name, $last_name, $email, $phone, $password, $role) ?
            "User registered successfully!" : "Error: Could not register user.";
    }

    // Create a new user
    public function createUser()
    {
        if (!isset($_SESSION['email']) || $_SESSION['role'] != 'admin') {
            header("Location: ../views/login.php");
            exit();
        }

        $message = "";
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];
            $role = $_POST['role'];
            $message = $this->register($first_name, $last_name, $email, $phone, $password, $role);
        }
        include __DIR__ . '/../views/admin/create-user.php';
    }

    // Update an existing user
    public function updateUser()
    {
        if (!isset($_SESSION['email']) || $_SESSION['role'] != 'admin') {
            header("Location: ../views/login.php");
            exit();
        }

        $message = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['id'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            return $this->userModel->updateUser($id, $first_name, $last_name, $email, $phone) ?
                "User updated successfully!" : "Error: Could not update user.";
        }
        include __DIR__ . '/../views/admin/update-user.php';
    }

    // Delete a user
    public function deleteUser($id)
    {
        if (!isset($_SESSION['email']) || $_SESSION['role'] != 'admin') {
            header("Location: ../views/login.php");
            exit();
        }

        // Call the UserModel's deleteUser method and return a message
        return $this->userModel->deleteUser($id) ?
            "User deleted successfully!" : "Error: Could not delete user.";
    }

    // Search for users
    public function searchUser()
    {
        if (!isset($_SESSION['email']) || $_SESSION['role'] != 'admin') {
            header("Location: ../views/login.php");
            exit();
        }

        $users = []; // Initialize the users array
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $searchTerm = $_POST['search'];
            return $this->userModel->searchUser($searchTerm);
        }
        include __DIR__ . '/../views/admin/search-user.php';
    }
}
?>