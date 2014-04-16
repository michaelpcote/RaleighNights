<?php
	require_once('../conf/conf.php');
	require_once('../classes/Mail.php');
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	$conn =  Common::getConn();
	$query_user = "SELECT u.user_type, u.first_name, u.last_name, u.email FROM users u WHERE u.email = ? AND u.password = ?";
	if ( $stmt = mysqli_prepare($conn, $query_user) ) {
		$stmt->bind_param("ss", $_POST['user_name'], hash('sha256',$_POST['password']) );
		$stmt->execute();
		$result = $stmt->get_result();
		if ( !$row = $result->fetch_assoc() ) {
			ob_clean();
			header("Location: ".$_SERVER['HTTP_REFERER']);
			$stmt->close();
			mysqli_close($conn);
			exit();
		} else {
			// store session data
			$_SESSION['first_name']=$row['first_name'];
			$_SESSION['last_name']=$row['last_name'];
			$_SESSION['user_type']=$row['user_type'];
			$_SESSION['email'] = $row['email'];
			if ( $row['user_type'] == 1 ) {
				header("Location: ".URL."admin-restaurant-and-bar-lists.php");
				$stmt->close();
				mysqli_close($conn);
				exit();
			} else {
				header("Location: ".URL."user-restaurant-and-bar-lists.php");
				$stmt->close();
				mysqli_close($conn);
				exit();
			}
		}
	} else {
		echo "Not working";
	}
	
?>