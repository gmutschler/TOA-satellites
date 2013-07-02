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

	// Add new ticket stuff
	new AddNewTicket({

		elmForm: $('content').select('form').first(),
		elmButton: $('js_add_new')
	});
});

// Local library (hackish, aint it?)
AddNewTicket = Class.create({

	// elms
	elmButton: undefined,
	elmForm: undefined,
	elmControlsWrapper: undefined,

	// storage
	lastTicketNumber: 0,

	// init
	initialize: function(params) {

		// store elms
		this.elmForm = $(params.elmForm);
		this.elmButton = $(params.elmButton);
		this.elmControlsWrapper = this.elmForm.select('div.section_controls').first();	// ** HARDCODED

		// parse some stuff
		this.lastTicketNumber = this._findLastTicketNumber();

		// register observers
		this.elmButton.on('click', this.onClickButton.bindAsEventListener(this));
	},

	// private methods
	_findLastSection: function() {

		return this.elmForm.select('div.section_block.last').first();
	},
	_findLastTicketNumber: function() {

		elmStrong = this._findLastSection().select('h3 strong');
		if(elmStrong && elmStrong.length) return parseInt(elmStrong.first().innerHTML.gsub(/^[a-zA-Z ]/, ''));
		else return false;	// ** HARDCODED DEF
	},
	_buildNewTicketForm: function() {	// ** HARDCODED markup

		elmLastSection = this._findLastSection();
		lastNumber = this._findLastTicketNumber();

		elmNewSection = Builder.node('div', { className: 'section_block last' }, [

			Builder.node('h3', { style: 'text-transform: none' }, [

				Builder.node('strong', [ 'New Ticket ' + (lastNumber + 1) ])
			]),

			Builder.node('div', { className: 'section long' }, [
				
				Builder.node('input', {

					type: 'text',
					id: 'event_newTickets_' + lastNumber + '_name',
					name: 'event[newTickets][' + lastNumber +'][name]',
					placeholder: 'Ticket name'				// ** HARDCODED
				})
			]),
			Builder.node('div', { className: 'section long' }, [

				Builder.node('textarea', {
					
					cols: 30,
					rows: 4,
					id: 'event_newTickets_' + lastNumber + '_description',
					name: 'event[newTickets][' + lastNumber + '][description]',
					placeholder: 'Ticket description'
				})
			]),
			Builder.node('div', { className: 'section price' }, [

				Builder.node('div', { className: 'column fleft' }, [

					Builder.node('input', {

						type: 'text',
						id: 'event_newTickets_' + lastNumber + '_price',
						name: 'event[newTickets][' + lastNumber + '][price]',
						placeholder: 'Ticket price'
					})
				]),
				Builder.node('div', { className: 'column fright' }, [

					Builder.node('p', { className: 'notice' }, [

						'Total quantity: ',
						Builder.node('input', {

							type: 'text',
							id: 'event_newTickets_' + lastNumber + '_quantity_declared',
							name: 'event[newTickets][' + lastNumber + '][quantity_declared]'
						})
					])
				]),
				Builder.node('div', { className: 'clear' })
			])
		]);

		// insert and remove last
		elmLastSection.insert({ after: elmNewSection });
		elmLastSection.removeClassName('last');
	},

	// callbacks
	onClickButton: function(e) {

		e.stop();

		this._buildNewTicketForm();
	}
});
