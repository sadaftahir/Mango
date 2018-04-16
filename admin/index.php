<?php include('header.php'); ?>
<?php if(!array_key_exists("loggedInAdmin", $_SESSION)) {
    echo "<script>window.open('login.php','_self')</script>";
   }
   else {
      ?>
<div class="container">
   <!-- begin of admin panel section -->
   <section class="section">
     
      <!-- begin of admin navigation -->
      <div class="row">
         <div class="col-md-4">
            <a href="manage_products.php" class="btn btn-info btn-block">Manage Products</a>
         </div>
         <div class="col-md-4 product-base">
            <a href="manage_orders.php" class="btn btn-info btn-block">Manage Orders</a>
         </div>
         <div class="col-md-4 product-base">
            <a href="manage_users.php" class="btn btn-info btn-block">Manage Users</a>
         </div>
      </div>
      <!-- end of admin navigation -->
          
      <h2 class="text-center">Insert a Product - Store</h2>
     
      <div class="row">
         <div class="col-md-12">
            <div class="alert alert-warning">
               <a href="#" class="close" data-dismiss="alert">&times;</a>
               <strong>Note!</strong> All fields are required.
            </div>

            <?php 
            // Return message when product addedd successfully. 
             echo $message; ?>

            <!-- begin of inserting a product to database -->
            <div class="panel panel-default">
               <div class="panel-heading">
                  <b>Add a Product</b>
               </div>
               <div class="panel-body">
                  <form action="index.php" method="POST" enctype="multipart/form-data">
                     <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Product Title" required>
                     </div>
                     <div class="form-group">
                        <input type="text" name="brand" class="form-control" placeholder="Product Brand" required>
                     </div>
                     <div class="form-group">
                        <select name="cat_id" required>
                           <option value="">Please select Category</option>
                           <?php 
                              // fetching list of categories
                              foreach($categories as $item) {
                            ?>
                           <option value="<?php echo $item['cat_id'] ?>"><?php echo $item['cat_name'] ?></option>
                           <?php } ?>
                        </select>
                     </div>
                     <div class="form-group">
                        <input type="file" name="product_img1" class="form-control" placeholder="Product Image" required>
                     </div>
                     <div class="form-group">
                        <input type="file" name="product_img2" class="form-control" placeholder="Product Image" required>
                     </div>
                     <div class="form-group">
                        <input type="file" name="product_img3" class="form-control" placeholder="Product Image" required>
                     </div>
                     <div class="form-group">
                        <input type="text" name="price" class="form-control" placeholder="Product Price" required>
                     </div>
                     <div class="form-group">
                        <input type="text" name="quantity" class="form-control" placeholder="Product Quantity" required>
                     </div>
                     <div class="form-group">
                        <textarea name="details" cols="70" rows="10" class="form-control" placeholder="Product Details" required></textarea>
                     </div>
                     <div class="form-group">
                        <input type="submit" name="submit_product" value="Add Product" class="btn btn btn-success">
                     </div>
                  </form>
               </div>
            </div>
            <!-- end of inserting a product -->
         </div>
      </div>
   </section>
   <!-- end of section -->
</div>
<!-- end of container -->
<?php include('footer.php'); ?>
<?php } ?>