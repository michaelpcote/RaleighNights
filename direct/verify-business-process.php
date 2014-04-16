<?php
	require_once('../conf/conf.php');
	$conn =  Common::getConn();
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