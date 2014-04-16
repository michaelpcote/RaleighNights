<?php
	require_once("../conf/conf.php");
	require_once("../classes/Common.php");
	$conn =  Common::getConn();
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