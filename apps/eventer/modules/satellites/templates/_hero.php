<?php include_partial('global/hero', array(

/*
	'media' => array(

		'type'		=> 'image',
		'path'		=> '/images/content/test_hero_map_image.png',
		'alt'		=> 'Hello world!'
	),
*/
	'media' => array(

		'type'		=> 'partial',
		'path'		=> 'satellites/hero_gmap',
		'data'		=> array('hello' => 'world')
	),

	'submenu_title' => 'The Satellites',
	'links' => array(

		'Introduction'  => 'satellites/index',
		'Book'          => 'satellites/book',
		'Host'          => 'satellites/host'
	)
)) ?>
