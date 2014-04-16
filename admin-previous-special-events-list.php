<?php require_once('styling/styling.php'); 
if ( $_SESSION['user_type'] != 1 ) {
	header("Location: ".$_SERVER['HTTP_REFERER']);
}?>

<title>Special Events in Raleigh</title>
	
</head>
<body>
	
        <div class="contentBox">
    	<div class="innerBox">
        	<div class="contentTitle">Special Events in Raleigh</div><br />
            <?php
			$conn =  Common::getConn();
			$date = date('Y-m-d');
			$query = "SELECT se.event_id, se.event_name, se.event_date, se.short_description, f.name FROM special_events se, firm f ";
			$query .= "WHERE f.firm_id = se.firm_id AND se.event_date < '".$date."'";
			$result = $conn->query($query);
			?>
          <div class="contentText"><br />
          <p>This is a list of all the special events that have already ocurred. It's primarily designed so that you can simply change the date of an event
          that you may have on a semi-regular basis.</p>
          <br />
          <form action="admin-edit-upcoming-special-events.php" method="post" id="claim-me">
              <table>
                <tr>
                    <th>Business Name</th>
                    <th>Event Name</th>
                    <th>Event Date</th>
                    <th>Description</th>
                    <th>Edit</th>
                </tr>
                <?php 
                while ( $row = $result->fetch_assoc() ) {
					$date = date('m/d/y', strtotime($row['event_date']));
                    echo "<tr>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['event_name']."</td>";
                    echo "<td>".$date."</td>";
                    echo "<td>".$row['short_description']."</td>";
                    echo "<td><button type='submit' name='submit' value=".$row['event_id'].">Edit</input></td>";
                    echo "</tr>";
                }
                mysqli_close($conn);
                ?>
              </table>
         </form>
         <br />
        
		</div>
	</div>
         <?php require_once("styling/footer.php"); ?>
