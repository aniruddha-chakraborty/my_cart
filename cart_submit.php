<?php
require_once 'core/init.php';
include_once 'header.php';

  if (isset($_GET['pick_id'])) {
    # code...

        $id = $_GET['pick_id'];

      $sql = $General->query("SELECT * FROM `products` WHERE `id` = '$id'");
          while ($collect = mysql_fetch_assoc($sql)) {
            # code...
          $product_name       = $collect['product_name'];
          $suplier_name       = $collect['suplier_name'];
          $product_cat        = $collect['category'];
          $product_sub_cat    = $collect['sub_category'];
          $product_price      = $collect['price'];
          $description        = $collect['description'];
          $image_1            = $collect['image_1'];
          $image_2            = $collect['image_2'];
          $image_3            = $collect['image_3']; 
          }
  
         $Users->hit_count_products($id);

  }

  // This COde block is for Report Products

  
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

      	$put = $add->fetch_for_cart_submit_left();
      	echo '<a href="'.$put['site_link'].'"><img src="'.$put['image'].'" alt="" border="0"  width="'.$put['width'].'" height="'.$put['height'].'"/></a>';

      ?> </div>
    </div>
    <!-- end of left content -->

    <div class="center_content">
      <div class="center_title_bar">Choose a payment Method here</div>
      <div class="prod_box_big">
        <div class="center_prod_box_big">
         
          <div class="details_big_box">
            <div class="product_title_big"><?php echo $product_name;?></div>
            <div class="specifications">
            <?php

            //**********************  /* CArt Showing system is STARTs */

            $Users->user_cart_submit();
  /* Cart Showing system is END */

            ?>

            </div>
          
           </div>

        </div>
     <div align="center"><form action="cart_submit.php" method="POST">

     <?php

          if (isset($_POST['order'])) {
            # code...
            $General->redirect_to('order_pro.php');
          }

     ?>


     <input type="submit" value="Pay Using Paypal" name="pay_pal">
     <input type="submit" value="Order Product's" name="order"></form></div>
      </div>
    </div>
    <!-- end of center content -->
    <div class="right_content">
      <div class="title_box">Search</div>
      <div class="border_box">
        
        <?php include 'include/search.php';?>

         </div>
     
     <?php include'include/shopping.php';?>
      
      <div class="title_box">What’s new</div>
      
      <?php include 'include/whats_new.php';?>

        <!-- Manufacturer Starts -->

      <div class="title_box">Manufacturers</div>
    
      <?php include 'include/manu.php';?>

    <!-- Manufacturer Ends -->
      <div class="banner_adds">
      <?php

      	$put = $add->fetch_for_cart_submit_right();
      	echo '<a href="'.$put['site_link'].'"><img src="'.$put['image'].'" alt="" border="0"  width="'.$put['width'].'" height="'.$put['height'].'"/>';

      ?> </div>
    </div>
    <!-- end of right content -->
  </div>
  <!-- end of main content -->
  <?php include 'include/footer.php';?>