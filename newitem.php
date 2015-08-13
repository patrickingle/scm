<?php 
$title = 'New Item Entry';
include 'header.php'; 

?>

<body background="images/back.jpg">
	<?php session_start(); ?>
	
	<img src="images/top.jpg" width=975>
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
	<td width="35%"> <img  border=0 src="images/item.jpg" usemap="#map397"></td>
	<td width="60%"><br><br><br><br>     
				<img src="images/newitem.jpg" width=600 hight=75>
				<form action="newitem.php" method="POST">
				<input type="hidden" name="new_hid">
					Item Name:<input type="text" name="itemname"><br><br>
					Category:<br><textarea name="cat" rows=5 cols=30 ></textarea><br><br>
					Purchasing Price:<input type="text" name="pur_price"><br><br>
					Quantity:<input type="text" name="qua"><br><br>						
					Selling Price:<input type="text" name="sel_price"><br><br>
					Description:<br><textarea name="desc" rows=5 cols=30 ></textarea><br><br>
					Date(In yyyy-dd-mm format):<input type="text" name="date"><br><br>
					<input type="submit" value="Add">
					<input type="reset" value="Reset">
				</form></td>

<?php
			if(isset($_POST['new_hid']))
			{
			$itmname = $_POST['itemname'];
			$category = $_POST['cat'];
			$pur_price = $_POST['pur_price'] ;
			$quantity = $_POST['qua'] ;
			$sel_price = $_POST['sel_price'] ;
			$desc = $_POST['desc'];
			$date = $_POST['date'];
			$link = mysql_connect("localhost", "root", "");
			$sql = "INSERT INTO item (itemname,category,purchasingprice,quantity,sellingprice,description,dateofpurchasing) VALUES('$itmname','$category','$pur_price','$quantity','$sel_price','$desc','$date')";
			$result = mysql_db_query("scm",$sql,$link);
			}		

?>
	</tr>
	
</td>
</table>
</body>
</html>
