<div id="hero">

        <div id="hero_background"></div>
        <div id="hero_foreground"></div>
</div>

<div id="content" class="screen_satellites">

<?php include_partial('submenu') ?>

<?php include_partial('listing', array(

	'events'	=> $events,
	'categories'	=> $categories,
	'page'		=> $page,
	'category'	=> $category
)) ?>
</div>
