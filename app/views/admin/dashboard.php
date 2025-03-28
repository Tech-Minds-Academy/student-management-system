<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Admin Dashboard</title>
    <link rel="stylesheet" href="../../assets/css/grade.css">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-top">
                <div class="logo">
                    <i class="fas fa-school"></i>
                    <h2>EduAdmin</h2>
                </div>
                <button id="close-sidebar" class="close-btn">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <div class="sidebar-content">
                <div class="user-info">
                    <div class="user-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="user-details">
                        <h3>Admin User</h3>
                        <p>Administrator</p>
                    </div>
                </div>
                
                <nav class="sidebar-nav">
                    <ul>
                        <li class="nav-item active" data-page="dashboard">
                            <a href="#">
                                <i class="fas fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item" data-page="students">
                            <a href="#">
                                <i class="fas fa-user-graduate"></i>
                                <span>Students</span>
                            </a>
                        </li>
                        <li class="nav-item" data-page="courses">
                            <a href="#">
                                <i class="fas fa-book"></i>
                                <span>Courses</span>
                            </a>
                        </li>
                        <li class="nav-item" data-page="messages">
                            <a href="#">
                                <i class="fas fa-envelope"></i>
                                <span>Messages</span>
                            </a>
                        </li>
                        <li class="nav-item" data-page="add-student">
                            <a href="#">
                                <i class="fas fa-user-plus"></i>
                                <span>Add Student</span>
                            </a>
                        </li>
                        <li class="nav-item" data-page="settings">
                            <a href="#">
                                <i class="fas fa-cog"></i>
                                <span>Settings</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            
            <div class="sidebar-footer">
                <a href="#" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <header class="top-bar">
                <button id="toggle-sidebar" class="menu-btn">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="top-bar-title">
                    <h2>School Admin Dashboard</h2>
                </div>
                <div class="top-bar-actions">
                    <button class="notification-btn" id="notification-btn">
                        <i class="fas fa-bell"></i>
                    </button>
                    <div class="user-dropdown">
                        <button class="user-btn">
                            <div class="user-avatar small">
                                <i class="fas fa-user"></i>
                            </div>
                            <span>Admin</span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                    </div>
                </div>
            </header>

            <!-- Dashboard Page -->
            <div class="page-content" id="dashboard">
                <div class="page-header">
                    <h1>Dashboard</h1>
                    <p>Welcome to your admin dashboard</p>
                </div>
                
                
    <div class="stat-card editable" data-stat="students">
        <div class="stat-card-content">
            <h3>Total Students</h3>
            <h2 id="student-count">256</h2>
            <p class="stat-change positive">
                <i class="fas fa-arrow-up"></i> 12% from last month
            </p>
            <button class="edit-stat-btn"><i class="fas fa-edit"></i></button>
        </div>
        <div class="stat-card-icon students">
            <i class="fas fa-user-graduate"></i>
        </div>
    </div>
    
    <div class="stat-card editable" data-stat="courses">
        <div class="stat-card-content">
            <h3>Active Courses</h3>
            <h2 id="course-count">24</h2>
            <p class="stat-change positive">
                <i class="fas fa-arrow-up"></i> 8% from last month
            </p>
            <button class="edit-stat-btn"><i class="fas fa-edit"></i></button>
        </div>
        <div class="stat-card-icon courses">
            <i class="fas fa-book"></i>
        </div>
    </div>
    
    <div class="stat-card editable" data-stat="messages">
        <div class="stat-card-content">
            <h3>New Messages</h3>
            <h2 id="message-count">18</h2>
            <p class="stat-change neutral">
                <i class="fas fa-minus"></i> Same as last week
            </p>
            <button class="edit-stat-btn"><i class="fas fa-edit"></i></button>
        </div>
        <div class="stat-card-icon messages">
            <i class="fas fa-envelope"></i>
        </div>
    </div>
                
                
    
    <!-- This section is now empty -->

            </div>

            <!-- Students Page -->
            <div class="page-content" id="students" style="display: none;">
                <div class="page-header">
                    <h1>Students</h1>
                    <button class="primary-btn">
                        <i class="fas fa-plus"></i> <a href="#add-student">Add Student</a>
                    </button>
                </div>
                
                <div class="filter-bar">
                    <!-- Update the search box in the students page to have a placeholder that indicates functionality -->
<div class="search-box">
    <i class="fas fa-search"></i>
    <input type="text" placeholder="Search student names...">
