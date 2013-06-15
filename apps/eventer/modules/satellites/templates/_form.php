<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('satellites/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

	<?php echo $form->renderGlobalErrors() ?>

	<div class="section_block">

		<h3>The Event Details</h3>

		<div class="section long">
			<?=$form['category_id']?>
			<?=$form['category_id']->renderError()?>
		</div>
		<div class="section long">
			<?=$form['title']?>
			<?=$form['title']->renderError()?>
		</div>
		<div class="section time">
			<p class="notice fleft">from <?=$form['start_hour']?></p>
			<p class="notice fleft">to <?=$form['end_hour']?></p>

			<div class="clear"></div>
			<?=$form['start_hour']->renderError()?>
			<?=$form['end_hour']->renderError()?>
		</div>
		<div class="section upload">
			<?=$form['logo']?>
			<?=$form['logo']->renderError()?>
		</div>
		<div class="section long">
			<?=$form['description']?>
			<?=$form['description']->renderError()?>
		</div>
		<div class="section">
			<?=$form['listing_color']?>
			<?=$form['listing_color']->renderError()?>
		</div>
	</div>

	<div class="section_block">

		<h3>The Venue</h3>
		<div class="section long">
			<?=$form['venue_name']?>
			<?=$form['venue_name']->renderError()?>
		</div>
		<div class="section long">
			<?=$form['venue_address']?>
			<?=$form['venue_address']->renderError()?>
		</div>
		<div class="section city">
			<div class="column fleft">
				<?=$form['venue_postal_code']?>
				<?=$form['venue_postal_code']->renderError()?>
			</div>
			<div class="column fright">
				<?=$form['venue_city']?>
				<?=$form['venue_city']->renderError()?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section gmap">
			Map widget will be there ;)
		</div>
	</div>


	<div class="section_block last">

		<h3>The tickets <a class="button_black fright" href="#TODO">&plus; Add more tickets</a></h3>

	<?php	foreach($form['newTickets'] as $ticket): ?>
		<div class="section long">
			<?=$ticket['name']?>
			<?=$ticket['name']->renderError()?>
		</div>
		<div class="section long">
			<?=$ticket['description']?>
			<?=$ticket['description']->renderError()?>
		</div>
		<div class="section price">
			<div class="column fleft">
				<?=$ticket['price']?>
				<?=$ticket['price']->renderError()?>
			</div>
			<div class="column fright">
				<p class="notice">Quantity available: <?=$ticket['quantity_declared']?></p>
				<?=$ticket['quantity_declared']->renderError()?>
			</div>
			<div class="clear"></div>
		</div>
	</div>

<?php	endforeach ?>

<?php // control panel :) ?>
	<div class="section_controls">
		<p class="notice">By clicking the button, you agree to our <a href="#TODO">terms and conditions</a>.</p>
		<input type="submit" class="button_red" value="<?=$form->getObject()->isNew() ? 'Create event' : 'Update event'?>" />

<?php // TODO: deletion - think of it? ?>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'satellites/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
	</div>

<?php // background stuff ?>
<?php if(!$form->getObject()->isNew()): ?><input type="hidden" name="sf_method" value="put" /><?php endif ?>
<?php echo $form->renderHiddenFields(false) ?>

</form>
