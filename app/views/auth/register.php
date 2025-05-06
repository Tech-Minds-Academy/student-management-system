<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="/app/assets/css/styles.css">
</head>

<body>
    <div class="container">
        <h2>Register</h2>
        <form method="POST">
            <div class="input-wrapper">
                <input type="text" name="first_name" id="first_name" placeholder=" " required>
                <label for="first_name" class="label">First Name</label>
                <div class="input-border"></div>
            </div>

            <div class="input-wrapper">
                <input type="text" name="last_name" id="last_name" placeholder=" " required>
                <label for="last_name" class="label">Last Name</label>
                <div class="input-border"></div>
            </div>

            <div class="input-wrapper">
                <input type="email" name="email" id="email" placeholder=" " required>
                <label for="email" class="label">Email</label>
                <div class="input-border"></div>
            </div>

            <div class="input-wrapper">
                <input type="tel" name="phone" id="phone_number" placeholder=" " required>
                <label for="phone" class="label">Phone Number</label>
                <div class="input-border"></div>
            </div>

            <div class="input-wrapper password-container">
                <input type="password" name="password" id="password" placeholder=" " required>
                <label for="password" class="label">Password</label>
                <div class="input-border"></div>
                <span class="toggle-password" onclick="togglePassword()">👁</span>
            </div>

            <button id="login" type="submit" name="register" class="btn">Register</button>
        </form>
        <p>
            Alread'y have an account? <a href="/login">Login</a>
        </p>
    </div>
    <script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }
    </script>
</body>

</html>