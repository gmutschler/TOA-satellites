<?php if(isset($type) and $type == 'upper'): ?>
<h1>Satellite Events <span>from 10am to 3:30pm</span></h1>
<?php endif ?>

<div class="listing_widget<?php if(isset($type) and !is_null($type)) print ' ' . $type ?>">

	<a class="listing_widget_next"></a>
	<a class="listing_widget_prev"></a>

	<div class="measure pos1"></div>	<?php // TODO: adjust POS by page ?>
</div>
