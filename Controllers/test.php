<?php 
$test = "";
if(isset($_POST['id'])){
	$test = $_POST['id'];
}
//include '../Finalproject/env.php';

echo 'ajax test ' . $test;
?>