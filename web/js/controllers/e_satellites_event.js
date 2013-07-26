EventbriteHax = Class.create({

	// elms
	elmIframe: undefined,
	elmExtDocument: undefined,

	// storage
	accessCode: null,

	// init
	initialize: function(params) {

		// store elms
		this.elmIframe = $(params.elmIframe);
		this.accessCode = params.accessCode;

		// hide the iframe before it loads and we inject stuff
		this.elmIframe.hide();

		// load observer
		this.elmIframe.on('load', this.onLoadIframe.bindAsEventListener(this));
	},

	// private methods
	_getExternalDocument: function() {

		// support MSIE and the rest of the world nicely
		return this.elmIframe.contentDocument || this.elmIframe.contentWindow.document;
	},

	_applyHax: function(afterFinish) {

		// form -> div#TicketReg -> div#discounts -> div#discountDiv1 .hide()
		// this.elmExtDocument.getElementById('discountDiv1').style.display = 'none';

		// form -> div#TicketReg -> div#discounts -> div#discountDiv -> input#discount_code value = CODE
		this.elmExtDocument.getElementById('discount_code').value = this.accessCode;

		// callback
		if(Object.isFunction(afterFinish)) afterFinish();
	},

	// callbacks
	onLoadIframe: function(e) {

		// fetch the external document
		this.elmExtDocument = this._getExternalDocument();

		// apply hacks and show
		this._applyHax(function() { this.elmIframe.show(); }.bind(this));
	}
});

// # SATELLITES/EVENT screen controller
document.observe("dom:loaded", function() {

	// Load the map
	new Displaymap({

		// elms
		map: 'hero_background_map',
		data: 'map_data_pulp',

		// conf
		conf: {
			// are we using for many or single point?
			multi: false,

			// geographical defaults
			gmap_zoom: 15,
			gmap_y: 52.5095350,
			gmap_x: 13.3923340,

			gmap_styles: GoogleMapStyles,

			// custom pointer path
			pointer_path: '/uploads/event_images/pins/#{id}.png'
		}
	});

	// Apply eventbrite hacks
	/*
	if($('js_accesscode')) new EventbriteHax({

		elmIframe: $('js_iframe'),
		accessCode: $F('js_accesscode')
	});
	*/
});
