<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>
</head>
<style type="text/css">
h1 {
  text-align: center;
  margin-top:150px;
}
span {
  color:red;
}
a {
  display:block;
  text-decoration:none;
  color:red;
  text-align:center;
}
</style>
<body>
  <h1>Login Successfully! Welcome <span><?php echo $_POST['username']; ?></span></h1>
  <a href="logout.php">LOGOUT</a>
</body>
</html>