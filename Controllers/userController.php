<?php 

	// Connect to database
	require './controllers/env.php';

	// Parse request
	if(isset($_POST['action']) && !empty($_POST['action'])) {
	    $action = $_POST['action'];
	    switch($action) {
	        case 'getUserInfo' : getUserInfo();
	        break;
	        case 'checkIfUserIsManager' : checkIfUserIsManager();
	        break;
	    }
	}

	function getUserInfo() {
		global $conn;

		if(isset($_POST['id'])) {
			$sql = "SELECT * FROM Employee "
				. "WHERE employId = '" . $_POST['id'] . "'";
			$data = $conn->query($sql);
			$user = $data->fetch_all(MYSQLI_ASSOC);

			echo json_encode($user);
		}
		else {
			echo "false";
		}
	}
	function checkIfUserIsManager() {
		global $conn;

		if(isset($_POST['id'])) {
			$sql = "SELECT accessPriv FROM Employee "
				. "WHERE employId = '" . $_POST['id'] . "'";
			$data = $conn->query($sql);
			
			if($data != false){
				$user = $data->fetch_all(MYSQLI_ASSOC);
				echo json_decode($user);
			}
			echo "false";
		}
	}

?>