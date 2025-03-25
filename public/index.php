<?php
require_once __DIR__ . '/../app/core/Router.php';
$router = new Router();

require_once __DIR__ . '/../app/routes/web.php';
$router->dispatch($_SERVER['REQUEST_URI']);

?>