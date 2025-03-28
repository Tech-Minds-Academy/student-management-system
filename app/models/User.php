<?php
require_once dirname(__DIR__, 1) . '/config/database.php';

class UserModel
{
    public function createUser($first_name, $last_name, $email, $phone, $password, $role)
    {
        global $conn;

        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (first_name, last_name, email, phone, password, role) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $first_name, PDO::PARAM_STR);
        $stmt->bindValue(2, $last_name, PDO::PARAM_STR);
        $stmt->bindValue(3, $email, PDO::PARAM_STR);
        $stmt->bindValue(4, $phone, PDO::PARAM_STR);
        $stmt->bindValue(5, $hashed_password, PDO::PARAM_STR);
        $stmt->bindValue(6, $role, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function login($email, $password)
    {
        global $conn;
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public function getAllUser()
    {
        global $conn;
        $sql = "SELECT * FROM users";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function updateUser($id, $first_name, $last_name, $email, $phone)
    {
        global $conn;
        $sql = "UPDATE users SET first_name = ?, last_name = ?, email = ?, phone = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $first_name, PDO::PARAM_STR);
        $stmt->bindValue(2, $last_name, PDO::PARAM_STR);
        $stmt->bindValue(3, $email, PDO::PARAM_STR);
        $stmt->bindValue(4, $phone, PDO::PARAM_STR);
        $stmt->bindValue(5, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deleteUser($id)
    {
        global $conn;
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function searchUser($searchTerm)
    {
        global $conn;
        $searchTerm = "%" . $searchTerm . "%";
        $sql = "SELECT * FROM users WHERE first_name LIKE ? OR last_name LIKE ? OR email LIKE ? OR phone LIKE ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $searchTerm, PDO::PARAM_STR);
        $stmt->bindValue(2, $searchTerm, PDO::PARAM_STR);
        $stmt->bindValue(3, $searchTerm, PDO::PARAM_STR);
        $stmt->bindValue(4, $searchTerm, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all rows as an associative array
        return $result;
    }
}
?>