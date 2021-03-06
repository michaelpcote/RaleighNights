<?php
	require_once('../conf/conf.php');
	require_once('../classes/Common.php');
	$conn =  Common::getConn();
	$update = "UPDATE firm f SET f.name = ?, f.website = ?, f.phone = ?, f.address = ?, f.city = ?, f.state = ?, f.zip = ?, ";
	$update .= "f.monday_open = ?, f.monday_close = ?, f.tuesday_open = ?, f.tuesday_close = ?, f.wednesday_open = ?, ";
	$update .= "f.wednesday_close = ?, f.thursday_open = ?, f.thursday_close = ?, f.friday_open = ?, f.friday_close = ?, ";
	$update .= "f.saturday_open = ?, f.saturday_close = ?, f.sunday_open = ?, f.sunday_close = ? WHERE f.firm_id = ?";
	echo $update;
	if ( $stmt = mysqli_prepare($conn, $update) ) {
		$stmt->bind_param("ssssssssssssssssssssss", $_POST['business_name'], $_POST['website'], $_POST['phone'], $_POST['address'], 
						  $_POST['city'], $_POST['state'], $_POST['zip'], $_POST['monday_open'], $_POST['monday_close'], 
						  $_POST['tuesday_open'], $_POST['tuesday_close'], $_POST['wednesday_open'], $_POST['wednesday_close'], $_POST['thursday_open'], 
						  $_POST['thursday_close'], $_POST['friday_open'], $_POST['friday_close'], $_POST['saturday_open'], $_POST['saturday_close'], 
						  $_POST['sunday_open'], $_POST['sunday_close'], $_SESSION['firm_id'] );
			if ( $stmt->execute() ) {
				ob_clean();
				mysqli_close($conn);
				header("Location: ".URL."user-bar-or-restaurant-edit-success.php");
				exit();
			} else {
				ob_clean();
				mysqli_close($conn);
				header("Location: ".$_SERVER['HTTP_REFERER']);
			}
	}
?>