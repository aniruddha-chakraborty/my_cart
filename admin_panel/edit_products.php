<?php include 'core/init.php';?>
<?php

// this varible will Control the nav bar lightout 
$page = 'admin/products.php';
$sub_page = 'admin/sub/edit_products.php';
 ?>

<?php include 'header.php';?>
<?php $Admin->redirect_blank_2();?>
<!--  In THis Commet code block with @@@@@@@@@@@@@@ Icon -->

<!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->

<div id="page-heading"><h1>Add product</h1></div>
<?php

 //	id	product_name	suplier_name	category	sub_category	price	description	image_1	image_2	image_3	quantity	date_added
	if (isset($_GET['pro_id'])) {

			$get_id = $_GET['pro_id'];
	
		$sql = mysql_query("SELECT * FROM `products` WHERE `id` = $get_id");
			
			while ($output = mysql_fetch_assoc($sql)) {
				# code...
					$out_id 			= $output['id'];
					$out_product_name 	= $output['product_name']; 
					$out_suplier_name 	= $output['suplier_name'];
					$out_category_name 	= $output['category'];
					$out_sub_cat_name 	= $output['sub_category'];
					$out_price			= $output['price'];
					$out_description 	= $output['description'];
					$out_image_1 		= $output['image_1'];
					$out_image_2 		= $output['image_2'];
					$out_image_3		= $output['image_3'];

			}


		if (isset($_POST['submit'])) {
	# code...
	$product_name   = $General->sanitize($_POST['product_name']);
	$suplier_name   = $General->sanitize($_POST['product_name_2']);
	$category       = $General->sanitize($_POST['category']);
	$sub_category   = $General->sanitize($_POST['subcategory']);
	$price        	= $General->sanitize($_POST['price']);
	$description  	= $General->sanitize($_POST['description']);
	$image_1      	= $_FILES['image_1']['name'];
	$image_2      	= $_FILES['image_2']['name'];
	$image_3      	= $_FILES['image_3']['name'];

//****************************This is the Files size*************************************
	$megabyte = 1073741824;
	$image_1_file_size = $_FILES['image_1']['size'];
	$image_1_file_size = $_FILES['image_2']['size'];
	$image_1_file_size = $_FILES['image_3']['size'];
//****************************This is the Files size*************************************

// ****** Image temp name ************************


$image_1_temp_name = $_FILES['image_1']['tmp_name'];
$image_2_temp_name = $_FILES['image_2']['tmp_name'];
$image_3_temp_name = $_FILES['image_3']['tmp_name'];

//******* Image temp name *************************

//************** image file type (This Will allow you to Detect file type)****************

$image_1_file_type = $_FILES['image_1']['type'];
$image_2_file_type = $_FILES['image_2']['type'];
$image_3_file_type = $_FILES['image_3']['type'];

//********************* image file type ****************

// ***** image extention *************************

$image_1_ext = strtolower(substr($image_1, strpos($image_1, '.')+1));
$image_2_ext = strtolower(substr($image_2, strpos($image_2, '.')+1));
$image_3_ext = strtolower(substr($image_3, strpos($image_3, '.')+1));

//******* Image extention ***************

$required_field = array('product_name','product_name_2','category','subcategory','price','description');
	foreach ($_POST as $key => $value) {
		# code...
		if (empty($value)=== true && in_array($key, $required_field)) {
			# code...
			$errors[] = '<div id="message-red">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="red-left">Error. <a href="">You have to Fill All the form</a></td>
					<td class="red-right"><a class="close-red"><img src="images/table/icon_close_red.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>';

			break 1;
		}
	
}
// Cheking The image file is not Greater Than 5MB 

	if (($image_1_file_size > $megabyte) === true) {
		# code...
		$errors[] = $Admin->error_report('Your Image 1 file should not be  Greater Than 5 MB');
	}
	if (($image_2_file_size > $megabyte) === true) {
		# code...
		$errors[] = $Admin->error_report('Your Image 2 file should not be  Greater Than 5 MB');
	}
	if (($image_3_file_size > $megabyte) === true) {
		# code...
		$errors[] = $Admin->error_report('Your Image 3 file should not be  Greater Than 5 MB');
	}

//Checking the image file is not greater than or not ends******************

//****** MD5 image names because you dont want to see other image as your image *****

//Part One Starts.....................
		 $image_1_md5  = 'product_images/';
		 $image_2_md5  = 'product_images/';
		 $image_3_md5  = 'product_images/'; 

//Part One ENDS........................

// Part two....... STARTS
		 $image_1_md5 .= md5(microtime() + $image_1_temp_name + $image_1);
		 $image_2_md5 .= md5(microtime() + $image_2_temp_name + $image_2);
		 $image_3_md5 .= md5(microtime() + $image_3_temp_name + $image_3);
//Part two ENDS........

// Part Three Starts..................
		 $image_1_md5 .= '.'.$image_1_ext;
		 $image_2_md5 .= '.'.$image_2_ext;
		 $image_3_md5 .= '.'.$image_3_ext;
// Part Three ENDS....................

// ********************* MD5 ends *********************

// Checking file .ext******* STARTS

// part one....................

if ((isset($image_1) === true) && (!empty($image_1) === true)) {
	# code...
	switch ($image_1_ext) {
		
		case 'jpg':
			# code...
			break;
		case 'jpeg':

			break;

		case 'png':

			break;

		case 'gif':

			break;

		default:
			# code...
			$errors_1[] = $Admin->error_report('Your image 1 is not an image');

		break;
	}

	if (empty($errors_1) === true) {
		# code...
		$Admin->update_photo_1($image_1,$image_1_md5,$out_id,$image_1_temp_name);
	}
}

// part Two...............

if ((isset($image_2) === true) && (!empty($image_2) === true) ) {
	# code...
	switch ($image_2_ext) {
		
		case 'jpg':
			# code...
			break;
		
		case 'jpeg':

			break;

		case 'png':

			break;

		case 'gif':

			break;
		default:
			# code...
		$errors_2[] = $Admin->error_report('Your image 2 is not an image');
				
		break;
	}
	if (empty($errors_2) === true) {
		# code...
		$Admin->update_photo_2($image_2,$image_2_md5,$out_id,$image_2_temp_name);
	}
}

if ((isset($image_3) === true) && (!empty($image_3) === true) )  {
	# code...
	switch ($image_3_ext) {
		
		case 'jpeg':
			# code...
			break;
		
		case 'jpg':

			break;

		case 'png':

			break;

		case 'gif':

			break;

		default:
			# code...
		$errors_3[] = $Admin->error_report('Your image 3 is not an image');
		
			break;	
	}
	if (empty($errors_2) === true) {
		# code...
		$Admin->update_photo_3($image_3,$image_3_md5,$out_id,$image_3_temp_name);
	}
}


		if (empty($errors) === true) {
			# code...


		$import_data_array = array(

		'product_name'  	 	=>$product_name,
		'suplier_name' 	 		=>$suplier_name,
		'category' 	 		 	=>$category,
		'sub_category' 			=>$sub_category,
		'price' 				=>$price,
		'description' 			=>$description,
		'quantity'				=>$quantity
		);


			$Admin->edit_data_array($import_data_array,$get_id);

		$General->redirect_to('edit_products.php?pro_id='.$get_id);

		} else {

			echo $General->output_error($errors);
		}

	} // end of isset $_POST['submit']
			

} // End of $_GET[]

