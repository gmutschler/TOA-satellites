// # SATELLITES/BOOK screen controller
document.observe("dom:loaded", function() {

	// Load the map
	new Displaymap({

		// elms
		map: 'hero_background_map',
		data: 'map_data_pulp',
		scrollwheel: false,

		// conf
		conf: {
			// are we using for many or single point?
			multi: true,

			// geographical defaults
			gmap_zoom: 12,
			gmap_y: 52.5095350,
			gmap_x: 13.3723340,

			gmap_styles: GoogleMapStyles,

			// custom pointer path
			event_path: '/satellites/event/id/#{id}',
			pointer_path: '/uploads/event_images/pins/#{id}.png'
		}
	});
});
