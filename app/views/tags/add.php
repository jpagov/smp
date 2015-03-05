<?php echo $header; ?>

<?php echo Html::link('admin/tags', __('global.back'), array('class' => 'btn btn-lg btn-primary pull-right')); ?>

<h1 class="page-header"><?php echo __('tags.create_tag'); ?></h1>

<?php echo $messages; ?>

<div class="row">

      <form class="form-horizontal"  method="post" action="<?php echo Uri::to('admin/tags/add'); ?>" novalidate>

      <div class="col-lg-9">

        <input name="token" type="hidden" value="<?php echo $token; ?>">

        <fieldset>
            <legend><?php echo __('hierarchy.detail'); ?></legend>

            <div class="form-group">
              <label class="col-lg-3 control-label" for="title"><?php echo __('tags.title'); ?></label>
              <div class="col-lg-9">
                <?php echo Form::text('title', Input::previous('title'), array(
                  'class' => 'form-control',
                  'id' => 'title',
                  )); ?><em><?php echo __('tags.title_explain'); ?></em>
                </div>
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label" for="slug"><?php echo __('tags.slug'); ?></label>
              <div class="col-lg-9">
                <?php echo Form::text('slug', Input::previous('slug'), array(
                  'class' => 'form-control',
                  'id' => 'slug',
                  )); ?><em><?php echo __('tags.slug_explain'); ?></em>
                </div>
            </div>

           </fieldset>

        </div>
        <div class="col-md-3">

      <?php echo Form::button(__('global.save'), array(
        'class' => 'btn btn-primary btn-lg btn-block',
        'type' => 'submit'
        )); ?>


      </form>
  </div>

<?php echo $footer; ?>
