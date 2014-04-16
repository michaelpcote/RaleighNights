<?php
	require_once('../conf/conf.php');
	$conn =  Common::getConn();
	$user_firm = "UPDATE special_events se SET se.event_name = ?, se.event_time = ?, se.event_date = ?, se.short_description = ?, se.long_description = ? ";
	$user_firm .= "WHERE se.event_id = ".$_POST['event_id'];
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
			$stmt->bind_param("sssss", $_POST['event_name'], $time, $date, $_POST['short_description'], $ld);
			$stmt->execute();
			header("Location: ".URL."edit-special-success.php");
		} else {
			ob_clean();
			header("Location: ".$_SERVER['HTTP_REFERER']);
			mysqli_close($conn);
			exit();
		}
	
	

			
	
?>