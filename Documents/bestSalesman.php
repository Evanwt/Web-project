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

    <title>View Result For Salesman</title>

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
                        <a href="salesmanindex.html">Home Page</a>
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
               
         <h2>Salesman with their number of order</h2>

   <?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

        
  $servername = "localhost";
        $username = "root";
        $password = "123456";
        $dbname = "DB_Project";

// Create connection
$db = new mysqli($servername, $username, $password, $dbname);


    if (mysqli_connect_errno()) {
    echo "Error: Could not connect to database.  Please try again later.";
    exit;
  }

            $query="select sname, count(*)
                    from salespersons natural join transactions
                    group by s_id
                    order by count(*) DESC;";
                    
           
  $result = $db->query($query);
  $num_results = $result->num_rows;

  echo "<table align='center' class='tablesorter' border='0' cellpadding='0' cellspacing='1'>";
  echo "<thead>";
  echo "<tr>";
  echo "<th>Salesman Name </th>";
  echo "<th>Order Number</th>";
  echo "</tr>"; 
  echo "</thead>"; 
  echo "<tbody>";
  for ($i=0; $i<$num_results; $i++) {
    $row = $result->fetch_assoc();
    echo '<tr>';
    echo '<td>',$row['sname'],'</td>';
    echo '<td>',$row['count(*)'],'</td>';
    echo '</tr>';
  } 
  echo "</tbody>";
  echo "</table>";
  $result->free(); 
  $db->close();
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
