<!-- Including Database,Functions and starting a session -->
<?php
   include('functions/connectdb.php');
   include('functions/functions.php'); 
   session_start();
?>
<!-- Ending of including files and session -->

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Ecommerce Store</title>
      
      <!-- Include all css files as needed -->
      <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
      <!-- end of CSS -->
   </head>

<body>
   <!-- begin of header -->
   <div class="navbar navbar-fixed-top">
      <div class="container">
         <!-- logo -->
         <div class="navbar-header">
            <a href="index.php" class="navbar-brand"><img alt="Store" src="images/logo.png"></a>
         </div>
         <!-- end of logo -->
         
         <!-- begin of navigation -->
         <ul class="nav navbar-nav">
            <?php 
               // fetching categories
               foreach($categories as $item) {
                 ?>
            <li>
               <a href="categories.php?cat=<?php echo $item['cat_name'] ?>&cat_id=<?php echo $item['cat_id'] ?>"> <?php echo $item['cat_name'] ?></a>
            </li>
            <?php } ?>
         </ul>
         <!-- end of navigation -->

         <!-- begin of searchBox -->
         <form method="get" action="search.php" class="navbar-form navbar-left navbar-search" enctype="multipart/form-data">
            <div id="searchbox">
               <div class="input-group col-md-12">
                  <input type="text" class="form-control" name="user_query" placeholder="Search for products" id="SearchInput" />
                  <span class="input-group-btn">
                  <button class="btn btn-lg" type="submit" onclick="search()">
                  <i class="glyphicon glyphicon-search"></i>
                  </button>
                  </span>
               </div>
            </div>
         </form>
         <!-- end of searchBox -->

         <!-- begin of login/register menu -->
         <ul class="nav navbar-nav navbar-right">
            <?php if(array_key_exists("loggedInUserEmail", $_SESSION) ) : ?>
            <li class="dropdown account">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="loggedInUserEmail"><?php echo $_SESSION["loggedInUserEmail"]; ?></span> <span class="glyphicon glyphicon-user"></span></a>
               <ul class='dropdown-menu'>
                  <li><a href='account.php'>My Account</a></li>
                  <li class='divider'></li>
                  <li><a href='logout.php'>Logout</a></li>
               </ul>
            </li>
            <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span><?php cart(); ?> <?php basket(); ?></a></li>

            <?php else : ?>
            <li class="dropdown account">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span></a>
               <ul class='dropdown-menu'>
                  <li><a href='login.php'>Login</a></li>
                  <li class='divider'></li>
                  <li><a href='register.php'>Register</a></li>
               </ul>
            </li>
            <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> <?php basket(); ?></a></li>
            <?php endif; ?>
         </ul>
         <!-- end of login/register menu -->
      </div>
   </div>
   <!-- end of header -->