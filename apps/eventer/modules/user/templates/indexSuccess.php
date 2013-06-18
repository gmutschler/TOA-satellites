<div id="content" class="screen_user_home">

<?php include_partial('submenu') ?>

	<div class="textual">

		<h1>User profile</h1>

        <div class="profile-basic-infos">
		<h2>Your basic information</h2>
            <ul>
                <li><strong>Surname:</strong> <?=$user->getFirstName()?></li>
                <li><strong>Name:</strong> <?=$user->getLastName()?></li>
                <li><strong>E-mail address:</strong> <?=$user->getEmailAddress()?></li>
                <li><strong>Last successful login:</strong> <?=$user->getLastLogin()?></li>
            </ul>
        </div>
<?php include_partial('main_ticket', array('user' => $user)) ?>
        <div class="clear"></div>
	</div>

	<div class="textual forms">

		<h2>Your organizer profile</h2>
<?php include_partial('form', array('form' => $form)) ?>
	</div>
</div>
