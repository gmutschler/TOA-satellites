<div id="content" class="screen_user_home">

<?php include_partial('submenu', array('user' => $user)) ?>

	<div class="textual">
		
		<div class="satellites_tickets">
			<h2>Your Satellite Events tickets</h2>
<?php if(count($user->getAttendee()->getTickets())): ?>
			<ul>
<?php	foreach($user->getAttendee()->getTickets() as $ticket): ?>
				<li><?=$ticket->getName()?> for event <?=$ticket->getEvent()->getTitle()?></li>
<?php	endforeach ?>
			</ul>
<?php else: ?>
			<p>You don't have any satellite tickets now. <a href="/satellites/book/">Book some</a></php_user_filter>
<?php endif ?>
		</div>
		
<?php include_partial('main_ticket', array('user' => $user)) ?>
        <div class="clear"></div>

	</div>
</div>
