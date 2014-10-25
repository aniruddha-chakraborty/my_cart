<?php
require_once 'core/init.php';
include_once 'include/header.php';

?>

    <!-- end of menu tab -->
    <div class="crumb_navigation"> Navigation: <span class="current">Home</span> </div>
    <div class="left_content">
      <div class="title_box">Categories</div>
    <?php include 'include/cat.php';?>
      <div class="title_box">Special Products</div>
      <?php include 'include/special_pro.php';?>
      <div class="title_box">Newsletter</div>
      <div class="border_box">
       <?php include 'include/newsletter.php';?>
       </div>
      <div class="banner_adds"><?php

      	$put = $add->fetch_for_products_left();
      	echo '<a href="'.$put['site_link'].'"><img src="'.$put['image'].'" alt="" border="0"  width="'.$put['width'].'" height="'.$put['height'].'"/></a>';

      ?>  </div>
    </div>
    <!-- end of left content -->
    <div class="center_content">
<?php




?>
      <div class="center_title_bar">Latest Products</div>
      <?php

    $per_page = 9;

    $pages_query = mysql_query("SELECT COUNT(`id`) FROM `products`");
    $pages = ceil(mysql_result($pages_query,0) / $per_page);

    $page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
    $start = ($page - 1) * $per_page;


            foreach ($Users->take_products($start,$per_page) as $products) {
              # code...

        ?>
<!-- Code by here STARTS -->

    <div class="prod_box">
        <div class="center_prod_box">
          <div class="product_title"><a href="<?php echo 'details.php?pickid='.$products['id'];?>"><?php echo $products['product_name'];?></a></div>
          <div class="product_img"><a href=""><img src="<?php echo $products['image_1'];?>" alt="" border="0" width="100"/></a></div>
          <div class="prod_price"><span class="reduce">350$</span> <span class="price"><?php echo $products['price'];?>$</span></div>
        </div>
        <div class="prod_details_tab"> <a href="?add_to_cart=<?php echo $products['id'];?>" class="prod_buy">Add to Cart</a> <a href="details.php?pick_id=<?php echo $products['id']?>" class="prod_details">Details</a> </div>
      </div>
    <!-- Code by here ENDS -->       
     <?php

            }
echo '<br>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
      
      ?>

<br>
<br>
    </div>
    <!-- end of center content -->
    <div class="right_content">
      <div class="title_box">Search</div>
      <div class="border_box">
          <!-- HEre Is A .php file included what is need to search -->
<?php

include 'include/search.php';
?>
  <!-- HEre Is A .php file included what is need to search -->
      </div>
      <?php
      include 'include/shopping.php';
      ?>
      <div class="title_box">What’s new</div>

      <?php include 'include/whats_new.php';?>

      <div class="title_box">Manufacturers</div>

      <?php include 'include/manu.php';?>
  <div class="banner_adds"> <?php

      	$put = $add->fetch_for_products_right();
      	echo '<a href="'.$put['site_link'].'"><img src="'.$put['image'].'" alt="" border="0"  width="'.$put['width'].'" height="'.$put['height'].'"/></a>';

      ?>  </div>
    

    </div>
<div align="center">
  

<?php
       if ($pages >= 1) {
      # code...
      for ($x=1; $x <= $pages ; $x++) { 
        # code...
        echo '<a href="?page='.$x.'"><b><big hight="50">'.$x.'</big></b></a>&nbsp;&nbsp;&nbsp;';

      }
    }

?>
</div>
    <!-- end of right content -->
  </div>
  <!-- end of main content -->
 <?php include 'include/footer.php';?>