<?php
require_once 'includes/session.php';
?>
<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <!-- Sidebar -->
    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Student Dashboard</h3>
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="#"><i class="fas fa-home"></i> Home</a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-book"></i> Courses</a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-calendar"></i> Schedule</a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-chart-bar"></i> Grades</a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-envelope"></i> Messages</a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-cog"></i> Settings</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="d-flex align-items-center">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user"></i> <span id="username">John Doe</span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="container-fluid">
                <!-- Profile Section -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="profile-picture-container">
                                    <img src="https://via.placeholder.com/150" alt="Profile Picture" class="profile-picture" id="profilePicture">
                                    <div class="profile-picture-overlay" onclick="document.getElementById('profilePictureInput').click()">
                                        <i class="fas fa-camera"></i>
                                    </div>
                                    <input type="file" id="profilePictureInput" hidden accept="image/*">
                                </div>
                                <h4 class="mt-3" id="profileName">John Doe</h4>
                                <p class="text-muted">Student ID: 12345</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Statistics Cards -->
                    <div class="col-md-3 mb-4">
                        <div class="card stat-card">
                            <div class="card-body">
                                <h5 class="card-title">Total Courses</h5>
                                <h2 class="card-text">6</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card stat-card">
                            <div class="card-body">
                                <h5 class="card-title">Average Grade</h5>
                                <h2 class="card-text">85%</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card stat-card">
                            <div class="card-body">
                                <h5 class="card-title">Assignments Due</h5>
                                <h2 class="card-text">4</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card stat-card">
                            <div class="card-body">
                                <h5 class="card-title">Messages</h5>
                                <h2 class="card-text">3</h2>
                            </div>
                        </div>
                    </div>

                    <!-- Site Visits Graph -->
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                Site Visits
                            </div>
                            <div class="card-body">
                                <canvas id="visitsChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                Recent Activity
                            </div>
                            <div class="card-body">
                                <div id="activities">
                                    <div class="activity-item">
                                        <i class="fas fa-book text-primary"></i>
                                        <span>Completed Assignment in Math</span>
                                        <small class="text-muted">2 hours ago</small>
                                    </div>
                                    <div class="activity-item mt-3">
                                        <i class="fas fa-grade text-success"></i>
                                        <span>New Grade Posted in Science</span>
                                        <small class="text-muted">5 hours ago</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Profile Modal -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editProfileForm">
                        <div class="mb-3">
                            <label for="editUsername" class="form-label">Username</label>
                            <input type="text" class="form-control" id="editUsername" value="John Doe">
                        </div>
                        <div class="mb-3">
                            <label for="editEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="editEmail" value="john.doe@example.com">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="saveProfile()">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Dark Mode Toggle Button -->
    <button class="dark-mode-toggle" id="darkModeToggle">
        <i class="fas fa-moon"></i>
        <span>Dark Mode</span>
    </button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html> 