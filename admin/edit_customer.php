<?php include('header.php'); ?>
    <div class="container">
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

            <?php 
                foreach($cust_edit as $item) {
            ?>

            <h2 class="text-center">Update Customer Details - Store</h2>
            <div class="row">
                <div class="col-md-12">

                    <?php echo $message; ?>

                    <!-- begin of inserting a product to database -->

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>Update Product Details</b>
                        </div>
                        <div class="panel-body">


        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-field">
               <input class="commonField" id="firstname" name="firstname" value="<?php echo $item['firstname'] ?>" type="text" required>
               <label class="commonLabel">First Name</label>
            </div>

            <div class="form-field">
               <input class="commonField" id="lastname" name="lastname" type="text" value="<?php echo $item['lastname'] ?>" required>
               <label class="commonLabel">Last Name</label>
            </div>

            <div class="form-field">
               <input class="commonField" id="userName" type="text" name="userName" value="<?php echo $item['username'] ?>" required>
               <label class="commonLabel">User Name:</label>
            </div>

            <div class="form-field">
               <input class="commonField" id="email" type="email" name="email" value="<?php echo $item['email'] ?>" required>
               <label class="commonLabel">Email Address</label>
            </div>

            <div class="form-field">
               <input class="commonField" id="password" type="password" name="password"  value="<?php echo $item['password'] ?>" required>
               <label class="commonLabel">Password:</label>
            </div>
            
            <div class="form-field">
               <input class="commonField" id="repassword" type="password" name="repassword"  value="<?php echo $item['password'] ?>" required>
               <label class="commonLabel">Repeat Password:</label>
            </div>

            <div class="form-field">
               <input class="commonField" id="country" name="country" type="text" value="<?php echo $item['country'] ?>" required>
               <label class="commonLabel">Country</label>
            </div>

            <div class="form-field">
               <input class="commonField" id="city" name="city" type="text" value="<?php echo $item['city'] ?>" required>
               <label class="commonLabel">City</label>
            </div>

            <div class="form-field">
               <input class="commonField" id="telephone" name="telephone" type="tel" value="<?php echo $item['telephone'] ?>" required>
               <label class="commonLabel">Telehone</label>
            </div>

            <div class="form-field">
               <input class="commonField" id="address" name="address" type="text" value="<?php echo $item['address'] ?>" required>
               <label class="commonLabel">Address</label>
            </div>
            
            <div class="submit">
               <input class="commonField" id="id" name="id" type="hidden" value="<?php echo $item['_id'] ?>" required>
               <input type="submit" name="update_customer" value="Update Product" class="btn btn btn-primary">
            </div> 
        </form>
    
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