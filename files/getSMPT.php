<?php 
	session_start();
	if(isset($_SESSION['username__smtp'])){
		echo $_SESSION['username__smtp'];
	} else{
		echo "Not Found";
	}
 ?>