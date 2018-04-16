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
                <div class="col-md-4">
                    <a href="index.php" class="btn btn-info btn-block">Insert Product</a>
                </div>
                <div class="col-md-4">
                    <a href="manage_products.php" class="btn btn-info btn-block">Manage Products</a>
                </div>
                <div class="col-md-4 product-base">
                    <a href="manage_orders.php" class="btn btn-info btn-block">Manage Orders</a>
                </div>
            </div>
            <!-- end of admin navigation -->

            <h2 class="text-center">Manage Users - Store</h2>

            <!-- begin of manage users -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>Manage Users</b>
                        </div>

                        <div class="panel-body">
                            <table class="table table-striped table-list">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>Usernmae</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th class="text-center"><span class="glyphicon glyphicon-cog"></span></th>
                                    </tr>
                                </thead>

                        <?php 
                            // fetching categories
                            foreach($customers as $user) {
                        ?>

                                
                                    <tr>
                                        <td><?php echo $user['username'] ?></td>
                                        <td><?php echo $user['firstname'] ?></td>
                                        <td><?php echo $user['email'] ?></td>
                                        <td align="center">
                                            <a href="edit_customer.php?edit=<?php echo $user['_id'] ?>" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
                                            <a href="manage_users.php?delete_user=<?php echo $user['_id'] ?>" class="btn btn-danger"> <span class="glyphicon glyphicon-remove"></span> Remove </a>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of manage users -->
        </section>
    </div> 
    <!-- end of container -->
<?php include('footer.php'); ?>
<?php } ?>