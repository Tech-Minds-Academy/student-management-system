<?php
session_start();
require_once '../../config/Database.php';
require_once '../../models/User.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$database = new Database();
$db = $database->getConnection();
$user = new User($db);

// Get user settings
$userSettings = $user->getUserSettings($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --bg-color: <?php echo $userSettings['background_color'] ?? '#ffffff'; ?>;
            --font-size: <?php echo $userSettings['font_size'] ?? '16px'; ?>;
        }
        body {
            background-color: var(--bg-color);
            font-size: var(--font-size);
            transition: background-color 0.3s, color 0.3s;
        }
        body.dark-mode {
            background-color: #333;
            color: #fff;
        }
        .profile-section {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 20px;
            margin: 20px 0;
        }
        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }
        .stats-card {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 15px;
            margin: 10px 0;
        }
    </style>
</head>
<body class="<?php echo isset($_COOKIE['dark_mode']) && $_COOKIE['dark_mode'] === 'true' ? 'dark-mode' : ''; ?>">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Dashboard</a>
            <div class="d-flex align-items-center">
                <button class="btn btn-outline-light me-2" id="theme-toggle">
                    <i class="fas fa-moon"></i>
                </button>
                <a href="../logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container py-4">
        <div class="row">
            <!-- Profile Section -->
            <div class="col-md-4">
                <div class="profile-section">
                    <div class="text-center mb-3">
                        <img src="<?php echo htmlspecialchars($_SESSION['profile_picture'] ?? '../../assets/images/default.jpg'); ?>" 
                             alt="Profile Picture" class="profile-picture mb-3">
                        <form id="profile-picture-form" enctype="multipart/form-data">
                            <input type="file" id="profile-picture" name="profile_picture" class="form-control mb-2">
                            <button type="submit" class="btn btn-primary">Update Picture</button>
                        </form>
                    </div>
                    <h4 class="text-center"><?php echo htmlspecialchars($_SESSION['username']); ?></h4>
                </div>

                <!-- Settings Section -->
                <div class="profile-section">
                    <h5>Appearance Settings</h5>
                    <div class="mb-3">
                        <label for="font-size" class="form-label">Font Size</label>
                        <select class="form-select" id="font-size">
                            <option value="small">Small</option>
                            <option value="medium" selected>Medium</option>
                            <option value="large">Large</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="background-color" class="form-label">Background Color</label>
                        <input type="color" class="form-control" id="background-color" 
                               value="<?php echo $userSettings['background_color'] ?? '#ffffff'; ?>">
                    </div>
                </div>
            </div>

            <!-- Main Content Section -->
            <div class="col-md-8">
                <!-- User Statistics -->
                <div class="profile-section">
                    <h4>User Statistics</h4>
                    <canvas id="userStatsChart"></canvas>
                </div>

                <!-- Recent Activity -->
                <div class="profile-section">
                    <h4>Recent Activity</h4>
                    <div id="activity-log">
                        <!-- Activity log will be loaded here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Theme Toggle
        const themeToggle = document.getElementById('theme-toggle');
        themeToggle.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
            const isDarkMode = document.body.classList.contains('dark-mode');
            document.cookie = `dark_mode=${isDarkMode}; path=/; max-age=31536000`;
        });

        // Profile Picture Upload
        document.getElementById('profile-picture-form').addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(e.target);
            try {
                const response = await fetch('../../controllers/update_profile_picture.php', {
                    method: 'POST',
                    body: formData
                });
                const result = await response.json();
                if (result.success) {
                    location.reload();
                }
            } catch (error) {
                console.error('Error:', error);
            }
        });

        // User Statistics Chart
        const ctx = document.getElementById('userStatsChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Activity Level',
                    data: [12, 19, 3, 5, 2, 3],
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Settings Update
        document.getElementById('font-size').addEventListener('change', async (e) => {
            const fontSize = e.target.value;
            try {
                const response = await fetch('../../controllers/update_settings.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ font_size: fontSize })
                });
                if (response.ok) {
                    document.documentElement.style.setProperty('--font-size', fontSize);
                }
            } catch (error) {
                console.error('Error:', error);
            }
        });

        document.getElementById('background-color').addEventListener('change', async (e) => {
            const backgroundColor = e.target.value;
            try {
                const response = await fetch('../../controllers/update_settings.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ background_color: backgroundColor })
                });
                if (response.ok) {
                    document.documentElement.style.setProperty('--bg-color', backgroundColor);
                }
            } catch (error) {
                console.error('Error:', error);
            }
        });

        // Load Activity Log
        async function loadActivityLog() {
            try {
                const response = await fetch('../../controllers/get_activity_log.php');
                const activities = await response.json();
                const activityLog = document.getElementById('activity-log');
                activityLog.innerHTML = activities.map(activity => `
                    <div class="activity-item">
                        <p><strong>${activity.activity_type}</strong> - ${activity.created_at}</p>
                    </div>
                `).join('');
            } catch (error) {
                console.error('Error:', error);
            }
        }

        loadActivityLog();
    </script>
</body>
</html> 