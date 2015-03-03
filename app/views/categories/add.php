<?php echo $header; ?>

<?php echo Html::link('admin/categories', __('global.back'), array('class' => 'btn btn-lg btn-primary pull-right')); ?>

<h1 class="page-header"><?php echo __('categories.create_category'); ?></h1>

<?php echo $messages; ?>

<div class="row">

      <form class="form-horizontal"  method="post" action="<?php echo Uri::to('admin/categories/add'); ?>" novalidate>

      <div class="col-lg-9">

        <input name="token" type="hidden" value="<?php echo $token; ?>">

        <fieldset>
            <legend><?php echo __('hierarchy.detail'); ?></legend>

            <div class="form-group">
              <label class="col-lg-3 control-label" for="title"><?php echo __('categories.title'); ?></label>
              <div class="col-lg-9">
                <?php echo Form::text('title', Input::previous('title'), array(
                  'class' => 'form-control',
                  'id' => 'title',
                  )); ?><em><?php echo __('categories.title_explain'); ?></em>
                </div>
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label" for="slug"><?php echo __('categories.slug'); ?></label>
              <div class="col-lg-9">
                <?php echo Form::text('slug', Input::previous('slug'), array(
                  'class' => 'form-control',
                  'id' => 'slug',
                  )); ?><em><?php echo __('categories.slug_explain'); ?></em>
                </div>
            </div>

            <div class="form-group">
            <label class="col-lg-3 control-label" for="description"><?php echo __('categories.description'); ?></label>
            <div class="col-lg-9">
              <?php echo Form::textarea('description', Input::previous('description'), array(
                'rows' => 3,
                'class' => 'form-control',
                'id' => 'description'
                )); ?>
              </div>
            </div>

            <div class="form-group">
	          <label class="col-md-3 control-label" for="redirect"><?php echo __('pages.redirect'); ?></label>
	          <div class="col-md-9">
	           <?php echo Form::text('redirect', Input::previous('redirect'), array(
	              'class' => 'form-control',
	              'placeholder' => __('pages.redirect_url'),
	              'id' => 'redirect',
	            )); ?>
	            <span class="help-block"><?php echo __('pages.redirect_explain'); ?></span>
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
