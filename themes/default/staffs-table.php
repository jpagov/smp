<?php theme_include('header'); ?>
<?php if (Uri::current() == '/') : theme_include('footer'); exit(); endif; ?>

<section class="content col-md-12">
    <?php theme_include('breadcrumb'); ?>
	<?php if(has_staffs()): ?>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th><?php echo __('site.name'); ?></th>
                <th><?php echo __('site.position'); ?></th>
                <th><?php echo __('site.designation'); ?></th>
                <th><?php echo __('site.email'); ?></th>
                <th><?php echo __('site.telephone'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0; while(staffs()): ?>
            <tr>
                <td><a class="hovercard" href="<?php echo staff_url(); ?>" title="<?php echo staff_name(); ?>" data-img="<?php echo staff_custom_field('avatar', 'http://localhost/smp/content/avatar/default-male.jpg'); ?>" data-salutation="<?php echo staff_salutation(); ?>" data-jobtitle="<?php echo staff_job_title(); ?>" rel="popover"><?php echo staff_name(); ?></a></td>
                <td><?php echo staff_job_title(); ?></td>
                <td><?php echo staff_position(); ?></td>
                <td><span class="email" data-email-id="<?php echo staff_id(); ?>" id="staff-email-<?php echo staff_id(); ?>"><?php echo staff_email_image(); ?></span></td>
                <td><?php echo staff_telephone(); ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

	<?php if(has_pagination()): ?>
	<nav class="pagination">
            <?php echo staffs_paging()->links(); ?>
	</nav>
	<?php endif; ?>

	<?php else: ?>
		<p>Looks like you have some writing to do!</p>
	<?php endif; ?>

	<?php if(is_division() and division_address()): ?>
	<div class="row division-meta">

		<div class="col-md-4">
		<?php if(division_address()): ?>
			<h2 class="page-header">Address</h2>
			<address><?php echo division_address(); ?></address>
		<?php endif; ?>
		</div>

		<div class="col-md-4">
		<?php if(division_telephone()): ?>
			<h2 class="page-header">Telephone</h2>
			<?php echo division_telephone(); ?>
		<?php endif; ?>
		</div>

		<div class="col-md-4">
		<?php if(division_fax()): ?>
			<h2 class="page-header">Fax</h2>
			<?php echo division_fax(); ?>
		<?php endif; ?>
		</div>

	</div><br class="clearfix">
	<?php endif; ?>

</section>

<?php theme_include('footer'); ?>
