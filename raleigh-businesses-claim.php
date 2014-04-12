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
        	<div class="contentTitle">Thanks for claiming your business!</div>
            <?php
            $conn =  new mysqli('ec2-54-213-248-248.us-west-2.compute.amazonaws.com', 'root', '>Password1', 'Raleigh_Nights' );
			$query = "SELECT f.firm_id, f.name, f.phone, f.address, f.city, f.state, f.zip FROM firm f WHERE f.firm_id = ".$_POST['submit'];
			//echo $query
			$result = $conn->query($query);
			if( $row = $result->fetch_assoc() ) {
			?>
            <div class="contentText">
            	<br />
            	<p>Thank you for claiming <em><strong><?php echo $row['name']?></strong></em>! To ensure that no one falsely claims your business, we will call 
                your restaurnt or bar and give a confirmation code that you can use to log on with. After the claim process is finished, you will be able to completely 
                edit your business. Please only enter in a new phone number if the current business phone number is incorrect. The phone number must be the place of 
                business. Once you get the confirmation code, you will be able to log on using the email that you enter with the confirmation code.</p> <br />
              <table>
              	<tr>
                	<th>Business Name</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zip</th>
                </tr>
                <?php
                	echo "<tr>";
                    echo "<td>".$row['name']."</th>";
                    echo "<td>".$row['phone']."</th>";
                    echo "<td>".$row['address']."</th>";
                    echo "<td>".$row['city']."</th>";
                    echo "<td>".$row['state']."</th>";
                    echo "<td>".$row['zip']."</th>";
                    echo "</tr>"; 
                } 
                mysqli_close($conn);
                ?>
            </table>
            <br />
            <form action="raleigh-businesses-claim-process.php" method="post" id="claim-me">
        		<p>Fields marked <span class="required">bold</span> are required.</p>
					<fieldset>
						<legend>Contact Information</legend>
						<div class="field">
							<label for="first_name" class="required">First Name:</label>
							<input type="text" name="first_name" id="first_name" maxlength="100" class="textfield required" value="" required />
						</div>
						<div class="field">
							<label for="last_name" class="required">Last Name:</label>
							<input type="text" name="last_name" id="last_name" maxlength="100" class="textfield required" value="" required />
						</div>
						<div class="field">
							<label for="email" class="required">Email Address:</label>
							<input type="text" name="email" id="email" maxlength="100" class="large email textfield required" value="" required />
						</div>
                        <div class="field">
							<label for="phone">Phone:</label>
							<input type="text" name="phone" id="phone" maxlength="15" class="medium textfield" value="" />
						</div>
                        <div class="field">
                        	<label for="employee_type" class="required">Are you a(n):</label>
							<select name="employee_type" id="employee_type" maxlength="20" >
                            	<option value="2">Owner</option>
                                <option value="3">Manager</option>
                                <option value="4">Other Employee</option>
                            </select>
                        </div>
					</fieldset>
					<div class="buttons">
						<input type="submit" name="submit" id="submit" class="submit" value="Submit" />
					</div>
				</form>			
			</div>
		 </div>
         <?php require_once("footer.php"); ?>