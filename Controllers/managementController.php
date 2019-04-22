<?php 
	
	// Initalize database

	if(isset($_POST['action']) && !empty($_POST['action'])) {
	    $action = $_POST['action'];
	    switch($action) {
	        case 'getWageAndLaborStatistics' : 
	        	getWageAndLaborStatistics();
	        break;
	        case 'getLoggedInUsers' :
	        	getLoggedInUsers();
	        break;
	        case 'logoutUser' : 
	        	logoutUser();
	        break;
	        case 'getVendorsList' : 
	        	getVendorsList();
	        break;
	        case 'getSupplyOrders' : 
	        	getSupplyOrders();
	        break;
	    }
	}
	
	function getWageAndLaborStatistics() {
		// get Labor statistics
		$statistics = new \stdClass();
		$statistics->sales = 2349.99;
		$statistics->labor_hours = 48.75;
		$statistics->labor_wages = 490.88;
		$statistics->discounts = 152.99;
		// Calculated value wages/profit
		$statistics->labor_percent_of_profit = .23;
		$statistics->profit = 
			$statistics->sales - 
			( $statistics->discounts + $statistics->labor_wages );

		echo json_encode($statistics); 
	}

	function getLoggedInUsers() {
		$users = [];

		$user1 = new \stdClass();
		$user1->name = "Bobby Simpson";
		$user1->id = 3;
		array_push($users, $user1);

		$user2 = new \stdClass();
		$user2->name = "Hank Hill";
		$user2->id = 4;
		array_push($users, $user2);

		echo json_encode($users);
	}

	function logoutUser() {
		// Log out user
		if(isset($_POST['id'])) {
			// Log out user with id
		}
		
		// Echo back name
		echo $_POST['id'];
	}

	function getVendorsList() {
		// Get all vendors
		$vendors = [];
		$vendor1 = new \stdClass();
		$vendor1->name = "Tyson Inc.";
		array_push($vendors, $vendor1);

		$vendor2 = new \stdClass();
		$vendor2->name = "Reinhart Foods";
		array_push($vendors, $vendor2);

		echo json_encode($vendors);
	}

	function getSupplyOrders() {
		$supplyOrders = [];
		$order = new \stdClass();
		$order->name = "Tyson Inc";
		$item = new \stdClass();
		$item->name = "Buffalo Wings";
		$item->price = 7.99;
		$item->quantity = 4;
		$order->list = [];
		array_push($order->list, $item);

		$item = new \stdClass();
		$item->name = "Burger Patties";
		$item->price = 7.99;
		$item->quantity = 100;
		$order->list = [];
		array_push($order->list, $item);
		$order->total = 2079.99;

		array_push($supplyOrders, $order);

		$order = new \stdClass();
		$order->name = "Reinhart";
		$item = new \stdClass();
		$item->name = "Ketchup";
		$item->price = 7.99;
		$item->quantity = 4;
		$order->list = [];
		array_push($order->list, $item);

		$item = new \stdClass();
		$item->name = "Mustard";
		$item->price = 7.99;
		$item->quantity = 100;
		$order->list = [];
		array_push($order->list, $item);
		$order->total = 209.99;
		
		array_push($supplyOrders, $order);

		echo json_encode($supplyOrders);
	}
	
?>