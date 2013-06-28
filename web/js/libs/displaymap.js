/** section: toa libraries
 * class Displaymap
 *
 *  Multi-point Google map displayer
 *
 *  rev 2013-06-28
 *
 *  (c) Maciej Taranienko <maciej@canadel.ee>
 *
 *  requires:
 *  - Prototype 1.7.1+
 *  - Google Maps API v3.X
**/
Displaymap = Class.create({

	// config
	config: undefined,

	// elms
	elmMap: undefined,
	elmInputData: undefined,

	// objs
	objGoogleMap: undefined,

	// storage
	hostPrefix: null,
	pointsData: [],
	latitude: 0,
	longitude: 0,

	// init
	initialize: function(params) {

		// parse common elms
		this.elmMap = $(params.map);
		this.elmInputData = $(params.data);

		// read config, load data and parse some values
		this.config = params.conf;
		this.hostPrefix = window.location.protocol + '//' + window.location.hostname;	// TODO: test cross-browser!
		this._loadData();

		// defaults
		this.latitude = parseFloat(this.config.gmap_y);
		this.longitude = parseFloat(this.config.gmap_x);

		// overrides for single display
		if(!this.config.multi && this.pointsData && this.pointsData.lat && this.pointsData.lng) {

			this.latitude = parseFloat(this.pointsData.lat);
			this.longitude = parseFloat(this.pointsData.lng);
		}

		// load Google Map object with style
		this.objGoogleMapStyle = new google.maps.StyledMapType(params.conf.gmap_styles, { name: 'TOA Berlin' });
		this.objGoogleMap = new google.maps.Map(this.elmMap, {

			zoom: this.config.gmap_zoom,
			center: new google.maps.LatLng(this.latitude, this.longitude),
			mapTypeId: 'map_style',
			disableDefaultUI: true
		});
		this.objGoogleMap.mapTypes.set('map_style', this.objGoogleMapStyle);
		this.objGoogleMap.setMapTypeId('map_style');

		// render point(s)
		this._renderPoints();
	},

	// private methods
	_loadData: function() {

		if($F(this.elmInputData)) this.pointsData = decodeURIComponent($F(this.elmInputData)).evalJSON();
	},
	_renderPoints: function() {

		if(this.pointsData) {
		
			// multi mode
			if(this.config.multi && this.pointsData.length) {

				// vomit out those markers without any global storage ;)
				this.pointsData.each(function(point) {

					objMarker = this._renderSinglePoint(point);
					google.maps.event.addListener(objMarker, 'click', this.onClickPoint.bindAsEventListener(this, point));
				}.bind(this));
			}

			// single mode
			else if(this.pointsData.lat && this.pointsData.lng) {
			
				objMarker = this._renderSinglePoint(this.pointsData);
				objMarker.setAnimation(google.maps.Animation.BOUNCE);	// ** just for fun :)
			}
		}
	},
	_renderSinglePoint: function(point) {

		return new google.maps.Marker({

			position: new google.maps.LatLng(parseFloat(point.lat), parseFloat(point.lng)),
			map: this.objGoogleMap,
			icon: this.hostPrefix + this.config.pointer_path.interpolate({ id: point.id })
			// shadow: 	// TODO
		});
	},

	// callbacks
	onClickPoint: function(e, point) {

		// go to event location		// ** this will need to be modified when playing with the routing
		window.location.href = this.hostPrefix + this.config.event_path.interpolate({ id: point.id })
	}
});
