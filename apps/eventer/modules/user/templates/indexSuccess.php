<div id="content" class="screen_user_home">

<?php include_partial('submenu', array('user' => $user)) ?>

	<div class="textual">

		<h2>Basic information</h2>

        <div class="profile-basic-infos">
            <ul>
                <li><strong>First Name:</strong> <?=$user->getFirstName()?></li>
                <li><strong>Name:</strong> <?=$user->getLastName()?></li>
                <li><strong>E-mail address:</strong> <?=$user->getEmailAddress()?></li>
                <li><strong>Last successful login:</strong> <?=$user->getLastLogin()?></li>
            </ul>
            
            <div class="textual forms">
                <h2>Informations displayed on your events</h2>
<?php include_partial('form', array('form' => $form)) ?>
	       </div>
        </div>
<?php include_partial('main_ticket', array('user' => $user, 'melody' => $melody)) ?>
        <div class="clear"></div>
	</div>

</div>
