<!DOCTYPE html>
<html lang="en">
<?php

?>

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home Customer Signup</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

   <style>
    #divCheckPasswordMatch{

       font-weight:bold;
       color:red;
    }


   </style>





    </head>

    <body>

		<!-- Top menu -->
		<nav class="navbar navbar-inverse navbar-no-bg" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.html">Homecustomer Signup</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="top-navbar-1">
					<ul class="nav navbar-nav navbar-right">
						<li>
							
							<span class="li-social">
								<a href="#"><i class="fa fa-facebook"></i></a> 
								<a href="#"><i class="fa fa-twitter"></i></a> 
								<a href="#"><i class="fa fa-envelope"></i></a> 
								<a href="#"><i class="fa fa-skype"></i></a>
							</span>
						</li>
					</ul>
				</div>
			</div>
		</nav>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-7 text">
                            <h1 style="color:black;font-size:50px;"><strong>Drinking Store</strong> Registration<br/><br/>For Home</h1>
                    
                            
                        </div>
                        <div class="col-sm-5 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Sign up now</h3>
                            		<p>Fill in the form below to get instant access:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-pencil"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="register_home.php" method="post" class="registration-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="Name">name</label>
			                        	<input type="text" name="name" placeholder="Name..." class="form-first-name form-control" id="Name">
			                        </div>

                                      <div class="form-group">
                                        <label class="sr-only" for="Password"></label>
                                        <input type="password" name="password" placeholder="Password..." class="form-last-name form-control" id="Password">
                                    </div>

                                      <div class="form-group">
                                        <label class="sr-only" for="Confirm_Password"></label>
                                        <input type="password" name="password" placeholder="Confirm Password..." class="form-last-name form-control" id="Password1" onChange="checkPasswordMatch();">
                                    </div>
                                    <p id="divCheckPasswordMatch">
                                   </p>

                                   <script>
                                   function checkPasswordMatch() {
                                     var password = $("#Password").val();
                                     var confirmPassword = $("#Password1").val();
                                     if (password != confirmPassword)
                                     $("#divCheckPasswordMatch").html("Passwords do not match!");
                                   
                                   else
                                    $("#divCheckPasswordMatch").html("Passwords match.");
                                      }
                                    $(document).ready(function () {
                                    $("#txtConfirmPassword").keyup(checkPasswordMatch);
                                       });
                                   </script>

                                    <div class="form-group">
                                        <label class="sr-only" for="Age">Age</label>
                                        <input type="number" name="age" placeholder="Age..." class="form-email form-control" max=100 id="Age">
                                    </div>

                                     <div class="form-group">
                                        <label class="sr-only" for="gender">Gender</label>
                                        Gender: <input type="radio" name="gender" placeholder="Gender..." id="gender1" value="male" style="margin-left:50px;">Male

                                    <span> <input type="radio" name="gender" placeholder="Gender..."id="gender2" value="female" style="margin-left:20px;">Female</span>

                                    </div>

                                    <div class="form-group">
                                      <label class="sr-only" for="MaSt">Marriage Status</label>
                                        Marriage Status: <input type="radio" name="marriage_status"  id="MaSt" value="married" style="margin-left:30px;">Married

                                    <span> <input type="radio" name="marriage_status" id="MaSt1" value="unmarried" style="margin-left:10px;">Unmarried</span>

                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="sr-only" for="Income">Income</label>
                                        <input type="number" name="income" placeholder="Income..." class="form-email form-control" id="Inncome">
                                    </div>
                                   
                                   <div class="form-group">
                                        <label class="sr-only" for="Street">Street</label>
                                        <input type="text" name="street" placeholder="Street..." class="form-email form-control" id="Street">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="City">City</label>
                                        <input type="text" name="city" placeholder="City..." class="form-last-name form-control" id="City">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="State">State</label>
                                        <input type="text" name="state" placeholder="State..." class="form-last-name form-control" id="State">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="Zipcode">Zipcode</label>
                                        <input type="text" name="zip_code" placeholder="Zipcode..." class="form-last-name form-control" id="Zipcode">
                                    </div>
                                   
                                  

			                        <button type="submit" class="btn">Sign me up!</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>