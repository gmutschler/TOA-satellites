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
		this.elmTitle = this.elmWrapper.select('h2').first();
		this.elmButton = this.elmWrapper.select('a.toggle_button').first();

		// store some heights to save the computing later on
		this.heightStart = this.elmWrapper.measure('padding-box-height');
		this.heightMore = this.elmMore.measure('padding-box-height');
		this.heightTitle = this.elmTitle.measure('padding-box-height');
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
				this.elmWrapper.setStyle({ zIndex: 11 });
				this.elmButton.update('Show more');

				this.isOpen = false;
			}.bind(this)
		});
	},
	_open: function() {

		this.objParent.closeAll();

		this.elmWrapper.setStyle({ zIndex: 20 });

		console.log('start: ' + this.heightStart);
		console.log('more: ' + this.heightMore);

		this.elmMore.show();
		this.objEffect = TweenLite.to(this.elmWrapper, .65, {

			//height: this.heightStart + this.heightMore,
			height: this.heightTitle + this.heightMore + 20,
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

GridScroller = Class.create({

	// elms
	elmWrapper: undefined,
	elmProgramInside: undefined,
	elmProgramRooms: undefined,
	elmArrowLeft: undefined,
	elmArrowRight: undefined,
	elmsScrollable: [],

	// objs
	objTimer: undefined,
	objDrag: undefined,

	// states and storage
	delay: 0.000001,
	step: 60,

	scrollMax: 0,

	currentStep: 0,
	scrollOffset: 0,
	isMoving: false,

	// init
	initialize: function(elmWrapper) {

		// store elms
		this.elmWrapper = $(elmWrapper);
		this.elmProgramInside = this.elmWrapper.select('div.program_inside').first();
		this.elmProgramRooms = this.elmWrapper.select('ul.program_rooms').first();
		this.elmsScrollable = [this.elmProgramRooms, this.elmProgramInside];

		this.elmArrowLeft = this.elmWrapper.select('div.left_arrow').first();
		this.elmArrowRight = this.elmWrapper.select('div.right_arrow').first();

		// store some vars for easier execution
		this.scrollMax = (this.elmsScrollable.first().measure('width') * -1) + this.elmWrapper.select('div.column.right').first().measure('width') ;

		// register observers
		this.elmArrowLeft.on('mousedown', this.onPressLeft.bindAsEventListener(this));
		this.elmArrowRight.on('mousedown', this.onPressRight.bindAsEventListener(this));
		this.elmArrowLeft.on('mouseup', this.onReleaseLeftRight.bindAsEventListener(this));
		this.elmArrowRight.on('mouseup', this.onReleaseLeftRight.bindAsEventListener(this));

		// register draggable
		// NOTE: this code could (and should) be finetuned one day
		this.objDrag = new Draggable(this.elmProgramInside, {

			constraint: 'horizontal',
			snap: this.step,

			change: this.onDragChange.bind(this)
		});
	},

	// private methods
	_startMoving: function() {

		if(!this.isMoving) {

			this.objTimer = new PeriodicalExecuter(this.onMoveLoop.bind(this), this.delay);
			this.isMoving = true;
		}
	},
	_stopMoving: function() {

		if(this.isMoving) {

			this.objTimer.stop();
			this.isMoving = false;
		}
	},

	// callbacks
	onMoveLoop: function(pe) {

		// adjust offset
		this.scrollOffset += this.currentStep;

		// lock within the limits
		if(this.scrollOffset >= 0) this.scrollOffset = 0;
		else if(this.scrollOffset <= this.scrollMax) this.scrollOffset = this.scrollMax;

		this.elmsScrollable.each(function(elm) {

			elm.setStyle({ left: this.scrollOffset + 'px' });

		}.bind(this));

		if(this.scrollOffset == 0 || this.scrollOffset == this.scrollMax) this._stopMoving();
	},

	onDragChange: function() {

		// get current scroll offset		** NOTE: very CPU expensive method
		this.scrollOffset = parseInt(this.elmProgramInside.getStyle('left').gsub(/px$/, ''));

		// limit
		if(this.scrollOffset >= 0) {

			this.scrollOffset = 0;
			this.elmsScrollable.each(function(elm) { elm.setStyle({ left: 0 }); });
		}
		if(this.scrollOffset <= this.scrollMax) {

			this.scrollOffset = this.scrollMax;
			this.elmsScrollable.each(function(elm) { elm.setStyle({ left: this.scrollMax + 'px'}); }.bind(this));
		}

		// adjust rooms
		this.elmProgramRooms.setStyle({ left: this.scrollOffset + 'px' });
	},

	onPressLeft: function(e) {

		this.currentStep += this.step;
		this._startMoving();
	},
	onPressRight: function(e) {

		this.currentStep -= this.step;
		this._startMoving();
	},
	onReleaseLeftRight: function(e) {

		this.currentStep = 0;
		this._stopMoving();
	}
});

// # UNCONFERENCE/PROGRAM screen controller
document.observe("dom:loaded", function() {

	new ProgramItem.Loader($$('div.program_wrapper').first());	// NOTE: this will raise errors if there are no programs :)
	new GridScroller($$('div.program_wrapper').first());
});
