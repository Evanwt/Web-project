<html> 
<head>
	<title>Search Results for Customers</title>
	<style type="text/css">
	body 
	{ 
		padding-top:15px; 
		padding-left:40px; 
		padding-right:40px;
	}
	</style>
	

	<center><h1>Browse by Category for Customers</h1></center>
	<div style="width: 40%; margin: 0 auto;">
		<form action="homec_category.php" method="post"> 
			<p>Category:
				<select name="browse_type">
					<option value="coffee">coffee</option> 
					<option value="milk">milk</option> 
					<option value="tea">tea</option> 
				</select>
			</p>

			<input type="submit" name="submit" value="Browse Category"/>
		</form>
	</div> 	
        
        <center><a href="homec_search.php">Back</a></center>
	<center><a href="index.php">Home Page</a></center>	
</body>
</html>