<?php
class User {
    private $conn;
    private $table_name = "users";

    public $id;
    public $username;
    public $email;
    public $password;
    public $profile_picture;
    public $theme_preference;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . "
                SET username=:username, 
                    email=:email, 
                    password_hash=:password,
                    profile_picture=:profile_picture,
                    theme_preference=:theme_preference";

        $stmt = $this->conn->prepare($query);

        // Sanitize and hash
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);

        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":profile_picture", $this->profile_picture);
        $stmt->bindParam(":theme_preference", $this->theme_preference);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . "
                SET username = :username,
                    email = :email,
                    profile_picture = :profile_picture,
                    theme_preference = :theme_preference
                WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        // Sanitize
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":profile_picture", $this->profile_picture);
        $stmt->bindParam(":theme_preference", $this->theme_preference);
        $stmt->bindParam(":id", $this->id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function login($email, $password) {
        $query = "SELECT id, name, email, password, role, profile_picture FROM " . $this->table_name . " WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    public function logActivity($userId, $action) {
        $query = "INSERT INTO user_activity (user_id, action, created_at) VALUES (?, ?, NOW())";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$userId, $action]);
    }

    public function getUserSettings($user_id) {
        $query = "SELECT * FROM user_settings WHERE user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$user_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUserSettings($user_id, $settings) {
        $query = "UPDATE user_settings 
                SET font_size = :font_size,
                    background_color = :background_color
                WHERE user_id = :user_id";
                
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(":font_size", $settings['font_size']);
        $stmt->bindParam(":background_color", $settings['background_color']);
        $stmt->bindParam(":user_id", $user_id);
        
        return $stmt->execute();
    }

    public function updateLastLogin($userId) {
        $query = "UPDATE " . $this->table_name . " SET last_login = NOW() WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$userId]);
    }
} 