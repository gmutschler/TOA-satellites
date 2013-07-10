<?php //if(!isset($page)) $page = 0; // small fix for easier linking ?>
<?php use_helper('Text') ?>
	<div class="listing">

<?php include_partial('listing_widget', array(

	'type'		=> 'upper',
//	'page'		=> $page,
	'category'	=> $category
)) ?>
		<div class="listing-container">
			<a href="<?=url_for('satellites/host')?>" class="button_black button_black_small fright" style="z-index: 10; margin-right: 1px; margin-top: -2px;">&#43; Host your own</a>
        	<ul class="event-categories">

			<li<?php if(!isset($category) or is_null($category)) { ?> class="selected"<?php } ?>><a href="<?=url_for('satellites/book')?>">All</a></li>
<?php foreach($categories as $loopCategory): ?>
	    		<li<?php if(isset($category) and !is_null($category) and $category->getId() === $loopCategory->getId()) { ?> class="selected"<?php } ?>><a href="<?=url_for('satellites/book?category=' . $loopCategory->getId())?>"><?=$loopCategory->getName()?></a></li>
<?php endforeach ?>

<?php /*
			<li<?php if(!isset($category) or is_null($category)) { ?> class="selected"<?php } ?>><a href="<?=url_for('satellites/book?page=' . $page)?>">All</a></li>
<?php foreach($categories as $loopCategory): ?>
	    		<li<?php if(isset($category) and !is_null($category) and $category->getId() === $loopCategory->getId()) { ?> class="selected"<?php } ?>><a href="<?=url_for('satellites/book?category=' . $loopCategory->getId() . '&page=' . $page)?>"><?=$loopCategory->getName()?></a></li>
<?php endforeach ?>
*/ ?>
        	</ul>

<?php if(isset($events) and count($events)): ?>

			<ul class="listing_list">
<?php	foreach($events as $event) include_partial('listing_item', array(

	'big_link'	=> url_for('satellites/event?id=' . $event->getId()),
	'image'		=> $event->getLogo() ? '/uploads/event_images/thumbs/' . $event->getLogo() : '',
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
<?php else: ?>

			<p class="no-content">Oh no! What a bummer, we don't have any event here for now. But guess what, you can just <a href="/satellites/host">create one</a></p>
<?php endif ?>
			<div class="clear"></div>
		</div>

<?php include_partial('listing_widget', array(

//	'page'		=> $page,
	'category'	=> $category
)) ?>
	</div>
