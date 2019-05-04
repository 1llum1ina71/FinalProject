<?php 

	// Connect to database
	require './controllers/env.php';

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
		global $conn;

		$foodQuery = "SELECT type, price, itemId FROM Item ORDER BY RAND() LIMIT 10"; 
		// demonstration purposes, cut down list size
		$foodResponse = @mysqli_query($conn, $foodQuery);

		$ingredQuery = $conn->prepare("SELECT Recipe.itemId, Ingredient.Type FROM Recipe NATURAL JOIN Ingredient WHERE Recipe.itemId = ?");

		$ingredQuery->bind_param("i", $itemId);
		// loop for each item to add to the menu list
		$num = 0;
		$items = [];
		while($foodRow = $foodResponse->fetch_assoc()){
			$itemId = $foodRow["itemId"];
			$item = new \stdClass();
			$item->name = $foodRow["type"];
			$item->price = $foodRow["price"];

			// get ingredient information for each item
			$ingredQuery->execute();
			$ingredResponse = $ingredQuery->get_result();
			//loop for each ingredient
			$ingredients = [];
			$numIngred = 0;
			while($ingredRow = $ingredResponse->fetch_assoc()){
				$ingredient = new \stdClass();
				$ingredient = $ingredRow["Type"];
				$ingredients[$numIngred] = $ingredient;
				$numIngred++;
			}
			// attach ingredients to item
			$item->make_up = $ingredients;
			$item->id = $foodRow["itemId"];
			$items[$num] = $item;
			$num++;
		}
		$ingredQuery->close();
		$conn->close();
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