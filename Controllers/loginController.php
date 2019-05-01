<?php 

	require './controllers/env.php';

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
		if(!isset($_POST['passcode'])){
			echo "false";
		}
		else{
			global $conn;
			// Check if user exists
			$sql = "SELECT employId FROM Employee "
				. "WHERE employId = '" . $_POST['passcode'] . "'";

			$data = $conn->query($sql);

			if( $data->num_rows > 0 ){

				// Check if user is logged in
				$sql = "SELECT * FROM WorkLog "
					. "WHERE WorkLog.employId = '" . $_POST['passcode'] . "'";

				$data = $conn->query($sql);

				$entry = $data->fetch_all(MYSQLI_ASSOC);
				
				// There should only be one, but just in case
				// Use most recent
				// Log out user if logged in
				if($entry[$data->num_rows - 1]['timeLoggedOut'] == null){
					// Log out user
					$sql = "UPDATE WorkLog "
						. "SET timeLoggedOut = '" 
						. date('Y-m-d G:i:s') . "' "
						. "WHERE workLogId = '" . $entry[$data->num_rows - 1]['workLogId'] . "'";
	
					$data = $conn->query($sql);
				}

				// Log in user
				$sql = "INSERT INTO WorkLog "
					. "VALUES (NULL, "
					. $entry[0]['employId'] .", '"
					. date('Y-m-d G:i:s') . "', "
					. "NULL)";

				$data = $conn->query($sql);

				if( json_encode($data) == 'false'){
					echo "false";
				}
				else {
					echo json_encode( $_POST['passcode']);
				}
			}
			else {
				echo "false";
			}
		}
	}

	function logoutUser() {
		global $conn;
		if(isset($_POST['id'])){

			$sql = "UPDATE WorkLog "
					. "SET timeLoggedOut = '" 
					. date('Y-m-d G:i:s') . "' "
					. "WHERE employId = '" . $_POST['id'] . "'";
			echo $_POST['id'];
			$data = $conn->query($sql);

			$sql = "SELECT * FROM Employee "
				. "WHERE employId = '" . $_POST['id'] . "'";
			$data = $conn->query($sql);
			$user = $data->fetch_all(MYSQLI_ASSOC);

			echo json_encode($user);
		}
	}
	 
?>