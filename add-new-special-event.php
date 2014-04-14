<?php
	require_once("conf.php");
?>

<title>Raleigh Nights</title>
	 <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
	 <script src="//code.jquery.com/jquery-1.10.2.js"></script>
     <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	 <?php require_once("welcome-login.php"); ?>
</head>
<body>
	<?php 
	if ( !isset($_SESSION['name'] ) ) {
		header("Location: restaurant-and-bar-lists.php");
	}
	require_once("navigation.php"); ?>
        <div class="contentBox">
    	<div class="innerBox">
          <div class="contentTitle">Raleigh Events</div><br />
          <div class="contentText">
          <p>You can add a new special event here</p>
          <br />
          	<form action="add-new-special-event-process.php" method="post" id="add-new">
              <p>Fields marked <span class="required">bold</span> are required.</p>
              <fieldset>
                <legend>Add an event for <?php echo $_SESSION['name'] ?></legend>
                <div class="field">
					<label for="event_name" class="required">Event Name:</label>
					<input type="text" name="event_name" id="event_name" maxlength="100" class="descriptions" value="" required/>
				</div>
                <div class="field">
					<label for="event_date" class="required">Event Date:</label>
                     <input type="text" name="event_date" id="datepicker" value="" required/>
				</div>
                <div class="field">
					<label for="event_time" >Event Time:</label>
					<input type="text" name="event_time" id="event_time" maxlength="100" value="" />
				</div>
                <div class="field">
					<label for="short_description" class="required">Short Description:</label>
					<input type="text" name="short_description" id="short_description" maxlength="300" value="" required/>
				</div>
				<div class="field">
					<label for="long_description" >Long Description:</label>
					<input type="text" name="long_description" id="long_description" maxlength="100" value="" />
				</div>
                <input type="hidden" name=
			</fieldset>
            <div class="buttons">
				<input type="submit" name="submit" id="submit" class="submit" value="Submit" />
			</div>
         </form>
          <script>
			$(function() {
				$( "#datepicker" ).datepicker();
			});
		 </script>
         <br />
        </div>
	</div>
        <?php require_once("footer.php"); ?>


