<div id="content" class="screen_user_home">

<?php include_partial('submenu') ?>

	<div class="textual">

		<h1>User profile</h1>

		<h2>Your basic information</h2>
		<ul>
			<li>Name: <?=$user->getFirstName()?></li>
			<li>Surname: <?=$user->getLastName()?></li>
			<li>E-mail address: <?=$user->getEmailAddress()?></li>
			<li>Last successful login: <?=$user->getLastLogin()?></li>
		</ul>

<?php include_partial('main_ticket', array('user' => $user)) ?>
	</div>

	<div class="forms">

		<h2>Your organizer profile</h2>
<?php include_partial('form', array('form' => $form)) ?>
	</div>
</div>
