<?php require_once('styling/styling.php'); 
if ( $_SESSION['user_type'] != 1 ) {
	header("Location: ".$_SERVER['HTTP_REFERER']);
}?>

<title>Raleigh Restaurant and Bars</title>
	
</head>
<body>
	
        <div class="contentBox">
    	<div class="innerBox">
        	<div class="contentTitle">Raleigh Restaurants and Bars</div><br />
            <?php
            $conn =  Common::getConn();
			$query = "SELECT f.firm_id, f.name, f.phone, f.address, f.city, f.state, f.zip FROM firm f ORDER BY f.name";
			$result = $conn->query($query);
			?>
          <div class="contentText">
          <p>This page will enable you to select the Raleigh bar or restaurant to edit. If you do not see the business that you are attempting to edit,
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
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['phone']."</td>";
                    echo "<td>".$row['address']."</td>";
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
        <?php require_once("styling/footer.php"); ?>


