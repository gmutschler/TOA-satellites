// # Local libraries
// FIXME: Move those somewhere else on a free day
Face = Class.create({

	// elms
	elmWrapper: undefined,
	elmMeta: undefined,
	elmDescription: undefined,
	elmSpeakerPosition: undefined,

	// objs
	objParent: undefined,
	objTimeline: undefined,

	// states and storage
	isOpen: false,
	heightDescription: 0,

	// init
	initialize: function(elmWrapper, objParent) {

		// store objs elms
		this.objParent = objParent;
		this.elmWrapper = $(elmWrapper);

		this.elmMeta = this.elmWrapper.select('div.speaker-meta').first();
		this.elmDescription = this.elmWrapper.select('div.speaker-description').first();
		this.elmCursor = this.elmWrapper.select('div.speaker-cursor').first();
		this.elmSpeakerPosition = this.elmMeta.select('span.speaker-position').first();

		// store some heights
		this.heightDescription = this.elmDescription.measure('padding-box-height');

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
		if(this.objTimeline) this.objTimeline.kill();
		
		this.elmCursor.hide();
		this.elmSpeakerPosition.show();

		this.objTimeline = new TimelineLite();
		this.objTimeline.add(

			TweenLite.to(this.elmWrapper, .45, {

				marginBottom: 0,
				ease: Power2.easeOut
			}),
			0
		);
		this.objTimeline.add(

			TweenLite.to(this.elmDescription, .45, {

				height: 0,
				ease: Power2.easeOut
			}),
			0
		);
		this.objTimeline.call(

			function() {


				this.elmDescription.hide();

				this.isOpen = false;
				
				console.log('closed!');

			}.bind(this)
		);
	},
	_open: function() {

		// close any other potential things
		this.objParent.closeAll();

		// effects, styles
		this.elmDescription.show().setStyle({ height: 0 });
		this.elmCursor.show();
		this.elmSpeakerPosition.hide();

		this.objTimeline = new TimelineLite();
		this.objTimeline.add(

			TweenLite.to(this.elmWrapper, .65, {

				marginBottom: this.heightDescription,
				ease: Power2.easeOut
			}),
			0
		);
		this.objTimeline.add(
			TweenLite.to(this.elmDescription, .65, {

				height: this.heightDescription - (this.elmDescription.measure('padding-top') * 2),
				ease: Power2.easeOut
			}),
			0
		);

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
