
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Internet Dreams</title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css" />
<![endif]-->

<!--  jquery core -->
<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>
 
<!--  checkbox styling script -->
<script src="js/jquery/ui.core.js" type="text/javascript"></script>
<script src="js/jquery/ui.checkbox.js" type="text/javascript"></script>
<script src="js/jquery/jquery.bind.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	$('input').checkBox();
	$('#toggle-all').click(function(){
 	$('#toggle-all').toggleClass('toggle-checked');
	$('#mainform input[type=checkbox]').checkBox('toggle');
	return false;
	});
});
</script>  


<![if !IE 7]>

<!--  styled select box script version 1 -->
<script src="js/jquery/jquery.selectbox-0.5.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect').selectbox({ inputClass: "selectbox_styled" });
});
</script>
 

<![endif]>


<!--  styled select box script version 2 --> 
<script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
	$('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
});
</script>

<!--  styled select box script version 3 --> 
<script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
});
</script>

<!--  styled file upload script --> 
<script src="js/jquery/jquery.filestyle.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
$(function() {
	$("input.file_1").filestyle({ 
	image: "images/forms/upload_file.gif",
	imageheight : 29,
	imagewidth : 78,
	width : 300
	});
});
</script>

<!-- Custom jquery scripts -->
<script src="js/jquery/custom_jquery.js" type="text/javascript"></script>
 
<!-- Tooltips -->
<script src="js/jquery/jquery.tooltip.js" type="text/javascript"></script>
<script src="js/jquery/jquery.dimensions.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('a.info-tooltip ').tooltip({
		track: true,
		delay: 0,
		fixPNG: true, 
		showURL: false,
		showBody: " - ",
		top: -35,
		left: 5
	});
});
</script> 

