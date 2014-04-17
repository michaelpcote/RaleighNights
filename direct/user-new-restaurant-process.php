<?php
	require_once('../conf/conf.php');
	require_once('../classes/Mail.php');
	$conn =  Common::getConn();
	$query_firm = "INSERT INTO firm ( firm_type, name, phone, address, city, state, zip ) VALUES ( ?, ?, ?, ?, ?, ?, ? )";
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
	
	$subject = "New user and firm";
	$to = array( 'michaelpcote@gmail.com', 'aisneddo@ncsu.edu', 'raleighnights@gmail.com' );
	$email = $_SESSION['first_name'].' '.$_SESSION['last_name']." with email ".$_SESSION['email'].' would like to be verified. They are ';
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
	$valid = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$code = Common::get_random_string($valid, 5);
	if ( $stmt = mysqli_prepare($conn, $user_firm) ) {
		$stmt->bind_param("sss", $_SESSION'email'], $firm_id, $code );
		$stmt->execute();
		header("Location: ".URL."new-restaurant-thanks.php");
	} else {
		ob_clean();
		header("Location: ".$_SERVER['HTTP_REFERER']);
		mysqli_close($conn);
		exit();
	}
	
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