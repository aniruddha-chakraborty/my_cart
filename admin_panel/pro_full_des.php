<?php $page = 'admin/index.php'; ?>
<?php include 'core/init.php';?>
<?php $General->logged_out_redirect();?>
<?php include 'header.php';
$id = $_SESSION['user_id']; // Storing session in var and got This session from login.php page

$sql = $Connection->query("SELECT * FROM `admin` WHERE `id` = $id");

if (isset($_GET['id'])) {
	# code...
	$id = $_GET['id'];
}

$sql = mysql_query("SELECT * FROM `products` WHERE `id` = $id");
	
	while ($fix = mysql_fetch_assoc($sql)) {
		# code...

	$product_name 		= $fix['product_name'];
	$product_price 		= $fix['price'];
	$product_suplier 	= $fix['suplier_name'];
	$product_category 	= $fix['category'];
	$product_sub_cat 	= $fix['sub_category'];
	$product_descrip 	= $fix['description'];
	$pro_image_1 		= $fix['image_1'];
	$pro_image_2 		= $fix['image_2'];
	$pro_image_3		= $fix['image_3'];

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
			

			<label><b>Product Name:</b>&nbsp;&nbsp; <?php echo $product_name;?></label>
			<br>
			<br>
			<label><b>Product Price:</b>&nbsp;&nbsp; <?php echo $product_price;?>$</label>
			<br>
			<br>
			<label><b>Suplier name:</b>&nbsp;&nbsp; <?php echo $product_suplier;?></label>
			<br>
			<br>
			<label><b>Category:</b>&nbsp;&nbsp; <?php echo $product_category;?></label>
			<br>
			<br>
			<label><b>Sub-Category:</b>&nbsp;&nbsp; <?php echo $product_sub_cat;?></label>
			<br>
			<br>
			<label><b>Description</b>&nbsp;&nbsp; <br></label>
			<!--here  description--> 
			<?php echo $product_descrip;?>
			<br>
			<br>
			<label><b>image 1</b>&nbsp;&nbsp;</label>
			<br>
			<br>
			<img src="../<?php echo $pro_image_1;?>" width="250">
			<br>
			<br>
			<label><b>Image 2</b>&nbsp;&nbsp;</label>
			<br>
			<br>
			<br>
			<img src="../<?php echo $pro_image_2;?>" width="250">
			<br>
			<br>	
			<label><b>Image 3</b>&nbsp;&nbsp;</label>
			<br>
			<br>
			<img src="../<?php echo $pro_image_3;?>" width="250">
			
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