<?php
require_once('include/config.php');

//check home customer login
function check_login_home($customer_id, $c_key){
      

     if (!get_magic_quotes_gpc()) {
        $customer_id = addslashes($customer_id);
        $c_key = addslashes($c_key);
        
      }
      
      
// Create connection
$conn = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_DATABASE);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM customer WHERE  customer_id = '".$customer_id."' AND c_key = '".$c_key."' AND c_kind = 'home'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    return 1;
} else {
    return -1;
}
$conn->close();
}

//check business customer login
function check_login_business($customer_id, $c_key){
      

     if (!get_magic_quotes_gpc()) {
        $customer_id = addslashes($customer_id);
        $c_key = addslashes($c_key);
       
      }
      
      
// Create connection
$conn = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_DATABASE);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM customer WHERE  customer_id = '".$customer_id."' AND c_key = '".$c_key."' AND c_kind = 'business'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    return 1;
} else {
    return -1;
}
$conn->close();
}


//check register information
function check_information_home_customer($cname, $c_key){
    if ($cname == NULL || $c_key == NULL){
        echo "<center><p>Name and password can not be NULL, try again.</p></center>"; 
        return -1;
     }    
     else{
         return 0;
     }
    
} 


// insert new home customer.
function register_home_customer($cname, $street, $city, $state, $zip_code, $marriage_status, $gender,
                $age, $income, $c_key){
      
    
     if (!get_magic_quotes_gpc()) {
        $cname = addslashes($cname);
        $street = addslashes($street);
        $city = addslashes($city);
        $state = addslashes($state);
        $zip_code = addslashes($zip_code);
        $marriage_status = addslashes($marriage_status);
        $gender = addslashes($gender);
        $age = intval($zip_code);
        $income = intval($income);
        $c_key = addslashes($c_key);
      }

    $conn = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_DATABASE);

     if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
     
     $query0 = "select max(customer_id) from customer";
     $result0 = $conn->query($query0);
     
     $row0 = $result0->fetch_assoc();
     $c_id = $row0['max(customer_id)'] + 1;
$query1 = "select max(address_id) from address";
     $result1 = $conn->query($query1);
     
     $row1 = $result1->fetch_assoc();
     $id = $row1['max(address_id)'] + 1;
    
//insert into address
$sql1 = "INSERT INTO  address(address_id, street, city, state, zip_code)
VALUES ('".$id."','".$street."', '".$city."','".$state."','".$zip_code."')";

if ($conn->query($sql1) === TRUE) {
  
    //insert into customer
    $sql2 = "INSERT INTO customer(customer_id,cname, address_id, c_kind, c_key ) values
            ('".$c_id."','".$cname."', '".$id."', 'home', '".$c_key."')";
    if($conn->query($sql2) === TRUE){
       $sql3 = "INSERT INTO home(customer_id,marriage_status,gender,age,income) values 
               ('".$c_id."','".$marriage_status."','".$gender."','".$age."','".$income."')";
       if($conn->query($sql3) === TRUE){
           return ($c_id);
       }
       else{
           echo "Error: " . $sql3 . "<br>" . $conn->error;
       }
    
    }
    else{
        echo "Error: " . $sql2 . "<br>" . $conn->error;
    }
} else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}             
$conn->close();
}

// insert new business customer.
function register_business_customer($cname, $street, $city, $state, $zip_code, $com_annual_income, $c_key){
      
    
     if (!get_magic_quotes_gpc()) {
        $cname = addslashes($cname);
        $street = addslashes($street);
        $city = addslashes($city);
        $state = addslashes($state);
        $zip_code = addslashes($zip_code);
        $com_annual_income = intval($com_annual_income);
        $c_key = addslashes($c_key);
      }

    $conn = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_DATABASE);

     if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
     
     $query0 = "select max(customer_id) from customer";
     $result0 = $conn->query($query0);
     
     $row0 = $result0->fetch_assoc();
     $c_id = $row0['max(customer_id)'] + 1;
$query1 = "select max(address_id) from address";
     $result1 = $conn->query($query1);
     
     $row1 = $result1->fetch_assoc();
     $id = $row1['max(address_id)'] + 1;
    
//insert into address
$sql1 = "INSERT INTO  address(address_id, street, city, state, zip_code)
VALUES ('".$id."','".$street."', '".$city."','".$state."','".$zip_code."')";

