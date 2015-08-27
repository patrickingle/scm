<?php 
$title = 'Supplier Update';
include 'header.php'; 

$link = mysql_connect("localhost", "root", "");
$result = mysql_db_query('scm', "SELECT supplierid,companyname FROM supplier",$link);
$options = '<select name="supid" id="supid"><option value="0">Select</option>';
while ($data = mysql_fetch_assoc($result)) {
	$options .= '<option value="'.$data['supplierid'].'">'.$data['companyname'].'</option>';
}
$options .= '</select>';
?>

<body background="images/back.jpg">
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
	<td width="35%"> <!--img  border=0 src="images/sup.jpg" usemap="#map397"--><?php include 'sidebar.php'; ?></td>
	<td width="60%"><br><br>    
				<img src="images/supup.jpg" width=600 hight=75>
				<form action="supup.php" method="POST">
					Supplier:<?php echo $options; ?><br><br><br>
					<input type='submit' name='getsupplier' value='Get Supplier'><br/><br/>
<?php
			if(isset($_POST['button']))
			{
			$supid = $_POST['supplierid'];
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
			} elseif (isset($_POST['getsupplier'])) {
$sql = "SELECT * FROM supplier WHERE supplierid=".$_POST['supid'];
$result = mysql_db_query('scm', $sql,$link);
$rows = mysql_fetch_assoc($result);

					echo "Enter values to update:<br><br>";
					echo "<input type='hidden' name='supplierid' value='".$rows['supplierid']."'>";
					echo "Company Name:<input type='text' name='compname' value='".$rows['companyname']."'><br><br>";
					echo "Address:<br><textarea name='address' rows=5 cols=30 >".$rows['address']."</textarea><br><br>";
					echo "City:<input type='text' name='city' value='".$rows['city']."'><br><br>";
					echo "State:<input type='text' name='state' value='".$rows['state']."'><br><br>";						
					echo "Postal Code:<input type='text' name='postal' value='".$rows['postalcode']."'><br><br>";
					echo "Contact No:<input type='text' name='contact' value='".$rows['contactno']."'><br><br>";
					echo "Fax:<input type='text' name='fax' value='".$rows['fax']."'><br><br>";
					echo "email ID:<input type='text' name='email' value='".$rows['emailid']."'><br><br><br><br>";
					echo "<input type='submit' name='button' value='Update'>";
			}				 
?>
 

	</td>
	</tr>
	
</td>
</table>

</body>
</html>
