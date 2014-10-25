<?php

Class connection_admin{

protected $_$link;

	function __contract($host,$user,$pass,$db){

	$this->_link = mysql_connect($host,$user,$pass);

		mysql_select_db($db,$this->_link);

	}

}

?>