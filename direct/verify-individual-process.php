<?php
	require_once('../conf/conf.php');
	$conn =  Common::getConn();
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