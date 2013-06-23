<?php

// Default links
$links = array(
    'Introduction'  => 'satellites/index',
    'Book'          => 'satellites/book',
    'Host'          => 'satellites/host'
);

// add hosted link for people who host something
if($sf_user->isAuthenticated() and count($sf_user->getGuardUser()->getOrganiser()->getEvents())) $links['Manage'] = 'user/hostedevents';

include_partial('global/submenu', array(

	'submenu_title' => 'The Satellites',
	'links' => $links
)) ?>
