<html> 
<head>
    
	<title>Search Results for Salesman</title>
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
	<center><h1>Search Products for Salesman</h1></center>
	<div style="width: 40%; margin: 0 auto;">
		<form action="salesman_product_search.php" method="post">
			<p>Category of Product:
				<select name="searchtype">
					<option value="All">All</option> 
					<option value="coffee">coffee</option> 
					<option value="milk">milk</option> 
					<option value="tea">tea</option> 
				</select>
			</p>
			<p>Product Name:
				<input name="searchterm" type=”"text" size="40"/>
			</p>
			<input type="submit" name="submit" value="Search Product"/>
		</form> 
        <center><a href="salesman_category_browse.php">Browse Specific Category Products</a></center>  
        </div>	
        
        <center><h1>Browse Your Orders</h1></center>
	<div style="width: 40%; margin: 0 auto;">
		<form action="salesman_order.php" method="post">
			<p>Salesman ID: <input name="s_id" type=”"text" size="40"/>
			</p>
			<input type="submit" name="submit" value="Search Order"/>
		</form> 
	</div>
</body>
</html>
        <center><a href="aggregated_view.php">Aggregated View</a></center><br>
        
        <center><a href="index.php">Home Page</a></center>
        
        
</body>
</html>
