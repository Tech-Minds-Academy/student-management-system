<!-- Authentication details -->
<!-- this is used to store the users authentication details -->

<?php
session_start();
include '../config/database.php';

class AuthController {
    public function register($first_name, $last_name, $email, $phone, $password) {
        global $conn;
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $check_sql = "SELECT * FROM users WHERE email = ? OR phone = ?";
        $stmt = $conn->prepare($check_sql);
        $stmt->bind_param("ss", $email, $phone);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return "Email or phone number already exists!";
        } else {
            $sql = "INSERT INTO users (first_name, last_name, email, phone, password) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $first_name, $last_name, $email, $phone, $hashed_password);
            return $stmt->execute() ? "User registered successfully!" : "Error: " . $conn->error;
        }
    }
    // User Login Authentication
    public function login($email, $password) {
        // fetch user Data
        global $conn;
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['phone'] = $user['phone'];
            header("Location: ../views/dashboard.php");
            exit();
        } else {
            return "Invalid email or password!";
        }
    }

    // Logout User
    public function logout() {
        session_destroy();
        header("Location: ../views/login.php");
        exit();
    }
}
?>