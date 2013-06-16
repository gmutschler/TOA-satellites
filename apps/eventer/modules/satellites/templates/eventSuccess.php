<?php // Tweak the local stylesheet to match "your custom color"

if($color = $event->getListingColor()) {

	// small fix for # in front
	// NOTE: we support ONLY hexadecimal values here; might be an idea to check for hexadecimal input here l8r
	$color = preg_match('/^\#/', $color) ? $color : '#' . $color;
?>
<style type="text/css">
	#content h1 span {
		color: <?=$color?>;
	}
	#content p a {

		color: <?=$color?>;
	}
	#content a.button_red {

		background-color: <?=$color?>;
	}
</style>
<?php } // & custom color?>

<div id="content" class="screen_event">

<?php include_partial('hero') ?>

	<div class="textual">

		<h1><?=$event->getTitle()?><span class="time fright"><?=$event->getStartHour()?> - <?=$event->getEndHour()?></span></h1>

		<div class="bicolumn">

			<div class="column fleft">

				<?php // TODO: background image ?>

				<h2>Event details</h2>

				<p><?=$event->getDescription()?></p>
			</div>

			<div class="column fright">

				<h3>Organizer</h3>

				<p>TODO: logo</p>

				<h4><?=$event->getOrganiser()->getName()?></h4>

				<p>TODO: contact button, twitter, facebook, url</p>
			</div>

			<div class="clear"></div>
		</div>

		<p>TODO: This event belongs to category: <a href="#link-to-category-there-will-be"><?=$event->getCategory()->getName()?></a></p>

		<h2>Where?</h2>

		<p><?php echo $event->getVenueName() ?><br />
			<?=$event->getVenueAddress()?><br />
			<?=$event->getVenuePostalCode()?> <?=$event->getVenueCity()?><br />
			GPS locations: <?=$event->getVenueLatitude()?> x <?=$event->getVenueLongitude()?>
		</p>

<?php if($event->getTickets()->count()): ?>

		<h2>Tickets information</h2>
		<ul class="tickets_list">
<?php	foreach($event->getTickets() as $ticket): // TODO: consider making this a re-usable partial (f.e. for user account) ?>
<?php			// ** paid ticket ?>
			<li>
				<span class="title"><span class="qty fright"><?=$ticket->getQuantityPaid()?> remaining</span><span class="date fright"><?=$ticket->getEndDate()?></span><?=$ticket->getName()?></span>
				<span class="desc"><?=$ticket->getDescription()?></span>
				<span class="book"><a class="button_red" href="#" onclick="alert('TODO')"><?=$ticket->getPrice()?>&euro; - Book it</a></span>

				<span class="clear"></span>
			</li>
<?php			// ** free ticket; 
/*
TODO: 
- check if it's available
- do not attach action to "FREE" button once it's unavailable
*/
?>
			<li>
				<span class="title"><span class="qty fright"><?=$ticket->getQuantityFree()?> remaining</span><span class="date fright"><?=$ticket->getEndDate()?></span><?=$ticket->getName()?> for TOA Attendees</span>
				<span class="desc"><?=$ticket->getDescription()?></span>
				<span class="book"><a class="button_red" href="#" onclick="alert('TODO')">FREE - Book it</a></span>

				<span class="clear"></span>
			</li>
<?php 	endforeach ?>
		</ul>
<?php else: ?>
		<h2>This event has no tickets available</h2>
<?php endif ?>
	</div>
</div>
