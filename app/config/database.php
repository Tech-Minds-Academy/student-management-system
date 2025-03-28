<?php
class Database
{
    private $host = getenv('DATABASE_HOST', 'localhost');
    private $db_name = getenv("DATABASE_NAME", "student_management_system");
    private $username = getenv('DATABASE_USERNAME', 'root');
    private $password = getenv('DATABASE_PASSWORD', '');
    private $conn;

    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
$db = new Database();
$conn = $db->getConnection();
?>