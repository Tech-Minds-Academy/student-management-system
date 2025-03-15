document.addEventListener('DOMContentLoaded', function() {
    // Initialize dark mode
    initializeDarkMode();
    
    // Initialize real-time updates
    initializeRealTimeUpdates();
    
    // Initialize notifications
    initializeNotifications();

    // Profile image upload
    const uploadArea = document.getElementById('uploadArea');
    const profileImage = document.getElementById('profileImage');
    const imageInput = document.getElementById('imageInput');

    uploadArea.addEventListener('click', () => imageInput.click());
    uploadArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        uploadArea.classList.add('drag-over');
    });

    uploadArea.addEventListener('dragleave', () => {
        uploadArea.classList.remove('drag-over');
    });

    uploadArea.addEventListener('drop', (e) => {
        e.preventDefault();
        uploadArea.classList.remove('drag-over');
        const file = e.dataTransfer.files[0];
        handleImageUpload(file);
    });

    imageInput.addEventListener('change', (e) => {
        const file = e.target.files[0];
        handleImageUpload(file);
    });

    function handleImageUpload(file) {
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = (e) => {
                profileImage.src = e.target.result;
                // Here you would typically upload the file to the server
                uploadImageToServer(file);
            };
            reader.readAsDataURL(file);
        }
    }

    async function uploadImageToServer(file) {
        const formData = new FormData();
        formData.append('profile_image', file);

        try {
            const response = await fetch('/controllers/UserController.php?action=uploadImage', {
                method: 'POST',
                body: formData
            });
            const result = await response.json();
            if (result.success) {
                showNotification('Profile image updated successfully!', 'success');
            } else {
                showNotification('Failed to update profile image.', 'error');
            }
        } catch (error) {
            showNotification('An error occurred while uploading the image.', 'error');
        }
    }

    // Username update
    const usernameForm = document.getElementById('usernameForm');
    usernameForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const username = document.getElementById('username').value;

        try {
            const response = await fetch('/controllers/UserController.php?action=updateUsername', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ username })
            });
            const result = await response.json();
            if (result.success) {
                showNotification('Username updated successfully!', 'success');
            } else {
                showNotification('Failed to update username.', 'error');
            }
        } catch (error) {
            showNotification('An error occurred while updating username.', 'error');
        }
    });

    // Save user preferences
    const preferencesForm = document.getElementById('preferencesForm');
    preferencesForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(preferencesForm);
        const preferences = Object.fromEntries(formData.entries());

        try {
            const response = await fetch('/controllers/UserController.php?action=updatePreferences', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(preferences)
            });
            const result = await response.json();
            if (result.success) {
                showNotification('Preferences saved successfully!', 'success');
            } else {
                showNotification('Failed to save preferences.', 'error');
            }
        } catch (error) {
            showNotification('An error occurred while saving preferences.', 'error');
        }
    });
});

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

function initializeRealTimeUpdates() {
    // Update times every minute
    updateTimes();
    setInterval(updateTimes, 60000);

    // Refresh dashboard data every 5 minutes
    setInterval(refreshDashboardData, 300000);
}

function updateTimes() {
    // Update class times
    document.querySelectorAll('.class-time').forEach(timeElement => {
        const timestamp = timeElement.dataset.time;
        if (timestamp) {
            const date = new Date(parseInt(timestamp) * 1000);
            timeElement.textContent = date.toLocaleTimeString([], { 
                hour: '2-digit', 
                minute: '2-digit' 
            });
        }
    });

    // Update assignment due dates
    document.querySelectorAll('.due-date').forEach(dateElement => {
        const timestamp = dateElement.dataset.time;
        if (timestamp) {
            const dueDate = new Date(parseInt(timestamp) * 1000);
            const now = new Date();
            const diffHours = (dueDate - now) / (1000 * 60 * 60);

            if (diffHours < 0) {
                dateElement.textContent = 'Past due';
                dateElement.classList.add('past-due');
            } else if (diffHours < 24) {
                dateElement.textContent = 'Due today';
                dateElement.classList.add('due-soon');
            } else if (diffHours < 48) {
                dateElement.textContent = 'Due tomorrow';
                dateElement.classList.add('due-soon');
            }
        }
    });
}

