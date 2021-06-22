<!DOCTYPE html>
<html>
<head>
	<style>
		table, th,td
		{
			border: 1px solid black;
			border-collapse: collapse;
		}
		th,td
		{
			padding:10px;
		}
		th{
			text-align: left;
		}
	</style>
	<title>View Request</title>
</head>
<link rel="stylesheet" type="text/css" href="viewrequestcss.css"/>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdb"; 

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT  ID, Full_name, Login_email, Contact_no, Address, Country, brand_name, generic_name, quantity, medicine_type FROM request_form";
$result = mysqli_query($conn, $sql);

mysqli_close($conn);
?>
<body>
<header>
	<div class="main">
		<ul>
            <li class="active"><a style="font-size: 25px" href="viewrequest.php"> View Requested Medicines</a></li>
            <li><a style="font-size: 25px" href="registeredngo.php"> View Registered NGO's</a></li>
            <li><a style="font-size: 25px" href="donation.php"> Donate Medicines</a></li>
            <li><a style="font-size: 25px" href="mydonations.php"> My Donations</a></li>
            <li><a style="font-size: 25px" href="welcome.php"> Log Out</a></li>
        </ul>
	</div>
	<div class="tab">
		
    <table align="center" style="width:600px;"> 
     	<tr>
    		<th> ID </th>
    		<th> Full Name </th>
    	    <th> Email-Id </th>
    	    <th> Contact No. </th>
    	    <th> Address </th>
    	    <th> Country </th>
            <th> Brand Name </th>
            <th> Generic Name </th>
            <th> Quantity </th>
            <th> Medicine Type </th>
            <th> Donate </th>
    	</tr>
    		
   <?<?php 
   while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    ?>
    <tr>
    	<td><?php echo $row['ID'];?></td>
    	<td><?php echo $row['Full_name'];?></td>
    	<td><?php echo $row['Login_email'];?></td>
    	<td><?php echo $row['Contact_no'];?></td>
    	<td><?php echo $row['Address'];?></td>
    	<td><?php echo $row['Country'];?></td>
        <td><?php echo $row['brand_name'];?></td>
        <td><?php echo $row['generic_name'];?></td>
        <td><?php echo $row['quantity'];?></td>
        <td><?php echo $row['medicine_type'];?></td>
         <form action="donationindividual.php">
        <td><input type="submit" name="Donate" value="Donate"></td>   
        </form>  
    </tr>
    </div>
    <?php 
}
?>

    </table>
	<div class="footer">
<a style="font-size: 20px" href="faq.php"> FAQ</a> &nbsp&nbsp&nbsp
<a style="font-size: 20px" href="feedback.php"> Feedback </a>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
NGOs willing to register...<a style="font-size: 20px" href="ngoreg.php">Click Here</a>
<p style="font-size: 20px">NGO's can contact the portal at <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox?compose=DmwnWsmGWPMtvtdLrBBlhLpMCfgBxVfqMHgCDLsTCVjmqSmzdbjlxVvNMtZWSsCPbHcPjvcTJcNG">oumdsp@gmail.com</a></p>
	</div>
	</body>
</html>
