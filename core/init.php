<?php
include_once 'function/users.php';
session_start();
ob_start();
$General 		= new General('localhost','root','','my_cart');
$Users 	 		= new Users('localhost','root','','my_cart');
$Conversation 	= new Conversation('localhost','root','','my_cart');
$add 			= new Advertise('localhost','root','','my_cart');
//$Cart 			= new Cart('localhost','root','','my_cart');
$errors = array();
?>