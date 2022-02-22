<?php
include ("connection.php");
$dbname = "student_information";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE student (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30),
email VARCHAR(30),
phone VARCHAR(50),
birth_date DATE
)";

if ($conn->query($sql) === TRUE) {
  echo "Student Table created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>