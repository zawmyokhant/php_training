<?php
$servername = "localhost";
$username = "root";
$password = "1234567";
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "CREATE DATABASE student_information";
//if ($conn->query($sql) === TRUE) {
//  echo "Database created successfully";
//} else {
//  echo "Error creating database: " . $conn->error;
//}
$conn->close();
