<?php 

	// Initialize database

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
		if(isset($_POST['passcode'])){
			
		}
		// Use pincode 
	}

	function logoutUser() {
		if(isset($_POST['id'])){
			$id = $_POST['id'];
		}
	}
	 
?>