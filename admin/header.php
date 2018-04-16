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

            <title>Store - Come as a guest, stay as a Family!</title>

            <!-- Include all css files as needed -->
            <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <link href="css/style.css" rel="stylesheet">

            <!-- Facebook Comment SDK -->
            <div id="fb-root"></div>
            <script>
                (function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s);
                    js.id = id;
                    js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
            </script>
            <!-- end of Faebook Comment -->


        </head>

        <body>
        	<!-- begin of header -->
            <div class="navbar navbar-fixed-top">
                <div class="container">
                    <!-- logo -->
                    <div class="navbar-header">
                        <a href="../index.php" class="navbar-brand"><img alt="Store" src="../images/logo.png"></a>
                    </div>
                    <!-- end of logo -->

                    <!-- begin of navigation -->
                    <ul class="nav navbar-nav">
                        <?php 
					   // fetching categories
					   foreach($collection_name as $item) {
					   	?>
                            <li>
                                <a href="./categories.php?cat=<?php echo $item['cat_name'] ?>&cat_id=<?php echo $item['cat_id'] ?>">
                                    <?php echo $item['cat_name'] ?>
                                </a>
                            </li>
                            <?php 
					   }					   		
					?>
                    </ul>
                    <!-- end of navigation -->

                    <!-- begin of login/register menu -->
                    <ul class="nav navbar-nav navbar-right">

                    <?php if(array_key_exists("loggedInAdmin", $_SESSION) ) : ?>
                             <li class="dropdown account">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Welcome! <span style="text-transform: lowercase;"><?php echo $_SESSION["loggedInAdmin"]; ?></span>  </a>
                              <ul class='dropdown-menu'>
                                    <li><a href='account.php'>My Account</a></li> 
                                    <li class='divider'></li>
                                    <li><a href='logout.php'>Logout</a></li> 
                               </ul>
                               </li>

                        <?php else : ?>
                              <li class="dropdown account">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span></a>
                                        <ul class='dropdown-menu'>
                                            <li><a href='login.php'>Login</a></li>
                                            <li class='divider'></li>
                                            <li><a href='register.php'>Register</a></li>
                                        </ul> 
                                </li>                                                   
 
                    <?php endif; ?>
                    </ul>
                
                    <!-- end of login/register menu -->
                </div>
            </div>
            <!-- end of header -->