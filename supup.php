<?php 
$title = 'Supplier Update';
include 'header.php'; 
?>

<body background="back.jpg">
	<?php session_start(); ?>

	<img src="images/top.jpg" width=975 >
<table width=1000>
	<tr>
	<td width='90%'><b>Welcome, <?php echo $_SESSION['username']; ?></b></td>
	<td width="10%"><a href="end.php" align="right"><font color="#000000"><b>Logout</b></font></a></td>
	</tr>
</table>

	
<table>

<td width=300 height=300 colspan=1 rowspan=3 valign=top align=left>
	<map name="map397">
				<area shape='rect' coords='4,5,135,40' href='customer.php'>
				<area shape='rect' coords='4,49,135,83' href='item.php'>
				<area shape='rect' coords='4,93,135,127' href='sales.php'>
				<area shape='rect' coords='4,137,135,172' href='supplier.php'>
				<area shape='rect' coords='4,179,135,213' href='purchase.php'>
				<area shape='rect' coords='4,220,135,258' href='report.php'>
				<area shape='rect' coords='4,270,135,310' href='end.php'>
	</map>

	<tr>
	<td width="5%"></td>
	<td width="35%"> <img  border=0 src="images/sup.jpg" usemap="#map397"></td>
	<td width="60%"><br><br>    
				<img src="images/supup.jpg" width=600 hight=75>
				<form action="supup.php" method="POST">
					Enter Supplier ID:<input type="text" name="supid"><br><br><br>
					
<?php
			if(isset($_POST['button']))
			{
			$supid = $_POST['supid'];
			$cname = $_POST['compname'];
			$ad = $_POST['address'];
			$ct = $_POST['city'];
			$stat = $_POST['state'];
			$postal = $_POST['postal'];
			$cont = $_POST['contact'];
			$fx = $_POST['fax'];
			$emel = $_POST['email'];
			$link = mysql_connect("localhost", "root", "");
			$result = mysql_db_query('scm',"update supplier set companyname='$cname', address='$ad', city='$ct', state='$stat', postalcode='$postal', contactno='$cont', fax='$fx', emailid='$emel' where supplierid='$supid'",$link);
			} 

					echo "Enter values to update:<br><br>";
					echo "Company Name:<input type='text' name='compname'><br><br>";
					echo "Address:<br><textarea name='address' rows=5 cols=30 ></textarea><br><br>";
					echo "City:<input type='text' name='city'><br><br>";
					echo "State:<input type='text' name='state'><br><br>";						
					echo "Postal Code:<input type='text' name='postal'><br><br>";
					echo "Contact No:<input type='text' name='contact'><br><br>";
					echo "Fax:<input type='text' name='fax'><br><br>";
					echo "email ID:<input type='text' name='email'><br><br><br><br>";
					echo "<input type='submit' name='button' value='Update'>";
				 
?>
 

	</td>
	</tr>
	
</td>
</table>

</body>
</html>
