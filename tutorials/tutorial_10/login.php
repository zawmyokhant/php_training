<?php
session_start();
$conn = new mysqli("localhost", "root", "1234567", "members_information");
$msg = "";
if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $sql = mysqli_query($conn, "select * from members where email='$email' && password='$password'");
    $num = mysqli_num_rows($sql);
    if ($num > 0) {
        $row = mysqli_fetch_assoc($sql);
        $_SESSION['USER_ID'] = $row['id'];
        $_SESSION['USER_NAME'] = $row['username'];
        header("location:index.php");
    } else {
        $msg = "Please Enter Valid details !";
    }
}
?>
 <!DOCTYPE html>
 <html>
 <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <title>Login Page</title>
      <style>
        .content {
          width:500px;
          background-color: #ede2e1;
          margin:0 auto;
          margin-top:100px;
          box-shadow:5px 5px #8a8281;
        }
        .title {
          padding-top:20px;
          text-align:center;
          color:#d9901a;
        }
        form {
          text-align:center;
        }
        input[type="email"],
        input[type="password"]{
          width:200px;
          margin-left:20px;
          margin-bottom:40px;
          border:none;
          background:none;
          border-bottom:2px solid #a8323c;
        }
        input[type="submit"]{
          background:none;
          padding-top:3px;
          padding-left:5px;
          padding-right:5px;
          background-color: #000;
          color:#fff;
          margin-bottom:30px;
        }
        .error {
          color:red;
        }
        .forget {
          color: red;
          text-decoration:none;
          display: block;
          margin-bottom:10px;
        }
      </style>
 </head>
 <body>
 <div class="main">
      <div class="flex">
           <div class="content">
                <h2 class="title">Login</h2>
                <form method="post" action="">
                     <label for="username">Username:</label>
                          <input type="email" name="email"  class="form-control" required>  <br>

                     <label for="password">Password:</label>

                          <input type="password" name="password"  class="form-control" required>

                     <div class="btn-box">
                          <input type="submit" name="submit" value="Login" class="btn submit-btn">
                     </div>
                     <a href="forgotpassword.php" class="forget">Forget Password</a>
                     <div class="error">
                        <?php echo $msg ?>
                     </div>
                </form>
           </div>
      </div>
 </div>
 </body>
 </html>