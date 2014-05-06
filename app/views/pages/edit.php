<?php echo $header; ?>

<?php echo Html::link('admin/pages', __('global.back'), array('class' => 'btn btn-lg btn-primary pull-right')); ?>

<h1 class="page-header"><?php echo __('pages.pages', 'Pages'); ?></h1>

<?php echo $messages; ?>

<div class="row">

  <form class="form-horizontal" method="post" action="<?php echo Uri::to('admin/pages/edit/' . $page->id); ?>" enctype="multipart/form-data">

    <input name="token" type="hidden" value="<?php echo $token; ?>">

    <section class="col-md-9">
      <fieldset>

        <div class="form-group">
          <label class="col-md-3 control-label" for="title"><?php echo __('pages.title'); ?></label>
          <div class="col-md-9">
          <?php echo Form::text('title', Input::previous('title', $page->title), array(
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
           <?php echo Form::text('redirect', Input::previous('redirect', $page->redirect), array(
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
            <?php echo Form::textarea('content', Input::previous('content', $page->content), array(
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
              <?php echo Form::checkbox('show_in_menu', 1, Input::previous('show_in_menu', $page->show_in_menu), array('id' => 'show_in_menu')); ?> <?php echo __('pages.show_in_menu'); ?>
            </label>
          </div>
          <span class="help-block"><?php echo __('pages.show_in_menu_explain'); ?></span>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-3 control-label" for="name"><?php echo __('pages.name'); ?></label>
        <div class="col-md-9">
          <?php echo Form::text('name', Input::previous('name', $page->name), array(
            'class' => 'form-control',
            'id' => 'name',
            )); ?>
            <span class="help-block"><?php echo __('pages.name_explain'); ?></span>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-3 control-label" for="slug"><?php echo __('pages.slug'); ?></label>
          <div class="col-md-9">
            <?php echo Form::text('slug', Input::previous('slug', $page->slug), array(
              'class' => 'form-control',
              'id' => 'slug',
            )); ?>
            <span class="help-block"><?php echo __('pages.name_explain'); ?></span>
          </div>
        </div>

          <div class="form-group">
            <label class="col-sm-3 control-label" for="status"><?php echo __('pages.status'); ?></label>
            <div class="col-sm-4">
              <?php echo Form::select('status', $statuses, Input::previous('status', $page->status), array(
                'class' => 'form-control',
                'id' => 'status',
              )); ?>
              <span class="help-block"><?php echo __('pages.status_explain'); ?></span>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 control-label" for="parent"><?php echo __('pages.parent'); ?></label>
            <div class="col-sm-4">
              <?php echo Form::select('parent', $pages, Input::previous('parent', $page->parent), array(
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

      <?php echo Form::button(__('global.save'), array(
        'class' => 'btn btn-primary btn-lg btn-block',
        'type' => 'submit'
        )); ?>

      <?php echo Html::link('admin/pages/delete/' . $page->id,
        __('global.delete'), array(
          'class' => 'btn btn-warning btn-lg btn-block delete'
          )); ?>

    </aside>

  </form>
</div>

<?php echo $footer; ?>
