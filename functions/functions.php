<?php

// Register Page 
if (isset($_POST['register'])) {

  //Getting data through form - need to filter input to reduce chances of SQL injection etc.
  $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
  $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
  $username = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_STRING);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
  $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_STRING);
  $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
  $telephone = filter_input(INPUT_POST, 'telephone', FILTER_SANITIZE_STRING);
  $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);

  //Create a PHP array to insert this to database.
  $registerArray = [ 
    "firstname" => $firstname,
    "lastname" => $lastname,
    "username" => $username,
    "email" => $email,   
    "password" => $password,
    "country" => $country,
    "city" => $city,
    "telephone" => $telephone,
    "address" => $address
  ];

  // Find Email in database
  $findEmail = [
    "email" => $email
  ];

  // Find Username in database
  $findUsername = [
    "username" => $username
  ];

  // Find all of the email that match this criteria
  $findEmail = $dbname->customers->find($findEmail);

  // Find all of the username that match this criteria
  $findUsername = $dbname->customers->find($findUsername);

  // Check that there is exactly one email
  if($findEmail->count() > 0){
    $message = "<div class='alert alert-danger' role='alert'><strong>Email already exist!</strong></div>"; 
    return;
  }

  // Check that there is exactly one username
  if($findUsername->count() > 0){
    $message = "<div class='alert alert-danger' role='alert'><strong>Username already exist!</strong></div>"; 
    return;
  }

  // Inserting Data to customers collections
  $result = $dbname->customers->insert($registerArray); 

  // Inform user that registration is successfull
  if(!empty($result)) { 
    $message = "<div class='alert alert-success' role='alert'><strong>Well done!</strong> You have registered successfully!</div>"; 
  } 
  else {
    $message = "Problem in registration. Try Again!"; 
  }

  //Close the connection
  $connect->close();
}

//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// Login Page 
if (isset($_POST['login'])) {
  session_start();

  // Get name and password strings - need to filter input to reduce chances of SQL injection etc.
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);    

  // Create a PHP array to find Customer Email
  $findCustomer = [
    "email" => $email
  ];

  // Find all of the customers that match this criteria
  $cursor = $dbname->customers->find($findCustomer);

  // Check that there is exactly one customer
  if($cursor->count() == 0){
    $message = "<div class='alert alert-danger' role='alert'><strong>Email not exist! Please <a href='register.php'>signup</a> to continue shopping </strong></div>"; 
    return;
  }

  // Get customer
  $customer = $cursor->getNext();

  //Check password
  if($customer['password'] != $password){
    $message = "<div class='alert alert-danger' role='alert'><strong>Password Incorrect!</strong></div>"; 
    return;
  }

  //Start session for this user
  $_SESSION['loggedInUserEmail'] = $email;
  
  // Inform web page that login is successful and redirect to homepage
  echo "<script>window.open('index.php','_self')</script>";

  // Close the connection
  $connect->close();
}

//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// Displaying Products on Category Pages
function getProducts() {
  global $collection_products;

  // Check if there is no products.
  if($collection_products->count() == 0){
      echo "<div class='alert alert-danger' role='alert' style='width:97%;margin-left:2%;'><strong>No Products added to this cateogy!</strong></div>";
  }

  // fetching products using categories ID's.
  foreach($collection_products as $item) {
    ?>
        <div class="col-md-3 product-base">
          <a href="product-details.php?pro_details=<?php echo $item['_id'] ?>"><img class="img-responsive img-thumbnail" alt="<?php echo $item['title'] ?>" src="images/products/<?php echo $item['image1']['name'] ?>">
            <div class="product"><?php echo $item['title'] ?></div>
            <span class="product-details">More Details</span>
            <span class="product-price">Price: £<?php echo $item['price'] ?></span>
           </a>
        </div>
    <?php
  }
}

