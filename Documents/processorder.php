<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script type="text/javascript" src="js/jquery-latest.js"></script> 
    <script type="text/javascript" src="js/jquery.tablesorter.js"></script> 
    <script type="text/javascript" src="js/docs.js"></script>
    <link rel="stylesheet" href="js/themes/blue/style.css" type="text/css" media="print, projection, screen">
   
    <script type="text/javascript">
    $(function() 
    {
        $("table").tablesorter();
    }
    );
    </script>

    <title>Drinking Store Order Result</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        
       
        padding-left:40px; 
        padding-right:40px;
    }
    #prompt{
    	color:red;
    	font-size:30px;
    	margin-top:80px;

    }

  td{ 
  	 border:2px solid black;
  	 border-collapse:collapse;
  	 font-size:25px;
  	 padding-left:10px;
  	 padding-right:10px;
  
  	 }
  	th{
  		text-align:center;
  	}
  	table{
  		margin-top:30px;

  	}
  	p1{
  		color:blue;
  		font-size:20px;
  	}

    p2{
      margin-top:60px;
      color:red;
    }


    </style>

   
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Drinking Store</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.html">Home Page</a>
                    </li>
                    
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Drinking Store Order Result</h2>
      

      <?php

// Purchase error check:
// 1. have done;
// (1) if wrong productID, or not enough products, NO update, exit
// (2) can deal with null order table.
// (3) give warning if inventory is low!(in functions.php)
// (4) check the customerID  before update products. 
//     if not exist, NO update, exit.
// (5) check salesmanID before update products. 
//     if not exist, NO update, exit.
   
  date_default_timezone_set('america/new_york');
  require_once('include/functions.php');
  
  $s_id =$_POST['s_id'];
  $product_id = $_POST['product_id'];
  $quantity =  $_POST['quantity'];
  $customer_id =$_POST['customer_id'];
 
 
  $searchResultC = searchCustomerID($customer_id);
  if($searchResultC == NULL) {
       echo'<br /><h3>Customer NOT exist. Stop and exit!</h3>';
       echo "<center><a href=\"index.html\"><button>Home Page</button></a></center>";
       exit;
  }

 
   $searchResultS = searchSalesmanID($s_id);
  
  if($searchResultS == NULL) {
       echo'<br /><h3>Salesman NOT exist. Stop and exit!</h3>';
       echo "<center><a href=\"index.html\"><button>Home Page</button></a></center>" ;
       exit;
  }
 


  echo '<p2>Your transaction information is as follows: </p2>';
  echo "<table align='center' class='tablesorter' border='0' cellpadding='0' cellspacing='1' >";
  echo "<thead>";
    echo "<tr>";
    echo "<th>Date</th>";
    echo "<th>Customer_id #</th>";
    echo "<th>Product_id #</th>";
    echo "<th>Salesman_id #</th>";
    echo "<th>Quantity</th>";
     echo "</tr>";
     echo "</thead>";
     echo "<tbody>";
     echo "<tr>";
     echo '<td>',date('jS F'),'</td>';
     echo '<td>'.$customer_id.'</td>';
     echo '<td>'.$product_id.'</td>';
     echo '<td>'.$s_id.'</td>';
     echo '<td>'.$quantity.'</td>';
     echo '</tr>';
     echo '</tbody>';
     echo '</table>';


   
  list($pname, $price) = updateProduct($product_id, $quantity);
  if ($pname == NULL){
       echo'<br /><h3>Purchase failed!. Stop and exit!</h3>';
       echo "<center><a href=\"index.html\"><button>Home Page</button></a></center>";
       exit;
  }
  else{

  }
         
  
  $totalPrice = doubleval($price)*intval($quantity);
  echo "<br /><h3>Total price for customer \" $customer_id \" is <b>\$$totalPrice</b>!</h3><br/> ";
  
  $orderID = insertOrder($customer_id, $s_id,$product_id, $quantity);
    if ($orderID == NULL){
       echo'<br /><h3>Purchase failed in insertOrder step. Stop and exit!</h3>';
       echo "<center><a href=\"index.html\"><button>Home Page</button></a></center>";
       exit;
  }
  
 
  echo "<br /><h3>The new order (orderID: $orderID) is processed successfully!</h3><br/> ";

?>

    
           </div>
        </div>
        <!-- /.row -->

    </div>

     <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Tong Wei, Wei Cai, Qiao Zhao</p>
                </div>
            </div>
        </footer>

    </div>
 
    <script src="js/jquery.js"></script>

  
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
