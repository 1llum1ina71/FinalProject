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
	    case '/loginController' :
	    	require __DIR__ . '/controllers/loginController.php';
	    	break;
	    case '/menuController' :
	    	require __DIR__ . '/controllers/menuController.php';
	    	break;
	    case '/managementController' :
	    	require __DIR__ . '/controllers/managementController.php';
	    	break;
	    case '/userController' :
	    	require __DIR__ . '/controllers/userController.php';
	    	break;
	    default: 
	    	echo "test";
	    	header('Location: ' . '/login');
	    	break;
	}

?>
