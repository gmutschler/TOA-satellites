<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $event->getId() ?></td>
    </tr>
    <tr>
      <th>Eventbrite:</th>
      <td><?php echo $event->getEventbriteId() ?></td>
    </tr>
    <tr>
      <th>Venue:</th>
      <td><?php echo $event->getVenueId() ?></td>
    </tr>
    <tr>
      <th>Organiser:</th>
      <td><?php echo $event->getOrganiserId() ?></td>
    </tr>
    <tr>
      <th>Title:</th>
      <td><?php echo $event->getTitle() ?></td>
    </tr>
    <tr>
      <th>Description:</th>
      <td><?php echo $event->getDescription() ?></td>
    </tr>
    <tr>
      <th>Start date:</th>
      <td><?php echo $event->getStartDate() ?></td>
    </tr>
    <tr>
      <th>End date:</th>
      <td><?php echo $event->getEndDate() ?></td>
    </tr>
    <tr>
      <th>Timezone:</th>
      <td><?php echo $event->getTimezone() ?></td>
    </tr>
    <tr>
      <th>Url:</th>
      <td><?php echo $event->getUrl() ?></td>
    </tr>
    <tr>
      <th>Capacity:</th>
      <td><?php echo $event->getCapacity() ?></td>
    </tr>
    <tr>
      <th>Created:</th>
      <td><?php echo $event->getCreated() ?></td>
    </tr>
    <tr>
      <th>Eventbrite modified:</th>
      <td><?php echo $event->getEventbriteModified() ?></td>
    </tr>
    <tr>
      <th>Privacy:</th>
      <td><?php echo $event->getPrivacy() ?></td>
    </tr>
    <tr>
      <th>Password:</th>
      <td><?php echo $event->getPassword() ?></td>
    </tr>
    <tr>
      <th>Logo:</th>
      <td><?php echo $event->getLogo() ?></td>
    </tr>
    <tr>
      <th>Logo ssl:</th>
      <td><?php echo $event->getLogoSsl() ?></td>
    </tr>
    <tr>
      <th>Status:</th>
      <td><?php echo $event->getStatus() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('event/edit?id='.$event->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('event/index') ?>">List</a>
