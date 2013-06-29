/** section: toa libraries
 * class Formmap
 *
 *  Single-point Google map to be embedded in simple forms
 *  
 *  rev 2013-06-28
 *
 *  (c) Maciej Taranienko <maciej@canadel.ee>
 *
 *  requires:
 *  - Prototype 1.7.1+
 *  - Scriptaculous 1.9.0+
 *  - Google Maps API v3.X
 *
 *  LATER:
 *  - Add plenty sanity checks around ;)
**/
Formmap = Class.create({

	// config
	config: undefined,

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
	objGeocoder: undefined,
	objMarker: undefined,

	// storage
	latitude: 0,
	longitude: 0,
	lastSearched: null,

	// states
	isProcessingGeocode: false,

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

		// load Google Map object and set it's styles
		this.objGoogleMapStyle = new google.maps.StyledMapType(params.conf.gmap_styles, { name: 'TOA Berlin' });
		this.objGoogleMap = new google.maps.Map(this.elmMap, {

			zoom: params.conf.gmap_zoom,
			center: new google.maps.LatLng(this.latitude, this.longitude),
			mapTypeId: 'map_style',
			disableDefaultUI: true
		});
		this.objGoogleMap.mapTypes.set('map_style', this.objGoogleMapStyle);
		this.objGoogleMap.setMapTypeId('map_style');

		// create the marker
		this.objLatLng = new google.maps.LatLng(this.latitude, this.longitude);
		this.objMarker = new google.maps.Marker({

			position: new google.maps.LatLng(this.latitude, this.longitude),
			map: this.objGoogleMap,
			draggable: true
		});

		// create geocoder object
		this.objGeocoder = new google.maps.Geocoder();

		// register observers
		this.elmsInputsReactive.each(function(elmInput) {

			new Form.Element.DelayedObserver(elmInput, 0.75, this.onDelayedInput.bindAsEventListener(this));
			elmInput.observe('blur', this.onDelayedInput.bindAsEventListener(this));

		}.bind(this));
		google.maps.event.addListener(this.objMarker, 'dragstart', this.onDragMarker.bindAsEventListener(this));
		google.maps.event.addListener(this.objMarker, 'dragend', this.onDropMarker.bindAsEventListener(this));
	},

	// public interface
	save: function() {

		if(this.objMarker && this.elmHiddenLat && this.elmHiddenLng) {

			// fetch latlng object locally
			objLatLng = this.objMarker.getPosition();

			// write the values
			this.elmHiddenLat.setValue(objLatLng.lat().toString());
			this.elmHiddenLng.setValue(objLatLng.lng().toString());
		}
		else throw 'Formmap: Cannot save data, some errors occured!';
	},

	// private methods
	_buildSearchString: function() {

		searchString = '';
		this.elmsInputsReactive.each(function(elmInput, index) {

			if(elmInput.getValue()) {

				searchString += elmInput.getValue();
				if(index < this.elmsInputsReactive.length - 1) searchString += ', ';
			}
		}.bind(this));

		return searchString;
	},

	_moveViewportAndMarker: function(geometry) {

		this.objGoogleMap.fitBounds(geometry.viewport);
		this.objMarker.setPosition(geometry.location);
		this.objMarker.setAnimation(google.maps.Animation.DROP);

		this.save();
	},

	// calbacks
	onDelayedInput: function(e) {

		if(!this.isProcessingGeocode) {

			// don't flood geocoder if we happened to fire on exactly the same input text
			searchString = this._buildSearchString();
			if(searchString && searchString != this.lastSearched) {

				this.objGeocoder.geocode({ address: searchString }, this.onGeocodeComplete.bind(this));
				this.lastSearched = searchString;
				this.isProcessingGeocode = true;

				console.log('Geocoder sent for: ' + searchString);
			}
		}
	},
	onGeocodeComplete: function(results, status) {

		if(status == google.maps.GeocoderStatus.OK) this._moveViewportAndMarker(results[0].geometry);

		this.isProcessingGeocode = false;
	},
	onDragMarker: function(e) {
	},
	onDropMarker: function(e) {

		this.save();
	}
});
