<?php theme_include('header'); ?>
<?php if (Uri::current() == '/') : theme_include('footer'); exit(); endif; ?>

<section class="content col-md-<?php  echo ( (show_division_meta() && division_has_meta()) || total_units() ) ? '9' : '12'; ?>">
    <?php theme_include('breadcrumb'); ?>

	<?php if(has_staffs()): ?>

	<div id="staff-result">
		<?php $i = 0; while(staffs()): $i++; ?>

		<article class="search-result row">

			<div class="col-sm-8 excerpet">
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

	<?php if(has_pagination()): ?>
	<nav class="pagination">
            <?php echo staffs_paging()->links(); ?>
	</nav>
	<?php endif; ?>

	<?php else: ?>
		<p><?php echo _e('staffs.nothing'); ?></p>
	<?php endif; ?>

</section>


<?php if( show_division_meta() || total_units() ) : ?>
<section class="col-sm-3">

	<?php if(total_units()): ?>
	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading"><?php echo _e('staffs.unit'); ?></div>

			<ul class="list-group">
				<?php while(units()): ?>
				<li class="list-group-item"><a href="<?php echo base_url('division/' . unit_division_slug() .  '/' . unit_branch_slug() . '/' . unit_sector_slug() . '/' . unit_slug()); ?>"><?php echo unit_title(); ?></a></li>
				<?php endwhile; ?>
			</ul>

	</div>
	<?php endif; ?>

	<?php if(division_has_meta()): ?>
	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading"><?php echo _e('staffs.info'); ?></div>
		<div class="panel-body">
			<?php if(division_address()): ?>
			<h3><?php echo _e('staffs.address'); ?></h3>
			<address><?php echo division_address(); ?></address>
			<?php endif; ?>

			<?php if(division_telephone()): ?>
			<h3><?php echo _e('staffs.telephone'); ?></h3>
			<?php echo division_telephone(); ?>
			<?php endif; ?>

			<?php if(division_fax()): ?>
			<h3><?php echo _e('staffs.fax'); ?></h3>
			<?php echo division_fax(); ?>
			<?php endif; ?>
		</div>
	</div>
	<?php endif; ?>

</section>
<?php endif; ?>
<?php theme_include('footer'); ?>