</div>
                    <div class="filter-actions">
                        <select class="filter-select">
                            <option value="">All Courses</option>
                            <option value="cs">Computer Science</option>
                            <option value="ds">Data Science</option>
                            <option value="wd">Web Development</option>
                            <option value="gd">Graphic Design</option>
                        </select>
                        <button class="filter-btn">
                            <i class="fas fa-filter"></i> Filter
                        </button>
                    </div>
                </div>
                
                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" class="select-all">
                                </th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Course</th>
                                <th>Enrollment Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="checkbox" class="select-item">
                                </td>
                                <td>
                                    <div class="table-user">
                                        <div class="user-avatar small">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <span>John Doe</span>
                                    </div>
                                </td>
                                <td>john.doe@example.com</td>
                                <td>Computer Science</td>
                                <td>2023-09-01</td>
                                <td><span class="status-badge active">Active</span></td>
                                <td>
                                    <div class="table-actions">
                                        <button class="action-btn edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="action-btn delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <button class="action-btn">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" class="select-item">
                                </td>
                                <td>
                                    <div class="table-user">
                                        <div class="user-avatar small">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <span>Jane Smith</span>
                                    </div>
                                </td>
                                <td>jane.smith@example.com</td>
                                <td>Data Science</td>
                                <td>2023-08-15</td>
                                <td><span class="status-badge active">Active</span></td>
                                <td>
                                    <div class="table-actions">
                                        <button class="action-btn edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="action-btn delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <button class="action-btn">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" class="select-item">
                                </td>
                                <td>
                                    <div class="table-user">
                                        <div class="user-avatar small">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <span>Robert Johnson</span>
                                    </div>
                                </td>
                                <td>robert.j@example.com</td>
                                <td>Web Development</td>
                                <td>2023-09-05</td>
                                <td><span class="status-badge active">Active</span></td>
                                <td>
                                    <div class="table-actions">
                                        <button class="action-btn edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="action-btn delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <button class="action-btn">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" class="select-item">
                                </td>
                                <td>
                                    <div class="table-user">
                                        <div class="user-avatar small">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <span>Lisa Brown</span>
                                    </div>
                                </td>
                                <td>lisa.brown@example.com</td>
                                <td>Graphic Design</td>
                                <td>2023-08-20</td>
                                <td><span class="status-badge inactive">On Leave</span></td>
                                <td>
                                    <div class="table-actions">
                                        <button class="action-btn edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="action-btn delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <button class="action-btn">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" class="select-item">
                                </td>
                                <td>
                                    <div class="table-user">
                                        <div class="user-avatar small">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <span>Michael Wilson</span>
                                    </div>
                                </td>
                                <td>michael.w@example.com</td>
                                <td>Business Administration</td>
                                <td>2023-09-10</td>
                                <td><span class="status-badge active">Active</span></td>
                                <td>
                                    <div class="table-actions">
                                        <button class="action-btn edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="action-btn delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <button class="action-btn">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div class="pagination">
                    <button class="pagination-btn" disabled>
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="pagination-btn active">1</button>
                    <button class="pagination-btn">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>

            <!-- Courses Page -->
            <div class="page-content" id="courses" style="display: none;">
                <div class="page-header">
                    <h1>Courses</h1>
                    <button class="primary-btn">
                        <i class="fas fa-plus"></i> Add Course
                    </button>
                </div>
                
                <div class="courses-grid">
                    <div class="course-card">
                        <div class="course-card-header">
                            <div class="course-icon">
                                <i class="fas fa-laptop-code"></i>
                            </div>
                            <div class="course-actions">
                                <button class="action-btn">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                            </div>
                        </div>
                        <div class="course-card-content">
                            <h3>Introduction to Computer Science</h3>
                            <p class="course-instructor">Dr. Alan Turing</p>
                            <div class="course-details">
                                <div class="course-detail">
                                    <i class="fas fa-calendar"></i>
                                    <span>12 weeks</span>
                                </div>
                                <div class="course-detail">
                                    <i class="fas fa-users"></i>
                                    <span>45 students</span>
                                </div>
                            </div>
                        </div>
                        <div class="course-card-footer">
                            <button class="secondary-btn">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button class="secondary-btn">
                                <i class="fas fa-eye"></i> View
                            </button>
                        </div>
                    </div>
                    
                    <div class="course-card">
                        <div class="course-card-header">
                            <div class="course-icon">
                                <i class="fas fa-code"></i>
                            </div>
                            <div class="course-actions">
                                <button class="action-btn">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                            </div>
                        </div>
                        <div class="course-card-content">
                            <h3>Web Development Bootcamp</h3>
                            <p class="course-instructor">Sarah Williams</p>
                            <div class="course-details">
                                <div class="course-detail">
                                    <i class="fas fa-calendar"></i>
                                    <span>8 weeks</span>
                                </div>
                                <div class="course-detail">
                                    <i class="fas fa-users"></i>
                                    <span>32 students</span>
                                </div>
                            </div>
                        </div>
                        <div class="course-card-footer">
                            <button class="secondary-btn">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button class="secondary-btn">
                                <i class="fas fa-eye"></i> View
                            </button>
                        </div>
                    </div>
                    
                    <div class="course-card">
                        <div class="course-card-header">
                            <div class="course-icon">
                                <i class="fas fa-chart-bar"></i>
                            </div>
                            <div class="course-actions">
                                <button class="action-btn">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                            </div>
                        </div>
                        <div class="course-card-content">
                            <h3>Data Science Fundamentals</h3>
                            <p class="course-instructor">Prof. David Clark</p>
                            <div class="course-details">
                                <div class="course-detail">
                                    <i class="fas fa-calendar"></i>
                                    <span>10 weeks</span>
                                </div>
                                <div class="course-detail">
                                    <i class="fas fa-users"></i>
                                    <span>28 students</span>
                                </div>
                            </div>
                        </div>
                        <div class="course-card-footer">
                            <button class="secondary-btn">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button class="secondary-btn">
                                <i class="fas fa-eye"></i> View
                            </button>
                        </div>
                    </div>
                    
                    <div class="course-card">
                        <div class="course-card-header">
                            <div class="course-icon">
                                <i class="fas fa-paint-brush"></i>
                            </div>
                            <div class="course-actions">
                                <button class="action-btn">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                            </div>
                        </div>
                        <div class="course-card-content">
                            <h3>UI/UX Design Principles</h3>
                            <p class="course-instructor">Emma Johnson</p>
                            <div class="course-details">
                                <div class="course-detail">
                                    <i class="fas fa-calendar"></i>
                                    <span>6 weeks</span>
                                </div>
                                <div class="course-detail">
                                    <i class="fas fa-users"></i>
                                    <span>24 students</span>
                                </div>
                            </div>
                        </div>
                        <div class="course-card-footer">
                            <button class="secondary-btn">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button class="secondary-btn">
                                <i class="fas fa-eye"></i> View
                            </button>
                        </div>
                    </div>
                    
                    <div class="course-card">
                        <div class="course-card-header">
                            <div class="course-icon">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <div class="course-actions">
                                <button class="action-btn">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                            </div>
                        </div>
                        <div class="course-card-content">
                            <h3>Mobile App Development</h3>
                            <p class="course-instructor">Michael Chen</p>
                            <div class="course-details">
                                <div class="course-detail">
                                    <i class="fas fa-calendar"></i>
                                    <span>9 weeks</span>
                                </div>
                                <div class="course-detail">
                                    <i class="fas fa-users"></i>
                                    <span>30 students</span>
                                </div>
                            </div>
                        </div>
                        <div class="course-card-footer">
                            <button class="secondary-btn">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button class="secondary-btn">
                                <i class="fas fa-eye"></i> View
                            </button>
                        </div>
                    </div>
                    
                    <div class="course-card">
                        <div class="course-card-header">
                            <div class="course-icon">
                                <i class="fas fa-briefcase"></i>
                            </div>
                            <div class="course-actions">
                                <button class="action-btn">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                            </div>
                        </div>
                        <div class="course-card-content">
                            <h3>Business Administration</h3>
                            <p class="course-instructor">Jennifer Adams</p>
                            <div class="course-details">
                                <div class="course-detail">
                                    <i class="fas fa-calendar"></i>
                                    <span>12 weeks</span>
                                </div>
                                <div class="course-detail">
                                    <i class="fas fa-users"></i>
                                    <span>38 students</span>
                                </div>
                            </div>
                        </div>
                        <div class="course-card-footer">
                            <button class="secondary-btn">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button class="secondary-btn">
                                <i class="fas fa-eye"></i> View
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Messages Page -->
            <div class="page-content" id="messages" style="display: none;">
                <div class="page-header">
                    <h1>Messages</h1>
                    <button class="primary-btn">
                        <i class="fas fa-plus"></i> Compose
                    </button>
                </div>
                
                <div class="messages-container">
                    <div class="messages-sidebar">
                        <div class="messages-filter">
                            <button class="filter-tab active">All</button>
                            <button class="filter-tab">Unread</button>
                            <button class="filter-tab">Sent</button>
                            <button class="filter-tab">Archived</button>
                        </div>
                        <div class="messages-list">
                            <div class="message-preview unread">
                                <div class="message-sender">
                                    <div class="user-avatar small">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="sender-info">
                                        <h4>John Doe</h4>
                                        <p class="message-time">Mar 26, 2025</p>
                                    </div>
                                </div>
                                <div class="message-snippet">
                                    <h4>Question about course materials</h4>
                                    <p>I'm having trouble accessing the course materials...</p>
                                </div>
                            </div>
                            
                            <div class="message-preview unread">
                                <div class="message-sender">
                                    <div class="user-avatar small">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="sender-info">
                                        <h4>Jane Smith</h4>
                                        <p class="message-time">Mar 25, 2025</p>
                                    </div>
                                </div>
                                <div class="message-snippet">
                                    <h4>Request for deadline extension</h4>
                                    <p>Due to personal circumstances, I'd like to request...</p>
                                </div>
                            </div>
                            
                            <div class="message-preview">
                                <div class="message-sender">
                                    <div class="user-avatar small">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="sender-info">
                                        <h4>Robert Johnson</h4>
                                        <p class="message-time">Mar 24, 2025</p>
                                    </div>
                                </div>
                                <div class="message-snippet">
                                    <h4>Technical issue with assignment submission</h4>
                                    <p>I'm experiencing a technical issue when trying to...</p>
                                </div>
                            </div>
                            
                            <div class="message-preview">
                                <div class="message-sender">
                                    <div class="user-avatar small">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="sender-info">
                                        <h4>Lisa Brown</h4>
                                        <p class="message-time">Mar 23, 2025</p>
                                    </div>
                                </div>
                                <div class="message-snippet">
                                    <h4>Feedback on course structure</h4>
                                    <p>I wanted to provide some feedback on the course...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="message-content">
                        <div class="message-header">
                            <div class="message-subject">
                                <h2>Question about course materials</h2>
                                <div class="message-meta">
                                    <span class="message-from">From: John Doe (john.doe@example.com)</span>
                                    <span class="message-date">Mar 26, 2025, 10:42 AM</span>
                                </div>
                            </div>
                            <div class="message-actions">
                                <button class="action-btn">
                                    <i class="fas fa-reply"></i>
                                </button>
                                <button class="action-btn">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <button class="action-btn">
                                    <i class="fas fa-archive"></i>
                                </button>
                            </div>
                        </div>
                        <div class="message-body">
                            <p>Dear Administrator,</p>
                            <p>I'm having trouble accessing the course materials for Web Development. When I try to download the PDF files, I get an error message saying "Access Denied".</p>
                            <p>Could you please check if there's an issue with my account permissions? I've been able to access other course materials without any problems.</p>
                            <p>Thank you for your help.</p>
                            <p>Best regards,<br>John Doe</p>
                        </div>
                        <div class="message-reply">
                            <h3>Reply</h3>
                            <textarea placeholder="Type your reply here..."></textarea>
                            <div class="reply-actions">
                                <button class="primary-btn">Send</button>
                                <button class="secondary-btn">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add Student Page -->
            <div class="page-content" id="add-student" style="display: none;">
                <div class="page-header">
                    <h1>Add New Student</h1>
                </div>
                
                <div class="form-container">
                    <form id="student-form" class="admin-form">
                        <div class="form-section">
                            <h2>Personal Information</h2>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="first-name">First Name</label>
                                    <input type="text" id="first-name" required>
                                </div>
                                <div class="form-group">
                                    <label for="last-name">Last Name</label>
                                    <input type="text" id="last-name" required>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="tel" id="phone">
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" id="dob" required>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select id="gender">
                                        <option value="">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                        <option value="prefer-not">Prefer not to say</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-section">
                            <h2>Course Information</h2>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="course">Course</label>
                                    <select id="course" required>
                                        <option value="">Select a course</option>
                                        <option value="cs">Computer Science</option>
                                        <option value="ds">Data Science</option>
                                        <option value="wd">Web Development</option>
                                        <option value="gd">Graphic Design</option>
                                        <option value="ba">Business Administration</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="start-date">Start Date</label>
                                    <input type="date" id="start-date" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-section">
                            <h2>Address</h2>
                            <div class="form-group">
                                <label for="address">Street Address</label>
                                <input type="text" id="address">
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" id="city">
                                </div>
                                
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input type="text" id="country">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-actions">
                            <button type="submit" class="primary-btn">Save Student</button>
                            <button type="button" class="secondary-btn">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Settings Page -->
            <div class="page-content" id="settings" style="display: none;">
                <div class="page-header">
                    <h1>Settings</h1>
                </div>
                
                <div class="settings-container">
                    <div class="settings-sidebar">
                        <ul class="settings-nav">
                            <li class="settings-nav-item active" data-settings="account">
                                <i class="fas fa-user"></i> Account
                            </li>
                            <li class="settings-nav-item" data-settings="password">
                                <i class="fas fa-lock"></i> Password
                            </li>
                            <li class="settings-nav-item" data-settings="notifications">
                                <i class="fas fa-bell"></i> Notifications
                            </li>
                            <li class="settings-nav-item" data-settings="appearance">
                                <i class="fas fa-palette"></i> Appearance
                            </li>
                        </ul>
                    </div>
                    
                    <div class="settings-content">
                        <div class="settings-panel" id="account-settings">
                            <h2>Account Settings</h2>
                            <form id="account-form" class="admin-form">
                                <div class="form-group">
                                    <label for="admin-name">Name</label>
                                    <input type="text" id="admin-name" value="Admin User">
                                </div>
                                
                                <div class="form-group">
                                    <label for="admin-email">Email</label>
                                    <input type="email" id="admin-email" value="admin@example.com">
                                </div>
                                
                                <div class="form-group">
                                    <label for="admin-role">Role</label>
                                    <input type="text" id="admin-role" value="Administrator" disabled>
                                </div>
                                
                                <div class="form-actions">
                                    <button type="submit" class="primary-btn">Save Changes</button>
                                </div>
                            </form>
                        </div>
                        
                        <div class="settings-panel" id="password-settings" style="display: none;">
                            <h2>Change Password</h2>
                            <form id="password-form" class="admin-form">
                                <div class="form-group">
                                    <label for="current-password">Current Password</label>
                                    <input type="password" id="current-password" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="new-password">New Password</label>
                                    <input type="password" id="new-password" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="confirm-password">Confirm New Password</label>
                                    <input type="password" id="confirm-password" required>
                                </div>
                                
                                <div class="form-actions">
                                    <button type="submit" class="primary-btn">Update Password</button>
                                </div>
                            </form>
                        </div>
                        
                        <div class="settings-panel" id="notifications-settings" style="display: none;">
                            <h2>Notification Preferences</h2>
                            <form id="notifications-form" class="admin-form">
                                <div class="form-group checkbox">
                                    <input type="checkbox" id="notify-new-student" checked>
                                    <label for="notify-new-student">New student registrations</label>
                                </div>
                                
                                <div class="form-group checkbox">
                                    <input type="checkbox" id="notify-new-message" checked>
                                    <label for="notify-new-message">New messages</label>
                                </div>
                                
                                <div class="form-group checkbox">
                                    <input type="checkbox" id="notify-course-update">
                                    <label for="notify-course-update">Course updates</label>
                                </div>
                                
                                <div class="form-group checkbox">
                                    <input type="checkbox" id="notify-system" checked>
                                    <label for="notify-system">System notifications</label>
                                </div>
                                
                                <div class="form-actions">
                                    <button type="submit" class="primary-btn">Save Preferences</button>
                                </div>
                            </form>
                        </div>
                        
                        <div class="settings-panel" id="appearance-settings" style="display: none;">
                            <h2>Appearance Settings</h2>
                            <form id="appearance-form" class="admin-form">
                                <div class="form-group">
                                    <label>Theme</label>
                                    <div class="theme-options">
                                        <div class="theme-option active">
                                            <div class="theme-preview light"></div>
                                            <span>Light</span>
                                        </div>
                                        <div class="theme-option">
                                            <div class="theme-preview dark"></div>
                                            <span>Dark</span>
                                        </div>
                                        <div class="theme-option">
                                            <div class="theme-preview blue"></div>
                                            <span>Blue</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="font-size">Font Size</label>
                                    <select id="font-size">
                                        <option value="small">Small</option>
                                        <option value="medium" selected>Medium</option>
                                        <option value="large">Large</option>
                                    </select>
                                </div>
                                
                                <div class="form-actions">
                                    <button type="submit" class="primary-btn">Save Preferences</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <div class="modal" id="edit-stat-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Edit Statistic</h2>
                <button class="close-modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="stat-value">Value</label>
                    <input type="number" id="stat-value" min="0">
                </div>
                <div class="form-group">
                    <label for="stat-trend">Trend</label>
                    <select id="stat-trend">
                        <option value="positive">Positive</option>
                        <option value="negative">Negative</option>
                        <option value="neutral">Neutral</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="stat-percentage">Percentage Change</label>
                    <input type="number" id="stat-percentage" min="0" max="100">
                </div>
            </div>
            <div class="modal-footer">
                <button class="secondary-btn" id="cancel-edit">Cancel</button>
                <button class="primary-btn" id="save-stat">Save Changes</button>
            </div>
        </div>
    </div>

    <script src="../../assets/js/script.js"></script>
</body>
</html>