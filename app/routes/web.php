<?php
$router->addRoute('/', 'HomeController@index');
$router->addRoute('/home', 'HomeController@index');
$router->addRoute('/login', 'AuthController@login');
$router->addRoute('/register', 'AuthController@register');
// $router->addRoute('/dashboard', 'DashboardController@index');
$router->addRoute('/profile', 'UserController@profile');
// /admin

?>

<?php
// Public routes
$router->addRoute('/', 'HomeController@index');
// Another route for the home page
$router->addRoute('/home', 'HomeController@index');
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
$router->addRoute('/admin/list-users', 'AdminAuthController@listUsers');
// The page to create a new user
$router->addRoute('/admin/create-user', 'AdminAuthController@createUser');
// The page to update a user details
$router->addRoute('/admin/update-user', 'AdminAuthController@updateUser');
// The page to delete a user
$router->addRoute('/admin/delete-user', 'AdminAuthController@deleteUser');
// The page to search for a users
$router->addRoute('/admin/search-user', 'AdminAuthController@searchUser');

// Logout route - Logs out the user
$router->addRoute('/logout', 'AuthController@logout');
?>