<div id="content" class="screen_user_home">

<?php include_partial('submenu', array('user' => $user)) ?>

	<div class="textual">
        <a href="<?=url_for('satellites/host')?>" class="button_black button_black_small fright" style="z-index: 10; margin-right: 1px;">&#43; Create a new event</a>
		<h1>The events you host</h1>

<?php if(count($events)): ?>

<?php use_helper('Text') ?>

        <div class="listing">
            <div class="listing-container">
                <ul class="listing_list">
        <?php	foreach($events as $event) include_partial('satellites/listing_item', array(
        
            'big_link'	=> url_for('satellites/edit?id=' . $event->getId()),
            'image'		=> $event->getLogo() ? '/uploads/event_images/thumbs/' . $event->getLogo() : '/images/content/test_event_thumb.png',
            'start_hour'	=> $event->getStartHourClean(),
            'end_hour'	=> $event->getEndHourClean(),
            'title'		=> $event->getTitle(),
            'desc'		=> $event->getDescription(),
            'org_name'	=> $event->getOrganiser()->getName(),
            'org_link'	=> $event->getOrganiser()->getUrl(),
            'ven_name'	=> $event->getVenueName(),
            'ven_addr'	=> $event->getVenueAddress(),
            'ven_post'	=> $event->getVenuePostalCode(),
            'ven_city'	=> $event->getVenueCity(),
            'color'    => $event->getListingColor()
        )) ?>
                </ul>
            </div>
    
            <p class="lead tcenter">Click on an event to edit it!</p>
    <?php else: ?>
            <h3>You don't host any satellite events</h3>
    <?php endif ?>
        </div>
    </div>
</div>
