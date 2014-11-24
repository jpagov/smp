<?php theme_include('header'); ?>
<?php if (Uri::current() == '/') : theme_include('footer'); exit(); endif; ?>

<section class="content col-md-<?php echo (division_has_meta() ? '9' : '12'); ?>">
    <?php theme_include('breadcrumb'); ?>

	<?php if(has_staffs()): ?>

	<div id="staff-result">
		<?php $i = 0; while(staffs()): $i++; ?>

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

	<?php if(has_pagination()): ?>
	<nav class="pagination">
            <?php echo staffs_paging()->links(); ?>
	</nav>
	<?php endif; ?>

	<?php else: ?>
		<p>Looks like you have some writing to do!</p>
	<?php endif; ?>

</section>


<?php if(division_has_meta()): ?>
<section class="col-sm-3">
	<?php if(division_address()): ?>
	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading"><?php echo _e('staffs.address'); ?></div>
		<div class="panel-body">
			<address><?php echo division_address(); ?></address>
		</div>
	</div>
	<?php endif; ?>

	<?php if(division_telephone()): ?>
	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading"><?php echo _e('staffs.telephone'); ?></div>
		<div class="panel-body">
		<p><?php echo division_telephone(); ?></p>
		</div>
	</div>
	<?php endif; ?>

	<?php if(division_fax()): ?>
	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading"><?php echo _e('staffs.fax'); ?></div>
		<div class="panel-body">
		<p><?php echo division_fax(); ?></p>
		</div>
	</div>
	<?php endif; ?>

</section>
<?php endif; ?>
<?php theme_include('footer'); ?>
