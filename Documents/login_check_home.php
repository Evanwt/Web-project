<html>
    <head>
        	<style type="text/css">
	body 
	{ 
		padding-top:200px; 
		padding-left:40px; 
		padding-right:40px;
	}
	</style>
    </head>
</html>

<?php

require('include/functions.php');
    $customer_id=$_POST['id'];
    $c_key=$_POST['password'];



$uid = -1;
$uid = check_login_home($customer_id, $c_key);

if ($uid == 1){
    echo "<center><h1>login successfully!</h1></center>";
    echo "<center><a href=\"index.html\"><b>Store Home Page</b></a></center>";
}else {
    echo "<center><h1> ID and password do not match. Please try again.</h1></center>";
    echo "<center><a href=\"homecustomerLogin.php\">Home Customer Login Page</a></center>";
}


?>

