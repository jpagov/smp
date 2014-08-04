<?php theme_include('header'); ?>

<section class="col-xs-12 col-md-8 staff well" id="staff-<?php echo staff_id(); ?>">
    <?php theme_include('breadcrumb'); ?>


    <div class="row">

        <div class="col-xs-8 col-md-push-4">
            <h1><em><?php echo staff_salutation(); ?></em> <?php echo staff_first_name(); ?> <?php echo staff_last_name(); ?></h1>
            <p class="lead"><span itemprop="jobTitle"><?php echo staff_description(); ?></span></p>
        </div>

        <div class="col-xs-4 col-md-pull-8">
            <figure><img src="<?php echo staff_custom_field('avatar', 'http://localhost/smp/content/avatar/default-male.jpg'); ?>" class="img-responsive img-thumbnail pull-left"></figure>

        </div>

    </div>

    <div class="row">

        <div class="col-md-2 star-rating">
            <p> <abbr title="<?php echo staff_view(); ?>"><?php echo custom_number_format(staff_view()); ?></abbr> <small> views </small></p>
            <div class="stars">
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star-empty"></span>
            </div>
            <p><small> Average 4.5 / 5</small> </p>
        </div>

        <div class="col-md-10 meta">
            <dl class="dl-horizontal">

              <dt>Position</dt>
              <dd><i class="glyphicon glyphicon-pushpin"></i> <span itemprop="jobTitle"><?php echo staff_job_title(); ?></span></dd>
              <dt>Designation</dt>
              <dd><i class="glyphicon glyphicon-barcode"></i> <?php echo staff_position(); ?></dd>
              <dt>Email</dt>
              <dd><i class="glyphicon glyphicon-comment"></i> <a class="email" itemprop="email" href="mailto:<?php echo staff_email_encode(); ?>"><?php echo staff_email_encode(); ?></a></dd>
              <dt>Office Phone</dt>
              <dd><i class="glyphicon glyphicon-earphone"></i> <?php echo staff_telephone_link(); ?>&#1730;</dd>
          </dl>
      </div>
  </div>

</section>

<section class="col-xs-12 col-md-4 sidebar">

    <?php if (staff_report_to_id()) : $boss = staff_report_to(); ?>

        <h2 class="modal-header">Direct Reports</h2>

        <?php foreach($boss->results as $bos): ?>

        <div class="list-group">
            <a href="<?php echo Config::app('url') . '/' . $bos->slug; ?>" class="list-group-item clearfix">
                <img width="50" height="50" class="media-object img-circle pull-left" src="<?php echo staff_avatar($bos->id); ?>" alt="...">
                <h4 class="list-group-item-heading"><?php echo $bos->display_name; ?></h4>
                <p class="list-group-item-text"><?php echo $bos->position; ?></p>
            </a>
        </div>

    <?php endforeach; ?>

    <?php endif; ?>


      <h2 class="modal-header">Related</h2>
      <div class="list-group">

        <?php $related = Staff::related(staff_id()); ?>

        <?php foreach($related->results as $relate): ?>
        <a href="<?php echo Config::app('url') . '/' . $relate->slug; ?>" class="list-group-item clearfix">
            <img width="50" height="50" class="media-object img-circle pull-left" src="<?php echo staff_avatar($relate->id); ?>" alt="...">
            <h4 class="list-group-item-heading"><?php echo $relate->display_name; ?></h4>
            <p class="list-group-item-text"><?php echo $relate->position; ?></p>
        </a>
        <?php endforeach; ?>
    </div>

</section>

<?php if(comments_open()): ?>
    <section class="comments">
      <?php if(has_comments()): ?>
          <ul class="commentlist">
            <?php $i = 0; while(comments()): $i++; ?>
            <li class="comment" id="comment-<?php echo comment_id(); ?>">
              <div class="wrap">
                <h2><?php echo comment_name(); ?></h2>
                <time><?php echo relative_time(comment_time()); ?></time>

                <div class="content">
                  <?php echo comment_text(); ?>
              </div>

              <span class="counter"><?php echo $i; ?></span>
          </div>
      </li>
  <?php endwhile; ?>
</ul>
<?php endif; ?>

<form id="comment" class="commentform wrap" method="post" action="<?php echo comment_form_url(); ?>#comment">
    <?php echo comment_form_notifications(); ?>

    <p class="name">
      <label for="name">Your name:</label>
      <?php echo comment_form_input_name('placeholder="Your name"'); ?>
  </p>

  <p class="email">
      <label for="email">Your email address:</label>
      <?php echo comment_form_input_email('placeholder="Your email (won’t be published)"'); ?>
  </p>

  <p class="textarea">
      <label for="text">Your comment:</label>
      <?php echo comment_form_input_text('placeholder="Your comment"'); ?>
  </p>

  <p class="submit">
      <?php echo comment_form_button(); ?>
  </p>
</form>

</section>
<?php endif; ?>

<?php theme_include('footer'); ?>
