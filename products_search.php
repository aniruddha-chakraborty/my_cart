<?php
require_once 'core/init.php';
include_once 'header.php';
$Users->public_search_page_protect();
?>
<?php

  

  ?>
    <!-- end of menu tab -->
    <div class="crumb_navigation"> Navigation: <span class="current">Home</span> </div>
    <div class="left_content">
      <div class="title_box">Categories</div>

<?php include 'include/cat.php';?>
      
      <div class="title_box">Special Products</div>
      <div class="border_box">
        <div class="product_title"><a href="">Makita 156 MX-VL</a></div>
        <div class="product_img"><a href=""><img src="images/p1.jpg" alt="" border="0" /></a></div>
        <div class="prod_price"><span class="reduce">350$</span> <span class="price">270$</span></div>
      </div>
      <div class="title_box">Newsletter</div>
      <div class="border_box">
      
        </div>
      <div class="banner_adds"> <?php

      	$put = $add->fetch_for_products_search_left();
      	echo '<a href="'.$put['site_link'].'"><img src="'.$put['image'].'" alt="" border="0"  width="'.$put['width'].'" height="'.$put['height'].'"/></a>';

      ?>  </div>
    </div>
    <!-- end of left content -->
    <div class="center_content">

      <div class="center_title_bar">Your Searched Products</div>
      <?php

  if (isset($_POST['submit_search']) === true) {


      $keyword = $General->sanitize($_POST['keyword']);     
    
      if (strlen($keyword) < 2) {
        # code...
        $errors[] = '<b>Please insert a charecter That is Bigger then 2 charecter</b>';
      }
      if (strlen($keyword) > 40) {
        # code...
        $errors[] = '<b>Please don not enter keywords that crosses 40 Charecter</b>';
      }
      if ( (empty($_POST['submit_search']) === true) && (!isset($_POST['submit_search']) === true) ) {
        # code...
        $errors[] = 'Programm Can not Searchwith Blank filed';
      }
      if ($Users->search($keyword) === false) {
          # code...
        $errors[] = '<h1><b>We do not have products That matches with  Your keyword "'.$keyword.'" Try Again with something else :-)</h1></b>';
      }

      if ( empty($errors) === true) {

            foreach ($Users->search($keyword) as $products) {
              # code...

        ?>
<!-- Code by here STARTS -->

    <div class="prod_box">
        <div class="center_prod_box">
          <div class="product_title"><a href="<?php echo 'details.php?pickid='.$products['id'];?>"><?php echo $products['product_name'];?></a></div>
          <div class="product_img"><a href=""><img src="<?php echo $products['image_1'];?>" alt="" border="0" width="100"/></a></div>
          <div class="prod_price"><span class="reduce">350$</span> <span class="price"><?php echo $products['price'];?>$</span></div>
        </div>
        <div class="prod_details_tab"> <a href="products.php?add_to_cart=<?php echo $products['id'];?>" class="prod_buy">Add to Cart</a> <a href="details.php?pick_id=<?php echo $products['id']?>" class="prod_details">Details</a> </div>
      </div>
    <!-- Code by here ENDS -->       
     <?php

            }

} else {

          echo  $General->output_error($errors);

  }
}
      ?>
      
    </div>
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
      <?php include 'include/manu.php';?>
      <div class="banner_adds"> <?php

      	$put = $add->fetch_for_products_search_right();
      	echo '<a href="'.$put['site_link'].'"><img src="'.$put['image'].'" alt="" border="0"  width="'.$put['width'].'" height="'.$put['height'].'"/></a>';

      ?>  </div>
    </div>
    <!-- end of right content -->
  </div>
  <!-- end of main content -->
  <div class="footer">
    <div class="left_footer"> <img src="images/footer_logo.png" alt="" width="89" height="42"/> </div>
    <div class="center_footer"> Template name. All Rights Reserved 2008<br />
      <a href="http://csscreme.com"><img src="images/csscreme.jpg" alt="csscreme" title="csscreme" border="0" /></a><br />
      <img src="images/payment.gif" alt="" /> </div>
    <div class="right_footer"> <a href="">home</a> <a href="">about</a> <a href="">sitemap</a> <a href="">rss</a> <a href="">contact us</a> </div>
  </div>
</div>
<!-- end of main_container -->
<div align=center>This Website Is Created By <a href=''>Aniruddha Chakraborty (Raj)</a></div></body>
</html>
