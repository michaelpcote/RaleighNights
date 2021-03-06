<?php require_once('styling/styling.php'); 
if ( !isset($_SESSION['user_type']) ) {
	header("Location: ".$_SERVER['HTTP_REFERER']);
}?>

<title>Raleigh Restaurants and Bars</title>
	
</head>
<body>
	
        <div class="contentBox">
    	<div class="innerBox">
        	<div class="contentTitle">Raleigh Restaurants and Bars</div><br />
            <?php
            $conn =  Common::getConn();
			$query = "SELECT f.firm_id, f.name, f.phone, f.address, f.city, f.state, f.zip FROM firm f WHERE f.verified = 1 AND f.firm_id ";
			$query .= "NOT IN ( SELECT uf.firm_id FROM user_firms uf WHERE uf.email = 'test@email.com' ) ORDER BY f.name";
			$result = $conn->query($query);
			?>
          <div class="contentText">
          <p>This is a list of all the restuarants and bars on the Raleigh Nights app. If you don't see your Raleigh restaurant or
          bar on our list, please feel free to scroll to the bottom and "Add a new restaurant or bar"</p>
          <br />
          <form action="direct/user-raleigh-businesses-claim-process.php" method="post" id="claim-me">
              <table>
                <tr>
                    <th>Business Name</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zip</th>
                    <th>Claim Me</th>
                </tr>
                <?php 
                while ( $row = $result->fetch_assoc() ) {
                    echo "<tr>";
                    echo "<td>".$row['name']."</th>";
                    echo "<td>".$row['phone']."</th>";
                    echo "<td>".$row['address']."</th>";
                    echo "<td>".$row['city']."</th>";
                    echo "<td>".$row['state']."</th>";
                    echo "<td>".$row['zip']."</th>";
                    echo "<td><button type='submit' name='submit' value=".$row['firm_id'].">Claim me!</input></td>";
                    echo "</tr>";
                }
                mysqli_close($conn);
                ?>
              </table>
         </form>
         <br />
        <a class="new_business" href="user-new-restaurant-or-bar.php">Add a new restaurant or bar</a></div>
		</div>
	</div>
         <?php require_once("footer.php"); ?>
