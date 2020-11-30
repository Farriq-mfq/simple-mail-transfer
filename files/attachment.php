<?php 
session_start();
	$name = $_FILES['attch']['name'];
	$tmp = $_FILES['attch']['tmp_name'];
	$dir = '../attch/';
	move_uploaded_file($tmp, $dir.$name);
	if (!isset($_SESSION['attch'])) {
		$_SESSION['attch'] = array();
	}
	array_push($_SESSION['attch'], $name);
	
 ?>