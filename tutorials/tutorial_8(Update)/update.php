<?php

$connection = new mysqli("localhost", "root", "1234567", "members_information");
if (isset($_GET['edit'])) {

    $id = $_GET['edit'];
    $editData = edit_data($connection, $id);
}

if (isset($_POST['update']) && isset($_GET['edit'])) {

    $id = $_GET['edit'];
    update_data($connection, $id);

}
function edit_data($connection, $id)
{
    $query = "SELECT (username,email,phone,birth_date) FROM members WHERE id= $id";
    $exec = mysqli_query($connection, $query);
    $row = mysqli_fecth_assoc($exec);
    return $row;
}

// update data query
function update_data($connection, $id)
{

    $full_name = $_POST['name'];
    $email_address = $_POST['email'];
    $phone = $_POST['phone'];
    $birth = $_POST['birth'];

    $query = "UPDATE members
            SET username='$full_name',
                email='$email_address',
                phone= '$phone',
                birth_date='$birth' WHERE id=$id";

    $exec = mysqli_query($connection, $query);

    if ($exec) {
        header('location:index.php');

    } else {
        $msg = "Error: " . $query . "<br>" . mysqli_error($connection);
        echo $msg;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PHP CRUD Operations</title>
<style>

body{
    overflow-x: hidden;
}

* {
  box-sizing: border-box;}
.user-detail form {
    height: 100vh;
    border: 2px solid #f1f1f1;
    padding: 16px;
    background-color: white;
    }
    .user-detail{
      width: 30%;
    float: left;
    }

input{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;}
input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;}
button[type=submit] {
    background-color: #434140;
    color: #ffffff;
    padding: 10px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
    font-size: 20px;}
label{
  font-size: 18px;;}
button[type=submit]:hover {
  background-color:#3d3c3c;}
  .form-title a, .form-title h2{
   display: inline-block;

  }
  .form-title a{
      text-decoration: none;
      font-size: 20px;
      background-color: green;
      color: honeydew;
      padding: 2px 10px;
  }

</style>
</head>
<body>
<div class="user-detail">

    <div class="form-title">
    <h2>Create Form</h2>

    </div>

    <p style="color:red">

<?php if (!empty($msg)) {echo $msg;}?>
</p>
    <form method="post" action="">
          <label>Full Name</label>

<input type="text" placeholder="Enter Full Name" name="name" required value="<?php echo isset($editData) ? $editData['name'] : '' ?>">

          <label>Email Address</label>

<input type="email" placeholder="Enter Email Address" name="email" required value="<?php echo isset($editData) ? $editData['email'] : '' ?>">

          <label>Phone</label>
<input type="phone" placeholder="Enter Full City" name="phone" required value="<?php echo isset($editData) ? $editData['phone'] : '' ?>">

          <label>Birth Date</label>

<input type="text" placeholder="Birth Date" name="birth" required value="<?php echo isset($editData) ? $editData['birth'] : '' ?>">

          <button type="submit" name="update">Submit</button>
    </form>
        </div>
</div>
</body>
</html>