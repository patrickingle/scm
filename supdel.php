<?php 
$title = 'Delete Supplier';
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
	<td width="35%"><br><br><br><br><br> <br><br><img  border=0 src="images/sup.jpg" usemap="#map397"></td>
	<td width="60%">
				<img src="images/supdel.jpg" width=600 hight=75>
				<form action="supdel.php" method="POST">
				<input type="hidden" name="hid_var">
<?php
	if(isset($_POST['hid_var']))
	{
		$supid = $_POST['supid'];
		$link = mysql_connect("localhost","root","");
		$result = mysql_db_query("scm","delete from supplier where supplierid = $supid",$link);
		
	}  
?>
					 Supplier:<?php echo $options; ?><br><br>
					 <input type="submit" value="Delete Entry">
				</form>

				
 

	</td>
	</tr>
	
</td>
</table>

</body>
</html>
