<?php include('header.php'); ?>
<div class="container wrapper">
   <section class="section">
      <div class="well">
         <!-- Nav tabs -->
         <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
               <a class="nav-link active" data-toggle="tab" href="#orders" role="tab">My Orders</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Profile</a>
            </li>
         </ul>
         <!-- end of Nav Tabs -->

         <!-- Tab panes -->
         <div class="tab-content">
            <div class="tab-pane active" id="orders" role="tabpanel">
               <div class="container">
                  <h3 class="text-center">View Past Orders - Store</h3>
                  <div class="row">
                     <div class="col-md-12" style="width:94%;">
                        <!-- begin of Past orders -->
                        <div class="panel panel-default">
                           <div class="panel-heading">
                              <b>View Past Orders</b>
                           </div>
                           <div class="panel-body">
                              <table class="table table-hover">
                                 <thead>
                                    <tr>
                                       <th>Order Id</th>
                                       <th>Product Name</th>
                                       <th>Quantity</th>
                                       <th>Price</th>
                                       <th>Shipping Details</th>
                                       <th>Status</th>
                                    </tr>
                                 </thead>
                                 <?php 
                                    //Find the past orders
                                    $orders = $dbname->orders->find(array("email" => $_SESSION['loggedInUserEmail']));
                                    
                                    // fetching orders
                                    foreach($orders as $item) {
                                       foreach($item['products'] as $prod){

                                    ?>
                                 <tbody>
                                    <tr>
                                       <td class="col-md-1"><?php echo $item['orderID'] ?></td>
                                       <td class="col-md-5">
                                          <h4 class="media-heading"><?php echo $prod['title'] ?></h4>
                                       </td>
                                       <td class="col-md-2"><?php echo $prod['qty'] ?></td>
                                       <td class="col-md-2"><?php echo $prod['price'] ?></td>
                                       <td class="col-md-2">
                                          <?php echo $item['address'] ?>
                                       </td>
                                       <td class="col-md-1 text-success"><?php echo $item['status'] ?></td>
                                    </tr>
                                 </tbody>
                                 <?php } }?>
                              </table>
                           </div>
                        </div>
                        <!-- end of past orders -->
                     </div>
                  </div>
               </div>
            </div>
            <div class="tab-pane" id="profile" role="tabpanel">
               <?php 
                  echo $message;
                  // Find the customer by email
                   $customer = $dbname->customers->find(array("email" => $_SESSION['loggedInUserEmail']));
                  
                  // fetching customer details
                  foreach($customer as $item) {?>
               <form action="" method="POST" enctype="multipart/form-data" id="tab2" style="float:none;margin-top:2%;background: white;">
                  <div class="form-field">
                     <input class="commonField" id="firstname" name="firstname" value="<?php echo $item['firstname'] ?>" type="text" required>
                     <label class="commonLabel">First Name</label>
                  </div>
                  <div class="form-field">
                     <input class="commonField" id="lastname" name="lastname" type="text" value="<?php echo $item['lastname'] ?>"  required>
                     <label class="commonLabel">Last Name</label>
                  </div>
                  <div class="form-field">
                     <input class="commonField" id="userName" type="text" name="userName" value="<?php echo $item['username'] ?>"  required>
                     <label class="commonLabel">User Name:</label>
                  </div>
                  <div class="form-field">
                     <input class="commonField" id="email" type="email" name="email" value="<?php echo $item['email'] ?>"  required>
                     <label class="commonLabel">Email Address</label>
                  </div>
                  <div class="form-field">
                     <input class="commonField" id="password" type="password" name="password" value="<?php echo $item['password'] ?>"  required>
                     <label class="commonLabel">Password:</label>
                  </div>
                  <div class="form-field">
                     <input class="commonField" id="repassword" type="password" name="repassword" value="<?php echo $item['passsword'] ?>" required>
                     <label class="commonLabel">Repeat Password:</label>
                  </div>
                  <div class="form-field">
                     <input class="commonField" id="country" name="country" type="text" value="<?php echo $item['country'] ?>" required>
                     <label class="commonLabel">Country</label>
                  </div>
                  <div class="form-field">
                     <input class="commonField" id="city" name="city" type="text" value="<?php echo $item['city'] ?>"  required>
                     <label class="commonLabel">City</label>
                  </div>
                  <div class="form-field">
                     <input class="commonField" id="telephone" name="telephone" type="tel" value="<?php echo $item['telephone'] ?>"  required>
                     <label class="commonLabel">Telehone</label>
                  </div>
                  <div class="form-field">
                     <input class="commonField" id="address" name="address" type="text" value="<?php echo $item['address'] ?>"  required>
                     <label class="commonLabel">Address</label>
                  </div>
                  <div class="submit">
                     <input class="commonField" id="id" name="id" type="hidden" value="<?php echo $item['_id'] ?>"  required>
                     <input type="submit" name="update_customer" value="Update Profile" class="btn btn btn-primary" style="background-color: #337ab7; margin-bottom: 2%;">
                  </div>
               </form>
               <?php } ?>
            </div>
         </div>
      </div>
   </section>
</div>
<?php include('footer.php'); ?>