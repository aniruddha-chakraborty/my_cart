<?php
// this varible will Control the nav bar lightout 
$page = 'admin/categories.php';
$sub_page = 'admin/sub/add_cat.php';
 ?>
<?php include 'core/init.php';?>
<?php include 'header.php';?>
<?php $General->logged_out_redirect();?>

<!--  In THis Commet code block with @@@@@@@@@@@@@@ Icon -->
<!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->
<div id="page-heading"><h1>The Full list of Products</h1></div>

<?php

	if (isset($_POST['submit']) === true) {
		# code...
		$category = mysql_real_escape_string(htmlentities($_POST['cat_name']));
		
			if (empty($_POST['cat_name']) === true) {
				# code...
				$errors[] =$Admin->error_report('You can not Empty an Emty term');
			}

			if ( (strlen($category) < 3) && ( strlen($category) > 0) ) {
				# code...
				$errors[] = $Admin->error_report('Your charecter must be higher then');
			}

			if ($Admin->cat_match($category) === true) {
				# code...
				$errors[] = $Admin->error_report('Your category is Already in our database');
			}

		if (empty($errors) === true) {
			# code...
			$Admin->insert_category($category);
			$text = 'The category is succefully Added in our database';
			$add_again_link = 'add_cat.php';
			$add_messege = 'Want to add more into categories?? Click here!!';
			echo $Admin->product_success($text,$add_again_link,$add_messege);

		} else {

			echo $General->output_error($errors);
		}

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

<!--  In THis Commet code block with @@@@@@@@@@@@@@ Icon -->

		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
			

		
		 
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="" method="POST">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
						<tr>

			<th valign="top">Category Name:</th>
			<td><input type="text" class="inp-form" name="cat_name" /></td>
			
			<td>
				<input type="submit" value="" class="form-submit" name="submit" />
			</td>
		</tr>
	</table>
				<!--  end product-table................................... --> 
				</form>
			</div>
			<!--  end content-table  -->
		
			<!--  start actions-box ............................................... -->
			<div id="actions-box">
				<a href="" class="action-slider"></a>
				<div id="actions-box-slider">
					<a href="" class="action-edit">Edit</a>
					<a href="" class="action-delete">Delete</a>
				</div>
				<div class="clear"></div>
			</div>
			<!-- end actions-box........... -->
			
			<!--  start paging..................................................... -->
			<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			<td>
				<a href="" class="page-far-left"></a>
				<a href="" class="page-left"></a>
				<div id="page-info">Page <strong>1</strong> / 15</div>
				<a href="" class="page-right"></a>
				<a href="" class="page-far-right"></a>
			</td>
			<td>
			<select  class="styledselect_pages">
				<option value="">Number of rows</option>
				<option value="">1</option>
				<option value="">2</option>
				<option value="">3</option>
			</select>
			</td>
			</tr>
			</table>
			<!--  end paging................ -->
		<?php include 'footer.php';?>