<!--  date picker script -->
<link rel="stylesheet" href="css/datePicker.css" type="text/css" />
<script src="js/jquery/date.js" type="text/javascript"></script>
<script src="js/jquery/jquery.datePicker.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
        $(function()
{

// initialise the "Select date" link
$('#date-pick')
	.datePicker(
		// associate the link with a date picker
		{
			createButton:false,
			startDate:'01/01/2005',
			endDate:'31/12/2020'
		}
	).bind(
		// when the link is clicked display the date picker
		'click',
		function()
		{
			updateSelects($(this).dpGetSelected()[0]);
			$(this).dpDisplay();
			return false;
		}
	).bind(
		// when a date is selected update the SELECTs
		'dateSelected',
		function(e, selectedDate, $td, state)
		{
			updateSelects(selectedDate);
		}
	).bind(
		'dpClosed',
		function(e, selected)
		{
			updateSelects(selected[0]);
		}
	);
	
var updateSelects = function (selectedDate)
{
	var selectedDate = new Date(selectedDate);
	$('#d option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
	$('#m option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
	$('#y option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
}
// listen for when the selects are changed and update the picker
$('#d, #m, #y')
	.bind(
		'change',
		function()
		{
			var d = new Date(
						$('#y').val(),
						$('#m').val()-1,
						$('#d').val()
					);
			$('#date-pick').dpSetSelected(d.asString());
		}
	);

// default the position of the selects to today
var today = new Date();
updateSelects(today.getTime());

// and update the datePicker to reflect it...
$('#d').trigger('change');
});
</script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
</head>
<body> 
<!-- Start: page-top-outer -->
<div id="page-top-outer">    

<!-- Start: page-top -->
<div id="page-top">

	<!-- start logo -->
	<div id="logo">
	<a href=""><img src="images/shared/logo.png" width="156" height="40" alt="" /></a>
	</div>
	<!-- end logo -->
	
	<!--  start top-search -->
	<form action="index.php" method="POST">
	<div id="top-search">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
		<td><input type="text" onblur="if (this.value=='') { this.value='Search'; }" onfocus="if (this.value=='Search') { this.value=''; }" class="top-search-inp" name="keyword" ></td>
		<td>
		 
	
		 
		</td>
		<td>
		<input type="submit" src="images/shared/top_search_btn.gif"  name="submit_search" value="search" />
		</td>
		</tr>
		</table>
	</div>
	</form>
 	<!--  end top-search -->
 	<div class="clear"></div>

</div>
<!-- End: page-top -->

</div>
<!-- End: page-top-outer -->
	
<div class="clear">&nbsp;</div>
 
<!--  start nav-outer-repeat................................................................................................. START -->
<div class="nav-outer-repeat"> 
<!--  start nav-outer -->
<div class="nav-outer"> 

		<!-- start nav-right -->
		<div id="nav-right">
		
			<div class="nav-divider">&nbsp;</div>
			<div class="showhide-account"><img src="images/shared/nav/nav_myaccount.gif" width="93" height="14" alt="" /></div>
			<div class="nav-divider">&nbsp;</div>
			<a href="log_out.php" id="logout"><img src="images/shared/nav/nav_logout.gif" width="64" height="14" alt=""/></a>
			<div class="clear">&nbsp;</div>
		
		<?php

		$new_msg = "";
		$number = $Conversation->num_of_msg();
			if ($number === 0) {
				# code...	
				$new_msg .= '0';

			} else {

				$new_msg .= $number;
			}

		$new_order = "";
		$number_order = $Conversation->num_of_order();

			if ($number_order === 0) {
				# code...
				$new_order .= '0';
			} else {

				$new_order .= $number_order;
			}

		$new_com = "";
		$number_of_comments = $Conversation->num_of_com();

			if ($number_comments === 0) {
				# code...
				$new_com .= '0';
			} else {

				$new_com .= $number_of_comments;
			}
		?>
			<!--  start account-content -->	
			<div class="account-content">
			<div class="account-drop-inner">
				<a href="settings.php" id="acc-settings">Settings</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="order.php" id="acc-details">Ordered Products(<?php echo $number_order;?>)</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="control_comments.php" id="acc-project">Comments(<?php echo $new_com;?>)</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="messege_visit.php" id="acc-inbox">Inbox (<?php  echo $new_msg;?>)</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="statistics.php" id="acc-stats">Statistics</a> 
			</div>
			</div>
			<!--  end account-content -->
		
		</div>
		<!-- end nav-right -->


		<!--  start nav -->
		<div class="nav">
		<div class="table">
		
		<ul class="<?php if ($page == 'admin/index.php') { echo 'current'; } else { echo 'select';}?>"><li><a href="index.php"><b>Home</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<!-- 
		<div class="select_sub">
			<ul class="sub">
				<li><a href="#nogo">Dashboard Details 1</a></li>
				<li><a href="#nogo">Dashboard Details 2</a></li>
				<li><a href="#nogo">Dashboard Details 3</a></li>
			</ul>
		</div>
		-->
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		                    
		<ul class="<?php if ($page == 'admin/products.php') { echo 'current'; } else { echo 'select';}?>"><li><a href="products.php"><b>Products</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub show">
			<ul class="sub">
				<li class="<?php if ($sub_page == 'admin/sub/view_products.php') { echo 'sub_show';} ?>"><a href="products.php">View all products</a></li>
				<li class="<?php if ($sub_page == 'admin/sub/add_products.php') { echo 'sub_show';} ?>"><a href="add_products.php">Add product</a></li>
				<li class="<?php if ($sub_page == 'admin/sub/edit_products.php') { echo 'sub_show';} ?>"><a href="edit_products.php">Edit products</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="<?php if ($page == 'admin/categories.php') { echo 'current'; } else { echo 'select';}?>"><a href="categories.php"><b>Categories</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub show">
			<ul class="sub">
				<li class="<?php if ($sub_page == 'admin/sub/cat_list.php') { echo 'sub_show';} ?>"><a href="categories.php">Categories List</a></li>
				<li class="<?php if ($sub_page == 'admin/sub/edit_cat.php') { echo 'sub_show';} ?>"><a href="edit_cat.php">Edit Categories</a></li>
				<li class="<?php if ($sub_page == 'admin/sub/add_cat.php') { echo 'sub_show';} ?>"><a href="add_cat.php">Add Categories</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="<?php if ($page == 'admin/clients_sold.php') { echo 'current'; } else { echo 'select';}?>"><a href="clients_sold.php"><b>Clients</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub show">
			<ul class="sub">
				<li class="<?php if ($sub_page == 'admin/sub/sold_pro.php') { echo 'sub_show';} ?>"><a href="clients_sold.php">Sold Products</a></li>
				<li class="<?php if ($sub_page == 'admin/sub/order.php') { echo 'sub_show';} ?>"><a href="order.php">Order by Client</a></li>
				<li class="<?php if ($sub_page == 'admin/sub/app_order.php') { echo 'sub_show';} ?>"><a href="app_order.php">Aprooved Order</a></li>
				<li><a href="#nogo">Product Popularity</a></li>
				<li class="<?php if ($sub_page == 'admin/sub/reported.php') { echo 'sub_show';} ?>"><a href="reported.php">Reported Product By User</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="<?php if ($page == 'admin/news.php') { echo 'current'; } else { echo 'select';}?>"><li class=""><a href="messege_visit.php"><b>News</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub show">
			<ul class="sub">
			<li class="<?php if ($sub_page == 'admin/sub/message_visit.php') { echo 'sub_show';} ?>"><a href="messege_visit.php">Messege From visitor</a></li>
				<li><a href="#nogo">Messege From Clients</a></li>
				<li><a href="#nogo">Check Mail</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>

		<ul class="<?php if ($page == 'admin/control.php') { echo 'current'; } else { echo 'select';}?>"><li><a href="control_slider.php"><b>Control</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub show">
			<ul class="sub">
				<li class="<?php if ($sub_page == 'admin/sub/control_slider.php') { echo 'sub_show';}?>"><a href="control_slider.php">Control Slide image</a></li>
				<li class="<?php if ($sub_page == 'admin/sub/control_add.php') { echo 'sub_show';}?>"><a href="control_add.php">Control Advertisement</a></li>
				<li class="<?php if ($sub_page == 'admin/sub/control_comments.php') { echo 'sub_show';}?>"><a href="control_comments.php">Approve Comments</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="clear"></div>
		</div>
		<div class="clear"></div>
		</div>
		<!--  start nav -->

</div>
<div class="clear"></div>
<!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->
 
 <div class="clear"></div>
 
<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">

