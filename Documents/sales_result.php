<html> 
<head>
	<title>View Result for Salesman</title> 
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
	<?php
	require_once('include/functions_manager.php');
	$customerkind=$_POST['customerkind']; 
	$amount=$_POST['amount'];
	$order=$_POST['order'];
	$aggregation=$_POST['aggregation'];

	if (!get_magic_quotes_gpc()){ 
		$customerkind = addslashes($customerkind); 
		$amount = addslashes($amount);
		$order = addslashes($order);
		$aggregation = addslashes($aggregation);
	}


	if (!$aggregation) {
		echo 'You have not choose option for aggregation. Please go back and try again.'; 
		exit;
	}
		
	?>
</body>
</html>