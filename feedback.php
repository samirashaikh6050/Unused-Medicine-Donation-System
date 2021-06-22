<!DOCTYPE html>
<html>
<head>
	<title>Feedback</title>
</head>
<link rel="stylesheet" type="text/css" href="feedbackcss.css"/>
<body>
	<?php
require('db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['email'])){
        // removes backslashes

 $fname = stripslashes($_REQUEST['fname']);
        //escapes special characters in a string
 $fname = mysqli_real_escape_string($con,$fname); 
 
 $email= stripslashes($_REQUEST['email']);
 $email = mysqli_real_escape_string($con,$email);
 
 $phone = stripslashes($_REQUEST['phone']);
 $phone = mysqli_real_escape_string($con,$phone);

 $sub = stripslashes($_REQUEST['sub']);
 $sub = mysqli_real_escape_string($con,$sub);
 
 $msg = stripslashes($_REQUEST['msg']);
 $msg = mysqli_real_escape_string($con,$msg);


$query = "INSERT into user_feedback (Full_name, Login_email, Phone, Sub, Msg)
VALUES ('$fname','$email','$phone','$sub','$msg')";
        $result = mysqli_query($con,$query);

        if($result){
            echo "<div class='form'>
<h3>Thank you for your feedback.</h3>
</div>";    
   }
    }else{
?>
	<header>
		<br><br><br>
		<h1 align="center">Share your valuable feedback with us.</h1><br><br>
<div class="simpleform">
	<form action=" ">
		<input type="text" name="fname" id="button" placeholder="  Enter Full Name" size="30" required><br><br>
		<input type="text" name="email" id="button" placeholder="  Email-Id" size="30" required><br><br>
		<input type="text" name="phone" id="button" placeholder="  Phone No" size="30" required><br><br>
		<input type="text" name="sub" id="button" placeholder="  Subject" size="30" required><br><br>
		 <textarea id="feedback" name="msg" placeholder="Enter Your Feedback" required></textarea><br><br>
		 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		 <input type="submit" name="submit" value="Submit">
		</form>
	</div>
	<?php } ?>
	
</header>
</body>
</html>