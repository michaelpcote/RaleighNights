<?php
	
	require_once("conf.php");

	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	$conn =  mysqli_connect('ec2-54-213-248-248.us-west-2.compute.amazonaws.com', 'root', '>Password1', 'Raleigh_Nights' );
	$monday = "UPDATE monday_".$_POST['type']." mon SET mon.short_description = ?, mon.long_description = ? WHERE mon.firm_id = ?";
	$tuesday = "UPDATE tuesday_".$_POST['type']." tues SET tues.short_description = ?, tues.long_description = ? WHERE tues.firm_id = ?";
	$wednesday = "UPDATE wednesday_".$_POST['type']." wed SET wed.short_description = ?, wed.long_description = ? WHERE wed.firm_id = ?";
	$thursday = "UPDATE thursday_".$_POST['type']." thurs SET thurs.short_description = ?, thurs.long_description = ? WHERE thurs.firm_id = ?";
	$friday = "UPDATE friday_".$_POST['type']." fri SET fri.short_description = ?, fri.long_description = ? WHERE fri.firm_id = ?";
	$saturday = "UPDATE saturday_".$_POST['type']." sat SET sat.short_description = ?, sat.long_description = ? WHERE sat.firm_id = ?";
	$sunday = "UPDATE sunday_".$_POST['type']." sun SET sun.short_description = ?, sun.long_description = ? WHERE sun.firm_id = ?";
	if ( isset( $_POST['monday_sd'] ) || isset( $_POST['monday_ld'] ) ) {
		if ( $stmt = mysqli_prepare($conn, $monday) ) {
			$stmt->bind_param("ssi", Common::checkEmpty($_POST['monday_sd']), Common::checkEmpty($_POST['monday_ld']), $_SESSION['firm_id'] );
			$stmt->execute();
		}
	}
	if ( isset( $_POST['tuesday_sd'] ) || isset( $_POST['tuesday_ld'] ) ) {
		if ( $stmt = mysqli_prepare($conn, $tuesday) ) {
			$stmt->bind_param("ssi", Common::checkEmpty($_POST['tuesday_sd']), Common::checkEmpty($_POST['tuesday_ld']), $_SESSION['firm_id'] );
			$stmt->execute();
		}
	}
	if ( isset( $_POST['wednesday_sd'] ) || isset( $_POST['wednesday_ld'] ) ) {
		if ( $stmt = mysqli_prepare($conn, $wednesday) ) {
			$stmt->bind_param("ssi", Common::checkEmpty($_POST['wednesday_sd']), Common::checkEmpty($_POST['wednesday_ld']), $_SESSION['firm_id'] );
			$stmt->execute();
		}
	}
	if ( isset( $_POST['thursday_sd'] ) || isset( $_POST['thursday_ld'] ) ) {
		if ( $stmt = mysqli_prepare($conn, $thursday) ) {
			$stmt->bind_param("ssi", Common::checkEmpty($_POST['thursday_sd']), Common::checkEmpty($_POST['thursday_ld']), $_SESSION['firm_id'] );
			$stmt->execute();
		}
	}
	if ( isset( $_POST['friday_sd'] ) || isset( $_POST['friday_ld'] ) ) {
		if ( $stmt = mysqli_prepare($conn, $friday) ) {
			$stmt->bind_param("ssi", Common::checkEmpty($_POST['friday_sd']), Common::checkEmpty($_POST['friday_ld']), $_SESSION['firm_id'] );
			$stmt->execute();
		}
	}
	if ( isset( $_POST['saturday_sd'] ) || isset( $_POST['saturday_ld'] ) ) {
		if ( $stmt = mysqli_prepare($conn, $saturday) ) {
			$stmt->bind_param("ssi", Common::checkEmpty($_POST['saturday_sd']), Common::checkEmpty($_POST['saturday_ld']), $_SESSION['firm_id'] );
			$stmt->execute();
		}
	}
	if ( isset( $_POST['sunday_sd'] ) || isset( $_POST['sunday_ld'] ) ) {
		if ( $stmt = mysqli_prepare($conn, $sunday) ) {
			$stmt->bind_param("ssi", Common::checkEmpty($_POST['sunday_sd']), Common::checkEmpty($_POST['sunday_ld']), $_SESSION['firm_id'] );
			$stmt->execute();
		}
	}
			ob_clean();
			header("Location: bar-or-restaurant-edit-success.php");
			mysqli_close($conn);
			exit();
	
?>