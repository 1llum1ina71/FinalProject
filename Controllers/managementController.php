<?php 
	
	require './controllers/env.php';

	if(isset($_POST['action']) && !empty($_POST['action'])) {
	    $action = $_POST['action'];
	    switch($action) {
	    	case 'addEmployee': 
	    		addEmployee();
	    	break;
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
	        case 'getEmployees':
	        	getEmployees();
	        break;
	        case 'removeVendor':
	        	removeVendor();
	        break;
	    }
	}

	function addEmployee() {
		global $conn;

		$isSalaried = "0";

		switch ($_POST['job_title']) {
			case 'Manager':
		    case 'Chef':
		    case 'IT Professional': 
		    	$isSalaried = '1';
			break; 
			default:
			break;
		}

		switch ($_POST['job_title']) {
			case 'Manager': 
				$accessPriv = 'Manager';
			break;
		    case 'Chef': 
		    	$accessPriv = 'Manager';
		    break;
			case 'IT Professional': 
				$accessPriv = 'Administrator';
			break; 
			default: 
				$accessPriv = 'Operator';
			break;
		}

	    $sql = "INSERT INTO Employee "
	     	. "VALUES (NULL, "
	     	. "'" . $accessPriv . "',"
			. "'" . $_POST['first_name'] . "',"
	        . "'" . $_POST['last_name'] . "',"  
	        . "'" . $_POST['job_title'] . "',"
	        . "'" . $isSalaried . "', 1)";

	    $result = $conn->query($sql);

	    echo json_encode($sql);
}

	
	function getWageAndLaborStatistics() {
	global $conn;
	// get Labor statistics
	$statistics = new \stdClass();
	$sql = "SELECT SUM(discountTotal) AS Cost FROM RestaurantOrder"; // sql statement
	$response = @mysqli_query($conn, $sql);
	// get a response from database by running query function with sql statement as parameter          // assign a variable called "row" the associated first row of the $response array
	$row = $response->fetch_assoc();
	$statistics->discounts = $row['Cost'];

	$sql = "SELECT SUM(totalCost) AS totalSales FROM RestaurantOrder"; // sql statement
	$response = @mysqli_query($conn, $sql);
	// get a response from database by running query function with sql statement as parameter          // assign a variable called "row" the associated first row of the $response array
	$row = $response->fetch_assoc();
	$statistics->sales = $row['totalSales'];

	$sql = "SELECT TIMESTAMPDIFF(SECOND, timeLoggedIn, timeLoggedOut)/3600 AS newcolumn FROM WorkLog WHERE (timeLoggedOut IS NOT NULL);"; // sql statement
	$response = @mysqli_query($conn, $sql);
	// get a response from database by running query function with sql statement as parameter          // assign a variable called "row" the associated first row of the $response array
	if ($response->num_rows > 0)
	{
		$timedLogged = 0;
		while($row = $response-> fetch_assoc())
		{
			$timedLogged += ($row["newcolumn"]);
		}
	}
	$statistics->labor_hours = round($timedLogged,2);
	$conn->close();

	// profit is sales minus discounts
	$statistics->profit = ($statistics->sales - $statistics->discounts);
	echo json_encode($statistics);
	}

	function getLoggedInUsers() {

		global $conn;

		$sql = "SELECT * "
			. "FROM Employee "
			. "NATURAL JOIN WorkLog "
			. "WHERE WorkLog.timeLoggedIn IS NOT NULL "
			. "AND WorkLog.timeLoggedOut IS NULL ";

		$data = $conn->query($sql);
		$users = $data->fetch_all(MYSQLI_ASSOC);

		echo json_encode($users);
	}

	function getVendorsList() {
		// Get all vendors
		global $conn;
		$vendors = [];
		$vendorQuery = "SELECT supplierName FROM Supplier
		                ORDER BY RAND()
										LIMIT 10"; // for demonstration purposes, cuts down list
		$vendorResponse = @mysqli_query($conn, $vendorQuery);
		$venNum = 0;
		while($vendorRow = $vendorResponse->fetch_assoc()){
			$vendor = new \stdClass();
			$vendor->name = $vendorRow['supplierName'];
		  $vendors[$venNum] = $vendor;
		  $venNum++;
		}
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
	function getEmployees () {
     	global $conn;
		//check if user exists
		$sql = "SELECT * FROM Employee "
		     . "WHERE is_employed = '1'";

		$data = $conn->query($sql);
		$entry = $data->fetch_all(MYSQLI_ASSOC);
		echo json_encode($entry);
	}
	function removeVendor() {
		global $conn;

		$delStmt = $conn->prepare("DELETE FROM Supplier WHERE supplierName = ?");
		$delStmt->bind_param("s", $supplierName);
		$supplierName = $_POST['name'];
		$delStmt->execute();
		echo $delStmt->affected_rows;
		$delStmt->close();

	}
	
?>