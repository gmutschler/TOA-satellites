<?php /*
	Main Hero Unit partial

	We should pass here:
	- submenu title
	- submenu items
	- media (with some attributes)

	TODO: http://stackoverflow.com/questions/6588549/make-google-maps-plugin-black-white-or-with-sepia-filter
	LATER: think of non-internal links; maybe check if they're prefixed with http(s)?:// ?
	LATER: check if local route works if we got more filtering
*/

// Some pre-defined vars
$local_route = $sf_context->getRouting()->getCurrentInternalUri();

?>
<div id="hero">

	<div id="hero_media">
<?php if(isset($media) and isset($media['type'])): ?>

<?php	if($media['type'] == 'image') {		// ** IMAGES ?>
		<img src="<?=isset($media['path']) ? $media['path'] : '/images/content/test_hero_map_image.png'?>" alt="<?=isset($media['alt']) ? $media['alt'] : ''?>" />

<?php	} else if($media['type'] == 'partial') {	// ** PARTIALS
		include_partial($media['path'], isset($media['data']) ? $media['data'] : array()); 
	} ?>

<?php else: ?>
		<p>The hero partial was declared improperly!</p>
<?php endif ?>
	</div>

<?php if(isset($submenu_title) and isset($links)): ?>
	<div id="hero_submenu">

		<h3><?=$submenu_title?></h3>
<?php	if(isset($links) and count($links)): ?>
		<ul>
<?php		foreach($links as $link_title => $link_route): ?>
			<li><a href="<?=url_for($link_route)?>"<?php if($link_route == $local_route) { ?> class="selected"<?php } ?>><?=$link_title?></a></li>
<?php		endforeach ?>
		</ul>
<?php 	endif ?>
	</div>
<?php endif ?>
</div>
