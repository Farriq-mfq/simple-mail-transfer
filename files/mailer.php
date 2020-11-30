<?php

session_start();
$mailist  = explode(PHP_EOL, $_POST['mail__list']);
$message = $_POST['message__type'];
$subject = $_POST['subject'];
if (isset($_SESSION['replay'])&& isset($_SESSION['information__replay'])) {
	$addreplay = true;
}
if (isset($_SESSION['attch'])) {
	$attch = true;
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';
$error = 1;
$success = 1;
$total = count($mailist);
$er = array();
$su = array();
for ($i=0; $i < count($mailist); $i++) { 

	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->Host       = $_SESSION['host__smtp'];         
	$mail->SMTPAuth   = true;                                  
	$mail->Username   = $_SESSION['username__smtp'];                    
	$mail->Password   = $_SESSION['pass__smtp']; 
	$mail->Port       = $_SESSION['port__smtp']; 

	$mail->setFrom($_SESSION['setfrom__email'], $_SESSION['setfrom__name']);     
	$mail->addAddress($mailist[$i]); 
	if ($addreplay) {
	       	$mail->addReplyTo($_SESSION['replay'], $_SESSION['information__replay']);
	       }    
	 if ($attch) {
		    foreach ($_SESSION['attch'] as $at) {  
		  $mail->addAttachment('../attch/'.$at.'');
		}
	    }  

	// Content
	$mail->isHTML(true);                              
	$mail->Subject = $subject;
	$mail->Body    = $message;

	if (!$mail->send()) {
		$er [] = $error++;
	}else{
		$su [] = $success++;
	}

	sleep(1);
	flush();
}
echo json_encode(array('total'=>$total,'error'=>$er,'success'=>$su));
