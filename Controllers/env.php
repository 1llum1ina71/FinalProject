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
?>