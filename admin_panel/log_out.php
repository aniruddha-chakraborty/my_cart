<?php
include 'core/init.php';

session_destroy();

$General->redirect_to('login.php');
exit();
?>