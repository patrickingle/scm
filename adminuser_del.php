<?php
$title = 'Admin - Delete Existing User';
include 'header.php'; 

$link = mysql_connect("localhost", "root", "");
$result = mysql_db_query('scm', "SELECT username FROM login",$link);
$options = '<select name="username" id="username"><option value="0">Select</option>';
while ($data = mysql_fetch_assoc($result)) {
	$options .= '<option value="'.$data['username'].'">'.$data['username'].'</option>';
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

	<br><br><br><br><br><br>
<table>
<td width=300 height=300 colspan=1 rowspan=3 valign=top align=left>
	<tr>
	<td width="5%"></td><br> 
	<td width="40%">
		<?php include 'sidebar.php'; ?>
	</td>
	<td width="55%">
		<div class="header-image">
			<!--img src="images/plane.jpg" width=600 hight=75-->
			<h2 class="header-label">Delete Existing User</h2>
		</div>
		<form action="adminuser_del.php" method="POST">
		<input type="hidden" name="lalithid1">
			User:<?php echo $options; ?><br/><br/>
			<input type="submit" value="Submit">
			<input type="button" onclick="history.back()" value="Back">
		</form>
	</td>
	</tr>
</table>



</body>
