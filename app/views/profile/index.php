<?php echo $header; ?>

<?php echo Html::link($profile->slug, __('global.view'), array('class' => 'btn btn-lg btn-success pull-right', 'target' => '_blank')); ?>

 <?php echo Html::link('admin/staffs/edit/' . $profile->id, __('staffs.editing'), array('class' => 'btn btn-lg btn-primary pull-right')); ?>

<h1 class="page-header"><?php echo __('users.profile'); ?></h1>

<?php echo $messages; ?>



<div class="row">

	<div class="col-xs-9 col-md-push-3">
        <h1><em><?php echo $profile->salutation; ?></em> <?php echo $profile->first_name; ?> <?php echo $profile->last_name; ?></h1>
        <p class="lead"><?php echo $profile->job_title; ?></p>

        <?php if ($profile->description) : ?><p class="well well-sm bg-warning"><?php echo $profile->description; ?></p><?php endif; ?>
    </div>

    <div class="col-xs-3 col-md-pull-9">
        <img src="<?php echo avatar($profile->avatar); ?>" class="img-responsive img-thumbnail pull-left">

    </div>

</div>

<div class="row">

    <div class="col-md-12 col-md-offset-2 meta">
        <dl class="dl-horizontal">

          <dt><?php echo _e('site.designation'); ?></dt>
          <dd><i class="glyphicon glyphicon-barcode"></i> <?php echo $profile->position; ?></dd>
          <dt><?php echo _e('site.email'); ?></dt>
          <dd><i class="glyphicon glyphicon-comment"></i> <a class="email" href="mailto:<?php echo $profile->email_encode; ?>" id="staff-email-<?php echo $profile->id; ?>"><?php echo $profile->email; ?></a></dd>
          <dt><?php echo _e('site.telephone'); ?></dt>
          <dd><i class="glyphicon glyphicon-earphone"></i> <?php echo $profile->telephone; ?></dd>
      </dl>

      <?php if ($organization = staff_hierarchy_admin($profile->id, true)) : ?>
      <dl class="dl-horizontal">
      		<?php foreach($organization as $key => $org): ?>
          <dt><?php echo _e('site.' . $key); ?></dt>
          <dd><a href="<?php echo Uri::to('admin/' . $key . 's' . '/edit' . '/' . $org['id']); ?>"><?php echo $org['title']; ?></a></dd>
          <?php endforeach; ?>
      </dl>
    	<?php endif; ?>

  </div>
</div>


<?php echo $footer; ?>
