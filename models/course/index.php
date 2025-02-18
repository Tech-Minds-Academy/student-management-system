Here is a simple example of how to create a student course system using HTML and PHP:

Student Course System
index.html

<!DOCTYPE html>
<html>
<head>
	<title>Student Course System</title>
</head>
<body>
	<h1>Student Course System</h1>
	<form action="course.php" method="post">
		<label>Student Name:</label>
		<input type="text" name="name"><br><br>
		<label>Course Name:</label>
		<input type="text" name="course"><br><br>
		<label>Course Code:</label>
		<input type="text" name="code"><br><br>
		<label>Credit Hours:</label>
		<input type="number" name="hours"><br><br>
		<input type="submit" value="Add Course">
	</form>

    
<?php
$name = $_POST['name'];
$course = $_POST['course'];
$code = $_POST['code'];
$hours = $_POST['hours'];

// Connect to database
$conn = mysqli_connect("localhost", "username", "password", "database");

// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Insert data into database
$sql = "INSERT INTO courses (name, course, code, hours) VALUES ('$name', '$course', '$code', '$hours')";

if (mysqli_query($conn, $sql)) {
	echo "Course added successfully!";
} else {
	echo "Error adding course: " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>


display.php

<?php
// Connect to database
$conn = mysqli_connect("localhost", "username", "password", "database");

// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Retrieve data from database
$sql = "SELECT * FROM courses";
$result = mysqli_query($conn, $sql);

// Display data
echo "<h1>Courses</h1>";
echo "<table border='1'>";
echo "<tr><th>Name</th><th>Course</th><th>Code</th><th>Credit Hours</th></tr>";

while($row = mysqli_fetch_assoc($result)) {
	echo "<tr><td>" . $row["name"]. "</td><td>" . $row["course"]. "</td><td>" . $row["code"]. "</td><td>" . $row["hours"]. "</td></tr>";
}

echo "</table>";

// Close connection
mysqli_close($conn);
?>

</body>
</html>



