<?php
session_start();
$conn = mysqli_connect("localhost", "root", "1234567", "members_information");
if (!isset($_SESSION['USER_ID'])) {
    header("location:login.php");
    die();
}
?>
 <!DOCTYPE html>
 <html>
 <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Dashboard</title>
      <style>
           body{
                font-family: 'Times New Roman';
           }
           h1 {
             text-align:center;
             font-size:35px;
             margin-top:200px;
           }
           h2 {
             margin-top:20px;
             text-align:center;
           }
           a {
             text-decoration:none;
             color:red;
           }
      </style>
 </head>
 <body>
 <h1>Welcome <?php echo $_SESSION['USER_NAME'] ?></h1><br>
 <h2><a href="logout.php">Logout</a></h2>
 </body>
 </html>
