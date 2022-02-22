<?php
include 'connection.php';
$dbname = "student_information";
$conn = new mysqli($servername, $username, $password, $dbname);
$query = "SELECT * FROM student";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
  table {
    margin-left:380px;
    background-color: #151347;
    /*border-radius:20px;*/
    box-shadow: 5px 5px grey;
  }
  td,tr {
    color: #fff;
  }
  body {
    background-color:gray;
  }
  h2 {
    text-align:center;
    color: #fff;
    text-transform:uppercase;
  }
</style>
<body>
  <h2>Student Information</h2>
<table border ="" cellspacing="0" cellpadding="10">
  <tr>
    <th>ID</th>
    <th>Full Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Birth Date</th>
  </tr>
<?php
if (mysqli_num_rows($result) > 0) {
    $sn = 1;
    while ($data = mysqli_fetch_assoc($result)) {
        ?>
 <tr>
   <td><?php echo $sn; ?> </td>
   <td><?php echo $data['username']; ?> </td>
   <td><?php echo $data['email']; ?> </td>
   <td><?php echo $data['phone']; ?> </td>
   <td><?php echo $data['birth_date']; ?> </td>
 <tr>
 <?php
$sn++;}} else {?>
    <tr>
     <td colspan="8">No data found</td>
    </tr>
 <?php }?>
  </table>
  </body>
</html>