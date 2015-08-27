<?php 
$title = 'Item Update';
include 'header.php'; 

$link = mysql_connect("localhost", "root", "");
$sql = "SELECT itemid,itemname FROM item";
$result = mysql_db_query('scm', $sql,$link);
$options = '<select name="itemid" id="custid"><option value="0">Select</option>';
while ($data = mysql_fetch_assoc($result)) {
	$options .= '<option value="'.$data['itemid'].'">'.$data['itemname'].'</option>';
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
	<td width="35%"><br> <br> <br> <!--img  border=0 src="images/item.jpg" usemap="#map397"--><?php include 'sidebar.php'; ?></td>
	<td width="60%"><br><br><br><br><br>  <br> 
				<img src="images/itemup.jpg" width=600 hight=75>
				<form action="itemup.php" method="POST">
				 
					Item:<?php echo $options; ?><br><br> 
					<input type='submit' name='getitem' value='Get Item'><br/><br/>
<?php
			if(isset($_POST['button']))
			{
			$itemid = $_POST['itemid'];
			$itemname = $_POST['itemname'];
			$category = $_POST['category'];
			$pur_price = $_POST['pur_price'];
			$quantity = $_POST['qua'];
			$sel_price = $_POST['sel_price'];
			$desc = $_POST['desc'];
			$date = $_POST['date'];
			
			$link = mysql_connect("localhost", "root", "");
			$sql = "update item set itemname='$itemname', category='$category', purchasingprice='$pur_price', quantity='$quantity', sellingprice='$sel_price', description='$desc', dateofpurchasing='$date' where itemid=$itemid";
			echo $sql.'<br>';
			$result = mysql_db_query('scm',$sql,$link);
			} elseif (isset($_POST['getitem'])) {
$sql = "SELECT * FROM item WHERE itemid=".$_POST['itemid'];
$result = mysql_db_query('scm', $sql,$link);
$rows = mysql_fetch_assoc($result);

					echo "Enter values to update :<br><br>";
					echo "<input type='hidden' name='itemid' value='".$rows['itemid']."'>";
					echo "Item Name :<input type='text' name='itemname' value='".$rows['itemname']."'><br><br>";
					echo "Category :<br><textarea name='category' rows=5 cols=30 >".$rows['category']."</textarea><br><br>";
					echo "Purchasing Price :<input type='text' name='pur_price' value='".$rows['purchasingprice']."'><br><br>";
					echo "Quantity :<input type='text' name='qua' value='".$rows['quantity']."'><br><br>";						
					echo "Selling Price :<input type='text' name='sel_price' value='".$rows['sellingprice']."'><br><br>";
					echo "Description :<br><textarea name='desc' rows=5 cols=30>".$rows['description']."</textarea><br><br>";
    					echo "Date(In YYYY-MM-DD Format) :<input type='text' name='date' value='".$rows['dateofpurchasing']."'><br><br>";
					echo "<input type='submit' name='button' value='Update'>";
			}	 
?>

				</form></td>
	</tr>
	
</td>
</table>
</body>
</html>




