<?php use_helper('Date') ?>
<?php // Tweak the local stylesheet to match "your custom color"

if($color = $event->getListingColor()) {

	// small fix for # in front
	// NOTE: we support ONLY hexadecimal values here; might be an idea to check for hexadecimal input here l8r
	$color = preg_match('/^\#/', $color) ? $color : '#' . $color;

	// some icon hardcodes
	$icon_prefix = '/uploads/event_images/social_icons/' . $event->getId();
	$icon_fb = $icon_prefix . '-fb-icon.png';
	$icon_tw = $icon_prefix . '-twitter-icon.png';
	$icon_w3 = $icon_prefix . '-website-icon.png';
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

	div.screen_event .textual .bicolumn .column.fright .organizer-social-icons a.facebook-link {

		background-image: url('<?=$icon_fb?>');
	}
	div.screen_event .textual .bicolumn .column.fright .organizer-social-icons a.twitter-link {

		background-image: url('<?=$icon_tw?>');
	}
	div.screen_event .textual .bicolumn .column.fright .organizer-social-icons a.website-link {

		background-image: url('<?=$icon_w3?>');
	}
</style>
<?php } // & custom color?>

<div id="hero">

    <div id="hero_background"><div id="hero_background_map" style="height: 480px; width: 960px; -webkit-transform: translate3d(0px, 0px, 0px)"></div></div>
    <div class="event-location">
        <h3>Where</h3>

        <p><span><?php echo $event->getVenueName() ?></span><br />
            <?=$event->getVenueAddress()?><br />
            <?=$event->getVenuePostalCode()?> <?=$event->getVenueCity()?>
<?php /*		    <br />GPS locations: <?=$event->getVenueLatitude()?> x <?=$event->getVenueLongitude()?>	*/ ?>
        </p>
    </div>
</div>

<div id="content" class="screen_event">

<?php include_partial('submenu') ?>

	<div class="textual">
        <a href="/satellites" class="button_back"><big>&lsaquo;</big> All events</a>

<?php if($sf_user->isAuthenticated() and $event->getOrganiser()->getGuardUser() == $sf_user->getGuardUser()): ?>
	<a class="button_black button_black_small" href="<?=url_for('satellites/edit?id=' . $event->getId())?>">Edit the event</a>
<?php endif ?>

		<h1><?=$event->getTitle()?><span class="time"><?=$event->getStartHourClean()?> - <?=$event->getEndHourClean()?></span></h1>

		<div class="bicolumn">

			<div class="column fleft">
				<div class="event-image">
<?php if($event->getLogo()): ?>
					<img src="/uploads/event_images/<?=$event->getLogo()?>" alt="<?=$event->getTitle()?>" />
<?php endif ?>

					<h2>Event details</h2>
				</div>

				<div class="content-box-inner"><p><?=nl2br($event->getDescription())?></p></div>
                <p class="single-event-category">Posted in: <a href="<?=url_for('satellites/index?category=' . $event->getCategory()->getId())?>"><?=$event->getCategory()->getName()?></a></p>
			</div>


			<div class="column fright">
				<div class="content-box-inner">

					<h3>Organizer</h3>
		   
		<?php if($event->getOrganiser()->getLogo()): ?>
					<img src="/uploads/organiser_images/<?=$event->getOrganiser()->getLogo()?>" alt="<?=$event->getOrganiser()->getName()?>" />
		<?php endif ?>
		    
					<h4><?=$event->getOrganiser()->getName()?></h4>
		    
					<p><?=nl2br($event->getOrganiser()->getDescription())?></p>
				    
					<a href="mailto:<?=$event->getOrganiser()->getGuardUser()->getEmailAddress()?>" class="button_black button_black_small" target="_blank">Contact the organizer</a>
		    
					<div class="organizer-social-icons">
<?php if($event->getOrganiser()->getTwitter()): ?>
						<a href="http://<?=$event->getOrganiser()->getTwitter()?>" class="twitter-link" target="_blank"></a>
<?php endif ?>
<?php if($event->getOrganiser()->getFacebook()): ?>
						<a href="http://<?=$event->getOrganiser()->getFacebook()?>" class="facebook-link" target="_blank"></a>
<?php endif ?>
<?php if($event->getOrganiser()->getUrl()): ?>
						<a href="http://<?=$event->getOrganiser()->getUrl()?>" class="website-link" target="_blank"></a>
<?php endif ?>
					</div>
				</div>
			</div>

			<div class="clear"></div>
		</div>

