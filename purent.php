<?php 
$title = 'Purchase Entry';
include 'header.php'; 

$link = mysql_connect("localhost", "root", "");
$result = mysql_db_query('scm', "SELECT supplierid,companyname FROM supplier",$link);
$sup_options = '<select name="supid" id="supid"><option value="0">Select</option>';
while ($data = mysql_fetch_assoc($result)) {
	$sup_options .= '<option value="'.$data['supplierid'].'">'.$data['companyname'].'</option>';
}
$sup_options .= '</select>';

$result = mysql_db_query('scm', "SELECT itemid,itemname FROM item",$link);
$item_options = '<select name="itemid" id="itemid"><option value="0">Select</option>';
while ($data = mysql_fetch_assoc($result)) {
	$item_options .= '<option value="'.$data['itemid'].'">'.$data['itemname'].'</option>';
}
$item_options .= '</select>';

?>

<body background="images/back.jpg">
	<?php session_start(); ?>

	<img src="images/top.jpg" width=975 >
<table width=1000>
	<tr>
	<td width='90%'><b>Welcome, <?php echo $_SESSION['username'];?></b></td>
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
	<td width="35%"><br><br><br><br> <img  border=0 src="images/purchase.jpg" usemap="#map397"></td>
	<td width="60%"><br><br><br><br><br><br><br><br><br>   
				<img src="images/purent.jpg" width=600 hight=75>
				
 				<form action="purent.php" method="POST">
				<input type="hidden" name="lalitvar">
					Supplier:<?php echo $sup_options; ?><br><br>
					Item:<?php echo $item_options; ?><br><br>
					Item Name :<input type="text" name="itemname" id="itemname"><br><br>
					Category :<br><textarea name="category" rows=5 cols=30 id="category" ></textarea><br><br>
					Quantity :<input type="text" name="qua" id="qua"><br><br>
					Price/unit :<input type="text" name="ppu" id="ppu"><br><br>						
					Purchasing Date :<input type="text" name="pdate" id="odate"><br><br>
					 
					Recieving Date :<input type="text" name="recdate" id="recdate"><br><br>
					<input type="submit" name ="add" value="add">
					<input type="reset" name="reset" value="Reset">
				</form>
<?php

			if(isset($_POST['lalitvar']))
			{
$supid = $_POST['supid'];
$itemid = $_POST['itemid'];
$category = $_POST['category'];
$itemname = $_POST['itemname'];
$quantity = $_POST['qua'];
$ppu = $_POST['ppu'];
$purdate = $_POST['pdate'];
 
$recdate = $_POST['recdate'];

			$link = mysql_connect("localhost", "root", "");
			$sql = "INSERT INTO purchase (supplierid,itemid,itemname,category,quantity,purchaseperunit,purchasingdate,receivingdate) VALUES('$supid','$itemid','$itemname','$category','$quantity','$ppu','$purdate','$recdate')";
			$result = mysql_db_query('scm',$sql,$link);
			}		




			
?>

	</td>
	</tr>
	
</td>
</table>

</body>
</html>
