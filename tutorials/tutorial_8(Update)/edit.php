<?php
$db = new mysqli("localhost", "root", "1234567", "members_information");
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($db, "SELECT * FROM members WHERE id=$id");

    if (count($record) == 1) {
        $n = mysqli_fetch_array($record);
        $name = $n['username'];
        $email = $n['email'];
        $phone = $n['phone'];
        $birth = $n['birth_date'];
    }
}
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $birth = $_POST['birth'];
    mysqli_query($db, "UPDATE members SET username='$name', email='$email', phone='$phone', birth_date='$birth' WHERE id=$id");
    $_SESSION['message'] = "Address updated!";
    header('location: index.php');
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
      <td><input type="hidden" name="id" value="<?php echo $id; ?>">
</td>
    </tr>
    <tr>
    <td><input type="text" name="name" placeholder="Name" value="<?php echo $name; ?>" required /></td>
    </tr>
    <tr>
    <td><input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="phone" placeholder="Phone" value="<?php echo $phone; ?>"
     required /></td>
    </tr>
    <tr>
    <td><input type="text" name="birth" placeholder="Birth Date" value="<?php echo $birth; ?>" required /></td>
    </tr>
    <tr>
    <td><button type="submit" name="update"><strong>UPDATE</strong></button></td>
    </tr>
    </table>
    </form>
    </div>
</div>

</center>
</body>
</html>