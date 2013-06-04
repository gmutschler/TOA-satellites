<?php use_helper('Text') ?>
	<div class="listing">

<?php include_partial('listing_widget', array(

	'type' => 'upper'
)) ?>

<?php if(isset($events) and count($events)): ?>

		<ul class="listing_list">
<?php	foreach($events as $event): ?>

			<li>
				<span class="photo">
					<a href="#event-link" style="background-image: url('/images/content/test_event_thumb.png')">
						<span><?=$event->getStartHour()?></span>
					</a>
				</span>

				<span class="data">
					<span class="title"><a href="#event-link"><?=$event->getTitle()?></a></span>
					<span class="hosted">Hosted by <a href="#user-link">Guillaume Mutschler</a></span>
					<span class="desc"><?=truncate_text($event->getDescription(), 175)?></span>
					<span class="address"><?=$event->getVenue()->getName()?><br /><?=$event->getVenue()->getAddress()?><br /><?=$event->getVenue()->getPostalCode()?> <?=$event->getVenue()->getCity()?></span>
					<span class="time"><?=$event->getStartHour()?> - <?=$event->getEndHour()?></span>
				</span>

				<span class="clear"></span>
			</li>
<?php	endforeach ?>
		</ul>
<?php endif ?>
		<div class="clear"></div>

<?php include_partial('listing_widget') ?>

	</div>
