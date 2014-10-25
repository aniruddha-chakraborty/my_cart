<?php
/*
* Created by Aniruddha Chakrabory
*/
include 'connect.php';

Class General Extends connection_admin {

public $output_error;
//This function will output error and it will be used in everywhere
	public function output_error($errors){

		return '<ul>'.implode('</li><li>', $errors).'</li></ul>';

	}
//This function will sanitize data without removing the whitespace
	public function sanitize($data){

		return mysql_real_escape_string(htmlentities($data));

	}
//This function will sanitize data by removing whitespace
	public function ex_sanitize($data){

		return mysql_real_escape_string(htmlentities(trim($data)));

	}
//This function required a string to redurect page
	public function redirect_to($string){

		header('Location:' .$string);
	}


	public function logged_in(){

		if (isset($_SESSION['id'])) {
			# code...
			return true;

		} else {

			return false;
		}
	
	}

// This function will kickout the if He is not logged in
	public function logged_out_redirect(){

		
		if (!isset($_SESSION['user_id'])) {
			# code...
			header('Location: login.php');
		}


	}
// THis function will kickout logged_in admin from Login page
	public function logged_in_redirect(){

		if (isset($_SESSION['user_id'])) {
		 	# code...
		 	header('Location: index.php');
		 } 
	}

		function formatSizeUnits($file_size){


        if ($file_size >= 1073741824){

        	 echo   $file_size = number_format($file_size / 1073741824, 2) . ' GB';
        	}
        
        elseif ($file_size >= 1048576) {
        
          echo  $file_size = number_format($file_size / 1048576, 2) . ' MB';
        
        	}

        elseif ($file_size >= 1024) {
           
           echo   $file_size = number_format($file_size / 1024, 2) . ' KB';
        
        	}

        elseif ($file_size > 1){

          echo  $file_size = $file_size . ' bytes';
        
        }
        
        elseif ($file_size == 1){

           echo $file_size = $file_size . ' byte';
        
        } else {
        
           echo $file_size = '0 bytes';
        
        }

        
}

//This Function will sanitize array Its a DESC function of $this-sanitize();

	public function array_sanitize($array){

			return htmlentities(mysql_real_escape_string($array));

		}

	public function email_for_reply($to,$subject,$message){

	mail($to, $subject, $message,'From: tool_shop.com');

}

	public function total_earn(){

		$sql = $this->query("SELECT `total` FROM `balance`");
				
			$balance = mysql_fetch_assoc($sql);	

				$balance = (int)$balance['total'];
	
				$balance_2 = $balance- 9;
				echo $balance_2;
	}

}

/*
* This Class Requires a huge amount of public function and Protected function only For Admin
*/

