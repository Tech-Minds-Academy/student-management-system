<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<!DOCTYPE html>
<html>
<head>
	<title>Student Grade System</title>
</head>
<body>
	<h1>Student Grade System</h1>
	<form action="grade.php" method="POST">
		<label>Student Name:</label>
		<input type="text" name="name"><br><br>
		<label>Math Score:</label>
		<input type="number" name="math"><br><br>
		<label>Science Score:</label>
		<input type="number" name="science"><br><br>
		<label>English Score:</label>
		<input type="number" name="english"><br><br>
		<input type="submit" value="Calculate Grade">
	</form>


	
<?php
$name = $_POST['name'];
$math = $_POST['math'];
$science = $_POST['science'];
$english = $_POST['english'];

$total = $math + $science + $english;
$average = $total / 3;

if ($average >= 90) {
	$grade = 'A';
} elseif ($average >= 80) {
	$grade = 'B';
} elseif ($average >= 70) {
	$grade = 'C';
} elseif ($average >= 60) {
	$grade = 'D';
} else {
	$grade = 'F';
}

echo "<h1>Student Grade Report</h1>";
echo "<p>Name: $name</p>";
echo "<p>Math Score: $math</p>";
echo "<p>Science Score: $science</p>";
echo "<p>English Score: $english</p>";
echo "<p>Total Score: $total</p>";
echo "<p>Average Score: $average</p>";
echo "<p>Grade: $grade</p>";
?>
</body>
</html>