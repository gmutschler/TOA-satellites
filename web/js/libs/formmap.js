/** section: toa libraries
 * class Formmap
 *
 *  Single-point Google map to be embedded in simple forms
 *  
 *  rev 2013-06-27
 *
 *  (c) Maciej Taranienko <maciej@canadel.ee>
 *
 *  requires:
 *  - Prototype 1.7.1+
 *  - Scriptaculous 1.9.0+
 *  - Google Maps API v3.X
 *
 *  TODO:
 *  - Add gmap pointer with possibility to drag/drop
 *  - Add reactive events
 *  - Kill the option to change from TOA style to normal
 *
 *  LATER:
 *  - Add some sanity checks in the class init
**/
Formmap = Class.create({

	// config
	config: undefined,	// ** consider if we ever need this

	// elms
	elmMap: undefined,
	elmHiddenLat: undefined,
	elmHiddenLng: undefined,
	elmsInputsReactive: [],

	// objs
	objGoogleMap: undefined,
	objGoogleMapStyle: undefined,
	// TODO: geocoder? point?

	// init
	initialize: function(params) {

		// read config
		this.config = params.conf;

		// parse common elms
		this.elmMap = $(params.map);
		if(params.reactive) params.reactive.each(function(elm) { this.elmsInputsReactive.push($(elm)); }.bind(this));

		// load Google Maps objects
		this.objGoogleMapStyle = new google.maps.StyledMapType(params.conf.gmap_styles, { name: 'TOA Berlin' });
		this.objGoogleMap = new google.maps.Map(this.elmMap, {

			zoom: params.conf.gmap_zoom,
			center: new google.maps.LatLng(parseFloat(params.conf.gmap_y), parseFloat(params.conf.gmap_x)),
			mapTypeControlOptions: {

				mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
			}
		});

		// set the styles
		this.objGoogleMap.mapTypes.set('map_style', this.objGoogleMapStyle);
		this.objGoogleMap.setMapTypeId('map_style');

		// TODO: start observers
		//this.elmsInputsReactive.invoke('on', 'focus', this.onFocusInput.bindAsEventListener(this));
	}
});
