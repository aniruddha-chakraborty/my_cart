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
			<h2>Change </h2>
			<h3> What you want To do Today?</h3>


	<?php

	if (isset($_GET['change']) === true) {

				$id = $_GET['change'];

			foreach ($add->fetch_data_by_id($id) as $picked_image) {
				# code...
			echo '<h3>THis image is Used in '.$picked_image['name'].'</h3>';
				echo '<a href="'.$picked_image['site_link'].'"><img src="../'.$picked_image['image'].'" alt="" border="0"  width="'.$picked_image['width'].'" height="'.$picked_image['height'].'"/></a><br>&nbsp;&nbsp;&nbsp;&nbsp;';
			}

		} else {

				$General->redirect_to('control_add.php');
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
<!--  end content-outer........................................................END -->

<?php include 'footer.php';?>
</body>
</html>