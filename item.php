<?php 
$title = 'Items';
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

	
	<br><br><br><br><br><br>
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
	<td width="40%"><br><img  border=0 src="images/item.jpg" usemap="#map397"></td>
	<td width="55%"><a href="newitem.php"><font color="#8B4513" face="Comic Sans MS, arial, Century Gothic" size=6>=> Add New Item</font></a><br><br>
			<a href="iteminfo.php"><font color="#8B4513" face="Comic Sans MS, arial, Century Gothic" size=6>=> Get Item Information</font></a><br><br>
			<a href="itemup.php"><font color="#8B4513" face="Comic Sans MS, arial, Century Gothic" size=6>=> Update Item Entry</font></a><br><br>
			<a href="delitem.php"><font color="#8B4513" face="Comic Sans MS, arial, Century Gothic" size=6>=> Delete Item</font></a><br><br></td></font>
	</td>

</table>



</body>

<?php include 'footer.php'; ?>