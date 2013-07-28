// # Local libraries
ProgramItem = Class.create({

	//elms
	elmWrapper: undefined,
	elmMore: undefined,
	elmButton: undefined,

	// objs
	objParent: undefined,
	objEffect: undefined,

	// states and storage
	isOpen: false,
	heightStart: 0,
	heightMore: 0,
	colorBgClosed: null,
	colorBgOpen: null,

	// init
	initialize: function(elmWrapper, objParent) {

		// store objs and elms
		this.objParent = objParent;
		this.elmWrapper = $(elmWrapper);

		this.elmMore = this.elmWrapper.select('div.program_more').first();
		this.elmButton = this.elmWrapper.select('a.toggle_button').first();

		// store some heights to save the computing later on
		this.heightStart = this.elmWrapper.measure('height');
		this.heightMore = this.elmMore.measure('height');
		this.colorBgClosed = this.elmWrapper.getStyle('backgroundColor');
		this.colorBgOpen = '#EEE8DA';	// ** HARDCODED

		// register observers
		this.elmButton.on('click', this.onClickButton.bindAsEventListener(this));
	},

	// public interface
	close: function() {

		if(this.isOpen) this._close();
	},

	// private methods
	_close: function() {

		if(this.objEffect) this.objEffect.kill();

		this.elmWrapper.removeClassName('state_open');
		this.objEffect = TweenLite.to(this.elmWrapper, .45, {

			height: this.heightStart,
			backgroundColor: this.colorBgClosed,
			ease: Power2.easeOut,

			onComplete: function() {

				this.elmMore.hide();
				this.elmWrapper.setStyle({ zIndex: 0 });
				this.elmButton.update('Show more');

				this.isOpen = false;
			}.bind(this)
		});
	},
	_open: function() {

		this.objParent.closeAll();

		this.elmWrapper.setStyle({ zIndex: 20 });

		this.elmMore.show();
		this.objEffect = TweenLite.to(this.elmWrapper, .65, {
			
			height: 56 + this.heightMore,
			backgroundColor: this.colorBgOpen,
			ease: Power2.easeOut,

			onComplete: function() {

				this.elmWrapper.addClassName('state_open');
				this.elmButton.update('Show less');
			}.bind(this)
		});

		this.isOpen = true;
	},

	// callbacks
	onClickButton: function(e) {

		e.stop();

		if(this.isOpen) this._close();
		else this._open();
	}

});

ProgramItem.Loader = Class.create({

	// storage
	programs: [],

	// init
	initialize: function(elmWrapper) {

		elmWrapper.select('div.program_item').each(function(elm) {

			this.programs.push(new ProgramItem(elm, this));

		}.bind(this));
	},

	// public interface
	closeAll: function() {

		this.programs.invoke('close');
	}

});

// # UNCONFERENCE/PROGRAM screen controller
document.observe("dom:loaded", function() {

	new ProgramItem.Loader($$('div.program_wrapper').first());	// NOTE: this will raise errors if there are no programs :)
});
