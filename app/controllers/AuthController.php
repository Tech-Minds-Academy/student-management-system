<?php
class AuthController {
    public function login() {
        // handle login logic
        include __DIR__ . '/../views/auth/login.php';
    }
    public function register() {
        // handle login logic
        include __DIR__ . '/../views/auth/register.php';
    }
}

?>