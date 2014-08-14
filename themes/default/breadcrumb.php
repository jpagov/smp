<!-- Breadcrumb -->
<ul class="breadcrumb">
  <li><a href="#">Home</a></li>
  <?php if (is_staff()) : ?>
    <li><a href="<?php echo staff_division_url(); ?>"><?php echo staff_division_slug(); ?></a></li>
  <?php else: ?>
    <?php if (!is_managementpage()) : ?>
        <li><a href="<?php echo base_url('divisions'); ?>">Division</a></li>
    <?php endif; ?>
  <?php endif; ?>
  <li class="active"><?php echo (staff_name()) ? staff_name() : is_managementpage() ? 'Top Management' : division(); ?></li>
</ul>


