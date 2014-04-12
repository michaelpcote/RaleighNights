<?php
	session_start();
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	$conn =  mysqli_connect('ec2-54-213-248-248.us-west-2.compute.amazonaws.com', 'root', '>Password1', 'Raleigh_Nights' );
	$update = "UPDATE firm f SET f.verified = 1 WHERE f.firm_id = ?";
	foreach ( $_POST['verified'] as $v ) {
		if ( $stmt = mysqli_prepare($conn, $update) ) {
			$stmt->bind_param("s", $v );
			if ( !$stmt->execute() ) {
				exit();
			}
		} else {
			echo $conn->errno;
			echo "HERE";
			exit();
		}
	}
	ob_clean();
	header("Location: ".$_SERVER['HTTP_REFERER']);
	mysqli_close($conn);
	exit();
	
?>