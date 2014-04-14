<?php
	require_once("conf.php");
?>

<title>Raleigh Nights</title>
	<?php require_once("welcome-login.php"); ?>
</head>
<body>
	<?php require_once("navigation.php"); ?>
        <div class="contentBox">
    	<div class="innerBox">
        	<div class="contentTitle">Raleigh Events</div><br />
            <?php
			$date = date('y-m-d');
            $conn =  mysqli_connect('ec2-54-213-248-248.us-west-2.compute.amazonaws.com', 'root', '>Password1', 'Raleigh_Nights' );
			$day = strtolower( date('l'));
			$query = "SELECT f.firm_id, f.name, f.address, f.city, f.state, f.zip, f.website, se.long_description, se.short_description, se.event_date, ";
			$query .= "se.event_name, se.event_time FROM firm f, special_events se ";
			$query .= "WHERE f.verified = 1 AND se.firm_id = f.firm_id AND se.event_date >= '".$date."' ORDER BY se.event_date";
			$result = $conn->query($query);
			?>
          <div class="contentText">
          <p>The events listed here are special events. If for example, you are looking for a band to see or an event for pediatric cancer, those events 
          can be found here! If you are looking a reocurring event upcoming, such as karaoke night or trivia night, 
          please find <a href=”events-in-raleigh.php”>your event here.</a> </p>
          <br />
          <?php 
				$populated = "";
				while ( $row = $result->fetch_assoc() ) {
					$address = $row['address'].' '.$row['city'].', '.$row['state'].' '.$row['zip'];
					if ( Common::checkString($row['long_description']) == '' ) {
						$special = Common::checkString($row['short_description']);
					} else {
						$special = Common::checkString($row['long_description']);
					}
					if ( $special != '' ) {
						$populated .= "<div class='special_event'>";
						$populated .= "<a href='".$row['website']."'>".$row['name']."</a><br />";
						$populated .= $address."<br />";
						$populated .= "Event date: ".$row['event_date'].' @ '.$row['event_time'].'<br />';
						$populated .= $special."<br />";
						$populated .= "</div><br />";
					}
                }
				if ( $populated == '' ) {
					echo "<div class='special_event'>There are no upcoming events</div>";
				} else {
					echo $populated;
				}
                mysqli_close($conn);
                ?>
              <br />
          <br />
        </div>
	</div>
        <?php require_once("footer.php"); ?>


