<!DOCTYPE html>
<html>
<head>
	<title> Assign Executive</title>
</head>
<link rel="stylesheet" type="text/css" href="assignexecss.css"/>
<body>
	<?php
require('db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['eemail'])){
        // removes backslashes

 $ename = stripslashes($_REQUEST['ename']);
        //escapes special characters in a string
 $ename = mysqli_real_escape_string($con,$ename); 
 
 $eemail= stripslashes($_REQUEST['eemail']);
 $eemail = mysqli_real_escape_string($con,$eemail);
 
 $dname = stripslashes($_REQUEST['dname']);
 $dname = mysqli_real_escape_string($con,$dname);

 $demail = stripslashes($_REQUEST['demail']);
 $demail = mysqli_real_escape_string($con,$demail);
 
 $daddr = stripslashes($_REQUEST['daddr']);
 $daddr = mysqli_real_escape_string($con,$daddr);
 
 $brand = stripslashes($_REQUEST['brand']);
 $brand = mysqli_real_escape_string($con,$brand);

 $generic= stripslashes($_REQUEST['generic']);
 $generic = mysqli_real_escape_string($con,$generic);

$quantity = stripslashes($_REQUEST['quantity']);
 $quantity = mysqli_real_escape_string($con,$quantity);

 $exp = stripslashes($_REQUEST['exp']);
 $exp = mysqli_real_escape_string($con,$exp);

 $coll = stripslashes($_REQUEST['coll']);
 $coll = mysqli_real_escape_string($con,$coll);

 $ctime = stripslashes($_REQUEST['ctime']);
 $ctime  = mysqli_real_escape_string($con,$ctime);


$query = "INSERT into assignexecutive (e_name, e_email, d_name, d_email, d_address, brand_name, generic_name, quantity, expiry_date, collection_date, c_time)
VALUES ('$ename','$eemail','$dname','$demail','$daddr','$brand','$generic','$quantity','$exp','$coll','$ctime')";
        $result = mysqli_query($con,$query);

        if($result){
            echo "<div class='form'>
<h3>The mail has been sent to the executive successfully.</h3>
</div>";    
   }
    }else{
?>
<div class="simpleform">
<form id ="registration" action="" method="post">
<h3>Executive Details</h3>
 <input type="text" name="ename" id="button" placeholder="Enter Executive's Name" size="30" required><br><br>

 <input type="text" name="eemail" id="button" placeholder="Enter Executive's Email Id" size="30" required><br><br>

 <h3> Donator details </h3>
 <input type="text" name="dname" id="button" placeholder="Enter Donator's Name" size="30" required><br><br>
 <input type="text" name="demail" id="button" placeholder="Enter Donator's Email Id" size="30" required><br><br>
 <input type="text" name="daddr" id="button" placeholder="Enter Donator's Address" size="30" required><br><br>

 <h3> Details of Donated Medicines </h3>
 <input type="text" name="brand" id="button" placeholder="Enter the medicine brand name " size="30" required><br><br>
 <input type="text" name="generic" id="button" placeholder="Enter the medicine generic name " size="30" required><br><br>
 <input type="text" name="quantity" id="button" placeholder="Enter quantity of medicines donated " size="30" required><br><br>

Expiry Date:<br>
 <input type="Date" name="exp" id="button" placeholder="" size="30"><br><br>
 <h3> Executive should collect the Donated Medicines from Donator's Address on: </h3>
 <input type="Date" name="coll" id="button" placeholder="" size="30"><br><br>

 Time:
 <input type="time" name="ctime" id="button"><br><br>
<input type="submit" name="submit" value="Add Executive"> &nbsp&nbsp&nbsp
<input type="reset" name="reset" value="Reset">

</form>
</div>
<?php } ?>
</body>
</html>