<?php
	require_once('conf.php');
	require_once('Mail.php');
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	/*
	if ( isset( $_POST['recaptcha_response_field'] ) ) {
	
	$url = 'http://www.google.com/recaptcha/api/verify';
	$fields_string = '';
	$fields = array( 'privatekey' => '6Ld3B8kSAAAAAP5pt1q75hOYinQ7XcYhJccYW2kv ',
					 'remoteip' => $_SERVER['REMOTE_ADDR'],
					 'challenge' => $_POST['recaptcha_challenge_field'],
					 'response' => $_POST['recaptcha_response_field']
					);
	
	foreach($fields as $key=>$value) { 
		$fields_string .= $key.'='.$value.'&'; 
	}
	$fields_string = substr($fields_string, 0,-1);
	$path = "/recaptcha/api/verify";
	$host = "www.google.com";
	$http_request = "POST $path HTTP/1.0\r\n";
	$http_request .= "Host: $host\r\n";
 	$http_request .= "Content-Type: application/x-www-form-urlencoded;\r\n";
 	$http_request .= "Content-Length: " . strlen($fields_string) . "\r\n";
 	$http_request .= "User-Agent: reCAPTCHA/PHP\r\n";
 	$http_request .= "\r\n";
 	$http_request .= $fields_string;
 	
 	$response = '';
 	if( false == ( $fs = @fsockopen($host, 80, $errno, $errstr, 10) ) ) {
 		die();
 	}
 	
 	fwrite($fs, $http_request);
 	
 	while ( !feof($fs) )
 	$response .= fgets($fs, 1160); // One TCP-IP packet
 	fclose($fs);
 	if ( strpos($response, 'true') !== false ) {
		//
	} else {
		//header("Location: ".$_SERVER['HTTP_REFERER']);
	}
}*/
	$conn =  mysqli_connect('ec2-54-213-248-248.us-west-2.compute.amazonaws.com', 'root', '>Password1', 'Raleigh_Nights' );
	$user_firm = "INSERT INTO user_firms ( email, firm_id, confirmation_code ) VALUES ( ?, ?, ? )";
	$firm = "SELECT f.name FROM firm f WHERE f.firm_id = ".$_POST['submit'];
	$result = $conn->query($firm); 
	if ( $row = $result->fetch_assoc() ) {
		$firm_name = $row['name']; 
		$subject = "New user for ".$firm_name;
		$to = array( 'michaelpcote@gmail.com', 'aisneddo@ncsu.edu', 'raleighnights@gmail.com' );
		$email = $_SESSION['first_name'].' '.$_SESSION['last_name']." with email ".$_SESSION['email'].' would like to be verified for '.$firm_name;
		Mail::sendEmail( $to, $subject, $email ); 
	} 
	if ( isset( $_SESSION['email'] ) ) {
		$valid = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$code = Common::get_random_string($valid, 5);
		echo $code;
		if ( $stmt = mysqli_prepare($conn, $user_firm) ) {
			$stmt->bind_param("sss", $_SESSION['email'], $_POST['submit'], $code );
			$stmt->execute();
			header("Location: raleigh-bar-or-restaurant-claim-success.php");
		} else {
			ob_clean();
			header("Location: ".$_SERVER['HTTP_REFERER']);
			mysqli_close($conn);
			exit();
		}
	}
	

			
	
?>