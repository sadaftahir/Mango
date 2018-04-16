<?php include('header.php'); ?>
<div class="container wrapper">
   <div class="row">

      <?php 
         // Return message when product addedd successfully. 
         echo $message; ?>
      <?php 
         // fetching products details
         foreach($product as $item) {
         ?>

    <!-- Begin of left column for product images -->
      <div class="col-md-6">
         <div class="product-featured-image">
            <img class="img-responsive img-thumbnail" src="images/products/<?php echo $item['image1']['name'] ?>">
         </div>

         <ul class="thumbnail nav nav-tabs">
            <li>
               <a><img class="img-responsive img-thumbnail" src="images/products/<?php echo $item['image1']['name'] ?>"></a>
            </li>
            <li>
               <a><img class="img-responsive img-thumbnail" src="images/products/<?php echo $item['image2']['name'] ?>"></a>
            </li>
            <li>
               <a><img class="img-responsive img-thumbnail" src="images/products/<?php echo $item['image3']['name'] ?>"></a>
            </li>
         </ul>
      </div>
      <!-- end of left column -->

      <!-- Begin of right column for product details e.g (Title, Price, Details) -->
      <div class="col-md-6">
         <h2 class="pdp-title"><?php echo $item['title'] ?></h2>
         <h4 class="price">Price: <span>£<?php echo $item['price'] ?></span></h4>
         <hr />
         <h5 class="sizes">Sizes:
            <span class="size">S</span>
            <span class="size">M</span>
            <span class="size">L</span>
            <span class="size">XL</span>
         </h5>
         <h5 class="colors">Colors:
            <span class="color black"></span>
            <span class="color grey"></span>
            <span class="color blue"></span>
         </h5>
         <hr />

         <a href="cart.php?add_cart=<?php echo $item['_id'] ?>"><button class="add-to-cart btn btn-default" type="button">Add To Cart</button></a>

         <hr />
         <h5>Product Details</h5>
         <p class="product-description"><?php echo $item['details'] ?></p>
      </div>
      <!-- enf of right column -->
    
      <?php } ?>
   </div> 
   <!-- end of products row -->
   
   <!-- clearing all floats and everything before new section -->
   <div class="clearfix"></div>
   
   <!-- begin of Product Suggestion -->
   <hr />
   <div class="row-fluid" id="rec">
            <h2 class="text-banner-title">You May Also Like</h2>
    </div>
   
   <div class="clearfix"></div>
   <!-- end of Products Suggestion section -->

   <!-- begin of Facebook Comments -->
   <hr />
   <div class="row-fluid">
      <div class="col-md-12">
         <h3>Customer Reviews</h3>
         <div class="fb-comments" width="100%" data-href="localhost" data-numposts="5"></div>
      </div>
   </div>
    <!-- end of Facebook Comments -->
</div>
</body>
<?php include('footer.php'); ?>