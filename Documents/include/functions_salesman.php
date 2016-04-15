<?php
require_once('include/config.php');

// added by Jiawei, for salsman login check
function check_login_salesman($s_id, $s_key){
      

     if (!get_magic_quotes_gpc()) {
        $s_id = addslashes($s_id);
        $s_key = addslashes($s_key);
      }
      
      
// Create connection
$conn = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_DATABASE);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM salespersons WHERE  s_id = '".$s_id."' AND s_key = '".$s_key."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    return 1;
} else {
    return -1;
}
$conn->close();
}
function orders($s_id){
	 $conn = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_DATABASE);
    // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        } 

	$query = "select * from transactions where s_id = '".$s_id."'"; 
	$result = $conn->query($query);
	$num_results = $result->num_rows;
	if($num_results>0){echo "<center><h2>Salesman: ".$s_id."</h2></center>";
	echo "<table align='center' class='tablesorter' border='0' cellpadding='0' cellspacing='1'>";
	echo "<thead>";
	echo "<tr>";
	echo "<th>Order Number</th>";
	echo "<th>Date</th>";
	echo "<th>Product ID</th>";
        echo "<th>Quantity</th>";
        echo "<th>Customer ID</th>";
	echo "</tr>"; 
	echo "</thead>"; 
	echo "<tbody>";
	for ($i=0; $i<$num_results; $i++) {
			$row = $result->fetch_assoc();
			echo '<tr>';
			echo '<td>',$row['order_num'],'</td>';
			echo '<td>',$row['t_date'],'</td>';
			echo '<td>',$row['product_id'],'</td>';
			echo '<td>',$row['quantity'],'</td>';
                        echo '<td>',$row['customer_id'],'</td>';
			echo '</tr>';
		}
	echo "</tbody>";
        echo "</table>";}
        else{
            echo 'please input the correct salesman ID!';
        }

	$result->free(); 
	$conn->close();
}

function Hproduct($amount,$order){
	$db = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_DATABASE);

	if (mysqli_connect_errno()) {
		echo "Error: Could not connect to database.  Please try again later.";
		exit;
	}

        if($amount==""){
        $query="select pname, sum(quantity) as sales_quantity,  
                sum(quantity)*price as sales
                from products natural join transactions
                group by product_id
                order by ".$order." DESC";}
        else{
            $query="select pname, sum(quantity) as sales_quantity,  
                sum(quantity)*price as sales
                from products natural join transactions
                group by product_id
                order by ".$order." DESC
                limit 0,5";
        }
	$result = $db->query($query);
	$num_results = $result->num_rows;

	echo "<table align='center' class='tablesorter' border='0' cellpadding='0' cellspacing='1'>";
	echo "<thead>";
	echo "<tr>";
	echo "<th>Product Name #</th>";
	echo "<th>Quantity</th>";
	echo "<th>Sales</th>";
	echo "</tr>"; 
	echo "</thead>"; 
	echo "<tbody>";
	for ($i=0; $i<$num_results; $i++) {
		$row = $result->fetch_assoc();
		echo '<tr>';
		echo '<td>',$row['pname'],'</td>';
		echo '<td>',$row['sales_quantity'],'</td>';
		echo '<td>',$row['sales'],'</td>';
		echo '</tr>';
	}	
	echo "</tbody>";
	echo "</table>";
	$result->free(); 
	$db->close();
}
function Hspeproduct($searchterm,$order){
	$db = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_DATABASE);

	if (mysqli_connect_errno()) {
		echo "Error: Could not connect to database.  Please try again later.";
		exit;
	}
	$query0 = "SELECT products.product_id from products where products.product_id = '".$searchterm."'";
	$result0 = $db->query($query0);
	$num_results0 = $result0->num_rows;

	if($num_results0==0){
		echo "Cannot find matching product. Please check your input of product id";
		exit;
	}

	$query = "select customer.customer_id as customerID,customer.cname as customerName,

                  sum(quantity) as quantity,
                  sum(quantity*price) as sales
                  from transactions,products,customer
                  where transactions.product_id = (SELECT products.product_id from products  where products.product_id = '".$searchterm."')
                  and customer.customer_id = transactions.customer_id 
                  and customer.c_kind = 'home'
                  group by customer.customer_id
                  order by ".$order." DESC
                  limit 0,3";


	$result = $db->query($query);
	$num_results = $result->num_rows;

	if($num_results==0){
		echo "No result matching your options.";
		exit;
	}

	echo "<table align='center' class='tablesorter' border='0' cellpadding='0' cellspacing='1'>";
	echo "<thead>";
	echo "<tr>";
	echo "<th>Customer ID</th>";
	echo "<th>Customer Name</th>";
	echo "<th>Quantity</th>";
        echo "<th>Sales</th>";
	echo "</tr>"; 
	echo "</thead>"; 
	echo "<tbody>";
	for ($i=0; $i<$num_results; $i++) {
		$row = $result->fetch_assoc();
		echo '<tr>';
		echo '<td>',$row['customerID'],'</td>';
		echo '<td>',$row['customerName'],'</td>';
		echo '<td>',$row['quantity'],'</td>';
		echo '<td>',$row['sales'],'</td>';
		echo '</tr>';
	}	
	echo "</tbody>";
	echo "</table>";
	$result->free(); 
	$db->close();

}


function Bspeproduct($searchterm,$order){
	$db = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_DATABASE);

	if (mysqli_connect_errno()) {
		echo "Error: Could not connect to database.  Please try again later.";
		exit;
	}
	$query0 = "SELECT products.product_id from products where products.product_id = '".$searchterm."'";
	$result0 = $db->query($query0);
	$num_results0 = $result0->num_rows;

	if($num_results0==0){
		echo "Cannot find matching product. Please check your input of product id";
		exit;
	}

	$query = "select customer.customer_id as customerID,customer.cname as customerName,

                  sum(quantity) as quantity,
                  sum(quantity*price) as sales
                  from transactions,products,customer
                  where transactions.product_id = (SELECT products.product_id from products  where products.product_id = '".$searchterm."')
                  and customer.customer_id = transactions.customer_id 
                  and customer.c_kind = 'business'
                  group by customer.customer_id
                  order by ".$order." DESC
                  limit 0,3";


	$result = $db->query($query);
	$num_results = $result->num_rows;

	if($num_results==0){
		echo "No result matching your options.";
		exit;
	}

	echo "<table align='center' class='tablesorter' border='0' cellpadding='0' cellspacing='1'>";
	echo "<thead>";
	echo "<tr>";
	echo "<th>Customer ID</th>";
	echo "<th>Customer Name</th>";
	echo "<th>Quantity</th>";
        echo "<th>Sales</th>";
	echo "</tr>"; 
	echo "</thead>"; 
	echo "<tbody>";
	for ($i=0; $i<$num_results; $i++) {
		$row = $result->fetch_assoc();
		echo '<tr>';
		echo '<td>',$row['customerID'],'</td>';
		echo '<td>',$row['customerName'],'</td>';
		echo '<td>',$row['quantity'],'</td>';
		echo '<td>',$row['sales'],'</td>';
		echo '</tr>';
	}	
	echo "</tbody>";
	echo "</table>";
	$result->free(); 
	$db->close();
}
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
		echo "Your search \"".$searchterm."\" did not match any products in ".$searchtype.".";
		
	} else {

		echo "<p>Number of products found: ".$num_results."</p>";

		echo "<table align='center' class='tablesorter' border='0' cellpadding='0' cellspacing='1'>";
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
	echo "<center><h2>Product of ".$browse_type."</h2></center>";
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