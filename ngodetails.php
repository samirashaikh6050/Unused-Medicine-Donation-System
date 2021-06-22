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
			padding:8px;
		}
		th{
			text-align: left;
		}
	</style>
	<title>NGO Details</title>
</head>
<link rel="stylesheet" type="text/css" href="ngodetailscss.css"/>


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

$sql = "SELECT  ID, Full_name, Login_email, Address, Contact_no  FROM ngo_login";
$result = mysqli_query($conn, $sql);

mysqli_close($conn);
?>
<body>
<header>
	<div class="main">
		<ul>
			<li><a style="font-size: 25px" href="welcome.php"> Home</a></li>
			<li><a style="font-size: 25px" href="addngo.php">Add NGO</a></li>
			<li><a style="font-size: 25px" href="addexe.php">Add Executive</a></li>
			<li><a style="font-size: 25px" href="userdetails.php">View Donator Details</a></li>
			<li class="active"><a style="font-size: 25px" href="ngodetails.php">View NGO Details</a></li>
			<li><a style="font-size: 25px" href="viewrequestadmin.php">View Requested Medicines</a></li>
			<li><a style="font-size: 25px" href="adminlogin.php"> Log Out</a></li>

		</ul>
	</div>
	<div class="tab">
		
    <table align="center" style="width:600px;"> 
     	<tr>
    		<th> ID </th>
            <th> NGO Name </th>
    	    <th> Email-Id </th>
            <th> Address </th>
            <th> Contact </th>
    	</tr>
    		
   <?<?php 
   while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    ?>
    <tr>
    	<td><?php echo $row['ID'];?></td>
        <td><?php echo $row['Full_name'];?></td>
    	<td><?php echo $row['Login_email'];?></td>
        <td><?php echo $row['Address'];?></td>
        <td><?php echo $row['Contact_no'];?></td>
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
