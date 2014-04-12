<?php
	session_start();
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	$conn =  mysqli_connect('ec2-54-213-248-248.us-west-2.compute.amazonaws.com', 'root', '>Password1', 'Raleigh_Nights' );
	$update = "UPDATE firm f SET f.name = ?, f.website = ?, f.phone = ?, f.address = ?, f.city = ?, f.state = ?, f.zip = ?, ";
	$update .= "f.monday_open = ?, f.monday_close = ?, f.tuesday_open = ?, f.tuesday_close = ?, f.wednesday_open = ?, ";
	$update .= "f.wednesday_close = ?, f.thursday_open = ?, f.thursday_close = ?, f.friday_open = ?, f.friday_close = ?, ";
	$update .= "f.saturday_open = ?, f.saturday_close = ?, f.sunday_open = ?, f.sunday_close = ? f.verified = ? WHERE f.firm_id = ?";
	if ( $stmt = mysqli_prepare($conn, $update) ) {
		$stmt->bind_param("ssssssssssssssssssssssi", $_POST['business_name'], $_POST['website'], $_POST['phone'], $_POST['address'], 
						  $_POST['city'], $_POST['state'], $_POST['zip'], $_POST['monday_open'], $_POST['monday_close'], 
						  $_POST['tuesday_open'], $_POST['tuesday_close'], $_POST['wednesday_open'], $_POST['wednesday_close'], $_POST['thursday_open'], 
						  $_POST['thursday_close'], $_POST['friday_open'], $_POST['friday_close'], $_POST['saturday_open'], $_POST['saturday_close'], 
						  $_POST['sunday_open'], $_POST['sunday_close'], $_POST['verified'], $_SESSION['firm_id'] );
			$stmt->execute();
			ob_clean();
			header("Location: admin-bar-or-restaurant-edit-success.php");
			mysqli_close($conn);
			exit();
	}
?>