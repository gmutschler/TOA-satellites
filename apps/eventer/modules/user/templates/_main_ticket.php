<div class="profile-main-ticket">
<?php if($user->getAttendee()->getHasMainTicket()): ?>
	<h3>You have the Unconference ticket!</h3>
	<p>This allow you, from now on to book all satellite events for free!<br /><em>(as long as there still are free tickets there)</em></p>
<?php else: ?>
	<h3>You don't have the Unconference ticket</h3>
	<p>Get it before booking any satellite event, it will allow you to enter them for free!<br/><em>(as long as there still are free tickets there)</em></p><a class="button_red" href="#" onclick="alert('TODO'); return false">Get yours now!</a>
<?php endif ?>
</div>