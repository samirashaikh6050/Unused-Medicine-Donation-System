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
            padding:12px;
        }
        th{
            text-align: left;
        }
    </style>
	<title> My Donations </title>
</head>
<link rel="stylesheet" type="text/css" href="mydonationscss.css"/>
<?php 
session_start();
// Create connection
$conn = mysqli_connect("localhost", "root", "", "userdb");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<body> 
<header>
	<div class="main">
		<ul>
			<li><a style="font-size: 25px" href="viewrequest.php"> View Requested Medicines</a></li>
            <li><a style="font-size: 25px" href="registeredngo.php"> View Registered NGO's</a></li>
			<li><a style="font-size: 25px" href="donation.php"> Donate Medicines</a></li>
            <li class="active"><a style="font-size: 25px" href="mydonations.php"> My Donations</a></li> 
			<li><a style="font-size: 25px" href="welcome.php"> Logout</a></li>
		</ul>
	</div>
		<div class="tab">
    <table align="left" style="width:600px" > 
    	<tr>
    			<th> ID </th>
    			<th> Name </th>
    			<th> Email-Id </th>
    			<th> Medicine Brand Name </th>
    			<th> Medicine Generic Name </th>
    			<th> Quantity</th>
    			<th> Expiry Date </th>
    			<th> Medicine Type </th>
    			<th> Donation Type </th>
    			<th> Receiver's Email </th>
    	</tr>
<?php
$user=$_SESSION["username"]; 
$query="SELECT * from user_login where Login_email='$user'";
$result = mysqli_query($conn, $query) or die( mysqli_error($conn));
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$id=$row["ID"];
$sql = "SELECT * FROM donation_form WHERE user_id=$id";
$result = mysqli_query($conn, $sql) or die( mysqli_error($conn));
$rowcount=mysqli_num_rows($result);
for($i=1;$i<=$rowcount;$i++)
{
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	

?>
    		
    <tr>
    	<td><?php echo $row['ID'];?></td>
    	<td><?php echo $row['Full_name'];?></td>
    	<td><?php echo $row['Login_email'];?></td>
    	<td><?php echo $row['brand_name'];?></td>
    	<td><?php echo $row['generic_name'];?></td>
    	<td><?php echo $row['quantity'];?></td>
    	<td><?php echo $row['expiry_date'];?></td>
    	<td><?php echo $row['medicine_type'];?></td>
    	<td><?php echo $row['donation_type'];?></td>
    	<td><?php echo $row['receiver_email'];?></td>
    </tr>
    </div>
    <?php 
}
mysqli_close($conn);
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