<?php
// this varible will Control the nav bar lightout 
$page = 'admin/categories.php';
$sub_page = 'admin/sub/edit_cat.php';
 ?>
<?php include 'core/init.php';?>
<?php include 'header.php';?>
<?php $General->logged_out_redirect();?>
<?php $Admin->redirect_blank();?>

<!--  In THis Commet code block with @@@@@@@@@@@@@@ Icon -->
<!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->
<div id="page-heading"><h1>Edit Sub category</h1></div>


	

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
			
        <?php
				if (isset($_GET['id'])) {
					# code...
						$id  = $_GET['id'];

						$sql_code = $Connection->query("SELECT * FROM `sub_categories` WHERE `id` = $id");

						while ($row = mysql_fetch_assoc($sql_code)) {
							# code...
							 $mew = $row['sub_cat'];
						}
				}


		if (isset($_POST['submit'])) {
			# code...
			$cat = mysql_real_escape_string(htmlentities($_POST['cat_change']));
			
			if (isset($cat) === true) {
				# code...
				$Admin->run_change_sub_cat($cat,$id);
				$General->redirect_to('edit_sub_cat.php?id='.$id);
		
			} else {

				echo $Admin->error_report('How are you?');
			}
		}
				?>
		
		 
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="" method="POST">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				
			<tr>
			<th valign="top"><b>Category</b></th>
			<!-- Using php tag i'm tryig to do the JS work in the form  -->
			<td><input type="text" class="inp-form" name="cat_change" value="<?php echo $mew;?>" />
					<input type="submit" value="" class="form-submit" name="submit" />
			</td>
			
			<td>
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