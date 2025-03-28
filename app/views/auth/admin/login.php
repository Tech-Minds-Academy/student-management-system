<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../../assets/css/styles.css">
</head>
<body>
    <div class="form-wrapper">
        <div class="form-header">
            <h1 class="title">Welcome Back Admin</h1>
            <p class="subtitle">Please enter your details to sign in</p>
        </div>
        
        <form action="post">
            <div class="input-wrapper">
                <input type="email" id="email" name="email" class="input" placeholder=" " required>
                <label for="email" class="label">Email address</label>
                <div class="input-border"></div>
            </div>
            
            <div class="input-wrapper">
                <input type="password" id="password" name="password" class="input" placeholder=" " required>
                <label for="password" class="label">Password</label>
                <div class="input-border"></div>
            </div>
            
            <div class="options">
                
                <a href="#" class="forgot-password">Forgot password?</a>
            </div>
            
            <button type="submit" class="login-button">
                Sign In
            </button>
            
        </form>
        
    </div>
</body>
</html>