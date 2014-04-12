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
        	<div class="contentTitle">Log in to Raleigh Nights</div>
            <div class="contentText">
            	<br />
                <p>Please log in to Raleigh Nights to edit your restaurant or bar! If you don't have an account yet or want to claim another
                restaurnt or bar, please follow <a href="raleigh-restaurants-and-bars.php">this link</a></p> <br />
            <form action="log-in-process.php" method="post" id="log-in">
        		<p>Fields marked <span class="required">bold</span> are required.</p>
					<fieldset>
						<legend>Log In</legend>
                        <div class="field">
							<label for="user_name" class="required">User Name:</label>
							<input type="text" name="user_name" id="user_name" maxlength="100" class="textfield required" value="" required />
						</div>
						<div class="field">
							<label for="password" class="required">Password:</label>
                            <input name="password" id="password" type="password" />
						</div>
					</fieldset>
					<div class="buttons">
						<input type="submit" name="submit" id="submit" class="submit" value="Submit" />
					</div>
				</form>			
			</div>
		 </div>
<?php require_once("footer.php"); ?>