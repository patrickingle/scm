<?php 
$title = 'Admin - User';
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
		<?php include 'sidebar.php'; ?>
	</td>
	<td width="55%">
		<a href="adminuser_new.php">
			<font color="#8B4513" face="Comic Sans MS, arial, Century Gothic" size=6>=> Add New User
			</font>
		</a><br><br>
		<a href="adminuser_edit.php">
			<font color="#8B4513" face="Comic Sans MS, arial, Century Gothic" size=6>=> Modify Existing User
			</font>
		</a><br><br>
		<a href="adminuser_del.php">
			<font color="#8B4513" face="Comic Sans MS, arial, Century Gothic" size=6>=> Delete Existing User
			</font>
		</a><br><br>
	</td>
	</tr>
</table>



</body>