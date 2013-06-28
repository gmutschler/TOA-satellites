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

	// Google-driven events
	gevClickMarker: undefined,
	gevDragMarker: undefined,
	gevDropMarker: undefined,

	// objs
	objGoogleMap: undefined,
	objGoogleMapStyle: undefined,
	// TODO: geocoder? point?
	objLatLang: undefined,
	objMarker: undefined,

	// storage
	latitude: 0,
	longitude: 0,

	// init
	initialize: function(params) {

		// parse common elms
		this.elmMap = $(params.map);
		if(params.reactive) params.reactive.each(function(elm) { this.elmsInputsReactive.push($(elm)); }.bind(this));
		this.elmHiddenLat = $(params.lat);
		this.elmHiddenLng = $(params.lng);

		// read config and parse some values
		this.config = params.conf;
		this.latitude = $F(this.elmHiddenLat) ? parseFloat($F(this.elmHiddenLat)) : parseFloat(params.conf.gmap_y);
		this.longitude = $F(this.elmHiddenLng) ? parseFloat($F(this.elmHiddenLng)) : parseFloat(params.conf.gmap_x);

		// load Google Maps object and set it's styles
		this.objGoogleMapStyle = new google.maps.StyledMapType(params.conf.gmap_styles, { name: 'TOA Berlin' });
		this.objGoogleMap = new google.maps.Map(this.elmMap, {

			zoom: params.conf.gmap_zoom,
			center: new google.maps.LatLng(this.latitude, this.longitude),
			mapTypeControlOptions: {

				mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
			}
		});
		this.objGoogleMap.mapTypes.set('map_style', this.objGoogleMapStyle);
		this.objGoogleMap.setMapTypeId('map_style');

		// create the marker
		this.objLatLng = new google.maps.LatLng(this.latitude, this.longitude);
		this.objMarker = new google.maps.Marker({

			position: this.objLatLang,
			map: this.objGoogleMap
		});


		//console.log(this.latitude);
		//console.log(this.longitude);


		// TODO: start observers
		//this.elmsInputsReactive.invoke('on', 'focus', this.onFocusInput.bindAsEventListener(this));
	}
});
