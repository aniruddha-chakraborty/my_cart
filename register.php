<?php
include_once 'core/init.php';
include_once 'header.php';

    if (isset($_POST['submit']) === true) {
      # code...

      $first_name = $General->sanitize($_POST['first_name']);
      $last_name  = $General->sanitize($_POST['last_name']);
      $email      = $General->sanitize($_POST['email']);
      $country    = $General->sanitize($_POST['country']);
      $password   = $General->sanitize(md5($_POST['pass']));
      $pass_again = $General->sanitize(md5($_POST['pass_again']));


      $register_array = array('first_name','last_name','email','country','pass','pass_again');

          foreach ($_POST as $key => $value) {
            # code...
            if ( (empty($value) === true) &&  (in_array($key, $register_array) === true) ) {
              # code...
                $errors[] = '<b>Fields Marks with asteriks(*) Are need to be field</b>';
                break 1;
            }
          
          }

// Checking The Length Quality of the form******* STARTS********
        if (strlen($first_name) > 40) {
          # code...
          $errors[] = '<b>Please Don\'t Cross the limit of 40 charecter of First name</b>';
        }
        if (strlen($last_name) > 40) {
          # code...
          $errors[] = '<b>Please Don\'t Cross the limit of 40 charecter of Last name</b>';
        }
        if (strlen($email) > 50) {
          # code...
         $errors[] = '<b>Please Don\'t Cross the limit of 40 charecter of Last name</b>';
 
        }
        if (strlen($password) > 40) {
          # code...
        $errors[] = '<b>Please Don\'t Cross the limit of 40 charecter of Last name</b>';
 
        }

// Checking The Length Quality of the form******* ENDS********

//Validate ******* STARTS**********

      if ($password !== $pass_again) {
        # code...
        $errors[] = '<b>Your password didn\'t match</b>';
      }
      if ((filter_var($email,FILTER_VALIDATE_EMAIL) === false) && (!empty($email) === true) ) {
        # code...
        $errors[] = '<b>A Valid Email is needed To Rergister</b>';
      }
      if ($Users->check_mail($email) === true) {
        # code...
        $errors[] = '<b>You are Are Already Registered........</b>';
      }

//Validate ******* ENDS**********
 
              if (empty($errors) === true) {
                # code...
                
              $register_insert_array = array(

              'first_name'          => $first_name,
              'last_name'           => $last_name,
              'email'               => $email,
              'country'             => $country,
              'password'            => $password
                );


         if ( $Users->register_array($register_insert_array) === true) {

            echo '<b><h1>You are now Registered..</h1></b>';

           // $General->redirect_to('index.php');
         }

              } else {

                echo $General->output_error($errors);

              }

    }
?>    <!-- end of menu tab -->
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

      	$put = $add->fetch_for_register_left();
      	echo '<a href="'.$put['site_link'].'"><img src="'.$put['image'].'" alt="" border="0"  width="'.$put['width'].'" height="'.$put['height'].'"/></a>';

      ?> </div>

   </div>
    </div>
    <!-- end of left content -->
    <form action="" method="POST">
    <div class="center_content">
      <div class="center_title_bar">Register Here</div>
      <div class="prod_box_big">
        <div class="center_prod_box_big">
          <div class="contact_form">
            <div class="form_row">
              <label class="contact"><strong>First Name:</strong></label>
              <input type="text" class="contact_input" name="first_name">
            </div>
             <div class="form_row">
              <label class="contact"><strong>Last Name:</strong></label>
              <input type="text" class="contact_input" name="last_name">
            </div>
            <div class="form_row">
              <label class="contact"><strong>Email:</strong></label>
              <input type="text" class="contact_input" name="email">
            </div>
            <div class="form_row">
              <label class="contact"><strong>Division</strong></label>
              <select name="country">
                
                <option value="Dhaka">Dhaka</option>
                <option value="Barishal">Barishal</option>
                <option value="Khulna">Khulna</option>
                <option value="Chitagong">Chitagong</option>
                <option value="RajShahi">Rajshahi</option>
                <option value="Rangpur">Rangpur</option>

              </select>
            </div>
            <div class="form_row">
              <label class="contact"><strong>Password:*</strong></label>
              <input type="password" class="contact_input" name="pass">
            </div>
            <div class="form_row">
              <label class="contact"><strong>Password Again:*</strong></label>
              <input type="password" class="contact_input" name="pass_again">  
            </div>
            <div class="form_row"> <input type="submit" name="submit" class="prod_details" value="submit"> </div>
          </div>
        </div>
      </div>
    </div>
    </form>
    <!-- end of center content -->
    <div class="right_content">
      <div class="title_box">Search</div>
      <div class="border_box">
     
      <?php
      include 'include/search.php';
      ?>
    
    <?php
    include 'include/shopping.php';
    ?>
      <div class="title_box">What’s new</div>

     <?php include 'include/whats_new.php';?>
      
      <div class="title_box">Manufacturers</div>

     <?php include 'include/manu.php';?>
     
      <div class="banner_adds"> <?php

      	$put = $add->fetch_for_register_right();
      	echo '<a href="'.$put['site_link'].'"><img src="'.$put['image'].'" alt="" border="0"  width="'.$put['width'].'" height="'.$put['height'].'"/></a>';

      ?>  </div>
    </div>
    <!-- end of right content -->
  </div>
  <!-- end of main content -->
 <?php
include 'include/footer.php';
?>