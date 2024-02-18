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
$stmt = $conn->prepare("INSERT INTO form_data (text_field, text_area, check_box, multiple_checkboxes, radio_button, list_box, password_field) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssissss", $text_field, $text_area, $check_box, $multiple_checkboxes, $radio_button, $list_box, $password_field);

// Set parameters and execute
$text_field = $_POST['text_field'];
$text_area = $_POST['text_area'];
$check_box = isset($_POST['check_box']) ? 1 : 0;
$multiple_checkboxes = implode(", ", $_POST['multiple_checkboxes']);
$radio_button = $_POST['radio_button'];
$list_box = $_POST['list_box'];
$password_field = $_POST['password_field'];
$stmt->execute();

echo "Form submitted successfully";

$stmt->close();
$conn->close();
?>
