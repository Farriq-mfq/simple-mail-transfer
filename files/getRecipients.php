<?php 
	session_start();
	if(isset($_SESSION['setfrom__email'])){
		echo $_SESSION['setfrom__email'];
	} else{
		echo "Not Found";
	}
 ?>