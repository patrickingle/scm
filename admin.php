<?php 
$title = 'Admin';
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

	<br><br><br><br><br><br>
<table>
<td width=300 height=300 colspan=1 rowspan=3 valign=top align=left>
	<tr>
	<td width="5%"></td><br> 
	<td width="40%">
		<div id='menu5'>
		  <ul>
		    <li><a href='customer.php' title='Customer'>Customer</a></li>
		    <li><a href='item.php' title='Item'>Item</a></li>
		    <li><a href='sales.php' title='Sales'>Sales</a></li>
		    <li><a href='supplier.php' title='Supplier'>Supplier</a></li>
		    <li><a href='purchase.php' title='Purchase'>Purchase</a></li>
		    <li><a href='report.php' title='Report'>Report</a></li>
		    <li><a href='admin.php' title='Admin'>Admin</a></li>
		    <li><a href='end.php' title='End'>End</a></li>
		  </ul>
		</div>			
	</td>
	<td width="55%">
		<a href="adminuser.php">
			<font color="#8B4513" face="Comic Sans MS, arial, Century Gothic" size=6>=> Add/Modify/Delete User
			</font>
		</a><br><br>
		<a href="admincat.php"><font color="#8B4513" face="Comic Sans MS, arial, Century Gothic" size=6>=> Add/Modify/Delete Category</font></a><br><br>
	</td>
	</tr>
</table>



</body>