Class Admin Extends General {

public $pro_id;
public $pro_count;
public $pro_name;
public $pro_email;
public $pro_address;
public $pro_mobile;
public $pro_total;




	public function check_uname_pass($username,$password){

		 return (mysql_result($this->query("SELECT COUNT(`id`) FROM `admin` WHERE `username` = '$username' AND `password` = '$password'") ,0) == '1') ? true : false;

	}
	
	public function pick_id($username){

	$get = $this->query("SELECT * FROM `admin` WHERE `username` = '$username'");
	
			while($show = mysql_fetch_array($get)){

				return $show['id'];
		}
		
}

	public function login($username,$password){

		$user_id = $this->pick_id($username);

		$username = $this->sanitize($username);

		$password = $password;

		return (mysql_result($this->query("SELECT COUNT(`id`) FROM `admin` WHERE `username` = '$username' AND `password` = '$password'") , 0) == 1) ? $user_id : mysql_error();

	}

	public function get_cat($id=NULL){
		$categories = array(); // This var is taken to return a array value by this function 
		$sql = $this->query("SELECT * FROM `categories`");

		while ($row = mysql_fetch_array($sql)) {
			# code...

			  $categories[] = $row;
		}

		return $categories;
	}

	public function get_sub_cat(){
		$sub_category = array();
		$sql = $this->query("SELECT * FROM `sub_categories`");


			while ($sub_row = mysql_fetch_array($sql)) {
				# code...
				 $sub_category[] = $sub_row;

			}
			return $sub_category;
	}

	public function error_report($text){

		return '<div id="message-red">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="red-left">Error. <a href="">'.$text.'</a></td>
					
				</tr>
				</table>
				</div>';
	}

	public function import_data_array($import_data_array,$image_1_temp_name,$image_2_temp_name,$image_3_temp_name){

  $take_image_1 = '../'.$import_data_array['image_1']; 
  $take_image_2 = '../'.$import_data_array['image_2'];
  $take_image_3 = '../'.$import_data_array['image_3'];
  $images = $import_data_array['image_1'];

	$fields = '`'.implode('`,`', array_keys($import_data_array)).'`';

	$data = '\''.implode('\', \'', $import_data_array) . '\'';

		 $this->query("INSERT INTO `products`($fields) VALUES ($data)");
		 $this->query("UPDATE `products` SET `date_added` = now() WHERE `image_1` = '$images'");
// Start moving File*********************
		 //<part one>
		move_uploaded_file($image_1_temp_name, $take_image_1);
		//.. </part one>
		//<part two>

		move_uploaded_file($image_2_temp_name, $take_image_2);

		//....</part two>

		//<part two>
		move_uploaded_file($image_3_temp_name, $take_image_3);

		//...</part two>
//  moving File ****************** ends
		 return true;

	}

	public function product_success($text,$add_again_link,$add_messege){

		return '<div id="message-green">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="green-left">'.$text.'<a href="'.$add_again_link.'">'.$add_messege.'</a></td>
					<td class="green-right"><a class="close-green"><img src="images/table/icon_close_green.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>';

	}

	public function get_all_item($id=NULL){

		$product_data = array();
		$sql = $this->query("SELECT * FROM `products`");

		while ($row = mysql_fetch_assoc($sql)) {
			# code...
			return $row['product_name'] = $item;
		}

	}

	public function return_table($product_name,$category,$price,$main_image,$description){

		return  '<tr>
					<td><input  type="checkbox"/></td>
					<td>'.$main_image.'</td>
					<td>'.$product_name.'</td>
					<td><a href="">'.$category.'</a></td>
					<td>'.$price.'</td>
					<td><a href="">'.$description.'</a></td>
					<td class="options-width">
					<a href="" title="Edit" class="icon-1 info-tooltip"></a>
					<a href="" title="Edit" class="icon-2 info-tooltip"></a>
					<a href="" title="Edit" class="icon-3 info-tooltip"></a>
					<a href="" title="Edit" class="icon-4 info-tooltip"></a>
					<a href="" title="Edit" class="icon-5 info-tooltip"></a>
					</td>
				</tr>';
	}

//This function delete product from product list

	public function del_product($del_id){

		$sql = "DELETE FROM `my_cart`.`products` WHERE `products`.`id` = $del_id";
	
			$this->query($sql);
	}

//Created to change or run an Edit on the requested ID....

	public function run_change_cat($cat,$id){

		$sql = "UPDATE `categories` SET `cat` = '$cat' WHERE `id` = $id";

			$this->query($sql);
	}

// Redirect Admin From the Edit cat page if There are no ? afte .php 

	public function redirect_blank(){

		if (!isset($_GET['id'])) {
			# code...
			$this->redirect_to('categories.php');

		} else {

			return false;
		}
	}

// This funtionality will allow you to change your subcategory

	public function run_change_sub_cat($cat,$id){


		$sql = "UPDATE `sub_categories` SET `sub_cat` = '$cat' WHERE `id` = $id";

			$this->query($sql);

	}

//This funtoin is like redirect_blank(); function
	public function redirect_blank_2(){

		if (!isset($_GET['pro_id'])) {
			# code...
			$this->redirect_to('products.php');

		} else {

			return false;
		}
	}
//This functoin Edit data From table

	public function edit_data_array($import_data_array,$get_id){

		$product_name 			= $import_data_array['product_name'];
		$product_sup_name 		= $import_data_array['suplier_name'];
		$product_category 		=  $import_data_array['category'];
		$product_price		 	= $import_data_array['price'];
		$product_sub_cat_name 	= $import_data_array['sub_category'];
		$product_description 	= $import_data_array['description'];
		//$import_data_array['quantity'] 			= $product_quantity;

	$fields = '`'.implode('`,`', array_keys($import_data_array)).'`';

	$data 	= '\''.implode('\', \'', $import_data_array) . '\'';


		$this->query("UPDATE `products` SET 
		`product_name` 		= '$product_name', 
		`suplier_name` 		= '$product_sup_name',
		 `category` 		= '$product_category',
		 `sub_category`		= '$product_sub_cat_name',
		  `price`			= '$product_price',
		  `description` 	= '$product_description'
		   WHERE `id` = $get_id");

		 return true;		

	}

//This my Upadate photo function 1 this updates the First photo

	public function update_photo_1($image_1,$image_1_md5,$id,$image_1_temp_name){

			$sql = $this->query("UPDATE `products` SET `image_1` = '$image_1_md5' WHERE `id` = '$id'");

			 $destination = '../'.$image_1_md5;

		move_uploaded_file($image_1_temp_name,$destination);

		$this->redirect_to('edit_products.php?pro_id='.$id);

	}

//This my Upadate photo function 2 this updates the scecond photo

	public function update_photo_2($image_2,$image_2_md5,$id,$image_2_temp_name){

		$sql = $this->query("UPDATE `products` SET `image_2` = '$image_2_md5' WHERE `id` = '$id'");

			 $destination = '../'.$image_2_md5;

		move_uploaded_file($image_2_temp_name,$destination);

		$this->redirect_to('edit_products.php?pro_id='.$id);

	}

//This my Upadate photo function 3 this updates the third photo

	public function update_photo_3($image_3,$image_3_md5,$id,$image_3_temp_name){

		$sql = $this->query("UPDATE `products` SET `image_3` = '$image_3_md5' WHERE `id` = '$id'");

			 $destination = '../'.$image_3_md5;

		move_uploaded_file($image_3_temp_name,$destination);

		$this->redirect_to('edit_products.php?pro_id='.$id);

	}

//This is the function of search into Admin Panel which can be also use in Front templete :-)

	public function search_results($keywords){

		$returned_results = array();
		$where = "";

	$keywords = preg_split('/[\s]+/', $keywords);
	
	$total_keywords = count($keywords);

	foreach ($keywords as $key => $keyword) {
		# code...
		$where .= "`product_name` LIKE '%$keyword%'";

			if ( $key != ($total_keywords - 1) ) {
				# code...
				$where .= " AND ";
			}
	}
//id	product_name	suplier_name	category	sub_category	price	description	image_1	image_2	image_3	quantity	date_added
   $results = "SELECT `id`,LEFT(`description`,10) as `description`,`product_name` , `suplier_name` , `category` , `sub_category` , `price` , `image_1` FROM `products` WHERE $where";

 $results_num = ($results = mysql_query($results)) ? mysql_num_rows($results) : 0;

 		if ($results_num == 0) {
 			# code...
 			return false;
 		
 		} else {

 			while ($results_row = mysql_fetch_assoc($results)) {
 				# code...
 				$returned_results[] = array(

 								'id' 					=> $results_row['id'],
 								'description' 			=> $results_row['description'],
 								'product_name'			=> $results_row['suplier_name'],
 								'category' 				=> $results_row['category'],
 								'sub_category'			=> $results_row['sub_category'],
 								'price' 				=> $results_row['price'],
 								'image_1' 				=> $results_row['image_1'] 
 					);
 			}

 			return $returned_results;
 
 		}
}

//THis function Will be used to see on the Categorys and If match found it will return true :-)

	public function cat_match($category){

			$sql = mysql_query("SELECT * FROM `categories` WHERE `cat` = '$category'");

			$count_query = mysql_num_rows($sql);

				if ($count_query == 0) {
					# code...
					return false;
				
				} else {

					return true;

				}
	}

	// Insert category in the database

	public function insert_category($category){

		 mysql_query("INSERT INTO `categories` SET `cat` = '$category'");

			return true;

	}

	public function sup_match($client){

			$sql = mysql_query("SELECT `id` FROM `suplier` WHERE `name` = '$client'");

			$count_query = mysql_num_rows($sql);

				if ($count_query == 0) {
					# code...
					return false;
				
				} else {

					return true;

				}

	}
	//This will add Manufacturer name into Suplier table :-)

	public function insert_suplier($client){

		 mysql_query("INSERT INTO `suplier` SET `name` = '$client'");

			return true;

	}

	// fetching Suplier Name From The database

	public function get_sup(){

		$sql = mysql_query("SELECT * FROM `suplier`");

		$suplier_cat = array();
			while ($out_sup = mysql_fetch_assoc($sql)) {
				# code...
				
				$suplier_cat[] = $out_sup; 

			}

			return $suplier_cat;
	}

	//This function is only for pagination a huge Pagiantion requires

	 function pagination($start,$limit,$targetpage,$tbl_name){

	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT * FROM $tbl_name";
	$total_pages = mysql_num_rows(mysql_query($query));
	
	/* Setup vars for query. */
	//$targetpage = "index.php"; 	//your file name  (the name of this file)
	//$limit = 5; 								//how many items to show per page
        $page = !empty($_GET['page']) ? $_GET['page'] : 1;
	$start = !empty($_GET['page']) ? $_GET['page'] : 1;

	/* Get data. */
	//$sql = "SELECT column_name FROM $tbl_name LIMIT $start, $limit";
	//$result = mysql_query($sql);
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?page=$prev\">Previous</a>";
		else
			$pagination.= "<span class=\"disabled\"></span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
		 $pagination.= "<a href=\"$targetpage?page=$next\">next </a>";
		else
			$pagination.= "<span class=\"disabled\"></span>";
		$pagination.= "</div>\n";
               
	}
        
        return $pagination;
    
}
// End Of Huge Pagiantion

// Delete the lauzy orders :#
	public function not_pro($id){

		 $this->query("DELETE FROM `order_pro` WHERE `id` = '$id'");
	}

// This function is private
	private function insert_transfer_data($transfer_array){


		 $this->query("INSERT INTO `app_order` SET `pro_id` = '$transfer_array[0]' , `count` = '$transfer_array[1]' , `name` = '$transfer_array[2]' , `email` = '$transfer_array[3]' , `address` = '$transfer_array[4]' , `mobile` = '$transfer_array[5]' , `total` = '$transfer_array[6]'");

	}

	public function transfer_data($app_id){

		$sql = $this->query("SELECT * FROM `order_pro` WHERE `id` = '$app_id'");

			while ($loop = mysql_fetch_assoc($sql)) {
				# code...

				$pro_id 			= $loop['pro_id'];
				$pro_count 			= $loop['count'];
				$pro_name 			= $loop['name'];
				$pro_email 			= $loop['email'];
				$pro_address 		= $loop['address'];
				$pro_mobile 		= $loop['mobile'];
				$pro_total 			= $loop['total'];
		// Picking fecthed data and puting them into $transfer_array();
			$transfer_array = array($pro_id,$pro_count,$pro_name,$pro_email,$pro_address,$pro_mobile,$pro_total);
		// Calling insert tecnology Incharge ..........
			$this->insert_transfer_data($transfer_array);

			$this->query("DELETE FROM `my_cart`.`order_pro` WHERE `order_pro`.`id` = '$app_id'");

			}
	}

//This function is private and dedicated functoin for appr_paid...............  Transfer data from `app_order` table and insert into `sold_products`
	private function transfer_data_part_2($transfer_data_part_2_array){

		$this->query("INSERT INTO `sold_products` SET `pro_id` = '$transfer_data_part_2_array[0]' , `count` = '$transfer_data_part_2_array[1]' , `name` = '$transfer_data_part_2_array[2]' , `email` = '$transfer_data_part_2_array[3]' , `address` = '$transfer_data_part_2_array[4]' , `mobile` = '$transfer_data_part_2_array[5]' , `total` = '$transfer_data_part_2_array[6]'");

	}

//After Clicking on paid button its transfer data into transfer_data_part_2() function
	public function appr_paid($paid_id) {

		$sql = $this->query("SELECT * FROM `app_order` WHERE `id` = '$paid_id'");

	while($fetch = mysql_fetch_array($sql)) {


				$pro_id 			= $fetch['pro_id'];
			 	$pro_count 			= $fetch['count'];
				$pro_name 			= $fetch['name'];
				$pro_email 			= $fetch['email'];
				$pro_address 		= $fetch['address'];
				$pro_mobile 		= $fetch['mobile'];
				$pro_total 			= $fetch['total'];
}
			$transfer_data_part_2_array = array($pro_id,$pro_count,$pro_name,$pro_email,$pro_address,$pro_mobile,$pro_total);
			
			
			$this->transfer_data_part_2($transfer_data_part_2_array);

			//After Sending them in a function via array........... The next programme delete the Item by using `id`

			$this->query("DELETE FROM `my_cart`.`app_order` WHERE `app_order`.`id` = '$paid_id'");

// Add into Main Balance............STARTS
			$balance_sql = $this->query("SELECT `total` FROM `balance`");
			
			$balance_sql_fetch = mysql_fetch_array($balance_sql);
			$main_balance = $balance_sql_fetch['total'];
			$add_total = $main_balance + (int)$pro_total;

			$this->query("UPDATE `my_cart`.`balance` SET `total` = '$add_total' WHERE `id` = '1'");

// Add into Main Balance............ENDS

//Add into sub balance (This balance is for Search term (it'll help Admin to Find out the Sold Date...)) ............. STARTS



//Add into sub balance (This balance is for Search term (it'll help Admin to Find out the Sold Date...)) ............. ENDS
	}



	public function delete_fr_app($n_paid_id){

		$this->query("DELETE FROM `my_cart`.`app_order` WHERE `id` = '$n_paid_id'");
			
			echo '<div id="message-red">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="red-left">The Order Is deleted for not paying By User </td>
					<td class="red-right"><a class="close-red"><img src="images/table/icon_close_red.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>';
	}

	public function fetch_left_side_ads(){

		$sql = $this->query("SELECT * FROM ``");
	}

	
}

