<?php require_once('styling/styling.php'); 
if ( !isset($_SESSION['user_type']) ) {
	header("Location: ".$_SERVER['HTTP_REFERER']);
}?>

<title>Raleigh Restaurant or Bar Edit</title>
	
</head>
<body>
	
        <div class="contentBox">
    	<div class="innerBox">
        	<div class="contentTitle">Edit Your Restaurant or Bar</div><br />
            <?php
            $conn =  Common::getConn();
			$_SESSION['firm_id'] = $_POST['submit'];
            $query = "SELECT * FROM firm f WHERE f.firm_id = ".$_POST['submit'];
			//echo $query
			$result = $conn->query($query);
			if( $row = $result->fetch_assoc() ) {
				$name = Common::checkString($row['name']);
				$_SESSION['name'] = $name;
				$website = Common::checkString($row['website']);
				$phone = Common::checkString($row['phone']);
				$address = Common::checkString($row['address']);
				$city = Common::checkString($row['city']);
				$state = Common::checkString($row['state']);
				$zip = Common::checkString($row['zip']);
				$monday_open = Common::checkString($row['monday_open']);
				$monday_close = Common::checkString($row['monday_close']);
				$tuesday_open = Common::checkString($row['tuesday_open']);
				$tuesday_close = Common::checkString($row['tuesday_close']);
				$wednesday_open = Common::checkString($row['wednesday_open']);
				$wednesday_close = Common::checkString($row['wednesday_close']);
				$thursday_open = Common::checkString($row['thursday_open']);
				$thursday_close = Common::checkString($row['thursday_close']);
				$friday_open = Common::checkString($row['friday_open']);
				$friday_close = Common::checkString($row['friday_close']);
				$saturday_open = Common::checkString($row['saturday_open']);
				$saturday_close = Common::checkString($row['saturday_close']);
				$sunday_open = Common::checkString($row['sunday_open']);
				$sunday_close = Common::checkString($row['sunday_close']);
				$verified = $row['verified'];
				mysqli_close($conn);
			}
			?>
            <div class="contentText">
            	<br />
                <?php if ( $verified ) { ?>
                	<p>Congratulations, <em><strong><?php echo $name?></strong></em> has been verified! You should be able to see it on the Raleigh Nights app.</p><br />
                <?php } else { ?>
                	<p>We're sorry, <em><strong><?php echo $name?></strong></em> has been not yet been verified. You are able to edit the information right now,
                    but will be unable to see <?php echo $name?> on Raleigh Nights yet. If you think that this is taking longer than it should, please feel
                    free to <a href="contact-us.php">contact us</a> and we will respond as quickly as we can!</p><br />
                <?php } ?>
            	<p>Please ensure that all of the information for <em><strong><?php echo $name?></strong></em> is correct! Use the navigation at the top
                of the page to edit the drink specials, food specials, and events at your restaunt</p> <br />
                
            <form action="direct/raleigh-businesses-edit-process.php" method="post" id="claim-me">
        		<p>Fields marked <span class="required">bold</span> are required.</p>
					<fieldset>
						<legend>Current Business Information</legend>
						<div class="field">
							<label for="business_name" class="required">Business Name:</label>
							<input type="text" name="business_name" id="business_name" maxlength="100" class="textfield required" value="<?php echo $name?>" required/>
						</div>
                        <div class="field">
							<label for="website" class="required">Website:</label>
							<input type="text" name="website" id="website" maxlength="100" class="large textfield required" value="<?php echo $website?>" required/>
						</div>
                        <div class="field">
							<label for="phone">Phone:</label>
							<input type="text" name="phone" id="phone" maxlength="15" class="medium textfield" value="<?php echo $phone?>" required/>
						</div>
						<div class="field">
							<label for="address" class="required">Address:</label>
							<input type="text" name="address" id="address" maxlength="100" class="large textfield required" value="<?php echo $address?>" required />
						</div>
						<div class="field">
							<label for="city" class="required">City:</label>
							<input type="text" name="city" id="city" maxlength="100" class="large email textfield required" value="<?php echo $city?>" required />
						</div>
                        <div class="field">
							<label for="state" class="required">State:</label>
                            <select id="state" maxlength="2" name="state">
                            	<option value="<?php echo $state ?>"><?php echo $state ?></option>
                                <option value="AL">AL</option>
                                <option value="AK">AK</option>
                                <option value="AZ">AZ</option>
                                <option value="AR">AR</option>
                                <option value="CA">CA</option>
                                <option value="CO">CO</option>
                                <option value="CT">CT</option>
                                <option value="DE">DE</option>
                                <option value="DC">DC</option>
                                <option value="FL">FL</option>
                                <option value="GA">GA</option>
                                <option value="HI">HI</option>
                                <option value="ID">ID</option>
                                <option value="IL">IL</option>
                                <option value="IN">IN</option>
                                <option value="IA">IA</option>
                                <option value="KS">KS</option>
                                <option value="KY">KY</option>
                                <option value="LA">LA</option>
                                <option value="ME">ME</option>
                                <option value="MD">MD</option>
                                <option value="MA">MA</option>
                                <option value="MI">MI</option>
                                <option value="MN">MN</option>
                                <option value="MS">MS</option>
                                <option value="MO">MO</option>
                                <option value="MT">MT</option>
                                <option value="NE">NE</option>
                                <option value="NV">NV</option>
                                <option value="NH">NH</option>
                                <option value="NJ">NJ</option>
                                <option value="NM">NM</option>
                                <option value="NY">NY</option>
                                <option value="NC">NC</option>
                                <option value="ND">ND</option>
                                <option value="OH">OH</option>
                                <option value="OK">OK</option>
                                <option value="OR">OR</option>
                                <option value="PA">PA</option>
                                <option value="RI">RI</option>
                                <option value="SC">SC</option>
                                <option value="SD">SD</option>
                                <option value="TN">TN</option>
                                <option value="TX">TX</option>
                                <option value="UT">UT</option>
                                <option value="VT">VT</option>
                                <option value="VA">VA</option>
                                <option value="WA">WA</option>
                                <option value="WV">WV</option>
                                <option value="WI">WI</option>
                                <option value="WY">WY</option>
                            </select>
                        </div>
                        <div class="field">
							<label for="zip" class="required">Zip:</label>
							<input type="text" name="zip" id="state" maxlength="100" class="large email textfield required" value="<?php echo $city?>" required />
						</div>
                        <div class="field">
							<label for="monday_open" >Monday Open:</label>
							<input type="text" name="monday_open" id="monday_open" maxlength="100" class="medium textfield required" value="<?php echo $monday_open?>" />
						</div>
                        <div class="field">
							<label for="monday_close" >Monday Close:</label>
							<input type="text" name="monday_close" id="monday_close" maxlength="100" class="medium textfield required" value="<?php echo $monday_close?>" />
						</div>
                        <div class="field">
							<label for="tuesday_open" >Tuesday Open:</label>
							<input type="text" name="tuesday_open" id="tuesday_open" maxlength="100" class="medium textfield required" value="<?php echo $tuesday_open?>" />
						</div>
                        <div class="field">
							<label for="tuesday_close" >Tuesday Close:</label>
							<input type="text" name="tuesday_close" id="tuesday_close" maxlength="100" class="medium textfield required" value="<?php echo $tuesday_close?>" />
						</div>
                        <div class="field">
							<label for="wednesday_open" >Wednesday Open:</label>
							<input type="text" name="wednesday_open" id="wednesday_open" maxlength="100" class="medium textfield required" value="<?php echo $wednesday_open?>"/>
						</div>
                        <div class="field">
							<label for="wednesday_close" >Wednesday Close:</label>
							<input type="text" name="wednesday_close" id="wednesday_close" maxlength="100" class="medium textfield required" value="<?php echo $wednesday_close?>"/>
						</div>
                        <div class="field">
							<label for="thursday_open" >Thursday Open:</label>
							<input type="text" name="thursday_open" id="thursday_open" maxlength="100" class="medium textfield required" value="<?php echo $thursday_open?>" />
						</div>
                        <div class="field">
							<label for="thursday_close" >Thursday Close:</label>
							<input type="text" name="thursday_close" id="thursday_close" maxlength="100" class="medium textfield required" value="<?php echo $thursday_close?>"/>
						</div>
                        <div class="field">
							<label for="friday_open" >Friday Open:</label>
							<input type="text" name="friday_open" id="friday_open" maxlength="100" class="medium textfield required" value="<?php echo $friday_open?>" />
						</div>
                        <div class="field">
							<label for="friday_close" >Friday Close:</label>
							<input type="text" name="friday_close" id="friday_close" maxlength="100" class="medium textfield required" value="<?php echo $friday_close?>" />
						</div>
                        <div class="field">
							<label for="saturday_open" >Saturday Open:</label>
							<input type="text" name="saturday_open" id="saturday_open" maxlength="100" class="medium textfield required" value="<?php echo $saturday_open?>" />
						</div>
                        <div class="field">
							<label for="saturday_close" >Saturday Close:</label>
							<input type="text" name="saturday_close" id="saturday_close" maxlength="100" class="medium textfield required" value="<?php echo $saturday_close?>"/>
						</div>
                        <div class="field">
							<label for="sunday_open" >Sunday Open:</label>
							<input type="text" name="sunday_open" id="sunday_open" maxlength="100" class="medium textfield required" value="<?php echo $sunday_open?>" />
						</div>
                        <div class="field">
							<label for="sunday_close" >Sunday Close:</label>
							<input type="text" name="sunday_close" id="sunday_close" maxlength="100" class="medium textfield required" value="<?php echo $sunday_close?>" />
						</div>
					</fieldset>
					<div class="buttons">
						<input type="submit" name="submit" id="submit" class="submit" value="Submit" />
					</div>
				</form>			
			</div>
		 </div>
         <?php require_once("styling/footer.php"); ?>
        