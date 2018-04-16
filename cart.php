<?php include('header.php'); ?>
<div class="container section">
   <div class="row">
      <div class="col-md-12">
         <?php // Calling the cart function
          cart(); ?>
         <h2>Your Shopping Cart</h2>
         <form method="POST" enctype="multipart/form-data">
            <table class="table table-hover">
               <thead>
                  <tr>
                     <th class="text-center"></th>
                     <th>Product</th>
                     <th class="text-center">Quantity</th>
                     <th class="text-center">Price</th>
                     <th>Remove</th>
                  </tr>
               </thead>
               <tbody>
                  <?php 
                    // fetching products from cart collection
                     $i=0;
                     foreach($cart as $item) {

                        
                             ?>
                  <tr>
                     <td class="col-md-1">
                        <a class="pull-left" href="#"><img class="img-responsive img-thumbnail" src="images/products/<?php echo $item['image']['name'] ?>" style="width: 72px; height: 72px;"></a>
                     </td>
                     <td class="col-md-8">
                        <h4 class="media-heading"><a href="#"><?php echo $item['title'] ?></a></h4>
                        <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                     </td>
                     <td class="col-md-1 text-center">
                        <input type="text" name="products[<?php echo $i; ?>][qty]" value="1" class="form-control">
                     </td>
                     <td class="col-md-1 text-center"><strong>£ <?php echo $item['price'] ?> </strong></td>
                     <td class="col-md-1">
                        <a href="cart.php?delete_pro=<?php echo $item['_id'] ?>" class="btn btn-danger"> <span class="glyphicon glyphicon-remove"></span> Remove </a>
                     </td>
                  </tr>
                  <input type="hidden" name="products[<?php echo $i; ?>][id]" value="<?php echo $item['_id']; ?>">
                  <input type="hidden" name="products[<?php echo $i; ?>][title]" value="<?php echo $item['title']; ?>">
                  <input type="hidden" name="products[<?php echo $i; ?>][price]" value="<?php echo $item['price']; ?>">
                  <?php $i++;}  ?>
                 <?php $price=price();
                         if(!empty($price)){ ?> <tr>
                     <td>   </td>
                     <td>   </td>
                     <td>   </td>
                     <td>
                        <h3>Total</h3>
                     </td>
                     <td class="text-right">
                        <h3><strong>£<?php 
                        // calling price function which total all the products in cart.
                        echo $price; ?></strong></h3> 
                     </td>
                  </tr><?php } ?>
                  <tr>
                     <td>   </td>
                     <td>   </td>
                     <td>   </td>
                     <td><a href="index.php" class="btn btn-default"> <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping </a></td>
                     <td>
                        <button type="submit" name="order" class="btn btn-success">
                        Confirm and Pay <span class="glyphicon glyphicon-play"></span>
                        </button>
                     </td>
                  </tr>
               </tbody>
            </table>
         </form>
      </div>
   </div>
</div>
<?php include('footer.php'); ?>