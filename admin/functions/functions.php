<?php 
// Allow Staff to Login

if (isset($_POST['login'])) {
  session_start();

  // connect to mongodb server
  $connect = new MongoClient();
  $db = $connect->mdxstore;

  // Get name and password strings - need to filter input to reduce chances of SQL injection etc.
  $email= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);    

  // Create a PHP array with our search criteria
  $findAdmin = [
    "email" => $email
  ];

  // Find all of the customers that match this criteria
  $cursor = $db->admins->find($findAdmin);

  // Check that there is exactly one customer
  if($cursor->count() == 0){
    $message = "<div class='alert alert-danger' role='alert'><strong>Admin email not exist!</strong></div>"; 
    return;
  }

  // Get Admin
  $admin = $cursor->getNext();

  //Check password
  if($admin['password'] != $password){
    $message = "<div class='alert alert-danger' role='alert'><strong>Password Incorrect!</strong></div>"; 
    return;
  }

  //Start session for this user
  $_SESSION['loggedInAdmin'] = $email;
  
  // Inform web page that login is successful and redirect to homepage
  echo "<script>window.open('index.php','_self')</script>";

  // Close the connection
  $connect->close();
}

// Allow staff to insert products
  if (isset($_POST['submit_product'])) {
  
  // connect to mongodb server
  $connect = new MongoClient();

  // selecting a database
  $dbname = $connect->mdxstore;

  // Inserting Data Under Products Collection
  $product_title = $_POST['title'];
  $product_brand = $_POST['brand'];
  $product_cat_id = $_POST['cat_id'];
  $product_details = $_POST['details']; 
  $product_price = $_POST['price']; 
  $product_quantity = $_POST['quantity']; 
  $product_img1 = $_FILES['product_img1'];
  $product_img2 = $_FILES['product_img2'];
  $product_img3 = $_FILES['product_img3'];


  //uploading images to it's folder
  move_uploaded_file($product_img1['tmp_name'], '../images/products/'.$product_img1['name']);
  move_uploaded_file($product_img2['tmp_name'], '../images/products/'.$product_img2['name']);
  move_uploaded_file($product_img3['tmp_name'], '../images/products/'.$product_img3['name']);


  // Inserting Query
  $insert_product = $dbname->products->insert ([
	  'title' => $product_title, 
    'brand' => $product_brand,
  	'cat_id' => $product_cat_id,
  	'image1' => $product_img1,
  	'image2' => $product_img2,
  	'image3' => $product_img3,
  	'details' => $product_details,
  	'price' => $product_price,
  	'quantity' => $product_quantity
  	]);

  if(!empty($insert_product)) {
    $message = "<div class='alert alert-success' role='alert'><strong>Well done!</strong> You have added the product successfully!</div>"; 
  } 
  else {
    $message = "Problem in adding a product. Try Again!"; 
  }
}


// Allow staff to update products
  if (isset($_POST['update_product'])) {

  //Connect to database
  $mongoClient = new MongoClient();

  //Select a database
  $dbname = $mongoClient->mdxstore;

  // Filter inputs to reduce chances of SQL injection etc.
  $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
  $brand = filter_input(INPUT_POST, 'brand', FILTER_SANITIZE_STRING);
  $categories = filter_input(INPUT_POST, 'cat_id', FILTER_SANITIZE_STRING);
  $product_img1 = $_FILES['product_img1'];
  $product_img2 = $_FILES['product_img2'];
  $product_img3 = $_FILES['product_img3'];
  $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
  $quantity = filter_input(INPUT_POST, 'qty', FILTER_SANITIZE_STRING);
  $details = filter_input(INPUT_POST, 'details', FILTER_SANITIZE_STRING);

if (isset($_GET['edit'])){
         $p = $_GET['edit'];
      }


  //Create a PHP array with our search criteria
  $findCriteria = [
   "_id" => new MongoId($p) 
  ];

  //Specify how the documents will be updated
  $updateCriteria = [
    '$set' => [
      'title' => $title,
      'brand' => $brand,
      'cat_id'=> $categories,
      'image1' => $product_img1,
      'image2' => $product_img2,
      'image3' => $product_img3,
      'price' => $price,
      'quantity' => $quantity,
      'details' => $details
      ]
  ];

  //Update all of the products that match  this criteria
  $update_product = $dbname->products->update($findCriteria, $updateCriteria);

  //Echo result back to user
  if($update_product['ok']==1){
    $message = "<div class='alert alert-success' role='alert'><strong>Well done!</strong> You have updated the product successfully!</div>"; 
  }
  else {
    echo 'Error updating product';
  }
}


