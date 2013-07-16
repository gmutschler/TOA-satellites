<?php

// Default links
$links = array(
    'Book'          => 'satellites/index',
    'About'         => 'satellites/about',
    'Host'          => 'satellites/host'
);

// add hosted link for people who host something;		** TEMPORARY DEPRECATED
//if($sf_user->isAuthenticated() and count($sf_user->getGuardUser()->getOrganiser()->getEvents())) $links['Manage'] = 'user/hostedevents';

include_partial('global/submenu', array(

	'submenu_title' => 'The Satellites',
	'links' => $links
)) ?>
