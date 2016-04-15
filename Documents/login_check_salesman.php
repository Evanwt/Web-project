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

require('include/functions_salesman.php');
    $s_id=$_POST['id'];
    $s_key=$_POST['password'];




$uid = -1;
$uid = check_login_salesman($s_id, $s_key);


if ($uid == 1){
    echo "<center><h1>login successfully!</h1></center>";
    echo "<center><a href=\"salesmanindex.html\">Salesman HomePage</a></center>";
}else {
    echo "<center><h1> ID and password do not match. Please try again.</h1></center>";
    echo "<center><a href=\"salesmanLogin.php\">Salesman Login Page</a></center>";
    echo $uid;
}


?>
