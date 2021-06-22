<!DOCTYPE html>
<html>
<head>
<title>Add Executive</title>
</head>
<link rel="stylesheet" type="text/css" href="addexecss.css"/>
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
 
 $age = stripslashes($_REQUEST['age']);
 $age = mysqli_real_escape_string($con,$age);

 $r1 = stripslashes($_REQUEST['r1']);
 $r1 = mysqli_real_escape_string($con,$r1);
 
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


$query = "INSERT into executive (Full_name,Login_email,Age,Gender,Contact_no,Address,Country)
VALUES ('$fname','$username','$age','$r1','$cc.$mobile','$house.$city.$state.$pincode','$country')";
        $result = mysqli_query($con,$query);

        if($result){
            echo "<div class='form'>
<h3>The executive is registered successfully.</h3>
</div>";    
   }
    }else{
?>
	<div class="simpleform">
<form id ="registration" action="" method="post">
<h1>Add Executive</h1>

 <input type="text" name="fname" id="button" placeholder="Enter the Name" size="30" required><br><br>

<input type="text" name="username" id="button" placeholder="Enter Your Email-Id" size="30" required><br><br>

<input type="number" name="age" id="button" size=20 placeholder="Age" required><br><br>

<input type="radio" id="rd" name="r1" value="male" required>Male &nbsp&nbsp&nbsp&nbsp <input type="radio" id="rd" name="r1" value="female" required>Female <br><br>


Contact No: <br> <input type="text" name="cc" id="button" size="2" value="+" required>&nbsp

<input type="number" name="mobile" id="button" size="15" required><br><br>


Address:<br>
<input type="text" name="house" id="button" placeholder="House No,Building & Area" size="30" required><br><br>
<input type="text" name="city" placeholder="City/Town/District" size="30" required><br><br>
<input type="text" name="state" placeholder="State/Union Territory" size="30" required> <br><br>
<input type="text" name="pincode" size=10 placeholder="Pincode" required><br><br>
<input type="text" name="country" placeholder="Country" size="30" required><br><br><br>
<input type="submit" name="submit" value="Add Executive"> &nbsp&nbsp&nbsp
<input type="reset" name="reset" value="Reset">

</form>
</div>
<?php } ?>
</body>
</html>