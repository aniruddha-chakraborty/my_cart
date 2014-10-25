<?php
require_once 'core/init.php';
include_once 'include/header.php';
?>

    <!-- end of menu tab -->
    <div class="crumb_navigation"> Navigation: <span class="current">Home</span> </div>
    <div class="left_content">
      <div class="title_box">Categories</div>
      <!-- This is Included <li> of included file -->
<?php include 'include/cat.php';?>
      <!-- This is Included <li> of included file -->
      
      <div class="title_box">Special Products</div>
      <?php include 'include/special_pro.php';?>
      <div class="title_box">Newsletter</div>
      <div class="border_box">
      <!-- There is A newsletter File-->
      <?php include 'include/newsletter.php';?>
      <!-- -->
      </div>
           <div class="banner_adds"> <?php

        $put = $add->fetch_for_index_left();
        echo '<a href="'.$put['site_link'].'"><img src="'.$put['image'].'" alt="" border="0"  width="'.$put['width'].'" height="'.$put['height'].'"/></a>';

      ?> </div>
    </div>
    <!-- end of left content -->
    <div class="center_content">
      <div class="oferta"> <img src="images/p1.png" width="165" height="113" border="0" class="oferta_img" alt="" />
        <div class="oferta_details">
          <div class="oferta_title">Power Tools BST18XN Cordless</div>
          <div class="oferta_text"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco </div>
          <a href="" class="prod_buy">details</a> </div>
      </div>
      <div class="center_title_bar">Latest Products</div>
      
  <?php

      foreach ($Users->get_product_for_index() as $get_pro_for_in) {
        # code...

        $caught_id              = $get_pro_for_in['id'];
        $caught_pro_name        = $get_pro_for_in['product_name'];
        $caught_price           = $get_pro_for_in['price'];
        $caught_image           = $get_pro_for_in['image_1'];
     ?>
<!-- Will use this --> 
     
      <div class="prod_box">
        <div class="center_prod_box">
          <div class="product_title"><a href="details.php?pick_id=<?php echo $caught_id;?>"><?php echo $caught_pro_name;?></a></div>
          <div class="product_img"><a href=""><img src="<?php echo $caught_image;?>" alt="" border="0" width="60"></a></div>
          <div class="prod_price"><span class="blue"><b>Price:</b></span>&nbsp;<?php echo $caught_price;?>$</span></div>
        </div>
        <div class="prod_details_tab"> <a href="index.php?add_to_cart=<?php echo $caught_id;?>" class="prod_buy">Add to Cart</a> <a href="details.php?pick_id=<?php echo $caught_id;?>" class="prod_details">Details</a> </div>
      </div>
      <!-- Will use this-->
<?php

}

?>
      <div class="center_title_bar">Recomended Products</div>
     <!-- This would be using  -->

    <?php

          foreach ($Users->get_list_for_recommanded_pro() as $recomended) {
            # code...
          

        $caught_recom_id              = $recomended['id'];
        $caught_recom_pro_name        = $recomended['product_name'];
        $caught_recom_price           = $recomended['price'];
        $caught_recom_image           = $recomended['image_1'];

    ?> 
      <div class="prod_box">
        <div class="center_prod_box">
          <div class="product_title"><a href="details.php?pick_id=<?php echo $caught_recom_id;?>"><?php echo $caught_recom_pro_name;?></a></div>
          <div class="product_img"><a href=""><img src="<?php echo $caught_recom_image;?>" alt="" border="0" width="80"></a></div>
          <div class="prod_price"> <span class="blue"> Price:</span><?php echo $caught_recom_price;?>$</div>
        </div>
        <div class="prod_details_tab"> <a href="index.php?add_to_cart=<?php echo $caught_recom_id;?>" class="prod_buy">Add to Cart</a> <a href="details.php?pick_id=<?php echo $caught_recom_id;?>" class="prod_details">Details</a> </div>
      </div>
         <!-- This would be using  -->
         <?php

       }
         ?>
 
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
    <!-- Here I could find new products :v-->
      <?php include 'include/whats_new.php';?>
    <!--Here I could find new products :v-->
      <div class="title_box">Manufacturers</div>

<!-- Here I could find menu :v-->
    <?php include 'include/manu.php';?>
<!-- Here I could find menu:v-->

      <div class="banner_adds"> <?php

        $put = $add->fetch_for_index_right();
        echo '<a href="'.$put['site_link'].'"><img src="'.$put['image'].'" alt="" border="0"  width="'.$put['width'].'" height="'.$put['height'].'"/></a>';

      ?>  </div>
    </div>
    <!-- end of right content -->
  </div>
  <!-- end of main content -->
<?php include 'include/footer.php';?>
 
