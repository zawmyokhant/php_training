<?php
if (isset($_POST['login'])) {
    setcookie('username', $_POST['username'], time() + 3600);
    setcookie('password', $_POST['password'], time() + 3600);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style type="text/css">
  body {
    display: flex;
    justify-content:center;
  }
</style>
<body>
  <form action="index.php" method="post">
    Username : <input type="text" name="username" /><br><br>
    Password : <input type="password" name="password" /><br>
    <input type="submit" name="login" value="Login" />
  </form>
</body>
</html>