if ($conn->query($sql1) === TRUE) {
  
    //insert into customer
    $sql2 = "INSERT INTO customer(customer_id,cname, address_id, c_kind, c_key ) values
            ('".$c_id."','".$cname."', '".$id."', 'business', '".$c_key."')";
    if($conn->query($sql2) === TRUE){
      
       $sql3 = "INSERT INTO business(customer_id,com_annual_income) values 
               ('".$c_id."','".$com_annual_income."')";
       if($conn->query($sql3) === TRUE){
           
           return ($c_id);
       }
       else{
           echo "Error: " . $sql3 . "<br>" . $conn->error;
       }
    
    }
    else{
        echo "Error: " . $sql2 . "<br>" . $conn->error;
    }
} else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}             
$conn->close();
}
// error check:
// if does not exist, return -1;
function searchCustomerID($customer_id){
      

    if (!get_magic_quotes_gpc()) {
        $customer_id = addslashes($customer_id);
      }

// Create connection
$conn = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_DATABASE);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM customer WHERE  customer_id = '".$customer_id."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    return $customer_id;
    echo "yes";
} else {
    
    return NULL;
}
$conn->close();
}

// error check:
// if does not exist, return -1;
function searchSalesmanID($s_id){
    if (!get_magic_quotes_gpc()) {
        $s_id = addslashes($s_id);
      }

// Create connection
$conn = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_DATABASE);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM salespersons WHERE  s_id = '".$s_id."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    return $s_id;
} else {
    echo "An error has occurred.  The salesman was not found.";
    return NULL;
}
$conn->close();   
}      

// error check: wrong productID, not enough products
function updateProduct($product_id, $quantity){
    if (!get_magic_quotes_gpc()) {
        $product_id = addslashes($product_id);
        $quantity = intval($quantity);
      }
      // Create connection
    $conn = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_DATABASE);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
   $query0 = "select pname, inventory_amount, price from products
         where product_id = '".$product_id."'";
    $result0 = $conn->query($query0);
     
     if ($result0){
        $row = $result0->fetch_assoc(); 
        //var_dump($row);
    
        $newInventory = intval($row['inventory_amount']- $quantity);
        $pname = $row['pname'];
        
        
        $price = $row['price'];
        $price = doubleval($price);
        if($quantity==0){
            echo "Please input correct number of products!";
            return -1;
        }
        
    
        if($newInventory<0){
          echo "<br/><br/><br/><br/><h4>There are no enough such product!</h4>";
          return -1;   
        }
        

        $query = "update products set inventory_amount = '".$newInventory."' 
            where product_id = '".$product_id."'";
        $result = $conn->query($query);
        
        if ($result) {
            echo  " <br/> $quantity of $pname were subtracted from 
                the product table of the database.<br/>";
        } else {
  	  echo "An error has occurred.  The item was not added.";
        }
        
        
      
     } else {echo "An error has occurred.  The item was not found.";
             return -1;
            }
     
     //var_dump($row);
     $anArray[0] = $pname;
     $anArray[1] = $price;
    
     return $anArray;
     $conn->close();
    
    
}
// Err check: can insert into a NULL table!
function insertOrder($customer_id, $s_id,$product_id, $quantity){
      
    
     if (!get_magic_quotes_gpc()) {
        $customer_id = addslashes($customer_id);
        $s_id = addslashes($s_id);
        $product_id = addslashes($product_id);
        $quantity = intval($quantity);
      }

    // Create connection
    $conn = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_DATABASE);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
     
      $query0 = "select max(order_num) from transactions";
     $result0 = $conn->query($query0);
     
     $row = $result0->fetch_assoc();
     //var_dump($row);
     $newOrderID = $row['max(order_num)']+1;
     date_default_timezone_set('america/new_york');
     $submitDate  = date('Y-m-d');  
    
    
     $query = "insert into transactions(order_num, t_date, s_id. product_id, quantity, customer_id) values
            ('".$newOrderID."', '".$submitDate."', '".$s_id."','".$product_id."', '".$quantity."','".$customer_id."')";
     $sql3 = "INSERT INTO transactions(order_num,t_date,s_id,product_id,quantity,customer_id) values 
               ('".$newOrderID."','".$submitDate."','".$s_id."','".$product_id."','".$quantity."','".$customer_id."')";
     $result = $conn->query($sql3);
     
     
     if ($result) {
      return($newOrderID);
     } else {
      echo "An error has occurred.  The item was not added.";
      return NULL;
     }
     $conn->close();    
}