<?php use_helper('Text') ?>
	<div class="listing">

<?php include_partial('listing_widget', array(

	'type' => 'upper'
)) ?>

        <ul class="event-categories">
            <li class="selected"><a href="">All</a></li>
            <li><a href="">Category 1</a></li>
            <li><a href="">Category 2</a></li>
            <li><a href="">Category 3</a></li>
            <li><a href="">Category 4</a></li>
            <li><a href="">Category 5</a></li>
        </ul>

<?php if(isset($events) and count($events)): ?>

		<ul class="listing_list">
<?php	foreach($events as $event) include_partial('listing_item', array(

	'big_link'	=> url_for('satellites/event?id=' . $event->getId()),
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
/*
	'ven_name'	=> $event->getVenue()->getName(),
	'ven_addr'	=> $event->getVenue()->getAddress(),
	'ven_post'	=> $event->getVenue()->getPostalCode(),
	'ven_city'	=> $event->getVenue()->getCity()
*/
)) ?>
		</ul>
<?php endif ?>
		<div class="clear"></div>

<?php include_partial('listing_widget') ?>

	</div>
