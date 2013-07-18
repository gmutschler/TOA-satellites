// # Local libraries
// FIXME: Move those somewhere else on a free day
Face = Class.create({

	// elms
	elmWrapper: undefined,
	elmMeta: undefined,
	elmDescription: undefined,

	// objs
	objParent: undefined,
	objEffect: undefined,

	// states and storage
	isOpen: false,

	// init
	initialize: function(elmWrapper, objParent) {

		// store objs elms
		this.objParent = objParent;
		this.elmWrapper = $(elmWrapper);

		this.elmMeta = this.elmWrapper.select('div.speaker-meta').first();
		this.elmDescription = this.elmWrapper.select('div.speaker-description').first();
		this.elmCursor = this.elmWrapper.select('div.speaker-cursor').first();

		// register observers
		this.elmMeta.on('click', this.onClickFace.bindAsEventListener(this));
	},

	// public interface
	close: function() {

		if(this.isOpen) this._close();
	},

	// private methods
	_close: function() {

		// effects, styles
		this.elmWrapper.setStyle({ marginBottom: null });
		this.elmCursor.hide();
		this.elmDescription.hide();

		this.isOpen = false;
	},

	_open: function() {

		// close any other potential things
		this.objParent.closeAll();

		// effects, styles
		this.elmWrapper.setStyle({ marginBottom: this.elmDescription.measure('padding-box-height') + 'px'});
		this.elmCursor.show();
		this.elmDescription.show();

		this.isOpen = true;
	},

	// callbacks
	onClickFace: function(e) {

		e.stop();

		if(this.isOpen) this._close();
		else this._open();
	}
});

Face.Loader = Class.create({

	// storage
	faces: [],

	// init
	initialize: function(elmWrapper) {

		elmWrapper.select('div.speaker-item').each(function(elm) {

			if(!elm.hasClassName('more')) this.faces.push(new Face(elm, this));

		}.bind(this));
	},

	// public interface
	closeAll: function() {

		this.faces.invoke('close');
	}
});

// # UNCONFERENCE/SPEAKERS screen controller 
document.observe("dom:loaded", function() { 

	new Face.Loader($$('div.textual').first());
});
