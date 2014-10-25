<?php
require_once 'admin_panel/core/function/admin.php';


/**
*  This Class is Dedicated For Users In This Class I will Creat methods only for Users
*/
Class Users Extends General{

//This Function inserdata into users table :-)
	public function register_array($register_array){


	$fields = '`'.implode('`,`', array_keys($register_array)).'`';

	$data = '\''.implode('\', \'', $register_array) . '\'';

		 $this->query("INSERT INTO `users`($fields) VALUES ($data)");

		 return true;
	}

//This function will Check the Email is Exist or not :-)
	public function check_mail($email) {


		return (mysql_result($this->query("SELECT COUNT(`id`) FROM `users` WHERE `email` = '$email'"), 0) ? true: false);

	}
//This function will check into Database and looks for email that enterd is in the database or not 
	public function check_newsletter($email){

		return (mysql_result($this->query("SELECT COUNT(`id`) FROM `newsletter` WHERE `email` = '$email'"), 0) == 1) ? true: false;

	}

	public function register_newsletter($news_email){

		$sql = $this->query("INSERT INTO `newsletter` SET `email` = '$news_email'");

			if ($sql === true) {

				return true;

			} else {

				return false;
			}
	}

	public function take_products($start,$per_page){

		$return_row = array();

		$sql = $this->query("SELECT * FROM `products` ORDER BY `time` LIMIT $start , $per_page");
	
			while ($row = mysql_fetch_assoc($sql)) {
				# code...
			$return_row[] = $row;
		}

		return $return_row;
	}

	public function search($keywords){

	  $returned_results = array();
	  $where = "";		

	  $keywords = preg_split('/[\s]+/', $keywords);

	  $total_keywords = count($keywords);
			
			foreach ($keywords as $key => $keyword) {
				# code...
				$where .= "`product_name` LIKE '%$keyword%'";
				if ($key != ($total_keywords - 1 )) {
					# code...
					$where .= "AND";
				}
			}

	 $results 		= $this->query("SELECT * FROM `products` WHERE $where");
	 $results_num 	= ($results) ? mysql_num_rows($results) : 0;
	
	 	if ($results_num == 0) {
	 		# code...
	 		return false;
	 	
	 	} else {

	 			while ($fetch_row = mysql_fetch_assoc($results)) {
	 				# code...
	 				$returned_results[] = array(

	 						'id' 				=> $fetch_row['id'],
	 						'product_name' 		=> $fetch_row['product_name'],
	 						'suplier_name' 		=> $fetch_row['suplier_name'],
	 						'category' 			=> $fetch_row['category'],
	 						'subcategory' 		=> $fetch_row['price'],
	 						'description'  		=> $fetch_row['description'],
	 						'image_1' 			=> $fetch_row['image_1']

	 					);
	 			}

	 		return $returned_results;
	 		// I was Working here ... :-)
	 	}

	}

	public function kick_out(){

		if (!isset($_GET['pick_id']) === true) {
		# code...
		$this->redirect_to('index.php');
	}

}

	public function hit_count_products($id){

			$sql = $this->query("SELECT `popularity` FROM `products` WHERE `id` = '$id'");

				while ($row = mysql_fetch_assoc($sql)) {
					# code...
					$count = $row['popularity'];
				}

			$count_inc = $count+1;

		 $this->query("UPDATE `products` SET `popularity` = '$count_inc' WHERE `id` = '$id'");
	
	}

	public function get_product_for_index(){

			$get_pro_for_in = array();

			$sql = $this->query("SELECT * FROM `products` ORDER BY `date_added` DESC LIMIT 6");

		while ($row = mysql_fetch_array($sql)) {
			# code...

				$get_pro_for_in[] = $row;

		}
		return $get_pro_for_in;
	}
//this is used to get remoanded pro.....
	public function get_list_for_recommanded_pro(){

		$get_list_for_recommanded_pro = array();

		$sql = $this->query("SELECT * FROM `products` ORDER BY `popularity` DESC LIMIT 3");
	
			while ( $row = mysql_fetch_array($sql)) {
				# code...

				$get_list_for_recommanded_pro[] = $row;

			}

		return $get_list_for_recommanded_pro;
	}

// Redirect People from search page
	public function public_search_page_protect(){


			if (!isset($_POST['submit_search'])) {
				# code...
				$this->redirect_to('index.php');
			}
	}

//This messege will not be sent Throw mail() function ...........
	public function submit_action($con_name,$con_mail,$con_msg){


		$sql = $this->query("INSERT INTO `messege`(`name`,`email`,`message`) VALUES('$con_name','$con_mail','$con_msg')");
		
			if ($sql) {
					# code...
				return true;

			} else {

				return false;
			}

	}

//This Function is used to Submit report.....................

	public function submit_report($con_name,$con_mail,$con_msg,$id){

			  	$this->query("INSERT INTO report(`name`,`email`,`messege`,`pro_id`) VALUES('$con_name','$con_mail','$con_msg','$id')");

	}

	public function redirect_not_get(){


		if (empty($_GET['report_pro']) === true) {
			# code...
			$this->redirect_to('index.php');
		}
	}
	
	public function insert_buy_pro($sql){

		$this->query($sql);

	}

// Kick out Users(who want to access into This page with out Buying anything ............. )
	// Cause It's ridiculous to give him a Congratulation message..... if he didn't Buy anything :/
	public function kick_pro_suc(){

		if (empty($_GET['order_success'])) {

			$this->redirect_to('index.php');
		}
	}


	public function user_cart_submit(){


            //**********************  /* CArt Showing system is STARTs */


		foreach ($_SESSION as $name_2 => $value_2) {
			# code...

			if ($value_2 > 0) {
				# code...
				if (substr($name_2,0, 5) == 'cart_') {
					# code...

					$id = substr($name_2, 5, (strlen($name_2) - 5));

					$get_2 = mysql_query("SELECT * FROM `products` WHERE `id` =".mysql_real_escape_string((int)$id)."");

					  while ($get_row_2 = mysql_fetch_assoc($get_2)) {
            				# code...

            $sub_2 = $get_row_2['price'] * $value_2;


            
            $main_2 = '<h3><img src="'.$get_row_2['image_1'].'" alt="" width="80" height="100" border="0" />'.'<br>'.$get_row_2['product_name'] . ' x ' . $value_2 . ' @ <span class="blue">'.$get_row_2['price'].'$ &nbsp;&nbsp;&nbsp; =&nbsp;&nbsp;&nbsp;'.$sub_2.'$</span> </h3>
            </br>';
            echo $main_2;




          
//id,product_id's,name,email,address,total

          }


				}
		$total_2 += $sub_2;
			}



		}
		 $random_2 = "";
      if ($total_2 == 0) {
        # code...
        $random_2 .= '<b><span class="price">Your cart Is empty</b>';
      } else {

      
        $random_2 .= '  <div class="prod_price_big"><span class="blue">Price: &nbsp;</span> <span class="price">'.$total_2.'$</span></div>';

       
      }
      echo $random_2;

  /* Cart Showing system is END */



	}
	
	public function show_comments($start,$per_page){

		$array = array();
		$sql = $this->query("SELECT * FROM `comments` WHERE `approve` = 1 ORDER BY `time` DESC LIMIT $start,$per_page");

			while ($loop = mysql_fetch_array($sql)) {
				# code...
				$array[] = $loop;
			}
		return $array;
	}

	public function report_product($con_name,$con_mail,$con_msg,$con_mob){

		$sql = $this->query("INSERT INTO `order_pro`(`pro_id`,``)");

	}


} // End OF Users Class

?>