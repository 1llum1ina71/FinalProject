<?php 

	$server = "209.106.201.103";
	$serverUser = "dbstudent7";
	$serverPassword = "smartpage45";
	$db = "group5";

	$conn = new mysqli($server, $serverUser, $serverPassword, $db);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	    echo "Failed Server connection";
	}
	echo "connected<br>";

	// $sql = "SELECT * FROM Employee";
	// $data = $conn->query($sql);
	// $test = $data->fetch_all(MYSQLI_ASSOC); 
	// echo json_encode($test);

	$user = 21;
	$sql = "SELECT WorkLog.timeLoggedIn FROM Employee "
		. "NATURAL JOIN WorkLog "
		. "WHERE WorkLog.timeLoggedIn != 'NULL' "
		. "AND WorkLog.timeLoggedOut != 'NULL' "
		. "AND WorkLog.employId = '" . $user . "'";

	$data = $conn->query($sql);

	$test = $data->fetch_all(MYSQLI_ASSOC);
	foreach( $test as $x) {
		echo json_encode($x['timeLoggedIn']) . "<br>";
	}
	

?>