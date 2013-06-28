// # SATELLITES/EVENT screen controller
document.observe("dom:loaded", function() {

	// Load the map
	new Displaymap({

		// elms
		map: 'hero_background',
		data: 'map_data_pulp',

		// conf
		conf: {
			// are we using for many or single point?
			multi: false,

			// geographical defaults
			gmap_zoom: 11,
			gmap_y: 52.5095350,
			gmap_x: 13.3923340,

			gmap_styles: GoogleMapStyles,

			// custom pointer path
			pointer_path: '/uploads/event_images/pins/#{id}.png'
		}
	});
});
