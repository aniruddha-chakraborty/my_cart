<?php include 'core/init.php';?>
<?php $General->logged_in_redirect();
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Internet Dreams</title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
<!--  jquery core -->
<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!-- Custom jquery scripts -->
<script src="js/jquery/custom_jquery.js" type="text/javascript"></script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>

</head>
<body id="login-bg"> 
 
<!-- Start: login-holder -->
<div id="login-holder">

	<!-- start logo -->
	<div id="logo-login">
		<a href="index.html"><img src="images/shared/logo.png" width="156" height="40" alt="" /></a>

	</div>
	<!-- end logo -->
	
	<div class="clear"></div>
	
	<!--  start loginbox ................................................................................. -->
	<div id="loginbox">
	<div align="center">
	<?php

		if (isset($_POST['submit'])) {
			# code...
			$required_fields = array('uname','pass');
		
		$username = $General->sanitize($_POST['uname']);
		$password = $General->sanitize(md5($_POST['pass']));
			foreach ($_POST as $key => $value) {
				# code...
				if (empty($value) && in_array($key, $required_fields) === true) {
					# code...
					$errors[] = 'All fields are required to submit the form';
					break 1;
				}
			}
		
			if ($Admin->check_uname_pass($username,$password) === false) {
				# code...
					$errors[] = 'your username and pass is wrong';
			}


	if (empty($errors) === true) {
		# code...
// This function is used from Admin Class And used unfortunately used public var($post) in here for showing vab :p
	  $login = $Admin->login($username,$password);

		//session_start();
	  if ($login == false) {
	  	# code...
	   	echo 'nothing';

	  } else {


	  	$_SESSION['user_id'] = $login;

	  	$General->redirect_to('index.php');
	  }
		
	} else {

	echo $General->output_error($errors);

	}
} // This block is for submit check ends

	?></div>
	<!--  start login-inner -->
	<form action="login.php" method="POST">
	<div id="login-inner">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Username</th>
			<td><input type="text"  class="login-inp" name="uname" /></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="password" value="************" name="pass" onfocus="this.value=''" class="login-inp" /></td>
		</tr>
		<tr>
			<th></th>
			<td valign="top"><input type="checkbox" class="checkbox-size" id="login-check" /><label for="login-check">Remember me</label></td>
		</tr>
		<tr>
			<th></th>
			<td><input type="submit"  name="submit" class="submit-login"  /></td>
		</tr>
		</table>
	</div>
	</form>
 	<!--  end login-inner -->
	<div class="clear"></div>
	<a href="" class="forgot-pwd">Forgot Password?</a>
 </div>
 <!--  end loginbox -->
 
	<!--  start forgotbox ................................................................................... -->
	<div id="forgotbox">
		<div id="forgotbox-text">Please send us your email and we'll reset your password.</div>
		<!--  start forgot-inner -->
		<div id="forgot-inner">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Email address:</th>
			<td><input type="text" value=""   class="login-inp" /></td>
		</tr>
		<tr>
			<th> </th>
			<td><input type="button" class="submit-login"  /></td>
		</tr>
		</table>
		</div>
		<!--  end forgot-inner -->
		<div class="clear"></div>
		<a href="" class="back-login">Back to login</a>
	</div>
	<!--  end forgotbox -->

</div>
<!-- End: login-holder -->
</body>
</html>