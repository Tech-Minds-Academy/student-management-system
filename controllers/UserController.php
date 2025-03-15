<?php
require_once '../models/User.php';

class UserController {
    private static $uploadDir = '../uploads/profile_images/';

    public static function getUserDetails($userId) {
        $user = new User();
        return $user->getById($userId);
    }

    public static function handleRequest() {
        $action = $_GET['action'] ?? '';
        
        switch ($action) {
            case 'uploadImage':
                return self::handleImageUpload();
            case 'updateUsername':
                return self::handleUsernameUpdate();
            case 'updatePreferences':
                return self::handlePreferencesUpdate();
            default:
                http_response_code(400);
                return json_encode(['success' => false, 'message' => 'Invalid action']);
        }
    }

    private static function handleImageUpload() {
        if (!isset($_FILES['profile_image'])) {
            return json_encode(['success' => false, 'message' => 'No file uploaded']);
        }

        $file = $_FILES['profile_image'];
        $userId = $_SESSION['user_id'];

        // Validate file type
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($file['type'], $allowedTypes)) {
            return json_encode(['success' => false, 'message' => 'Invalid file type']);
        }

        // Create upload directory if it doesn't exist
        if (!file_exists(self::$uploadDir)) {
            mkdir(self::$uploadDir, 0777, true);
        }

        // Generate unique filename
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = $userId . '_' . time() . '.' . $extension;
        $filepath = self::$uploadDir . $filename;

        if (move_uploaded_file($file['tmp_name'], $filepath)) {
            $user = new User();
            $success = $user->updateProfileImage($userId, $filepath);
            
            if ($success) {
                return json_encode(['success' => true, 'message' => 'Image uploaded successfully']);
            }
        }

        return json_encode(['success' => false, 'message' => 'Failed to upload image']);
    }

    private static function handleUsernameUpdate() {
        $data = json_decode(file_get_contents('php://input'), true);
        $username = $data['username'] ?? '';
        $userId = $_SESSION['user_id'];

        if (empty($username)) {
            return json_encode(['success' => false, 'message' => 'Username cannot be empty']);
        }

        $user = new User();
        $success = $user->updateUsername($userId, $username);

        return json_encode([
            'success' => $success,
            'message' => $success ? 'Username updated successfully' : 'Failed to update username'
        ]);
    }

    private static function handlePreferencesUpdate() {
        $data = json_decode(file_get_contents('php://input'), true);
        $userId = $_SESSION['user_id'];

        $preferences = [
            'email_notifications' => $data['email_notifications'] ?? false,
            'language' => $data['language'] ?? 'en',
            'timezone' => $data['timezone'] ?? 'UTC',
            'two_factor' => $data['two_factor'] ?? false
        ];

        $user = new User();
        $success = $user->updatePreferences($userId, $preferences);

        return json_encode([
            'success' => $success,
            'message' => $success ? 'Preferences updated successfully' : 'Failed to update preferences'
        ]);
    }

    public static function validateSession() {
        if (!isset($_SESSION['user_id'])) {
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
                strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
                http_response_code(401);
                echo json_encode(['success' => false, 'message' => 'Session expired']);
                exit;
            } else {
                header('Location: /views/login.php');
                exit;
            }
        }
    }
}

// Handle AJAX requests
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
    strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    UserController::validateSession();
    header('Content-Type: application/json');
    echo UserController::handleRequest();
    exit;
} 