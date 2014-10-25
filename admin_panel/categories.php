<?php
// this varible will Control the nav bar lightout 
$page = 'admin/categories.php';
$sub_page = 'admin/sub/cat_list.php';
 ?>
<?php include 'core/init.php';?>
<?php include 'header.php';?>
<!--  In THis Commet code block with @@@@@@@@@@@@@@ Icon -->
<!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->
<div id="page-heading"><h1>Category</h1></div>


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
				<!--This is main form -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Serial number</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Categories</a></th>

					<th class="table-header-options line-left"><a href="">Options</a></th>
				</tr>
				
				<?php

				$sql = mysql_query("SELECT * FROM `categories`");
			
					while($read = mysql_fetch_assoc($sql)){

				
					?>
					<tr class="alternate-row">
					<td><input  type="checkbox"/></td>
					<td><b><?php echo $read['id'];?></b></td>
					<td><?php echo $read['cat'];?></td>

					<td class="options-width">
					<a href="edit_cat.php?id=<?php echo $read['id'];?>" title="Edit" class="icon-1 info-tooltip"></a>
					<a href="" title="Delete" class="icon-2 info-tooltip"></a>
					</td>
				</tr>
					<?php
				
					}
		

		?>
		<!-- This is a subcategory From-->
		<b></b>
		<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Serial number</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Category</a></th>

					<th class="table-header-options line-left"><a href="">Options</a></th>
				</tr>
				
				<?php

				$sql_2 = mysql_query("SELECT * FROM `sub_categories`");
			
					while($read_2 = mysql_fetch_assoc($sql_2)){

						
					?>
					<tr class="alternate-row">
					<td><input  type="checkbox"/></td>
					<td><b><?php echo $read_2['id'];?></b></td>
					<td><?php echo $read_2['sub_cat'];?></td>

					<td class="options-width">
					<a href="edit_sub_cat.php?id=<?php echo $read_2['id'];?>" title="Edit" class="icon-1 info-tooltip"></a>
					<a href="" title="Delete" class="icon-2 info-tooltip"></a>
					</td>
				</tr>
					<?php
				
					}
		?>
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