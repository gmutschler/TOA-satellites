<h1>Events List</h1>

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
      <td><a href="<?php echo url_for('event/show?id='.$event->getId()) ?>"><?php echo $event->getId() ?></a></td>
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

  <a href="<?php echo url_for('event/new') ?>">New</a>
