<!-- Breadcrumb -->
<ul class="breadcrumb">


    <li><a href="<?php echo base_url(); ?>"><i class="glyphicon glyphicon-home"></i> <span class="sr-only">Home</span></a></li>
    <?php if (is_staff()) : ?>
    <li><a href="<?php echo staff_division_url(); ?>"><?php echo staff_division_slug(); ?></a></li>
    <li class="active"><?php echo (staff_name()); ?></li>
    <?php else: ?>
    <?php if (!is_managementpage()) : ?>
    <li><a href="<?php echo base_url('divisions'); ?>"><?php echo _e('site.division'); ?></a></li>
    <li class="active"><?php echo (staff_name()) ? staff_name() : division_slug(); ?></li>
    <?php else: ?>
    <li class="active"><?php echo _e('site.top_management'); ?></li>
    <?php endif; ?>
    <?php endif; ?>
</ul>
