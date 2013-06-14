<h1>Tickets List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Event</th>
      <th>Type</th>
      <th>Price</th>
      <th>Max</th>
      <th>Min</th>
      <th>Start date</th>
      <th>End date</th>
      <th>Quantity available</th>
      <th>Quantity sold</th>
      <th>Visible</th>
      <th>Eventbrite</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tickets as $ticket): ?>
    <tr>
      <td><a href="<?php echo url_for('ticket/show?id='.$ticket->getId()) ?>"><?php echo $ticket->getId() ?></a></td>
      <td><?php echo $ticket->getEventId() ?></td>
      <td><?php echo $ticket->getType() ?></td>
      <td><?php echo $ticket->getPrice() ?></td>
      <td><?php echo $ticket->getMax() ?></td>
      <td><?php echo $ticket->getMin() ?></td>
      <td><?php echo $ticket->getStartDate() ?></td>
      <td><?php echo $ticket->getEndDate() ?></td>
      <td><?php echo $ticket->getQuantityAvailable() ?></td>
      <td><?php echo $ticket->getQuantitySold() ?></td>
      <td><?php echo $ticket->getVisible() ?></td>
      <td><?php echo $ticket->getEventbriteId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('ticket/new') ?>">New</a>
