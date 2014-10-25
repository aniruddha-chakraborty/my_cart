<?php $page = 'admin/indexsd.php'; ?>
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
<div id="page-heading"><h1>Statistics</h1></div>

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
			<h2>Welcome, <?php echo $name;?></h2>
			<h3> Your Sold Statistics Goes Here................... :)</h3>
		<h2>Your Total Earnings <?php $General->total_earn();?> USD</h2>
		

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