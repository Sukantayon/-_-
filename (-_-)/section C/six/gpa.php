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

// Retrieve student marks from the database
$sql = "SELECT * FROM student_marks ORDER BY student_name";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    // Calculate GPA for each student
    $total_marks = $row['subject1'] + $row['subject2'] + $row['subject3'] + $row['subject4'] + $row['subject5'];
    $gpa = $total_marks / 5;

    echo "Student Name: " . $row['student_name'] . "<br>";
    echo "Roll Number: " . $row['roll_number'] . "<br>";
    echo "Total Marks: " . $total_marks . "<br>";
    echo "GPA: " . number_format($gpa, 2) . "<br><br>";
  }
} else {
  echo "0 results";
}

$conn->close();
?>
