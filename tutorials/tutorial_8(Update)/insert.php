<?php
//include_once 'connection.php';
$servername = "localhost";
$username = "root";
$password = "1234567";
$dbname = "members_information";
$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $birth = $_POST['birth'];

    $sql_query = "insert into members (username,email,phone,birth_date) values ('$name','$email','$phone','$birth');";
    if ($conn->query($sql_query) === true) {
        echo "";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>INSERT DATA INTO MEMBER TABLE</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<center>

<div id="header">
 <div id="content">
    <label>FILL YOUR INFORMATION</label>
    </div>
</div>
<div id="body">
 <div id="content">
    <form action="" method="post">
    <table align="center">
    <tr>
    <td align="center"><a href="index.php">Main Page</a></td>
    </tr>
    <tr>
    <td><input type="text" name="name" placeholder="Name" required /></td>
    </tr>
    <tr>
    <td><input type="email" name="email" placeholder="Email" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="phone" placeholder="Phone" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="birth" placeholder="Birth Date" required /></td>
    </tr>
    <tr>
    <td><button type="submit" name="send"><strong>SAVE</strong></button></td>
    </tr>
    </table>
    </form>
    </div>
</div>

</center>
</body>
</html>
