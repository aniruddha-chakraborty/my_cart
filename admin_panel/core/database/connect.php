<?php
/*
* This Class Contains huge number of statement mixed with function 
*/
Class connection_admin {

protected $_link;

//If You Delete This Everybody of the Team Will send you a serial killer to kill you ......... :v :v
 
	function __construct($host,$user,$pass,$db){

	$this->_link = mysql_connect($host,$user,$pass);

		mysql_select_db($db,$this->_link);

	}

	public function query($sql){

		$result = mysql_query($sql);
		$this->confirm_query($sql);

		return $result;
	}

	public function confirm_query($sql){

		if (!$sql) {
			# code...
			die('Query Failed'. mysql_error());
		}
	}

	public function count_matched_id($queried_output){

		 return mysql_result($queried_output, 0);

	}

	

}

?>