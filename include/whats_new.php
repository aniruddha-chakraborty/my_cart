<?php

	$sql_lang = mysql_query("SELECT * FROM `products` ORDER BY `date_added` ASC LIMIT 1");
		while ( $new_ro = mysql_fetch_array($sql_lang)) {
			# code...
			?>


      <div class="border_box">
        <div class="product_title"><a href="details.php?pick_id=<?php echo $new_ro['id'];?>"><?php echo  $new_ro['product_name'];?></a></div>
        <div class="product_img"><a href=""><img src="<?php echo $new_ro['image_1'];?>" alt="" border="0" /></a></div>
        <div class="prod_price"><span class="blue">Price:</span> <span class="price"><?php echo $new_ro['price'];?>$</span></div>
      </div>
			<?php
		}

?>
