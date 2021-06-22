
<!DOCTYPE html>
<html>
<head>
<br><br><br>
<title> User Login</title>
<link rel="stylesheet" type="text/css" href="logincss.css">
</head>
<body>
	<?php
require('db.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['username'])){
        // removes backslashes
 $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
 $username = mysqli_real_escape_string($con,$username);
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($con,$password);
 //Checking is user existing in the database or not
        $query = "SELECT * FROM `user_login` WHERE Login_email='$username'
and Login_pass= '$password' ";
 $result = mysqli_query($con,$query) or die(mysqli_error($query));
 $rows = mysqli_num_rows($result);
        if($rows==1){
     $_SESSION['username'] = $username;
            // Redirect user to userdash.php
     header("Location: userdash.php");
         }
         else{
 echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
 }
    }else{
?>
	<div class="box">
		<img src="userlogo.jpg" class="quote">
		<h1> User Login </h1>
<form action=" " method="post">

<input type="text" name="username" placeholder="Enter Email Id">
<input type="password" name="password" placeholder="Enter Password">
<input type="submit" name="Login" value="Login">
 <p align="center"><a style="font-size: 15px" href="frgtpass.php"> Forgot Password?</a></p>
<p align="center"><h6> &nbsp&nbsp&nbsp Don't have an account? &nbsp&nbsp<a href="signup.php">Click here to register</a></h6>
 </p>

</form>
</div>
<?php } ?>
</body>
</html>