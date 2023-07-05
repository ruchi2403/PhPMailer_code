<?php
//include "PHPMailer-master";
//require 'PHPMailer-master/PHPMailerAutoload.php';
use PHPMailer\PHPMailer\PHPMailer;

function sendMail($email_id, $body , $subject)
{ 

    require_once "PHPMailer/PHPMailer.php";
   // require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

            
        $mail = new PHPMailer(); // create a new object
		$mail->IsSMTP(); // enable SMTP
		$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true; // authentication enabled
		$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 465; // or 465 587 
		$mail->IsHTML(true);
		$mail->Username = "amit.verma@iphtechnologies.com";
		$mail->Password = "iphtech@123"; //pixgtgqfhfmpnshl
		$mail->SetFrom('amit.verma@iphtechnologies.com', 'Amit verma');
		$mail->Subject = $subject;
		$mail->Body = "Hello! This is reset password: ";
		$mail->Message  = "Hello! This is reset password: ";
		
		$mail->Body = $body;
		
		$mail->AddAddress($email_id);
 		if(!$mail->Send())
   		 {
   			 "Mailer Error: " . $mail->ErrorInfo;
   			 $returnString="message sending fail";
    		 }
   		 else
   		 {
   			// echo "Message has been sent";
   			  $retrunString= "success";
    		 } 

  return $body;  //returns the second argument passed into the function

}
sendMail('amit.verma@iphtechnologies.com', 'Test1', 'Testing1');

?>                                                                                                                                                                                                                                                 