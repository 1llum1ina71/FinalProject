<?php

	$request = $_SERVER['REQUEST_URI'];

	switch ($request) {
	    case '/menu' :
	        require __DIR__ . '/views/menu.php';
	        break;
	    case '/login' :
	        require __DIR__ . '/views/login.php';
	        break;
	    case '/manage' :
	        require __DIR__ . '/views/manage.php';
	        break;
	    case '/404' :
	    	require __DIR__ . '/views/404.php';
	    	break;
	    // Controllers
	    // Database queries
	    case '/test' :
	    	require __DIR__ . '/controllers/test.php';
	    	break;
	    default: 
	    	echo "test";
	    	header('Location: ' . '/login');
	    	break;
	}

?>
