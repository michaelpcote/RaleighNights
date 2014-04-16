<?php
	require_once('../conf/conf.php');
	require_once('../classes/Common.php');
	$conn =  Common::getConn();
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
			header("Location: ".URL."user-restaurant-and-bar-lists.php");
			$stmt->close();
			mysqli_close($conn);
			exit();
		}
	} else {
		echo "Not working";
	}
	
?>