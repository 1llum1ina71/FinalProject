<?php 
	
	if(isset($_POST['action']) && !empty($_POST['action'])) {
	    $action = $_POST['action'];
	    switch($action) {
	        case 'checkLoginInfo' : checkLoginInfo();
	        break;
	        case 'loginUser' : loginUser();
	        break;
	        case 'logoutUser' : logoutUser();
	        break;
	    }
	}
	function checkLoginInfo() {
		// Check if a user is logged in
	}

	function loginUser() {
		// Log user in

		// Use pincode 
	}

	function logoutUser() {
		// log user out
	}
	 
?>