?>
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

	<!--  start content-table-inner -->

<!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->

<!--  In THis Comment code block with @@@@@@@@@@@@@@ Icon -->

<!--  Here The main File starts-->
	<div id="content-table-inner">
	
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>
	
	
		<!--  start step-holder -->
		<div id="step-holder">
			<div class="step-no">1</div>
			<div class="step-dark-left"><a href="">Add product details</a></div>
			<div class="step-dark-right">&nbsp;</div>
			<div class="step-no-off">2</div>
			<div class="step-light-left">Select related products</div>
			<div class="step-light-right">&nbsp;</div>
			<div class="step-no-off">3</div>
			<div class="step-light-left">Preview</div>
			<div class="step-light-round">&nbsp;</div>
			<div class="clear"></div>
		</div>
		<!--  end step-holder -->
	
		<!-- start id-form -->
		<form action="" method="POST" enctype="multipart/form-data">

		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>

			<th valign="top">Product name:</th>
			<td><input type="text" class="inp-form" name="product_name" value="<?php echo $out_product_name;?>" /></td>
			<td></td>
		</tr>
		<!-- This is the start Of Error field -->
		<tr>
			<th valign="top">Suplier name:</th>
			<!-- Using php tag i'm tryig to do the JS work in the form  -->
			<!-- there is a class called inp-form-error was here -->
			<td><input type="text" class="inp-form" name="product_name_2" value="<?php echo $out_suplier_name;?>" /></td>
			
			<td>
			</td>
		</tr>
		<!-- This is the End of error field-->
		<tr>
		<th valign="top">Category:</th>
		<td>	
		<select  class="styledselect_form_1" name="category">
		<option value="<?php echo $out_category_name;?>"><?php echo $out_category_name;?></option>
			<!-- I'm geting categoris from Database table name categories -->
			<?php

			foreach ($Admin->get_cat() as $get_Category) {
				# code...
				?>
				<option value="<?php echo $get_Category['cat'];?>"><?php echo $get_Category['cat'];?></option>
				<?php
			}
			?>
		</select>
		</td>
		<td></td>
		</tr>
		<tr>
		<th valign="top">Sub Category:</th>
		<td>	
		<select  class="styledselect_form_1" name="subcategory">
		<option value="<?php echo $out_sub_cat_name;?>"><?php echo $out_sub_cat_name;?></option>
		<?php

			foreach ($Admin->get_sub_cat() as $get_sub_category) {
				# code...
				?>
				<option value="<?php echo $get_sub_category['sub_cat'];?>"><?php echo $get_sub_category['sub_cat'];?></option>
				<?php
			}

		?>

		</select>
		</td>
		<td></td>
		</tr> 
		<tr>
			<th valign="top">Price:</th>
			<td><input type="text" class="inp-form" name="price" value="<?php echo $out_price;?>" />  $</td>
			<td></td>
		</tr>
		<tr>
		
			
		
		</td>
		<td></td>
	</tr>
	<tr>

		<th valign="top">Description:</th>
		<td><textarea rows="" cols="" class="form-textarea" name="description"><?php echo $out_description;?></textarea></td>

		<td></td>
	</tr>

	<tr>
	<br>
	<br>
	<th>Image 1:</th>

	<td><img src="../<?php echo $out_image_1;?>" width="150"></td>
	<td>
