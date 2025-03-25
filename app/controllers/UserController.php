<?php
class UserController {
    public function profile() {
        // handle login logic
        include __DIR__ . '/../views/user/profile.php';
    }
    public function dashboard() {
        include __DIR__ . '/../views/user/dashboard.php';
    }
}
class AdminController {

}
?>
