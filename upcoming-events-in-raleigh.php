<?php require_once('styling/styling.php'); ?>

<title>Upcoming Events in Raleigh</title>
	
</head>
<body>
	
        <div class="contentBox">
    	<div class="innerBox">
        	<div class="contentTitle">Upcoming Events in Raleigh</div><br />
            <?php
            $conn =  Common::getConn();
			$day = strtolower( date('l'));
			$date = date('y-m-d');
			$query = "SELECT f.firm_id, f.name, f.address, f.city, f.state, f.zip, f.website, se.long_description, se.short_description, se.event_date, ";
			$query .= "se.event_name, se.event_time FROM firm f, special_events se ";
			$query .= "WHERE f.verified = 1 AND se.firm_id = f.firm_id AND se.event_date >= '".$date."' ORDER BY se.event_date";
			$result = $conn->query($query);
			?>
          <div class="contentText">
          <p>The events listed here are special events. If for example, you are looking for a band to see or an event for pediatric cancer, those events 
          can be found here! If you are looking a reocurring event upcoming, such as karaoke night or trivia night, 
          please find <a href="events-in-raleigh.php">your event here.</a> </p>
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
        <?php require_once("styling/footer.php"); ?>


