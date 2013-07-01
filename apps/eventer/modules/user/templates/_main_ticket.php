<div class="profile-main-ticket">
<?php if($user->getAttendee()->getHasMainTicket()): ?>
	<h3>You have a Tech Open Air ticket!</h3>
	<p>You  got now access* to aspecially reserved contingent at every satellite event and also got free entrance* to any paid event.</p>
    <p><em>* As long as satellite event is not completely sold out, incl. special TOA contingent.</em></p>
<?php else: ?>
	<h3>Don't have a Tech Open Air ticket yet?</h3>
	<p>With a ticket you will get access* to aspecially reserved contingent at every satellite event and also enjoy free entrance* to any paid event.</p>
    <p><em>* As long as satellite event is not completely sold out, incl. special TOA contingent.</em></p>
    <a class="button_red" href="#" onclick="alert('TODO'); return false">Get yours now!</a>
<?php endif ?>
</div>
