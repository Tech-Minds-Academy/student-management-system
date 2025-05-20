<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About | Student Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Reset and base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f9fafb;
            color: #333;
            line-height: 1.6;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header styles */
        header {
            background-color: #fff;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 0;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 700;
            font-size: 1.25rem;
        }

        .logo i {
            color: #8b5cf6;
        }

        .auth-buttons {
            display: flex;
            gap: 12px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-outline {
            border: 1px solid #8b5cf6;
            color: #8b5cf6;
            background: transparent;
        }

        .btn-outline:hover {
            background-color: #f5f3ff;
        }

        .btn-primary {
            background-color: #8b5cf6;
            color: white;
            border: 1px solid #8b5cf6;
        }

        .btn-primary:hover {
            background-color: #7c3aed;
            border-color: #7c3aed;
        }

        .btn-large {
            padding: 12px 24px;
            font-size: 1rem;
        }

        /* Hero section */
        .hero {
            background-color: #fff;
            padding: 80px 0;
            text-align: center;
        }

        .hero h1 {
            font-size: 2.5rem;
            color: #111827;
            margin-bottom: 1.5rem;
        }

        .hero p {
            font-size: 1.125rem;
            color: #6b7280;
            max-width: 700px;
            margin: 0 auto;
        }

        /* Main content */
        .content-section {
            padding: 60px 0;
        }

        .content-wrapper {
            max-width: 800px;
            margin: 0 auto;
        }

        .content-text p {
            color: #4b5563;
            font-size: 1.125rem;
            margin-bottom: 1.5rem;
        }

        /* Feature cards */
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 24px;
            margin: 48px 0;
        }

        .feature-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 24px;
            text-align: center;
            transition: box-shadow 0.3s;
        }

        .feature-card:hover {
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            background-color: #f3e8ff;
            color: #8b5cf6;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            font-size: 1.25rem;
        }

        .feature-title {
            font-size: 1.125rem;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .feature-description {
            color: #6b7280;
        }

        /* Team section */
        .team-section {
            background-color: #f3f4f6;
            border-radius: 12px;
            padding: 32px;
            margin: 48px 0;
        }

        .team-section h2 {
            text-align: center;
            font-size: 1.875rem;
            margin-bottom: 32px;
        }

        .team-members {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 32px;
            justify-items: center;
        }

        .team-member {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .member-avatar {
            width: 96px;
            height: 96px;
            border-radius: 50%;
            overflow: hidden;
            margin-bottom: 16px;
            background-color: #e5e7eb;
        }

        .member-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .member-name {
            font-weight: 600;
            margin-bottom: 4px;
        }

        .member-role {
            font-size: 0.875rem;
            color: #6b7280;
        }

        /* CTA section */
        .cta-section {
            background-color: #8b5cf6;
            padding: 64px 0;
            text-align: center;
            color: white;
        }

        .cta-container {
            max-width: 700px;
            margin: 0 auto;
        }

        .cta-section h2 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
        }

        .cta-section p {
            color: #ddd6fe;
            margin-bottom: 2rem;
            font-size: 1.125rem;
        }

        .cta-buttons {
            display: flex;
            gap: 16px;
            justify-content: center;
        }

        .btn-white {
            background-color: white;
            color: #8b5cf6;
            border: 1px solid white;
        }

        .btn-white:hover {
            background-color: #f9fafb;
        }

        .btn-outline-white {
            border: 1px solid white;
            color: white;
            background: transparent;
        }

        .btn-outline-white:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        /* Footer */
        footer {
            background-color: #111827;
            color: #9ca3af;
            padding: 48px 0 24px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 32px;
            margin-bottom: 24px;
        }

        .footer-column h3, .footer-column h4 {
            color: white;
            margin-bottom: 16px;
        }

        .footer-column p {
            font-size: 0.875rem;
            color: #9ca3af;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 8px;
        }

        .footer-links a {
            color: #9ca3af;
            transition: color 0.3s;
        }

        .footer-links a:hover {
            color: white;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 24px;
            border-top: 1px solid #374151;
            font-size: 0.875rem;
            color: #6b7280;
        }

        /* Mobile menu */
        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            color: #4b5563;
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            nav, .btn-signup {
                display: none;
            }

            .mobile-menu-toggle {
                display: block;
            }

            .mobile-nav {
                position: fixed;
                top: 60px;
                left: 0;
                right: 0;
                background: white;
                box-shadow: 0 4px 6px rgba(0,0,0,0.1);
                padding: 20px;
                display: none;
            }

            .mobile-nav.active {
                display: block;
            }

            .mobile-nav ul {
                list-style: none;
            }

            .mobile-nav li {
                margin-bottom: 16px;
            }

            .hero h1 {
                font-size: 2rem;
            }

            .features {
                grid-template-columns: 1fr;
            }

            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }

            .team-members {
                grid-template-columns: 1fr;
            }

            .footer-content {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .hero {
                padding: 60px 0;
            }

            .hero h1 {
                font-size: 1.75rem;
            }

            .content-section {
                padding: 40px 0;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container header-container">
            <a href="index.html" class="logo">
                <i class="fas fa-book-open"></i>
                <span>Student-Management-System</span>
            </a>
        </div>
        
    </header>
    
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>About Our Student Management System</h1>
            <p>Empowering educational institutions with modern tools for seamless academic management</p>
        </div>
    </section>
    
    <!-- Main Content -->
    <section class="content-section">
        <div class="container content-wrapper">
            <div class="content-text">
                <p>Welcome to our Student Management System! Our platform is designed to help students and administrators
                    manage academic records efficiently. Whether you're an admin organizing student data or a student
                    accessing information, we aim to make the experience seamless and user-friendly.</p>
                <p>Our mission is to provide a reliable and intuitive system that enhances productivity in educational
                    institutions. We believe that technology should simplify administrative tasks, allowing educators to
                    focus on what matters most—teaching and supporting students in their academic journey.</p>
            </div>
            
            <!-- Features -->
            <div class="features">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="feature-title">User-Friendly Interface</h3>
                    <p class="feature-description">Intuitive design that makes navigation and data management simple for all users.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <h3 class="feature-title">Comprehensive Records</h3>
                    <p class="feature-description">Store and access complete academic histories, attendance records, and performance metrics.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <h3 class="feature-title">Achievement Tracking</h3>
                    <p class="feature-description">Monitor and celebrate student progress with detailed achievement tracking tools.</p>
                </div>
            </div>
            
            <!-- Team Section -->
            <div class="team-section">
                <h2>Our Team</h2>
                <div class="team-members">
                    <div class="team-member">
                        <div class="member-avatar">
                            <img src="" alt="dev mike">
                        </div>
                        <h3 class="member-name">dev Micheal Mgrechi</h3>
                        <p class="member-role">Lead Developer</p>
                    </div>
                    
                    <div class="team-member">
                        <div class="member-avatar">
                            <img src="/app/assets/images/dev-jay.jpg" alt="dev Godfrey">
                        </div>
                        <h3 class="member-name">Dev Godfrey-julius</h3>
                        <p class="member-role">Lead Back-Developer</p>
                    </div>
                    
                    <div class="team-member">
                        <div class="member-avatar">
                            <img src="" alt="dev ali">
                        </div>
                        <h3 class="member-name">Dev Ali Emmanuel</h3>
                        <p class="member-role">Front-end-Developer</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container cta-container">
            <h2>Ready to transform your educational management?</h2>
            <p>Join thousands of institutions already using our platform to streamline their academic processes.</p>
            <div class="cta-buttons">
                <a href="/register" class="btn btn-large btn-white">Create an account</a>
                <a href="/login" class="btn btn-large btn-outline-white">Log in</a>
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>Student-Management-System</h3>
                    <p>Simplifying student management for educational institutions worldwide.</p>
                </div>
                
                <div class="footer-column">
                    <h4>Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="/login">log-in</a></li>
                        <li><a href="/register">Sign-up</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h4>Contact</h4>
                    <ul class="footer-links">
                        <li>Student-Management-System@gmail.com</li>
                        <li>+234 8096 573 214</li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>© <span id="current-year"></span>Student-Management-System. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
        const mobileNav = document.querySelector('.mobile-nav');
        
        mobileMenuToggle.addEventListener('click', function() {
            mobileNav.classList.toggle('active');
        });
        
        // Set current year in footer
        document.getElementById('current-year').textContent = new Date().getFullYear();
    </script>
</body>
</html>