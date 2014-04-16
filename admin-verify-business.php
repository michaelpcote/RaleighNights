<?php require_once('styling/styling.php'); 
if ( $_SESSION['user_type'] != 1 ) {
	header("Location: ".$_SERVER['HTTP_REFERER']);
}?>

<title>Raleigh Restaurant and Bar Verification</title>
	
</head>
<body>
	
        <div class="contentBox">
    	<div class="innerBox">
        	<div class="contentTitle">Raleigh Restaurants and Bar Verification</div><br />
            <?php
            $conn =  Common::getConn();
			$query = "SELECT f.firm_id, f.name, f.phone, f.website, f.address, f.city FROM firm f WHERE f.verified = 0 ORDER BY f.name";
			$result = $conn->query($query);
			?>
          <div class="contentText">
          <p>This page will display every restaurant and bar in Raleigh that has not yet been verified. If you need to delete a business please
          <a href="admin-restaurant-and-bar-lists.php">delete the business</a> here.</p>
          <br />
          <script>
				function editClick(value) {
					// The rest of this code assumes you are not using a library.
					// It can be made less wordy if you use one.
					var form = document.createElement("form");
					form.setAttribute("method", "post");
					form.setAttribute("action","admin-raleigh-restaurant-or-bar-edit.php");
				
					var hiddenField = document.createElement("input");
					hiddenField.setAttribute("type", "hidden");
					hiddenField.setAttribute("name", "firm_id");
					hiddenField.setAttribute("value", value);
					form.appendChild(hiddenField);
					document.body.appendChild(form);
					form.submit();
				}
		  </script>
          <form action="direct/verify-business-process.php" method="post" id="delete">
          	<legend>Verify Businesses</legend>
              <table>
                <tr>
                    <th>Business Name</th>
                    <th>Phone Number</th>
                    <th>Website</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Verify</th>
                </tr>
                <?php 
                while ( $row = $result->fetch_assoc() ) {
                    echo "<tr>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['phone']."</td>";
					echo "<td>".$row['website']."</td>";
                    echo "<td>".$row['address']."</td>";
					echo "<td>".$row['city']."</td>";
                   	echo "<td><input type='checkbox' name='verified[]' value=".$row['firm_id']."> Verified</input></td>";
                    echo "</tr>";
                }
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


