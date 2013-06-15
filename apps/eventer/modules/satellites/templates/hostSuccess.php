<?php use_helper('Text') ?>
<div id="content" class="screen_host">

<?php include_partial('hero') ?>

	<div class="textual">

		<h1>Host an event</h1>

	</div>

<?php if(isset($eventsArray)): ?>
	<div class="listing">

		<h2>Import your eventbrite events</h2>

		<ul class="listing_list">
<?php	foreach($eventsArray as $event) {

		$event = $event['event'];	// ** stupid override of API returns
		include_partial('listing_item', array(

			'big_link'	=> url_for('satellites/import?id=' . $event['id']),
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
	}
?>
		</ul>
		<div class="clear"></div>
	</div>

	<div class="textual">

		<p class="notice">By importing the event, you agree to our <a href="#TODO">terms and conditions</a>.</p>

		<h4>Or</h4>
	</div>
<?php endif ?>

	<div class="forms">

		<h2>Create your own event</h2>

		<?php include_partial('form', array('form' => $form)) ?>
	</div>
</div>
