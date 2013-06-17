<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('user/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

	<?php echo $form->renderGlobalErrors() ?>

	<div class="section_block last">

		<h3>Data displayed on hosted events</h3>

		<div class="section long<?php if($form['name']->hasError()) { ?> error<? } ?>">
			<?=$form['name']?>
			<?=$form['name']->renderError()?>
		</div>
		<div class="section long<?php if($form['description']->hasError()) { ?> error<? } ?>">
			<?=$form['description']?>
			<?=$form['description']->renderError()?>
		</div>
		<div class="section long<?php if($form['logo']->hasError()) { ?> error<? } ?>">
			<?=$form['logo']?>
			<?=$form['logo']->renderError()?>
		</div>
		<div class="section long<?php if($form['url']->hasError()) { ?> error<? } ?>">
			<?=$form['url']?>
			<?=$form['url']->renderError()?>
		</div>
		<div class="section long<?php if($form['twitter']->hasError()) { ?> error<? } ?>">
			<?=$form['twitter']?>
			<?=$form['twitter']->renderError()?>
		</div>
		<div class="section long<?php if($form['facebook']->hasError()) { ?> error<? } ?>">
			<?=$form['facebook']?>
			<?=$form['facebook']->renderError()?>
		</div>
	</div>

	<div class="section_controls">
		<input type="submit" class="button_red" value="Update your profile" />
	</div>

<?php // background stuff ?>
<?php if(!$form->getObject()->isNew()): ?><input type="hidden" name="sf_method" value="put" /><?php endif ?>
<?php echo $form->renderHiddenFields(false) ?>

</form>
