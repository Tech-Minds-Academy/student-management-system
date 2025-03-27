<?php
// Check if a session is already started before calling session_start()
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../app/models/User.php';

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function register($first_name, $last_name, $email, $phone, $password, $role = 'user') {
        return $this->userModel->createUser($first_name, $last_name, $email, $phone, $password, $role) ? 
            "User registered successfully!" : "Error: Could not register user.";
    }

    public function login($email, $password) {
        $user = $this->userModel->login($email, $password);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['phone'] = $user['phone'];
            $_SESSION['role'] = $user['role']; // Store the user's role in the session
            header("Location: ../views/user/profile.php");
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

    // Corrected getAllUser method
    public function getAllUser() {
        $users = $this->userModel->getAllUser();
        return $users ? $users : "Error: Could not retrieve the list of users.";
    }

    public function updateUser($id, $first_name, $last_name, $email, $phone) {
        return $this->userModel->updateUser($id, $first_name, $last_name, $email, $phone) ? 
            "User updated successfully!" : "Error: Could not update user.";
    }

    public function deleteUser($id) {
        return $this->userModel->deleteUser($id) ? 
            "User deleted successfully!" : "Error: Could not delete user.";
    }
}
?>