<?php include('header.php'); ?>
<div class="container">
   <section class="section">
     
      <!-- begin of admin navigation -->
      <div class="row">
         <div class="col-md-3">
            <a href="index.php" class="btn btn-info btn-block">Insert Products</a>
         </div>
         <div class="col-md-3">
            <a href="manage_products.php" class="btn btn-info btn-block">Manage Products</a>
         </div>
         <div class="col-md-3 product-base">
            <a href="manage_orders.php" class="btn btn-info btn-block">Manage Orders</a>
         </div>
         <div class="col-md-3 product-base">
            <a href="manage_users.php" class="btn btn-info btn-block">Manage Users</a>
         </div>
      </div>
      <!-- end of admin navigation -->

      <h2 class="text-center">Update Product Details - Store</h2>
      <?php 
        // fetching product record
         foreach($product as $item) {
         ?>
      <div class="row">
         <div class="col-md-12">
            <?php echo $message; ?>
            <!-- begin of inserting a product to database -->
            <div class="panel panel-default">
               <div class="panel-heading">
                  <b>Update Product Details</b>
               </div>

               <div class="panel-body">
                <!-- begin of Updating Product FORM -->
                  <form action="" method="POST" enctype="multipart/form-data">
                     <div class="form-group">
                        <input type="text" name="title" class="form-control" value="<?php echo $item['title']; ?>" required />
                     </div>
                     <div class="form-group">
                        <input type="text" name="brand" class="form-control" value="<?php echo $item['brand']; ?>" required />
                     </div>
                     <div class="form-group">
                        <select name="cat_id" required>
                           <option value="">Please select a Category</option>
                           <?php 
                              // fetching list of categories
                              foreach($categories as $item) {
                            ?>
                           <option value="<?php echo $item['cat_id'] ?>"><?php echo $item['cat_name'] ?></option>
                           <?php } } ?>
                        </select>
                     </div>
                     
                     <?php                        
                        foreach($product as $item) {
                        ?>
                     <div class="form-group">
                        <input type="file" name="product_img1" class="form-control" placeholder="Product Image" required /> 
                        File Uploaded: <img class="img-responsive img-thumbnail" src="../images/products/<?php echo $item['image1']['name'] ?>" style="width: 72px; height: 72px;">
                     </div>
                     <div class="form-group">
                        <input type="file" name="product_img2" class="form-control" placeholder="Product Image" required />
                        File Uploaded: <img class="img-responsive img-thumbnail" src="../images/products/<?php echo $item['image2']['name'] ?>" style="width: 72px; height: 72px;">
                     </div>
                     <div class="form-group">
                        <input type="file" name="product_img3" class="form-control" placeholder="Product Image" required />
                        File Uploaded:  <img class="img-responsive img-thumbnail" src="../images/products/<?php echo $item['image3']['name'] ?>" style="width: 72px; height: 72px;">
                     </div>
                     <div class="form-group">
                        <input type="text" name="price" class="form-control" value="<?php echo $item['price'] ?>" required />
                     </div>
                     <div class="form-group">
                        <input type="text" name="qty" class="form-control" value="<?php echo $item['quantity']; ?>" required />
                     </div>
                     <div class="form-group">
                        <textarea name="details" cols="70" rows="10" class="form-control" required><?php echo $item['details'] ?></textarea>
                     </div>
                     <div class="form-group">
                        <input type="submit" name="update_product" value="Update Product" class="btn btn btn-primary">
                     </div>
                  </form>
                <!-- end of Updating Product FORM -->
               </div>
            </div>
            <!-- end of inserting a product -->
         </div>
      </div>
      <?php } ?>
   </section>
</div>
<!-- end of container -->
<?php include('footer.php'); ?>