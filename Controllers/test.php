<?php 
$test = "";
if(isset($_POST['action'])){
	$test = $_POST['action'];
}

$testObj = new \stdClass();
$testObj->abc = "abc";
$testObj->test = "";
$testObj->test2 = "bigTest";
echo json_encode($testObj);
?>