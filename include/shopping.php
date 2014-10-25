<?php

if (isset($_GET['empty'])) {

		session_destroy();
}
	?>
  <div class="title_box">Shopping cart</div>
<?php
if (isset($_GET['add_to_cart'])) {
	# code...
	$quantity = mysql_query("SELECT `id`,`quantity` FROM `products` WHERE `id` =".$_GET['add_to_cart']."");


		while ($quantity_row = mysql_fetch_assoc($quantity)) {
			# code...

			if ( $quantity_row['quantity'] > $_SESSION['cart_'.$_GET['add_to_cart']] ) {

				$_SESSION['cart_'.$_GET['add_to_cart']] += '1';

			$url = $_SERVER['PHP_SELF'];

				//header('location:'.$url);
		
		} else {

			//header('Location:'.$url);

		}

	}
}

//**********************	/* CArt Showing system is STARTs */

		foreach ($_SESSION as $name => $value) {
			# code...
			if ($value > 0) {
				# code...
				if (substr($name,0,5 ) == 'cart_') {
					# code...
					$id = substr($name, 5, (strlen($name) - 5));

					$get = mysql_query("SELECT * FROM `products` WHERE `id` ="
						.mysql_real_escape_string((int)$id)."");

					while ($get_row = mysql_fetch_assoc($get)) {
						# code...

						$sub = $get_row['price'] * $value;


						
						$main = '<h3><img src="'.$get_row['image_1'].'" alt="" width="35" height="35" border="0" />'.$get_row['product_name'] . ' x ' . $value . ' @ '. $get_row['price'] . '$   = ' 

						.$sub.'$ <a href="'.$url.'?add_to_cart='.$id.'">[+]</a>
						<a href="'.$url.'?remove='.$id.'">[-]</a>
						<a href="'.$url.'?delete='.$id.'">[Delete]</a></h3>
						</br>';
						echo $main;
					}
				}

				$total += $sub;
			}
		}
		$random = "";
			if ($total == 0) {
				# code...
				$random .= '<b>Your cart Is empty</b>';
			} else {

			
				$random .= 'Total'.'<span class="price">:&nbsp;&nbsp;'.$total.'$'.'<br>';
			}
	/* Cart Showing system is END */

	/*  Rmove from  Cart STARTS*/

if (isset($_GET['remove'])) {
		# code...
		$quantity_remove = mysql_query("SELECT `id`,`quantity` FROM `products` WHERE `id` =".$_GET['remove']."");


		while ($quantity_row_remove = mysql_fetch_assoc($quantity_remove)) {
			# code...

			if ( $quantity_row_remove['quantity'] >= $_SESSION['cart_'.$_GET['remove']] ) {

				$_SESSION['cart_'.$_GET['remove']] -= '1';

				header('location:'.$url);
		
		} else {

			header('Location:'.$url);

		}

		}

	}

/* Remove From carts Block ENDS*/

// Delete Data 
	if (isset($_GET['delete'])) {
		# code...
		$_SESSION['cart_'.$_GET['delete']] = '0';

		header('Location:'.$url);

	}
// Unset data
	if ( ($_SESSION['cart_'.$id]) == '0' ){
		# code...
		unset($_SESSION['cart_'.$id]);

		header('Location:'.$url);

	}
/* END OF CArt Functionallity :-)*/

  if (isset($_POST['buy_item'])) {
  	# code...
  	if ($random == '<b>Your cart Is empty</b>') {
  		# code...
  		echo 'You can not Submit Cart with taking any Product ';
  	}
  }
?>
<div class="shopping_cart">
      

        <div class="cart_details">   <br />
        <span class="border_cart"></span>  <?php echo $random;?></span> </div>
        <div class="cart_icon"><a href="?empty=1"><img src="images/shoppingcart.png" alt="" width="35" height="35" border="0" /></a></div>
   
   <form action="cart_submit.php" method="POST">
    <?php

    	if ($random == '<b>Your cart Is empty</b>') {
  		# code...
  		

  	} else {

 
    ?>
    <input type="submit" name="buy_item" value="Buy Item">

<?php
}
?>
    </form>
     
      </div>
     

      <!-- 
<div class="shopping_cart">
        <div class="title_box">Shopping cart</div>

        <div class="cart_details">   <br />
        <span class="border_cart"></span> Total: <span class="price">350$</span> </div>
        <div class="cart_icon"><a href=""><img src="images/shoppingcart.png" alt="" width="35" height="35" border="0" /></a></div>
      </div>
      -->