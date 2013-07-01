<?php use_helper('Text') ?>
<div id="content" class="screen_host">

<?php include_partial('submenu') ?>

	<div class="textual">
        <a href="/user/hostedevents/" class="button_back"><big>&lsaquo;</big> All your events</a>
		<h1>Host an event</h1>

        <div class="forms">
    
            <?php include_partial('form', array('form' => $form)) ?>
        </div>
	</div>
</div>
