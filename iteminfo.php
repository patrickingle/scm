<?php 
$title = 'Item Information';
include 'header.php'; 
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
	<td width="35%"><br><br><br><br><br><br><br><img  border=0 src="images/item.jpg" usemap="#map397"></td>
	<td width="60%">
				<img src="images/iteminfo.jpg" width=600 hight=75>
				<form method="POST" action="iteminfo.php">
				<input type="hidden" name="hid_var2">
					 Enter Item ID:<input type="text" name="itemid"><br><br>
					 <input type="submit" value="Submit">
				</form>
	<?php
			if(isset($_POST['hid_var2']))
			{ 
				$itemid = $_POST['itemid'];
				$link = mysql_connect("localhost", "root", "");
				$result = mysql_db_query('scm', "SELECT * FROM item WHERE itemid='$itemid'",$link);

				$data = mysql_fetch_row($result);
				if(!$data){die("No Entry Found");}else{ 
				echo "INFORMATION ABOUT Item ID: "."<b>". $data[0] ."</b>";
				echo "<br><br>ITEM Name: " . $data[1];
				echo "<br>Category: " . $data[2];
				echo "<br>Purchasing Price: " . $data[3];
				echo "<br>Quantity: " . $data[4];
				echo "<br>Selling Price: " . $data[5];
				echo "<br>Description: " . $data[6];
				echo "<br>Date of Purchasing: " . $data[7];
				}
			}
	?>

	</td>
	</tr>
	
</td>
</table>
</body>
</html>
