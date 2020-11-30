<?php 
	
	session_start();

	function addRecipients($name,$email,$replay,$information)	
	{
		if (!empty($name) && !empty($email)) {
			$_SESSION['setfrom__name'] = $name;
			$_SESSION['setfrom__email'] = $email;
			$_SESSION['replay'] = $replay;
			$_SESSION['information__replay'] = $information;
		}
		
	}

	$setfrom__name = htmlspecialchars($_POST['setfrom__name']);
	$setfrom__email = htmlspecialchars($_POST['setfrom__email']);
	$replay = htmlspecialchars($_POST['replay']);
	$information__replay = htmlspecialchars($_POST['information__replay']);
	addRecipients($setfrom__name,$setfrom__email,$replay,$information__replay);