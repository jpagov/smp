<?php theme_include('header'); ?>
<?php if (Uri::current() == '/') : theme_include('footer'); exit(); endif; ?>

<section class="content col-lg-12">
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
                <td><?php echo staff_email_encode(); ?></td>
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

</section>

<?php theme_include('footer'); ?>
