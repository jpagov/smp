<?php theme_include('header'); ?>

<h2 class="page-header">Search Results</h2>

<?php echo search_form_notifications(); ?>

<section class="col-sm-9 staffs-search-result">

	<?php if(has_search_results()): ?>

		<p class="lead"><strong class="text-success"><?php echo total_search_results(); ?></strong> <?php echo __('site.search_results_title'); ?> &ldquo;<strong class="text-success"><?php echo search_info(); ?></strong>&rdquo;</p>

		<div id="staff-search-result">
			<?php $i = 0; while(search_results()): $i++; ?>

			<article class="search-result row">

				<div class="col-xs-12 col-sm-2">
					<img src="<?php echo staff_custom_field('avatar', 'http://localhost/smp/content/avatar/default-male.jpg'); ?>" class="img-responsive img-thumbnail" alt="<?php echo staff_name(); ?>">
				</div>

				<div class="col-sm-6 excerpet">
					<h3><a href="<?php echo staff_url(); ?>" title=""><?php echo staff_name(); ?></a></h3>
					<p><code><?php echo staff_job_title(); ?></code></p>
					<p class="text-muted"><?php echo truncate(staff_description()); ?></p>
				</div>

				<div class="col-sm-4 staff-meta list-unstyle">
					<ul class="list-unstyled">
						<li><i class="glyphicon glyphicon-barcode"></i> <span><?php echo staff_position(); ?></span></li>

						<li><i class="glyphicon glyphicon-phone-alt"></i> <span><?php echo staff_telephone(); ?></span></li>
						<li><i class="glyphicon glyphicon-envelope"></i> <?php if (staff_has_email()) : ?><a href="mailto:<?php echo staff_email_encode(); ?>"><span><?php echo staff_email_image(); ?></span></a><?php else: ?><?php echo __('site.na'); ?> <?php endif; ?></li>
					</ul>
				</div>

				<span class="clearfix borda"></span>
			</article>

		<?php endwhile; ?>
	</div>

	<?php if(has_search_pagination()): ?>
		<?php if (search_links()) : ?>
			<ul class="pagination">
				<?php echo search_links(); ?>
			</ul>
		<?php endif; ?>

	<?php endif; ?>

<?php else: ?>
	<p class="lead"><?php echo __('site.search_noresult', search_info()); ?></p>
<?php endif; ?>
</section>

<section class="col-sm-3">
	<nav class="sidebar">


		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a class="accordion-toggle" data-toggle="collapse" href="#collapseDivision">
						<?php echo __('site.division'); ?>
					</a>

				</h4>
			</div>
			<div id="collapseDivision" class="panel-collapse collapse <?php if (count(search_divisions())) echo 'in'; ?>">

				<div class="panel-body hidden" id="search-sidebar-division">
			    	<button type="button" class="btn btn-success btn-xs submit-search-sidebar btn-division btn-block <?php if (count(search_divisions()) < 1) echo 'hidden'; ?>">Submit</button>
			  	</div>

				<ul class="list-group checked-list-box" id="check-list-box-division">

					<?php foreach(search_divisions_all() as $div): ?>

						<li class="list-group-item<?php if (in_array($div->id, search_divisions())) echo ' list-group-item-primary active'; ?>" style="cursor: pointer;">

							<span class="state-icon glyphicon glyphicon-<?php echo (in_array($div->id, search_divisions())) ? 'check' : 'unchecked'; ?>"></span>

							<?php echo strtoupper($div->slug); ?>

							<input class="hidden" type="checkbox" name="division[]" value="<?php echo $div->id; ?>"<?php if (in_array($div->id, search_divisions())) echo ' checked'; ?>>

						</li>
					<?php endforeach; ?>
				</ul>

			</div>
		</div><!--/.panel panel-default -->

		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a class="accordion-toggle" data-toggle="collapse" href="#collapseField">
						<?php echo __('site.search_filter'); ?>
					</a>

				</h4>
			</div>
			<div id="collapseField" class="panel-collapse collapse <?php if (count(search_in_all())) echo 'in'; ?>">

				<div class="panel-body hidden" id="search-sidebar-field">
			    	<button type="button" class="btn btn-success btn-xs submit-search-sidebar btn-field btn-block <?php if (count(search_in_all()) < 1) echo 'hidden'; ?>">Submit</button>
			  	</div>

				<ul class="list-group checked-list-box" id="check-list-box-field">

					<?php foreach(search_in_all() as $field): ?>

						<li class="list-group-item<?php if (in_array($field, search_in())) echo ' list-group-item-primary active'; ?>" style="cursor: pointer;">

							<span class="state-icon glyphicon glyphicon-<?php echo (in_array($field, search_in())) ? 'check' : 'unchecked'; ?>"></span>

							 <?php echo __('search.' . $field); ?>

							<input class="hidden" type="checkbox" name="in[]" value="<?php echo $field; ?>"<?php if (in_array($field, search_in())) echo ' checked'; ?>>
						</li>
					<?php endforeach; ?>
				</ul>

			</div>
		</div><!--/.panel panel-default -->

	</nav>
</section>

<?php theme_include('footer'); ?>
