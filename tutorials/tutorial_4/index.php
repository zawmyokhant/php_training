<?php
if (isset($_POST['login'])) {
    if ($_POST['username'] === 'Zaw Myo Khant' && $_POST['password'] === '1234') {
        setcookie('username', $_POST['username'], time() + 3600);
        setcookie('password', $_POST['password'], time() + 3600);
        header('location:welcome.php');
    } else {
        echo "Login Failed";
    }
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
  form {
    margin-top:100px;
  }
  input[type="submit"]{
    margin-left:120px;
    margin-top:10px;
  }
</style>
<body>
  <form action="" method="post">
    Username : <input type="text" name="username" /><br><br>
    Password : <input type="password" name="password" /><br>
    <input type="submit" name="login" value="Login" />
  </form>
</body>
</html>
