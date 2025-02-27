// Dark mode functionality
const darkModeToggle = document.getElementById('darkModeToggle');
const html = document.documentElement;

// Check for saved dark mode preference
if (localStorage.getItem('darkMode') === 'enabled') {
    html.setAttribute('data-theme', 'dark');
    darkModeToggle.querySelector('i').classList.replace('fa-moon', 'fa-sun');
    darkModeToggle.querySelector('span').textContent = 'Light Mode';
}

darkModeToggle.addEventListener('click', () => {
    if (html.getAttribute('data-theme') === 'dark') {
        html.setAttribute('data-theme', 'light');
        localStorage.setItem('darkMode', 'disabled');
        darkModeToggle.querySelector('i').classList.replace('fa-sun', 'fa-moon');
        darkModeToggle.querySelector('span').textContent = 'Dark Mode';
    } else {
        html.setAttribute('data-theme', 'dark');
        localStorage.setItem('darkMode', 'enabled');
        darkModeToggle.querySelector('i').classList.replace('fa-moon', 'fa-sun');
        darkModeToggle.querySelector('span').textContent = 'Light Mode';
    }
});

// Profile picture functionality
const profilePictureInput = document.getElementById('profilePictureInput');
const profilePicture = document.getElementById('profilePicture');

profilePictureInput.addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const formData = new FormData();
        formData.append('profile_picture', file);

        fetch('api/upload_profile_picture.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                profilePicture.src = data.profile_picture;
            } else {
                alert('Failed to upload profile picture: ' + data.error);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Failed to upload profile picture');
        });
    }
});

// Load saved profile picture
if (localStorage.getItem('profilePicture')) {
    profilePicture.src = localStorage.getItem('profilePicture');
}

// Profile editing functionality
async function saveProfile() {
    const username = document.getElementById('editUsername').value;
    const email = document.getElementById('editEmail').value;

    try {
        const response = await fetch('api/update_profile.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                username: username,
                email: email
            })
        });

        const data = await response.json();
        
        if (data.success) {
            // Update displayed username
            document.getElementById('username').textContent = username;
            document.getElementById('profileName').textContent = username;

            // Close modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('editProfileModal'));
            modal.hide();
        } else {
            alert('Failed to update profile: ' + data.error);
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Failed to update profile');
    }
}

// Load saved profile data
if (localStorage.getItem('username')) {
    const username = localStorage.getItem('username');
    document.getElementById('username').textContent = username;
    document.getElementById('profileName').textContent = username;
    document.getElementById('editUsername').value = username;
}

if (localStorage.getItem('email')) {
    document.getElementById('editEmail').value = localStorage.getItem('email');
}

// Sidebar toggle functionality
document.getElementById('sidebarCollapse').addEventListener('click', function() {
    document.getElementById('sidebar').classList.toggle('active');
    document.getElementById('content').classList.toggle('active');
});

// Site visits chart
const ctx = document.getElementById('visitsChart').getContext('2d');
const visitsChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
        datasets: [{
            label: 'Site Visits',
            data: [65, 59, 80, 81, 56, 55, 40],
            fill: false,
            borderColor: getComputedStyle(document.documentElement).getPropertyValue('--primary-color'),
            tension: 0.1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    color: getComputedStyle(document.documentElement).getPropertyValue('--border-light')
                },
                ticks: {
                    color: getComputedStyle(document.documentElement).getPropertyValue('--text-light')
                }
            },
            x: {
                grid: {
                    color: getComputedStyle(document.documentElement).getPropertyValue('--border-light')
                },
                ticks: {
                    color: getComputedStyle(document.documentElement).getPropertyValue('--text-light')
                }
            }
        },
        plugins: {
            legend: {
                labels: {
                    color: getComputedStyle(document.documentElement).getPropertyValue('--text-light')
                }
            }
        }
    }
});

// Update chart colors when theme changes
const observer = new MutationObserver((mutations) => {
    mutations.forEach((mutation) => {
        if (mutation.attributeName === 'data-theme') {
            visitsChart.options.scales.y.grid.color = getComputedStyle(document.documentElement).getPropertyValue('--border-light');
            visitsChart.options.scales.x.grid.color = getComputedStyle(document.documentElement).getPropertyValue('--border-light');
            visitsChart.options.scales.y.ticks.color = getComputedStyle(document.documentElement).getPropertyValue('--text-light');
            visitsChart.options.scales.x.ticks.color = getComputedStyle(document.documentElement).getPropertyValue('--text-light');
            visitsChart.options.plugins.legend.labels.color = getComputedStyle(document.documentElement).getPropertyValue('--text-light');
            visitsChart.data.datasets[0].borderColor = getComputedStyle(document.documentElement).getPropertyValue('--primary-color');
            visitsChart.update();
        }
    });
});

observer.observe(html, { attributes: true }); 