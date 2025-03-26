<?php
// Check if a session is already started before calling session_start()
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Include the User model
require_once __DIR__ . '/../models/User.php';

class AdminAuthController {
    private $userModel;

// Initialize the User model
    public function __construct() {
        $this->userModel = new UserModel(); // Create an instance of the UserModel class
    }

    // Login function
    public function login($email, $password) {
        $user = $this->userModel->login($email, $password);

        if ($user && password_verify($password, $user['password'])) {
            // Check if the user role is admin before allowing access to the dashboard
            if ($user['role'] == 'admin') {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['first_name'] = $user['first_name'];
                $_SESSION['last_name'] = $user['last_name'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['phone'] = $user['phone'];
                $_SESSION['role'] = $user['role']; // Store the user's role in the session
                header("Location: ../views/admin/dashboard.php");
            } else {
                return "You are not authorized to access this page!";
            }
            exit();
        } else {
            return "Invalid email or password!";
        }
    }

    public function logout() {
        session_destroy();
        header("Location: ../views/login.php");
        exit();
    }

    // Admin dashboard
    public function dashboard() {
        if (!isset($_SESSION['email']) || $_SESSION['role'] != 'admin') {
            header("Location: ../views/login.php");
            exit();
        }
        include __DIR__ . '/../views/admin/dashboard.php';
    }

    // List all users
    public function listUser() {
        if (!isset($_SESSION['email']) || $_SESSION['role'] != 'admin') {
            header("Location: ../views/login.php");
            exit();
        }
        $users = $this->userModel->getAllUsers();
        include __DIR__ . '/../views/admin/list-user.php';
    }

    // Create a new user
    public function createUser() {
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
            $message = $this->userModel->createUser($first_name, $last_name, $email, $phone, $password, $role) ?
                "User created successfully!" : "Error: Could not create user.";
        }
        include __DIR__ . '/../views/admin/create-user.php';
    }

    // Update an existing user
    public function updateUser() {
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
            $message = $this->userModel->updateUser($id, $first_name, $last_name, $email, $phone) ?
                "User updated successfully!" : "Error: Could not update user.";
        }
        include __DIR__ . '/../views/admin/update-user.php';
    }

    // Delete a user
    public function deleteUser() {
        if (!isset($_SESSION['email']) || $_SESSION['role'] != 'admin') {
            header("Location: ../views/login.php");
            exit();
        }

        $message = ""; // Initialize the message variable
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['id'];
            $message = $this->userModel->deleteUser($id) ?
                "User deleted successfully!" : "Error: Could not delete user.";
        }
        include __DIR__ . '/../views/admin/delete-user.php';
    }

    // Search for users
    public function searchUser() { 
        if (!isset($_SESSION['email']) || $_SESSION['role'] != 'admin') {
            header("Location: ../views/login.php");
            exit();
        }

        $users = []; // Initialize the users array
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $searchTerm = $_POST['search'];
            $users = $this->userModel->searchUsers($searchTerm);
        }
        include __DIR__ . '/../views/admin/search-user.php';
    }
}
?>