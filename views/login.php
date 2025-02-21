<!-- User Login Details -->
<!-- this is used to store and display the Login form and details of the user -->

<?php
if(session_status() == PHP_SESSION_NONE) {
   session_start();
}

include '../config/database.php';
include '../controllers/AuthController.php';

$auth = new AuthController();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $message = $auth->login($email, $password);

    // Prepare the SQL statement to be executed
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);

    // Check if the statement is prepared successfully
    if ($stmt === false) {
        die("Error preparing the statement: " . $conn->error);
    }

    $stmt->bind_param("s", $email); // Bind the email parameter
    $stmt->execute(); // Execute the statement
    $result = $stmt->get_result(); // Get the result from the executed statement
    $user = $result->fetch_assoc(); // Fetch the user details

    // Check if the user exists and the password is correct
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['email'] = $user['email'];
        header("Location: dashboard.php"); // Redirect to the dashboard page
        exit(); // Stops the script from executing further
    } else {
        echo "Invalid credentials!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form method="POST">
            <div class="name">
                <input type="email" name="email" placeholder="Email" required>
            </div>

            <div class="password-container">
                <input type="password" name="password" id="password" placeholder="Password" required>
                <span class="toggle-password" onclick="togglePassword()">👁</span>
            </div>

            <select name="role" required>
                <option value="Admin">Admin</option>
                <option value="Student">Student</option>
            </select>

            <button id="login" type="submit" name="login" class="btn">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php">Register</a></p>
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