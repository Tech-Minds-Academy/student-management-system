<?php
class Database
{
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $conn;
    public function __construct()
    {
        $this->host = trim(getenv("DATABASE_HOST") ?: "localhost", "'");
        $this->db_name = trim(getenv("DATABASE_NAME") ?: "student_management_system", "'");
        $this->username = trim(getenv("DATABASE_USERNAME") ?: "root", "'");
        $this->password = trim(getenv("DATABASE_PASSWORD") ?: "", "'");
    }

    public function getConnection()
    {
        $this->conn = null;
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset=utf8mb4";
            $this->conn = new PDO($dsn, $this->username, $this->password);
            // $dsn = "mysql:host=localhost;dbname=student_management_system;charset=utf8mb4";
            $this->conn = new PDO($dsn, "root", "");

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e;
            die("Connection failed: " . $e->getMessage());
        }

        return $this->conn;
    }
}

// global $conn;
// $db = new Database();
// $conn = $db->getConnection();
?>