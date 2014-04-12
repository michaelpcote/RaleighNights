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
			$query = "";
			if ( $_SESSION['user_type'] == 1 ) {
				$query = "SELECT f.firm_id, f.name, f.phone, f.address, f.city, f.state, f.zip FROM firm f ORDER BY f.name";
			} else {
				$query = "SELECT f.firm_id, f.name, f.phone, f.address, f.city, f.state, f.zip FROM firm f, user_firms uf WHERE f.verified = 1 AND ";
				$query .= "uf.email = 'michaelpcote@gmail.com' AND f.firm_id = uf.firm_id ORDER BY f.name";
			}
			$result = $conn->query($query);
			?>
          <div class="contentText">
          <p>This page will enable you to edit the food specials for your bar or restuarant. If you do not see the business that you are attempting to add,
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
          <form action="admin-business-delete-process.php" method="post" id="delete">
          	<legend>Delete or Edit Businesses</legend>
              <table>
                <tr>
                    <th>Business Name</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Claim Me</th>
                    <th>Delete</th>
                </tr>
                <?php 
                while ( $row = $result->fetch_assoc() ) {
                    echo "<tr>";
                    echo "<td>".$row['name']."</th>";
                    echo "<td>".$row['phone']."</th>";
                    echo "<td>".$row['address']."</th>";
                   	echo "<td><input type='button' onClick = 'editClick(".$row['firm_id'].")' value='Edit'</input></td>";
					echo "<td><input type='checkbox' name='delete[]' value=".$row['firm_id'].">Delete</input></td>";
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


