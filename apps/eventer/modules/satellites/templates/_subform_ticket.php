		<p class="notice">Ticket 1 (TODO: count)</p>

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
				<p class="notice">Quantity available: <?=$ticket['quantity_declared']?></p>
				<?=$ticket['quantity_declared']->renderError()?>
			</div>
			<div class="clear"></div>
		</div>