<tr>
	<th>Insert New image __ 1:  </th>
	<td><input type="file" class="file_1" name="image_1" ></td>
	<td>
	<div class="bubble-left"></div>
	<div class="bubble-inner">JPEG, GIF 5MB max per image</div>
	<div class="bubble-right"></div>
	</td>
	</tr>
	</td>
	</tr>
	<br>
	<br>
	<tr>
	<th>Image 2:</th>
	<td><img src="../<?php echo $out_image_2;?>" width="150"></td>
	<tr>
	<th>Insert New image __ 2:  </th>
	<td><input type="file" class="file_1" name="image_2" /></td>
	<td>
	<div class="bubble-left"></div>
	<div class="bubble-inner">JPEG, GIF 5MB max per image</div>
	<div class="bubble-right"></div>
	</td>
	</tr>
	</tr>
	<br>
	<br>
	<tr>
	<th>Image 3:</th>
	<td><img src="../<?php echo $out_image_3;?>" width="150"></td>
	<tr>
	<th>Insert New image __ 3:  </th>
	<td><input type="file" class="file_1" name="image_3" /></td>
	<td>
	<div class="bubble-left"></div>
	<div class="bubble-inner">JPEG, GIF 5MB max per image</div>
	<div class="bubble-right"></div>
	</td>
	</tr>
	</tr>
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" value="" class="form-submit" name="submit" />
			<input type="reset" value="" class="form-reset"  />
		</td>
		<td></td>
	</tr>
	</table>
	</form>
	<!-- end id-form  -->

	</td>
	<td>

	<!--  start related-activities -->
	<div id="related-activities">
		
		<!--  start related-act-top -->
		<div id="related-act-top">
		<img src="images/forms/header_related_act.gif" width="271" height="43" alt="" />
		</div>
		<!-- end related-act-top -->
		
		<!--  start related-act-bottom -->
		<div id="related-act-bottom">
		
			

</td>
</tr>
<tr>
<td><img src="images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
<td></td>
</tr>
</table>
 
<div class="clear"></div>
 

</div>
<!--  end content-table-inner  -->
<?php include 'footer.php';
?>