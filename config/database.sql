-- -----------------------------------------------------
-- Database Name: user_dashboard
-- Description: Database for User Dashboard System
-- -----------------------------------------------------

-- Create the database
DROP DATABASE IF EXISTS user_dashboard;
CREATE DATABASE user_dashboard;
USE user_dashboard;

-- Create users table first (as other tables depend on it)
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    profile_picture VARCHAR(255),
    student_id VARCHAR(20) UNIQUE,
    last_login DATETIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create user_preferences table
CREATE TABLE IF NOT EXISTS user_preferences (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    theme VARCHAR(50) DEFAULT 'light',
    notifications_enabled BOOLEAN DEFAULT TRUE,
    language VARCHAR(10) DEFAULT 'en',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create user_sessions table with fixed expires_at field
CREATE TABLE IF NOT EXISTS user_sessions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    session_token VARCHAR(255) NOT NULL,
    ip_address VARCHAR(45),
    user_agent TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    expires_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create site_visits table
CREATE TABLE IF NOT EXISTS site_visits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    visit_date DATE NOT NULL,
    visit_count INT DEFAULT 1,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    UNIQUE KEY unique_visit (user_id, visit_date)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert test users (password is 'password123')
INSERT INTO users (name, email, password, student_id) VALUES
('Test User', 'test@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'STU123'),
('John Doe', 'john.doe@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'STU124'),
('Jane Smith', 'jane.smith@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'STU125');

-- Insert default preferences for test users
INSERT INTO user_preferences (user_id, theme, notifications_enabled, language) VALUES
(1, 'light', TRUE, 'en'),
(2, 'dark', TRUE, 'en'),
(3, 'light', TRUE, 'en');

-- Insert sample site visits
INSERT INTO site_visits (user_id, visit_date, visit_count) VALUES
(1, CURDATE(), 5),
(1, DATE_SUB(CURDATE(), INTERVAL 1 DAY), 3),
(1, DATE_SUB(CURDATE(), INTERVAL 2 DAY), 4),
(2, CURDATE(), 2),
(2, DATE_SUB(CURDATE(), INTERVAL 1 DAY), 1),
(3, CURDATE(), 6);

-- Create indexes for better performance
CREATE INDEX idx_user_email ON users(email);
CREATE INDEX idx_user_student_id ON users(student_id);
CREATE INDEX idx_session_token ON user_sessions(session_token);
CREATE INDEX idx_visit_date ON site_visits(visit_date);

-- Set secure defaults
SET GLOBAL sql_mode = 'STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION'; 