<?php 

	// Connect to database

	// Parse request
	if(isset($_POST['action']) && !empty($_POST['action'])) {
	    $action = $_POST['action'];
	    switch($action) {
	        case 'getFoodItems' : getFoodItems();
	        break;
	        case 'viewOpenOrders' : viewOpenOrders();
	        break;
	        case 'saveOrder' : saveOrder();
	        break;
	        case 'removeOpenOrders' : removeOpenOrders();
	        break;
	    }
	}

	function getFoodItems() {
		// Get Food item name

		// Get Food item price

		// Get food item ingredients
	}

	function viewOpenOrders() {
		// Returns current orders
	}

	function saveOrder() {
		// Saves order to current orders
	}

	function removeOpenOrders() {
		// Removes order from current orders
	}

?>