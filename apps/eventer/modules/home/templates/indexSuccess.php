<div id="content" class="screen_home">

<?php include_partial('global/hero', array(

	'submenu_title' => 'The Satellites',
	'links' => array(

		'Introduction'	=> 'satellites/index',
		'Book'		=> 'satellites/book',
		'Host'		=> 'satellites/host'
	)
)) ?>

	<div class="listing">

		<h1>Satellite Events <span>from 10am to 3:30pm</span></h1>

<?php // TODO: move below to some sort of partial too ?>

<?php include_partial('listing_widget', array(

	'type' => 'upper'
)) ?>

		<ul class="listing_list">
<?php for($looprun = 0; $looprun <= 10; $looprun++):

	// some temporary fun :)
	$randHr = rand(0,7);
	$randMin = rand(0,2) * 15;
	if($randMin == 0) $randMin = '00';
?>

			<li>
				<span class="photo">
					<a href="#event-link" style="background-image: url('/images/content/test_event_thumb.png')">
						<span>1<?=$randHr?>:<?=$randMin?></span>
					</a>
				</span>

				<span class="data">
					<span class="title"><a href="#event-link">Take photos together in the evening light</a></span>
					<span class="hosted">Hosted by <a href="#user-link">Guillaume Mutschler</a></span>
					<span class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eu nisi leo. Integer sit amet mauris felis, quis tempor nisl. Nullam consequat vehicula eros a convallis.</span>
					<?php // TODO: truncate with http://www.symfony-project.org/api/1_2/TextHelper ?>
					<span class="address">U-Bahnhof Bundestag (U55)<br />63 Rosenthaler Strasse<br />10119 Berlin</span>
					<span class="time">1<?=$randHr?>:<?=$randMin?> - 1<?=$randHr + 2?>:<?=$randMin?></span>
				</span>

				<span class="clear"></span>
			</li>
<?php endfor ?>
		</ul>
		<div class="clear"></div>

<?php /*

		<p>TODO: list styling</p>

		<table>
		  <thead>
		    <tr>
		      <th>Id</th>
		      <th>Eventbrite</th>
		      <th>Venue</th>
		      <th>Organiser</th>
		      <th>Title</th>
		      <th>Description</th>
		      <th>Start date</th>
		      <th>End date</th>
		      <th>Timezone</th>
		      <th>Url</th>
		      <th>Capacity</th>
		      <th>Created</th>
		      <th>Eventbrite modified</th>
		      <th>Privacy</th>
		      <th>Password</th>
		      <th>Logo</th>
		      <th>Logo ssl</th>
		      <th>Status</th>
		    </tr>
		  </thead>
		  <tbody>
		    <?php foreach ($events as $event): ?>
		    <tr>
		      <td><a href="<?php echo url_for('home/edit?id='.$event->getId()) ?>"><?php echo $event->getId() ?></a></td>
		      <td><?php echo $event->getEventbriteId() ?></td>
		      <td><?php echo $event->getVenueId() ?></td>
		      <td><?php echo $event->getOrganiserId() ?></td>
		      <td><?php echo $event->getTitle() ?></td>
		      <td><?php echo $event->getDescription() ?></td>
		      <td><?php echo $event->getStartDate() ?></td>
		      <td><?php echo $event->getEndDate() ?></td>
		      <td><?php echo $event->getTimezone() ?></td>
		      <td><?php echo $event->getUrl() ?></td>
		      <td><?php echo $event->getCapacity() ?></td>
		      <td><?php echo $event->getCreated() ?></td>
		      <td><?php echo $event->getEventbriteModified() ?></td>
		      <td><?php echo $event->getPrivacy() ?></td>
		      <td><?php echo $event->getPassword() ?></td>
		      <td><?php echo $event->getLogo() ?></td>
		      <td><?php echo $event->getLogoSsl() ?></td>
		      <td><?php echo $event->getStatus() ?></td>
		    </tr>
		    <?php endforeach; ?>
		  </tbody>
		</table>

		<a href="<?php echo url_for('home/new') ?>">New</a>
*/ ?>

<?php include_partial('listing_widget') ?>

	</div>
</div>