<?php if($event->getSynchronized()): ?>
		<h2>Tickets information</h2>

<?php	if($sf_user->isAuthenticated() and $sf_user->getGuardUser()->getAttendee()->getHasMainTicket()): ?>
		<p class="notice">As The Unconference attendee, you should have availability to enter sattelite events for free!<br />If the free tickets are not displayed below, please use the following as a promotionnal code:<input id="js_accesscode" class="accesscode" type="text" value="<?=$event->getEventbriteAccesscode()?>" onclick="this.select();" /></p>
<?php else: ?>
        <div class="event-main-ticket">
            <p class="lead">Already have a Day 1 ticket?</p>
            <p>Your seat is reserved and free for paid events<sup>*</sup>. Please <a href="<?=url_for('home/login')?>" style="color:#DC142C">login</a> to proceed with registration.<br />Space is limited for Non Tech Open Air ticket holders<br /></p>
            <p><a class="button_red" href="http://toaberlin2013-TOAWebsite.eventbrite.com" target="_blank">Get your ticket now!</a></p>
            <p><em><sup>*</sup>As long as satellite event is not completely sold out.</em></p>
        </div>
<?php	endif ?>

<?php /*
		<iframe id="js_iframe" src="http://www.eventbrite.com/tickets-external?eid=<?=$event->getEventbriteId()?>&ref=etckt<?php if($sf_user->isAuthenticated() and $sf_user->getGuardUser()->getAttendee()->getHasMainTicket()) { ?>&access=<?=$event->getEventbriteAccesscode()?>&access_code=<?php echo $event->getEventbriteAccesscode(); } ?>&<?=time()?>" frameborder="0" height="256" width="100%" vspace="0" hspace="0" marginheight="5" marginwidth="5" scrolling="auto" allowtransparency="true"></iframe>
*/ ?>
<?php
	// generate local url
	if($sf_user->isAuthenticated() and $sf_user->getGuardUser()->getAttendee()->getHasMainTicket())
		$localUrl = url_for('satellites/ebFrame?ebId=' . $event->getEventbriteId() . '&ebAc=' . $event->getEventbriteAccesscode());

	else
		$localUrl = url_for('satellites/ebFrame?ebId=' . $event->getEventbriteId());
	
?>
		<iframe id="js_iframe" src="<?=$localUrl?>" frameborder="0" height="256" width="100%" vspace="0" hspace="0" marginheight="5" marginwidth="5" scrolling="auto" allowtransparency="true"></iframe>

<?php else: ?>
		<h2>This event is not yet synchronized with Eventbrite platform</h2>
<?php endif ?>



<?php // DEPRECATED; to be revoked when going away from Eventbrite
/*
<?php if($event->getTickets()->count()): ?>

		<h2>Tickets information</h2>

		<ul class="tickets_list">
<?php	foreach($event->getTickets() as $ticket): // LATER: consider making this a re-usable partial (f.e. for user account) ?>
<?php			// ** paid ticket ?>
			<li>
				<span class="title"><span class="qty fright"><?=$ticket->getQuantityPaid()?> remaining</span><span class="date fright">Sales end on <?=date('M j, Y', strtotime($ticket->getEvent()->getEndDate()))?></span><?=$ticket->getName()?></span>
				<span class="clear line"></span>

				<span class="desc"><?=$ticket->getDescription()?></span>
				<span class="book"><a class="button_custom" href="#" onclick="alert('TODO: We are waiting for Eventbrite with this'); return false"><?=$ticket->getPrice()?>&euro; - Book it</a></span>

				<span class="clear"></span>
			</li>
<?php			// ** free ticket; 
//TODO: 
//- check if it's available
//- do not attach action to "FREE" button once it's unavailable
?>
			<li>
				<span class="overlay-container"><span class="overlay"><span>Sorry, this ticket is only available for people with<br />a ticket for the first day - Unconference</span><br /><a class="button_red" href="http://toaberlin2013-TOAWebsite.eventbrite.com" onclick="alert('Booo!'); return false;">Buy yours now</a></span></span>

				<span class="title"><span class="qty fright"><?=$ticket->getQuantityFree()?> remaining</span><span class="date fright">Sales end on <?=date('M j, Y', strtotime($ticket->getEvent()->getEndDate()))?></span><?=$ticket->getName()?> for TOA Attendees</span>
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
*/ ?>
	</div>
</div>

<?php // Hidden stuff for Google Map driving ?>
<input type="hidden" id="map_data_pulp" value="<?=$map_data_pulp?>" />
