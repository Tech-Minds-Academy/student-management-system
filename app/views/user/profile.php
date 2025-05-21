<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile | Student Portal</title>
    <link rel="stylesheet" href="/app/assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f2f5;
            color: #333;
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Main container */
        .main-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar styles */
        .sidebar {
            width: 260px;
            background: linear-gradient(135deg, #3a6186, #89253e);
            color: #fff;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 100;
            box-shadow: 3px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar-header {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .profile-pic-container {
            width: 80px;
            height: 80px;
            margin: 0 auto 15px;
            position: relative;
            cursor: pointer;
        }

        .profile-pic {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid rgba(255, 255, 255, 0.3);
            transition: transform 0.3s ease;
        }

        .profile-pic:hover {
            transform: scale(1.05);
        }

        .sidebar-header h3 {
            margin-bottom: 5px;
            font-weight: 600;
            font-size: 18px;
        }

        .sidebar-header p {
            font-size: 13px;
            opacity: 0.8;
        }

        .sidebar-menu {
            flex: 1;
            padding: 20px 0;
            overflow-y: auto;
        }

        .sidebar-menu ul {
            list-style: none;
        }

        .sidebar-menu li {
            padding: 12px 20px;
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: all 0.2s ease;
            margin-bottom: 5px;
            border-left: 4px solid transparent;
        }

        .sidebar-menu li:hover {
            background: rgba(255, 255, 255, 0.1);
            border-left-color: rgba(255, 255, 255, 0.5);
        }

        .sidebar-menu li.active {
            background: rgba(255, 255, 255, 0.2);
            border-left-color: #fff;
        }

        .sidebar-menu li i {
            margin-right: 10px;
            font-size: 18px;
            width: 25px;
            text-align: center;
        }

        .sidebar-footer {
            padding: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .logout-btn {
            width: 100%;
            padding: 10px;
            background: rgba(255, 255, 255, 0.1);
            border: none;
            border-radius: 5px;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .logout-btn i {
            margin-right: 8px;
        }

        /* Main content styles */
        .main-content {
            flex: 1;
            margin-left: 260px;
            padding: 20px;
            transition: margin-left 0.3s ease;
        }

        /* Menu toggle for mobile */
        .menu-toggle {
            position: fixed;
            top: 20px;
            left: 20px;
            background: #fff;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: none;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 101;
        }

        /* Enhanced profile container */
        .profile-container {
            max-width: 900px;
            margin: 30px auto;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .profile-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        /* Decorative elements */
        .profile-container::before {
            content: "";
            position: absolute;
            top: -50px;
            right: -50px;
            width: 150px;
            height: 150px;
            background: rgba(102, 126, 234, 0.1);
            border-radius: 50%;
            z-index: 0;
        }

        .profile-container::after {
            content: "";
            position: absolute;
            bottom: -50px;
            left: -50px;
            width: 200px;
            height: 200px;
            background: rgba(118, 75, 162, 0.1);
            border-radius: 50%;
            z-index: 0;
        }

        /* Enhanced profile header */
        .profile-header {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            text-align: center;
            padding: 60px 20px 30px;
            position: relative;
            overflow: hidden;
        }

        .profile-header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none"><path d="M0,0 L100,0 L100,100 Z" fill="rgba(255,255,255,0.1)"/></svg>');
            background-size: 100% 100%;
        }

        /* Profile picture upload styling */
        .profile-pic-container {
            width: 80px;
            height: 80px;
            margin: 0 auto 15px;
            position: relative;
            cursor: pointer;
        }

        .profile-pic-container::after {
            content: "\f030";
            font-family: "Font Awesome 5 Free";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            opacity: 0;
            transition: opacity 0.3s ease;
            font-size: 24px;
        }

        .profile-pic-container:hover::after {
            opacity: 1;
        }

        .avatar-container {
            position: relative;
            width: 150px;
            height: 150px;
            margin: 0 auto 20px;
            cursor: pointer;
        }

        .avatar-container::after {
            content: "\f030";
            font-family: "Font Awesome 5 Free";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            opacity: 0;
            transition: opacity 0.3s ease;
            font-size: 36px;
            z-index: 5;
        }

        .avatar-container:hover::after {
            opacity: 1;
        }

        /* Toast notification */
        .toast-notification {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #4CAF50;
            color: white;
            padding: 15px 25px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            gap: 10px;
            z-index: 1000;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .toast-notification.show {
            opacity: 1;
            transform: translateY(0);
        }

        .toast-notification i {
            font-size: 20px;
        }

        .avatar-container {
            position: relative;
            width: 150px;
            height: 150px;
            margin: 0 auto 20px;
        }

        .profile-header img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 5px solid white;
            background: white;
            object-fit: cover;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
            position: relative;
            z-index: 2;
        }

        .profile-header img:hover {
            transform: scale(1.05);
        }

        .avatar-badge {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background: #4CAF50;
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 3px solid white;
            z-index: 3;
        }

        .profile-header h2 {
            margin: 10px 0;
            font-size: 28px;
            font-weight: 600;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .profile-header p {
            font-size: 16px;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 5px;
        }

        .profile-stats {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            gap: 30px;
        }

        .stat-item {
            text-align: center;
        }

        .stat-value {
            font-size: 24px;
            font-weight: 600;
        }

        .stat-label {
            font-size: 12px;
            opacity: 0.8;
        }

        /* Enhanced profile content */
        .profile-content {
            padding: 30px;
            position: relative;
            z-index: 1;
        }

        .profile-content h3 {
            margin-bottom: 25px;
            color: #333;
            font-size: 22px;
            font-weight: 600;
            position: relative;
            display: inline-block;
        }

        .profile-content h3::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(to right, #667eea, #764ba2);
            border-radius: 3px;
        }

        .profile-details {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .profile-details .detail {
            background: #f8fafc;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-left: 4px solid #667eea;
        }

        .profile-details .detail:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .profile-details .detail h4 {
            margin-bottom: 12px;
            color: #667eea;
            font-size: 16px;
            font-weight: 600;
            display: flex;
            align-items: center;
        }

        .profile-details .detail h4 i {
            margin-right: 10px;
            font-size: 18px;
        }

        .profile-details .detail p {
            font-size: 15px;
            color: #444;
            padding: 5px 0;
            border-bottom: 1px dashed #e0e0e0;
            word-break: break-word;
        }

        /* Additional sections */
        .profile-actions {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
        }

        .action-btn {
            padding: 12px 20px;
            background: #f8fafc;
            border: none;
            border-radius: 8px;
            color: #667eea;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.05);
        }

        .action-btn:hover {
            background: #667eea;
            color: white;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        .action-btn.primary {
            background: #667eea;
            color: white;
        }

        .action-btn.primary:hover {
            background: #5a6fd1;
        }

        /* Enhanced profile footer */
        .profile-footer {
            text-align: center;
            padding: 25px;
            background: #f8fafc;
            border-top: 1px solid #edf2f7;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .profile-footer a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .profile-footer a:hover {
            color: #5a6fd1;
        }

        .footer-links {
            display: flex;
            gap: 20px;
        }

        .last-login {
            color: #888;
            font-size: 14px;
        }

        /* Page styles */
        .page {
            display: none;
            animation: fadeIn 0.5s ease;
        }

        .page.active {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Animation keyframes */
        .animate-fade-in {
            animation: fadeIn 0.5s ease forwards;
        }

        .delay-1 { animation-delay: 0.1s; }
        .delay-2 { animation-delay: 0.2s; }
        .delay-3 { animation-delay: 0.3s; }
        .delay-4 { animation-delay: 0.4s; }

        /* Calendar Styles */
        .calendar-container {
            max-width: 1000px;
            margin: 30px auto;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .calendar-header {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .calendar-header h2 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }

        .calendar-nav {
            display: flex;
            gap: 10px;
        }

        .calendar-nav button {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .calendar-nav button:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .calendar-month {
            font-size: 20px;
            font-weight: 500;
            margin: 0 15px;
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            padding: 20px;
            gap: 10px;
        }

        .calendar-day-header {
            text-align: center;
            font-weight: 600;
            color: #667eea;
            padding: 10px 0;
            font-size: 14px;
        }

        .calendar-day {
            min-height: 100px;
            border-radius: 8px;
            padding: 10px;
            background: #f8fafc;
            position: relative;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .calendar-day:hover {
            background: #edf2f7;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .calendar-day.today {
            background: rgba(102, 126, 234, 0.1);
            border: 2px solid #667eea;
        }

        .calendar-day.other-month {
            opacity: 0.5;
        }

        .calendar-day-number {
            position: absolute;
            top: 5px;
            right: 8px;
            font-size: 14px;
            font-weight: 600;
            color: #667eea;
            height: 25px;
            width: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .calendar-day.today .calendar-day-number {
            background: #667eea;
            color: white;
        }

        .calendar-events {
            margin-top: 25px;
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .calendar-event {
            padding: 5px 8px;
            border-radius: 4px;
            font-size: 12px;
            color: white;
            margin-bottom: 5px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        .calendar-event:hover {
            transform: translateX(2px);
        }

        .calendar-event.class {
            background: #4CAF50;
        }

        .calendar-event.assignment {
            background: #FF9800;
        }

        .calendar-event.exam {
            background: #F44336;
        }

        .calendar-event.meeting {
            background: #2196F3;
        }

        .calendar-event.other {
            background: #9C27B0;
        }

        .calendar-actions {
            padding: 20px;
            display: flex;
            justify-content: space-between;
            border-top: 1px solid #edf2f7;
        }

        .calendar-legend {
            display: flex;
            gap: 15px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 14px;
        }

        .legend-color {
            width: 12px;
            height: 12px;
            border-radius: 3px;
        }

        .legend-color.class {
            background: #4CAF50;
        }

        .legend-color.assignment {
            background: #FF9800;
        }

        .legend-color.exam {
            background: #F44336;
        }

        .legend-color.meeting {
            background: #2196F3;
        }

        .legend-color.other {
            background: #9C27B0;
        }

        /* Event Modal */
        .event-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .event-modal.show {
            opacity: 1;
            visibility: visible;
        }

        .event-modal-content {
            background: white;
            border-radius: 12px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            transform: translateY(20px);
            transition: transform 0.3s ease;
        }

        .event-modal.show .event-modal-content {
            transform: translateY(0);
        }

        .event-modal-header {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .event-modal-header h3 {
            margin: 0;
            font-size: 20px;
        }

        .event-modal-close {
            background: none;
            border: none;
            color: white;
            font-size: 20px;
            cursor: pointer;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: background 0.3s ease;
        }

        .event-modal-close:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .event-modal-body {
            padding: 20px;
        }

        .event-form-group {
            margin-bottom: 15px;
        }

        .event-form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
            color: #333;
        }

        .event-form-group input,
        .event-form-group select,
        .event-form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
        }

        .event-form-group textarea {
            min-height: 100px;
            resize: vertical;
        }

        .event-modal-footer {
            padding: 15px 20px;
            border-top: 1px solid #edf2f7;
            display: flex;
            justify-content: space-between;
        }

        .event-modal-footer button {
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-cancel {
            background: #f1f5f9;
            color: #64748b;
        }

        .btn-cancel:hover {
            background: #e2e8f0;
        }

        .btn-save {
            background: #667eea;
            color: white;
        }

        .btn-save:hover {
            background: #5a6fd1;
        }

        .btn-delete {
            background: #ef4444;
            color: white;
        }

        .btn-delete:hover {
            background: #dc2626;
        }

        .add-event-btn {
            padding: 10px 20px;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 6px;
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .add-event-btn:hover {
            background: #5a6fd1;
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .profile-details {
                grid-template-columns: 1fr 1fr;
            }
            
            .profile-actions {
                flex-wrap: wrap;
            }
            
            .action-btn {
                flex: 1;
                min-width: 120px;
            }

            .calendar-grid {
                gap: 5px;
            }

            .calendar-day {
                min-height: 80px;
                padding: 5px;
            }

            .calendar-event {
                padding: 3px 5px;
                font-size: 10px;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                left: -260px;
            }
            
            .sidebar.active {
                left: 0;
            }
            
            .main-content {
                margin-left: 0;
                padding-top: 70px;
            }
            
            .menu-toggle {
                display: flex;
            }
            
            .profile-details {
                grid-template-columns: 1fr;
            }
            
            .profile-stats {
                flex-wrap: wrap;
                gap: 15px;
            }
            
            .profile-actions {
                flex-direction: column;
            }
            
            .profile-footer {
                flex-direction: column;
                gap: 15px;
            }

            .calendar-day-header {
                font-size: 12px;
            }

            .calendar-day {
                min-height: 60px;
            }

            .calendar-events {
                margin-top: 20px;
            }

            .calendar-legend {
                flex-wrap: wrap;
            }
        }

        @media (max-width: 576px) {
            .calendar-grid {
                grid-template-columns: repeat(1, 1fr);
            }

            .calendar-day-header {
                display: none;
            }

            .calendar-day {
                display: flex;
                flex-direction: column;
                min-height: auto;
                padding: 10px;
            }

            .calendar-day-number {
                position: relative;
                top: 0;
                right: 0;
                margin-bottom: 10px;
                align-self: flex-start;
            }

            .calendar-events {
                margin-top: 10px;
            }

            .calendar-day::before {
                content: attr(data-day);
                font-weight: 500;
                margin-bottom: 5px;
            }
        }

        /* Sidebar Calendar Styles */
        .sidebar-calendar {
            padding: 15px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .sidebar-calendar-title {
            font-size: 16px;
            font-weight: 600;
            color: #fff;
        }

        .sidebar-calendar-nav {
            display: flex;
            gap: 5px;
        }

        .sidebar-calendar-nav button {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            color: #fff;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background 0.3s ease;
            font-size: 10px;
        }

        .sidebar-calendar-nav button:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .sidebar-calendar-month {
            font-size: 14px;
            text-align: center;
            margin-bottom: 10px;
            color: #fff;
        }

        .sidebar-calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 2px;
        }

        .sidebar-calendar-day-header {
            text-align: center;
            font-size: 10px;
            color: rgba(255, 255, 255, 0.7);
            padding: 2px 0;
        }

        .sidebar-calendar-day {
            text-align: center;
            font-size: 11px;
            color: #fff;
            padding: 4px 0;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            cursor: pointer;
            position: relative;
        }

        .sidebar-calendar-day:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .sidebar-calendar-day.other-month {
            color: rgba(255, 255, 255, 0.4);
        }

        .sidebar-calendar-day.today {
            background: rgba(255, 255, 255, 0.2);
            font-weight: bold;
        }

        .sidebar-calendar-day.has-event::after {
            content: '';
            position: absolute;
            bottom: 2px;
            left: 50%;
            transform: translateX(-50%);
            width: 4px;
            height: 4px;
            border-radius: 50%;
            background: #fff;
        }

        .sidebar-calendar-day.has-event.class::after {
            background: #4CAF50;
        }

        .sidebar-calendar-day.has-event.assignment::after {
            background: #FF9800;
        }

        .sidebar-calendar-day.has-event.exam::after {
            background: #F44336;
        }

        .sidebar-calendar-day.has-event.meeting::after {
            background: #2196F3;
        }

        .sidebar-calendar-day.has-event.other::after {
            background: #9C27B0;
        }

        .sidebar-upcoming-events {
            margin-top: 15px;
        }

        .sidebar-upcoming-title {
            font-size: 14px;
            font-weight: 600;
            color: #fff;
            margin-bottom: 10px;
        }

        .sidebar-event-item {
            padding: 8px 10px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 6px;
            margin-bottom: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .sidebar-event-item:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateX(3px);
        }

        .sidebar-event-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 3px;
        }

        .sidebar-event-title {
            font-size: 12px;
            font-weight: 500;
            color: #fff;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .sidebar-event-date {
            font-size: 10px;
            color: rgba(255, 255, 255, 0.7);
        }

        .sidebar-event-info {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .sidebar-event-type {
            font-size: 10px;
            padding: 2px 5px;
            border-radius: 3px;
            color: #fff;
        }

        .sidebar-event-type.class {
            background: #4CAF50;
        }

        .sidebar-event-type.assignment {
            background: #FF9800;
        }

        .sidebar-event-type.exam {
            background: #F44336;
        }

        .sidebar-event-type.meeting {
            background: #2196F3;
        }

        .sidebar-event-type.other {
            background: #9C27B0;
        }

        .sidebar-event-time {
            font-size: 10px;
            color: rgba(255, 255, 255, 0.7);
        }

        .sidebar-calendar-actions {
            margin-top: 10px;
            display: flex;
            justify-content: center;
        }

        .sidebar-calendar-add-btn {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            color: #fff;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 11px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: background 0.3s ease;
        }

        .sidebar-calendar-add-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .sidebar-calendar-add-btn i {
            font-size: 10px;
        }
    </style>
</head>

<body>
    <div class="main-container">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="profile-pic-container">
                    <img src="/app/assets/images/default-avatar.png" alt="Profile Picture" class="profile-pic">
                </div>
                <h3><?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?></h3>
                <p><?= htmlspecialchars($user['email']) ?></p>
            </div>
            <div class="sidebar-menu">
                <ul>
                    <li class="active" data-page="profile">
                        <i class="fas fa-user"></i>
                        <span>Profile</span>
                    </li>
                    <li data-page="courses">
                        <i class="fas fa-book"></i>
                        <span>Courses</span>
                    </li>
                    <li data-page="results">
                        <i class="fas fa-chart-bar"></i>
                        <span>Results</span>
                    </li>
                    <li data-page="assignments">
                        <i class="fas fa-tasks"></i>
                        <span>Assignments</span>
                    </li>
                    <li data-page="calendar">
                        <i class="fas fa-calendar"></i>
                        <span>Calendar</span>
                    </li>
                    <li data-page="messages">
                        <i class="fas fa-envelope"></i>
                        <span>Messages</span>
                    </li>
                    <li data-page="settings">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                    </li>
                </ul>
            </div>

            <div class="sidebar-calendar">
                <div class="sidebar-calendar-header">
                    <div class="sidebar-calendar-title">Calendar</div>
                    <div class="sidebar-calendar-nav">
                        <button id="sidebar-prev-month"><i class="fas fa-chevron-left"></i></button>
                        <button id="sidebar-next-month"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
                
                <div class="sidebar-calendar-month" id="sidebar-current-month">May 2025</div>
                
                <div class="sidebar-calendar-grid" id="sidebar-calendar-grid">
                    <!-- Calendar days will be generated by JavaScript -->
                </div>
                
                <div class="sidebar-upcoming-events">
                    <div class="sidebar-upcoming-title">Upcoming Events</div>
                    <div id="sidebar-events-list">
                        <!-- Upcoming events will be generated by JavaScript -->
                    </div>
                </div>
                
                <div class="sidebar-calendar-actions">
                    <button class="sidebar-calendar-add-btn" id="sidebar-add-event-btn">
                        <i class="fas fa-plus"></i> Add Event
                    </button>
                </div>
            </div>

            <div class="sidebar-footer">
                <button class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </button>
            </div>
        </div>

        <!-- Menu Toggle Button for Mobile -->
        <div class="menu-toggle" id="menu-toggle">
            <i class="fas fa-bars"></i>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Profile Page -->
            <div class="page profile-page active">
                <div class="profile-container">
                    <!-- Enhanced Profile Header -->
                    <div class="profile-header">
                        <div class="avatar-container">
                            <img src="/app/assets/images/default-avatar.png" alt="<?= htmlspecialchars($user['first_name']) ?>'s Avatar">
                            <div class="avatar-badge">
                                <i class="fas fa-check"></i>
                            </div>
                        </div>
                        <h2><?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?></h2>
                        <p><i class="fas fa-envelope"></i> <?= htmlspecialchars($user['email']) ?></p>
                        
                        <!-- Added student status and ID -->
                        <p><i class="fas fa-user-graduate"></i> Student</p>
        
                    </div>

                    <!-- Enhanced Profile Content -->
                    <div class="profile-content">
                        <!-- Added action buttons -->
                        <div class="profile-actions">
                            <button class="action-btn primary">
                                <i class="fas fa-edit"></i> Edit Profile
                            </button>
                            <button class="action-btn">
                                <i class="fas fa-key"></i> Change Password
                            </button>
                            <button class="action-btn">
                                <i class="fas fa-download"></i> Download Data
                            </button>
                        </div>
                        
                        <h3>Profile Details</h3>
                        <div class="profile-details">
                            <div class="detail animate-fade-in delay-1">
                                <h4><i class="fas fa-user"></i> First Name</h4>
                                <p><?= htmlspecialchars($user['first_name']) ?></p>
                            </div>
                            <div class="detail animate-fade-in delay-1">
                                <h4><i class="fas fa-user"></i> Last Name</h4>
                                <p><?= htmlspecialchars($user['last_name']) ?></p>
                            </div>
                            <div class="detail animate-fade-in delay-2">
                                <h4><i class="fas fa-envelope"></i> Email</h4>
                                <p><?= htmlspecialchars($user['email']) ?></p>
                            </div>
                            <div class="detail animate-fade-in delay-2">
                                <h4><i class="fas fa-phone"></i> Phone</h4>
                                <p><?= htmlspecialchars($user['phone'] ?? 'N/A') ?></p>
                            </div>
                            
                            <!-- Added more profile details -->
                            <div class="detail animate-fade-in delay-3">
                                <h4><i class="fas fa-id-card"></i> Student ID</h4>
                                <p><?= htmlspecialchars($user['student_id'] ?? $user['id'] ?? 'Not assigned') ?></p>
                            </div>
                            <div class="detail animate-fade-in delay-3">
                                <h4><i class="fas fa-calendar"></i> Date of Birth</h4>
                                <p><?= htmlspecialchars($user['dob'] ?? 'Not provided') ?></p>
                            </div>
                            <div class="detail animate-fade-in delay-4">
                                <h4><i class="fas fa-map-marker-alt"></i> Address</h4>
                                <p><?= htmlspecialchars($user['address'] ?? 'Not provided') ?></p>
                            </div>
                            <div class="detail animate-fade-in delay-4">
                                <h4><i class="fas fa-graduation-cap"></i> Department</h4>
                                <p><?= htmlspecialchars($user['department'] ?? 'Not specified') ?></p>
                            </div>
                        </div>
                        
                        <!-- Added academic information section -->
                        <h3>Academic Information</h3>
                        <div class="profile-details">
                            <div class="detail animate-fade-in delay-1">
                                <h4><i class="fas fa-book"></i> Program</h4>
                                <p><?= htmlspecialchars($user['program'] ?? 'Bachelor of Science') ?></p>
                            </div>
                            <div class="detail animate-fade-in delay-1">
                                <h4><i class="fas fa-calendar-alt"></i> Year</h4>
                                <p><?= htmlspecialchars($user['year'] ?? '2nd Year') ?></p>
                            </div>
                            <div class="detail animate-fade-in delay-2">
                                <h4><i class="fas fa-star"></i> GPA</h4>
                                <p><?= htmlspecialchars($user['gpa'] ?? '3.8/4.0') ?></p>
                            </div>
                            <div class="detail animate-fade-in delay-2">
                                <h4><i class="fas fa-user-tie"></i> Advisor</h4>
                                <p><?= htmlspecialchars($user['advisor'] ?? 'Dr. Smith') ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Enhanced Profile Footer -->
                    <div class="profile-footer">
                        <div class="last-login">
                            <i class="fas fa-clock"></i> Last login: <?= date('F j, Y, g:i a') ?>
                        </div>
                        <div class="footer-links">
                            <a href="/settings"><i class="fas fa-cog"></i> Settings</a>
                            <a href="/help"><i class="fas fa-question-circle"></i> Help</a>
                            <a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Courses Page (Placeholder) -->
            <div class="page courses-page">
                <h1>My Courses</h1>
                <p>View and manage your enrolled courses here.</p>
            </div>

            <!-- Results Page (Placeholder) -->
            <div class="page results-page">
                <h1>Results</h1>
                <p>Check your academic results and grades here.</p>
            </div>

            <!-- Assignments Page (Placeholder) -->
            <div class="page assignments-page">
                <h1>Assignments</h1>
                <p>View and submit your assignments here.</p>
            </div>

            <!-- Calendar Page -->
            <div class="page calendar-page">
                <div class="calendar-container">
                    <div class="calendar-header">
                        <h2>Academic Calendar</h2>
                        <div class="calendar-nav">
                            <button id="prev-month"><i class="fas fa-chevron-left"></i></button>
                            <span class="calendar-month" id="current-month">May 2025</span>
                            <button id="next-month"><i class="fas fa-chevron-right"></i></button>
                        </div>
                    </div>
                    
                    <div class="calendar-grid" id="calendar-grid">
                        <!-- Calendar days will be generated by JavaScript -->
                    </div>
                    
                    <div class="calendar-actions">
                        <div class="calendar-legend">
                            <div class="legend-item">
                                <div class="legend-color class"></div>
                                <span>Class</span>
                            </div>
                            <div class="legend-item">
                                <div class="legend-color assignment"></div>
                                <span>Assignment</span>
                            </div>
                            <div class="legend-item">
                                <div class="legend-color exam"></div>
                                <span>Exam</span>
                            </div>
                            <div class="legend-item">
                                <div class="legend-color meeting"></div>
                                <span>Meeting</span>
                            </div>
                            <div class="legend-item">
                                <div class="legend-color other"></div>
                                <span>Other</span>
                            </div>
                        </div>
                        
                        <button class="add-event-btn" id="add-event-btn">
                            <i class="fas fa-plus"></i> Add Event
                        </button>
                    </div>
                </div>
            </div>

            <!-- Messages Page (Placeholder) -->
            <div class="page messages-page">
                <h1>Messages</h1>
                <p>Communicate with your instructors and classmates here.</p>
            </div>

            <!-- Settings Page (Placeholder) -->
            <div class="page settings-page">
                <h1>Settings</h1>
                <p>Manage your account settings and preferences here.</p>
            </div>
        </div>
    </div>

    <!-- Event Modal -->
    <div class="event-modal" id="event-modal">
        <div class="event-modal-content">
            <div class="event-modal-header">
                <h3 id="event-modal-title">Add New Event</h3>
                <button class="event-modal-close" id="event-modal-close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="event-modal-body">
                <form id="event-form">
                    <input type="hidden" id="event-id">
                    <input type="hidden" id="event-date">
                    
                    <div class="event-form-group">
                        <label for="event-title">Event Title</label>
                        <input type="text" id="event-title" placeholder="Enter event title" required>
                    </div>
                    
                    <div class="event-form-group">
                        <label for="event-type">Event Type</label>
                        <select id="event-type" required>
                            <option value="class">Class</option>
                            <option value="assignment">Assignment</option>
                            <option value="exam">Exam</option>
                            <option value="meeting">Meeting</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    
                    <div class="event-form-group">
                        <label for="event-time">Time</label>
                        <input type="time" id="event-time">
                    </div>
                    
                    <div class="event-form-group">
                        <label for="event-description">Description</label>
                        <textarea id="event-description" placeholder="Enter event details"></textarea>
                    </div>
                </form>
            </div>
            <div class="event-modal-footer">
                <div>
                    <button class="btn-delete" id="event-delete" style="display: none;">Delete</button>
                </div>
                <div>
                    <button class="btn-cancel" id="event-cancel">Cancel</button>
                    <button class="btn-save" id="event-save">Save Event</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast notification -->
    <div class="toast-notification" id="toast-notification">
        <i class="fas fa-check-circle"></i>
        <span id="toast-message">Profile picture updated successfully!</span>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Menu toggle for mobile
            const menuToggle = document.getElementById('menu-toggle');
            const sidebar = document.getElementById('sidebar');
            
            menuToggle.addEventListener('click', function() {
                sidebar.classList.toggle('active');
                
                // Change icon based on sidebar state
                const icon = this.querySelector('i');
                if (sidebar.classList.contains('active')) {
                    icon.classList.remove('fa-bars');
                    icon.classList.add('fa-times');
                } else {
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                }
            });
            
            // Page navigation
            const menuItems = document.querySelectorAll('.sidebar-menu li');
            const pages = document.querySelectorAll('.page');
            
            menuItems.forEach(item => {
                item.addEventListener('click', function() {
                    // Remove active class from all menu items
                    menuItems.forEach(i => i.classList.remove('active'));
                    
                    // Add active class to clicked menu item
                    this.classList.add('active');
                    
                    // Get the page to show
                    const pageToShow = this.getAttribute('data-page');
                    
                    // Hide all pages
                    pages.forEach(page => page.classList.remove('active'));
                    
                    // Show the selected page
                    document.querySelector(`.${pageToShow}-page`).classList.add('active');
                    
                    // Close sidebar on mobile after navigation
                    if (window.innerWidth <= 768) {
                        sidebar.classList.remove('active');
                        menuToggle.querySelector('i').classList.remove('fa-times');
                        menuToggle.querySelector('i').classList.add('fa-bars');
                    }
                });
            });
            
            // Animate profile details on scroll
            const details = document.querySelectorAll('.detail');
            
            // Function to check if an element is in viewport
            function isInViewport(element) {
                const rect = element.getBoundingClientRect();
                return (
                    rect.top >= 0 &&
                    rect.left >= 0 &&
                    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
                );
            }
            
            // Function to handle scroll animation
            function handleScroll() {
                details.forEach(detail => {
                    if (isInViewport(detail)) {
                        detail.style.opacity = '1';
                        detail.style.transform = 'translateY(0)';
                    }
                });
            }
            
            // Set initial styles
            details.forEach(detail => {
                detail.style.opacity = '0';
                detail.style.transform = 'translateY(20px)';
                detail.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            });
            
            // Listen for scroll events
            window.addEventListener('scroll', handleScroll);
            
            // Trigger once on load
            handleScroll();
            
            // Add click handlers for buttons
            const editBtn = document.querySelector('.action-btn.primary');
            if (editBtn) {
                editBtn.addEventListener('click', function() {
                    toggleEditMode();
                });
            }
            
            const passwordBtn = document.querySelector('.action-btn:nth-child(2)');
            if (passwordBtn) {
                passwordBtn.addEventListener('click', function() {
                    alert('Change password functionality would be implemented here.');
                });
            }
            
            const downloadBtn = document.querySelector('.action-btn:nth-child(3)');
            if (downloadBtn) {
                downloadBtn.addEventListener('click', function() {
                    alert('Download data functionality would be implemented here.');
                });
            }
            
            // Add logout functionality
            const logoutBtn = document.querySelector('.logout-btn');
            if (logoutBtn) {
                logoutBtn.addEventListener('click', function() {
                    if (confirm('Are you sure you want to logout?')) {
                        window.location.href = '/logout';
                    }
                });
            }

            // Profile picture upload functionality
            
            function setupProfilePictureUpload() {
                const sidebarProfilePic = document.querySelector('.sidebar-header .profile-pic-container');
                const mainProfilePic = document.querySelector('.profile-header .avatar-container');
                
                // Function to handle file selection
                function handleFileSelect(event) {
                    const fileInput = event.target;
                    
                    if (fileInput.files && fileInput.files[0]) {
                        const reader = new FileReader();
                        
                        reader.onload = function(e) {
                            const imageData = e.target.result;
                            
                            // Update both profile pictures
                            document.querySelector('.sidebar-header .profile-pic').src = imageData;
                            document.querySelector('.profile-header .avatar-container img').src = imageData;
                            
                            // Store the image in localStorage
                            localStorage.setItem('userProfilePicture', imageData);
                            
                            // Show success notification
                            showToastNotification('Profile picture updated successfully!');
                            
                            // In a real application, you would upload the file to the server here
                            // For example:
                            // const formData = new FormData();
                            // formData.append('profile_picture', fileInput.files[0]);
                            // fetch('/update-profile-picture.php', {
                            //     method: 'POST',
                            //     body: formData
                            // });
                        };
                        
                        reader.readAsDataURL(fileInput.files[0]);
                    }
                }
                
                // Function to create and trigger file input
                function createAndTriggerFileInput() {
                    // Create file input
                    const fileInput = document.createElement('input');
                    fileInput.type = 'file';
                    fileInput.accept = 'image/*';
                    fileInput.style.display = 'none';
                    
                    // Add event listener for file selection
                    fileInput.addEventListener('change', handleFileSelect);
                    
                    // Append to body, trigger click, then remove
                    document.body.appendChild(fileInput);
                    fileInput.click();
                    
                    // Remove after selection (cleanup)
                    fileInput.addEventListener('change', function() {
                        setTimeout(() => {
                            document.body.removeChild(fileInput);
                        }, 1000);
                    });
                }
                
                // Add click event listeners to both profile pictures
                if (sidebarProfilePic) {
                    sidebarProfilePic.addEventListener('click', createAndTriggerFileInput);
                }
                
                if (mainProfilePic) {
                    mainProfilePic.addEventListener('click', createAndTriggerFileInput);
                }
                
                // Load profile picture from localStorage on page load
                loadProfilePicture();
            }

            // Add this new function to load the profile picture from localStorage
            function loadProfilePicture() {
                const savedProfilePicture = localStorage.getItem('userProfilePicture');
                
                if (savedProfilePicture) {
                    // Update both profile pictures with the saved image
                    const sidebarProfilePic = document.querySelector('.sidebar-header .profile-pic');
                    const mainProfilePic = document.querySelector('.profile-header .avatar-container img');
                    
                    if (sidebarProfilePic) {
                        sidebarProfilePic.src = savedProfilePicture;
                    }
                    
                    if (mainProfilePic) {
                        mainProfilePic.src = savedProfilePicture;
                    }
                }
            }

            // Function to toggle edit mode for profile details
            function toggleEditMode() {
                const profileDetails = document.querySelectorAll('.profile-details .detail p');
                const editBtn = document.querySelector('.action-btn.primary');
                
                // Check if we're already in edit mode
                const isEditMode = editBtn.getAttribute('data-edit-mode') === 'true';
                
                if (isEditMode) {
                    // Save changes
                    saveProfileChanges();
                    
                    // Update button text
                    editBtn.innerHTML = '<i class="fas fa-edit"></i> Edit Profile';
                    editBtn.setAttribute('data-edit-mode', 'false');
                } else {
                    // Convert all profile details to input fields
                    profileDetails.forEach(detail => {
                        const currentValue = detail.textContent;
                        const inputField = document.createElement('input');
                        inputField.type = 'text';
                        inputField.value = currentValue;
                        inputField.className = 'edit-input';
                        inputField.style.width = '100%';
                        inputField.style.padding = '5px';
                        inputField.style.border = '1px solid #ddd';
                        inputField.style.borderRadius = '4px';
                        inputField.style.fontSize = '15px';
                        
                        // Replace the text with the input field
                        detail.innerHTML = '';
                        detail.appendChild(inputField);
                    });
                    
                    // Update button text
                    editBtn.innerHTML = '<i class="fas fa-save"></i> Save Changes';
                    editBtn.setAttribute('data-edit-mode', 'true');
                }
            }
            
            // Function to save profile changes
            function saveProfileChanges() {
                const profileDetails = document.querySelectorAll('.profile-details .detail');
                const updatedProfile = {};
                
                // Collect all input values
                profileDetails.forEach(detail => {
                    const label = detail.querySelector('h4').textContent.trim();
                    const input = detail.querySelector('input');
                    
                    if (input) {
                        const value = input.value;
                        
                        // Convert input back to text
                        const p = document.createElement('p');
                        p.textContent = value;
                        input.parentNode.replaceChild(p, input);
                        
                        // Store the updated value
                        updatedProfile[label] = value;
                    }
                });
                
                // In a real application, you would send this data to the server
                // For this demo, we'll just store it in localStorage
                localStorage.setItem('userProfile', JSON.stringify(updatedProfile));
                
                // Show success notification
                showToastNotification('Profile updated successfully!');
            }
            
            // Function to load profile data from localStorage
            function loadProfileData() {
                const savedProfile = localStorage.getItem('userProfile');
                if (savedProfile) {
                    const profileData = JSON.parse(savedProfile);
                    
                    // Update profile details with saved data
                    const profileDetails = document.querySelectorAll('.profile-details .detail');
                    profileDetails.forEach(detail => {
                        const label = detail.querySelector('h4').textContent.trim();
                        const p = detail.querySelector('p');
                        
                        if (p && profileData[label]) {
                            p.textContent = profileData[label];
                        }
                    });
                }
            }

            // Function to show toast notification
            function showToastNotification(message) {
                const toast = document.getElementById('toast-notification');
                const toastMessage = document.getElementById('toast-message');
                
                toastMessage.textContent = message;
                toast.classList.add('show');
                
                setTimeout(() => {
                    toast.classList.remove('show');
                }, 3000);
            }

            // Call the setup function when the DOM is loaded
            setupProfilePictureUpload();

            // Load saved profile data
            loadProfileData();

            // Calendar functionality
            class AcademicCalendar {
                constructor() {
                    this.currentDate = new Date();
                    this.selectedDate = null;
                    this.events = this.loadEvents();
                    this.editingEventId = null;
                    
                    // DOM elements
                    this.calendarGrid = document.getElementById('calendar-grid');
                    this.currentMonthElement = document.getElementById('current-month');
                    this.prevMonthButton = document.getElementById('prev-month');
                    this.nextMonthButton = document.getElementById('next-month');
                    this.addEventButton = document.getElementById('add-event-btn');
                    
                    // Modal elements
                    this.eventModal = document.getElementById('event-modal');
                    this.eventModalTitle = document.getElementById('event-modal-title');
                    this.eventForm = document.getElementById('event-form');
                    this.eventIdInput = document.getElementById('event-id');
                    this.eventDateInput = document.getElementById('event-date');
                    this.eventTitleInput = document.getElementById('event-title');
                    this.eventTypeInput = document.getElementById('event-type');
                    this.eventTimeInput = document.getElementById('event-time');
                    this.eventDescriptionInput = document.getElementById('event-description');
                    this.eventSaveButton = document.getElementById('event-save');
                    this.eventCancelButton = document.getElementById('event-cancel');
                    this.eventDeleteButton = document.getElementById('event-delete');
                    this.eventModalCloseButton = document.getElementById('event-modal-close');
                    
                    // Initialize calendar
                    this.initCalendar();
                }
                
                initCalendar() {
                    // Render initial calendar
                    this.renderCalendar();
                    
                    // Add event listeners
                    this.prevMonthButton.addEventListener('click', () => {
                        this.currentDate.setMonth(this.currentDate.getMonth() - 1);
                        this.renderCalendar();
                    });
                    
                    this.nextMonthButton.addEventListener('click', () => {
                        this.currentDate.setMonth(this.currentDate.getMonth() + 1);
                        this.renderCalendar();
                    });
                    
                    this.addEventButton.addEventListener('click', () => {
                        this.openAddEventModal(new Date());
                    });
                    
                    this.eventSaveButton.addEventListener('click', () => {
                        this.saveEvent();
                    });
                    
                    this.eventCancelButton.addEventListener('click', () => {
                        this.closeEventModal();
                    });
                    
                    this.eventDeleteButton.addEventListener('click', () => {
                        this.deleteEvent();
                    });
                    
                    this.eventModalCloseButton.addEventListener('click', () => {
                        this.closeEventModal();
                    });
                }
                
                renderCalendar() {
                    // Clear calendar grid
                    this.calendarGrid.innerHTML = '';
                    
                    // Update month display
                    const monthYear = this.currentDate.toLocaleString('default', { month: 'long', year: 'numeric' });
                    this.currentMonthElement.textContent = monthYear;
                    
                    // Add day headers
                    const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
                    daysOfWeek.forEach(day => {
                        const dayHeader = document.createElement('div');
                        dayHeader.className = 'calendar-day-header';
                        dayHeader.textContent = day;
                        this.calendarGrid.appendChild(dayHeader);
                    });
                    
                    // Get first day of month and last day of month
                    const firstDayOfMonth = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth(), 1);
                    const lastDayOfMonth = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth() + 1, 0);
                    
                    // Get day of week for first day (0-6, where 0 is Sunday)
                    const firstDayOfWeek = firstDayOfMonth.getDay();
                    
                    // Get days from previous month to fill in calendar
                    const prevMonthDays = firstDayOfWeek;
                    const prevMonth = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth(), 0);
                    
                    // Add days from previous month
                    for (let i = prevMonthDays - 1; i >= 0; i--) {
                        const day = prevMonth.getDate() - i;
                        const date = new Date(prevMonth.getFullYear(), prevMonth.getMonth(), day);
                        this.createDayElement(date, true);
                    }
                    
                    // Add days for current month
                    for (let day = 1; day <= lastDayOfMonth.getDate(); day++) {
                        const date = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth(), day);
                        this.createDayElement(date, false);
                    }
                    
                    // Add days from next month to fill out the grid
                    const totalDaysRendered = prevMonthDays + lastDayOfMonth.getDate();
                    const nextMonthDays = Math.ceil(totalDaysRendered / 7) * 7 - totalDaysRendered;
                    
                    for (let day = 1; day <= nextMonthDays; day++) {
                        const date = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth() + 1, day);
                        this.createDayElement(date, true);
                    }
                }
                
                createDayElement(date, isOtherMonth) {
                    const dayElement = document.createElement('div');
                    dayElement.className = 'calendar-day';
                    
                    if (isOtherMonth) {
                        dayElement.classList.add('other-month');
                    }
                    
                    // Check if this is today
                    const today = new Date();
                    if (date.getDate() === today.getDate() && 
                        date.getMonth() === today.getMonth() && 
                        date.getFullYear() === today.getFullYear()) {
                        dayElement.classList.add('today');
                    }
                    
                    // Add day number
                    const dayNumber = document.createElement('div');
                    dayNumber.className = 'calendar-day-number';
                    dayNumber.textContent = date.getDate();
                    dayElement.appendChild(dayNumber);
                    
                    // Add events container
                    const eventsContainer = document.createElement('div');
                    eventsContainer.className = 'calendar-events';
                    dayElement.appendChild(eventsContainer);
                    
                    // Add events for this day
                    const dateString = this.formatDateString(date);
                    const dayEvents = this.events.filter(event => event.date === dateString);
                    
                    dayEvents.forEach(event => {
                        const eventElement = document.createElement('div');
                        eventElement.className = `calendar-event ${event.type}`;
                        eventElement.textContent = event.title;
                        eventElement.title = `${event.title}${event.time ? ' at ' + event.time : ''}${event.description ? '\n' + event.description : ''}`;
                        
                        // Add click event to edit
                        eventElement.addEventListener('click', (e) => {
                            e.stopPropagation();
                            this.openEditEventModal(event);
                        });
                        
                        eventsContainer.appendChild(eventElement);
                    });
                    
                    // Add data attribute for mobile view
                    const dayName = date.toLocaleString('default', { weekday: 'short' });
                    const monthName = date.toLocaleString('default', { month: 'short' });
                    dayElement.setAttribute('data-day', `${dayName}, ${monthName} ${date.getDate()}`);
                    
                    // Add click event to add new event
                    dayElement.addEventListener('click', () => {
                        this.openAddEventModal(date);
                    });
                    
                    this.calendarGrid.appendChild(dayElement);
                }
                
                openAddEventModal(date) {
                    this.selectedDate = date;
                    this.editingEventId = null;
                    
                    // Set modal title
                    this.eventModalTitle.textContent = 'Add New Event';
                    
                    // Reset form
                    this.eventForm.reset();
                    
                    // Set date
                    this.eventDateInput.value = this.formatDateString(date);
                    
                    // Hide delete button
                    this.eventDeleteButton.style.display = 'none';
                    
                    // Show modal
                    this.eventModal.classList.add('show');
                }
                
                openEditEventModal(event) {
                    this.editingEventId = event.id;
                    
                    // Set modal title
                    this.eventModalTitle.textContent = 'Edit Event';
                    
                    // Fill form with event data
                    this.eventIdInput.value = event.id;
                    this.eventDateInput.value = event.date;
                    this.eventTitleInput.value = event.title;
                    this.eventTypeInput.value = event.type;
                    this.eventTimeInput.value = event.time || '';
                    this.eventDescriptionInput.value = event.description || '';
                    
                    // Show delete button
                    this.eventDeleteButton.style.display = 'block';
                    
                    // Show modal
                    this.eventModal.classList.add('show');
                }
                
                closeEventModal() {
                    this.eventModal.classList.remove('show');
                }
                
                saveEvent() {
                    // Get form data
                    const eventData = {
                        id: this.editingEventId || this.generateId(),
                        date: this.eventDateInput.value,
                        title: this.eventTitleInput.value,
                        type: this.eventTypeInput.value,
                        time: this.eventTimeInput.value,
                        description: this.eventDescriptionInput.value
                    };
                    
                    // Validate form
                    if (!eventData.title) {
                        alert('Please enter an event title');
                        return;
                    }
                    
                    // Update or add event
                    if (this.editingEventId) {
                        // Update existing event
                        const index = this.events.findIndex(event => event.id === this.editingEventId);
                        if (index !== -1) {
                            this.events[index] = eventData;
                        }
                    } else {
                        // Add new event
                        this.events.push(eventData);
                    }
                    
                    // Save events to localStorage
                    this.saveEvents();
                    
                    // Close modal
                    this.closeEventModal();
                    
                    // Re-render calendar
                    this.renderCalendar();
                    
                    // Show success notification
                    showToastNotification('Event saved successfully!');
                }
                
                deleteEvent() {
                    if (confirm('Are you sure you want to delete this event?')) {
                        // Remove event from array
                        this.events = this.events.filter(event => event.id !== this.editingEventId);
                        
                        // Save events to localStorage
                        this.saveEvents();
                        
                        // Close modal
                        this.closeEventModal();
                        
                        // Re-render calendar
                        this.renderCalendar();
                        
                        // Show success notification
                        showToastNotification('Event deleted successfully!');
                    }
                }
                
                generateId() {
                    return Date.now().toString(36) + Math.random().toString(36).substr(2, 5);
                }
                
                formatDateString(date) {
                    return `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}-${String(date.getDate()).padStart(2, '0')}`;
                }
                
                loadEvents() {
                    const savedEvents = localStorage.getItem('academicCalendarEvents');
                    if (savedEvents) {
                        return JSON.parse(savedEvents);
                    }
                    
                    // Return sample events if no saved events
                    return this.getSampleEvents();
                }
                
                saveEvents() {
                    localStorage.setItem('academicCalendarEvents', JSON.stringify(this.events));
                }
                
                getSampleEvents() {
                    const today = new Date();
                    const todayStr = this.formatDateString(today);
                    
                    // Tomorrow
                    const tomorrow = new Date(today);
                    tomorrow.setDate(tomorrow.getDate() + 1);
                    const tomorrowStr = this.formatDateString(tomorrow);
                    
                    // Next week
                    const nextWeek = new Date(today);
                    nextWeek.setDate(nextWeek.getDate() + 7);
                    const nextWeekStr = this.formatDateString(nextWeek);
                    
                    return [
                        {
                            id: 'sample1',
                            date: todayStr,
                            title: 'CS101 Lecture',
                            type: 'class',
                            time: '10:00',
                            description: 'Introduction to Programming Concepts'
                        },
                        {
                            id: 'sample2',
                            date: todayStr,
                            title: 'Study Group',
                            type: 'meeting',
                            time: '15:30',
                            description: 'Meet in the library to prepare for midterms'
                        },
                        {
                            id: 'sample3',
                            date: tomorrowStr,
                            title: 'Math Assignment Due',
                            type: 'assignment',
                            time: '23:59',
                            description: 'Submit online through the course portal'
                        },
                        {
                            id: 'sample4',
                            date: nextWeekStr,
                            title: 'Midterm Exam',
                            type: 'exam',
                            time: '13:00',
                            description: 'Covers chapters 1-5. Bring calculator and ID.'
                        }
                    ];
                }
            }
            
            // Initialize calendar
            const academicCalendar = new AcademicCalendar();

            // Sidebar Calendar functionality
            class SidebarCalendar {
                constructor() {
                    this.currentDate = new Date();
                    this.events = this.loadEvents();
                    
                    // DOM elements
                    this.calendarGrid = document.getElementById('sidebar-calendar-grid');
                    this.currentMonthElement = document.getElementById('sidebar-current-month');
                    this.prevMonthButton = document.getElementById('sidebar-prev-month');
                    this.nextMonthButton = document.getElementById('sidebar-next-month');
                    this.addEventButton = document.getElementById('sidebar-add-event-btn');
                    this.eventsListElement = document.getElementById('sidebar-events-list');
                    
                    // Initialize calendar
                    this.initCalendar();
                }
                
                initCalendar() {
                    // Render initial calendar
                    this.renderCalendar();
                    this.renderUpcomingEvents();
                    
                    // Add event listeners
                    this.prevMonthButton.addEventListener('click', () => {
                        this.currentDate.setMonth(this.currentDate.getMonth() - 1);
                        this.renderCalendar();
                    });
                    
                    this.nextMonthButton.addEventListener('click', () => {
                        this.currentDate.setMonth(this.currentDate.getMonth() + 1);
                        this.renderCalendar();
                    });
                    
                    this.addEventButton.addEventListener('click', () => {
                        // Open the event modal from the main calendar
                        if (typeof academicCalendar !== 'undefined') {
                            academicCalendar.openAddEventModal(new Date());
                            
                            // Switch to calendar page
                            const calendarMenuItem = document.querySelector('.sidebar-menu li[data-page="calendar"]');
                            if (calendarMenuItem) {
                                calendarMenuItem.click();
                            }
                        }
                    });
                }
                
                renderCalendar() {
                    // Clear calendar grid
                    this.calendarGrid.innerHTML = '';
                    
                    // Update month display
                    const monthYear = this.currentDate.toLocaleString('default', { month: 'long', year: 'numeric' });
                    this.currentMonthElement.textContent = monthYear;
                    
                    // Add day headers
                    const daysOfWeek = ['S', 'M', 'T', 'W', 'T', 'F', 'S'];
                    daysOfWeek.forEach(day => {
                        const dayHeader = document.createElement('div');
                        dayHeader.className = 'sidebar-calendar-day-header';
                        dayHeader.textContent = day;
                        this.calendarGrid.appendChild(dayHeader);
                    });
                    
                    // Get first day of month and last day of month
                    const firstDayOfMonth = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth(), 1);
                    const lastDayOfMonth = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth() + 1, 0);
                    
                    // Get day of week for first day (0-6, where 0 is Sunday)
                    const firstDayOfWeek = firstDayOfMonth.getDay();
                    
                    // Get days from previous month to fill in calendar
                    const prevMonthDays = firstDayOfWeek;
                    const prevMonth = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth(), 0);
                    
                    // Add days from previous month
                    for (let i = prevMonthDays - 1; i >= 0; i--) {
                        const day = prevMonth.getDate() - i;
                        const date = new Date(prevMonth.getFullYear(), prevMonth.getMonth(), day);
                        this.createDayElement(date, true);
                    }
                    
                    // Add days for current month
                    for (let day = 1; day <= lastDayOfMonth.getDate(); day++) {
                        const date = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth(), day);
                        this.createDayElement(date, false);
                    }
                    
                    // Add days from next month to fill out the grid
                    const totalDaysRendered = prevMonthDays + lastDayOfMonth.getDate();
                    const nextMonthDays = Math.ceil(totalDaysRendered / 7) * 7 - totalDaysRendered;
                    
                    for (let day = 1; day <= nextMonthDays; day++) {
                        const date = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth() + 1, day);
                        this.createDayElement(date, true);
                    }
                }
                
                createDayElement(date, isOtherMonth) {
                    const dayElement = document.createElement('div');
                    dayElement.className = 'sidebar-calendar-day';
                    dayElement.textContent = date.getDate();
                    
                    if (isOtherMonth) {
                        dayElement.classList.add('other-month');
                    }
                    
                    // Check if this is today
                    const today = new Date();
                    if (date.getDate() === today.getDate() && 
                        date.getMonth() === today.getMonth() && 
                        date.getFullYear() === today.getFullYear()) {
                        dayElement.classList.add('today');
                    }
                    
                    // Check if this day has events
                    const dateString = this.formatDateString(date);
                    const dayEvents = this.events.filter(event => event.date === dateString);
                    
                    if (dayEvents.length > 0) {
                        dayElement.classList.add('has-event');
                        
                        // Add class based on event type (use the first event's type)
                        if (dayEvents[0].type) {
                            dayElement.classList.add(dayEvents[0].type);
                        }
                        
                        // Add tooltip with event info
                        const eventTitles = dayEvents.map(event => event.title).join('\n');
                        dayElement.title = eventTitles;
                    }
                    
                    // Add click event to view/add events
                    dayElement.addEventListener('click', () => {
                        // Navigate to calendar page and focus on this date
                        const calendarMenuItem = document.querySelector('.sidebar-menu li[data-page="calendar"]');
                        if (calendarMenuItem) {
                            calendarMenuItem.click();
                            
                            // If we have the main calendar initialized, we can focus on this date
                            if (typeof academicCalendar !== 'undefined') {
                                academicCalendar.currentDate = new Date(date);
                                academicCalendar.renderCalendar();
                            }
                        }
                    });
                    
                    this.calendarGrid.appendChild(dayElement);
                }
                
                renderUpcomingEvents() {
                    // Clear events list
                    this.eventsListElement.innerHTML = '';
                    
                    // Get upcoming events (next 7 days)
                    const today = new Date();
                    const nextWeek = new Date(today);
                    nextWeek.setDate(nextWeek.getDate() + 7);
                    
                    const upcomingEvents = this.events.filter(event => {
                        const eventDate = new Date(event.date);
                        return eventDate >= today && eventDate <= nextWeek;
                    });
                    
                    // Sort by date
                    upcomingEvents.sort((a, b) => {
                        return new Date(a.date) - new Date(b.date);
                    });
                    
                    // Limit to 3 events
                    const limitedEvents = upcomingEvents.slice(0, 3);
                    
                    // Add events to list
                    if (limitedEvents.length > 0) {
                        limitedEvents.forEach(event => {
                            const eventElement = document.createElement('div');
                            eventElement.className = 'sidebar-event-item';
                            
                            const eventDate = new Date(event.date);
                            const formattedDate = eventDate.toLocaleDateString('en-US', { 
                                weekday: 'short', 
                                month: 'short', 
                                day: 'numeric' 
                            });
                            
                            eventElement.innerHTML = `
                                <div class="sidebar-event-header">
                                    <div class="sidebar-event-title">${event.title}</div>
                                    <div class="sidebar-event-date">${formattedDate}</div>
                                </div>
                                <div class="sidebar-event-info">
                                    <div class="sidebar-event-type ${event.type}">${event.type}</div>
                                    ${event.time ? `<div class="sidebar-event-time">${event.time}</div>` : ''}
                                </div>
                            `;
                            
                            // Add click event to view/edit event
                            eventElement.addEventListener('click', () => {
                                // Navigate to calendar page and open edit modal
                                const calendarMenuItem = document.querySelector('.sidebar-menu li[data-page="calendar"]');
                                if (calendarMenuItem) {
                                    calendarMenuItem.click();
                                    
                                    // If we have the main calendar initialized, we can open the edit modal
                                    if (typeof academicCalendar !== 'undefined') {
                                        academicCalendar.openEditEventModal(event);
                                    }
                                }
                            });
                            
                            this.eventsListElement.appendChild(eventElement);
                        });
                    } else {
                        // No upcoming events
                        const noEventsElement = document.createElement('div');
                        noEventsElement.className = 'sidebar-event-item';
                        noEventsElement.innerHTML = `
                            <div class="sidebar-event-title">No upcoming events</div>
                            <div class="sidebar-event-info">
                                <div class="sidebar-event-date">Click + to add an event</div>
                            </div>
                        `;
                        this.eventsListElement.appendChild(noEventsElement);
                    }
                }
                
                formatDateString(date) {
                    return `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}-${String(date.getDate()).padStart(2, '0')}`;
                }
                
                loadEvents() {
                    // Use the same events as the main calendar
                    const savedEvents = localStorage.getItem('academicCalendarEvents');
                    if (savedEvents) {
                        return JSON.parse(savedEvents);
                    }
                    
                    // If no events in localStorage and academicCalendar exists, use its sample events
                    if (typeof academicCalendar !== 'undefined') {
                        return academicCalendar.getSampleEvents();
                    }
                    
                    // Return sample events if no saved events and no academicCalendar
                    return this.getSampleEvents();
                }
                
                getSampleEvents() {
                    const today = new Date();
                    const todayStr = this.formatDateString(today);
                    
                    // Tomorrow
                    const tomorrow = new Date(today);
                    tomorrow.setDate(tomorrow.getDate() + 1);
                    const tomorrowStr = this.formatDateString(tomorrow);
                    
                    // Next week
                    const nextWeek = new Date(today);
                    nextWeek.setDate(nextWeek.getDate() + 7);
                    const nextWeekStr = this.formatDateString(nextWeek);
                    
                    return [
                        {
                            id: 'sample1',
                            date: todayStr,
                            title: 'CS101 Lecture',
                            type: 'class',
                            time: '10:00',
                            description: 'Introduction to Programming Concepts'
                        },
                        {
                            id: 'sample2',
                            date: todayStr,
                            title: 'Study Group',
                            type: 'meeting',
                            time: '15:30',
                            description: 'Meet in the library to prepare for midterms'
                        },
                        {
                            id: 'sample3',
                            date: tomorrowStr,
                            title: 'Math Assignment Due',
                            type: 'assignment',
                            time: '23:59',
                            description: 'Submit online through the course portal'
                        },
                        {
                            id: 'sample4',
                            date: nextWeekStr,
                            title: 'Midterm Exam',
                            type: 'exam',
                            time: '13:00',
                            description: 'Covers chapters 1-5. Bring calculator and ID.'
                        }
                    ];
                }
            }

            // Initialize sidebar calendar
            const sidebarCalendar = new SidebarCalendar();

            // Update sidebar calendar when main calendar events change
            if (typeof academicCalendar !== 'undefined') {
                const originalSaveEvents = academicCalendar.saveEvents;
                academicCalendar.saveEvents = function() {
                    originalSaveEvents.call(this);
                    sidebarCalendar.events = this.events;
                    sidebarCalendar.renderCalendar();
                    sidebarCalendar.renderUpcomingEvents();
                };
            }
        });
    </script>
</body>

</html>
