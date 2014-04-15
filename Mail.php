<?php 
class Mail {
	
	function sendEmail( $to, $subject, $body ) {
		$Name = "Raleigh Nights"; //senders name
		$email = "raleighnights@gmail.com"; //senders e-mail adress
		$mail_body = $body; //mail body
		$subject = $subject; //subject
		$header = "From: ". $Name . " <" . $email . ">\r\n"; //optional headerfields
		if ( is_array( $to ) ) {
			foreach( $to as $v ) {
				$recipient = $v; //recipient
				mail($recipient, $subject, $mail_body, $header); //mail command :)
			}
		} else {
			$recipient = $to;
			mail($recipient, $subject, $mail_body, $header); //mail command :)
		}
	}
}

?>

