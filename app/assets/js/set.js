    function loadContent(section) {
            let content = document.getElementById("content");
            let header = document.getElementById("header");
            content.classList.add("fade");
            setTimeout(() => {
                header.innerHTML = `<h1>${section}</h1>`;
                if (section === "Dashboard") {
                    content.innerHTML = `<h2>Dashboard</h2>
                        <p>Welcome to the admin dashboard. Manage system activities here.</p>
                        <ul>
                            <li>Total Users: 500</li>
                            <li>Recent Activities</li>
                            <li>System Performance</li>
                        </ul>`;
                } else if (section === "Users") {
                    content.innerHTML = `<h2>User Management</h2>
                        <p>Manage system users here.</p>
                        <table border='1' width='100%'>
                            <tr><th>ID</th><th>Name</th><th>Role</th></tr>
                            <tr><td>1</td><td>John Doe</td><td>Admin</td></tr>
                            <tr><td>2</td><td>Jane Smith</td><td>Student</td></tr>
                        </table>`;
                } else if (section === "Settings") {
                    content.innerHTML = `<h2>System Settings</h2>
                        <p>Modify system configurations here.</p>
                        <ul>
                            <li>Website Name: <input type='text' value='Admin Panel'></li>
                            <li>Theme: <select><option>Light</option><option>Dark</option></select></li>
                            <li>Email Configurations</li>
                        </ul>
                        <button onclick='alert("Settings Saved!")'>Save Changes</button>`;
                } else if (section === "Access Control") {
                    content.innerHTML = `<h2>Access Control</h2>
                        <p>Manage roles and permissions.</p>
                        <ul>
                            <li>Assign Admin Roles</li>
                            <li>Manage Permissions</li>
                        </ul>`;
                } else if (section === "Reports & Logs") {
                    content.innerHTML = `<h2>Reports & Logs</h2>
                        <p>View system logs and reports.</p>
                        <ul>
                            <li>Recent Login Attempts</li>
                            <li>System Errors</li>
                            <li>Activity History</li>
                        </ul>`;
                }
                content.classList.remove("fade");
            }, 300);
        }
        document.addEventListener("DOMContentLoaded", function() {
            let menuItems = document.querySelectorAll(".sidebar ul li");
            menuItems.forEach(item => {
                item.addEventListener("click", function() {
                    loadContent(this.textContent);
                });
            });
        });