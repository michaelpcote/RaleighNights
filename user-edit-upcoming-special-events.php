<?php require_once('styling/styling.php'); 
if ( !isset($_SESSION['user_type']) ) {
	header("Location: ".$_SERVER['HTTP_REFERER']);
}?>

<title>Edit Your Special Events</title>
	 <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
	 <script src="//code.jquery.com/jquery-1.10.2.js"></script>
     <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
</head>
<body>
	 <?php 
	$conn = Common::getConn();
	$query = "SELECT se.event_name, se.event_date, se.event_time, se.short_description, se.long_description FROM special_events se ";
	$query .= "WHERE se.event_id = ".$_POST['submit'];
	$result = $conn->query($query);
	$row = $result->fetch_assoc();
	$time = strtotime($row['event_date']);
	$date = date('m/d/y', $time);
	$time = $row['event_time'];
	?>
		<div class="contentBox">
    	<div class="innerBox">
          <div class="contentTitle">Raleigh Events</div><br />
          <div class="contentText">
          <p>Edit your upcoming event!</p>
          <br />
          	<form action="direct/edit-special-event-process.php" method="post" id="add-new">
              <p>Fields marked <span class="required">bold</span> are required.</p>
              <fieldset>
                <legend>Edit the event for <?php echo $_SESSION['name'] ?></legend>
                <div class="field">
					<label for="event_name" class="required">Event Name:</label>
					<input type="text" name="event_name" id="event_name" maxlength="100" class="descriptions" value="<?php echo $row['event_name'];?>" required/>
				</div>
                <div class="field">
					<label for="event_date" class="required">Event Date:</label>
                     <input type="text" name="event_date" id="datepicker" value="<?php echo $date;?>" required/>
				</div>
                <div class="field">
					<label for="event_time" >Event Time:</label>
					<input type="text" name="event_time" id="event_time" maxlength="100" value="<?php echo $time;?>" />
				</div>
                <div class="field">
					<label for="short_description" class="required">Short Description:</label>
					<input type="text" name="short_description" id="short_description" maxlength="100" value="<?php echo $row['short_description'];?>" required/>
				</div>
				<div class="field">
					<label for="long_description" >Long Description:</label>
					<input type="text" name="long_description" id="long_description" maxlength="300" value="<?php echo $row['long_description'];?>" />
				</div>
                <input type="hidden" name="event_id" value="<?php echo $_POST['submit'];?>" />
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
        <?php require_once("styling/footer.php"); ?>


