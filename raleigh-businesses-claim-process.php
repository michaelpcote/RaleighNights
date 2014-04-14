<?php
	require_once('Common.php');
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	if ( $_POST['password'] != $_POST['conf_password'] ) {
		ob_clean();
		header("Location: ".$_SERVER['HTTP_REFERER']);
		exit();
	}
	
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
	$query_user = "INSERT INTO users ( email, password, first_name, last_name, user_type, phone ) VALUES ( ?, ?, ?, ?, ?, ? )";
	$select_user = "SELECT email FROM users where email = ?";
	$user_firm = "INSERT INTO user_firms ( email, firm_id, confirmation_code ) VALUES ( ?, ?, ? )";
	
	if ( $stmt = mysqli_prepare($conn, $select_user) ) {
		$stmt->bind_param("s", $_POST['email'] );
		$stmt->execute();
		$result = $stmt->get_result();
		if ( !$myrow = $result->fetch_assoc() ) {
			if ( isset( $_POST['phone']) ) {
				$phone = $_POST['phone'];
			} else {
				$phone = 'null';
			}
			if ( $stmt = mysqli_prepare($conn, $query_user) ) {
				$stmt->bind_param("ssssis", $_POST['email'], hash('sha256',$_POST['password']), $_POST['first_name'], $_POST['last_name'], $_POST['employee_type'], 
																																				  $phone );
				$stmt->execute();
				exit();
			}
		}
	} 
	$valid = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$code = Common::get_random_string($valid, 5);
	echo $code;
	if ( $stmt = mysqli_prepare($conn, $user_firm) ) {
		$stmt->bind_param("sss", $_POST['email'], $_POST['firm_id'], $code );
		$stmt->execute();
		header("Location: raleigh-bar-or-restaurant-claim-success.php");
	} else {
		ob_clean();
		header("Location: ".$_SERVER['HTTP_REFERER']);
		mysqli_close($conn);
		exit();
	}

			
	
?>