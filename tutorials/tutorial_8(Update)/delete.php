<?php
$con = new mysqli("localhost", "root", "1234567", "members_information");
$id = $_REQUEST['id'];
$query = "DELETE FROM members WHERE id=$id";
$result = mysqli_query($con, $query) or die(mysqli_error());
header("Location: index.php");
