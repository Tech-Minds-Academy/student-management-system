<?php
// First, create the database if it doesn't exist
$host = 'localhost';
$user = 'root';
$pass = '';

try {
    // Connect without database selected
    $conn = new PDO("mysql:host=$host", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create database if it doesn't exist
    $conn->exec("CREATE DATABASE IF NOT EXISTS user_dashboard");
    echo "Database created successfully or already exists<br>";

    // Select the database
    $conn->exec("USE user_dashboard");

    // Create tables
    $tables = [
        "CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(100) UNIQUE NOT NULL,
            password VARCHAR(255) NOT NULL,
            profile_picture VARCHAR(255),
            student_id VARCHAR(20) UNIQUE,
            last_login DATETIME,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )",
        
        "CREATE TABLE IF NOT EXISTS user_sessions (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT NOT NULL,
            session_token VARCHAR(255) NOT NULL,
            ip_address VARCHAR(45),
            user_agent TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            expires_at TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
        )",
        
        "CREATE TABLE IF NOT EXISTS site_visits (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT NOT NULL,
            visit_date DATE NOT NULL,
            visit_count INT DEFAULT 1,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
            UNIQUE KEY unique_visit (user_id, visit_date)
        )"
    ];

    // Create each table
    foreach ($tables as $sql) {
        $conn->exec($sql);
    }
    echo "Tables created successfully<br>";

    // Check if test user exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = 'test@example.com'");
    $stmt->execute();
    
    if (!$stmt->fetch()) {
        // Create test user
        $stmt = $conn->prepare("INSERT INTO users (name, email, password, student_id) VALUES (?, ?, ?, ?)");
        $stmt->execute([
            'Test User',
            'test@example.com',
            password_hash('password123', PASSWORD_DEFAULT),
            'STU123'
        ]);
        echo "<div style='color: green;'>Test user created successfully!</div>";
    } else {
        echo "<div style='color: blue;'>Test user already exists!</div>";
    }

    echo "<div style='margin: 20px 0; padding: 10px; background-color: #f0f0f0; border: 1px solid #ddd;'>";
    echo "<strong>Login Credentials:</strong><br>";
    echo "Email: test@example.com<br>";
    echo "Password: password123";
    echo "</div>";

    // Create uploads directory if it doesn't exist
    $upload_dir = __DIR__ . '/uploads/profile_pictures';
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
        echo "Created uploads directory<br>";
    }

    echo "<div style='margin-top: 20px;'>";
    echo "Setup completed! You can now: <br>";
    echo "<a href='login.php' style='display: inline-block; margin-top: 10px; padding: 10px 20px; background-color: #4e73df; color: white; text-decoration: none; border-radius: 5px;'>Go to Login Page</a>";
    echo "</div>";

} catch(PDOException $e) {
    die("<div style='color: red; margin: 20px 0;'>Error: " . $e->getMessage() . "</div>");
}
?> 