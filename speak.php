<?php
require_once 'core/init.php';
include_once 'header.php';

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

      	$put = $add->fetch_for_speak_left();
      	echo '<a href="'.$put['site_link'].'"><img src="'.$put['image'].'" alt="" border="0"  width="'.$put['width'].'" height="'.$put['height'].'"/></a>';

      ?>  </div>
    </div>
    <!-- end of left content -->

    <div class="center_content">
     <div class="comment_section">
    
              <div class="comment_section_title">Comments </div>
              <?php
    $count_view = mysql_query("SELECT COUNT(`id`) FROM `messege` WHERE `view` = 0");


    $per_page = 10;
    $pages_query = mysql_query("SELECT COUNT(`id`) FROM `messege`");
  
    $pages = ceil(mysql_result($pages_query,0) / $per_page);

    $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
    $start = ($page - 1) * $per_page;

    foreach ($Users->show_comments($start,$per_page) as $comments) {
      # code...
    
    ?>
      <div class="comment_box">
                    <div class="comment_title"><?php echo $comments['name'];?></div>
                  <div class="comment_body">
                    <?php echo $comments['comment']; ?>
                    </div>
                </div>
    <?php
    }
  if ($pages >= 1) {
      # code...
      for ($x=1; $x <= $pages ; $x++) { 
        # code...
        echo '<a href="?page='.$x.'"><b>'.$x.'</b></a>'.'&nbsp;&nbsp;&nbsp;';

      }
    }
?>
            </div>


<!-- Leave Comment here -->

      
        <h1> &nbsp;&nbsp;&nbsp; <div class="comment_section_title">  Leave A comment to About My cart Project</div></h1>
        <?php

    if (isset($_POST['submit'])) {
            # code...
          
        $con_name   = $General->sanitize($_POST['con_name']);
        $con_mail   = $General->sanitize($_POST['con_mail']);
        $con_msg    = $General->sanitize($_POST['con_msg']);

        $send_array = array('con_name','con_mail','con_msg'); // Selecting input Field name forom the form
             
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
              if ( (!empty($con_mail) === true) && ( (strlen($con_mail) < 6) === true) ) {
                # code...
                $errors[] = '<b><h1>mail fields carecter can not be </h1></b>';
              }
              if ( (!empty($con_msg) === true) && ( (strlen($con_mail) < 10) === true)) {
                # code...
                $errors[] = '<b><h1>Messege fields carecter can not be smaller Then 10 Charecter</h1></b>';
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

              /* Validating Email */

              if ( (filter_var($con_mail,FILTER_VALIDATE_EMAIL) === false) && (!empty($con_mail) === true) ) {
                # code...
                $errors[] ='<b><h1>This is Not An Email address .... Please give a correct email address </h1></b>';
              }


                  if (empty($errors)) {
                      # code...
                    $Succeed = $Conversation->submit_comment($con_name,$con_mail,$con_msg);
              
                        //if ($Succeed === true) {
                          # code...
                          echo '<b><h2>Your Messege Is waiting for Review</h2></b>';
                        //}

                } else {

                  echo $General->output_error($errors);
              }
          }

        ?>
     <form action="" method="POST"> 
      <div class="prod_box_big">
        <div class="center_prod_box_big">
          <div class="contact_form">
            <div class="form_row">
              <label class="contact"><strong>Name:</strong></label>
              <input type="text" class="contact_input" name="con_name">
            </div>
            <div class="form_row">
              <label class="contact"><strong>Email:</strong></label>
              <input type="text" class="contact_input" name="con_mail">
            </div>

            <div class="form_row">
              <label class="contact"><strong>Message:</strong></label>
              <textarea class="contact_textarea" name="con_msg"></textarea>
            </div>
            <div class="form_row"> <input type="submit" name="submit" value="Submit somment"> </div>
          </div>
        </div>
      </div>
</form>


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
      <div class="banner_adds"><?php

      	$put = $add->fetch_for_speak_right();
      	echo '<a href="'.$put['site_link'].'"><img src="'.$put['image'].'" alt="" border="0"  width="'.$put['width'].'" height="'.$put['height'].'"/></a>';
//kaikobadlab13@gmail.com
      ?>  </div>
    </div>
    <!-- end of right content -->
  </div>
  <!-- end of main content -->
  <?php include 'include/footer.php';?>