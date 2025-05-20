<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile | Student Portal</title>
    <link rel="stylesheet" href="/app/assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f2f5;
            color: #333;
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Main container */
        .main-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar styles */
        .sidebar {
            width: 260px;
            background: linear-gradient(135deg, #3a6186, #89253e);
            color: #fff;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 100;
            box-shadow: 3px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar-header {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .profile-pic-container {
            width: 80px;
            height: 80px;
            margin: 0 auto 15px;
            position: relative;
        }

        .profile-pic {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid rgba(255, 255, 255, 0.3);
            transition: transform 0.3s ease;
        }

        .profile-pic:hover {
            transform: scale(1.05);
        }

        .sidebar-header h3 {
            margin-bottom: 5px;
            font-weight: 600;
            font-size: 18px;
        }

        .sidebar-header p {
            font-size: 13px;
            opacity: 0.8;
        }

        .sidebar-menu {
            flex: 1;
            padding: 20px 0;
            overflow-y: auto;
        }

        .sidebar-menu ul {
            list-style: none;
        }

        .sidebar-menu li {
            padding: 12px 20px;
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: all 0.2s ease;
            margin-bottom: 5px;
            border-left: 4px solid transparent;
        }

        .sidebar-menu li:hover {
            background: rgba(255, 255, 255, 0.1);
            border-left-color: rgba(255, 255, 255, 0.5);
        }

        .sidebar-menu li.active {
            background: rgba(255, 255, 255, 0.2);
            border-left-color: #fff;
        }

        .sidebar-menu li i {
            margin-right: 10px;
            font-size: 18px;
            width: 25px;
            text-align: center;
        }

        .sidebar-footer {
            padding: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .logout-btn {
            width: 100%;
            padding: 10px;
            background: rgba(255, 255, 255, 0.1);
            border: none;
            border-radius: 5px;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .logout-btn i {
            margin-right: 8px;
        }

        /* Main content styles */
        .main-content {
            flex: 1;
            margin-left: 260px;
            padding: 20px;
            transition: margin-left 0.3s ease;
        }

        /* Menu toggle for mobile */
        .menu-toggle {
            position: fixed;
            top: 20px;
            left: 20px;
            background: #fff;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: none;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 101;
        }

        /* Enhanced profile container */
        .profile-container {
            max-width: 900px;
            margin: 30px auto;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .profile-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        /* Decorative elements */
        .profile-container::before {
            content: "";
            position: absolute;
            top: -50px;
            right: -50px;
            width: 150px;
            height: 150px;
            background: rgba(102, 126, 234, 0.1);
            border-radius: 50%;
            z-index: 0;
        }

        .profile-container::after {
            content: "";
            position: absolute;
            bottom: -50px;
            left: -50px;
            width: 200px;
            height: 200px;
            background: rgba(118, 75, 162, 0.1);
            border-radius: 50%;
            z-index: 0;
        }

        /* Enhanced profile header */
        .profile-header {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            text-align: center;
            padding: 60px 20px 30px;
            position: relative;
            overflow: hidden;
        }

        .profile-header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none"><path d="M0,0 L100,0 L100,100 Z" fill="rgba(255,255,255,0.1)"/></svg>');
            background-size: 100% 100%;
        }

        .avatar-container {
            position: relative;
            width: 150px;
            height: 150px;
            margin: 0 auto 20px;
        }

        .profile-header img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 5px solid white;
            background: white;
            object-fit: cover;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
            position: relative;
            z-index: 2;
        }

        .profile-header img:hover {
            transform: scale(1.05);
        }

        .avatar-badge {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background: #4CAF50;
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 3px solid white;
            z-index: 3;
        }

        .profile-header h2 {
            margin: 10px 0;
            font-size: 28px;
            font-weight: 600;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .profile-header p {
            font-size: 16px;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 5px;
        }

        .profile-stats {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            gap: 30px;
        }

        .stat-item {
            text-align: center;
        }

        .stat-value {
            font-size: 24px;
            font-weight: 600;
        }

        .stat-label {
            font-size: 12px;
            opacity: 0.8;
        }

        /* Enhanced profile content */
        .profile-content {
            padding: 30px;
            position: relative;
            z-index: 1;
        }

        .profile-content h3 {
            margin-bottom: 25px;
            color: #333;
            font-size: 22px;
            font-weight: 600;
            position: relative;
            display: inline-block;
        }

        .profile-content h3::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(to right, #667eea, #764ba2);
            border-radius: 3px;
        }

        .profile-details {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .profile-details .detail {
            background: #f8fafc;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-left: 4px solid #667eea;
        }

        .profile-details .detail:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .profile-details .detail h4 {
            margin-bottom: 12px;
            color: #667eea;
            font-size: 16px;
            font-weight: 600;
            display: flex;
            align-items: center;
        }

        .profile-details .detail h4 i {
            margin-right: 10px;
            font-size: 18px;
        }

        .profile-details .detail p {
            font-size: 15px;
            color: #444;
            padding: 5px 0;
            border-bottom: 1px dashed #e0e0e0;
            word-break: break-word;
        }

        /* Additional sections */
        .profile-actions {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
        }

        .action-btn {
            padding: 12px 20px;
            background: #f8fafc;
            border: none;
            border-radius: 8px;
            color: #667eea;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.05);
        }

        .action-btn:hover {
            background: #667eea;
            color: white;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        .action-btn.primary {
            background: #667eea;
            color: white;
        }

        .action-btn.primary:hover {
            background: #5a6fd1;
        }

        /* Enhanced profile footer */
        .profile-footer {
            text-align: center;
            padding: 25px;
            background: #f8fafc;
            border-top: 1px solid #edf2f7;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .profile-footer a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .profile-footer a:hover {
            color: #5a6fd1;
        }

        .footer-links {
            display: flex;
            gap: 20px;
        }

        .last-login {
            color: #888;
            font-size: 14px;
        }

        /* Page styles */
        .page {
            display: none;
            animation: fadeIn 0.5s ease;
        }

        .page.active {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Animation keyframes */
        .animate-fade-in {
            animation: fadeIn 0.5s ease forwards;
        }

        .delay-1 { animation-delay: 0.1s; }
        .delay-2 { animation-delay: 0.2s; }
        .delay-3 { animation-delay: 0.3s; }
        .delay-4 { animation-delay: 0.4s; }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .profile-details {
                grid-template-columns: 1fr 1fr;
            }
            
            .profile-actions {
                flex-wrap: wrap;
            }
            
            .action-btn {
                flex: 1;
                min-width: 120px;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                left: -260px;
            }
            
            .sidebar.active {
                left: 0;
            }
            
            .main-content {
                margin-left: 0;
                padding-top: 70px;
            }
            
            .menu-toggle {
                display: flex;
            }
            
            .profile-details {
                grid-template-columns: 1fr;
            }
            
            .profile-stats {
                flex-wrap: wrap;
                gap: 15px;
            }
            
            .profile-actions {
                flex-direction: column;
            }
            
            .profile-footer {
                flex-direction: column;
                gap: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="profile-pic-container">
                    <form action="/upload-profile-picture" method="POST" enctype="multipart/form-data">
                        <label for="profile-pic-input">
                            <img src="/app/assets/images/default-avatar.png" alt="Profile Picture" class="profile-pic" id="profile-pic-preview">
                        </label>
                        <input type="file" name="profile_picture" id="profile-pic-input" accept="image/*" style="display: none;" onchange="previewProfilePicture(event)">
                        <button type="submit" class="upload-btn">Upload</button>
                    </form>
                </div>
                <script>
                    
                </script>
                <h3><?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?></h3>
                <p><?= htmlspecialchars($user['email']) ?></p>
            </div>
            <div class="sidebar-menu">
                <ul>
                    <li class="active" data-page="profile">
                        <i class="fas fa-user"></i>
                        <span>Profile</span>
                    </li>
                    <li data-page="dashboard">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </li>
                    <li data-page="results">
                        <i class="fas fa-chart-bar"></i>
                        <span>Results</span>
                    </li>
                    <li data-page="settings">
                        <i class="fas fa-cog"></i>
                      <span>Settings</span>
                    </li>
                </ul>
            </div>
            <div class="sidebar-footer">
                <button class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </button>
            </div>
        </div>

        <!-- Menu Toggle Button for Mobile -->
        <div class="menu-toggle" id="menu-toggle">
            <i class="fas fa-bars"></i>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Profile Page -->
            <div class="page profile-page active">
                <div class="profile-container">
                    <!-- Enhanced Profile Header -->
                    <div class="profile-header">
                        <div class="avatar-container">
                            <img src="/app/assets/images/default-avatar.png" alt="<?= htmlspecialchars($user['first_name']) ?>'s Avatar">
                            <div class="avatar-badge">
                                <i class="fas fa-check"></i>
                            </div>
                        </div>
                        <h2><?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?></h2>
                        <p><i class="fas fa-envelope"></i> <?= htmlspecialchars($user['email']) ?></p>
                        
                        <!-- Added student status and ID -->
                        <p><i class="fas fa-user-graduate"></i> Student</p>
                        
                        <!-- Added profile stats -->
                        <div class="profile-stats">
                            <div class="stat-item">
                                <div class="stat-value">12</div>
                                <div class="stat-label">Courses</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">3.8</div>
                                <div class="stat-label">GPA</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">85%</div>
                                <div class="stat-label">Attendance</div>
                            </div>
                        </div>
                    </div>
                                            
                        <h3>Profile Details</h3>
                        <div class="profile-details">
                            <div class="detail animate-fade-in delay-1">
                                <h4><i class="fas fa-user"></i> First Name</h4>
                                <p><?= htmlspecialchars($user['first_name']) ?></p>
                            </div>
                            <div class="detail animate-fade-in delay-1">
                                <h4><i class="fas fa-user"></i> Last Name</h4>
                                <p><?= htmlspecialchars($user['last_name']) ?></p>
                            </div>
                            <div class="detail animate-fade-in delay-2">
                                <h4><i class="fas fa-envelope"></i> Email</h4>
                                <p><?= htmlspecialchars($user['email']) ?></p>
                            </div>
                            <div class="detail animate-fade-in delay-2">
                                <h4><i class="fas fa-phone"></i> Phone</h4>
                                <p><?= htmlspecialchars($user['phone'] ?? 'N/A') ?></p>
                            </div>
                        </div>

                    </div>
                    <!-- Enhanced Profile Footer -->
                    <div class="profile-footer">
                        <div class="last-login">
                            <i class="fas fa-clock"></i> Last login: <?= date('F j, Y, g:i a') ?>
                        </div>
                        <div class="footer-links">
                            <a href="/settings"><i class="fas fa-cog"></i> Settings</a>
                            <a href="/help"><i class="fas fa-question-circle"></i> Help</a>
                            <a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dashboard Page (Placeholder) -->
            <div class="page dashboard-page">
                <h1>Dashboard</h1>
                <p>Welcome to your dashboard. This is where you can see an overview of your academic progress.</p>
            </div>

            <!-- Results Page (Placeholder) -->
            <div class="page results-page">
                <h1>Results</h1>
                <p>Check your academic results and grades here.</p>
            </div>

            <!-- Assignments Page (Placeholder) -->
            <div class="page assignments-page">
                <h1>Assignments</h1>
                <p>View and submit your assignments here.</p>
            </div>

            <!-- Calendar Page (Placeholder) -->
            <div class="page calendar-page">
                <h1>Calendar</h1>
                <p>View your academic calendar and important dates here.</p>
            </div>

            <!-- Messages Page (Placeholder) -->
            <div class="page messages-page">
                <h1>Messages</h1>
                <p>Communicate with your instructors and classmates here.</p>
            </div>

            <!-- Settings Page (Placeholder) -->
            <div class="page settings-page">
                <h1>Settings</h1>
                <p>Manage your account settings and preferences here.</p>
            </div>
        </div>
    </div>

    <script>
        function previewProfilePicture(event) {
            const preview = document.getElementById('profile-pic-preview');
            const file = event.target.files[0];
            if (file && file.size > 2 * 1024 * 1024) { // 2MB limit
                alert('File size exceeds 2MB. Please choose a smaller file.');
                event.target.value = ''; // Clear the input
                return;
            }
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                preview.src = e.target.result;
            };
                reader.readAsDataURL(file);
            }
        }
                    
        document.addEventListener('DOMContentLoaded', function() {
            // Menu toggle for mobile
            const menuToggle = document.getElementById('menu-toggle');
            const sidebar = document.getElementById('sidebar');
            
            menuToggle.addEventListener('click', function() {
                sidebar.classList.toggle('active');
                
                // Change icon based on sidebar state
                const icon = this.querySelector('i');
                if (sidebar.classList.contains('active')) {
                    icon.classList.remove('fa-bars');
                    icon.classList.add('fa-times');
                } else {
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                }
            });
            
            // Page navigation
            const menuItems = document.querySelectorAll('.sidebar-menu li');
            const pages = document.querySelectorAll('.page');
            
            menuItems.forEach(item => {
                item.addEventListener('click', function() {
                    // Remove active class from all menu items
                    menuItems.forEach(i => i.classList.remove('active'));
                    
                    // Add active class to clicked menu item
                    this.classList.add('active');
                    
                    // Get the page to show
                    const pageToShow = this.getAttribute('data-page');
                    
                    // Hide all pages
                    pages.forEach(page => page.classList.remove('active'));
                    
                    // Show the selected page
                    document.querySelector(`.${pageToShow}-page`).classList.add('active');
                    
                    // Close sidebar on mobile after navigation
                    if (window.innerWidth <= 768) {
                        sidebar.classList.remove('active');
                        menuToggle.querySelector('i').classList.remove('fa-times');
                        menuToggle.querySelector('i').classList.add('fa-bars');
                    }
                });
            });
            
            // Animate profile details on scroll
            const details = document.querySelectorAll('.detail');
            
            // Function to check if an element is in viewport
            function isInViewport(element) {
                const rect = element.getBoundingClientRect();
                return (
                    rect.top >= 0 &&
                    rect.left >= 0 &&
                    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
                );
            }
            
            // Function to handle scroll animation
            function handleScroll() {
                details.forEach(detail => {
                    if (isInViewport(detail)) {
                        detail.style.opacity = '1';
                        detail.style.transform = 'translateY(0)';
                    }
                });
            }
            
            // Set initial styles
            details.forEach(detail => {
                detail.style.opacity = '0';
                detail.style.transform = 'translateY(20px)';
                detail.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            });
            
            // Listen for scroll events
            window.addEventListener('scroll', handleScroll);
            
            // Trigger once on load
            handleScroll();
            
            // Add logout functionality
            const logoutBtn = document.querySelector('.logout-btn');
            if (logoutBtn) {
                logoutBtn.addEventListener('click', function() {
                    if (confirm('Are you sure you want to logout?')) {
                        // Destroy session and redirect to login page
                        fetch('/logout', { method: 'POST' })
                            .then(response => {
                                if (response.ok) {
                                    window.location.href = '/login';
                                } else {
                                    alert('Failed to logout. Please try again.');
                                }
                            })
                            .catch(error => {
                                console.error('Error during logout:', error);
                                alert('An error occurred. Please try again.');
                            });
                    }
                });
            }
        });
    </script>
</body>

</html>