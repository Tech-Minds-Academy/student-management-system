<?php

// Public routes
$router->addRoute('/', 'MainController@index');
// Another route for the home page
$router->addRoute('/home', 'MainController@index');
// About page route
$router->addRoute('/about', 'MainController@about');
// The login page
$router->addRoute('/login', 'AuthController@login');
// The registration page
$router->addRoute('/register', 'AuthController@register');

// User routes - the user profile page
$router->addRoute('/profile', 'UserController@profile');
$router->addRoute('/dashboard', 'UserController@dashboard');

// Admin routes - the admin dashboard page
$router->addRoute('/admin/dashboard', 'AdminAuthController@dashboard');
// The page to list all users
$router->addRoute('/admin/getAllUsers', 'AdminAuthController@getAllUsers');
// The page to create a new user
$router->addRoute('/admin/createUser', 'AdminAuthController@createUser');
// The page to update a user details
$router->addRoute('/admin/updateUser', 'AdminAuthController@updateUser');
// The page to delete a user
$router->addRoute('/admin/deleteUser', 'AdminAuthController@deleteUser');
// The page to search for a users
$router->addRoute('/admin/searchUser', 'AdminAuthController@searchUser');
//the page for database connection
$router->addRoute('/config/database', 'AdminAuthController@dbConnection');
// Logout route - Logs out the user
$router->addRoute('/logout', 'AuthController@logout');
?>