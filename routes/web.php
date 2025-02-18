<!-- Web Routes -->
<!-- this defines the Authentication routes between the web pages -->

<?php
$routes = [
    'register' => 'views/register.php',
    'login' => 'views/login.php',
    'dashboard' => 'views/dashboard.php'
];

$request_uri = trim($_SERVER['REQUEST_URI'], '/');

if (array_key_exists($request_uri, $routes)) {
    include $routes[$request_uri];
} else {
    echo "404 Not Found";
}
?>