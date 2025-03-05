<!-- Authentication details -->
<!-- this is used to store the users authentication details -->

<?php
// check if session is already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// session_start();
include '../config/database.php';
include '../config/queries.php';
include '../controllers/StudentController.php';
// $database = new Database();
// $conn = $database->getConnection();

// AuthController class
class AuthController {
    public function register($first_name, $last_name, $email, $phone, $password, $role = 'user') {
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
            $_SESSION['role'] = $user['role']; // Store the user role in the session

            if ($user['role'] == 'Admin') {
                header("Location: ../views/Admin/admin_dashboard.php");
            } else {
                header("Location: ../views/dashboard.php");
            }
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
    
        // Fetch all users
        public function getAllUsers() {
            global $conn;
            $sql = "SELECT * FROM users";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }

    // Search for users by name, email, or phone number
    public function searchUsers($searchTerm) {
        global $conn;
        $searchTerm = "%" . $searchTerm . "%";
        $stmt = $conn->prepare(SEARCH_USERS);
        $stmt->bind_param("ssss", $searchTerm, $searchTerm, $searchTerm, $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Create a new user
    public function createUser($first_name, $last_name, $email, $phone, $password) {
        return $this->register($first_name, $last_name, $email, $phone, $password);
    }

    // Update an existing user
    public function updateUser($id, $first_name, $last_name, $email, $phone) {
        global $conn;
        $stmt = $conn->prepare(UPDATE_USER);
        $stmt->bind_param("ssssi", $first_name, $last_name, $email, $phone, $id);
        return $stmt->execute() ? "User updated successfully!" : "Error: " . $conn->error;
    }

    // Delete a user
    public function deleteUser($id) {
        global $conn;
        $stmt = $conn->prepare(DELETE_USER);
        $stmt->bind_param("i", $id);
        return $stmt->execute() ? "User deleted successfully!" : "Error: " . $conn->error;
    }
}
?>