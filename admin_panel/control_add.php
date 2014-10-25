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
			<h2>Mr. <?php echo $name;?> This is Your Advertizement Control settings </h2>

			<?php

		$per_page = 5;

		$pages_query = mysql_query("SELECT COUNT(`id`) FROM `products`");
		$pages = ceil(mysql_result($pages_query,0) / $per_page);

		$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
		$start = ($page - 1) * $per_page;
		

				foreach ($add->Image_advertise($start,$per_page) as $addvertise) {
							# code...

						echo '<h3>'.$addvertise['name'] . '</h3><br>' . '<a href="'.$addvertise['site_link'].'"><img src="../'.$addvertise['image'].'" alt="" border="0"  width="'.$addvertise['width'].'" height="'.$addvertise['height'].'"/></a><br>&nbsp;&nbsp;&nbsp;&nbsp;<a href="change_add.php?change='.$addvertise['id'].'">Change</a><br><hr>';

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
		<?php


			if ($pages >= 1) {
			# code...
				

			for ($x=1; $x <= $pages ; $x++) { 
				# code...
				echo '&nbsp;&nbsp;&nbsp;<a href="?page='.$x.'"><b><big hight="50">'.$x.'</big></b></a>&nbsp;&nbsp;&nbsp;';

			}

			
		}


	?>	
	<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->

<?php include 'footer.php';?>
</body>
</html>