<?php
	require_once("conf.php");
?>

<title>Raleigh Nights</title>
	<?php require_once("welcome-login.php"); ?>
</head>
<body>
    <?php 
	if ( !isset( $_SESSION['email'] ) ) {
		header("Location: ".$_SERVER['HTTP_REFERER']);
		exit();
	}
	require_once("navigation.php"); ?>
    	<div class="contentBox">
    	<div class="innerBox">
        	<div class="contentTitle">Restaurants and Bars in Raleigh</div>
            <?php
			$date = date('y-m-d');
            $conn =  mysqli_connect('ec2-54-213-248-248.us-west-2.compute.amazonaws.com', 'root', '>Password1', 'Raleigh_Nights' );
			$query = "SELECT se.event_id, se.event_name, se.event_date, se.short_description, f.name FROM special_events se, firm f, user_firms uf ";
			$query .= "WHERE uf.email = '".$_SESSION['email']."' AND uf.firm_id = se.firm_id AND uf.firm_id = f.firm_id AND se.event_date >= '".$date."'";
			$result = $conn->query($query);
			?>
          <div class="contentText">
          <p>This is a list of all the restuarants and bars on the Raleigh Nights app. If you don't see your Raleigh restaurant or
          bar on our list, please feel free to scroll to the bottom and "Add a new restaurant or bar"</p>
          <br />
          <form action="edit-upcoming-special-events.php" method="post" id="claim-me">
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
         <?php require_once("footer.php"); ?>
