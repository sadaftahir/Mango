<?php
error_reporting(0);
session_start();
   // connect to mongodb server
   $connect = new MongoClient();

   // selecting a database
   $dbname = $connect->mdxstore;
   
   // Find categories collection - Using this collection to list categories name in navigation
   $categories = $dbname->categories->find();
   
   // Find all the products that matches the categories ID, to list the products on category pages
   $collection_products = $dbname->products->find(array("cat_id" => $_GET['cat_id']));
   
   // Using this collection to display single product details by using it's product ID
   $product = $dbname->products->find(array("_id" => new MongoId($_GET['pro_details'])));

   // Find the products added to cart collection
   $cart = $dbname->cart->find(array("email" => $_SESSION['loggedInUserEmail'],"processed"=>array("\$ne"=>1)));
   // Using this collection to find all the products in cart.
   $cart_products = $dbname->products->find();

   // Find all of the products that matches the criteria
   $search  = $dbname->products->find(array("title" => new MongoRegex('/.*' . $_GET['user_query'] . '.*/i')));

   //Find the customers 
   $customer = $dbname->customers->find(array("email" => $_SESSION['loggedInUserEmail']));
  
  // Close the connection 
   $connect->close();
?>