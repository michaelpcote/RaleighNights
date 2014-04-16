<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
	$conn =  new mysqli('ec2-54-186-207-86.us-west-2.compute.amazonaws.com', 'root', '>Password1', 'Raleigh_Nights' );
	date_default_timezone_set('America/New_York');
	$date = date('Y-m-d');
	$day = $_POST['day'];
	//$day = 'monday';
	$query = "SELECT f.firm_id, f.name, f.address, f.phone, f.city, f.state, f.zip, f.website, ";
	$query .= "f.".$day."_open, f.".$day."_close, f.latitude, f.longitude, ds.short_description AS ds_short, ds.long_description AS ds_long, ";
	$query .= "food.short_description AS food_short, food.long_description AS food_long, ev.short_description AS ev_short, ev.long_description AS ev_long, ";
	$query .= "se.event_date AS se_date, se.short_description AS se_short, se.long_description AS se_long FROM firm f ";
	$query .= "LEFT OUTER JOIN ".$day."_drink_specials ds ON f.firm_id = ds.firm_id ";
	$query .= "LEFT OUTER JOIN special_events se ON f.firm_id = se.firm_id AND se.event_date = '$date' ";
	$query .= "LEFT OUTER JOIN ".$day."_food_specials food ON f.firm_id = food.firm_id ";
	$query .= "LEFT OUTER JOIN ".$day."_events ev ON f.firm_id = ev.firm_id WHERE f.verified = 1 ORDER BY f.name";
	//echo $query;
	$result = $conn->query($query);
	$input;
	while ( $row = $result->fetch_assoc() ) {
		$input[] = $row;
	}
	$output = array( 'firm' => $input );
	print(json_encode($output));
	mysqli_close($conn);
?>

