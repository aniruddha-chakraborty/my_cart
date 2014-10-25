<?php

		$sql_res = mysql_query("SELECT * FROM `products` WHERE `star` = 1 ");

			while ($get_spe = mysql_fetch_array($sql_res)) {
				# code...
				?>


<div class="border_box">
        <div class="product_title"><a href="details.php?pick_id=<?php echo $get_spe['id'];?>"><?php echo $get_spe['product_name'];?></a></div>
        <div class="product_img"><a href=""><img src="<?php echo $get_spe['image_1'];?>" alt="" border="0" /></a></div>
        <div class="prod_price"><span class="blue">Price:</span> <span class="price"><?php echo $get_spe['price'];?></span></div>
      </div>
				<?php
			}
?>