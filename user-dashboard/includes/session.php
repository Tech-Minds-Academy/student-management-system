<?php
session_start();

// Security configurations
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_secure', 1);

function checkAuth() {
    // Check if user is logged in
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }

    // Verify session
    require_once __DIR__ . '/../config/database.php';
    
    try {
        // Record site visit
        $date = date('Y-m-d');
        $stmt = $conn->prepare("
            INSERT INTO site_visits (user_id, visit_date, visit_count) 
            VALUES (?, ?, 1)
            ON DUPLICATE KEY UPDATE visit_count = visit_count + 1
        ");
        $stmt->execute([$_SESSION['user_id'], $date]);

        // Update session data
        $stmt = $conn->prepare("SELECT name, email, profile_picture, student_id FROM users WHERE id = ?");
        $stmt->execute([$_SESSION['user_id']]);
        $user = $stmt->fetch();

        if ($user) {
            $_SESSION['username'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['profile_picture'] = $user['profile_picture'] ?? 'https://via.placeholder.com/150';
            $_SESSION['student_id'] = $user['student_id'];
        } else {
            // Invalid user ID in session
            session_destroy();
            header("Location: login.php");
            exit();
        }
    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
    }
}

// Call checkAuth function
checkAuth();
?> 