<div id="content" class="screen_user_home">

<?php include_partial('submenu') ?>

	<div class="textual">

		<h1>The events you host</h1>

<?php if(count($events)): ?>
	</div>

<?php use_helper('Text') ?>

	<div class="listing">

		<ul class="listing_list">
<?php	foreach($events as $event) include_partial('satellites/listing_item', array(

	'big_link'	=> url_for('satellites/edit?id=' . $event->getId()),
	'image'		=> '/images/content/test_event_thumb.png',		// TODO
	'start_hour'	=> $event->getStartHour(),
	'end_hour'	=> $event->getEndHour(),
	'title'		=> $event->getTitle(),
	'desc'		=> $event->getDescription(),
	'org_name'	=> $event->getOrganiser()->getName(),
	'org_link'	=> $event->getOrganiser()->getUrl(),
	'ven_name'	=> $event->getVenueName(),
	'ven_addr'	=> $event->getVenueAddress(),
	'ven_post'	=> $event->getVenuePostalCode(),
	'ven_city'	=> $event->getVenueCity()
)) ?>
		</ul>

		<p>Click on the event to edit it!</p>
<?php else: ?>
		<h3>You don't host any satellite events</h3>
<?php endif ?>
	</div>
</div>