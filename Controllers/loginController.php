<?php 
	
	if(isset($_POST['action']) && !empty($_POST['action'])) {
	    $action = $_POST['action'];
	    switch($action) {
	        case 'test' : test();
	        break;
	        case 'blah' : blah();
	        break;
	    }
	}
	function checkLoginInfo() {
		//
	}

	function loginUser() {
		//
	}

	function logoutUser() {
		//
	}
	 
?>