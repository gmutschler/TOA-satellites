<?php use_helper('Date') ?>
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
	#content a.button_custom {

		background-color: <?=$color?>;
	}
</style>
<?php } // & custom color?>

<div id="content" class="screen_event">

        <div id="hero">

                <div id="hero_background"></div>
                <div id="hero_foreground">
                    <div class="event-location">
                        <h3>Where</h3>
    
                        <p><span><?php echo $event->getVenueName() ?></span><br />
                            <?=$event->getVenueAddress()?><br />
                            <?=$event->getVenuePostalCode()?> <?=$event->getVenueCity()?><br />
                            GPS locations: <?=$event->getVenueLatitude()?> x <?=$event->getVenueLongitude()?>
                        </p>
                    </div>
                </div>
        </div>

<?php include_partial('submenu') ?>

	<div class="textual">

		<h1><?=$event->getTitle()?><span class="time"><?=$event->getStartHour()?> - <?=$event->getEndHour()?></span></h1>

		<div class="bicolumn">

			<div class="column fleft">
				<div class="event-image">
<?php if($event->getLogo()): ?>
					<img src="/uploads/event_images/<?=$event->getLogo()?>" alt="<?=$event->getTitle()?>" />
<?php endif ?>

					<h2>Event details</h2>
				</div>

				<div class="content-box-inner"><p><?=$event->getDescription()?></p></div>
			</div>

			<div class="column fright">
				<div class="content-box-inner">

					<h3>Organizer</h3>
		   
		<?php if($event->getOrganiser()->getLogo()): ?>
					<img src="/uploads/organiser_images/<?=$event->getOrganiser()->getLogo()?>" alt="<?=$event->getOrganiser()->getName()?>" />
		<?php endif ?>
		    
					<h4><?=$event->getOrganiser()->getName()?></h4>
		    
					<p><?=$event->getOrganiser()->getDescription()?></p>
				    
					<a href="mailto:<?=$event->getOrganiser()->getGuardUser()->getEmailAddress()?>" class="button_black button_black_small" target="_blank">Contact the organizer</a>
		    
					<p class="tright">
						<a href="<?=$event->getOrganiser()->getTwitter()?>" class="twitter-link" target="_blank"></a>
						<a href="<?=$event->getOrganiser()->getFacebook()?>" class="facebook-link" target="_blank"></a>
						<a href="<?=$event->getOrganiser()->getUrl()?>" class="website-link" target="_blank"></a>
					</p>
				</div>
			</div>

			<p>This event belongs to category: <a href="<?=url_for('satellites/book?category=' . $event->getCategory()->getId())?>"><?=$event->getCategory()->getName()?></a></p>
			<div class="clear"></div>
		</div>

<?php if($event->getTickets()->count()): ?>

		<h2>Tickets information</h2>
		<ul class="tickets_list">
<?php	foreach($event->getTickets() as $ticket): // LATER: consider making this a re-usable partial (f.e. for user account) ?>
<?php			// ** paid ticket ?>
			<li>
				<span class="title"><span class="qty fright"><?=$ticket->getQuantityPaid()?> remaining</span><span class="date fright">Sales end on <?=date('M j, Y', strtotime($ticket->getEndDate()))?></span><?=$ticket->getName()?></span>
				<span class="clear line"></span>

				<span class="desc"><?=$ticket->getDescription()?></span>
				<span class="book"><a class="button_custom" href="#" onclick="alert('TODO: We are waiting for Eventbrite with this'); return false"><?=$ticket->getPrice()?>&euro; - Book it</a></span>

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
				<span class="overlay-container"><span class="overlay"><span>Sorry, this ticket is only available for people with<br />a ticket for the first day - Unconference</span><br /><a class="button_red" href="#" onclick="alert('Booo!'); return false;">Buy yours now</a></span></span>

				<span class="title"><span class="qty fright"><?=$ticket->getQuantityFree()?> remaining</span><span class="date fright">Sales end on <?=date('M j, Y', strtotime($ticket->getEndDate()))?></span><?=$ticket->getName()?> for TOA Attendees</span>
				<span class="clear line"></span>

				<span class="desc"><?=$ticket->getDescription()?></span>
				<span class="book"><a class="button_custom" href="#" onclick="alert('TODO: We are waiting for Eventbrite with this'); return false">FREE - Book it</a></span>

				<span class="clear"></span>
			</li>
<?php 	endforeach ?>
		</ul>
<?php else: ?>
		<h2>This event has no tickets available</h2>
<?php endif ?>
	</div>
</div>
