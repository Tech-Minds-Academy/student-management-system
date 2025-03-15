<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']);
$userRole = isset($_SESSION['user_role']) ? $_SESSION['user_role'] : '';
$userName = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : '';
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <i class="fas fa-graduation-cap me-2"></i>
            Student Management System
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <?php if ($isLoggedIn): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard">
                            <i class="fas fa-tachometer-alt me-1"></i>Dashboard
                        </a>
                    </li>
                    <?php if ($userRole === 'admin' || $userRole === 'teacher'): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="studentsDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-users me-1"></i>Students
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/students">View All Students</a></li>
                            <li><a class="dropdown-item" href="/students/add">Add New Student</a></li>
                            <li><a class="dropdown-item" href="/students/attendance">Attendance</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="coursesDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-book me-1"></i>Courses
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/courses">View All Courses</a></li>
                            <li><a class="dropdown-item" href="/courses/add">Add New Course</a></li>
                            <li><a class="dropdown-item" href="/courses/schedule">Schedule</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php if ($userRole === 'student'): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/my-courses">
                            <i class="fas fa-book-reader me-1"></i>My Courses
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/my-attendance">
                            <i class="fas fa-calendar-check me-1"></i>My Attendance
                        </a>
                    </li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
            <ul class="navbar-nav">
                <?php if ($isLoggedIn): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-1"></i><?php echo htmlspecialchars($userName); ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="/profile">
                                <i class="fas fa-id-card me-2"></i>Profile
                            </a></li>
                            <li><a class="dropdown-item" href="/settings">
                                <i class="fas fa-cog me-2"></i>Settings
                            </a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="/logout">
                                <i class="fas fa-sign-out-alt me-2"></i>Logout
                            </a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">
                            <i class="fas fa-sign-in-alt me-1"></i>Login
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<?php if ($isLoggedIn): ?>
<div class="sub-header bg-light py-2">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <?php
                        $currentPage = basename($_SERVER['PHP_SELF'], '.php');
                        if ($currentPage !== 'index'): ?>
                            <li class="breadcrumb-item active" aria-current="page">
                                <?php echo ucfirst($currentPage); ?>
                            </li>
                        <?php endif; ?>
                    </ol>
                </nav>
            </div>
            <div class="col-auto">
                <div class="d-flex align-items-center">
                    <span class="text-muted me-2">
                        <i class="fas fa-clock me-1"></i><?php echo date('l, F j, Y'); ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>