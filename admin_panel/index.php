<?php $page = 'admin/index.php'; ?>
<?php include 'core/init.php';?>
<?php $General->logged_out_redirect();?>
<?php include 'header.php';
$id = $_SESSION['user_id']; // Storing session in var and got This session from login.php page

$sql = $Connection->query("SELECT * FROM `admin` WHERE `id` = $id");

while ($out = mysql_fetch_assoc($sql)) {
	# code...
	$name = $out['username'];
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
			<h2>Welcome, <?php echo $name;?></h2>
			<h3> What you want To do Today?</h3>

	<?php
	if ($new_msg == '0') {
		# code...

//Need To do nothing........

	} else {

		echo $Conversation->notify_msg($new_msg);
	}

	if (isset($_POST['submit_search']) === true) {
		# code...

			$keyword = mysql_real_escape_string(htmlentities($_POST['keyword']));

	//  Cheking the from is empty or not
		if ( (!isset($_POST['keyword']) === false) && (empty($_POST['keyword']) === true) ) {
			# code...
				$errors[] = $Admin->error_report('ভাই খালি বক্স রাখসেন কেন?? আমারে কি বাতাশের মধ্যে সার্চ করাবেন?? ');
		}
	// Checing the length validity of the About to search Charecter
		if ( (strlen($keyword) < 2) === true ) {
			# code...
			$errors[] = $Admin->error_report('Your search term should be bigger then 2 Charecters');
		}
	//Checking The Return Value is NULL or not if NULL show There are no back-kicks :v
		if ($Admin->search_results($keyword) === false) {
			# code...
			$errors[] = $Admin->error_report('Your search return zero(0) মানে আণ্ডা');
		}
	
	// Run if You are kolonko mukto :v :v :v

			if (empty($errors) === true) {
				# code...

		echo '';

			if ($Admin->search_results($keyword) === false) {

			
			
			} else {

?>
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Main Image</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Product Name</a></th>
					<th class="table-header-repeat line-left"><a href="">Category</a></th>
					<th class="table-header-repeat line-left"><a href="">Price</a></th>
					<th class="table-header-repeat line-left"><a href="">Description</a></th>
					<th class="table-header-options line-left"><a href="">Options</a></th>
				</tr>

<?php
			$return_search = $Admin->search_results($keyword);

				foreach ($Admin->search_results($keyword) as $search_engine) {
					# code...
	//id	product_name	suplier_name	category	sub_category	price	description	image_1	image_2	image_3	quantity	date_added


					$id 			= $search_engine['id'];
					$product_name	= $search_engine['product_name'];
					$suplier_name 	= $search_engine['suplier_name'];
					$category 		= $search_engine['category']; 
					$sub_category 	= $search_engine['sub_category'];
					$price 			= $search_engine['price'];
					$description  	= $search_engine['description'];
					$image_1 		= $search_engine['image_1'];

				?>
					<tr class="alternate-row">
					<td><input  type="checkbox"/></td>
					<td><img src="../<?php echo $image_1;?>" width="60"/></td>
					<td><?php echo $product_name;?></td>
					<td><?php echo $category;?></td>
					<td><?php echo $price;?>$</td>
					<td><?php echo $description;?>..............</td>
					<td class="options-width">
					<a href="edit_products.php?pro_id=<?php echo $id;?>" title="Edit" class="icon-1 info-tooltip"></a>
					<a href="products.php?del=<?php echo $id;?>" title="Delete" class="icon-2 info-tooltip"></a>
					<a href="" title="Star Mark" class="icon-3 info-tooltip"></a>
					<a href="pro_full_des.php?id=<?php echo $id;?>" title="View Full Descrition" class="icon-4 info-tooltip"></a>
					<a href="" title="Sold all" class="icon-5 info-tooltip"></a>
					</td>
				</tr>
				
				<?php


				}
}

			} else {

				echo $General->output_error($errors);
			}
	}


	?>			
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
<!--  end content-outer........................................................END --
mysql.serversfree.com
u123075985_cart
u123075985_anik
01711109330
>

<?php include 'footer.php';?>
</body>
</html>