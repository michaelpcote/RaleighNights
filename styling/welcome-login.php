<?php
if ( isset($_SESSION['first_name']) ) {
?>
<div class="welcome">
	<?php
		echo "<p>Welcome ".$_SESSION['first_name']." ".$_SESSION['last_name']."</p>";
	?>
</div>
<div class="login">
	<a href="raleigh-nights-logout.php">Log Out</a>
</div>
<?php
	} else {
?>
    <div class="login">
   		<a href="raleigh-nights-login.php">Log In</a>
	</div>
	<?php
	}
?>