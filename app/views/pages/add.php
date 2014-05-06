<?php echo $header; ?>

<?php echo Html::link('admin/pages', __('global.back'), array('class' => 'btn btn-lg btn-default pull-right')); ?>

<h1 class="page-header"><?php echo __('pages.pages', 'Pages'); ?></h1>

<?php echo $messages; ?>

<div class="row">

  <form class="form-horizontal" method="post" action="<?php echo Uri::to('admin/pages/add'); ?>" enctype="multipart/form-data">

    <input name="token" type="hidden" value="<?php echo $token; ?>">

    <section class="col-md-9">
      <fieldset>

        <div class="form-group">
          <label class="col-md-3 control-label" for="title"><?php echo __('pages.title'); ?></label>
          <div class="col-md-9">
          <?php echo Form::text('title', Input::previous('title'), array(
            'placeholder' => __('pages.title'),
            'class' => 'form-control',
            'autocomplete'=> 'off',
            'autofocus' => 'true',
            'id' => 'title',
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

        <div class="form-group">
          <label class="col-sm-3 control-label" for="content"><?php echo __('pages.content'); ?></label>
          <div class="col-sm-9">
            <?php echo Form::textarea('content', Input::previous('content'), array(
              'rows' => 3,
              'class' => 'form-control',
              'data-provide' => 'markdown',
              'id' => 'content'
            )); ?>
            <span class="help-block"><?php echo __('pages.content_explain'); ?></span>
          </div>
        </div>

      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('show_in_menu', 1, Input::previous('show_in_menu'), array('id' => 'show_in_menu')); ?> <?php echo __('pages.show_in_menu'); ?>
            </label>
          </div>
          <span class="help-block"><?php echo __('pages.show_in_menu_explain'); ?></span>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-3 control-label" for="name"><?php echo __('pages.name'); ?></label>
        <div class="col-md-9">
          <?php echo Form::text('name', Input::previous('name'), array(
            'class' => 'form-control',
            'id' => 'name',
            )); ?>
            <span class="help-block"><?php echo __('pages.name_explain'); ?></span>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-3 control-label" for="slug"><?php echo __('pages.slug'); ?></label>
          <div class="col-md-9">
            <?php echo Form::text('slug', Input::previous('slug'), array(
              'class' => 'form-control',
              'id' => 'slug',
            )); ?>
            <span class="help-block"><?php echo __('pages.name_explain'); ?></span>
          </div>
        </div>

          <div class="form-group">
            <label class="col-sm-3 control-label" for="status"><?php echo __('pages.status'); ?></label>
            <div class="col-sm-4">
              <?php echo Form::select('status', $statuses, Input::previous('status'), array(
                'class' => 'form-control',
                'id' => 'status',
              )); ?>
              <span class="help-block"><?php echo __('pages.status_explain'); ?></span>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 control-label" for="parent"><?php echo __('pages.parent'); ?></label>
            <div class="col-sm-4">
              <?php echo Form::select('parent', $pages, Input::previous('parent'), array(
                'class' => 'form-control',
                'id' => 'parent',
              )); ?>
              <span class="help-block"><?php echo __('pages.parent_explain'); ?></span>
            </div>
          </div>

          <?php foreach($fields as $field): ?>
           <div class="form-group">
            <label class="col-md-3 control-label" for="extend_<?php echo $field->key; ?>"><?php echo $field->label; ?></label>
            <div class="col-md-6">
              <?php echo Extend::html($field); ?>
            </div>
          </div>

        <?php endforeach; ?>
      </fieldset>

    </section><!-- /col-md-9 -->
    <aside class="col-md-3">

      <?php echo Form::button(__('global.create'), array(
        'class' => 'btn btn-primary btn-lg btn-block',
        'type' => 'submit'
        )); ?>

    </aside>

  </form>
</div>

<?php echo $footer; ?>
