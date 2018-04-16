<?php include('header.php'); ?>
<?php if(!array_key_exists("loggedInAdmin", $_SESSION)) {
    echo "<script>window.open('login.php','_self')</script>";
   }
   else {
      ?>
<?php include('header.php'); ?>
    <div class="container">
        <section class="section">
            <!-- begin of admin navigation -->
            <div class="row">
                <div class="col-md-4">
                    <a href="index.php" class="btn btn-info btn-block">Insert Products</a>
                </div>
                <div class="col-md-4 product-base">
                    <a href="manage_orders.php" class="btn btn-info btn-block">Manage Orders</a>
                </div>
                <div class="col-md-4 product-base">
                    <a href="manage_users.php" class="btn btn-info btn-block">Manage Users</a>
                </div>
            </div>
            <!-- end of admin navigation -->

            <h2 class="text-center">Manage Products - Store</h2>

            <div class="row">
            	<div class="col-md-12">
            <?php 
            // Return message when product addedd successfully. 
             echo $message; ?>
            	<!-- begin of manage products -->
                	<div class="panel panel-default">
                    	<div class="panel-heading">
                        	<b>Manage Product</b>
                    	</div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Product Image</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th class="text-center">Price</th>
                                    <th>Update</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>

                        <?php 
                            // fetching categories
                            foreach($products as $item) {
                        ?>

                            <tbody>
                                <tr>
                                    <td class="col-md-2">
                                        <div class="media">
                                            <img class="img-responsive img-thumbnail" src="../images/products/<?php echo $item['image1']['name'] ?>" style="width: 72px; height: 72px;">
                                        </div>
                                    </td>
                                    
                                    <td class="col-md-7">
                                        <div class="media">
                                            <h4 class="media-heading"><?php echo $item['title'] ?></h4>
                                        </div>
                                    </td>

                                    <td class="text-center">
                                        <strong><?php echo $item['quantity'] ?></strong>
                                    </td>

                                    <td class="col-md-1 text-center"><strong>£<?php echo $item['price'] ?></strong></td>       

                                    <td class="col-md-1">
                                         <a href="edit_product.php?edit=<?php echo $item['_id'] ?>" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
                                    </td>
                                    <td class="col-md-1">
                                        <a href="manage_products.php?delete_pro=<?php echo $item['_id'] ?>" class="btn btn-danger"> <span class="glyphicon glyphicon-remove"></span> Remove </a>
                                    </td>
                                </tr>
                            </tbody>

                         <?php } ?>

                        </table>
                    </div>
                </div>
                <!-- end of manage products -->
            </div>
            <!-- end of columns -->
          </div>
        </section>
        <!-- end of section -->
    </div>
    <!-- end of container -->
<?php include('footer.php'); ?>
<?php } ?>