<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style type="text/css">
form {
  width:500px;
  padding-top:70px;
  padding-bottom:100px;
  padding-left:50px;
  padding-right:50px;
  margin-left:400px;
  background-color: #79808a;
  margin-top:150px;
}

input[type="file"]{
  margin-left:100px;
}
input[type="text"] {
  border:none;
  border-bottom:1px solid #4287f5;
  background:none;
  width:300px;
  margin-top:30px;
  margin-left:100px;
}
input[type="submit"]{
  background:none;
  background-color:#000;
  color:#fff;
  margin-top:30px;
  padding:5px 10px;
  margin-left:200px;
}
::placeholder{
  color: #fff;
}
h2{
  text-align:center;
}
</style>
<body>
	<form action="index.php" method="post" enctype="multipart/form-data">
    <h2>Image Upload</h2>
		<input type="file" name='myfile' accept="image/*" > <br>
    <input type="text" name='myfolder' placeholder="Folder" /> <br>
		<input type="submit" value="Save">
	</form>
</body>
</html>

  <?php
$image = $_FILES['myfile'];
$fname = $_POST['myfolder'];
$folder = mkdir($fname);
move_uploaded_file($image['tmp_name'], "$fname/" . $image['name']);
?>