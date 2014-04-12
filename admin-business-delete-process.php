<?php
	session_start();
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	$conn =  mysqli_connect('ec2-54-213-248-248.us-west-2.compute.amazonaws.com', 'root', '>Password1', 'Raleigh_Nights' );
	$delete = "DELETE FROM firm WHERE firm_id = ?";
	foreach ( $_POST['delete'] as $v ) {
		if ( $stmt = mysqli_prepare($conn, $delete) ) {
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