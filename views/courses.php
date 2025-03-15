<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../includes/header.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: /login");
    exit();
}

// Get user data
$userId = $_SESSION['user_id'];
$userRole = $_SESSION['user_role'];
?>

<div class="custom-container">
    <div class="row mb-4">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h2>Courses</h2>
            <?php if ($userRole === 'admin' || $userRole === 'teacher'): ?>
            <a href="/courses/add" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Add New Course
            </a>
            <?php endif; ?>
        </div>
    </div>

    <!-- Search and Filter -->
    <div class="row mb-4">
        <div class="col-md-8">
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fas fa-search"></i>
                </span>
                <input type="text" class="form-control" id="courseSearch" placeholder="Search courses...">
            </div>
        </div>
        <div class="col-md-4">
            <select class="form-select" id="courseFilter">
                <option value="">All Categories</option>
                <option value="mathematics">Mathematics</option>
                <option value="science">Science</option>
                <option value="history">History</option>
                <option value="language">Language</option>
            </select>
        </div>
    </div>

    <!-- Courses Grid -->
    <div class="row" id="coursesGrid">
        <!-- Course Card Template -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Mathematics 101</h5>
                    <span class="badge bg-primary">Active</span>
                </div>
                <div class="card-body">
                    <p class="card-text">Introduction to basic mathematical concepts and problem-solving techniques.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-user me-2"></i>Prof. John Smith</li>
                        <li><i class="fas fa-clock me-2"></i>Mon, Wed 10:00 AM</li>
                        <li><i class="fas fa-users me-2"></i>30 Students</li>
                    </ul>
                </div>
                <div class="card-footer bg-transparent">
                    <div class="d-grid gap-2">
                        <a href="/courses/1" class="btn btn-outline-primary">
                            <i class="fas fa-info-circle me-2"></i>View Details
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Repeat similar cards for other courses -->
    </div>

    <!-- Pagination -->
    <div class="row mt-4">
        <div class="col-12">
            <nav aria-label="Course pagination">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
