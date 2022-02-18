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
  text-align: center;
  margin-top:150px;
}
</style>
<body>
	<form action="index.php" method="post" enctype="multipart/form-data">
		<label>UploadImage</label>
		<input type="file" name='myfile' accept="image/*" >
		<input type="submit" value="Upload">
	</form>
</body>
</html>

  <?php
$user = $_POST['username'];
$image = $_FILES['myfile'];
move_uploaded_file($image['tmp_name'], "upload/" . $image['name']);
?>