/*
* *********************************************************************************************************************
*/
/*
* This is Class is created For Conversation system .... I'm Using Dedicated function for the Conversation system
*/

Class Conversation Extends General {



	public function fetch_messege($start,$per_page){

		$return_msg_array = array();

			$sql = $this->query("SELECT `id`,`name`,`email`,LEFT(`message`,20) as `message`,`time`,`view` FROM `messege` ORDER BY `time` DESC LIMIT $start,$per_page");

				while ($msg_out = mysql_fetch_array($sql)) {
					# code...

					$return_msg_array[] = $msg_out;
				}

		return $return_msg_array;
		
	}
	
//The Message will be View to Admin To Give a full view.........	
	public function pick_msg_by_id($id){

		(int)$id;
		$return_pick_msg = array();

			$sql = $this->query("SELECT * FROM `messege` WHERE `id` = $id");

				while ($pick_msg = mysql_fetch_array($sql)) {
					# code...

					$return_pick_msg[] = $pick_msg;
				}
		return $return_pick_msg;
	}

//This function will Update the View row into 1
	public function viewed($id){

		(int)$id;

		$sql = $this->query("UPDATE `messege` SET `view` = 1  WHERE `id` = '$id'");

				if ($sql) {
					# code...
				} else {

					echo mysql_error();
				}
			
	}

//This function Delete messege from database

	public function delete_msg($id){


		$this->query("DELETE FROM `my_cart`.`messege` WHERE `id` = '$id'");

	}

// Mark Selected messege as Read
	public function mark_as_read($read_id){

		$this->query("UPDATE `messege` SET `view` = 1  WHERE `id` = '$read_id'");
	}


	public function reply($messege_o,$id,$email,$name){


		$this->query("UPDATE `messege` SET `reply` = '$messege_o' WHERE `id` = '$id'");

		$this->email_for_reply($email,'Reply Of Your sent Messege on Tool Shop',$messege_o);
	
	}
	public function num_of_msg(){

		$sql = mysql_num_rows($this->query("SELECT `id` FROM `messege` WHERE `view` = '0'"));

		return $sql;
	}

	public function notify_msg($new_msg){


			return '<div id="message-yellow">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="yellow-left">You have '.$new_msg.' new message.<a href="messege_visit.php">Go to Inbox.</a></td>
					<td class="yellow-right"><a class="close-yellow"><img src="images/table/icon_close_yellow.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>';
				
	}

	public function submit_comment($con_name,$con_mail,$con_msg){

		 $this->query("INSERT INTO `comments` SET `name` = '$con_name' , `email` = '$con_mail' , `comment` = '$con_msg'");

	}
	
//THis is for fetching comments..............
	public function show_comments($start,$per_page){

		$array = array();
		$sql = $this->query("SELECT * FROM `comments` WHERE `approve` = 1 ORDER BY `time` DESC LIMIT $start,$per_page");

			while ($loop = mysql_fetch_array($sql)) {
				# code...
				$array[] = $loop;
			}
		return $array;
	}

	public function fetch_comments($start,$per_page){

		$return_msg_array = array();

			$sql = $this->query("SELECT `id`,`name`,`email`, `comment`,`time` FROM `comments` WHERE `approve` = 0 ORDER BY `time` DESC LIMIT $start,$per_page");

				while ($msg_out = mysql_fetch_array($sql)) {
					# code...

					$return_msg_array[] = $msg_out;
				}

		return $return_msg_array;

	}

	public function approve_comment($app_id){
		$fetch = mysql_fetch_assoc($this->query("SELECT `email`,`comment` FROM `comments` WHERE `id` = '$app_id'"));
		$this->query("UPDATE `comments` SET `approve` = 1 WHERE `id` = '$app_id'");
			$to 		= $fetch['email'];
			$subject	= 'Your Comment on My Shopping cart is Approved it is now Available on The website';
			$message 	= 'You commented -- ' . $fetch['comment'] . ' -- in my website... And It is showing so Go there And check :)';
			
		$this->email_for_reply($to,$subject,$message);
	}

	public function num_of_order(){

		 $num = mysql_num_rows($this->query("SELECT `id` FROM `order_pro`"));

		 return $num;
	}

	public function num_of_com(){


		 $num = mysql_num_rows($this->query("SELECT `id` FROM `comments` WHERE `approve` = 0"));

		 return $num;

	}

} /// End of Conversation Class


