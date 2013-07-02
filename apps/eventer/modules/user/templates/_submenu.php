<?php

// Default links
$links = array(

	'Your Profile'		=> 'user/index'/*,
	'Your tickets'		=> 'user/tickets'
*/
);

// add hosted link for people who host something
if(isset($user) and count($user->getOrganiser()->getEvents())) $links['Events you host'] = 'user/hostedevents';

// add default logout
$links['Logout'] = 'sf_guard_signout';

// render the partial
include_partial('global/submenu', array(

	'submenu_title' => 'User profile',
	'links' => $links
))?>