async function refreshDashboardData() {
    try {
        const response = await fetch('/controllers/DashboardController.php?action=refresh', {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        if (!response.ok) throw new Error('Failed to refresh dashboard data');

        const data = await response.json();
        updateDashboardSections(data);
    } catch (error) {
        console.error('Error refreshing dashboard:', error);
    }
}

function updateDashboardSections(data) {
    // Update classes
    if (data.classes) {
        const classList = document.querySelector('.class-list');
        if (classList) {
            classList.innerHTML = generateClassesHTML(data.classes);
        }
    }

    // Update grades
    if (data.grades) {
        const gradesList = document.querySelector('.grades-list');
        if (gradesList) {
            gradesList.innerHTML = generateGradesHTML(data.grades);
        }
    }

    // Update assignments
    if (data.assignments) {
        const assignmentsList = document.querySelector('.assignment-list');
        if (assignmentsList) {
            assignmentsList.innerHTML = generateAssignmentsHTML(data.assignments);
        }
    }

    // Update attendance
    if (data.attendance) {
        updateAttendanceStats(data.attendance);
    }
}

function generateClassesHTML(classes) {
    if (!classes.length) {
        return '<p class="no-classes">No classes scheduled for today</p>';
    }

    return classes.map(classItem => `
        <div class="class-item">
            <div class="class-time" data-time="${classItem.timestamp}">${formatTime(classItem.time)}</div>
            <div class="class-details">
                <h4>${escapeHTML(classItem.subject)}</h4>
                <p>Room: ${escapeHTML(classItem.room)}</p>
            </div>
        </div>
    `).join('');
}

function generateGradesHTML(grades) {
    if (!grades.length) {
        return '<p class="no-grades">No recent grades available</p>';
    }

    return grades.map(grade => `
        <div class="grade-item">
            <span class="subject">${escapeHTML(grade.subject)}</span>
            <span class="grade ${grade.score >= 70 ? 'passing' : 'failing'}">
                ${escapeHTML(grade.score)}%
            </span>
        </div>
    `).join('');
}

function generateAssignmentsHTML(assignments) {
    if (!assignments.length) {
        return '<p class="no-assignments">No upcoming assignments</p>';
    }

    return assignments.map(assignment => `
        <div class="assignment-item">
            <div class="assignment-header">
                <h4>${escapeHTML(assignment.title)}</h4>
                <span class="due-date" data-time="${assignment.due_timestamp}">
                    Due: ${formatDate(assignment.due_date)}
                </span>
            </div>
            <p>${escapeHTML(assignment.description)}</p>
        </div>
    `).join('');
}

function updateAttendanceStats(attendance) {
    Object.entries(attendance).forEach(([type, value]) => {
        const statElement = document.querySelector(`.attendance-stat .stat-value[data-type="${type}"]`);
        if (statElement) {
            statElement.textContent = `${value}%`;
        }
    });
}

// Utility functions
function formatTime(timeString) {
    return new Date(timeString).toLocaleTimeString([], { 
        hour: '2-digit', 
        minute: '2-digit' 
    });
}

function formatDate(dateString) {
    return new Date(dateString).toLocaleDateString([], { 
        month: 'short', 
        day: 'numeric', 
        year: 'numeric' 
    });
}

function escapeHTML(str) {
    const div = document.createElement('div');
    div.textContent = str;
    return div.innerHTML;
}

// Notification system
function showNotification(message, type) {
    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    notification.textContent = message;
    document.body.appendChild(notification);

    setTimeout(() => {
        notification.classList.add('fade-out');
        setTimeout(() => notification.remove(), 500);
    }, 3000);
}

// Error handling
window.addEventListener('error', function(e) {
    console.error('JavaScript error:', e.error);
}); 