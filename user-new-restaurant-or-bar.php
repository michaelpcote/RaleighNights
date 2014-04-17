<?php require_once('styling/styling.php'); 
if ( !isset($_SESSION['user_type']) ) {
	header("Location: ".$_SERVER['HTTP_REFERER']);
}?>

<title>Add a New Raleigh Restaurant or Bar</title>
</head>
<body>
    <div class="contentBox">
    	<div class="innerBox">
        	<div class="contentTitle">Create a new Raleigh Nights Bar or Restaurant</div>
            <div class="contentText">
            	<br />
            	<p>Thank you for being a part of Raleigh Nights! </p> <br />
                <p>After you enter in your information, you will receive a call at your
                place of business with a confirmation code. You can use your email and the confirmation code to log in and start interacting
                with your patrons!</p> <br />
            <form action="direct/user-new-restaurant-process.php" onSubmit="return validateForm()" method="post" id="add-a-new-restuant-or-bar">
        		<p>Fields marked <span class="required">bold</span> are required.</p>
					<fieldset>
						<legend>Business Information</legend>
                    	<div class="field">
							<label for="company" class="required">Company Name:</label>
							<input type="text" name="company" id="company" maxlength="100" class="textfield required" value="" required />
						</div>
						<div class="field">
							<label for="bus_phone" class="required">Business Phone:</label>
							<input type="text" name="bus_phone" id="bus_phone" maxlength="15" class="medium textfield" value="" required />
						</div>
                        <div class="field">
							<label for="address" class="required">Street Address:</label>
							<input type="text" name="address" id="address" maxlength="100" class="textfield required" value="" required />
						</div>
                        <div class="field">
							<label for="city" class="required">City:</label>
							<input type="text" name="city" id="city" maxlength="100" class="textfield required" value="" required />
						</div>
                        <div class="field">
							<label for="state" class="required">State:</label>
                            <select id="state" maxlength="2" name="state">
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
                                <option value="NC" selected>NC</option>
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
							<input type="text" name="zip" id="zip" maxlength="100" class="textfield required" value="" required />
						</div>
                        <div class="field">
							<label for="firm_type" class="required">Are you primarily a bar?</label>
							<select name="firm_type" id="firm_type" maxlength="100" value="" >
                            	<option value="1">Yes</option>
                                <option value="2">No</option>
                            </select>
						</div>
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
