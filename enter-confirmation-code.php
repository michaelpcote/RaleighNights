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
        	<?php 
				$conn =  mysqli_connect('ec2-54-213-248-248.us-west-2.compute.amazonaws.com', 'root', '>Password1', 'Raleigh_Nights' );
				$query = "SELECT f.name FROM firm f WHERE f.firm_id = ?";
				if ( $stmt = mysqli_prepare($conn, $query) ) {
					$stmt->bind_param("i", $_POST['firm_id'] );
					$stmt->execute();
					$result = $stmt->get_result();
					$name = "";
					if ( $row = $result->fetch_assoc() ) {
						$name = $row['name'];
					}
				}
			?>
        	<div class="contentTitle">Log in to Raleigh Nights</div>
            <div class="contentText">
            	<br />
                <p>Please enter the confirmation code for <?php echo $name?></p> <br />
            <form action="enter-confirmation-code-process.php" method="post" id="log-in">
        		<p>Fields marked <span class="required">bold</span> are required.</p>
					<fieldset>
						<legend>Confirmation Code</legend>
                        <div class="field">
							<label for="code" class="required">Code:</label>
							<input type="text" name="code" id="code" maxlength="100" class="textfield required" value="" required />
						</div>
                        <input type="hidden" name="firm_id" value="<?php echo $_POST['firm_id']; ?>" />
					</fieldset>
					<div class="buttons">
						<input type="submit" name="submit" id="submit" class="submit" value="Submit" />
					</div>
				</form>			
			</div>
		 </div>
<?php require_once("footer.php"); ?>