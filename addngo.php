<!DOCTYPE html>
<html>
<head>
<title>Add NGO</title>
</head>
<link rel="stylesheet" type="text/css" href="addngocss.css"/>
<body>
	<?php
require('db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
        // removes backslashes

 $fname = stripslashes($_REQUEST['fname']);
        //escapes special characters in a string
 $fname = mysqli_real_escape_string($con,$fname); 
 
 $username= stripslashes($_REQUEST['username']);
 $username = mysqli_real_escape_string($con,$username);
 
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($con,$password);
 
 $yoe = stripslashes($_REQUEST['yoe']);
 $yoe = mysqli_real_escape_string($con,$yoe);
 
 $cc = stripslashes($_REQUEST['cc']);
 $cc = mysqli_real_escape_string($con,$cc);
 
 $mobile = stripslashes($_REQUEST['mobile']);
 $mobile = mysqli_real_escape_string($con,$mobile);

 $house= stripslashes($_REQUEST['house']);
 $house = mysqli_real_escape_string($con,$house);

$city = stripslashes($_REQUEST['city']);
 $city = mysqli_real_escape_string($con,$city);

 $state = stripslashes($_REQUEST['state']);
 $state = mysqli_real_escape_string($con,$state);

 $pincode = stripslashes($_REQUEST['pincode']);
 $pincode = mysqli_real_escape_string($con,$pincode);

 $country = stripslashes($_REQUEST['country']);
 $country  = mysqli_real_escape_string($con,$country);


$query = "INSERT into `ngo_login`(Full_name,Login_email,Login_pass,Year,Contact_no,Address,Country)
VALUES ('$fname','$username','$password','$yoe','$cc.$mobile','$house.$city.$state.$pincode','$country')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='ngologin.php'>Login</a></div>";
        }
    }else{
?>
	<div class="simpleform">
<form id ="registration" action="" method="post">
<h1>Add NGO</h1>

 <input type="text" name="fname" id="button" placeholder="Enter NGO Name" size="30" required><br><br>

<input type="text" name="username" id="button" placeholder="Enter Your Email-Id" size="30" required><br><br>

<input type="password" name="password" id="button" placeholder="Enter Your Password" size="30" required><br><br>

<input type="number" name="yoe" id="button" size=20 placeholder="Year of Establishment" required><br><br>

Contact No: <br> <input type="text" name="cc" id="button" size="2" value="+" required>&nbsp

<input type="number" name="mobile" id="button" size="15" required><br><br>


Address:<br>
<input type="text" name="house" id="button" placeholder="House No,Building & Area" size="30" required><br><br>
<input type="text" name="city" placeholder="City/Town/District" size="30" required><br><br>
<input type="text" name="state" placeholder="State/Union Territory" size="30" required> <br><br>
<input type="text" name="pincode" size=10 placeholder="Pincode" required><br><br>
<input type="text" name="country" placeholder="Country" size="30" required><br><br><br>
<input type="submit" name="submit" value="Create Account" > &nbsp&nbsp&nbsp
<input type="reset" name="reset" value="Reset">

</form>
</div>
<?php } ?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$connection = new mysqli("localhost","root","","userdb");

require 'D:\project\PHPMailer\PHPMailer-master\src\Exception.php';
require 'D:\project\PHPMailer\PHPMailer-master\src\PHPMailer.php';
require 'D:\project\PHPMailer\PHPMailer-master\src\SMTP.php';

if($_POST)
{
  $username=$_POST['username'];
  $password=$_POST['password'];
  $selectquery=mysqli_query($connection,"select * from ngo_login where Login_email='{$username}' && Login_pass='{$password}'") or die(mysqli_error($connection));
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
 $mail->addAddress($username,$username);

 $mail->isHTML();
 $mail->Subject='NGO Account: email and password ';
 $mail->Body="Hi $username your password for NGO account is {$password}";
 $mail->AltBody="Hi $username your password for NGO account is {$password}";

 $mail->send();
 echo "<div class='form'> The NGO Account details has been sent on the NGO email and is registered successfully.</div>";
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

</body>
</html>