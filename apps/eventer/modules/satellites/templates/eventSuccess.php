<div id="content" class="screen_event">

<?php include_partial('hero') ?>

	<div class="textual">

		<h1><?=$event->getTitle()?></h1>

		<h2>What?</h2>
		<p><?=$event->getDescription()?></p>
		<p>This event belongs to category: <a href="#link-to-category-there-will-be"><?=$event->getCategory()->getName()?></a></p>

		<h2>Where?</h2>
		<p><?php echo $event->getVenue()->getName() ?><br />
			<?=$event->getVenue()->getAddress()?><br />
			<?=$event->getVenue()->getAddress2()?><br />
			<?=$event->getVenue()->getRegion()?><br />
			<?=$event->getVenue()->getPostalCode()?> <?=$event->getVenue()->getCity()?><br />
			<?=$event->getVenue()->getCountry()?> (<?=$event->getVenue()->getCountryCode()?>)<br />
			GPS locations: <?=$event->getVenue()->getLatitude()?> x <?=$event->getVenue()->getLongitude()?>
		</p>

		<h2>When?</h2>
		<p>Between <?=$event->getStartDate()?> and <?=$event->getEndDate()?> (<?=$event->getTimezone()?> timezone)</p>

		<h2>With who?</h2>
		<p>This event is organized by: <a href="#link-to-organiser-there-will-be"><?=$event->getOrganiser()->getName()?></a></p>
		<p>The list of attendees is not yet implemented here. ;)</p>

		<h2><a href="#link-to-buy-ticket-there-will-be">Participate!</a></h2>
	</div>
</div>
