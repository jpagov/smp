<?php echo $header; ?>

<?php echo Html::link('admin/categories', __('global.back'), array('class' => 'btn btn-lg btn-primary pull-right')); ?>

<h1 class="page-header"><?php echo __('categories.edit_category', $category->title); ?></h1>

<?php echo $messages; ?>

<div class="row">
  <div class="col-lg-9">
      <form class="form-horizontal" method="post" action="<?php echo Uri::to('admin/categories/edit/' . $category->id); ?>" novalidate autocomplete="off" enctype="multipart/form-data">
        <input name="token" type="hidden" value="<?php echo $token; ?>">

        <fieldset>
            <legend><?php echo __('hierarchy.detail'); ?></legend>

            <div class="form-group">
              <label class="col-lg-3 control-label" for="title"><?php echo __('categories.title'); ?></label>
              <div class="col-lg-9">
                <?php echo Form::text('title', Input::previous('title', $category->title), array(
                  'class' => 'form-control',
                  'id' => 'title',
                  )); ?><em><?php echo __('categories.title_explain'); ?></em>
                </div>
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label" for="slug"><?php echo __('categories.slug'); ?></label>
              <div class="col-lg-9">
                <?php echo Form::text('slug', Input::previous('slug', $category->slug), array(
                  'class' => 'form-control',
                  'id' => 'slug',
                  )); ?><em><?php echo __('categories.slug_explain'); ?></em>
                </div>
            </div>

            <div class="form-group">
            <label class="col-lg-3 control-label" for="description"><?php echo __('categories.description'); ?></label>
            <div class="col-lg-9">
              <?php echo Form::textarea('description', Input::previous('description', $category->description), array(
                'rows' => 3,
                'class' => 'form-control',
                'id' => 'description'
                )); ?>
              </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="redirect"><?php echo __('categories.redirect'); ?></label>
                <div class="col-lg-9 redirect-prefetch">
                  <?php echo Form::text('redirect', Input::previous('redirect', $category->redirect), array('class' => 'form-control typeahead col-sm-12', 'id' => 'redirect')); ?>
                </div>
            </div>

      </form>
  </div>
</div>

<section class="wrap">
	<?php echo $messages; ?>

	<form method="post" action="<?php echo Uri::to('admin/categories/edit/' . $category->id); ?>" novalidate>

		<input name="token" type="hidden" value="<?php echo $token; ?>">

		<fieldset class="split">
			<p>
				<label><?php echo __('categories.title'); ?>:</label>
				<?php echo Form::text('title', Input::previous('title', $category->title)); ?>
				<em><?php echo __('categories.title_explain'); ?></em>
			</p>
			<p>
				<label><?php echo __('categories.slug'); ?>:</label>
				<?php echo Form::text('slug', Input::previous('slug', $category->slug)); ?>
				<em><?php echo __('categories.slug_explain'); ?></em>
			</p>
			<p>
				<label><?php echo __('categories.description'); ?>:</label>
				<?php echo Form::textarea('description', Input::previous('description', $category->description)); ?>
				<em><?php echo __('categories.description_explain'); ?></em>
			</p>
		</fieldset>

		<aside class="buttons">
			<?php echo Form::button(__('global.save'), array('type' => 'submit', 'class' => 'btn')); ?>

			<?php echo Html::link('admin/categories/delete/' . $category->id, __('global.delete'), array(
				'class' => 'btn delete red'
			)); ?>
		</aside>
	</form>
</section>

<?php echo $footer; ?>
