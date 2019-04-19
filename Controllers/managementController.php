<?php 
	
	// Initalize database

	if(isset($_POST['action']) && !empty($_POST['action'])) {
	    $action = $_POST['action'];
	    switch($action) {
	        case 'getTotalProfitForDay' : getTotalProfitForDay();
	        break;
	        case 'getWageStatistics' : getWageStatistics();
	        break;
	        case 'logoutUser' : logoutUser();
	        break;
	        case 'getVendersList' : getVendersList();
	        break;
	        case 'viewSupplyOrders' : viewSupplyOrders();
	        break;
	    }
	}

	function getTotalProfitForDay(){
		// Get Todays profit
	}
	
	function getWageStatistics() {
		// get Labor statistics
	}

	function logoutUser() {
		// Log out user
	}

	function getVendersList() {
		// Get all vendors
	}

	function viewSupplyOrders() {
		// View all supply orders
	}
	
?>