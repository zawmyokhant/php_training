<html>
    <head>
        <title>Reset Password</title>

    </head>
    <style>
        div {
            width:400px;
            background-color:#afb0b3;
            margin-left:350px;
            margin-top:150px;
        }
        h2 {
            color:#d60b11;
            text-align:center;
            padding-top:10px;
        }
        form {
            text-align:center;
        }
        input[type='password']{
            border:none;
            background:none;
            width:200px;
            border-bottom:1px solid #d60b11;
            margin-bottom:25px;
        }
        input[type='submit']{
            background-color:#d60b11;
            border:none;
            padding-top:5px;
            padding-bottom:5px;
            margin-bottom:10px;
            color:#fff;
        }
        label {
            font-family:'Times New Roman';
        }
        .error {
            text-align:center;
            margin-right:200px;
        }
    </style>
    <body>
<div>
                    <?php
include 'db.php';
if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) && ($_GET["action"] == "reset") && !isset($_POST["action"])) {
    $key = $_GET["key"];
    $email = $_GET["email"];
    $curDate = date("Y-m-d H:i:s");
    $query = mysqli_query($con, "SELECT * FROM `password_reset_temp` WHERE `key`='" . $key . "' and `email`='" . $email . "';");
    $row = mysqli_num_rows($query);
    if ($row == "") {
        $error .= '<p>Invalid Link</p>';
    } else {
        $row = mysqli_fetch_assoc($query);
        $expDate = $row['expDate'];
        if ($expDate >= $curDate) {
            ?>
                                <h2>Reset Password</h2>
                                <form method="post" action="" name="update">

                                    <input type="hidden" name="action" value="update" class="form-control"/>


                                        <label>Enter  New Password:</label>
                                        <input type="password"  name="pass1" value="update" class="form-control"/>
                                        <br>
                                        <label>Comfirm New Password:</label>
                                        <input type="password"  name="pass2" value="update" class="form-control"/><br>
                                    <input type="hidden" name="email" value="<?php echo $email; ?>"/>
                                        <input type="submit" id="reset" value="Reset Password"  class="btn btn-primary"/>

                                </form>
                                <?php
} else {
            $error .= "<h2>Link Expired</h2>>";
        }
    }
    if ($error != "") {
        echo "<div class='error'>" . $error . "</div><br />";
    }
}

if (isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"] == "update")) {
    $error = "";
    $pass1 = mysqli_real_escape_string($con, $_POST["pass1"]);
    $pass2 = mysqli_real_escape_string($con, $_POST["pass2"]);
    $email = $_POST["email"];
    $curDate = date("Y-m-d H:i:s");
    if ($pass1 != $pass2) {
        $error .= "<p>Password do not match, both password should be same.<br /><br /></p>";
    }
    if ($error != "") {
        echo $error;
    } else {

        $pass1 = md5($pass1);
        mysqli_query($con, "UPDATE `members` SET `password` = '" . $pass1 . "', `trn_date` = '" . $curDate . "' WHERE `email` = '" . $email . "'");

        mysqli_query($con, "DELETE FROM `password_reset_temp` WHERE `email` = '$email'");

        echo '<p>Congratulations! Your password is updated successfully.</p>';
    }
}
?>
        </div>

    </body>
</html>

