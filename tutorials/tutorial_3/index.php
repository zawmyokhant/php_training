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
       Your Date Of Birth: <input type="date" name="date">
        <br>
        <input type="submit" name="submit">
    </form>
    <?php
if (isset($_POST['submit'])) {

    $date = $_POST['date'];

    $age = date("Y/m/d") - $date;

    echo "You are $age years old.";
}

?>

</body>
</html>