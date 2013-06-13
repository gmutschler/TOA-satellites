<?php use_helper('Text') ?>
<div id="content" class="screen_host">

<?php include_partial('hero') ?>

	<div class="listing">

		<h1>Host an event</h1>

		<h3>Import your eventbrite events</h3>

		<ul class="listing_list">
<?php foreach($eventsArray as $event) {

	$event = $event['event'];	// ** stupid override of API returns

	include_partial('listing_item', array(

		'big_link'	=> '#' . $event['id'],					// TODO: an import link here with url_for
		'image'		=> $event['logo'],
		'start_hour'	=> date('G:i', strtotime($event['start_date'])),
		'end_hour'	=> date('G:i', strtotime($event['end_date'])),
		'title'		=> $event['title'],
		'desc'		=> $event['description'],
		'org_name'	=> $event['organizer']['name'],
		'org_link'	=> $event['organizer']['url'],
		'ven_name'	=> $event['venue']['name'],
		'ven_addr'	=> $event['venue']['address'],
		'ven_post'	=> $event['venue']['postal_code'],
		'ven_city'	=> $event['venue']['city']
	));
} ?>
		</ul>

		<div class="clear"></div>
	</div>
</div>
