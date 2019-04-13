<?php

	$request = $_SERVER['REQUEST_URI'];

	switch ($request) {
	    case '/menu' :
	        require __DIR__ . '/views/menu.php';
	        break;
	    case '/login' :
	        require __DIR__ . '/views/login.php';
	        break;
	    case '/404' :
	    	require __DIR__ . '/views/404.php';
	    	break;
	}

?>
