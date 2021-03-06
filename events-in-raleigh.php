<?php require_once('styling/styling.php'); ?>

<title>Events in Raleigh</title>
	
</head>
<body>
	
        <div class="contentBox">
    	<div class="innerBox">
        	<div class="contentTitle">Raleigh Events</div><br />
            <?php
            $conn =  Common::getConn();
			$day = strtolower( date('l'));
			$query = "SELECT f.firm_id, f.name, f.website, f.address, f.city, f.state, f.zip, ds.long_description, ds.short_description FROM firm f, ".$day."_events ds ";
			$query .= "WHERE f.verified = 1 AND f.firm_id = ds.firm_id ORDER BY f.name";
			$result = $conn->query($query);
			?>
          <div class="contentText">
          <p>Raleigh Nights is pleased to present you with a list of events in Raleigh! These are the recurring events such as a trivia night or a karaoke night. We also
          have a list of upcoming special events though, so please feel free to look at those as well! These are the events in Raleigh for today, but we also have 
          the events for every day of the week. If you want to see a particular day please select
          from the Raleigh events drop down menu. If you are a bar owner and you don't see your event on here, please log
          in and add it or, if you aren't a member yet, use the <a href="raleigh-restaurants-and-bars.php">owners tab</a>! Thanks for 
          visiting Raleigh Nights, the number one place to find fun events in Raleigh.</p>
          <br />
          <table>
            <tr>
                <th>Business Name</th>
                <th>Address</th>
                <th>Event</th>
                </tr>
                <?php 
				$populated = "";
				$unpopulated = "";
				while ( $row = $result->fetch_assoc() ) {
					$address = $row['address'].' '.$row['city'].', '.$row['state'].' '.$row['zip'];
					if ( Common::checkString($row['long_description']) == '' ) {
						$special = Common::checkString($row['short_description']);
					} else {
						$special = Common::checkString($row['long_description']);
					}
					if ( $special == '' ) {
						$unpopulated .= "<tr>";
						$unpopulated .= "<td><a href='".$row['website']."'>".$row['name']."</a></td>";
						$unpopulated .= "<td>".$address."</td>";
						$unpopulated .= "<td>".$special."</td>";
						$unpopulated .= "</tr>";
					} else {
						$populated .= "<tr>";
						$populated .= "<td><a href='".$row['website']."'>".$row['name']."</a></td>";
						$populated .= "<td>".$address."</td>";
						$populated .= "<td>".$special."</td>";
						$populated .= "</tr>";
					}
                }
				echo $populated;
				echo $unpopulated;
                mysqli_close($conn);
                ?>
              </table>
              <br />
        </div>
	</div>
        <?php require_once("styling/footer.php"); ?>


