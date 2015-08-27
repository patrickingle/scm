<?php
$title = 'Admin - Modify Existing User';
include 'header.php'; 

if (isset($_POST['lalitvar'])) {
	if (isset($_POST['update'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$access = $_POST['accesslevel'];
		$link = mysql_connect("localhost", "root", "");
		$result = mysql_db_query('scm',"update login set username='$username', password='$passwordd', access='$access' where username='$username'",$link);
		
	}
}

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
			<h2 class="header-label">Modify Existing User</h2>
		</div>
		<form action="adminuser_edit.php" method="POST">
		<input type="hidden" name="lalithid1">
			User:<?php echo $options; ?><br/><br/>
			<input type="submit" value="Submit">
			<input type="button" onclick="history.back()" value="Back">
		</form>
<?php
			if(isset($_POST['lalithid1']))
			{
				$username = $_POST['username'];
				$link = mysql_connect("localhost", "root", "");
				$result = mysql_db_query('scm', "SELECT * FROM login WHERE username='$username'",$link);
				
				$data = mysql_fetch_assoc($result);
				if(!$data){die("No Entry Found");}else{ 
				?>
		<form action="adminuser_new.php" method="POST">
			<input type="hidden" name="lalitvar">
			User Name:<input type="text" name="username" value="<?php echo $data['username']; ?>"><br><br>
			Password:<input type="text" name="userpass" value="<?php echo $data['password']; ?>"><br><br>
			Access Level:<select name="accesslevel">
				<option value="0">No Access</option>
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
			<input type="submit" name ="update" value="Update">
			<input type="reset" name="reset" value="Reset">
			<input type="button" onclick="history.back()" value="Back">
		</form>
		<?php
			}
		}
?>
	</td>
	</tr>
</table>



</body>
