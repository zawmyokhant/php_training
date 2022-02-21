<?php
require_once "phpqrcode/qrlib.php";
if (isset($_POST['sub'])) {
  $path='image/';
  $file = $path.uniqid().'.png';
  $text =$_POST['name'];
  $text = $_POST['phone'];
  $text = $_POST['web'];
  Qrcode::png($text,$file);
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
<style>
  h2 {
    text-align:center;
    color:#b36c09;
  }
  form{
    width:500px;
    margin-top:100px;
    margin-left:500px;
    background-color: #e9f7ef;
    padding-top: 50px;
    padding-bottom:50px;
  }
  input[type="text"]{
    border:none;
    width:200px;
    /*margin-top:px;*/
    background:none;
    border-bottom:1px solid blue;
    padding-bottom:10px;
    color: red;
    margin-left:150px;
  }
  ::placeholder {
    color: #1c2b23;
    margin-bottom:30px;
  }
  input[type="submit"]{
    margin-left:210px;
    background-color:#000;
    color:#fff;
  }
</style>
<body>
  <form action="index.php" method="post">
    <h2>Create Your QRcode</h2>
    <input type="text" name="name" placeholder=" Enter your name"><br><br>
    <input type="text" name="phone" placeholder="Enter your phone " ><br><br>
    <input type="text" name="web" placeholder="Enter your website"> <br><br>
    <input type="submit" name="sub" value="GetQRcode"/>
  </form>
</body>
</html>