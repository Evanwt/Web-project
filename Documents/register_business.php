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
require_once('include/functions.php');

//session_start();
    
    $cname = $_POST['name'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip_code = $_POST['zip_code'];
    $income = $_POST['income'];
    $c_key = $_POST['password'];
    
    
    
    $uid = 0;
    $uid = check_information_home_customer($cname,$c_key);
    
    if ($uid == -1){
        echo "<br /><center><h3>Please use valid name and password!<h3></center><br />";
        echo "<center><h3><a href=\"index.html\">Home Page</a></h3></center>";
        exit;       
        
    }
    else{
	
        $uid = register_business_customer($cname, $street, $city, $state, $zip_code,$income, $c_key);
        
        echo "<center><p><h1>Successfully registered! The new user id is: $uid. You can login now!</h1></p></center>";
        echo "<center><h3><a href=\"index.html\"> Home Page</a></h3></center>";
        

    }
    
    

?>
