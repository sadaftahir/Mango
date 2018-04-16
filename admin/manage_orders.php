<?php include('header.php'); ?>
<?php if(!array_key_exists("loggedInAdmin", $_SESSION)) {
    echo "<script>window.open('login.php','_self')</script>";
   }
   else {
      ?>
    <div class="container">
        <section class="section">
            <!-- begin of admin navigation -->
            <div class="row">
                <div class="col-md-3">
                    <a href="index.php" class="btn btn-info btn-block">Insert Product</a>
                </div>
                <div class="col-md-3">
                    <a href="manage_products.php" class="btn btn-info btn-block">Manage Product</a>
                </div>   
                <div class="col-md-3 product-base">
                    <a href="manage_orders.php" class="btn btn-info btn-block">Manage Orders</a>
                </div>
                <div class="col-md-3 product-base">
                    <a href="manage_users.php" class="btn btn-info btn-block">Manage Users</a>
                </div>
            </div>
            <!-- end of admin navigation -->

            <h2 class="text-center">Manage Orders - Store</h2>
            <div class="row">
                <div class="col-md-12">
            <?php 
            // Return message when product addedd successfully. 
             echo $message; ?>
                    <!-- begin of manage products -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>Manage Orders</b>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Order Id</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Customer Name</th>
                                        <th>Shipping Details</th>
                                        <th>Status</th>
                                        <th>
                                    </tr>
                                </thead>
                        <?php 
                            // fetching categories
                            foreach($orders as $item) {
                                foreach($item['products'] as $product){
                        ?>
                                <tbody>
                                    <tr>
                                        <td class="col-md-1"><?php echo $item['orderID'] ?></td>
                                        <td class="col-md-5">
                                            <div class="media">
                                                <h4 class="media-heading"><?php echo $product['title'] ?></h4>
                                            </div>
                                        </td>

                                        <td class="col-md-2"><?php echo $item['username'] ?></td>

                                        <td class="col-md-2">
                                            <?php echo $item['address'] ?>
                                        </td>
                                        <td class="col-md-1 text-success"><?php echo $item['status'] ?></td>

                                        <td class="col-md-1">
                                            <a href="manage_orders.php?delete_order=<?php echo $item['_id'] ?>" class="btn btn-danger"> <span class="glyphicon glyphicon-remove"></span> Remove </a>
                                        </td>


                                        <td class="col-md-1">
                                            <a href="manage_orders.php?approve=<?php echo $item['_id'] ?>" class="btn btn-success"><span class="glyphicon glyphicon-plane"></span> Dispatched </a>

                      
                                        </td>
                                    </tr>
                                </tbody>
                         <?php } } ?>
                            </table>
                        </div>
                    </div>
                    <!-- end of manage products -->
                </div>
            </div>
        </section>
    </div>
    <?php include('footer.php'); ?>
    <?php } ?>