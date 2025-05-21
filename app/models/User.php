<?php
// require_once dirname(__DIR__, 1) . '/config/database.php';


class UserModel
{
    private $conn;

    // Constructor with Dependency Injection
    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    // Create a new user
    public function createUser($first_name, $last_name, $email, $phone, $password, $role = "user")
    {
        $sql = "INSERT INTO users (first_name, last_name, email, phone, password, role)
                VALUES (:first_name, :last_name, :email, :phone, :password, :role)";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':first_name' => $first_name,
            ':last_name' => $last_name,
            ':email' => $email,
            ':phone' => $phone,
            ':password' => $password, // Use the raw password directly
            ':role' => $role
        ]);
    }
    public function login($email, $password = null) {
    $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user ?: null;
}

    public function checkLoginDetails($email, $password)
{
    $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the user exists
    if (!$user) {
        echo "<script>alert('❌ User not found!');</script>";
        return null; // Return null if no user is found
    }

    // Check if the password matches
    if ($password == $user['password']) {
        echo "<div style='color: green; font-weight: bold;'>✅ Login successful!</div><br>";
        return $user;
    } else {
        echo "<script>alert('❌ Invalid password!');</script>";
        return null; // Return null if the password is incorrect
    }
}


    public function checkLoginDetails_($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($sql); // Use the initialized $this->conn
        $stmt->bindValue(1, $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the password matches
        if ($user && password_verify($password, $user['password'])) {
            return $user; // Return user details if login is successful
        } else {
            echo "Invalid email or password!<br/>";
            return null; // Return null if login fails
        }
    }

    
    // Get user by email (for login)
    public function getUserByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Get all users
    public function getAllUsers()
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Update user
    public function updateUser($id, $first_name, $last_name, $email, $phone)
    {
        $sql = "UPDATE users 
                SET first_name = :first_name, last_name = :last_name, email = :email, phone = :phone 
                WHERE id = :id";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':id' => $id,
            ':first_name' => $first_name,
            ':last_name' => $last_name,
            ':email' => $email,
            ':phone' => $phone
        ]);
    }

    // Delete user
    public function deleteUser($id)
    {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    // Search users
    public function searchUser($term)
    {
        $term = "%" . $term . "%";
        $sql = "SELECT * FROM users 
                WHERE first_name LIKE :term OR last_name LIKE :term OR email LIKE :term OR phone LIKE :term";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':term' => $term]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
