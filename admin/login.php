<?php
    include('functions/connectdb.php');
    include('functions/functions.php'); 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>STORE - STAFF PANEL</title>

        <!-- CSS -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <style>
            body {
                background-image: url("img/1.jpg"); 
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
        </style>
    </head>

    <body>

        <!-- Top content -->
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">
                    <h1><strong>Store -</strong> Login Form</h1>
                    <div class="description">
                    	<p>
                            Please login to manage your store.
                    	</p>
                    </div>
                </div>
            </div>
            <div id="loginmsg"><?php echo $message; ?></div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 form-box">
                	<div class="form-top">
                		<div class="form-top-left">
                			<h3>Login to our site</h3>
                    		<p>Enter your username and password to log on:</p>
                		</div>
                		<div class="form-top-right">
                			<i class="fa fa-lock"></i>
                		</div>
                    </div>
                    <div class="form-bottom">
	                    <form action="login.php" method="POST">
	                    	<div class="form-group">
	                    		<label class="sr-only">Email</label>
	                        	<input type="text" class="login-only form-control" name="email" placeholder="Email..." id="email" required>
	                        </div>
	                        <div class="form-group">
	                        	<label class="sr-only" for="form-password">Password</label>
	                        	<input type="password" class="login-only form-control" name="password" placeholder="Password..." id="password" required>
	                        </div>
	                        <button type="submit" class="loginbtn" name="login">Sign in!</button>
	                    </form>
                    </div>
                </div>
            </div>
    </body>
</html>