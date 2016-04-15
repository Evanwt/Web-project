<?php
require_once('include/config.php');

function product_search($searchterm,$searchtype){
	// Create connection
   // Create connection
    $conn = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_DATABASE);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    if ($searchtype=="All") {
		$query = "select * from products where pname like '%".$searchterm."%'"; 
                
	} else {
		$query = "select * from products where p_kind = '".$searchtype."' and pname like '%".$searchterm."%'"; 
                
	}

	$result = $conn->query($query);
	$num_results = $result->num_rows;

	if ($num_results==0) {
		echo  "<p>Your search \"".$searchterm."\" did not match any products in ".$searchtype.".</p>";
		
	} else {

		echo "<p id='p1'>Number of products found:<b> ".$num_results."</b></p>";

		echo "<table align='center' class='tablesorter' border='0' cellpadding='0' cellspacing='1' >";
		echo "<thead>";
		echo "<tr>";
		echo "<th>Product_id #</th>";
		echo "<th>Name</th>";
        echo "<th>Inventory Amount</th>";
		echo "<th>Price</th>";
		echo "<th>Kind</th>";
		echo "</tr>"; 
		echo "</thead>"; 
		echo "<tbody>";
		for ($i=0; $i<$num_results; $i++) {
			$row = $result->fetch_assoc();
			echo '<tr>';
			echo '<td>',$row['product_id'],'</td>';
			echo '<td>',$row['pname'],'</td>';
			echo '<td>',$row['inventory_amount'],'</td>';
			echo '<td>',$row['price'],'</td>';
			echo '<td>',$row['p_kind'],'</td>';
			echo '</tr>';
		}	
		echo "</tbody>";
		echo "</table>";
	}

	$result->free(); 
	$conn->close();


}
function category($browse_type){
	 $conn = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_DATABASE);
    // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        } 

	$query = "select * from products where p_kind = '".$browse_type."'"; 
	$result = $conn->query($query);
	$num_results = $result->num_rows;
/*	echo "<center><h2>Product of ".$browse_type."</h2></center>";*/
	echo "<table align='center' class='tablesorter' border='0' cellpadding='0' cellspacing='1'>";
	echo "<thead>";
	echo "<tr>";
	echo "<th>Product #</th>";
	echo "<th>Name</th>";
	echo "<th>inventory_amount</th>";
	echo "<th>price</th>";
        echo "<th>p_kind</th>";
	echo "</tr>"; 
	echo "</thead>"; 
	echo "<tbody>";
	for ($i=0; $i<$num_results; $i++) {
			$row = $result->fetch_assoc();
			echo '<tr>';
			echo '<td>',$row['product_id'],'</td>';
			echo '<td>',$row['pname'],'</td>';
			echo '<td>',$row['inventory_amount'],'</td>';
			echo '<td>',$row['price'],'</td>';
			echo '<td>',$row['p_kind'],'</td>';
			echo '</tr>';
		}
	echo "</tbody>";
	echo "</table>";

	$result->free(); 
	$conn->close();
}

function orders($customer_id){
	 $conn = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_DATABASE);
    // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        } 

	$query = "select * from transactions where customer_id = '".$customer_id."'"; 
	$result = $conn->query($query);
	$num_results = $result->num_rows;
	echo "<center><h3>Customer ID: ".$customer_id."</h3></center>";
	echo "<table align='center' class='tablesorter' border='0' cellpadding='0' cellspacing='1'>";
	echo "<thead>";
	echo "<tr>";
	echo "<th>Order Number</th>";
	echo "<th>Date</th>";
	echo "<th>Salesman ID</th>";
	echo "<th>Product ID</th>";
        echo "<th>Quantity</th>";
	echo "</tr>"; 
	echo "</thead>"; 
	echo "<tbody>";
	for ($i=0; $i<$num_results; $i++) {
			$row = $result->fetch_assoc();
			echo '<tr>';
			echo '<td>',$row['order_num'],'</td>';
			echo '<td>',$row['t_date'],'</td>';
			echo '<td>',$row['s_id'],'</td>';
			echo '<td>',$row['product_id'],'</td>';
			echo '<td>',$row['quantity'],'</td>';
			echo '</tr>';
		}
	echo "</tbody>";
	echo "</table>";

	$result->free(); 
	$conn->close();
}
?>
