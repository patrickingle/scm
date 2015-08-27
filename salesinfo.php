<?php 
$title = 'Sales Informatio';
include 'header.php'; 

$link = mysql_connect("localhost", "root", "");
$result = mysql_db_query('scm', "SELECT orderid,itemname FROM sales",$link);
$options = '<select name="ordid" id="ordid"><option value="0">Select</option>';
while ($data = mysql_fetch_assoc($result)) {
	$options .= '<option value="'.$data['orderid'].'">'.$data['itemname'].'</option>';
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
	<td width="35%"><br><br><br><br><br><br><br><!--img  border=0 src="images/sales.jpg" usemap="#map397"--><?php include 'sidebar.php'; ?></td>
	<td width="60%">
				<img src="images/salesinfo.jpg" width=600 hight=75>
				<form action="salesinfo.php" method="POST">
				<input type="hidden" name="lalithid1">
					 Order ID:<?php echo $options; ?><br><br>
					 <input type="submit" value="Submit">
				</form>
<?php
			if(isset($_POST['lalithid1']))
			{
				$ordid = $_POST['ordid'];
				$link = mysql_connect("localhost", "root", "");
				$result = mysql_db_query('scm', "SELECT * FROM sales WHERE orderid='$ordid'",$link);
				
				$data = mysql_fetch_row($result);
				if(!$data){die("No Entry Found");}else{ 
				echo "INFORMATION ABOUT Order ID: "."<b>".$ordid."</b>";
				echo "<br><br>Customer ID: " . $data[1];
				echo "<br>Item ID : " . $data[2];
				echo "<br>Category : " . $data[3];
				echo "<br>Item Namr: " . $data[4];
				echo "<br>Quantity of Item: " . $data[5];
				echo "<br>Quantity : " . $data[6];
				echo "<br>Price/unit: " . $data[7];
				echo "<br>Order Date: " . $data[8];
				echo "<br>Delivery Date: " . $data[9];
				echo "<br>Returning Date: " . $data[10];}
			}
?>
 

	</td>
	</tr>
	
</td>
</table>

</body>
</html>
