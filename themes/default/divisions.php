<div class="container">
  <div class="row">

    <div class="col-md-12 divisions">
      <div class="col-md-4 col-md-offset-4 well text-center">
        <a href="#"><h3><?php echo __('site.top_management'); ?></h3></a>
        <p><em><?php echo __('site.top_management'); ?></em></p>
      </div>
    </div>

    <h2 class="text-center "><?php echo __('site.divisions'); ?></h2>
    <?php $reminder = 0; while(divisions()): ?>
    <?php if ($reminder % 4 == 0) : ?>
        <div class="clearfix visible-xs-block"></div>
    <?php endif; ?>
      <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 divisions">
        <div class="well text-center">
          <a href="<?php echo division_url(); ?>" class="alert-link"><h3><?php echo strtoupper(division_slug()); ?></h3></a>
          <p><?php echo division_title(); ?><em><?php echo division_title_en(); ?></em></p>
          <?php if ($reminder == 1) : ?><br><?php endif; ?>
        </div>
      </div>
    <?php $reminder++; endwhile; ?>

  </div>
</div>
