<?php $page 	= 'admin/news.php'; ?>
<?php $sub_page = 'admin/sub/message_visit.php';?>
<?php include 'core/init.php';?>
<?php $General->logged_out_redirect();?>

<?php include 'header.php';
$id = $_SESSION['user_id']; // Storing session in var and got This session from login.php page

$sql = $Connection->query("SELECT * FROM `admin` WHERE `id` = $id");

while ($out = mysql_fetch_assoc($sql)) {
	# code...
	$name = $out['username'];
}


// Delete selected item STARTS*****

	if (isset($_GET['del']) === true) {

		$del_id = (int)$_GET['del'];
		$Conversation->delete_msg($del_id);

	}
// Delete selected item ENDS*******

	if (isset($_GET['mark_read']) === true) {
		# code...
		$read_id = (int)$_GET['mark_read'];
		$Conversation->mark_as_read($read_id);
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
<?php 		
if (isset($_GET['page'])) {

echo '<h3>You are at '. (int)$_GET['page'] . ' No. Page</h3>'; 

} else {
	
echo '<h3>You are at '. '<b>1</b>' . ' No. Page</h3>'; 


}
?>
			<br>
			<h2>Welcome to Your Messegebox ..... Mr. <?php echo $name;?></h2>
		<?php

		$count_view = mysql_query("SELECT COUNT(`id`) FROM `messege` WHERE `view` = 0");


		$per_page = 6;
		$pages_query = mysql_query("SELECT COUNT(`id`) FROM `messege`");
	
		$pages = ceil(mysql_result($pages_query,0) / $per_page);

		$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
		$start = ($page - 1) * $per_page;

		

			foreach ($Conversation->fetch_messege($start,$per_page) as $Messegebox) {
				# code...
		$check = "";
      $check  = ($Messegebox['view'] == 0) ? 'Not Checked' : 'Checked' ;

				?>
					<div color="red">
					<hr >
					
					<?php

						echo '<b><h3>'.$Messegebox['name'].'&nbsp;'.'('.$check.')</h3>  ('.$Messegebox['email'].')</b> Say\'s :-'.'<br>'.'<br><a href="read_msg.php?id='.$Messegebox['id'].'">'.$Messegebox['message'].'..............</a>'.'<br>'.'<a href="messege_visit.php?mark_read='.$Messegebox['id'].'" title="Mark as Read" class="icon-5 info-tooltip"></a>'.'----'.'<a href="messege_visit.php?del='.$Messegebox['id'].'" title="Delete" class="icon-2 info-tooltip"></a>';
					?>
					<hr>
					<br>
					<br>
					</div>
				<?php
			}
			
			if ($pages >= 1) {
			# code...
			for ($x=1; $x <= $pages ; $x++) { 
				# code...
				echo '<a href="?page='.$x.'"><b>'.$x.'</b></a>'.'&nbsp;&nbsp;&nbsp;';

			}
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