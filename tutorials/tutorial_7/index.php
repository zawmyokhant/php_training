<!DOCTYPE html>
<?php
//include QR-Code generator file
include 'QR_BarCode.php';

//Object for QR Code
$qr = new QR_BarCode()

?>
<html lang="en">
    <head>
        <title>QR-Code</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <style>
        .container {
            width:500px;
            padding-top:20px;
            padding-bottom:40px;
            margin-left:400px;
            background-color: #e9f7ef;
            t
            ext-aling:center;
        }
        img {
            width:200px;
            margin-left:150px;
        }
        h2{
            text-align:center;
            color:#b38719;
            padding-bottom:20px;
        }
        input[type='text'],
        input[type='email'] {
            border:none;
            background:none;
            width:300px;
            border-bottom:1px solid #b31938;
            margin-bottom:30px;
            margin-left:100px;
            padding-bottom:10px;
        }
        input[type='submit']{
            margin-left:200px;
            background:none;
            background-color: #000;
            color: #fff;
            margin-bottom:20px;
        }
    </style>
    <body>
        <div class="container">
            <h2>Get Your QRcode</h2>
            <form method="post">
                  <input type="text" placeholder="Name"  name="name" required=""><br>
                  <input type="email" placeholder="Email"  name="email" required=""><br>

              <input type="submit" name="submit" class="btn btn-danger" value="GetQRcode"/>
          </form>
            <div>
                <?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    //create text QR code
    $qr->info($name, $email);

    //Save QR in image
    $qr->qrCode(400, 'qr-legendblogs.png');
}
//Display QR
?>
                <img src="qr-legendblogs.png" alt="qr-legendblogs" />
            </div>
        </div>
    </body>
</html>
