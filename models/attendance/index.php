

<!DOCTYPE html>
<html>
<head>
	<title>Student Attendance System</title>
</head>
<body>
	<h1>Student Attendance System</h1>
	<form action="attendance.php" method="post">
		<label>Student Name:</label>
		<input type="text" name="name"><br><br>
		<label>Date:</label>
		<input type="date" name="date"><br><br>
		<label>Attendance:</label>
		<input type="radio" name="attendance" value="Present"> Present
		<input type="radio" name="attendance" value="Absent"> Absent<br><br>
		<input type="submit" value="Mark Attendance">
	</form>
<?php
$name = $_POST['name'];
$date = $_POST['date'];
$attendance = $_POST['attendance'];

// Connect to database
$conn = mysqli_connect("localhost", "username", "password", "database");

// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Insert data into database
$sql = "INSERT INTO attendance (name, date, attendance) VALUES ('$name', '$date', '$attendance')";

if (mysqli_query($conn, $sql)) {
	echo "Attendance marked successfully!";
} else {
	echo "Error marking attendance: " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);

// Connect to database
$conn = mysqli_connect("localhost", "username", "password", "database");

// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Retrieve data from database
$sql = "SELECT * FROM attendance";
$result = mysqli_query($conn, $sql);

// Display data
echo "<h1>Attendance Record</h1>";
echo "<table border='1'>";
echo "<tr><th>Name</th><th>Date</th><th>Attendance</th></tr>";

while($row = mysqli_fetch_assoc($result)) {
	echo "<tr><td>" . $row["name"]. "</td><td>" . $row["date"]. "</td><td>" . $row["attendance"]. "</td></tr>";
}

echo "</table>";

// Close connection
mysqli_close($conn);
?>
</body>
</html>