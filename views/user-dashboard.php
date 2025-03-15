<?php
require_once '../includes/header.php';
require_once '../includes/navbar.php';
require_once '../controllers/UserController.php';

// Ensure user is logged in and is a regular user
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    header('Location: login.php');
    exit();
}

$user = UserController::getUserDetails($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal - Student Management System</title>
    <link rel="stylesheet" href="/assets/css/dashboard.css">
    <link rel="stylesheet" href="/assets/css/user-dashboard.css">
</head>
<body>
    <div class="user-dashboard">
        <!-- User Profile Section -->
        <div class="user-profile">
            <div class="profile-photo-container">
                <div class="profile-photo">
                    <img id="profileImage" src="<?php echo htmlspecialchars($user['profile_photo'] ?? '/assets/images/default-avatar.png'); ?>" alt="Profile Photo">
                    <div class="photo-overlay">
                        <i class="fas fa-camera"></i>
                        <span>Update Photo</span>
                    </div>
                </div>
                <input type="file" id="photoInput" accept="image/*" style="display: none;">
            </div>
            <div class="user-info">
                <h1>Welcome, <?php echo htmlspecialchars($user['first_name']); ?>!</h1>
                <p class="last-login">Last login: <?php echo htmlspecialchars($user['last_login']); ?></p>
            </div>
        </div>

        <!-- Rest of the dashboard content -->
        <div class="dashboard-container">
            <!-- Quick Actions -->
            <div class="quick-actions">
                <h2>Quick Actions</h2>
                <div class="action-buttons">
                    <a href="view-attendance.php" class="action-btn">
                        <i class="fas fa-calendar-check"></i>
                        <span>View Attendance</span>
                    </a>
                    <a href="view-grades.php" class="action-btn">
                        <i class="fas fa-graduation-cap"></i>
                        <span>Check Grades</span>
                    </a>
                    <a href="course-schedule.php" class="action-btn">
                        <i class="fas fa-clock"></i>
                        <span>Class Schedule</span>
                    </a>
                    <a href="assignments.php" class="action-btn">
                        <i class="fas fa-tasks"></i>
                        <span>Assignments</span>
                    </a>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="dashboard-grid">
                <!-- Upcoming Classes -->
                <div class="dashboard-card">
                    <h3>Today's Classes</h3>
                    <div class="class-list">
                        <?php if (!empty($user['today_classes'])): ?>
                            <?php foreach ($user['today_classes'] as $class): ?>
                                <div class="class-item">
                                    <div class="class-time"><?php echo htmlspecialchars($class['time']); ?></div>
                                    <div class="class-details">
                                        <h4><?php echo htmlspecialchars($class['subject']); ?></h4>
                                        <p>Room: <?php echo htmlspecialchars($class['room']); ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="no-classes">No classes scheduled for today</p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Recent Grades -->
                <div class="dashboard-card">
                    <h3>Recent Grades</h3>
                    <div class="grades-list">
                        <?php if (!empty($user['recent_grades'])): ?>
                            <?php foreach ($user['recent_grades'] as $grade): ?>
                                <div class="grade-item">
                                    <span class="subject"><?php echo htmlspecialchars($grade['subject']); ?></span>
                                    <span class="grade <?php echo $grade['score'] >= 70 ? 'passing' : 'failing'; ?>">
                                        <?php echo htmlspecialchars($grade['score']); ?>%
                                    </span>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="no-grades">No recent grades available</p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Upcoming Assignments -->
                <div class="dashboard-card">
                    <h3>Upcoming Assignments</h3>
                    <div class="assignment-list">
                        <?php if (!empty($user['upcoming_assignments'])): ?>
                            <?php foreach ($user['upcoming_assignments'] as $assignment): ?>
                                <div class="assignment-item">
                                    <div class="assignment-header">
                                        <h4><?php echo htmlspecialchars($assignment['title']); ?></h4>
                                        <span class="due-date">Due: <?php echo htmlspecialchars($assignment['due_date']); ?></span>
                                    </div>
                                    <p><?php echo htmlspecialchars($assignment['description']); ?></p>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="no-assignments">No upcoming assignments</p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Attendance Summary -->
                <div class="dashboard-card">
                    <h3>Attendance Summary</h3>
                    <div class="attendance-summary">
                        <div class="attendance-stat">
                            <span class="stat-label">Present</span>
                            <span class="stat-value"><?php echo htmlspecialchars($user['attendance']['present']); ?>%</span>
                        </div>
                        <div class="attendance-stat">
                            <span class="stat-label">Absent</span>
                            <span class="stat-value"><?php echo htmlspecialchars($user['attendance']['absent']); ?>%</span>
                        </div>
                        <div class="attendance-stat">
                            <span class="stat-label">Late</span>
                            <span class="stat-value"><?php echo htmlspecialchars($user['attendance']['late']); ?>%</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Notifications -->
            <div class="notifications-section">
                <h3>Recent Notifications</h3>
                <div class="notifications-list">
                    <?php if (!empty($user['notifications'])): ?>
                        <?php foreach ($user['notifications'] as $notification): ?>
                            <div class="notification-item <?php echo htmlspecialchars($notification['type']); ?>">
                                <div class="notification-icon">
                                    <i class="fas fa-<?php echo htmlspecialchars($notification['icon']); ?>"></i>
                                </div>
                                <div class="notification-content">
                                    <p><?php echo htmlspecialchars($notification['message']); ?></p>
                                    <span class="notification-time"><?php echo htmlspecialchars($notification['time']); ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="no-notifications">No new notifications</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/your-font-awesome-kit.js"></script>
    <script src="/assets/js/dashboard.js"></script>
    <script src="/assets/js/user-profile.js"></script>
</body>
</html>

<?php require_once '../includes/footer.php'; ?> 