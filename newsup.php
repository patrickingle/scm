<?php 
$title = 'New Supplier';
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
	<td width="35%">  <!--img  border=0 src="images/sup.jpg" usemap="#map397"--><?php include 'sidebar.php'; ?></td>
	<td width="60%"><br><br><br><br><br>   
				<img src="images/newsup.jpg" width=600 hight=75><br>
		
				<form action="newsup.php" method="POST">
				<input type="hidden" name="lalitvar">
					Company Name :<input type="text" name="cname"><br><br>
					Address :<br><textarea name="address" rows=5 cols=30 ></textarea><br><br>
					City :<input type="text" name="city"><br><br>
					Postal Code :<input type="text" name="pc"><br><br>
					State :<input type="text" name="state"><br><br>
					Contact no. :<input type="text" name="cn"><br><br>
					Fax :<input type="text" name="fax"><br><br>
					email ID :<input type="text" name="emailid"><br><br>
					<input type="submit" name ="add" value="add">
					<input type="reset" name="reset" value="Reset">
				</form>
<?php
			if(isset($_POST['lalitvar']))
			{
				$cname = mysql_escape_string($_POST['cname']);
				$address = mysql_escape_string($_POST['address']);
				$city = mysql_escape_string($_POST['city']);
				$postalcode = mysql_escape_string($_POST['pc']);
				$contact = mysql_escape_string($_POST['cn']);
				$fax = mysql_escape_string($_POST['fax']);
				$emailid = mysql_escape_string($_POST['emailid']);
				$state = mysql_escape_string($_POST['state']); 

				$link = mysql_connect("localhost", "root", "");
				$sql = "INSERT INTO supplier (companyname,address,city,postalcode,contactno,fax,emailid,state) VALUES('$cname','$address','$city','$postalcode','$contact','$fax','$emailid','$state')";
				echo $sql.'<br>';
				$result = mysql_db_query('scm',$sql,$link);
			 
			}		
?>

	</td>
	</tr>
	
</td>
</table>

</body>
</html>
