<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/raleighnights.css" />
<title>Raleigh Nights</title>
</head>

<body>
    <div id="page">
        <div class="topNaviagationLink"><a href="index.php">Home</a></div>
        <div class="topNaviagationLink"><a href="raleigh-restaurants-and-bars.php">Claim Your Business</a></div>
        <div class="topNaviagationLink"><a href="index.html">Drink Specials</a></div>
        <div class="topNaviagationLink"><a href="index.html">Food Specials</a></div>
	    <div class="topNaviagationLink"><a href="index.html">Events</a></div>
	</div>
    <div id="mainPicture">
    	<div class="picture">
        	<div id="headerTitle">Raleigh Nights</div>
            <div id="headerSubtext">Connecting Restaurants and Bars with their Patrons</div>
        </div>
    </div>
        <div class="contentBox">
    	<div class="innerBox">
        	<div class="contentTitle">Restaurants and Bars in Raleigh</div>
            <?php
            $conn =  new mysqli('ec2-54-213-248-248.us-west-2.compute.amazonaws.com', 'root', '>Password1', 'Raleigh_Nights' );
			$query = "SELECT f.firm_id, f.name, f.phone, f.address, f.city, f.state, f.zip FROM firm f ORDER BY f.name";
			$result = $conn->query($query);
			?>
          <div class="contentText">
          <p>This is a list of all the restuarants and bars on the Raleigh Nights app. If you don't see your Raleigh restaurant or
          bar on our list, please feel free to scroll to the bottom and "Add a new restaurant or bar"</p>
          <br />
          <form action="raleigh-businesses-claim.php" method="post" id="claim-me">
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
        <a class="new_business" href="new-restaurant-or-bar.php">Add a new restaurant or bar</a></div>
		</div>
	</div>
        <div id="footer"><a href="http://www.aszx.net" target="_blank">web development</a> by <a target="_blank" href="http://www.bryantsmith.com">bryant smith</a></div>
</body>
</html>
