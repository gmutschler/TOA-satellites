<div id="content" class="screen_event">

<?php include_partial('hero') ?>

	<div class="textual">

		<h1><?=$event->getTitle()?></h1>

		<h2>What?</h2>
		<p><?=$event->getDescription()?></p>
		<p>This event belongs to category: <a href="#link-to-category-there-will-be"><?=$event->getCategory()->getName()?></a></p>

		<h2>Where?</h2>

		<p><?php echo $event->getVenueName() ?><br />
			<?=$event->getVenueAddress()?><br />
			<?=$event->getVenuePostalCode()?> <?=$event->getVenueCity()?><br />
			GPS locations: <?=$event->getVenueLatitude()?> x <?=$event->getVenueLongitude()?>
		</p>

		<h2>When?</h2>
		<p>Between <?=$event->getStartHour()?> and <?=$event->getEndHour()?></p>
		<p><?=var_dump($event->getStartHour())?></p>

		<h2>With who?</h2>
		<p>This event is organized by: <a href="#link-to-organiser-there-will-be"><?=$event->getOrganiser()->getName()?></a></p>
		<p>The list of attendees is not yet implemented here. ;)</p>

<?php if($event->getTickets()->count()): ?>

		<h2>Get the tickets!</h2>
		<ol>
<?php	foreach($event->getTickets() as $ticket): ?>

			<li>A ticket for <?=$ticket->getPrice()?> EUR (attached to <?=$ticket->getEvent()->getTitle()?>)</li>
<?php 	endforeach ?>
		</ol>
<?php else: ?>
		<h2>This event has no tickets</h2>
<?php endif ?>
	</div>
</div>
