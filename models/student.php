

<?php
class Student {
    private $conn;
    private $table = 'students';

    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $created_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create a new student
    public function create() {
        $query = "INSERT INTO " . $this->table . " (first_name, last_name, email) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);

        if ($stmt === false) {
            return false;
        }

        $stmt->bind_param("sss", $this->first_name, $this->last_name, $this->email);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Read all students
    public function read() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->query($query);

        return $stmt;
    }

    // Read a single student by ID
    public function read_single() {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);

        if ($stmt === false) {
            return false;
        }

        $stmt->bind_param("i", $this->id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $this->first_name = $row['first_name'];
            $this->last_name = $row['last_name'];
            $this->email = $row['email'];
            $this->created_at = $row['created_at'];
            return true;
        }

        return false;
    }

    // Update a student
    public function update() {
        $query = "UPDATE " . $this->table . " SET first_name = ?, last_name = ?, email = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if ($stmt === false) {
            return false;
        }

        $stmt->bind_param("sssi", $this->first_name, $this->last_name, $this->email, $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Delete a student
    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if ($stmt === false) {
            return false;
        }

        $stmt->bind_param("i", $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
?>