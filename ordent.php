<?php 
$title = 'Order Entry';
include 'header.php'; 

$link = mysql_connect("localhost", "root", "");
$result = mysql_db_query('scm', "SELECT id,name FROM customer",$link);
$cust_options = '<select name="custid" id="custid"><option value="0">Select</option>';
while ($data = mysql_fetch_assoc($result)) {
	$cust_options .= '<option value="'.$data['id'].'">'.$data['name'].'</option>';
}
$cust_options .= '</select>';

$link = mysql_connect("localhost", "root", "");
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
	<td width="35%">   <!--img  border=0 src="images/sales.jpg" usemap="#map397"--><?php include 'sidebar.php'; ?></td>
	<td width="60%"><br><br> <br><br> 
				<img src="images/ordent.jpg" width=600 hight=75>
				
 				<form action="ordent.php" method="POST">
				<input type="hidden" name="lalitvar">
					Customer :<?php echo $cust_options; ?><br><br>
					Item :<?php echo $item_options; ?><br><br>
					Category :<br><textarea name="category" rows=5 cols=30 ></textarea><br><br>
					Item Name :<input type="text" name="itemname" id="itemname"><br><br>
					Quantity of Item :<input type="text" name="qoi" id="qoi"><br><br>
					Quantity :<input type="text" name="qua" id="qua"><br><br>
					Price/unit :<input type="text" name="ppu" id="ppu"><br><br>						
					Order Date :<input type="text" name="odate" id="odate"><br><br>
					Delivery Date :<input type="text" name="ddate" id="ddate"><br><br>
					Returing Date :<input type="text" name="rdate" id="rdate"><br><br>
					<input type="submit" name ="add" value="add">
					<input type="reset" name="reset" value="Reset">
				</form>
<?php
			if(isset($_POST['lalitvar']))
			{
				//$orderid = $_POST['orderid'];
				$custid = $_POST['custid'];
				$itemid = $_POST['itemid'];
				$category = $_POST['category'];
				$itemname = $_POST['itemname'];
				$qoi = $_POST['qoi'];
				$quantity = $_POST['qua'];
				$ppu = $_POST['ppu'];
				$orderdate = $_POST['odate'];
				$deliverydate = $_POST['ddate'];
				$returndate = $_POST['rdate'];

				$link = mysql_connect("localhost", "root", "");
				$sql = "INSERT INTO sales (customerid, itemid, category, itemname, quantityofitem, quantity, priceperunit, orderdate, deliverydate, returningdate) VALUES('$custid','$itemid','$category','$itemname','$qoi','$quantity','$ppu','$orderdate','$deliverydate','$returndate')";
				
				$result = mysql_db_query('scm',$sql,$link);
			}		




			
?>

	</td>
	</tr>
	
</td>
</table>

</body>
</html>
