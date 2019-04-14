<?php 
$test = "";
if(isset($_POST['id'])){
	$test = $_POST['id'];
}
echo 'ajax test ' . $test;
?>