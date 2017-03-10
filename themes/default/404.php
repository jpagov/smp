<?php theme_include('header'); ?>

	<section class="container">
		<h1 class="page-header">Page not found</h1>

		<p class="lead"><?php echo __('site.error_404', htmlspecialchars(current_url())); ?> <!-- Your best bet is either to try the <a href="<?php echo base_url(); ?>">homepage</a>, try <a href="#search">searching</a>, or go and cry in a corner (although I don’t recommend the latter).--></p>
		<p class="lead"><?php echo __('site.error_404_option'); ?></p>
	</section>

<?php theme_include('footer'); ?>
