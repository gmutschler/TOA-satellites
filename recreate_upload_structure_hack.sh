#!/bin/sh
mkdir -p cache
mkdir -p web/uploads/event_images/pins
mkdir -p web/uploads/event_images/social_icons
mkdir -p web/uploads/event_images/thumbs
mkdir -p web/uploads/organiser_images/
touch web/css/main.css
chmod 777 -R cache log web/uploads web/css/main.css
