<div id="content" class="screen_user_home">

<?php include_partial('submenu', array('user' => $user)) ?>

	<div class="textual">

		<h1>The tickets you have</h1>

<?php if(count($user->getAttendee()->getTickets())): ?>
		<h3>Satellite event tickets you have</h3>
		<ul>
<?php	foreach($user->getAttendee()->getTickets() as $ticket): ?>
			<li><?=$ticket->getName()?> for event <?=$ticket->getEvent()->getTitle()?></li>
<?php	endforeach ?>
		</ul>
<?php else: ?>
		<h3>You don't have any satellite tickets</h3>
<?php endif ?>

<?php include_partial('main_ticket', array('user' => $user)) ?>
        <div class="clear"></div>

	</div>
</div>
