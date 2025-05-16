<!-- filepath: c:\Users\USER\Documents\student-management-system\app\views\user\profile.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="/app/assets/css/styles.css">
    <style>
        /* Modern styles for the profile page */
        .profile-container {
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .profile-header {
            background: linear-gradient(to right, #667eea, #764ba2);
            color: white;
            text-align: center;
            padding: 30px 20px;
        }

        .profile-header img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid white;
            margin-top: -60px;
            background: white;
        }

        .profile-header h2 {
            margin: 10px 0;
            font-size: 24px;
        }

        .profile-header p {
            font-size: 16px;
            color: #ddd;
        }

        .profile-content {
            padding: 20px;
        }

        .profile-content h3 {
            margin-bottom: 20px;
            color: #333;
            font-size: 20px;
        }

        .profile-details {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .profile-details .detail {
            flex: 1 1 45%;
            background: #f5f7fa;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .profile-details .detail h4 {
            margin-bottom: 10px;
            color: #667eea;
            font-size: 16px;
        }

        .profile-details .detail p {
            font-size: 14px;
            color: #555;
        }

        .profile-footer {
            text-align: center;
            padding: 20px;
            background: #f9f9f9;
            border-top: 1px solid #ddd;
        }

        .profile-footer a {
            color: #667eea;
            text-decoration: none;
            font-weight: bold;
        }

        .profile-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="profile-container">
        <!-- Profile Header -->
        <div class="profile-header">
            <img src="/app/assets/images/default-avatar.png" alt="User Avatar">
            <h2><?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?></h2>
            <p><?= htmlspecialchars($user['email']) ?></p>
        </div>

        <!-- Profile Content -->
        <div class="profile-content">
            <h3>Profile Details</h3>
            <div class="profile-details">
                <div class="detail">
                    <h4>First Name</h4>
                    <p><?= htmlspecialchars($user['first_name']) ?></p>
                </div>
                <div class="detail">
                    <h4>Last Name</h4>
                    <p><?= htmlspecialchars($user['last_name']) ?></p>
                </div>
                <div class="detail">
                    <h4>Email</h4>
                    <p><?= htmlspecialchars($user['email']) ?></p>
                </div>
                <div class="detail">
                    <h4>Phone</h4>
                    <p><?= htmlspecialchars($user['phone'] ?? 'N/A') ?></p>
                </div>
            </div>
        </div>

        <!-- Profile Footer -->
        <div class="profile-footer">
            <a href="/logout">Logout</a>
        </div>
    </div>
</body>

</html>