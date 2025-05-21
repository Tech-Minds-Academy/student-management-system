<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Base styles and reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            padding: 20px;
        }

        /* Form container styling */
        .form-wrapper {
            width: 100%;
            max-width: 420px;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            padding: 40px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
            position: relative;
        }

        .form-wrapper:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        /* Decorative elements */
        .form-wrapper::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, #4776E6, #8E54E9);
        }

        /* Form header styling */
        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .title {
            color: #333;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #666;
            font-size: 16px;
        }

        /* Input styling */
        .input-wrapper {
            position: relative;
            margin-bottom: 24px;
        }

        .input {
            width: 100%;
            padding: 12px 16px;
            font-size: 16px;
            background-color: transparent;
            border: none;
            border-radius: 6px;
            outline: none;
            z-index: 1;
            position: relative;
        }

        .label {
            position: absolute;
            left: 16px;
            top: 12px;
            color: #888;
            font-size: 16px;
            transition: all 0.2s ease;
            pointer-events: none;
            z-index: 0;
        }

        .input-border {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 1px;
            background-color: #ddd;
            transition: all 0.3s ease;
        }

        .input:focus ~ .input-border,
        .input:not(:placeholder-shown) ~ .input-border {
            height: 2px;
            background: linear-gradient(90deg, #4776E6, #8E54E9);
        }

        .input:focus ~ .label,
        .input:not(:placeholder-shown) ~ .label {
            top: -10px;
            left: 10px;
            font-size: 12px;
            color: #4776E6;
            background-color: white;
            padding: 0 6px;
            font-weight: 600;
        }

        /* Password visibility toggle */
        .password-toggle {
            position: absolute;
            right: 16px;
            top: 12px;
            color: #888;
            cursor: pointer;
            z-index: 2;
        }

        .password-toggle:hover {
            color: #4776E6;
        }

        /* Options styling */
        .options {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 24px;
        }

        .forgot-password {
            color: #4776E6;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .forgot-password:hover {
            color: #8E54E9;
            text-decoration: underline;
        }

        /* Button styling */
        .login-button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(90deg, #4776E6, #8E54E9);
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(71, 118, 230, 0.3);
            position: relative;
            overflow: hidden;
        }

        .login-button:hover {
            box-shadow: 0 6px 15px rgba(71, 118, 230, 0.4);
            transform: translateY(-2px);
        }

        .login-button:active {
            transform: translateY(0);
            box-shadow: 0 2px 5px rgba(71, 118, 230, 0.4);
        }

        /* Button ripple effect */
        .login-button::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 5px;
            height: 5px;
            background: rgba(255, 255, 255, 0.5);
            opacity: 0;
            border-radius: 100%;
            transform: scale(1, 1) translate(-50%);
            transform-origin: 50% 50%;
        }

        .login-button:focus:not(:active)::after {
            animation: ripple 1s ease-out;
        }

        /* Form validation styling */
        .input-wrapper.error .input-border {
            background-color: #ff3860;
            height: 2px;
        }

        .input-wrapper.error .label {
            color: #ff3860;
        }

        .error-message {
            color: #ff3860;
            font-size: 12px;
            margin-top: 5px;
            display: none;
        }

        .input-wrapper.error .error-message {
            display: block;
        }

        /* Login error message */
        .login-error {
            background-color: #ffebee;
            color: #d32f2f;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 14px;
            display: none;
            text-align: center;
            border-left: 4px solid #d32f2f;
        }

        /* Success message */
        .success-message {
            display: none;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.95);
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 10;
        }

        .success-icon {
            width: 80px;
            height: 80px;
            background-color: #4CAF50;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .success-icon i {
            color: white;
            font-size: 40px;
        }

        .success-title {
            font-size: 24px;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }

        .success-subtitle {
            font-size: 16px;
            color: #666;
        }

        /* Animations */
        @keyframes ripple {
            0% {
                transform: scale(0, 0);
                opacity: 1;
            }
            20% {
                transform: scale(25, 25);
                opacity: 1;
            }
            100% {
                opacity: 0;
                transform: scale(40, 40);
            }
        }

        @keyframes shake {
            0%, 100% {transform: translateX(0);}
            10%, 30%, 50%, 70%, 90% {transform: translateX(-5px);}
            20%, 40%, 60%, 80% {transform: translateX(5px);}
        }

        .shake {
            animation: shake 0.6s ease-in-out;
        }

        /* Responsive adjustments */
        @media (max-width: 480px) {
            .form-wrapper {
                padding: 30px 20px;
            }

            .title {
                font-size: 24px;
            }

            .subtitle {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="form-wrapper" id="loginForm">
        <div class="form-header">
            <h1 class="title">Welcome Back Admin</h1>
            <p class="subtitle">Please enter your details to sign in</p>
        </div>
        
        <!-- Login error message container -->
        <?php if (!empty($error)): ?>
            <div class="login-error" id="loginError" style="display:block;">
                <i class="fas fa-exclamation-circle"></i>
                <span id="errorMessage"><?= htmlspecialchars($error) ?></span>
            </div>
        <?php endif; ?>
        
            <form id="adminLoginForm" action="/adminLogin" method="post">            <div class="input-wrapper" id="emailWrapper">
                <input type="email" id="email" name="email" class="input" placeholder=" " required>
                <label for="email" class="label">Email address</label>
                <div class="input-border"></div>
                <div class="error-message">Please enter a valid email address</div>
            </div>
            
            <div class="input-wrapper" id="passwordWrapper">
                <input type="password" id="password" name="password" class="input" placeholder=" " required>
                <label for="password" class="label">Password</label>
                <div class="input-border"></div>
                <span class="password-toggle" id="passwordToggle">
                    <i class="fas fa-eye"></i>
                </span>
                <div class="error-message">Password is required</div>
            </div>
            
            <div class="options">
                <a href="#" class="forgot-password">Forgot password?</a>
            </div>
            
            <button type="submit" class="login-button" id="loginButton">
                Sign In
            </button>
        </form>
        
        <div class="success-message" id="successMessage">
            <div class="success-icon">
                <i class="fas fa-check"></i>
            </div>
            <h2 class="success-title">Login Successful!</h2>
            <p class="success-subtitle">Redirecting to dashboard...</p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const emailWrapper = document.getElementById('emailWrapper');
    const passwordWrapper = document.getElementById('passwordWrapper');
    const passwordToggle = document.getElementById('passwordToggle');
    const formWrapper = document.getElementById('loginForm');

    // Toggle password visibility
    passwordToggle.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        // Toggle eye icon
        const icon = this.querySelector('i');
        icon.classList.toggle('fa-eye');
        icon.classList.toggle('fa-eye-slash');
    });

    // Form validation
    function validateEmail(email) {
        const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }

    // Input validation on blur
    emailInput.addEventListener('blur', function() {
        if (!validateEmail(this.value) && this.value !== '') {
            emailWrapper.classList.add('error');
        } else {
            emailWrapper.classList.remove('error');
        }
    });

    passwordInput.addEventListener('blur', function() {
        if (this.value === '') {
            passwordWrapper.classList.add('error');
        } else {
            passwordWrapper.classList.remove('error');
        }
    });

    // Focus effect for inputs
    const inputs = document.querySelectorAll('.input');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });

        input.addEventListener('blur', function() {
            this.parentElement.classList.remove('focused');
        });
    });
});
    </script>
</body>
</html>