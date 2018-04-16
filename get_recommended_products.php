<?php 

//include('header'); 

$connect = new MongoClient();

   // selecting a database
$dbname = $connect->mdxstore;


$search_string = filter_input(INPUT_POST, 'keyword', FILTER_SANITIZE_STRING);

$find_criteria = [
    'brand' => $search_string
];


$collections = $dbname->products->find($find_criteria);

echo '<h2 class="text-banner-title">Recommendations</h2>';

 foreach($collections as $item) {

        ?>
        <div class="col-md-3 product-base">
           <a href ="product-details.php?pro_id=<?php echo $item['_id'] ?>"><img class="img-responsive img-thumbnail" src="images/products/<?php echo $item['image1']['name'] ?>">
              <div class="product"><?php echo $item['title'] ?></div>
              <span class="product-details">More Details</span>
              <span class="product-price">Price: £<?php echo $item['price'] ?></span>
           </a>
        </div>
        

 <?php }
 
  $connect->close();

?>

