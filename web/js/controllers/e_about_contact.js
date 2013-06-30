// # ABOUT/CONTACT screen controller
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
			multi: false,

			// geographical defaults
			gmap_zoom: 16,
			gmap_y: 52.505733,
			gmap_x: 13.299347,

			gmap_styles: GoogleMapStyles,

			// custom pointer path
			pointer_path: '/images/content/pin-contact.png'
		}
	});
});
