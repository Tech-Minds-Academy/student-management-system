# Student Management System

## Introduction
The **Student Management System** is a web-based application designed to help educational institutions manage student records efficiently. It allows administrators, teachers, and students to access and manage relevant information in a structured manner.

## Features
- **Student Enrollment**: Add, update, and remove student records.
- **Course Management**: Assign students to courses and track progress.
- **Attendance Tracking**: Record and manage student attendance.
- **Grading System**: Assign and manage student grades.
- **User Authentication**: Secure login and role-based access control.

## Installation

### Prerequisites
- Git

## Project Structure
```
student-management-system/
│── assets/                 # Static files (CSS, JavaScript, Images)
│   ├── css/
│   ├── js/
│   ├── images/
│── config/                 # Database and configuration files
│   ├── database.php        # Database connection settings
│   ├── config.php          # Application-wide settings
│── includes/               # Reusable PHP components (header, footer, etc.)
│   ├── header.php
│   ├── footer.php
│   ├── navbar.php
│── models/                 # Database interaction files
│   ├── Student.php
│   ├── Course.php
│   ├── Attendance.php
│   ├── Grade.php
│── controllers/            # Business logic for handling requests
│   ├── StudentController.php
│   ├── CourseController.php
│   ├── AttendanceController.php
│   ├── AuthController.php
│── views/                  # Frontend PHP templates
│   ├── index.php           # Homepage
│   ├── login.php           # User authentication page
│   ├── dashboard.php       # Admin/teacher dashboard
│   ├── students.php        # Student list and management
│   ├── courses.php         # Course management
│── public/                 # Publicly accessible files
│   ├── index.php           # Main entry point
│── routes/                 # URL routing for requests
│   ├── web.php             # Defines available routes
│── uploads/                # Uploaded files (student photos, documents, etc.)
│── .htaccess               # Apache configurations (if using Apache)
│── README.md               # Project documentation
│── CONTRIBUTING.md         # Contribution guidelines
```

```
   Database -> models -> controllers -> views

   Views (fetch/post) -> controllers (Do some checks and work ) -> models (SQL queries) -> Database.
```

### Key Points:
- **Separation of concerns**: Logic (`controllers/`), database interactions (`models/`), and UI (`views/`) are neatly separated.
- **`config/` folder**: Centralized database and app settings.
- **`routes/web.php`**: Handles routing without needing a full MVC framework.
- **`includes/` folder**: Contains reusable UI components.
- **`public/`**: Main entry point for the app, can be configured in Apache/Nginx.


### Steps
1. **Clone the Repository**
   ```sh
   git clone https://github.com/tech-minds-academy/student-management-system.git
   cd student-management-system


## Contribution
Contributions are welcome! Read our [Contribution Guidelines](CONTRIBUTING.md) before getting started.

## License
This project is licensed under the MIT License.

## Contact
For any inquiries, open an issue or reach out via GitHub discussions.

Happy coding! 🚀

