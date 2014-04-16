<?php require_once('styling/styling.php'); 
if ( !isset($_SESSION['user_type']) ) {
	header("Location: ".$_SERVER['HTTP_REFERER']);
}?>

<title>Claim your Raleigh Business</title>
	
</head>
<body>
	
        <div class="contentBox">
    	<div class="innerBox">
        	<div class="contentTitle">Finish the Claim Process</div><br />
            <?php
            $conn =  Common::getConn();
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
                <p>Please enter the confirmation code for <em><strong><?php echo $name?></strong></em></p> <br />
            <form action="direct/enter-confirmation-code-process.php" method="post" id="log-in">
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
<?php require_once("styling/footer.php"); ?>