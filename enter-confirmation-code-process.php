<?php
	session_start();
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	$conn =  mysqli_connect('ec2-54-213-248-248.us-west-2.compute.amazonaws.com', 'root', '>Password1', 'Raleigh_Nights' );
	$query_user = "UPDATE user_firms uf SET verified = 1 WHERE uf.email = ? AND uf.firm_id = ? AND uf.confirmation_code = ?";	
	if ( $stmt = mysqli_prepare($conn, $query_user) ) {
		$stmt->bind_param("sis", $_SESSION['email'], $_POST['firm_id'], $_POST['code'] );
		$stmt->execute();
		$rowaffected = $stmt->affected_rows;
		if ( $rowaffected == 0 ) {
			ob_clean();
			header("Location: ".$_SERVER['HTTP_REFERER']);
			$stmt->close();
			mysqli_close($conn);
			exit();
		} else {
			header("Location: restaurant-and-bar-lists.php");
			$stmt->close();
			mysqli_close($conn);
			exit();
		}
	} else {
		echo "Not working";
	}
	
?>