document.addEventListener('DOMContentLoaded', function() {
    // Initialize profile photo upload
    initializeProfilePhoto();

    // Initialize dark mode
    initializeDarkMode();

    // Initialize notifications
    initializeNotifications();

    // Initialize real-time updates
    initializeRealTimeUpdates();

    // Initialize charts if any attendance or grade data is present
    initializeCharts();
});

function initializeProfilePhoto() {
    const profilePhoto = document.querySelector('.profile-photo');
    const photoInput = document.getElementById('photoInput');
    const profileImage = document.getElementById('profileImage');

    if (profilePhoto && photoInput) {
        // Click on profile photo to trigger file input
        profilePhoto.addEventListener('click', () => {
            photoInput.click();
        });

        // Handle file selection
        photoInput.addEventListener('change', async (e) => {
            const file = e.target.files[0];
            if (file && file.type.startsWith('image/')) {
                try {
                    // Show preview immediately
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        profileImage.src = e.target.result;
                    };
                    reader.readAsDataURL(file);

                    // Upload to server
                    await uploadProfilePhoto(file);
                } catch (error) {
                    console.error('Error uploading profile photo:', error);
                    showNotification('Failed to upload profile photo', 'error');
                }
            } else {
                showNotification('Please select a valid image file', 'error');
            }
        });
    }
}

async function uploadProfilePhoto(file) {
    const formData = new FormData();
    formData.append('profile_photo', file);

    try {
        const response = await fetch('/controllers/UserController.php?action=updateProfilePhoto', {
            method: 'POST',
            body: formData
        });

        const result = await response.json();
        if (result.success) {
            showNotification('Profile photo updated successfully!', 'success');
        } else {
            throw new Error(result.message || 'Failed to update profile photo');
        }
    } catch (error) {
        console.error('Error:', error);
        showNotification(error.message, 'error');
        throw error;
    }
}

// Show notification function (if not already defined)
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    // Remove notification after 3 seconds
    setTimeout(() => {
        notification.classList.add('fade-out');
        setTimeout(() => notification.remove(), 500);
    }, 3000);
}

function initializeDarkMode() {
    const darkModeToggle = document.querySelector('.dark-mode-toggle');
    if (darkModeToggle) {
        const savedTheme = localStorage.getItem('theme') || 'light';
        document.documentElement.setAttribute('data-theme', savedTheme);
        darkModeToggle.checked = savedTheme === 'dark';

        darkModeToggle.addEventListener('change', function() {
            const theme = this.checked ? 'dark' : 'light';
            document.documentElement.setAttribute('data-theme', theme);
            localStorage.setItem('theme', theme);
        });
    }
}

function initializeNotifications() {
    // Mark notifications as read when clicked
    const notifications = document.querySelectorAll('.notification-item');
    notifications.forEach(notification => {
        notification.addEventListener('click', async function() {
            if (!this.classList.contains('read')) {
                try {
                    const notificationId = this.dataset.id;
                    const response = await fetch('/controllers/NotificationController.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            action: 'markAsRead',
                            notification_id: notificationId
                        })
                    });

                    if (response.ok) {
                        this.classList.add('read');
                        updateNotificationCount();
                    }
                } catch (error) {
                    console.error('Error marking notification as read:', error);
                }
            }
        });
    });
}

function updateNotificationCount() {
    const unreadCount = document.querySelectorAll('.notification-item:not(.read)').length;
    const badge = document.querySelector('.notification-badge');
    if (badge) {
        badge.textContent = unreadCount;
        badge.style.display = unreadCount > 0 ? 'block' : 'none';
    }
}

function initializeRealTimeUpdates() {
    // Update time displays
    updateTimes();
    setInterval(updateTimes, 60000); // Update every minute

    // Check for new notifications periodically
    setInterval(checkNewNotifications, 300000); // Check every 5 minutes
}

function updateTimes() {
    // Update class times
    document.querySelectorAll('.class-time').forEach(timeElement => {
        const timestamp = timeElement.dataset.time;
        if (timestamp) {
            const date = new Date(parseInt(timestamp) * 1000);
            timeElement.textContent = date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        }
    });

    // Update due dates
    document.querySelectorAll('.due-date').forEach(dateElement => {
        const timestamp = dateElement.dataset.time;
        if (timestamp) {
            const date = new Date(parseInt(timestamp) * 1000);
            const now = new Date();
            const diff = date - now;
            
            if (diff < 0) {
                dateElement.textContent = 'Past due';
                dateElement.classList.add('past-due');
            } else if (diff < 86400000) { // Less than 24 hours
                dateElement.textContent = 'Due today';
                dateElement.classList.add('due-soon');
            }
        }
    });
}

async function checkNewNotifications() {
    try {
        const response = await fetch('/controllers/NotificationController.php?action=checkNew');
        const data = await response.json();
        
        if (data.hasNew) {
            // Refresh notifications list
            const notificationsList = document.querySelector('.notifications-list');
            if (notificationsList) {
                notificationsList.innerHTML = data.notificationsHtml;
                initializeNotifications(); // Reinitialize click handlers
                showNotificationAlert();
            }
        }
    } catch (error) {
        console.error('Error checking for new notifications:', error);
    }
}

function showNotificationAlert() {
    const alert = document.createElement('div');
    alert.className = 'notification-alert';
    alert.textContent = 'New notifications available';
    
    document.body.appendChild(alert);
    setTimeout(() => {
        alert.classList.add('fade-out');
        setTimeout(() => alert.remove(), 500);
    }, 3000);
}

function initializeCharts() {
    // Initialize attendance chart if element exists
    const attendanceChart = document.getElementById('attendanceChart');
    if (attendanceChart) {
        new Chart(attendanceChart, {
            type: 'doughnut',
            data: {
                labels: ['Present', 'Absent', 'Late'],
                datasets: [{
                    data: [
                        parseFloat(attendanceChart.dataset.present),
                        parseFloat(attendanceChart.dataset.absent),
                        parseFloat(attendanceChart.dataset.late)
                    ],
                    backgroundColor: [
                        '#2ecc71',
                        '#e74c3c',
                        '#f1c40f'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    }

    // Initialize grades chart if element exists
    const gradesChart = document.getElementById('gradesChart');
    if (gradesChart) {
        const grades = JSON.parse(gradesChart.dataset.grades);
        new Chart(gradesChart, {
            type: 'line',
            data: {
                labels: grades.map(grade => grade.date),
                datasets: [{
                    label: 'Grade Progress',
                    data: grades.map(grade => grade.score),
                    borderColor: '#4a90e2',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100
                    }
                }
            }
        });
    }
}

// Handle any errors gracefully
window.addEventListener('error', function(e) {
    console.error('JavaScript error:', e.error);
    // You might want to send this to your error tracking service
}); 