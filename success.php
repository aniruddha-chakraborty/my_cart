<?php
require_once 'core/init.php';
include_once 'header.php';

$Users->kick_pro_suc();

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
      <div class="banner_adds"> <a href=""><img src="images/bann2.jpg" alt="" border="0" /></a> </div>
    </div>
    <!-- end of left content -->

    <div class="center_content">
      <?php  unset($_SESSION['cart_'.$_GET['id']]); ?>
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
      <div class="banner_adds"> <a href=""><img src="images/bann1.jpg" alt="" border="0" /></a> </div>
    </div>
    <!-- end of right content -->
  </div>
  <!-- end of main content -->
  <?php include 'include/footer.php';?>