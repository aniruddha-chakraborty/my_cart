<?php
require_once 'core/init.php';
include_once 'header.php';
$Users->kick_out();

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

  if (isset($_GET['report_pro'])) {
    # code...
     $reported_id = (int)$_GET['report_pro'];
  
     $General->redirect_to('report.php?report_pro='.$reported_id);
  }
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
      <div class="banner_adds"> <?php

      	$put = $add->fetch_for_cart_submit_left();
      	echo '<a href="'.$put['site_link'].'"><img src="'.$put['image'].'" alt="" border="0"  width="'.$put['width'].'" height="'.$put['height'].'"/></a>';

      ?>  </div>
    </div>
    <!-- end of left content -->

    <div class="center_content">
      <div class="center_title_bar"><?php echo $product_name;?></div>
      <div class="prod_box_big">
        <div class="center_prod_box_big">
          <div class="product_img_big"> <a href="javascript:popImage('<?php echo $image_1;?>','Some Title')" title="header=[<?php echo $product_name;?>] body=[&nbsp;] fade=[on]"><img src="<?php echo $image_1;?>" alt="" border="0" width="150"></a>
            <div class="thumbs"> <a href="" title="header=[Front image] body=[&nbsp;] fade=[on]"><img src="<?php echo $image_1;?>" width="40" alt="" border="0" /></a> <a href="" title="header=[Upper Image] body=[&nbsp;] fade=[on]"><img src="<?php echo $image_2;?>" width="40" alt="" border="0" /></a> <a href="" title="header=[Back Image] body=[&nbsp;] fade=[on]"><img src="<?php echo $image_3;?>" alt="" border="0" width="40"/></a> </div>
          </div>
          <div class="details_big_box">
            <div class="product_title_big"><?php echo $product_name;?></div>
            <div class="specifications"> Available: <span class="blue">In stock</span><br /><br />
              Suplier Name: <span class="blue"><?php echo    $suplier_name ;?></span><br /><br />
              Category: <span class="blue"><?php echo $product_cat;?></span><br /><br />
              Subcaegory :<span class="blue"> <?php echo $product_sub_cat;?></span><br /><br />
              Description :<span class="blue"><?php echo $description;?></span><br /><br />
            </div>
            <div class="prod_price_big"><span class="blue">Price: &nbsp;</span> <span class="price"><?php echo $product_price;?>$</span></div>
            <a href="<?php echo $_SERVER['PHP_SELF'];?>?pick_id=<?php echo $id;?>&add_to_cart=<?php echo $id;?>" class="prod_buy">add to cart</a> <a href="<?php echo $_SERVER['PHP_SELF'];?>?pick_id=<?php echo $id;?>&report_pro=<?php echo $id;?>" class="prod_details">Report</a></div>
        </div>
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
      <div class="banner_adds"> <?php

      	$put = $add->fetch_for_details_right();
      	echo '<a href="'.$put['site_link'].'"><img src="'.$put['image'].'" alt="" border="0"  width="'.$put['width'].'" height="'.$put['height'].'"/></a>';

      ?> </div>
    </div>
    <!-- end of right content -->
  </div>
  <!-- end of main content -->
  <?php include 'include/footer.php';?>