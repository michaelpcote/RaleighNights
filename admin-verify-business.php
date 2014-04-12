<?php
	require_once("conf.php");
?>

<title>Raleigh Nights</title>
	<?php require_once("welcome-login.php"); ?>
</head>
<body>
	<?php if ( $_SESSION['user_type'] != 1 ) {
		header("Location: ".$_SERVER['HTTP_REFERER']);
	}
    require_once("navigation.php"); ?>
        <div class="contentBox">
    	<div class="innerBox">
        	<div class="contentTitle">Restaurants and Bars in Raleigh</div>
            <?php
            $conn =  mysqli_connect('ec2-54-213-248-248.us-west-2.compute.amazonaws.com', 'root', '>Password1', 'Raleigh_Nights' );
			$query = "SELECT f.firm_id, f.name, f.phone, f.website, f.address, f.city FROM firm f WHERE f.verified = 0 ORDER BY f.name";
			$result = $conn->query($query);
			?>
          <div class="contentText">
          <p>This page will enable you to edit the food specials for your bar or restuarant. If you do not see the business that you are attempting to edit,
          then <a href="new-restaurant-or-bar.php">Add a new restaurant or bar here</a></p>
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
          <form action="verify-business-process.php" method="post" id="delete">
          	<legend>Delete or Edit Businesses</legend>
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
        <?php require_once("footer.php"); ?>


