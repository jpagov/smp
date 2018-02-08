	</div> <!-- //.row -->
	</div> <!-- //.container -->
  <footer class="footer">
     <small><p><?php echo _e('site.copyright', _e('site.footer')); ?></p><p><a href="#"><?php echo _e('site.back_to_top'); ?></a></p></small>
  </footer>


    <div id="helper-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="helpModalLabel" aria-hidden="true"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="<?php echo theme_asset('js/jquery-3.1.1.min.js'); ?>"><\/script>')</script>
    <script src="<?php echo revision('js/main.min.js'); ?>" <?php echo assets_sri('js/main.min.js') ?>></script>
    <?php if (site_meta('tour')) : ?><script src="<?php echo revision('js/bootstrap-tour.min.js'); ?>" <?php echo assets_sri('js/bootstrap-tour.min.js') ?>></script><?php endif; ?>
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
	  !function(S,i,s,t,e,m){S.GoogleAnalyticsObject=s;S[s]||(S[s]=function(){(S[s].q=S[s].q||[]).push(arguments)});S[s].l=+new Date;e=i.createElement(t);m=i.getElementsByTagName(t)[0];e.src='//www.google-analytics.com/analytics.js';m.parentNode.insertBefore(e,m)}(window,document,'ga','script');ga('create','UA-974231-8','auto');ga('require', 'displayfeatures');ga('send','pageview');
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
			debug: true,
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
				element: '#search-term',
				title: '<?php echo __('tour.step1_title'); ?>',
				placement: 'bottom',
				backdrop: true,
				content: '<?php echo __('tour.step1_content'); ?>',
				onShown: function (tour) {
					var search = 'zainal rahim';
					jQuery({count:0}).animate({count:search.length}, {
						duration: 2000,
						step: function() {
							$('#search-term').val(search.substring(0, Math.round(this.count)));
						}
					});
				},
			}, {
				path: '<?php echo base_url('search?term=zainal+rahim'); ?>',
				element: 'section.staffs-search-result',
				title: '<?php echo __('tour.step2_title'); ?>',
				placement: 'bottom',
				content: '<?php echo __('tour.step2_content'); ?>',
			}, {
				element: 'section.col-sm-3',
				title: '<?php echo __('tour.step3_title'); ?>',
				placement: 'left',
				content: '<?php echo __('tour.step3_content'); ?>',
			}, {
				path: '<?php echo base_url('zainal-rahim'); ?>',
				element: "section.staff",
				title: '<?php echo __('tour.step31_title'); ?>',
				placement: 'right',
				content: '<?php echo __('tour.step31_content'); ?>',
			}, {
				element: 'div.well:nth-child(1)',
				title: '<?php echo __('tour.step32_title'); ?>',
				placement: 'left',
				content: '<?php echo __('tour.step32_content'); ?>',
			}, {
				element: '.rating-inner',
				title: '<?php echo __('tour.step33_title'); ?>',
				placement: 'left',
				content: '<?php echo __('tour.step33_content'); ?>'
			}, {
				element: 'div.tepian',
				title: '<?php echo __('tour.step34_title'); ?>',
				placement: 'top',
				content: '<?php echo __('tour.step34_content'); ?>',
			}, {
				element: "ul.navbar-right",
				title: "<?php echo __('tour.step4_title'); ?>",
				placement: 'bottom',
				content: "<?php echo __('tour.step4_content'); ?>"
			}, {
				path: '<?php echo base_url(); ?>',
				element: '#pkppa',
				title: '<?php echo __('tour.step5_title'); ?>',
				placement: 'right',
				content: '<?php echo __('tour.step5_content'); ?>',
				orphan: true,
				onHidden: function() {
					$('#helper-modal').load('/smp/help/keys', function () {
						$(this).modal('show');
					});
				},
			}]
		}).init();

		<?php if (Uri::current() == '/') : ?>
		if (screen.width > 480) {
    		tour.start(<?php echo site_meta('tour_force'); ?>);
		}
		<?php endif; ?>

		$(document).on('click', '[data-tour]', function(e) {
			e.preventDefault();
			if ($(this).hasClass('disabled')) {
				return;
			}
			tour.restart();
		});

		<?php if (is_staff()) : ?>
		$('#star-rating').tooltip({
			trigger: 'manual'
		});
		$(function() {
			$('#star-rating').tooltip('show');
			setTimeout(function(){
				$('#star-rating').tooltip('hide');
			}, 3000);
		});
		<?php endif; ?>

		<?php if (is_division()) : ?>
		$(function() {
			$(".panel-collapse").on('show.bs.collapse', function() {
			    $(this).siblings('.panel-primary').addClass('panel-success');
			}).on('hide.bs.collapse', function() {
			    $(this).siblings('.panel-primary').removeClass('panel-success');
			})
		});
		<?php endif; ?>
	</script>
	<?php endif; ?>
	<?php if (Uri::current() == '/') : ?>
	<script type="application/ld+json">
	{
		"@context": "http://schema.org",
		"@type": "WebSite",
		"url": "https://sistem.jpa.gov.my/smp/",
		"potentialAction": {
			"@type": "SearchAction",
			"target": "https://sistem.jpa.gov.my/smp/search?term={search_term_string}",
			"query-input": "required name=search_term_string"
		}
	}
	</script>
	<?php endif; ?>
  </body>
</html>
