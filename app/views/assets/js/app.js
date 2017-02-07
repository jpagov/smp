/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */
(function($) {

		var SMP = {
		// All pages
		common: {
			init: function() {

				var path = '/' + window.location.pathname.split('/')[1] || '/';

				$(document).keydown(function(e) {
					//console.log(e.keyCode);

					if($(':input').is(':focus')) return; //Will fail if already focused.

					if (e.keyCode == 72 && (window.location.pathname).indexOf('admin') < 0) {
						$('#search-term').focus();
					}
					if (e.shiftKey && e.keyCode == 191) {
						e.preventDefault();

						$('#helper-modal').load('/smp/help/keys', function() {
							$(this).modal('show');
						});

					}
				});

				$('select#role').change(function() {

					// Possibly show an ajax loading image $("#ajax_loading").show();
					$.ajax({
							type: 'POST',
							url: path + '/admin/staffs/role',
							data: {
								token: $('input[name=token]').val(),
								id: $('input[name=staff-id]').val(),
								role: $(this).val()
							}
						})
						.done(function(msg) {
							$('.alert').remove();
							$('.page-header').after('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Success!</div>');
						});


				});

				$('.navbar-right .view').popover({
					trigger: 'hover click',
					placement: 'auto bottom'
				});

				$('.relevancy').tooltip();

				$('#collapseDivision').on('shown.bs.collapse', function() {
					$('.btn-division').removeClass('hidden');
				}).on('hidden.bs.collapse', function() {
					$('.btn-division').removeClass('hidden');
				});

				$('#collapseField').on('shown.bs.collapse', function() {
					$('.btn-field').removeClass('hidden');
				}).on('hidden.bs.collapse', function() {
					$('.btn-field').addClass('hidden');
				});

				$('#trend').change(function() {
					// set the window's location property to the value of the option the
					window.location = location.pathname + '?trend=' + $(this).val();
				});

				$('.list-group.checked-list-box .list-group-item').each(function() {

					var $widget = $(this),
						$checkbox = $widget.find('input')
					color = ($widget.data('color') ? $widget.data('color') : 'primary'),
						style = ($widget.data('style') == 'button' ? 'btn-' : 'list-group-item-'),
						settings = {
							on: {
								icon: 'glyphicon glyphicon-check'
							},
							off: {
								icon: 'glyphicon glyphicon-unchecked'
							}
						};

					$widget.on('click', function() {

						$(this).parent().parent().find('.panel-body').fadeIn('slow', function() {
							$(this).removeClass('hidden');
						});

						$checkbox.prop('checked', !$checkbox.is(':checked'));
						$checkbox.triggerHandler('change');
						updateDisplay();
					});

					// Actions
					function updateDisplay() {
						var isChecked = $checkbox.is(':checked');

						// Set the button's state
						$widget.data('state', (isChecked) ? 'on' : 'off');

						// Set the button's icon
						$widget.find('.state-icon')
							.removeClass()
							.addClass('state-icon ' + settings[$widget.data('state')].icon);

						// Update the button's color
						if (isChecked) {
							$checkbox.appendTo('form#search');
							$widget.addClass(style + color + ' active');
							//var division = $widget.text().trim();
						} else {
							$('form#search input[value=' + $checkbox.val() + ']').remove();
							$widget.removeClass(style + color + ' active');
						}
					}

					$('.submit-search-sidebar').click(function() {
						$('form#search').submit();
					})

				});

			}
		},

		// Home page
		admin: {
			init: function() {
				// JavaScript to be fired on the home page
			},

			staffs: function() {

				$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
				   $('#stafftab a[href="' + e.target.hash + '"]').tab('show');
				});

				$('#salutation, #first_name, #last_name').keyup(function(e) {
					var input = $('#salutation').val() + ' ' + $('#first_name').val() + ' ' + $('#last_name').val();
					$('#display_name').prop('value', $.trim(input));
				});

				$('#email').keyup(function(e) {
					var email = $(this).val();
					var slug = email.replace(/@.*$/,"")
						.toString().toLowerCase()
					    .replace(/\s+/g, '-')           // Replace spaces with -
					    .replace(/[^\w\-]+/g, '-')       // Remove all non-word chars
					    .replace(/\-\-+/g, '-')         // Replace multiple - with single -
					    .replace(/^-+/, '')             // Trim - from start of text
						.replace(/-+$/, '');

					$('#slug').prop('value', $.trim(slug));
				});

				$('#account').on('click', function() {
					var disabled = ($(this).is(':checked')) ? false : true;
					$('#accountAuth').prop('disabled', disabled);
					if (!disabled && !$('#username').val()) {
						var username = $('#email').val().match(/^([^@]*)@/)[1];
						$('#username').prop('value', username);
					}
				});

				$('#role').on('click', function(e) {
					e.preventDefault();
					var checked = ($(this).val() === 'administrator') ? true : false;
					$('#division-role input').prop('checked', checked);
				});

				var endpoint = '/smp/admin/api/';

				$('#division').on('change', function(e) {

					$('.branchs-prefetch .typeahead').typeahead('destroy');
					$('.sectors-prefetch .typeahead').typeahead('destroy');
					$('.units-prefetch .typeahead').typeahead('destroy');

					branchs.initialize(true);
					sectors.initialize(true);
					units.initialize(true);

				});

				// staff
				var staffs = new Bloodhound({
					datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
					queryTokenizer: Bloodhound.tokenizers.whitespace,
					remote: {
						url: endpoint + 'queries/%QUERY.json',
						filter: function(list) {
							return $.map(list, function(item) {
								return {
									name: item
								};
							});
						}
					}
				});

				staffs.initialize();

				$('.reportto-prefetch .typeahead, .pa-prefetch .typeahead').typeahead(null, {
					name: 'staffs',
					displayKey: 'name',
					source: staffs.ttAdapter()
				});

				// branch
				var branchs = new Bloodhound({
					datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
					queryTokenizer: Bloodhound.tokenizers.whitespace,
					limit: 10,
					remote: {
						//url: endpoint + 'branch.json',
						url: endpoint + 'queries/branch/%QUERY.json',
						filter: function(list) {
							return $.map(list, function(item) {
								return {
									name: item
								};
							});
						}
					}
				});

				branchs.initialize();

				$('.branch-prefetch .typeahead').typeahead(null, {
					name: 'branchs',
					displayKey: 'name',
					source: branchs.ttAdapter()
				});

				// sector
				var sectors = new Bloodhound({
					datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
					queryTokenizer: Bloodhound.tokenizers.whitespace,
					limit: 10,
					remote: {
						//url: endpoint + 'sector.json',
						url: endpoint + 'queries/sector/%QUERY.json',
						filter: function(list) {
							return $.map(list, function(item) {
								return {
									name: item
								};
							});
						}
					}
				});

				sectors.initialize();

				$('.sector-prefetch .typeahead').typeahead(null, {
					name: 'sectors',
					displayKey: 'name',
					source: sectors.ttAdapter()
				});

				// unit
				var units = new Bloodhound({
					datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
					queryTokenizer: Bloodhound.tokenizers.whitespace,
					limit: 10,
					remote: {
						//url: endpoint + 'unit.json',
						url: endpoint + 'queries/unit/%QUERY.json',
						filter: function(list) {
							return $.map(list, function(item) {
								return {
									name: item
								};
							});
						}
					}
				});

				units.initialize();

				$('.unit-prefetch .typeahead').typeahead(null, {
					name: 'units',
					displayKey: 'name',
					source: units.ttAdapter()
				});

				// tags
				var tags = new Bloodhound({
					datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
					queryTokenizer: Bloodhound.tokenizers.whitespace,
					limit: 10,
					remote: {
						url: endpoint + 'queries/tag/%QUERY.json',
						//url: endpoint + 'tags.json',
						filter: function(list) {
							return $.map(list, function(item) {
								return {
									name: item
								};
							});
						}
					}
				});

				tags.initialize();

				$('input#tag').tagsinput({
					typeaheadjs: {
						name: 'tags',
						displayKey: 'name',
						valueKey: 'name',
						source: tags.ttAdapter()
					}
				});

			},

			categories: function() {
				SMP.admin.staffs();
			},

			setting: function() {
				$('#field').on('change', function(e) {
					var value = $(this).val(), all = $('.attributes_type, .attributes_width, .attributes_height');
					if (value == 'image') {
						all.removeClass('hide');
					} else if (value == 'file') {
						$('.attributes_width, .attributes_height').addClass('hide');
						$('.attributes_type').removeClass('hide');
					} else {
						all.addClass('hide');
					}
				});
			},

			users: function() {
				SMP.admin.staffs();
				//console.log('Admin::Users');
			},
		}
	};

	// The routing fires all common scripts, followed by the page specific scripts.
	// Add additional events for more control over timing e.g. a finalize event
	var UTIL = {
		fire: function(func, funcname, args) {
			var namespace = SMP;
			funcname = (funcname === undefined) ? 'init' : funcname;
			if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
				namespace[func][funcname](args);
			}
		},
		loadEvents: function() {

			var bodyId = document.body.id;
			UTIL.fire('common');

			$.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
				UTIL.fire(classnm);
				UTIL.fire(classnm, bodyId);

			});
		}
	};

	$(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
