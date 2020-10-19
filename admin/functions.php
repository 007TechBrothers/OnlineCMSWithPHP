<?php 

	function confirm_query($result){
		global $con;
		if(!$result){
	  		die('Connection Failed'.mysqli_error($con));
	  	}
	}

	function escape($string){
		global $con;
		return mysqli_real_escape_string($con, $string);
	}

	//clean Register
	function clean_input($input){
		$input = trim($input);
		$input = htmlspecialchars($input);
		return $input;
	}
 ?>