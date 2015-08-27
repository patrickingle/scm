<?php 
$title = 'Report';
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

	<br>

<table>
	<tr>
	<td width="5%"></td>
	<td width="40%">
	<br><!--img  border=0 src="images/purchase.jpg" usemap="#map397"-->
		<?php include 'sidebar.php'; ?>		
	</td>
		<td width="55%"><font size=5><b>Report</b></font><br><br>
		<textarea name="report" rows="20" cols="80" value="Ur report will b displayed Here !!">
		
		<?php	
		echo "CUSTOMER

		";
	
				$link = mysql_connect("localhost", "root", "");
				$result = mysql_db_query('scm', "SELECT * FROM customer",$link);
				
				while($data = mysql_fetch_row($result)){
				echo "Customer ID : $data[0]
		Company Name : $data[1] 
		Address : $data[2] 
		City :$data[3]
		Postal Code :$data[4]
		Contact NO :$data[5]
		email ID :$data[6]
		Fax :$data[7]
		State :$data[8]

		"; }


		echo "







		";


			
		echo "ITEM

		";
				$link = mysql_connect("localhost", "root", "");
				$result = mysql_db_query('scm', "SELECT * FROM item",$link);
				while($data = mysql_fetch_row($result)){
				echo "Item ID : $data[0]
		Item Name : $data[1] 
		Category : $data[2] 
		Purchasing Date :$data[3]
		Quantity :$data[4]
		Selling Price :$data[5]
		Description :$data[6]
		Date :$data[7]

		"; }


		echo "







		";

		
		echo "SALES

		";
				$link = mysql_connect("localhost", "root", "");
				$result = mysql_db_query('scm', "SELECT * FROM sales",$link);
				
				while($data = mysql_fetch_row($result)){
				echo "Order ID : $data[0]
		Customer ID : $data[1] 
		Item ID : $data[2] 
		Category :$data[3]
		Item Name :$data[4]
		Quantity of Item :$data[5]
		Quantity :$data[6]
		Price/unit :$data[7]
		Order date :$data[8]
		Delivery date :$data[9]
		Returning date :$data[10]

		"; }

		echo "







		";


		echo "SUPPLIER

		";
				$link = mysql_connect("localhost", "root", "");
				$result = mysql_db_query('scm', "SELECT * FROM supplier",$link);
				
				while($data = mysql_fetch_row($result)){
				echo "Supplier ID : $data[0]
		Company Name : $data[1] 
		Address : $data[2] 
		City :$data[3]
		Postal Code :$data[4]
		Contact NO :$data[5]
		Fax :$data[6]
		email ID :$data[7]
		State :$data[8]

		"; }


		echo "







		";

		
		echo "PURCHASE

		";
				$link = mysql_connect("localhost", "root", "");
				$result = mysql_db_query('scm', "SELECT * FROM purchase",$link);
				
				while($data = mysql_fetch_row($result)){
				echo "purchase ID : $data[0]
		Supplier ID : $data[1] 
		Item ID : $data[2]
		Item Name :$data[3] 
		Category :$data[4]
		Quantity :$data[5]
		Price/unit :$data[6]
		Purchasing date :$data[7]
		recieving date :$data[8]
		Returning date :$data[9]

		"; }
		?>
		

		</textarea>
		</td>
	</tr>
</table>

</body>
</html>