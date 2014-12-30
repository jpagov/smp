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

	// Use this variable to set up the common and page specific functions. If you
	// rename this variable, you will also need to rename the namespace below.
	var SMP = {
		// All pages
		common: {
			init: function() {

				// we assume all devices has touch screen and lets trigger all bootstrap
				// event with 'click', when we see mouse event then we change trigger to // hover
				//$( "body" ).one('mouseenter', function() {
				//  console.log("mouse enter");
				//}).one('mouseleave', function() {
				//  console.log("mouse leave");
				//});

				// to listen every time
				/*
			$( "body" ).mouseenter(function() {

				}).mouseleave(function() {

			});
*/

				var path = '/' + window.location.pathname.split('/')[1] || '/';

				$(document).keydown(function(e) {
					//console.log(e.keyCode);

					if($(":input").is(":focus")) return; //Will fail if already focused.

					if (e.keyCode == 72 && (window.location.pathname).indexOf("admin") < 0) {
						$("#search-term").focus();
					}
					if (e.shiftKey && e.keyCode == 191) {
						e.preventDefault();

						$('#helper-modal').load('/smp/help/keys', function() {
							$(this).modal('show');
						});

					}
				});

				$("select#role").change(function() {

					// Possibly show an ajax loading image $("#ajax_loading").show();
					$.ajax({
							type: "POST",
							url: path + "/admin/staffs/role",
							data: {
								token: $('input[name=token]').val(),
								id: $('input[name=staff-id]').val(),
								role: $(this).val()
							}
						})
						.done(function(msg) {
							$(".alert").remove();
							$('.page-header').after('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Success!</div>');
						});


				});

				$('.navbar-right .view').popover({
					trigger: 'hover click',
					placement: 'auto bottom'
				});

				$('.relevancy').tooltip();

				/*
				$('#collapseDivision').on('shown.bs.collapse', function (e) {
					e.stopPropagation();
					console.log('Event fired on #' + e.currentTarget.id);

					//dont know why append dont work
					$(".division-toggle").toggleClass("glyphicon-plus")
				})
*/

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
					color = ($widget.data('color') ? $widget.data('color') : "primary"),
						style = ($widget.data('style') == "button" ? "btn-" : "list-group-item-"),
						settings = {
							on: {
								icon: 'glyphicon glyphicon-check'
							},
							off: {
								icon: 'glyphicon glyphicon-unchecked'
							}
						};

					$widget.on('click', function() {

						$(this).parent().parent().find('.panel-body').fadeIn("slow", function() {
							$(this).removeClass("hidden");
						});

						$checkbox.prop('checked', !$checkbox.is(':checked'));
						$checkbox.triggerHandler('change');
						updateDisplay();
					});

					// Actions
					function updateDisplay() {
						var isChecked = $checkbox.is(':checked');

						// Set the button's state
						$widget.data('state', (isChecked) ? "on" : "off");

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
		home: {
			init: function() {

				var path = '/' + window.location.pathname.split('/')[1] || '/';

				var staff = new Bloodhound({
					datumTokenizer: function(d) {
						return d.tokens;
					},
					queryTokenizer: Bloodhound.tokenizers.whitespace,
					prefetch: {
						url: path + '/api?code=6f05ad622a3d32a5a81aee5d73a5826adb8cbf63',
						ttl: 0
					}
				});
				staff.initialize();

				$('#search .typeahead').typeahead(null, {
					name: 'staff',
					minLength: 2,
					source: staff.ttAdapter(),
					templates: {
						suggestion: Handlebars.compile([
							'<p class="staff-name">',
							'<img src="' + path + '/content/avatar/{{avatar}}" class="img-responsive staff-search pull-left" height="50" width="50">',
							'<strong>{{display_name}}</strong>',
							'<small><span class="glyphicon glyphicon-briefcase"></span> {{position}}</small>',
							'<small><span class="glyphicon glyphicon-envelope"></span> {{email}}</small>',
							'<small><span class="glyphicon glyphicon-phone-alt"></span> {{telephone}}</small>',
							'</p>'
						].join(''))
					}
				}).on('typeahead:selected', function(e, data) {
					//$('#search').submit();
					//window.location.replace('/smp/' + data.slug);
					// similar behavior as clicking on a link
					window.location.href = path + '/' + data.slug;
				});

				// hover cards
				$('a[rel=popover]').popover({
					html: true,
					trigger: "manual",
					animation: false,
					content: function() {

						var hovercard = ['<div class="media block-update-card">',
							'<a class="pull-left" href="#">',
							'<img class="media-object img-responsive img-thumbnail" src="' + $(this).data('img') + '" width="90" height="90">',
							'</a>',
							'<div class="media-body update-card-body">',
							'<h4 class="media-heading">' + $(this).attr('title') + '</h4>',
							'<p>' + $(this).data('jobtitle') + '</p>',
							'<button class="btn btn-block">Details</button>',
							'</div>',
							'</div>'
						].join('');

						return hovercard;
					}
				}).hover(function(e) {
					$(this).popover('show');
				}).on("mouseleave", function() {
					var _this = this;
					setTimeout(function() {
						if (!$(".popover:hover").length) {
							$(_this).popover("hide");
						}
					}, 100);
				});;

				$('body').on('click', function(e) {
					$('a[rel=popover]').each(function() {
						//the 'is' for buttons that trigger popups
						//the 'has' for icons within a button that triggers a popup
						if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
							$(this).popover('hide');
						}
					});
				});

				// ZeroClipboard

				ZeroClipboard.config({
					swfPath: path + '/app/views/assets/flash/ZeroClipboard.swf',
					hoverClass: 'btn-clipboard-hover',
					forceHandCursor: true,
				});

				var clip = new ZeroClipboard($(".email"));
				var zbridge = $('#global-zeroclipboard-html-bridge');

				clip.on("ready", function(e) {

					// add tooltip when clip ready
					zbridge.data('placement', 'top').attr('title', 'Copy to clipboard').tooltip();

					// request email from ajax
					this.on("copy", function(e) {
						e.clipboardData.clearData();
						var email = (e.target.id).replace('staff-email-', '');
						$.ajax({
							url: path + "/api/email/" + email,
							dataType: 'json',
							async: false,
							success: function(content) {
								e.clipboardData.setData("text/plain", content.email);
							},
						});
					});

					// send success message and refix back
					this.on("aftercopy", function(e) {
						zbridge.data('placement', 'top')
							.attr('title', 'Copied!')
							.tooltip('fixTitle')
							.tooltip('show')
							.attr('title', 'Copy to clipboard')
							.tooltip('fixTitle');
					});
				});

				$('#bar-five').animate({
					width: $('#bar-five').attr('data-score-percent') + '%'
				}, 1000);
				$('#bar-four').animate({
					width: $('#bar-four').attr('data-score-percent') + '%'
				}, 1000);
				$('#bar-three').animate({
					width: $('#bar-three').attr('data-score-percent') + '%'
				}, 1000);
				$('#bar-two').animate({
					width: $('#bar-two').attr('data-score-percent') + '%'
				}, 1000);
				$('#bar-one').animate({
					width: $('#bar-two').attr('data-score-percent') + '%'
				}, 1000);

				//$('#bar-one,#bar-two,#bar-three,#bar-four,#bar-five').animate({
				//	 width: $(this).attr('data-score-percent') + '%'
				//}, 1000);

				$('div#star-rating').raty({
					path: path + '/app/views/assets/img',
					score: function() {
						return $(this).attr('data-score');
					},
					click: function(score, evt) {

						var token = $('#contact-staff :input[name=token]').val();
						var url = $('#contact-staff :input[name=url]').val();

						$.post(document.URL, {
								token: token,
								url: url,
								score: score,
								staff: $(this).attr('data-staff')
							})
							.done(function(data) {
								console.log(data);

								if (data.status) {

									// update rating-num
									$('span.rating-num').fadeOut(function() {
										$(this).text(data.average).fadeIn();
									});

									// update rating total
									$('span#rating-count').fadeOut(function() {
										$(this).text(data.total).fadeIn();
									});

									$('span#' + data.update).animate({
										width: data.percent + '%'
									}, 500, function() {
										$(this).attr('data-score-percent', data.percent);
										var bar = $(this).children('span').text();
										bar = ~~bar;
										$(this).children('span').text(bar + 1).fadeIn();

										// show toaster
										$.toaster({
											title: data.msg_title,
											priority: 'success',
											message: data.msg,
											settings: {
												timeout: 3000
											}
										});
									});

								} else {

									$.toaster({
										title: data.msg_title,
										priority: 'warning',
										message: data.msg,
										settings: {
											timeout: 3000
										}
									});
								}

							});
					},
				});

				$('#message-button').on('click', function() {
					$('#messageModal').modal('show');
				});


				$('#messageModal').on('show.bs.modal', function(event) {
					console.log('Modal Message');
					//var button = $(event.relatedTarget) // Button that triggered the modal
					//var recipient = button.data('staff');
					//var staffid = button.data('contact-title');
					//var modal = $(this);

					//modal.find('.modal-title').text('New message to ' + recipient);

					//modal.find('.modal-body input#recipient-id').val(staffid);
					//modal.find('.modal-body input#recipient-name').val(recipient);
				});



			},

		},

		top_management: {
			init: function() {
				SMP.home.init();
			},
		},
		// Home page
		admin: {
			init: function() {
				// JavaScript to be fired on the home page
			},

			staffs: function() {

				//console.log('Admin::Staff');

				$("#salutation, #first_name, #last_name").keyup(function(e) {
					var input = $('#salutation').val() + ' ' + $('#first_name').val() + ' ' + $('#last_name').val();
					console.log(input);
					$('#display_name').prop('value', input);
				});

				$('#account').on('click', function() {
					var disabled = ($(this).is(":checked")) ? false : true;
					$('#accountAuth').prop('disabled', disabled);
				});

				$('#role').on('click', function(e) {
					e.preventDefault();
					var checked = ($(this).val() === 'administrator') ? true : false;
					$('#division-role input').prop('checked', checked);
				});

				var endpoint = '/smp/admin/api/';

				$('#division').on('change', function(e) {

					//var optionSelected = $("option:selected", this);
					//var valueSelected = this.value;
					//console.log(valueSelected);
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
						replace: function() {
							var query = $(':focus').val();
							if ($('#division').val() == 0) {
								return endpoint + 'queries' + '/' + query + '.json';
							} else {
								return endpoint + $('#division').val() + '/queries' + '/' + query + '.json';
							}
						},
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
						url: endpoint + 'branch.json',
						replace: function() {
							if ($('#division').val() == 0) {
								return endpoint + 'branch.json';
							} else {
								return endpoint + $('#division').val() + '/branch.json';
							}
						},
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
						url: endpoint + 'sector.json',
						replace: function() {
							if ($('#division').val() == 0) {
								return endpoint + 'sector.json';
							} else {
								return endpoint + $('#division').val() + '/sector.json';
							}
						},
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
						url: endpoint + 'unit.json',
						replace: function() {
							if ($('#division').val() == 0) {
								return endpoint + 'unit.json';
							} else {
								return endpoint + $('#division').val() + '/unit.json';
							}
						},
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

			},

			categories: function() {
				SMP.admin.staffs();
			},

			setting: function() {
				console.log('Setting');

				$("#field").on("change", function(e) {
					var value = $(this).val(),
						all = $(".attributes_type, .attributes_width, .attributes_height");
					if (value == 'image') {
						all.removeClass('hide');
					} else if (value == 'file') {
						$(".attributes_width, .attributes_height").addClass('hide');
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
