<?php
// this varible will Control the nav bar lightout 
$page = 'admin/products.php';
$sub_page = 'admin/sub/view_products.php';
 ?>
<?php include 'core/init.php';?>
<?php include 'header.php';?>
<?php $General->logged_out_redirect();?>

<!--  In THis Commet code block with @@@@@@@@@@@@@@ Icon -->
<!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->
<div id="page-heading"><h1>The Full list of Products</h1></div>
<h3><?php 
if (isset($_GET['page'])) {

echo '<h3> You Are at '.(int)$_GET['page'].' No. Page of products</h3>';

} else {

echo '<h3> You Are at 1 No. Page of products</h3>';


}
;?></h3>

<?php

if (isset($_GET['del'])) {
	# code...
	$del_id = $_GET['del'];

	$Admin->del_product($del_id);
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
				<form id="mainform" action="">
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


		$per_page = 5;

		$pages_query = mysql_query("SELECT COUNT(`id`) FROM `products`");
		$pages = ceil(mysql_result($pages_query,0) / $per_page);

		$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
		$start = ($page - 1) * $per_page;


				$sql = mysql_query("SELECT * FROM `products` LIMIT $start , $per_page");
				
					while($read = mysql_fetch_assoc($sql)){

					?>
					<tr class="alternate-row">
					<td><input  type="checkbox"/></td>
					<td><img src="../<?php echo $read['image_1'];?>" width="60"/></td>
					<td><?php echo $read['product_name'];?></td>
					<td><a href=""><?php echo $read['category'];?></a></td>
					<td><?php echo $read['price'];?>$</td>
					<td><?php echo $read['description'];?></td>
					<td class="options-width">
					<a href="edit_products.php?pro_id=<?php echo $read['id'];?>" title="Edit" class="icon-1 info-tooltip"></a>
					<a href="products.php?del=<?php echo $read['id'];?>" title="Delete" class="icon-2 info-tooltip"></a>
					<a href="" title="Star Mark" class="icon-3 info-tooltip"></a>
					<a href="pro_full_des.php?id=<?php echo $read['id'];?>" title="View Full Descrition" class="icon-4 info-tooltip"></a>
			
				<!--	<a href="" title="Sold all" class="icon-5 info-tooltip"></a> -->
			
					</td>
				</tr>
					<?php

					}
		

		?>
				<!--
				
				-->
				</table>
				<!--  end product-table................................... --> 
				</form>
			</div>
			<!--  end content-table  -->
		
			<!--  start actions-box ............................................... -->
			
			<!-- end actions-box........... -->
			
			<!--  start paging..................................................... -->
			<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
	<?php


			if ($pages >= 1) {
			# code...
			for ($x=1; $x <= $pages ; $x++) { 
				# code...
				
				echo '<a href="?page='.$x.'"><b><big hight="50">'.$x.'</big></b></a>&nbsp;&nbsp;&nbsp;';

			}
		}


	?>			</table>
			<!--  end paging................ -->
		<?php include 'footer.php';?>