//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// This function will sort products in ascending order - Price By Low.
function getListAsc(){
  global $dbname;

  // Storing  the cat_id in session storage to use later.
  $var1 = $_SESSION['cat_id'];
  
  $findList = [
    "cat_id" => $var1
  ];

  // Finding and sorting out the products by price in ascending order. 1 is used for ascending order while -1 is used for descending order.
  $collections = $dbname->products->find($findList)->sort(array("price" => 1)); 

  // Fetching products by ascending order
  foreach($collections as $item) {
      ?>
        <div class="col-md-3 product-base">
           <a href ="product-details.php?pro_id=<?php echo $item['_id'] ?>"><img class="img-responsive img-thumbnail" src="images/products/<?php echo $item['image1']['name'] ?>">
              <div class="product"><?php echo $item['title'] ?></div>
              <span class="product-details">More Details</span>
              <span class="product-price">Price: £<?php echo $item['price'] ?></span>
           </a>
        </div>
    <?php }

  $connect->close();

}

// This function will sort products in descending order - Price By High.
function getList(){
  global $dbname;

  // Storing  the cat_id in session storage to use later.
  $var1 = $_SESSION['cat_id'];  
  
  $findList = [
    "cat_id" => $var1
  ];

  // Finding and sorting out the products by price in descending order. 1 is used for ascending order while -1 is used for descending order.
  $collections = $dbname->products->find($findList)->sort(array("price" => -1));

  // Fetching products in descending order
   foreach($collections as $item) {
      ?>
        <div class="col-md-3 product-base">
           <a href ="product-details.php?pro_id=<?php echo $item['_id'] ?>"><img class="img-responsive img-thumbnail" src="images/products/<?php echo $item['image1']['name'] ?>">
              <div class="product"><?php echo $item['title'] ?></div>
              <span class="product-details">More Details</span>
              <span class="product-price">Price: £<?php echo $item['price'] ?></span>
           </a>
        </div>
    <?php }

  $connect->close();

}



function sortDec(){
  global $dbname;

  $var1 = $_SESSION['cat_id'];

  $findList = [
   "cat_id" => $var1
  ];

  // Finding and sorting out the products Alphabetically in descending order. 1 is used for ascending order while -1 is used for descending order.
  $collections = $dbname->products->find($findList)->sort(array("title" => -1));

  // Fetching products in descending order
  foreach($collections as $item) {
      ?>
        <div class="col-md-3 product-base">
           <a href ="product-details.php?pro_id=<?php echo $item['_id'] ?>"><img class="img-responsive img-thumbnail" src="images/products/<?php echo $item['image1']['name'] ?>">
              <div class="product"><?php echo $item['title'] ?></div>
              <span class="product-details">More Details</span>
              <span class="product-price">Price: £<?php echo $item['price'] ?></span>
           </a>
        </div>
    <?php }

  $connect->close();

}

// This function display products in descending order.
function sortAsc(){
  global $dbname;

  $var1 = $_SESSION['cat_id'];
 
  $findList = [
    "cat_id" => $var1
  ];

  // Finding and sorting out the products Alphabetically in ascending order. 1 is used for ascending order while -1 is used for descending order.
  $collections = $dbname->products->find($findList)->sort(array("title" => 1));  

  foreach($collections as $item) {
      ?>
        <div class="col-md-3 product-base">
           <a href ="product-details.php?pro_id=<?php echo $item['_id'] ?>"><img class="img-responsive img-thumbnail" src="images/products/<?php echo $item['image1']['name'] ?>">
              <div class="product"><?php echo $item['title'] ?></div>
              <span class="product-details">More Details</span>
              <span class="product-price">Price: £<?php echo $item['price'] ?></span>
           </a>
        </div>
    <?php }

  $connect->close();
}

//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// Displaying Products on Search Page
function searchProducts() {
  global $search;
  
  // Extract the data that was sent to server
  $user_keyword = $_GET['user_query'];

  // Display error if no products found else display the products
  if($search->count() == 0){
    echo "<div class='alert alert-danger' role='alert'><strong>Sorry!</strong> Your search <strong> ". $user_keyword ." </strong> did not match any products.</div>";
    echo "<center><img src='images/no-search-results.jpg'></center>"; 
    }
    else {
    echo "<div class='alert alert-success' role='alert'>Searched For: <strong> $user_keyword </strong></div>";
     foreach($search as $item) {
      ?>
        <div class="col-md-4 product-base">
           <a href ="product-details.php?pro_details=<?php echo $item['_id'] ?>"><img class="img-responsive img-thumbnail" src="images/products/<?php echo $item['image1']['name'] ?>">
              <div class="product"><?php echo $item['title'] ?></div>
              <span class="product-details">More Details</span>
              <span class="product-price">Price: £<?php echo $item['price'] ?></span>
           </a>
        </div>
    <?php
    }
  }
}

