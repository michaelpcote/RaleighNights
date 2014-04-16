<?php require_once('styling/styling.php'); 
if ( !isset($_SESSION['user_type']) ) {
	header("Location: ".$_SERVER['HTTP_REFERER']);
}?>

<title>Edit Raleigh Food Specials</title>
</head>
<body>
	<div class="contentBox">
    	<div class="innerBox">
        	<div class="contentTitle">Edit Your Food Specials</div>
            <?php
			if ( isset($_SESSION['firm_id'])) {
            $conn =  Common::getConn();
			$query = "SELECT f.name, mon.long_description AS mon_ld, tues.long_description AS tues_ld, wed.long_description AS wed_ld, ";
			$query .= "thurs.long_description AS thurs_ld, fri.long_description AS fri_ld, sat.long_description AS sat_ld, ";
			$query .= "sun.long_description AS sun_ld, mon.short_description AS mon_sd, tues.short_description AS tues_sd, ";
			$query .= "wed.short_description AS wed_sd, thurs.short_description AS thurs_sd, fri.short_description AS fri_sd, ";
			$query .= "sat.short_description AS sat_sd, sun.short_description AS sun_sd FROM firm f ";
			$query .= "LEFT OUTER JOIN monday_food_specials mon ON f.firm_id = mon.firm_id ";
			$query .= "LEFT OUTER JOIN tuesday_food_specials tues ON f.firm_id = tues.firm_id ";
			$query .= "LEFT OUTER JOIN wednesday_food_specials wed ON f.firm_id = wed.firm_id ";
			$query .= "LEFT OUTER JOIN thursday_food_specials thurs ON f.firm_id = thurs.firm_id ";
			$query .= "LEFT OUTER JOIN friday_food_specials fri ON f.firm_id = fri.firm_id ";
			$query .= "LEFT OUTER JOIN saturday_food_specials sat ON f.firm_id = sat.firm_id ";
			$query .= "LEFT OUTER JOIN sunday_food_specials sun ON f.firm_id = sun.firm_id ";
			$query .= "WHERE f.firm_id = ".$_SESSION['firm_id'];
			$result = $conn->query($query);
			?>
          <div class="contentText">
          <p>This page will enable you to edit the drink specials. If this is not the restuarnt or bar that you would like to edit food specials for, please
          <a href="new-restaurant-or-bar.php">choose a new restaurant or bar here</a></p>
          <br />
          <?php 
          	if ( $row = $result->fetch_assoc() ) {
            	$name = Common::checkString($row['name']);
				$monday_sd = Common::checkString($row['mon_sd']);
				$monday_ld = Common::checkString($row['mon_ld']);
				$tuesday_sd = Common::checkString($row['tues_sd']);
				$tuesday_ld = Common::checkString($row['tues_ld']);
				$wednesday_sd = Common::checkString($row['wed_sd']);
				$wednesday_ld = Common::checkString($row['wed_ld']);
				$thursday_sd = Common::checkString($row['thurs_sd']);
				$thursday_ld = Common::checkString($row['thurs_ld']);
				$friday_sd = Common::checkString($row['fri_sd']);
				$friday_ld = Common::checkString($row['fri_ld']);
				$saturday_sd = Common::checkString($row['sat_sd']);
				$saturday_ld = Common::checkString($row['sat_ld']);
				$sunday_sd = Common::checkString($row['sun_sd']);
				$sunday_ld = Common::checkString($row['sun_ld']);
            }
            mysqli_close($conn);
        ?>
        <form action="direct/edit-specials-process.php" method="post" id="delete">
        	<fieldset>
                <legend>Edit food Specials for <?php echo $name ?></legend>
                <div class="field">
					<label for="monday_sd" >Monday - Short Description:</label>
					<input type="text" name="monday_sd" id="monday_sd" maxlength="100" class="descriptions" value="<?php echo $monday_sd?>" />
				</div>
                <div class="field">
					<label for="monday_ld" >Monday - Long Description:</label>
                     <input type="text" name="monday_ld" id="monday_ld" maxlength="300" value="<?php echo $monday_ld?>" />
				</div>
                <div class="field">
					<label for="tuesday_sd" >Tuesday - Short Description:</label>
					<input type="text" name="tuesday_sd" id="tuesday_sd" maxlength="100" value="<?php echo $tuesday_sd?>" />
				</div>
                <div class="field">
					<label for="tuesday_ld">Tuesday - Long Description:</label>
					<input type="text" name="tuesday_ld" id="tuesday_ld" maxlength="300" value="<?php echo $tuesday_ld?>" />
				</div>
				<div class="field">
					<label for="wednesday_sd" >Wednesday - Short Description:</label>
					<input type="text" name="wednesday_sd" id="wednesday_sd" maxlength="100" value="<?php echo $wednesday_sd?>" />
				</div>
				<div class="field">
					<label for="wednesday_ld" >Wednesday - Long Description:</label>
					<input type="text" name="wednesday_ld" id="wednesday_ld" maxlength="300" value="<?php echo $wednesday_ld?>" />
				</div>
                <div class="field">
					<label for="thursday_sd" >Thursday - Short Description:</label>
					<input type="text" name="thursday_sd" id="thursday_sd" maxlength="100" value="<?php echo $thursday_sd?>" />
				</div>
                <div class="field">
					<label for="thursday_ld" >Thursday - Long Description:</label>
					<input type="text" name="thursday_ld" id="thursday_ld" maxlength="300" value="<?php echo $thursday_ld?>" />
				</div>
                <div class="field">
					<label for="friday_sd" >Friday - Short Description:</label>
					<input type="text" name="friday_sd" id="friday_sd" maxlength="100" value="<?php echo $friday_sd?>" />
				</div>
                <div class="field">
					<label for="friday_ld" >Friday - Long Description:</label>
					<input type="text" name="friday_ld" id="friday_ld" maxlength="300" value="<?php echo $friday_ld?>" />
				</div>
                <div class="field">
					<label for="saturday_sd" >Saturday - Short Description:</label>
					<input type="text" name="saturday_sd" id="saturday_sd" maxlength="100" value="<?php echo $saturday_sd?>" />
				</div>
                <div class="field">
					<label for="saturday_ld" >Saturday - Long Description:</label>
					<input type="text" name="saturday_ld" id="saturday_ld" maxlength="300" value="<?php echo $saturday_ld?>" />
				</div>
                <div class="field">
					<label for="sunday_sd" >Sunday - Short Description:</label>
					<input type="text" name="sunday_sd" id="sunday_sd" maxlength="100" value="<?php echo $sunday_sd?>" />
				</div>
                <div class="field">
					<label for="sunday_ld" >Sunday - Long Description:</label>
					<input type="text" name="sunday_ld" id="sunday_ld" maxlength="300" value="<?php echo $sunday_ld?>" />
				</div>
                <input type="hidden" name="type" value="food_specials" />
			</fieldset>
			<div class="buttons">
				<input type="submit" name="submit" id="submit" class="submit" value="Submit" />
			</div>
         </form>
         <br />
         <?php } else { ?>
         	<p>You haven't selected a restaurant or bar to edit. Please <a href="restaurant-and-bar-lists.php">select a bar here</a></p>
         <?php } ?>
        
		</div>
	</div>
        <?php require_once("styling/footer.php"); ?>


