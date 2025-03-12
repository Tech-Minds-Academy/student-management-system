<?php
$router->addRoute('/', 'HomeController@index');
$router->addRoute('/home', 'HomeController@index');
$router->addRoute('/login', 'AuthController@login');
$router->addRoute('/register', 'AuthController@register');
// $router->addRoute('/dashboard', 'DashboardController@index');
$router->addRoute('/profile', 'UserController@profile');
// /admin
?>