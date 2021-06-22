<!DOCTYPE html>
<html>
<head>
	<title> Donations List </title>
</head>
<link rel="stylesheet" type="text/css" href="donationlistcss.css"/>
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
			<li><a style="font-size: 25px" href="welcome.php"> Home</a></li>
            <li class="active"><a style="font-size: 25px" href="donationlist.php">Donations List</a></li>
            <li><a style="font-size: 25px" href="executivedetails.php">Assign Executive</a></li>
            <li><a style="font-size: 25px" href="ngologin.php"> Log Out</a></li>
		</ul>
	</div>
		<div class="tab">

		
    <table align="center" style="width:600px;"> 
    	<caption>DONATED MEDICINES </caption>
    	<tr>
    			<th> ID </th>
    			<th> Donator's Name </th>
    			<th> Donator's Email-Id </th>
                <th> Donator's Address</th>
    			<th> Medicine Brand Name </th>
    			<th> Medicine Generic Name </th>
    			<th> Quantity</th>
    			<th> Expiry Date </th>
    			<th> Medicine Type </th>
    			<th> Donation Type </th>
    			<th> NGO (Your) Email-Id</th>
    	</tr>
<?php
$ngo=$_SESSION['nusername'];
$query1="SELECT * from ngo_login where Login_email='$ngo'";
$result1 = mysqli_query($conn, $query1) or die( mysqli_error($conn));
$row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
$id1=$row1["Login_email"];

$sql = "SELECT * FROM donation_form WHERE receiver_email='$id1'";
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
        <td><?php echo $row['Address'];?></td>
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