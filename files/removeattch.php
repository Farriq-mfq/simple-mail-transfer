<?php 
	session_start();
	$key =  $_GET['key'];
	unlink('../attch/'.$_SESSION['attch'][$key]);
	unset($_SESSION['attch'][$key]);
	if (empty($_SESSION['attch'])) {
		unset($_SESSION['attch']);
	} 
	
 ?>