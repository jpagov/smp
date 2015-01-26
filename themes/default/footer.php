	</div> <!-- //.row -->
      <footer class="footer">
         <small><p><?php echo _e('site.copyright', _e('site.footer')); ?></p><p><a href="#"><?php echo _e('site.back_to_top'); ?></a></p></small>
      </footer>
    </div> <!-- //.container -->

    <div id="helper-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="helpModalLabel" aria-hidden="true"></div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo theme_asset('js/jquery-1.11.2.min.js'); ?>"><\/script>')</script>
    <script src="<?php echo revision('js/main.min.js'); ?>"></script>
    <?php if (site_meta('tour')) : ?><script src="<?php echo revision('js/bootstrap-tour.min.js'); ?>"></script><?php endif; ?>
    <?php if ($modalism = Session::get('modal')) : Session::erase('modal');  ?>
    <script type="text/javascript">
		$(window).load(function(){
			$('#<?php echo $modalism; ?>').modal('show');
		});
	</script>
	<?php endif; ?>

	<?php if (is_staff() and !Session::get('recaptcha')) : ?><script src='https://www.google.com/recaptcha/api.js'></script><?php endif; ?>

	<?php if (Uri::current() == '/') : ?><?php theme_include('schema'); ?><?php endif; ?>
	<script>
	  !function(S,i,s,t,e,m){S.GoogleAnalyticsObject=s;S[s]||(S[s]=function(){(S[s].q=S[s].q||[]).push(arguments)});S[s].l=+new Date;e=i.createElement(t);m=i.getElementsByTagName(t)[0];e.src='//www.google-analytics.com/analytics.js';m.parentNode.insertBefore(e,m)}(window,document,'ga','script');ga('create','UA-974231-8','auto');ga('send','pageview');
	</script>
	<?php if (site_meta('tour')) : ?>
	<script type="text/javascript">
		var $smptour = $("#smp-tour");
		var tour = new Tour({
			onStart: function() {
				return $smptour.addClass("disabled", true);
			},
			onEnd: function() {
				return $smptour.removeClass("disabled", true);
			},
			//debug: true,
			template: [

				'<div class="popover" role="tooltip">',
				'<div class="arrow"></div>',
				'<h3 class="popover-title"></h3>',
				'<div class="popover-content"></div>',
				'<div class="popover-navigation">',
				'<div class="btn-group">',
				'<button class="btn btn-sm btn-default" data-role="prev"><?php echo __('tour.prev'); ?></button>',
				'<button class="btn btn-sm btn-default" data-role="next"><?php echo __('tour.next'); ?></button>',
				'<button class="btn btn-sm btn-default" data-role="pause-resume" data-pause-text="<?php echo __('tour.pause'); ?>" data-resume-text="<?php echo __('tour.resume'); ?>"><?php echo __('tour.pause'); ?></button>',
				'</div>',
				'<button class="btn btn-sm btn-default" data-role="end"><?php echo __('tour.end'); ?></button>',
				'</div>',
				'</div>'

			].join(''),
			backdrop: true,
			backdropPadding: 4,
			steps: [{
				path: '<?php echo base_url(); ?>',
				element: '#pkppa',
				title: '<?php echo __('tour.step0_title'); ?>',
				placement: 'right',
				content: '<?php echo __('tour.step0_content'); ?>',
			}, {
				path: '<?php echo base_url(); ?>',
				element: '#search-term',
				title: '<?php echo __('tour.step1_title'); ?>',
				placement: 'bottom',
				content: '<?php echo __('tour.step1_content'); ?>',
				onShown: function (tour) {
					var search = 'hariadi';
					var searchInput = $('.tour-step-background');
					searchInput.append('<div id="generated-search"></div>');
					var generated = $('#generated-search');
					generated.css('margin', '6px');
					generated.text('');
					jQuery({count:0}).animate({count:search.length}, {
						duration: 2000,
						step: function() {
							generated.text(search.substring(0, Math.round(this.count)));
						}
					});
				},
			}, {
				path: '<?php echo base_url('search?term=hariadi'); ?>',
				element: '.staffs-search-result',
				title: '<?php echo __('tour.step2_title'); ?>',
				placement: 'bottom',
				content: '<?php echo __('tour.step2_content'); ?>',
			}, {
				path: '<?php echo base_url('search?term=hariadi'); ?>',
				element: 'section.col-sm-3',
				title: '<?php echo __('tour.step3_title'); ?>',
				placement: 'left',
				content: '<?php echo __('tour.step3_content'); ?>',

			}, {
				path: '<?php echo base_url('hariadi-hinta'); ?>',
				element: "section.staff",
				title: '<?php echo __('tour.step31_title'); ?>',
				placement: 'right',
				content: '<?php echo __('tour.step31_content'); ?>',
			}, {
				path: '<?php echo base_url('hariadi-hinta'); ?>',
				element: 'div.well:nth-child(1)',
				title: '<?php echo __('tour.step32_title'); ?>',
				placement: 'left',
				content: '<?php echo __('tour.step32_content'); ?>',
			}, {
				path: '<?php echo base_url('hariadi-hinta'); ?>',
				element: '.rating-inner',
				title: '<?php echo __('tour.step33_title'); ?>',
				placement: 'left',
				content: '<?php echo __('tour.step33_content'); ?>'
			}, {
				path: '<?php echo base_url('hariadi-hinta'); ?>',
				element: 'div.tepian',
				title: '<?php echo __('tour.step34_title'); ?>',
				placement: 'top',
				content: '<?php echo __('tour.step34_content'); ?>',
			}, {
				path: '<?php echo base_url('hariadi-hinta'); ?>',
				element: "ul.navbar-right",
				title: "<?php echo __('tour.step4_title'); ?>",
				placement: 'bottom',
				content: "<?php echo __('tour.step4_content'); ?>"
			}, {
				path: '<?php echo base_url('hariadi-hinta'); ?>',
				element: '.staff-avatar > img',
				title: '<?php echo __('tour.step5_title'); ?>',
				placement: 'right',
				content: '<?php echo __('tour.step5_content'); ?>',
				onHidden: function() {
					$('#helper-modal').load('/smp/help/keys', function () {
						$(this).modal('show');
					});
				},
			}]
		}).init();

		if (screen.width > 480) {
			tour.start(<?php echo site_meta('tour_force'); ?>);
		}

		$(document).on('click', '[data-tour]', function(e) {
			e.preventDefault();
			if ($(this).hasClass('disabled')) {
				return;
			}
			tour.restart();
		});
	</script>
	<?php endif; ?>
  </body>
</html>
