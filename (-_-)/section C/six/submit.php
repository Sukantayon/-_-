<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO student_marks (student_name, roll_number, subject1, subject2, subject3, subject4, subject5) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssiiiii", $student_name, $roll_number, $subject1, $subject2, $subject3, $subject4, $subject5);

// Set parameters and execute
$student_name = $_POST['student_name'];
$roll_number = $_POST['roll_number'];
$subject1 = $_POST['subject1'];
$subject2 = $_POST['subject2'];
$subject3 = $_POST['subject3'];
$subject4 = $_POST['subject4'];
$subject5 = $_POST['subject5'];
$stmt->execute();

$stmt->close();
$conn->close();

// Redirect to another page
header("Location: gpa.php");
exit();
?>
