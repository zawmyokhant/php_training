<?php
$con = mysqli_connect("localhost","root","1234567","members_information");
    if (mysqli_connect_errno()){
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }
 
$error="";
?>