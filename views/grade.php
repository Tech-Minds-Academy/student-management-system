<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Grades</title>
    <link rel="stylesheet" href="../assets/css/grade.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Student Grades</h1>
        </div>
    </header>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Grade</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Mathematics</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>Science</td>
                    <td>B+</td>
                </tr>
                <tr>
                    <td>History</td>
                    <td>A-</td>
                </tr>
                <tr>
                    <td>English</td>
                    <td>B</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Report Issue Section -->
    <div class="report-container">
        <h2>Report an Issue</h2>
        <textarea id="reportText" placeholder="Describe your issue here..."></textarea>
        <button class="report-btn" onclick="submitReport()">Submit Report</button>
    </div>

    <script src="../assets/js/grade.js"></script>
</body>
</html>