<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/User.php';

class AuthController {
    private $db;
    private $user;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            if (empty($email) || empty($password)) {
                return ['error' => "Please fill in all fields"];
            }

            try {
                $user = $this->user->login($email, $password);

                if ($user) {
                    // Set session variables
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['name'];
                    $_SESSION['user_role'] = $user['role'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['profile_picture'] = $user['profile_picture'] ?? 'default-profile.png';

                    // Update last login
                    $this->user->updateLastLogin($user['id']);
                    
                    // Log activity
                    $this->user->logActivity($user['id'], 'login');

                    header("Location: /dashboard");
                    exit();
                } else {
                    return ['error' => "Invalid email or password"];
                }
            } catch (PDOException $e) {
                return ['error' => "Login failed. Please try again."];
            }
        }
        return [];
    }

    public function logout() {
        // Log the logout activity if user was logged in
        if (isset($_SESSION['user_id'])) {
            $this->user->logActivity($_SESSION['user_id'], 'logout');
        }

        // Clear all session variables
        $_SESSION = array();

        // Destroy the session cookie
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time() - 3600, '/');
        }

        // Destroy the session
        session_destroy();

        // Redirect to login page
        header("Location: /login");
        exit();
    }
} 