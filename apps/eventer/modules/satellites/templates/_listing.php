<?php use_helper('Text') ?>
	<div class="listing">

<?php include_partial('listing_widget', array(

	'type' => 'upper'
)) ?>

<?php if(isset($events) and count($events)): ?>

		<ul class="listing_list">
<?php	foreach($events as $event): ?>

			<li><a class="big_link" href="<?=url_for('satellites/event?id=' . $event->getId())?>">
					<span class="photo" style="background-image: url('/images/content/test_event_thumb.png')">
						<span><?=$event->getStartHour()?></span>
					</span>

					<span class="data">
						<span class="title"><?=$event->getTitle()?></span>
						<span class="hosted">Hosted by <b onclick="window.location.href = '<?=url_for('satellites/event?id=' . $event->getId())?>'">Guillaume Mutschler</b></span>
						<span class="desc"><?=truncate_text($event->getDescription(), 175)?></span>
						<span class="address"><?=$event->getVenue()->getName()?><br /><?=$event->getVenue()->getAddress()?><br /><?=$event->getVenue()->getPostalCode()?> <?=$event->getVenue()->getCity()?></span>
						<span class="time"><?=$event->getStartHour()?> - <?=$event->getEndHour()?></span>
					</span>

					<span class="clear"></span>
			</a></li>
<?php	endforeach ?>
		</ul>
<?php endif ?>
		<div class="clear"></div>

<?php include_partial('listing_widget') ?>

	</div>
