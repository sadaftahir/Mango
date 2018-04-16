<?php include('header.php'); ?>
<div class="container wrapper">
   <div class="row">
      <!-- begin of left sidebar -->
      <?php      
         $_SESSION['cat_id'] = $_GET['cat_id'];
         ?>
      <div class="col-sm-2">
         <div class="btn-group-vertical">
            <h6>Price</h6>
            <button class="btn btn-link" type="button" onclick="loadContent()">Price by High</button>
            <button class="btn btn-link" type="button" onclick="loadContent2()">Price by Low</button>
            <hr />
            <h6>Alphabetically</h6>
            <button class="btn btn-link" type="button" onclick="ascSort()">A - Z</button>
            <button class="btn btn-link" type="button" onclick="decSort()">Z - A</button>
            
         </div>
      </div>
      <!-- end of left sidebar -->

      <!-- begin of right side -->
      <div class="col-sm-10">
         <!-- Breadcrumbs -->
         <div class="row">
            <div class="col-md-12">
               <ul class="breadcrumb">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="#">Products</a></li>
               </ul>
            </div>
         </div>
         <!-- end of Breadcrumbs -->
         <hr>
         <!-- Displaying Products Using PHP function -->
         <div class="row" id="ServerContent">
            <?php getProducts(); ?>
         </div>
         <!-- end of Products -->
      </div>
      <!-- end of right side -->
   </div>
</div>
<!-- end of container -->
<?php include('footer.php'); ?>