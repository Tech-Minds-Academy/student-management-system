<?php
session_start();

// Define base path
define('BASE_PATH', dirname(__DIR__));

// Include configuration
require_once BASE_PATH . '/config/config.php';

// Get the request URI
$request_uri = $_SERVER['REQUEST_URI'];
$path = parse_url($request_uri, PHP_URL_PATH);
$path = trim($path, '/');

// Define routes
$routes = [
    '' => 'views/index.php',
    'login' => 'views/login.php',
    'logout' => 'views/logout.php',
    'dashboard' => 'views/dashboard.php',
    'students' => 'views/students.php',
    'courses' => 'views/courses.php',
    'students/add' => 'views/students/add.php',
    'courses/add' => 'views/courses/add.php',
    'profile' => 'views/profile.php',
    'settings' => 'views/settings.php'
];

// Check if route exists
if (array_key_exists($path, $routes)) {
    $file = BASE_PATH . '/' . $routes[$path];
    if (file_exists($file)) {
        require_once $file;
    } else {
        // File not found
        header("HTTP/1.0 404 Not Found");
        require_once BASE_PATH . '/views/errors/404.php';
    }
} else {
    // Route not found
    header("HTTP/1.0 404 Not Found");
    require_once BASE_PATH . '/views/errors/404.php';
}
