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
	        case 'payForOrder' :
	        	payForOrder();
	        break;
	    }
	}

	function getFoodItems() {
		$items = [];
		$item1 = new \stdClass();
		// Get Food item name
		$item1->name = "Item1";
		// Get Food item price
		$item1->price = "9.99";
		// Get food item ingredients
		$item1->make_up = ['lettuce', 'tomato', 'onion', 'sourdough bread'];
		$item1->id = 1;
		array_push($items, $item1);

		$item2 = new \stdClass();
		// Get Food item name
		$item2->name = "Item2";
		// Get Food item price
		$item2->price = "9.99";
		// Get food item ingredients
		$item2->make_up = ['lettuce', 'tomato', 'onion', 'sourdough bread'];
		$item2->id = 2;
		array_push($items, $item2);

		echo json_encode($items);
	}

	function viewOpenOrders() {
		// Returns current orders
		$orders = [];

	}

	function saveOrder() {
		// Saves order to current orders
	}

	function removeOpenOrders() {
		// Removes order from current orders
	}

	function payForOrder() {
		if(isset($_POST['orderList'])){
			$orderList = $_POST['orderList'];
			// Get most recent order number from database
			foreach($orderList as $item_id) {
				// Add order
			}
		}
	}
?>