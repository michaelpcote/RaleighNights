<?php require_once('styling/styling.php'); 
if ( !isset($_SESSION['user_type']) ) {
	header("Location: ".$_SERVER['HTTP_REFERER']);
}?>

<title>Raleigh Special Events</title>
</head>
<body>
	<div class="contentBox">
    	<div class="innerBox">
        	<div class="contentTitle">Special Events in Raleigh</div>
            <div class="contentText">
          <p>The events listed here should be special events. If for example, you have a band coming or are hosting an event for pediatric cancer, those events 
          should be listed here. If you have a reocurring event you would like to add, like karaoke night or trivia night, 
          please add <a href=”user-edit-events.php”>your reocurring event here.</a> </p>
          
		</div>
	</div>
        <?php require_once("styling/footer.php"); ?>


