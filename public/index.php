<?php
require_once dirname(__DIR__) . '/app/config/appConfig.php';

require_once dirname(__DIR__) . '/app/core/Router.php';
$router = new Router();

require_once dirname(__DIR__) . '/app/routes/web.php';
$router->dispatch($_SERVER['REQUEST_URI']);


?>