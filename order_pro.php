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
      <div class="banner_adds"> <?php

      	$put = $add->fetch_for_order_pro_left();
      	echo '<a href="'.$put['site_link'].'"><img src="'.$put['image'].'" alt="" border="0"  width="'.$put['width'].'" height="'.$put['height'].'"/></a>';

      ?>  </div>
    </div>
    <!-- end of left content -->
<?php

  if (isset($_POST['order'])) {
      # code...

        $con_name   = $General->sanitize($_POST['con_name']);
        $con_mail   = $General->sanitize($_POST['con_mail']);
        $con_msg    = $General->sanitize($_POST['con_msg']);
        $con_mob    = $General->sanitize($_POST['con_mob']);
        $send_array = array('con_name','con_mail','con_msg','con_mob'); // Selecting input Field name forom the form
             
            // A new way to check 
              foreach ($_POST as $key => $value) {
                # code...

                  if ( (empty($value) === true) && (in_array($key, $send_array) === true) ) {
                    # code...
                    $errors[] = '<b><h1>Please Do not Submit without Emptying the fields</h1></b>';
                    break 1;

                  }

              }

              // Checking the string length.....(minimum)..Starts
              if ( (!empty($_POST['con_name'])) && ((strlen($con_name) < 4) === true) ) {
                # code...
                $errors[] = '<b><h1>Name fields carecter can not be </h1></b>';
              }
              if ( (!empty($_POST['con_mail']) === true) && ( (strlen($con_mail) < 6) === true) ) {
                # code...
                $errors[] = '<b><h1>mail fields carecter can not be </h1></b>';
              }
              if ( (!empty($_POST['con_msg']) === true) && ( (strlen($con_mail) < 10) === true)) {
                # code...
                $errors[] = '<b><h1>Messege fields carecter can not be smaller Then 10 Charecter</h1></b>';
              }
              if ( (!empty($_POST['con_mob']) === true) && ( strlen($con_mob) < 10) ) {
                # code...
                $errors[] = '<b><h1>Please insert  a valid phone number</h1></b>';
              }

              // Checking the string length.....(minimum)..Ends
              // Checking the string length.....(Maximum)..Starts

              if (strlen($con_name) > 50) {
                # code...
                $errors[] ='<b><h1>Name fields charecter can not be Bigger then 50 charecter</h1></b>';
              }
              if (strlen($con_mail) > 150) {
                # code...
                $errors[] = '<b><h1>Mail fields charecter can not be Bigger then 50 charecter</h1></b>';
              }
              if (strlen($con_msg)  > 5000) {
                # code...
                $errors[] = '<b><h1>Messege fields charecter can not be Bigger then 5000 charecter</h1></b>';
              }
              if (strlen($con_mob) > 15) {
                # code...
                $errors[] = '<b><h1>Messege fields charecter can not be Bigger then 5000 charecter</h1></b>';
              }

              /* Validating Email */

              if ( (filter_var($con_mail,FILTER_VALIDATE_EMAIL) === false) && (!empty($con_mail) === true) ) {
                # code...
                $errors[] ='<b><h1>This is Not An Email address .... Please give a correct email address </h1></b>';
              }


                  if (empty($errors)) {
                      # code...

                    $Succeed = true;
              
                        if ($Succeed === true) {
                          # code...
                          echo '<b><h1>Thank you For you Message  we will Send reply As Soon As possible</h1></b>';
                        
                            session_destroy();

                        }

                } else {

                  echo $General->output_error($errors);
              }

     }

?>
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
     <div align="center"><form action="" method="POST">

     <div class="prod_box_big">
        <div class="center_prod_box_big">
          <div class="contact_form">
            <div class="form_row">
              <label class="contact"><strong>Name:</strong></label>
              <input type="text" class="contact_input" name="con_name" value="<?php if (isset($_POST['con_name'])) { echo $_POST['con_name']; }?>">
            </div>

            <div class="form_row">
              <label class="contact"><strong>Email:</strong></label>
              <input type="text" class="contact_input" name="con_mail" value="<?php if (isset($_POST['con_mail'])) { echo $_POST['con_mail']; }?>">
            </div>

            <div class="form_row">
              <label class="contact"><strong>Mobile:</strong></label>
              <input type="text" class="contact_input" name="con_mob" value="<?php if (isset($_POST['con_mob'])) { echo $_POST['con_mob']; }?>">
            </div>

            <div class="form_row">
              <label class="contact"><strong>Message:</strong></label>
              <textarea class="contact_textarea" name="con_msg"><?php if (isset($_POST['con_msg'])) { echo $_POST['con_msg']; }?></textarea>
            </div>
          </div>
        </div>
      </div>
     
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
      <div class="banner_adds"> <?php

      	$put = $add->fetch_for_order_pro_right();
      	echo '<a href="'.$put['site_link'].'"><img src="'.$put['image'].'" alt="" border="0"  width="'.$put['width'].'" height="'.$put['height'].'"/></a>';

      ?> </div>
    </div>
    <!-- end of right content -->
  </div>
  <!-- end of main content -->
  <?php include 'include/footer.php';?>