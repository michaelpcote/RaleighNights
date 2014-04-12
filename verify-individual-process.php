<?php
	session_start();
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	$conn =  mysqli_connect('ec2-54-213-248-248.us-west-2.compute.amazonaws.com', 'root', '>Password1', 'Raleigh_Nights' );
	$update = "UPDATE user_firms uf SET uf.sent_confirmation = 1 WHERE uf.email = ? AND uf.firm_id = ?";
	foreach ( $_POST['sent'] as $k=>$v ) {
		$vars = explode( '-', $_POST['sent'][$k] );
		if ( $stmt = mysqli_prepare($conn, $update) ) {
			$stmt->bind_param("ss", $vars[0], $vars[1] );
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