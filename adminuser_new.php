<?php
$title = 'Admin - Add New User';
include 'header.php'; 

if(isset($_POST['lalitvar'])) {
		$name = $_POST['username'];
		$pass = $_POST['userpass'];
		$access = $_POST['accesslevel'];
		$link = mysql_connect("localhost", "root", "");
		$sql = "INSERT INTO login (username,password,access) VALUES ('$name','$pass','$access')";
		$result = mysql_db_query('scm',$sql);
}		

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
			<h2 class="header-label">Add New User</h2>
		</div>
		
		<form action="adminuser_new.php" method="POST">
			<input type="hidden" name="lalitvar">
			User Name:<input type="text" name="username"><br><br>
			Password:<input type="text" name="userpass"><br><br>
			Access Level:<select name="accesslevel">
				<option value="0" selected>No Access</option>
				<option value="1">Undefined</option>
				<option value="2">Undefined</option>
				<option value="3">Undefined</option>
				<option value="4">Undefined</option>
				<option value="5">Undefined</option>
				<option value="6">Undefined</option>
				<option value="7">Undefined</option>
				<option value="8">Undefined</option>
				<option value="9">Admin</option>
			</select><br><br>
			<input type="submit" name ="add" value="Add">
			<input type="reset" name="reset" value="Reset">
			<input type="button" onclick="history.back()" value="Back">
		</form>
	</td>
	</tr>
</table>



</body>
