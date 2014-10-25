<?php
include 'function/admin.php';
ob_start();
session_start();
$Connection 	= new connection_admin('localhost','root','','my_cart');
$General 		= new General('localhost','root','','my_cart');
$Admin 			= new Admin('localhost','root','','my_cart');
$Conversation   = new Conversation('localhost','root','','my_cart');
$add 			= new Advertise('localhost','root','','my_cart');
$errors = array();
$errors_1 = array();
$errors_2 = array();
$errors_3 = array();
?>