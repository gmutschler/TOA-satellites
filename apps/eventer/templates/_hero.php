<?php /*
	Main Hero Unit partial

	We should pass here:
	- submenu title
	- submenu items
	- media (with some attributes for media type? TODO

	TODO: media as partials, images, or videos?
	TODO: think of non-internal links; maybe check if they're prefixed with http(s)?:// ?
	TODO: check if local route works if we got more filtering
*/

// Some pre-defined vars
$local_route = $sf_context->getRouting()->getCurrentInternalUri();

?>
<div id="hero">

	<div id="hero_media">

	<?php // TODO: http://stackoverflow.com/questions/6588549/make-google-maps-plugin-black-white-or-with-sepia-filter ?>
<?php 
		// disabled map for time working with CSS due to longer Firebug/Chrome Console load
/*
		<iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=pl&amp;geocode=&amp;q=Berlin,+Niemcy&amp;aq=0&amp;oq=Berlin&amp;sll=37.0625,-95.677068&amp;sspn=65.93951,94.746094&amp;ie=UTF8&amp;hq=&amp;hnear=Berlin,+Niemcy&amp;ll=52.519171,13.406091&amp;spn=0.202517,0.370102&amp;t=m&amp;z=12&amp;output=embed"></iframe>
*/ ?>
		<img src="/images/content/test_hero_map_image.png" alt="" />
	</div>

	<div id="hero_submenu">

		<h3><?=$submenu_title?></h3>
<?php if(isset($links) and count($links)): ?>
		<ul>
<?php	foreach($links as $link_title => $link_route): ?>
			<li><a href="<?=url_for($link_route)?>"<?php if($link_route == $local_route) { ?> class="selected"<?php } ?>><?=$link_title?></a></li>
<?php	endforeach ?>
		</ul>
<?php endif ?>
	</div>
</div>
