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

	function getTotalProfitForDay(){
		//
	}
	
	function getWageStatistics() {
		//
	}

	function logoutUser() {
		//
	}

	function getVendersList() {
		//
	}

	function viewSupplyOrders() {
		//
	}
	
?>