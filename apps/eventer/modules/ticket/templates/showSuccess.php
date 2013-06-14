<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $ticket->getId() ?></td>
    </tr>
    <tr>
      <th>Event:</th>
      <td><?php echo $ticket->getEventId() ?></td>
    </tr>
    <tr>
      <th>Type:</th>
      <td><?php echo $ticket->getType() ?></td>
    </tr>
    <tr>
      <th>Price:</th>
      <td><?php echo $ticket->getPrice() ?></td>
    </tr>
    <tr>
      <th>Max:</th>
      <td><?php echo $ticket->getMax() ?></td>
    </tr>
    <tr>
      <th>Min:</th>
      <td><?php echo $ticket->getMin() ?></td>
    </tr>
    <tr>
      <th>Start date:</th>
      <td><?php echo $ticket->getStartDate() ?></td>
    </tr>
    <tr>
      <th>End date:</th>
      <td><?php echo $ticket->getEndDate() ?></td>
    </tr>
    <tr>
      <th>Quantity available:</th>
      <td><?php echo $ticket->getQuantityAvailable() ?></td>
    </tr>
    <tr>
      <th>Quantity sold:</th>
      <td><?php echo $ticket->getQuantitySold() ?></td>
    </tr>
    <tr>
      <th>Visible:</th>
      <td><?php echo $ticket->getVisible() ?></td>
    </tr>
    <tr>
      <th>Eventbrite:</th>
      <td><?php echo $ticket->getEventbriteId() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('ticket/edit?id='.$ticket->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('ticket/index') ?>">List</a>
