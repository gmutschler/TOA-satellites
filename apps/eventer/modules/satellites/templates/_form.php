<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('satellites/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

	<?php echo $form->renderGlobalErrors() ?>

	<div class="section_block">

		<h3>The Event Details</h3>

		<div class="section long dropdown dropdown_big<?php if($form['category_id']->hasError()) { ?> error<? } ?>">
			<?=$form['category_id']?>
			<?=$form['category_id']->renderError()?>
		</div>
		<div class="section long<?php if($form['title']->hasError()) { ?> error<? } ?>">
			<?=$form['title']?>
			<?=$form['title']->renderError()?>
		</div>
		<div class="section time">
			<p class="notice fleft<?php if($form['start_hour']->hasError()) { ?> error<? } ?>">from <span class="dropdown dropdown_small"><?=$form['start_hour']?></span></p>
			<p class="notice fleft<?php if($form['end_hour']->hasError()) { ?> error<? } ?>">to <span class="dropdown dropdown_small"><?=$form['end_hour']?></span></p>

			<div class="clear"></div>
			<?=$form['start_hour']->renderError()?>
			<?=$form['end_hour']->renderError()?>
		</div>
		<div class="section upload<?php if($form['logo']->hasError()) { ?> error<? } ?>">
			<?=$form['logo']?>
			<?=$form['logo']->renderError()?>
            <p class="notice">Your image must be JPG, GIF or PNG format and not exceed 2MB.<br />It will be resized to make it's width 582px</p>
		</div>
		<div class="section long description<?php if($form['description']->hasError()) { ?> error<? } ?>">
			<?=$form['description']?>
			<?=$form['description']->renderError()?>
		</div>
		<div class="section color<?php if($form['listing_color']->hasError()) { ?> error<? } ?>">
			<?=$form['listing_color']?>
			<?=$form['listing_color']->renderError()?>
		</div>
	</div>

	<div class="section_block">

		<h3>The Venue</h3>
		<div class="section long<?php if($form['venue_name']->hasError()) { ?> error<? } ?>">
			<?=$form['venue_name']?>
			<?=$form['venue_name']->renderError()?>
		</div>
		<div class="section long<?php if($form['venue_address']->hasError()) { ?> error<? } ?>">
			<?=$form['venue_address']?>
			<?=$form['venue_address']->renderError()?>
		</div>
		<div class="section city">
			<div class="column fleft<?php if($form['venue_postal_code']->hasError()) { ?> error<? } ?>">
				<?=$form['venue_postal_code']?>
				<?=$form['venue_postal_code']->renderError()?>
			</div>
			<div class="column fright<?php if($form['venue_city']->hasError()) { ?> error<? } ?>">
				<?=$form['venue_city']?>
				<?=$form['venue_city']->renderError()?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section gmap">
			<div id="gmap">
			</div>
		</div>
	</div>

	<div class="section_block">

		<h3>The Payment option</h3>
		<div class="section long<?php if($form['paypal']->hasError()) { ?> error<? } ?>">
			<?=$form['paypal']?>
			<?=$form['paypal']->renderError()?>
			<p class="notice">If you want to set up paid tickets, please provide a valid paypal account to get the payments</p>
		</div>
	</div>
    
	<div class="section_block last">

		<h3>The tickets <a class="button_black button_black_small fright" href="#TODO" onclick="alert('This function is under construction. For now - new ticket form will appeaer whenever you submit a valid ticket.')">&plus; Add more tickets</a></h3>

<?php	if(isset($form['Tickets']) and count($form['Tickets'])) foreach($form['Tickets'] as $key => $ticket) include_partial('subform_ticket', array(

			'key' => $key,
			'ticket' => $ticket
)) ?>

<?php	foreach($form['newTickets'] as $key => $ticket) include_partial('subform_ticket', array(

			'new' => true,
			'key' => $key,
			'ticket' => $ticket
)) ?>
	</div>

<?php // control panel :) ?>
	<div class="section_controls">
		<p class="notice">By clicking the button, you agree to our <a href="#TODO">terms and conditions</a>.</p>
		<input type="submit" class="button_red" value="<?=$form->getObject()->isNew() ? 'Create event' : 'Update event'?>" />
	</div>

<?php // background stuff ?>
<?php if(!$form->getObject()->isNew()): ?><input type="hidden" name="sf_method" value="put" /><?php endif ?>
<?php echo $form->renderHiddenFields(false) ?>

</form>
