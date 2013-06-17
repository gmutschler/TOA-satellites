<?php if($user->getAttendee()->getHasMainTicket()): ?>
	<h3>You have the Unconference ticket!</h3>
	<p>This will allow you entering satellite events for free!<br />(as long as there still are free tickets there)</p>
<?php else: ?>
	<h3>You don't have the Unconference ticket</h3>
	<p>Getting such ticket will allow you to enter satellite events for free!<br /><a class="button_red" href="#" onclick="alert('TODO'); return false">Get yours now!</a></p>
<?php endif ?>
