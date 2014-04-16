<?php require_once('styling/styling.php'); ?>

<title>Raleigh Drink Specials</title>
	
</head>
<body>
	
        <div class="contentBox">
    	<div class="innerBox">
        	<div class="contentTitle">Raleigh Drink Specials</div><br />
            <?php
            $conn =  Common::getConn();
			$day = strtolower( date('l'));
			$query = "SELECT f.firm_id, f.name, f.website, f.address, f.city, f.state, f.zip, ds.long_description, ds.short_description FROM firm f, ".$day."_drink_specials ds ";
			$query .= "WHERE f.verified = 1 AND f.firm_id = ds.firm_id ORDER BY f.name";
			$result = $conn->query($query);
			?>
          <div class="contentText">
          <p>Raleigh Nights is pleased to present you with a list of Raleigh drink specials! These are the drink specials in Raleigh for today, but we also have the drink
          specials for every other day of the week. If you want to see a particular day please select
          from the drink specials drop down menu. If you are a bar owner and you don't see your special on here, please log
          in and add it! Thanks for visiting Raleigh Nights, the number one place to find drink specials in Raleigh.</p>
          <br />
          <table>
            <tr>
                <th>Business Name</th>
                <th>Address</th>
                <th>Drink Special</th>
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
              <input type="submit" value="Submit">
              <br />
         </form>
         <br />
        </div>
	</div>
        <?php require_once("styling/footer.php"); ?>


