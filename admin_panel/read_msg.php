<?php $page 	= 'admin/news.php'; ?>
<?php $sub_page = 'admin/sub/message_visit.php';?>
<?php include 'core/init.php';?>
<?php $General->logged_out_redirect();?>
<?php include 'header.php';
$id = $_SESSION['user_id']; // Storing session in var and got This session from login.php page

$sql = $Connection->query("SELECT * FROM `admin` WHERE `id` = $id");

if (isset($_GET['id'])) {
	# code...
	$pick_id = $_GET['id'];
}

//This will redirect Unothorized 
if (empty($_GET) === true) {
			# code...
			header( 'Location: messege_visit.php');
	}



?>


	<!-- end page-heading -->

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
<!-- This place is for The PHP coding -->
<!-- I shoud Output Status of The full CMS here -->
<!--*******************************************************************************************-->
	
<?php
	
	/*
		This Block Of code is Used to Reply To the User
	*/

			if (isset($_POST['submit']) === true) {
				# code...
				
				if (empty($_POST['reply'])) {
					# code...
					$errors[] = $Admin->error_report('You can not Send Blank Reply to The User');
				}
			
					if (empty($errors) === true) {
						# code...

					} else {

					echo	$General->output_error($errors);
					}

			}

	

?>

	<?php

/*

This Block of Code is Showing the selected Item only..... Its is not Goes with the reply function
*/
		foreach ($Conversation->pick_msg_by_id($pick_id) as $picked_message) {
			# code...

				if ($picked_message['view'] == 0) {

						$Conversation->viewed($pick_id);

				} else {

					// Do nothing 
				}

				?>
				<h3> <?php echo $picked_message['name'];?>  (<span class="blue"><?php echo $picked_message['email'];?> </span>)Say's ------</h3>
				
				<h4><?php echo $picked_message['message'];?></h4>
				<br>
				<br>
				<h2><?php 

				if ($picked_message['reply'] == "") {
					# code...

				} else {

					echo 'You replied:<br><br>';
					echo $picked_message['reply'];
				}
				
				?></h2>
				<br>
				<br>
				<?php

		}

	?>
			<h2></h2>

	<h1>Reply to <?php echo $picked_message['name'];?>'s Message</h1><br>

<?php

		if (isset($_POST['submit']) === true) {
				
				if (empty($errors) === true) {
						# code...
					$message_o = $General->sanitize($_POST['reply']);

						$Conversation->reply($message_o,$pick_id,$picked_message['email'],$picked_message['name']);

					} else {

					//Do nothing cause Allready Outputing error at the Begening..............
					}
				}

?>
	<form action="" method="POST">	
		<textarea rows="6" cols="90" name="reply"></textarea><br>
		<input type="submit" value="Reply" class="form-submit" name="submit" />
		</form>
			</div>
			<!--  end table-content  -->
	<!-- This place is for The  End Of PHP coding -->
	<!-- ************************************************************************************** -->
			<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
		</td>

		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>
	<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->

<?php include 'footer.php';?>
</body>
</html>