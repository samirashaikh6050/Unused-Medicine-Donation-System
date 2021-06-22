<!DOCTYPE html>
<html>
<head>
<br><br><br>
<title> NGO Login</title>
<link rel="stylesheet" type="text/css" href="logincss.css">
</head>
<body>
	<?php
require('db.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['nusername'])){
        // removes backslashes
 $nusername = stripslashes($_REQUEST['nusername']);
        //escapes special characters in a string
 $nusername = mysqli_real_escape_string($con,$nusername);
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($con,$password);
 //Checking is user existing in the database or not
        $query = "SELECT * FROM `ngo_login` WHERE Login_email='$nusername'
and Login_pass= '$password' ";
 $result = mysqli_query($con,$query) or die(mysqli_error($query));
 $rows = mysqli_num_rows($result);
        if($rows==1){
     $_SESSION['nusername'] = $nusername;
            // Redirect user to userdash.php
     header("Location: ngodashboard.php");
         }
         else{
 echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
 }
    }else{
?>
	<div class="box">
		<img src="ngologo.jpg" class="quote">
		<h1> NGO Login </h1>
<form action=" " method="post">

<input type="text" name="nusername" placeholder="Enter Email Id">
<input type="password" name="password" placeholder="Enter Password">
<input type="submit" name="Login" value="Login">
 <p align="center"><a style="font-size: 15px" href="frgtpass.php"> Forgot Password?</a></p>

</form>
</div>
<?php } ?>
</body>
</html>