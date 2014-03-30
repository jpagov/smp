var App = {
	init: function() {
		App.slidey = $('.slidey');
		App.keys = [];

		//  Uh, bind to the resizing of the window?
		$(window).resize(App.bindResize).trigger('resize');

		// Re-/Set keys
		$(window).on('keyup', App.keyup);
		$(window).on('keydown', App.keydown);

		//  Set up the toggle link
		App.linky = $('.linky').on('click', App.toggleSlidey);

		//  Hide the thingymabob
		setTimeout(function() {
			//  Set up the slidey panel
			App.hideSlidey();

			$('body').addClass('js-enabled');
		}, 10);

		//  Listen for search link
		$('a[href="#search"]').click(function() {
			if(!App.linky.hasClass('active')) {
				return App.toggleSlidey.call(App.linky);
			}
		});
	},

	keyup: function(event) {
		App.keys[event.keyCode] = false;
	},

	keydown: function(event) {
		App.keys[event.keyCode] = true;

		// ctrl + shift + f => show Slidey and/or focus search bar
		if(App.keys[17] && App.keys[16] && App.keys[70]) {
			event.preventDefault();

			App.showSlidey.call(App.linky);
			$('input[type="search"]').focus();
		}

		// esc => hide Slidey
		if(App.keys[27]) {
			event.preventDefault();

			App.hideSlidey();
			$('input[type="search"]').blur();
		}
	},

	hideSlidey: function() {
		App.slidey.css('margin-top', this._slideyHeight);
		App.linky && App.linky.removeClass('active');

		return this;
	},

	showSlidey: function() {
		App.slidey.css('margin-top', 0);
		App.linky && App.linky.addClass('active');

		return this;
	},

	toggleSlidey: function() {
		var self = App;
		var me = $(this);

		me.toggleClass('active');
		self.slidey.css('margin-top', me.hasClass('active') ? 0 : self._slideyHeight);

		return false;
	},

	bindResize: function() {
		App._slideyHeight = -(App.slidey.height() + 1);
		App.hideSlidey();
	}
};

//  And bind loading
$(App.init);
