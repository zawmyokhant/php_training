<?php
include "connection.php";
$dbname = "student_information";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO student (username,email,phone,birth_date)
VALUES ('Zaw Myo Khant', 'zawmyokhant429@gmail.com', '09972399323','1998-10-25'),
        ('Myo Aung Soe', 'myosoe254@gmail.com', '09789678567','1997-3-25'),
        ('Tun Tun Aung', 'tuntunaung9@gmail.com', '09567564323','1991-7-25'),
        ('Myint Thu Aung', 'zawmyokhant429@gmail.com', '09972399323','1998-10-25'),
        ('Saw Lay Pyay ', 'saw9@gmail.com', '09789678376','1992-10-25'),
        ('Tun Myint Naing', 'naing9@gmail.com', '099878923','1995-10-25'),
        ('Saw Thiri Naing', 'saw145@gmail.com', '09980789657','1991-10-25')";

if ($conn->query($sql) === true) {
    header("location:index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
