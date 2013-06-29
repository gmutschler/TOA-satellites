// # SATELLITES/HOST screen controller
document.observe("dom:loaded", function() {

	// Load the Color Picker
	new Control.ColorPicker('event_listing_color');

	// Load the map
	new Formmap({

		map: 'gmap',
		lat: 'event_venue_latitude',
		lng: 'event_venue_longitude',
		//reactive: ['event_venue_name', 'event_venue_city', 'event_venue_address'],
		reactive: ['event_venue_city', 'event_venue_address'],

		conf: {

			// geographical defaults
			gmap_zoom: 12,
			gmap_y: 52.5095350,
			gmap_x: 13.3923340,

			gmap_styles: GoogleMapStyles
		}
	});
});
