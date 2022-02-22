<?php
include "connection.php";
$dbname = "student_information";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM student WHERE id=4";

if ($conn->query($sql) === true) {
    header("location:index.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