//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// Cart Page
 function cart() {
  global $dbname;
  

  if(isset($_GET['add_cart'])) {
    if(isset($_SESSION['loggedInUserEmail'])) {
    $p_id = $_GET['add_cart'];
 
    $cart_products = $dbname->products->find(array("_id" => new MongoId($_GET['add_cart'])));

    foreach($cart_products as $item) {
         $title = $item['title'];
         $price = $item['price'];
         $img = $item['image1'];
    } 
  
    // selecting a cart collection
    $basket = $dbname->cart;
    
    // Create a PHP array with our search criteria
    $findCustomer = [
      "pro_id" => $p_id
    ];

     // Find all of the customers that match this criteria
    $cursor = $dbname->cart->find($findCustomer);

    // Check that there is exactly one customer
    if($cursor->count() == 0){
      
      //Create a PHP array 
      $registerArray = [ 
        "pro_id" => $p_id,
        "email" => $_SESSION['loggedInUserEmail'],
        "title" => $title,
        "price" => $price,
        "image" => $img
      ];

      // Inserting Data to customers collections
      $result = $basket->insert($registerArray);

  }
  else if($cursor->count() > 0){
           echo '';
    }
  }
  else {
      echo "<script>alert('Please login to add product to cart!')</script>";
      echo "<script>window.open('login.php','_self')</script>";
    } 
  }
}

//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// Total items in basket
function basket() {
  global $dbname;

  // Select from cart where email = email address
  $item = $dbname->cart->find(array("email" => $_SESSION['loggedInUserEmail'],"processed"=>array("\$ne"=>1)))->count();
  
  // Display result
  echo "<span class='badge alert-info fade in'>" . $item .  "</span>";
}

//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


function price() {
  global $dbname;

  // Select from cart where email = email address
  $select_product = $dbname->cart->find(array("email" => $_SESSION['loggedInUserEmail'],"processed"=>array("\$ne"=>1)));

  foreach ($select_product as $pro) {
    $pro_id = $pro['pro_id'];
    $pro_price = $pro['price'];

    $value = $pro_price;
    $total += $value;
  }
  // Display result  
 return $total;
}

//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// Allow user to delete a product
  
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
  $returnVal = $dbname->cart->remove($remCriteria);

  // Inform staff memebr product deleted successfully
  if($returnVal['ok']==1){
    echo "<script>alert('Product has been deleted')</script>";
    echo "<script>window.open('cart.php','_self')</script>";
  }
  else{
    echo 'Error deleting product';
  }

  //Close the connection
  $mongoClient->close();
}

//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// Receiving Order

if (isset($_POST['order'])) { 

  //Start session for this user
  session_start();
   //Find the customers 
   $customer = $dbname->customers->find(array("email" => $_SESSION['loggedInUserEmail']));

   foreach($customer as $item) {
         $username = $item['username'];
         $address = $item['address'];
    }


 //Getting data through form - need to filter input to reduce chances of SQL injection etc.
  $quantity = filter_input(INPUT_POST, 'qty', FILTER_SANITIZE_STRING);
  $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
  $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
 

 //Create a PHP array 
  $registerArray = array(
    array(
    
      "username" => $username,
      "email" => $_SESSION['loggedInUserEmail'],
      "address" => $address,
      "quantity" => $quantity,
      "orderID" => mt_rand(1,10000),
      "status" => 'Pending',
      "products"=> $_POST['products']
      )
    );


   // Inserting Data to customers collections
  $dbname->orders->batchInsert($registerArray); 
  echo "<script>alert('Thank you for the order')</script>";

  $dbname->cart->update(array("email" => $_SESSION['loggedInUserEmail']),array("\$set"=>array("processed"=>1)),array("multiple"=>TRUE,'j'=>TRUE,'w'=>(int)1));
  echo "<script>window.open('account.php','_self')</script>";

}

//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// Allow customer to update profile
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