// Allow staff to delete a product
  if (isset($_GET['delete_pro'])) {

  // connect to mongodb server
  $connect = new MongoClient();

  // selecting a database
  $dbname = $connect->mdxstore;

  // assigning the product id getting from delete_pro to a variable
  $proID = $_GET['delete_pro'];

  // finding the product through $prID variable
  $remCriteria = [
    "_id" => new MongoId($proID)
  ];

  // Delete the product
  $returnVal = $dbname->products->remove($remCriteria);

  // Inform staff memebr product deleted successfully
  if($returnVal['ok']==1){
    echo "<script>alert('Product has been deleted')</script>";
    echo "<script>window.open('manage_products.php','_self')</script>";
  }
  else{
    echo 'Error deleting product';
  }

  //Close the connection
  $mongoClient->close();
}


// Allow staff to delete a order
  if (isset($_GET['delete_order'])) {

  // connect to mongodb server
  $connect = new MongoClient();

  // selecting a database
  $dbname = $connect->mdxstore;

  // assigning the product id getting from delete_pro to a variable
  $orderID = $_GET['delete_order'];

  // finding the product through $prID variable
  $remCriteria = [
    "_id" => new MongoId($orderID)
  ];

  // Delete the product
  $returnVal = $dbname->orders->remove($remCriteria);

  // Inform staff memebr product deleted successfully
  if($returnVal['ok']==1){
    echo "<script>alert('Order has been deleted')</script>";
    echo "<script>window.open('manage_orders.php','_self')</script>";
  }
  else{
    echo 'Error deleting product';
  }

  //Close the connection
  $mongoClient->close();
}




// Allow staff to change or update customer details
  if (isset($_POST['update_customer'])) {

  // connect to mongodb server
  $connect = new MongoClient();

  // selecting a database
  $dbname = $connect->mdxstore;

  // Filter inputs to reduce chances of SQL injection etc.
  $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
  $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
  $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
  $username = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_STRING);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
  $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_STRING);
  $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
  $telephone = filter_input(INPUT_POST, 'telephone', FILTER_SANITIZE_STRING);
  $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);


//Create a PHP array with our search criteria
  $findCriteria = [
    "_id" =>  new MongoId($id) 
  ];

//Specify how the documents will be updated
  $updateCriteria = [
    '$set' => [
      'firstname' => $firstname,
      'lastname' => $lastname,
      'username'=> $username,
      'email' => $email,
      'password' => $password,
      'country' => $country,
      'city' => $city,
      'telephone' => $telephone,
      'address' => $address
    ]
  ];

  //Update all of the customers that match  this criteria
  $update_customer = $dbname->customers->update($findCriteria, $updateCriteria);

  //Echo result back to user
  if($update_customer['ok']==1){
    $message = "<div class='alert alert-success' role='alert'><strong>Details updated successfully!</strong></div>"; 
  }
  else {
    echo 'Error updating customer details';
  }
}


// Allow staff to update order
  if (isset($_GET['approve'])) {

  $id = $_GET['approve'];

  // connect to mongodb server
  $connect = new MongoClient();

  // selecting a database
  $dbname = $connect->mdxstore;

//Create a PHP array with our search criteria
  $findCriteria = [
    "_id" =>  new MongoId($id) 
  ];

//Specify how the documents will be updated
  $updateCriteria = [
    '$set' => [
      'status' => 'Approved'
    ]
  ];

  //Update all of the customers that match  this criteria
  $update_customer = $dbname->orders->update($findCriteria, $updateCriteria);

  //Echo result back to user
  if($update_customer['ok']==1){
    $message = "<div class='alert alert-success' role='alert'><strong>Order is approved!</strong></div>"; 
  }
  else {
    echo 'Error updating customer details';
  }
}


// Allow staff to delete a user
  if (isset($_GET['delete_user'])) {

  // connect to mongodb server
  $connect = new MongoClient();

  // selecting a database
  $dbname = $connect->mdxstore;

  $proID = $_GET['delete_user'];

  $remCriteria = [
    "_id" => new MongoId($proID)
  ];

  //Delete the customer
  $returnVal = $dbname->customers->remove($remCriteria);

  //Echo result back to user
  if($returnVal['ok']==1){
    echo "<script>alert('User has been deleted')</script>";
    echo "<script>window.open('manage_users.php','_self')</script>";
  }
  else{
   echo 'Error deleting customer';
  }
  
  //Close the connection
  $mongoClient->close();
}