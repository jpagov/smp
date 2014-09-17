<div class="container">
  <div class="row">

    <div class="col-md-12 categories">
      <div class="col-md-4 col-md-offset-4 well text-center">
        <a href="<?php echo base_url('top-management'); ?>"><h3><?php echo __('site.top_management'); ?></h3></a>
        <p><em><?php echo __('site.top_management'); ?></em></p>
      </div>
    </div>

    <h2 class="text-center "><?php echo __('site.category'); ?></h2>
    <?php $reminder = 0; while(categories()): ?>
    <?php if ($reminder % 4 == 0) : ?>
        <div class="clearfix visible-xs-block"></div>
    <?php endif; ?>
      <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 categories">
        <div class="well text-center">
          <a href="<?php echo category_url(); ?>" class="alert-link"><h3><?php echo category_title(); ?></h3></a>
          <p><?php echo category_description(); ?><em><?php echo category_title_en(); ?></em></p>
          <?php if ($reminder == 1) : ?><br><?php endif; ?>
        </div>
      </div>
    <?php $reminder++; endwhile; ?>

  </div>
</div>
