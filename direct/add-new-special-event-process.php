<?php
	require_once('../conf/conf.php');
	$conn =  Common::getConn();
	$user_firm = "INSERT INTO special_events ( firm_id, event_name, event_time, event_date, short_description, long_description ) VALUES ( ?, ?, ?, ?, ?, ? )";
	if ( isset( $_SESSION['firm_id'] ) ) {
		if ( $stmt = mysqli_prepare($conn, $user_firm) ) {
			if ( !isset($_POST['long_description']) ) {
				$ld = $_POST['short_description'];
			} else {
				$ld = $_POST['long_description'];
			}
			$time = strtotime($_POST['event_date']);
			$date = date('y-m-d', $time);
			if ( !isset($_POST['event_time']) ) {
				$time = '';
			} else {
				$time = $_POST['event_time'];
			}
			$stmt->bind_param("isssss", $_SESSION['firm_id'], $_POST['event_name'], $time, $date, $_POST['short_description'], $ld);
			$stmt->execute();
			header("Location: ".URL."add-new-special-success.php");
		} else {
			ob_clean();
			header("Location: ".$_SERVER['HTTP_REFERER']);
			mysqli_close($conn);
			exit();
		}
	} else {
		ob_clean();
		header("Location: ".$_SERVER['HTTP_REFERER']);
		mysqli_close($conn);
		exit();
	}
	

			
	
?>