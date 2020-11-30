<?php 
	
	session_start();

	function addSMTP($host,$user,$pass,$port)	
	{
		if (!empty($host) && !empty($user) && !empty($pass) && !empty($port)) {
			$_SESSION['host__smtp'] = $host;
			$_SESSION['username__smtp'] = $user;
			$_SESSION['pass__smtp'] = $pass;
			$_SESSION['port__smtp'] = (int)$port;
		}
		
	}

	$host = htmlspecialchars($_POST['SMTP__host']);
	$user = htmlspecialchars($_POST['SMTP__user']);
	$pass = trim(htmlspecialchars($_POST['SMTP__pass']));
	$port = htmlspecialchars($_POST['SMTP__port']);
	addSMTP($host,$user,$pass,$port);