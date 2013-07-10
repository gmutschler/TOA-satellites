<div id="hero">

        <div id="hero_background"><div id="hero_background_map" style="height: 480px; width: 960px; -webkit-transform: translate3d(0px, 0px, 0px)"></div></div>
</div>

<div id="content" class="screen_satellites">

<?php include_partial('submenu') ?>

<?php include_partial('listing', array(

	'events'	=> $events,
	'categories'	=> $categories,
//	'page'		=> $page,
	'category'	=> $category
)) ?>

</div>

<?php // Hidden stuff for Google Map driving ?>
<input type="hidden" id="map_data_pulp" value="<?=$map_data_pulp?>" />
