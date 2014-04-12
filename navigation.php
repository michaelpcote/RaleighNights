<div id="page">
	<?php if ( isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1 ) { ?>
		<div class="topNaviagationLink"><a href="index.php">Home</a></div>
		<div class="topNaviagationLink"><a href="admin-restaurant-and-bar-lists.php">Business List</a></div>
		<div class="topNaviagationLink"><a href="admin-edit-drink-specials.php">Edit Drinks</a></div>
		<div class="topNaviagationLink"><a href="admin-edit-food-specials.php">Edit Food</a></div>
		<div class="topNaviagationLink"><a href="admin-edit-events.php">Edit Events</a></div>
        <div class="topNaviagationLink"><a href="admin-verify-business.php">Verify Business</a></div>
        <div class="topNaviagationLink"><a href="admin-verifiy-person.php">Verify Individual</a></div>
	 <?php } else if ( isset($_SESSION['user_type'] ) ) { ?>
    	<div class="topNaviagationLink"><a href="index.php">Home</a></div>
        <div class="topNaviagationLink"><a href="raleigh-restaurants-and-bars.php">Claim a Business</a></div>
        <div class="topNaviagationLink"><a href="restaurant-and-bar-lists.php">Your Places</a></div>
        <div class="topNaviagationLink"><a href="edit-drink-specials.php">Drink Specials</a></div>
        <div class="topNaviagationLink"><a href="edit-food-specials.php">Food Specials</a></div>
        <div class="topNaviagationLink"><a href="edit-events.php">Events</a></div>
     <?php } else { ?>
     	<div class="topNaviagationLink"><a href="index.php">Home</a></div>
        <div class="topNaviagationLink"><a href="raleigh-restaurants-and-bars.php">Claim Your Business</a></div>
        <div class="topNaviagationLink"><a href="index.html">Drink Specials</a></div>
        <div class="topNaviagationLink"><a href="index.html">Food Specials</a></div>
        <div class="topNaviagationLink"><a href="index.html">Events</a></div>
    <?php } ?>
</div>

<div id="mainPicture">
    <div class="picture">
      	<div id="headerTitle">Raleigh Nights</div>
        <div id="headerSubtext">Connecting Restaurants and Bars with their Patrons</div>
    </div>
</div>