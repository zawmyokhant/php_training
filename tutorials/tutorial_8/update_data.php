<?php
include "connection.php";
$dbname = "student_information";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE student SET username='Thaudar Samato' WHERE id=7";

if ($conn->query($sql) === true) {
    header("location:index.php");
} else {
    echo "Error updating record: " . $conn->error;
}
$conn->close();
