
<div class="col-md-12 categories">
	<div class="col-md-4 col-md-offset-4 well text-center">
		<a href="<?php echo base_url('top-management'); ?>"><h3><?php echo __('site.top_management'); ?></h3></a>
		<p><em><?php echo __('site.top_management'); ?></em></p>
	</div>
</div>

<h2 class="text-center "><?php echo __('site.category'); ?></h2>
<div class="container-fluid">
	<div class="row">
		<?php while(categories()): ?>

			<div class="col-sm-6 col-md-4 col-lg-4 categories">
				<div class="well text-center">
					<a href="<?php echo category_url(); ?>" class="alert-link"><h3><?php echo _e(category_title()); ?></h3></a>
					<p><?php echo category_description(); ?><em><?php echo category_title_en(); ?></em></p>

				</div>
			</div>
		<?php endwhile; ?>

	</div>
</div>
