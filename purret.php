<?php 
$title = 'Purchase Return Entry';
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
	<td width="35%"><br> <br> <br><br><br> <br>  <br> <img  border=0 src="images/purchase.jpg" usemap="#map397"></td>
	<td width="60%"><br><br><br><br><br> 
				<img src="images/puretent.jpg" width=600 hight=75>
				<form action="purret.php" method="POST">
				 
					Enter Purchase Id:<input type="text" name="purid"><br><br> 
<?php
			if(isset($_POST['button']))
			{
			$retdate = $_POST['retdate'];
			$purid= $_POST['purid'];
 			$link = mysql_connect("localhost", "root", "");
			$result = mysql_db_query('scm',"update purchase set returningdate='$retdate' where purchaseid='$purid'",$link);
			} 

					
					echo "Returning Date(In YYYY-MM-DD Format) :<input type='text' name='retdate'><br><br>";

				 echo "<input type='submit' name='button' value='Update'>";
?>

				</form></td>
	</tr>
	
</td>
</table>
</body>
</html>




