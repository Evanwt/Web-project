<html>
<head>
	<title>View for Manager</title>
	<style type="text/css">
	body 
	{ 
		padding-top:15px; 
		padding-left:40px; 
		padding-right:40px;
	}
	</style>
</head>
<body>
	<center><h1>General Aggregated View for Salesman</h1></center>
        <center><h2>Top Products Sale for Salesman</h2></center>
	<div style="width: 40%; margin: 0 auto;">
		<center><form action="salesman_result.php" method="post">
			<p>Amount: 
				<select name="amount">
					<option value="10">Top 5</option> 
					<option value="">All</option> 
				</select>
			</p>

			<p>Order by: 
				<select name="order">
					<option value="sales">Sales</option> 
					<option value="sales_quantity">Quantity</option>
				</select>
			</p>
			<p><input type="submit" name="submit" value="View Result"/></p>
			
		</form></center>
	</div>
        
        <center><h2>Top Product Category for Salesman</h2></center>
	<div style="width: 40%; margin: 0 auto;">
		<center><form action="TopProductCategory.php" method="post">
			<p><input type="submit" name="submit" value="View Result"/></p>
		</form></center>
        </div>
        
        <center><h2>Region Sales</h2></center>
	<div style="width: 40%; margin: 0 auto;">
		<center><form action="regionSales.php" method="post">
			<p><input type="submit" name="submit" value="View Result"/></p>
		</form></center>
	</div>

	<center><h2>View Top 3 Buying Customers for Specific Product</h2></center>
	<div style="width: 40%; margin: 0 auto;">
		<form action="salesman_specific.php" method="post">
			<p>Category of Customer: 
				<select name="customerkind2">
					<option value="H">Home Customer</option> 
					<option value="B">Business Customer</option> 
				</select>
			</p>

			<p>Order by: 
				<select name="order2">
					<option value="sales">Sales</option> 
					<option value="quantity">Quantity</option>
				</select>
			</p>
			<p>Product ID: 
				<input name="searchterm" type=”"text" size="40"/> 
			</p>
			<p><input type="submit" name="submit" value="View Result"/></p>
		</form>
	</div>
        <center><h2>Best salesman </h2></center>
	<div style="width: 40%; margin: 0 auto;">
		<center><form action="bestSalesman.php" method="post">
			<p><input type="submit" name="submit" value="View Result"/></p>
		</form></center>
	</div>
        <center><a href="salesman_search.php">Back</a></center>
	<center><a href="index.php">Home Page</a></center>
</body>
</html>
