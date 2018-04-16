<?php
error_reporting(0);

   // connect to mongodb server
   $connect = new MongoClient();

   // selecting a database
   $dbname = $connect->mdxstore;
   
   // Access Collection
   $categories = $dbname->categories->find();

   // Using this collection on manage_products page
   $products = $dbname->products->find();

   // Using this collection on edit_product page  
   $product = $dbname->products->find(array("_id" => new MongoId($_GET['edit'])));

   // Using this collection for listing all the customers
   $customers = $dbname->customers->find();

   //Using this collecton to edit customer details
   $cust_edit = $dbname->customers->find(array("_id" => new MongoId($_GET['edit'])));

   //
   $orders = $dbname->orders->find();


?>