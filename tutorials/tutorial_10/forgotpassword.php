<?php
use PHPMailer\PHPMailer\PHPMailer;
?>
<html>
    <head>
        <title>Password Recovery</title>
    </head>
    <style type="text/css">
        div {
            width:500px;
            margin-top:100px;
            margin-left:350px;
            /*margin: 0 auto;*/
            background-color: #f5f4f0;
        }
        h2 {
            text-align:center;
            color: #eb1040;
            padding-top:20px;
        }
        form {
            text-align:center;
        }
        input[type='email']{
            border:none;
            width:300px;
            background:none;
            border-bottom: 2px solid #eb1040;
            padding-bottom:5px;
            margin-top:10px;

        }
        ::placeholder{
            font-family:'Times New Roman';
            color:red;

        }
        input[type='submit']{
            margin-top:20px;
            font-family:'Times New Roman';
            background-color: red;
            color:#fff;
            border:1px solid #f5f4f0;
            margin-bottom:30px;
            padding-top:5px;
            padding-bottom:5px;
        }
        h3 {
            font-family:'Times New Roman';
            text-align:center;
            color:#a6111d;
            letter-spacing:2px;
            font-size:17px;
        }
    </style>
    <body>
        <div>
                    <h2>Forgot Password</h2>

                    <?php
include 'db.php';
if (isset($_POST["email"]) && (!empty($_POST["email"]))) {
    $email = $_POST["email"];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!$email) {
        $error .= "Invalid email address";
    } else {
        $sel_query = "SELECT * FROM `members` WHERE email='" . $email . "'";
        $results = mysqli_query($con, $sel_query);
        $row = mysqli_num_rows($results);
        if ($row == "") {
            $error .= "<h3>User Not Found</h3>";
        }
    }
    if ($error != "") {
        echo $error;
    } else {

        $output = '';

        $expFormat = mktime(date("H"), date("i"), date("s"), date("m"), date("d") + 1, date("Y"));
        $expDate = date("Y-m-d H:i:s", $expFormat);
        $key = md5(time());
        $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
        $key = $key . $addKey;
        // Insert Temp Table
        mysqli_query($con, "INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES ('" . $email . "', '" . $key . "', '" . $expDate . "');");

        $output .= '<p>Please click on the following link to reset your password.</p>';
        //replace the site url
        $output .= '<p><a href="http://localhost:8000/reset-password.php?key=' . $key . '&email=' . $email . '&action=reset" target="_blank">http://localhost:8000/reset-password.php?key=' . $key . '&email=' . $email . '&action=reset</a></p>';
        $body = $output;
        $subject = "Password Recovery";

        $email_to = $email;

        //autoload the PHPMailer
        require "vendor/autoload.php";
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Host = "smtp.gmail.com"; // Enter your host here
        $mail->SMTPAuth = true;
        $mail->Username = "zawmyokhant429@gmail.com"; // Enter your email here
        $mail->Password = "khant123!"; //Enter your passwrod here
        $mail->Port = 587;
        $mail->IsHTML(true);
        $mail->From = "noreply@gmail.com";
        $mail->FromName = "Sashimi";

        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($email_to);
        if (!$mail->Send()) {
            echo "<h3>Mailer Error</h3>";
        } else {
            echo "<h3>Success check your mail</h3>";
        }
    }
}
?>
                    <form method="post" action="" name="reset">


                           <!--<label><strong>Enter Your Email Address:</strong></label>-->
                            <input type="email" name="email" placeholder="Enter your email" class="form-control"/>
                            <br>
                            <input type="submit" id="reset" value="Reset Password"  class="btn btn-primary"/>
                    </form>
                    </div>
    </body>
</html>