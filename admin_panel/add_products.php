<?php include 'core/init.php';?>

<?php

// this varible will Control the nav bar lightout 
$page = 'admin/products.php';
$sub_page = 'admin/sub/add_products.php';
 ?>
<?php $General->logged_out_redirect();?>
<?php include 'header.php';?>
<!--  In THis Commet code block with @@@@@@@@@@@@@@ Icon -->

<!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->

<div id="page-heading"><h1>Add product</h1></div>
	
<?php
if (isset($_POST['submit'])) {
	# code...
	$product_name   = $General->sanitize($_POST['product_name']);
	$suplier_name   = $General->sanitize($_POST['product_name_2']);
	$category       = $General->sanitize($_POST['category']);
	$sub_category   = $General->sanitize($_POST['subcategory']);
	$price        	= $General->sanitize($_POST['price']);
	$description  	= $General->sanitize($_POST['description']);
	$quantity		= (int)$_POST['quantity'];
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

		if ( (empty($value) === true) && (in_array($key, $required_field) === true) ) {
			# code...
// This Specil error From comes from ex-icon file
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

// Checking image fields are empty or not

	if (empty($image_1) === true) {
		# code...
		$errors[] = $Admin->error_report('Your Image 1 is empty ... You can not Submit without Any form unfilled ');
	}

	if (empty($image_2) === true) {
		# code...
		$errors[] = $Admin->error_report('Your Image 2 is empty ... You can not Submit without Any form unfilled');
	}	
	
	if (empty($image_3) === true) {
		# code...
		$errors[] = $Admin->error_report('Your Image 3 is empty ... You can not Submit without Any form unfilled');

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

//Checking the image file is not greater than or not ends

// Cheking The uploaded file  .ext **********************************

	if (isset($image_1) === true && isset($image_2) === true && isset($image_3) === true) {

// Cheking for image 1...................STARTS
		switch ($image_1_ext) {
			case 'jpg':
				# code...
			//do nothing Cause its ok... :)
				break;
			
			case 'png':
			//do nothing Cause its ok... :)
				break;
			case 'jpeg':
			//do nothing Cause its ok... :)
				break;

			case 'gif':
			//do nothing Cause its ok... :)
				break;
			
			default:
				# code...
			$errors[] = $Admin->error_report('Your file is not an image');

				break;
		}
	//Cheking for image 1.......... ENDS

 //Checking For image 2 ........ STARTS
		switch ($image_2_ext) {
			case 'jpg':
				# code...
			//do nothing Cause its ok... :)
				break;
			
			case 'png':
			//do nothing Cause its ok... :)
				break;
			case 'jpeg':
			//do nothing Cause its ok... :)
				break;

			case 'gif':
			//do nothing Cause its ok... :)
				break;
			
			default:
				# code...
			$errors[] = $Admin->error_report('Your file is not an image');

				break;
		}
// Checking for image 2........ENDS
//Checking For image 3 ........ STARTS
		switch ($image_3_ext) {
			case 'jpg':
				# code...
			//do nothing Cause its ok... :)
				break;
			
			case 'png':
			//do nothing Cause its ok... :)
				break;
			case 'jpeg':
			//do nothing Cause its ok... :)
				break;

			case 'gif':
			//do nothing Cause its ok... :)
				break;
			
			default:
				# code...
			$errors[] = $Admin->error_report('Your file is not an image');

				break;
		}
			

	}
//Cheking the upoaded file .ext ends***************************


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

//The Final block............ Which will execute The Full 


	if (empty($errors) === true && empty($_POST) === false) {
		# code...

		$import_data_array = array(

		'product_name'  	 	=>$product_name,
		'suplier_name' 	 		=>$suplier_name,
		'category' 	 		 	=>$category,
		'sub_category' 			=>$sub_category,
		'price' 				=>$price,
		'description' 			=>$description,
		'image_1'				=>$image_1_md5,
		'image_2'				=>$image_2_md5,
		'image_3'				=>$image_3_md5,
		'quantity'				=>$quantity,
		);

	
		 $transfer_data = $Admin->import_data_array($import_data_array,$image_1_temp_name,$image_2_temp_name,$image_3_temp_name);


		 	if ($transfer_data === true) {


		 		$text_1 			= 'Your product added successfully';
		 		$add_again_link		= 'add_products.php';
		 		$add_messege 		= '   Want to Add more Products Click Here!!';
		 	echo	$Admin->product_success($text_1,$add_again_link,$add_messege);
		 	}

 // end of transfer data === true statement


	} else {

		echo $General->output_error($errors);

	}


/*
*	Here all the error messege per Box wil start
*/	

}

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
		<form action="add_products.php" method="POST" enctype="multipart/form-data">

		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>

			<th valign="top">Product name:</th>
			<td><input type="text" class="inp-form" name="product_name" /></td>
			<td></td>
		</tr>
		<!-- This is the start Of Error field product_name_2 -->
		<tr>
		<th valign="top">Suplier:</th>
		<td>	
		<select  class="styledselect_form_1" name="product_name_2">
			<!-- I'm geting categoris from Database table name categories -->
			<?php

			foreach ($Admin->get_sup() as $get_sup) {
				# code...
				?>
				<option value="<?php echo $get_sup['name'];?>"><?php echo $get_sup['name'];?></option>
				<?php
			}
			?>
		</select>
		</td>
		<td></td>
		</tr>		<!-- This is the End of error field-->
		<tr>
		<th valign="top">Category:</th>
		<td>	
		<select  class="styledselect_form_1" name="category">
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
			<td><input type="text" class="inp-form" name="price" />  $</td>
			<td></td>
		</tr>
		<tr>
		</td>
		<tr>
			<th valign="top">Quantity:</th>
			<td><input type="text" class="inp-form" name="quantity" /></td>
			<td></td>
		</tr>
		<td></td>
	</tr>
	<tr>

		<th valign="top">Description:</th>
		<td><textarea rows="" cols="" class="form-textarea" name="description"></textarea></td>

		<td></td>
	</tr>
	<tr>
	<th>Image 1:</th>
	<td><input type="file" class="file_1" name="image_1" /></td>
	<td>
	<div class="bubble-left"></div>
	<div class="bubble-inner">JPEG, GIF 5MB max per image</div>
	<div class="bubble-right"></div>
	</td>
	</tr>
	<tr>
	<th>Image 2:</th>
	<td>  <input type="file" class="file_1" name="image_2" /></td>
	<td><div class="bubble-left"></div>
	<div class="bubble-inner">JPEG, GIF 5MB max per image</div>
	<div class="bubble-right"></div></td>
	</tr>
	<tr>
	<th>Image 3:</th>
	<td><input type="file" class="file_1" name="image_3" /></td>
	<td><div class="bubble-left"></div>
	<div class="bubble-inner">JPEG, GIF 5MB max per image</div>
	<div class="bubble-right"></div></td>
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
		
			<!--  start related-act-inner -->
			<div id="related-act-inner">
			
				<div class="left"><a href=""><img src="images/forms/icon_plus.gif" width="21" height="21" alt="" /></a></div>
				<div class="right">
					<h5>Add another product</h5>
					Lorem ipsum dolor sit amet consectetur
					adipisicing elitsed do eiusmod tempor.
					<ul class="greyarrow">
						<li><a href="">Click here to visit</a></li> 
						<li><a href="">Click here to visit</a> </li>
					</ul>
				</div>
				
				<div class="clear"></div>
				<div class="lines-dotted-short"></div>
				
				<div class="left"><a href=""><img src="images/forms/icon_minus.gif" width="21" height="21" alt="" /></a></div>
				<div class="right">
					<h5>Delete products</h5>
					Lorem ipsum dolor sit amet consectetur
					adipisicing elitsed do eiusmod tempor.
					<ul class="greyarrow">
						<li><a href="">Click here to visit</a></li> 
						<li><a href="">Click here to visit</a> </li>
					</ul>
				</div>
				
				<div class="clear"></div>
				<div class="lines-dotted-short"></div>
				
				<div class="left"><a href=""><img src="images/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
				<div class="right">
					<h5>Edit categories</h5>
					Lorem ipsum dolor sit amet consectetur
					adipisicing elitsed do eiusmod tempor.
					<ul class="greyarrow">
						<li><a href="">Click here to visit</a></li> 
						<li><a href="">Click here to visit</a> </li>
					</ul>
				</div>
				<div class="clear"></div>
				
			</div>
			<!-- end related-act-inner -->
			<div class="clear"></div>
		
		</div>
		<!-- end related-act-bottom -->
	
	</div>
	<!-- end related-activities -->

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
<?php include 'footer.php';?>