/***************************************************************************************************************
*  
*/
Class Advertise extends General {

/*  Fetching time start Here */

	public function fetch_for_index_right(){

	$return_right = array();

		$sql = $this->query("SELECT * FROM `add_images` WHERE `id` = 5");
		$return_right = mysql_fetch_assoc($sql);

			return $return_right;
	
	}

	public function fetch_for_cart_submit_right(){

		$return_right = array();

			$sql = $this->query("SELECT * FROM `add_images` WHERE `id` = 2");
			$return_right = mysql_fetch_assoc($sql);
				
				return $return_right;
	}

	public function fetch_for_contact_right(){

		$return_right = array();

			$sql = $this->query("SELECT * FROM `add_images` WHERE `id` = 3");
			$return_right = mysql_fetch_assoc($sql);

				return $return_right;

	}

	public function fetch_for_details_right(){


		$return_right = array();

			$sql = $this->query("SELECT * FROM `add_images` WHERE `id` = 4");
			$return_right = mysql_fetch_assoc($sql);

				return $return_right;

	}

	public function fetch_for_order_pro_right(){


		$return_right = array();

			$sql = $this->query("SELECT * FROM `add_images` WHERE `id` = 6");
			$return_right = mysql_fetch_assoc($sql);

				return $return_right;


	}

	public function fetch_for_products_right(){


		$return_right = array();

			$sql = $this->query("SELECT * FROM `add_images` WHERE `id` = 7");
			$return_right = mysql_fetch_assoc($sql);

				return $return_right;


	}


	public function fetch_for_products_search_right(){


		$return_right = array();

			$sql = $this->query("SELECT * FROM `add_images` WHERE `id` = 8");
			$return_right = mysql_fetch_assoc($sql);

				return $return_right;


	}

	public function fetch_for_register_right(){


		$return_right = array();

			$sql = $this->query("SELECT * FROM `add_images` WHERE `id` = 9");
			$return_right = mysql_fetch_assoc($sql);

				return $return_right;


	}

	public function fetch_for_report_right(){


		$return_right = array();

			$sql = $this->query("SELECT * FROM `add_images` WHERE `id` = 10");
			$return_right = mysql_fetch_assoc($sql);

				return $return_right;


	}

	public function fetch_for_speak_right(){


		$return_right = array();

			$sql = $this->query("SELECT * FROM `add_images` WHERE `id` = 11");
			$return_right = mysql_fetch_assoc($sql);

				return $return_right;


	}

	public function fetch_for_cart_submit_left(){


		$return_right = array();

			$sql = $this->query("SELECT * FROM `add_images` WHERE `id` = 12");
			$return_right = mysql_fetch_assoc($sql);

				return $return_right;


	}

	public function fetch_for_contact_left(){


		$return_right = array();

			$sql = $this->query("SELECT * FROM `add_images` WHERE `id` = 13");
			$return_right = mysql_fetch_assoc($sql);

				return $return_right;


	}
	
	public function fetch_for_details_left(){


		$return_right = array();

			$sql = $this->query("SELECT * FROM `add_images` WHERE `id` = 14");
			$return_right = mysql_fetch_assoc($sql);

				return $return_right;


	}

	public function fetch_for_index_left(){


		$return_right = array();

			$sql = $this->query("SELECT * FROM `add_images` WHERE `id` = 15");
			$return_right = mysql_fetch_assoc($sql);

				return $return_right;


	}

	public function fetch_for_order_pro_left(){


		$return_right = array();

			$sql = $this->query("SELECT * FROM `add_images` WHERE `id` = 16");
			$return_right = mysql_fetch_assoc($sql);

				return $return_right;


	}

	public function fetch_for_products_left(){


		$return_right = array();

			$sql = $this->query("SELECT * FROM `add_images` WHERE `id` = 17");
			$return_right = mysql_fetch_assoc($sql);

				return $return_right;


	}
	public function fetch_for_products_search_left(){


		$return_right = array();

			$sql = $this->query("SELECT * FROM `add_images` WHERE `id` = 18");
			$return_right = mysql_fetch_assoc($sql);

				return $return_right;

	}

	public function fetch_for_register_left(){


		$return_right = array();

			$sql = $this->query("SELECT * FROM `add_images` WHERE `id` = 19");
			$return_right = mysql_fetch_assoc($sql);

				return $return_right;


	}

	public function fetch_for_report_left(){


		$return_right = array();

			$sql = $this->query("SELECT * FROM `add_images` WHERE `id` = 20");
			$return_right = mysql_fetch_assoc($sql);

				return $return_right;


	}

	public function fetch_for_speak_left(){


		$return_right = array();

			$sql = $this->query("SELECT * FROM `add_images` WHERE `id` = 21");
			$return_right = mysql_fetch_assoc($sql);

				return $return_right;


	}
/* Fetchiing Ends Here */

	
	public function Image_advertise($start,$per_page){

		$return_array = array();
			
			$sql = $this->query("SELECT * FROM `add_images` LIMIT $start , $per_page");

		while ( $array = mysql_fetch_assoc($sql)) {
			# code...

			$return_array[] = $array;

		}

	return $return_array;

	}

	public function fetch_data_by_id($id){

		$return_image_info = array();

			$sql = $this->query("SELECT * FROM `add_images` WHERE `id` = '$id'");

		while ($get_row = mysql_fetch_array($sql)) {
			# code...

			$return_image_info[] = $get_row;
		}

		return $return_image_info;
	}

}



?>