

<?php
	
		if (isset($_POST['news_submit']) === true) {
			# code...
			$news_email = $General->sanitize($_POST['newsletter']);


			if ( (empty($_POST['newsletter']) === true) && (!isset($_POST['newsletter']) === true) ) {
				# code...
				$errors[] = '<b> Please Insert An email</b>';
			}
			if (strlen($news_email) > 40) {
				# code...
				$errors[] = '<b>Please Do not Cross the limit of 40 Charecters</b>';
			}
			if ((filter_var($news_email,FILTER_VALIDATE_EMAIL) === false) && (isset($_POST['newsletter']) === true) ) {
				# code...
				$errors[] = '<b>This is not An Email....Please Enter a valid email address</b>';
			}
			if ($Users->check_newsletter($news_email) === true) {
				# code...
				$errors[] = '<b>This Email Is Allready Taken Please Insert Another Email</b>';
			}


				if (empty($errors)===true) {
					# code...
					
					if ($Users->register_newsletter($news_email)){

						echo '<b>Thank you for Regeister in our Newsletter list..We Will send you Regular activities</b>';
					}


				} else {

					echo $General->output_error($errors);

				}
		}


?>
      <form action="" method="POST">
        <input type="text" name="newsletter" class="newsletter_input" value="<?php if (isset($_POST['newsletter'])===true) { echo $_POST['newsletter'];}?>"/>
        <input type="submit" name="news_submit" value="Subscribe"> </div>
      </form>
 