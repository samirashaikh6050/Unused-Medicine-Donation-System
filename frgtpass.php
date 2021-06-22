<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$connection = new mysqli("localhost","root","","userdb");

require 'E:\Pradnya\xampp\composer\PHPMailer-master\src\Exception.php';
require 'E:\Pradnya\xampp\composer\PHPMailer-master\src\PHPMailer.php';
require 'E:\Pradnya\xampp\composer\PHPMailer-master\src\SMTP.php';

if($_POST)
{
  $email=$_POST['email'];
  $selectquery=mysqli_query($connection,"select * from user_login where Login_email='{$email}'") or die(mysqli_error($connection));
  $count=mysqli_num_rows($selectquery);
  $row=mysqli_fetch_array($selectquery);
   

$mail=new PHPMailer();
try
{
 $mail->SMTPDebug=0;
 $mail->isSMTP();
 
 $mail->Host='smtp.gmail.com';
 $mail->SMTPAutoTLS = false;
 $mail->SMTPAuth=true;
 $mail->Username='oumdsp@gmail.com';
 $mail->Password='oumdsp114555';
 $mail->SMTPSecure='tls';
 $mail->Port='587';
 $mail->setFrom('oumdsp@gmail.com' , 'Admin Oumds');
 $mail->addAddress($email,$email);

 $mail->isHTML();
 $mail->Subject='Forgot Password';
 $mail->Body="Hi $email your password is {$row['Login_pass']}";
 $mail->AltBody="Hi $email your password is {$row['Login_pass']}";

 $mail->send();
 echo 'Your Password has been sent on your Email Id';
}
catch(Exception $e)
{
  echo 'Email could not been sent.';
  echo 'Mailer Error:'. $mail->ErrorInfo;
}
}
else
{
  echo"<script>alert('Email Not Found')</script>";  
}


?>


 
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<link rel="stylesheet" type="text/css" href="frgtpasscss.css"/>
<body>
  <header><br><br><br>
       <h1 align="center">Please follow the below procedure to get your Password.</h1>
    <div class="simpleform">
<form method="post">
<input type="text" name="email" id="button" placeholder="Enter your Email Id" size="30"><br><br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="submit" name="submit" value="Submit">
</form>
</div>
</header>
</body>
</html>