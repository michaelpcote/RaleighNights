<?php require_once('styling/styling.php'); ?>

<title>Raleigh Food Specials - Thursday</title>
	
</head>
<body>
	
        <div class="contentBox">
    	<div class="innerBox">
        	<div class="contentTitle">Thanks for claiming your business!</div><br />
            <?php
            $conn =  Common::getConn();
			if ( isset($_POST['submit']) ) {
				$_SESSION['firm_id'] = $_POST['submit'];
			} else if ( !isset($_SESSION['firm_id'] )) {
				ob_clean();
				header("Location: raleigh-restaurants-and-bars.php");
				exit();
			}
            $query = "SELECT f.firm_id, f.name, f.phone, f.address, f.city, f.state, f.zip FROM firm f WHERE f.firm_id = ".$_SESSION['firm_id'];
			//echo $query
			$result = $conn->query($query);
			if( $row = $result->fetch_assoc() ) {
			?>
            <div class="contentText">
            	<br />
            	<p>Thank you for claiming <em><strong><?php echo $row['name']?></strong></em>! To ensure that no one falsely claims your business, we will call 
                your restaurnt or bar and give a confirmation code that you can use to log on with. After the claim process is finished, you will be able to completely 
                edit your business drink specials, food specials, events, and general contact information. Please only enter in a new phone number if the current 
                business phone number, listed below, is incorrect. The phone number must be the place of business. Immediately after this you will be able to log on 
                using your email as your username and your chosen password. Once you have received the confirmation code, log on and use it to finish 
                the claim process.</p> <br />
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
            <form action="direct/raleigh-businesses-claim-process.php" onSubmit="return validateForm()" method="post" id="claim-me">
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
                        <div class="field">
							<label for="password" class="required">Password:</label>
							<input name="password" id="password" type="password" required/>
						</div>
                        <div class="field">
							<label for="conf_password" class="required">Retype Password:</label>
							<input name="conf_password" id="conf_password" type="password" required/>
						</div>
                        <input type="hidden" name="firm_id" value="<?php echo $_SESSION['firm_id'];?>" />
					</fieldset>
					<div class="buttons">
						<input type="submit" name="submit" id="submit" class="submit" value="Submit" />
					</div>
				</form>	
                <script>
				 function validateForm() {
					if (password.value != conf_password.value) { 
					   alert("Your password and confirmation password do not match.");
					   cpassword.focus();
					   return false; 
					}
				}
				</script>			
			</div>
		 </div>
         <?php require_once("styling/footer.php"); ?>
