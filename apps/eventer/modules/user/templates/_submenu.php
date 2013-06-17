<?php include_partial('global/submenu', array(

	'submenu_title' => 'User profile',
	'links' => array(

		'Overview'		=> 'user/index',
		'Your tickets'		=> 'user/tickets',
		'Events you host'	=> 'user/hostedevents',
		'Logout'		=> 'sf_guard_signout'
	)
))?>
