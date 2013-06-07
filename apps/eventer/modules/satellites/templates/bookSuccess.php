<div id="content" class="screen_satellites">

<?php include_partial('hero') ?>

<?php include_partial('listing', array(

	'events' => $events
)) ?>
</div>


<?php /*
<h1>Events List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Category</th>
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
      <th>Moderated</th>
      <th>Listing color</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($events as $event): ?>
    <tr>
      <td><a href="<?php echo url_for('satellites/edit?id='.$event->getId()) ?>"><?php echo $event->getId() ?></a></td>
      <td><?php echo $event->getCategoryId() ?></td>
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
      <td><?php echo $event->getModerated() ?></td>
      <td><?php echo $event->getListingColor() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('satellites/new') ?>">New</a>
*/ ?>
