<?php if(isset($new) and isset($key)): ?>
		<h3 style="text-transform: none;"><strong>New Ticket <?=$key + 1?></strong></h3>
<?php elseif(isset($key)): ?>
	   <h3 style="text-transform: none;"><strong>Ticket <?=$key + 1?></strong></h3>
<?php endif ?>

		<div class="section long<?php if($ticket['name']->hasError()) { ?> error<? } ?>">
			<?=$ticket['name']?>
			<?=$ticket['name']->renderError()?>
		</div>
		<div class="section long<?php if($ticket['description']->hasError()) { ?> error<? } ?>">
			<?=$ticket['description']?>
			<?=$ticket['description']->renderError()?>
		</div>
		<div class="section price">
			<div class="column fleft<?php if($ticket['price']->hasError()) { ?> error<? } ?>">
				<?=$ticket['price']?>
				<?=$ticket['price']->renderError()?>
			</div>
			<div class="column fright<?php if($ticket['quantity_declared']->hasError()) { ?> error<? } ?>">
				<p class="notice">Total quantity: <?=$ticket['quantity_declared']?></p>
				<?=$ticket['quantity_declared']->renderError()?>
			</div>
			<div class="clear"></div>
		</div>
