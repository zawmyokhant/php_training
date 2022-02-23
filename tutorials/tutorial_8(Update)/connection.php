<?php
$servername = "localhost";
$username = "root";
$password = "1234567";
$conn = new mysqli($servername, $username, $password);
//if(!$conn){
//  die("Failed to connect").$conn->connect_error;
//}else {
//  echo "Success to connect";
//}

$sqli = "CREATE DATABASE members_information";
//if($conn->query($sqli) === TRUE) {
//  echo "Successful Creating Database";
//}else {
//  echo "Try agin";
//}

$dbname = "members_information";
$conn = new mysqli($servername, $username, $password, $dbname);
//if($conn){
//  echo "Success connect to database";
//}else {
//  echo "Try again to connect";
//}

$table = "CREATE TABLE members(
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(60),
  email VARCHAR(60),
  phone VARCHAR(60),
  birth_date DATE
)";

//if($conn->query($table)===TRUE){
//  echo "Success creating Table";
//}else {
//  echo "Try again";
//}
