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
        	<div class="contentTitle">Restaurants and Bars in Raleigh</div>
            <?php
            $conn =  mysqli_connect('ec2-54-213-248-248.us-west-2.compute.amazonaws.com', 'root', '>Password1', 'Raleigh_Nights' );
			$query = "";
			if ( $_SESSION['user_type'] == 1 ) {
				$query = "SELECT f.firm_id, f.name, f.phone, f.address, f.city, f.state, f.zip FROM firm f ORDER BY f.name";
			} else {
				$query = "SELECT f.firm_id, f.name, f.phone, f.address, f.city, uf.verified FROM firm f, user_firms uf WHERE ";
				$query .= "uf.email = ? AND f.firm_id = uf.firm_id ORDER BY f.verified, f.name";
			}
			if ( $stmt = mysqli_prepare($conn, $query) ) {
				$stmt->bind_param("s", $_SESSION['email'] );
				$stmt->execute();
				$result = $stmt->get_result();
			}
			?>
          <div class="contentText">
          <p>This is a list of all the restuarants and bars you are associated with on the Raleigh Nights app. If you don't see your Raleigh restaurant or
          bar on the list, please <a href="raleigh-restaurants-and-bars.php">claim your bar</a> here.</p>
          <br />
          <form action="raleigh-restaurant-or-bar-edit.php" method="post" id="edit-me">
              <table>
                <tr>
                    <th>Business Name</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Verify</th>
                    <th>Edit</th>
                </tr>
                <?php 
                while ( $row = $result->fetch_assoc() ) {
                    echo "<tr>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['phone']."</td>";
                    echo "<td>".$row['address']."</td>";
                    echo "<td>".$row['city']."</td>";
					if ( $row['verified'] == 0 ) {
                   		echo "<td><input type='button' onClick = 'verifyClick(".$row['firm_id'].")' value='Verified'</input></td>";
                    	echo "<td>Verify First</td>";
					} else {
						echo "<td>Verified</td>";
                    	echo "<td><button type='submit' name='submit' value=".$row['firm_id'].">Edit</input></td>";
					}
                    echo "</tr>";
                }
                mysqli_close($conn);
                ?>
              </table>
          </form>
         <script>
				function verifyClick(value) {
					// The rest of this code assumes you are not using a library.
					// It can be made less wordy if you use one.
					var form = document.createElement("form");
					form.setAttribute("method", "post");
					form.setAttribute("action","enter-confirmation-code.php");
					var hiddenField = document.createElement("input");
					hiddenField.setAttribute("type", "hidden");
					hiddenField.setAttribute("name", "firm_id");
					hiddenField.setAttribute("value", value);
					form.appendChild(hiddenField);
					document.body.appendChild(form);
					form.submit();
				}
		  </script>
         <br />
        </div>
	</div>
	<?php require_once('footer.php'); ?>
