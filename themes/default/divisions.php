    <div class="col-md-12 divisions">
    	<div class="col-md-4 col-md-offset-4 well text-center">
    		<a href="<?php echo base_url('top-management'); ?>"><h3><?php echo __('site.top_management'); ?></h3></a>
    		<p><em><?php echo __('site.top_management'); ?></em></p>
    	</div>
    </div>

    <h2 class="text-center "><?php echo __('site.divisions'); ?></h2>
    <div class="container-fluid">
    	<div class="row">
    		<?php while(divisions()): ?>

    			<div class="col-sm-6 col-md-4 col-lg-4 divisions">
    				<div class="well text-center">
    					<a href="<?php echo division_url(); ?>" class="alert-link"><h3><?php echo strtoupper(division_slug()); ?></h3></a>
    					<p><?php echo division_title(); ?><em><?php echo division_title_en(); ?></em></p>
    				</div>
    			</div>

    		<?php endwhile; ?>
    	</div> </div>

