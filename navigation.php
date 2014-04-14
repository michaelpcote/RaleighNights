<div id="page">
	<?php if ( isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1 ) { ?>
    	<div id="navcontainer">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="admin-restaurant-and-bar-lists.php">Business List</a></li>
                <li><a href="admin-edit-drink-specials.php">Edit Drinks</a></li>
                <li><a href="admin-edit-food-specials.php">Edit Food</a></li>
                <li><a href="edit-food-specials.php">Food Specials</a></li>
                <li><a href="admin-edit-events.php">Edit Events</a></li>
                <li><a href="admin-edit-special-events.php">Special Events</a>
                	<ul>
                        <li><a href="admin-previous-special-events-list.php">Edit Previous Special Event</a></li>
                        <li><a href="admin-upcoming-special-events-list.php">Edit Upcoming Special Event</a></li>
                        <li><a href="add-new-special-event.php">And New Special Event</a></li>
                    </ul>
                </li>
                <li><a href="admin-verify-business.php">Verify Business</a></li>
                <li><a href="admin-verifiy-person.php">Verify Individual</a></li>
            </ul>
        </div>
	<?php } else if ( isset($_SESSION['user_type'] ) ) { ?>
     	<div id="navcontainer">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="user-raleigh-restaurants-and-bars.php">Claim a Business</a></li>
                <li><a href="restaurant-and-bar-lists.php">Your Places</a></li>
                <li><a href="edit-drink-specials.php">Drink Specials</a></li>
                <li><a href="edit-food-specials.php">Food Specials</a></li>
                <li><a href="edit-events.php">Reocurring Events</a></li>
                <li><a href="edit-special-events.php">Special Events</a>
                	<ul>
                        <li><a href="previous-special-events-list.php">Edit Previous Special Event</a></li>
                        <li><a href="upcoming-special-events-list.php">Edit Upcoming Special Event</a></li>
                        <li><a href="add-new-special-event.php">And New Special Event</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    <?php } else { ?> <!--
     	<div class="topNaviagationLink"><a href="index.php">Home</a></div>
        <div class="topNaviagationLink"><a href="raleigh-restaurants-and-bars.php">Claim a Business</a></div>
        <div class="topNaviagationLink"><a href="raleigh-drink-specials.php">Drink Specials</a></div>
        <div class="topNaviagationLink"><a href="raleigh-food-specials.php">Food Specials</a></div>
        <div class="topNaviagationLink"><a href="events-in-raleigh.php">Events</a></div> -->
        <div id="navcontainer">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="raleigh-drink-specials.php">Drink Specials</a>
                	<ul>
                        <li><a href="raleigh-drink-specials-monday.php">Monday Drink Specials</a></li>
                        <li><a href="raleigh-drink-specials-tuesday.php">Tuesday Drink Specials</a></li>
                        <li><a href="raleigh-drink-specials-wednesday.php">Wednesday Drink Specials</a></li>
                        <li><a href="raleigh-drink-specials-thursday.php">Thursday Drink Specials</a></li>
                        <li><a href="raleigh-drink-specials-friday.php">Friday Drink Specials</a></li>
                        <li><a href="raleigh-drink-specials-saturday.php">Saturday Drink Specials</a></li>
                        <li><a href="raleigh-drink-specials-sunday.php">Sunday Drink Specials</a></li>
                	</ul>
                </li>
                <li><a href="raleigh-food-specials.php">Food Specials</a>
                	<ul>
                        <li><a href="raleigh-food-specials-monday.php">Monday Food Specials</a></li>
                        <li><a href="raleigh-food-specials-tuesday.php">Tuesday Food Specials</a></li>
                        <li><a href="raleigh-food-specials-wednesday.php">Wednesday Food Specials</a></li>
                        <li><a href="raleigh-food-specials-thursday.php">Thursday Food Specials</a></li>
                        <li><a href="raleigh-food-specials-friday.php">Friday Food Specials</a></li>
                        <li><a href="raleigh-food-specials-saturday.php">Saturday Food Specials</a></li>
                        <li><a href="raleigh-food-specials-sunday.php">Sunday Food Specials</a></li>
                	</ul>
                </li>
                <li><a href="events-in-raleigh.php">Raleigh Events</a>
                	<ul>
                        <li><a href="events-in-raleigh-monday.php">Monday Events</a></li>
                        <li><a href="events-in-raleigh-tuesday.php">Tuesday Events</a></li>
                        <li><a href="events-in-raleigh-wednesday.php">Wednesday Events</a></li>
                        <li><a href="events-in-raleigh-thursday.php">Thursday Events</a></li>
                        <li><a href="events-in-raleigh-friday.php">Friday Events</a></li>
                        <li><a href="events-in-raleigh-saturday.php">Saturday Events</a></li>
                        <li><a href="events-in-raleigh-sunday.php">Sunday Events</a></li>
                	</ul>
                </li>
                <li><a href="upcoming-events-in-raleigh.php">Upcoming Events</a></li>
                <li><a href="raleigh-restaurants-and-bars.php">Owners Tab</a></li>
            </ul>
        </div>
    <?php } ?>
</div>

<div id="mainPicture">
    <div class="picture">
      	<div id="headerTitle">Raleigh Nights</div>
        <div id="headerSubtext">Connecting Restaurants and Bars with their Patrons</div>
    </div>
</div>