<?php include 'core/init.php';?>

<?php

// this varible will Control the nav bar lightout 
$page = 'admin/control.php';
$sub_page = 'admin/sub/control_add.php';
 ?>
<?php $General->logged_out_redirect();?>
<?php include 'header.php';?>
<!--  In THis Commet code block with @@@@@@@@@@@@@@ Icon -->

<!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->

<div id="page-heading"><h1>Add product</h1></div>
	
<?php
if (isset($_POST['submit'])) {
	# code...
	$image_1      	= $_FILES['image_1']['name'];
	$image_2      	= $_FILES['image_2']['name'];
	$image_3      	= $_FILES['image_3']['name'];
	$image_4      	= $_FILES['image_3']['name'];
	$image_5      	= $_FILES['image_3']['name'];
	$image_6      	= $_FILES['image_3']['name'];
	$image_7      	= $_FILES['image_3']['name'];
	$image_8      	= $_FILES['image_3']['name'];
	$image_9      	= $_FILES['image_3']['name'];
	$image_10      	= $_FILES['image_3']['name'];
	$image_11     	= $_FILES['image_3']['name'];

//****************************This is the Files size*************************************
	$megabyte = 1073741824;
	$image_1_file_size 	= $_FILES['image_1']['size'];
	$image_2_file_size 	= $_FILES['image_2']['size'];
	$image_3_file_size 	= $_FILES['image_3']['size'];
	$image_4_file_size 	= $_FILES['image_4']['size'];
	$image_5_file_size 	= $_FILES['image_5']['size'];
	$image_6_file_size 	= $_FILES['image_6']['size'];
	$image_7_file_size 	= $_FILES['image_7']['size'];
	$image_8_file_size 	= $_FILES['image_8']['size'];
	$image_9_file_size 	= $_FILES['image_9']['size'];
	$image_10_file_size = $_FILES['image_10']['size'];
	$image_11_file_size = $_FILES['image_11']['size'];



//****************************This is the Files size*************************************

// ****** Image temp name ************************


$image_1_temp_name = $_FILES['image_1']['tmp_name'];
$image_2_temp_name = $_FILES['image_2']['tmp_name'];
$image_3_temp_name = $_FILES['image_3']['tmp_name'];
$image_4_temp_name = $_FILES['image_4']['tmp_name'];
$image_5_temp_name = $_FILES['image_5']['tmp_name'];
$image_6_temp_name = $_FILES['image_6']['tmp_name'];
$image_7_temp_name = $_FILES['image_7']['tmp_name'];
$image_8_temp_name = $_FILES['image_8']['tmp_name'];
$image_9_temp_name = $_FILES['image_9']['tmp_name'];
$image_10_temp_name = $_FILES['image_10']['tmp_name'];
$image_11_temp_name = $_FILES['image_11']['tmp_name'];

//******* Image temp name *************************

//************** image file type (This Will allow you to Detect file type)****************

$image_1_file_type 		= $_FILES['image_1']['type'];
$image_2_file_type 		= $_FILES['image_2']['type'];
$image_3_file_type 		= $_FILES['image_3']['type'];
$image_4_file_type 		= $_FILES['image_4']['type'];
$image_5_file_type 		= $_FILES['image_5']['type'];
$image_6_file_type 		= $_FILES['image_6']['type'];
$image_7_file_type 		= $_FILES['image_7']['type'];
$image_8_file_type 		= $_FILES['image_8']['type'];
$image_9_file_type 		= $_FILES['image_9']['type'];
$image_10_file_type 	= $_FILES['image_10']['type'];
$image_11_file_type 	= $_FILES['image_11']['type'];

//********************* image file type ****************

// ***** image extention *************************

$image_1_ext = strtolower(substr($image_1, strpos($image_1, '.')+1));
$image_2_ext = strtolower(substr($image_2, strpos($image_2, '.')+1));
$image_3_ext = strtolower(substr($image_3, strpos($image_3, '.')+1));
$image_4_ext = strtolower(substr($image_4, strpos($image_4, '.')+1));
$image_5_ext = strtolower(substr($image_5, strpos($image_5, '.')+1));
$image_6_ext = strtolower(substr($image_6, strpos($image_6, '.')+1));
$image_7_ext = strtolower(substr($image_7, strpos($image_7, '.')+1));
$image_8_ext = strtolower(substr($image_8, strpos($image_8, '.')+1));
$image_9_ext = strtolower(substr($image_9, strpos($image_9, '.')+1));
$image_10_ext = strtolower(substr($image_10, strpos($image_10, '.')+1));
$image_11_ext = strtolower(substr($image_11, strpos($image_11, '.')+1));

//******* Image extention ***************






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
<h1>THis is For left Side images</h1>

		<form action="add_products.php" method="POST" enctype="multipart/form-data">

		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">

<!-- THis is for Left side images...... Left Side Image STARTS-->
	
	<tr>
	<th>Index.php</th>
	<td><input type="file" class="file_1" name="image_1" /></td>
	<td>
	<div class="bubble-left"></div>
	<div class="bubble-inner">JPEG, GIF 5MB max per image</div>
	<div class="bubble-right"></div>
	</td>
	</tr>
	<!--THis is another One --> 

	<tr>
	<th>Image 1:</th>
	<td><input type="file" class="file_1" name="image_2" /></td>
	<td>
	<div class="bubble-left"></div>
	<div class="bubble-inner">JPEG, GIF 5MB max per image</div>
	<div class="bubble-right"></div>
	</td>
	</tr>

	<tr>
	<th>Image 1:</th>
	<td><input type="file" class="file_1" name="image_3" /></td>
	<td>
	<div class="bubble-left"></div>
	<div class="bubble-inner">JPEG, GIF 5MB max per image</div>
	<div class="bubble-right"></div>
	</td>
	</tr>

	<tr>
	<th>Image 1:</th>
	<td><input type="file" class="file_1" name="image_4" /></td>
	<td>
	<div class="bubble-left"></div>
	<div class="bubble-inner">JPEG, GIF 5MB max per image</div>
	<div class="bubble-right"></div>
	</td>
	</tr>

	<tr>
	<th>Image 1:</th>
	<td><input type="file" class="file_1" name="image_5" /></td>
	<td>
	<div class="bubble-left"></div>
	<div class="bubble-inner">JPEG, GIF 5MB max per image</div>
	<div class="bubble-right"></div>
	</td>
	</tr>

	<tr>
	<th>Image 1:</th>
	<td><input type="file" class="file_1" name="image_6" /></td>
	<td>
	<div class="bubble-left"></div>
	<div class="bubble-inner">JPEG, GIF 5MB max per image</div>
	<div class="bubble-right"></div>
	</td>
	</tr>

	<tr>
	<th>Image 1:</th>
	<td><input type="file" class="file_1" name="image_7" /></td>
	<td>
	<div class="bubble-left"></div>
	<div class="bubble-inner">JPEG, GIF 5MB max per image</div>
	<div class="bubble-right"></div>
	</td>
	</tr>

	<tr>
	<th>Image 1:</th>
	<td><input type="file" class="file_1" name="image_8" /></td>
	<td>
	<div class="bubble-left"></div>
	<div class="bubble-inner">JPEG, GIF 5MB max per image</div>
	<div class="bubble-right"></div>
	</td>
	</tr>

	<tr>
	<th>Image 1:</th>
	<td><input type="file" class="file_1" name="image_9" /></td>
	<td>
	<div class="bubble-left"></div>
	<div class="bubble-inner">JPEG, GIF 5MB max per image</div>
	<div class="bubble-right"></div>
	</td>
	</tr>

	<tr>
	<th>Image 1:</th>
	<td><input type="file" class="file_1" name="image_10" /></td>
	<td>
	<div class="bubble-left"></div>
	<div class="bubble-inner">JPEG, GIF 5MB max per image</div>
	<div class="bubble-right"></div>
	</td>
	</tr>

	<tr>
	<th>Image 1:</th>
	<td><input type="file" class="file_1" name="image_11" /></td>
	<td>
	<div class="bubble-left"></div>
	<div class="bubble-inner">JPEG, GIF 5MB max per image</div>
	<div class="bubble-right"></div>
	</td>
	</tr>

	<tr>
	<th>Image 1:</th>
	<td><input type="file" class="file_1" name="image_12" /></td>
	<td>
	<div class="bubble-left"></div>
	<div class="bubble-inner">JPEG, GIF 5MB max per image</div>
	<div class="bubble-right"></div>
	</td>
	</tr>
<!-- THis is for Left side images...... Left Side Image ENDS-->

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