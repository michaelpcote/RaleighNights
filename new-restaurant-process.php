<?php
	require_once('conf.php');
	require_once('Mail.php');
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
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
}
	$conn =  mysqli_connect('ec2-54-213-248-248.us-west-2.compute.amazonaws.com', 'root', '>Password1', 'Raleigh_Nights' );
	$query_firm = "INSERT INTO firm ( firm_type, name, phone, address, city, state, zip ) VALUES ( ?, ?, ?, ?, ?, ?, ? )";
	$query_user = "INSERT INTO users ( email, password, first_name, last_name, user_type, phone ) VALUES ( ?, ?, ?, ?, ?, ? )";
	$select_user = "SELECT email FROM users where email = ?";
	$user_firm = "INSERT INTO user_firms ( email, firm_id, confirmation_code ) VALUES ( ?, ?, ? )";
	
	if ($stmt = mysqli_prepare($conn, $query_firm) ) {
		$stmt->bind_param("issssss", $_POST['firm_type'], $_POST['company'], $_POST['bus_phone'], $_POST['address'], $_POST['city'], $_POST['state'], $_POST['zip']);
		$stmt->execute();
		$firm_id = $stmt->insert_id;
	} else {
		ob_clean();
		header("Location: ".$_SERVER['HTTP_REFERER']);
		mysqli_close($conn);
		exit();
	}
	if ( $stmt = mysqli_prepare($conn, $select_user) ) {
		$stmt->bind_param("s", $_POST['email'] );
		$stmt->execute();
		$result = $stmt->get_result();
		if ( !$myrow = $result->fetch_assoc() ) {
			if ( $stmt = mysqli_prepare($conn, $query_user) ) {
				$stmt->bind_param("ssssis", $_POST['email'], hash('sha256',$_POST['password']), $_POST['first_name'], $_POST['last_name'], $_POST['employee_type'], $_POST['phone'] );
				$stmt->execute();
			}
		}
	}
	$firm_name = $row['name']; 
	$subject = "New user and firm";
	$to = array( 'michaelpcote@gmail.com', 'aisneddo@ncsu.edu', 'raleighnights@gmail.com' );
	$email = $_POST['first_name'].' '.$_POST['last_name']." with email ".$_POST['email'].' would like to be verified. They are ';
	$email .= 'also attempting to create the new restaurant or bar '.$_POST['company'];
	Mail::sendEmail( $to, $subject, $email ); 
	
	$drinks = "drink_specials";
	$food = "food_specials";
	$events = "events";
	for ( $i = 0; $i < 7; $i++ ) {
		$q = insert($drinks, $i);
		if ( $stmt = mysqli_prepare($conn, $q) ) {
			$stmt->bind_param("s", $firm_id );
			$stmt->execute();
		}
	}
	for ( $i = 0; $i < 7; $i++ ) {
		$q = insert($food, $i);
		if ( $stmt = mysqli_prepare($conn, $q) ) {
			$stmt->bind_param("s", $firm_id );
			$stmt->execute();
		}
	}
	for ( $i = 0; $i < 7; $i++ ) {
		$q = insert($events, $i);
		if ( $stmt = mysqli_prepare($conn, $q) ) {
			$stmt->bind_param("s", $firm_id );
			$stmt->execute();
		}
	}
	$address = $_POST['address'].', '.$_POST['city'].', '.$_POST['state'].' '.$_POST['zip'];
	echo $address;
	$output = Common::getLatLong($address);
	echo $output[0];
	echo $output[1];
	$valid = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$code = Common::get_random_string($valid, 5);
	echo $code;
	
	/*
	if ( $stmt = mysqli_prepare($conn, $user_firm) ) {
		$stmt->bind_param("sss", $_POST['email'], $firm_id, $code );
		$stmt->execute();
		header("Location: new-restaurant-thanks.php");
	} else {
		ob_clean();
		header("Location: ".$_SERVER['HTTP_REFERER']);
		mysqli_close($conn);
		exit();
	} */
	
	function insert( $string, $i ) {
		switch ($i) {
    case 0:
        return "INSERT INTO monday_".$string." ( firm_id ) VALUES ( ? )";
    case 1:
       return "INSERT INTO tuesday_".$string." ( firm_id ) VALUES ( ? )";
    case 2:
        return "INSERT INTO wednesday_".$string." ( firm_id ) VALUES ( ? )";
	case 3:
		return "INSERT INTO thursday_".$string." ( firm_id ) VALUES ( ? )";
	case 4:
		return "INSERT INTO friday_".$string." ( firm_id ) VALUES ( ? )";
	case 5:
		return "INSERT INTO saturday_".$string." ( firm_id ) VALUES ( ? )";
	case 6:
		return "INSERT INTO sunday_".$string." ( firm_id ) VALUES ( ? )";
	}
}
			
	
?>