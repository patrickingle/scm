<?php 
$title = 'New Customer Entry';
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
	<td width="5%"></td> <br> <br><br>
	<td width="35%"> <img  border=0 src="images/cust1.jpg" usemap="#map397"></td>
	<td width="60%">  <br><br><br><br><br><br>    
				<img src="images/newcust.jpg" width=600 hight=75>

				<form action="newcust.php" method="POST">
				<input type="hidden" name="lalitvar">
					Customer ID:<input type="text" name="custid"><br><br>
					Company Name:<input type="text" name="compname"><br><br>
					Address:<br><textarea name="address" rows=5 cols=30 ></textarea>
					City:<input type="text" name="city"><br><br>
					State:<input type="text" name="state"><br><br>						
					Postal Code:<input type="text" name="postal"><br><br>
					Contact No:<input type="text" name="contact"><br><br>
					Fax:<input type="text" name="fax"><br><br>
					email ID:<input type="text" name="email"><br><br><br><br>
					<input type="submit" name ="add" value="add">
					<input type="reset" name="reset" value="Reset">
				</form></td>
	</tr>
		<tr>
<?php

	if(isset($_POST['lalitvar'])) {
		$cid = $_POST['custid'];
		$cname = $_POST['compname'];
		$ad = $_POST['address'];
		$ct = $_POST['city'];
		$stat = $_POST['state'];
		$postal = $_POST['postal'];
		$cont = $_POST['contact'];
		$fx = $_POST['fax'];
		$emel = $_POST['email'];
			$link = mysql_connect("localhost", "root", "");
			$result = mysql_db_query('scm',"INSERT INTO customer VALUES('$cid','$cname','$ad','$ct','$postal','$cont','$emel','$fx','$stat')");
	}		




			
?>
		</tr>
	
</td>
</table>
</body>
</html>
