<?php 

	$user = "";

	if(isset($_POST['user'])){
		$user = $_POST["user"];
	}

	function checkIfUserIsLoggedIn( $user) {
		global $conn;
		// Check if user is logged in
		$sql = "SELECT WorkLog.timeLoggedOut FROM Employee "
			. "NATURAL JOIN WorkLog "
			. "WHERE WorkLog.timeLoggedIn != NULL "
			. "AND WorkLog.timeLoggedOut = NULL "
			. "AND WorkLog.employId = '" . $user . "'";

		$data = $conn->query($sql);

		if( json_encode($data) == 'false'){
			return false;
		}
		else {
			return true;
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
				return $user;
			}
			return false;
		}
	}
?>