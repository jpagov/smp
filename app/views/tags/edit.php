<?php echo $header; ?>

<?php echo Html::link('admin/tags', __('global.back'), array('class' => 'btn btn-lg btn-primary pull-right')); ?>

<h1 class="page-header"><?php echo __('tags.edit_tag', __($tag->title)); ?></h1>

<?php echo $messages; ?>

<div class="row">

	<form class="form-horizontal" method="post" action="<?php echo Uri::to('admin/tags/edit/' . $tag->id); ?>" novalidate autocomplete="off">

		<div class="col-lg-9">

			<input name="token" type="hidden" value="<?php echo $token; ?>">

			<fieldset>
				<legend><?php echo __('hierarchy.detail'); ?></legend>

				<div class="form-group">
					<label class="col-lg-3 control-label" for="title"><?php echo __('tags.title'); ?></label>
					<div class="col-lg-9">
						<?php echo Form::text('title', Input::previous('title', $tag->title), array(
							'class' => 'form-control',
							'id' => 'title',
						)); ?><em><?php echo __('tags.title_explain'); ?></em>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label" for="slug"><?php echo __('tags.slug'); ?></label>
					<div class="col-lg-9">
						<?php echo Form::text('slug', Input::previous('slug', $tag->slug), array(
							'class' => 'form-control',
							'id' => 'slug',
						)); ?><em><?php echo __('tags.slug_explain'); ?></em>
					</div>
				</div>

			</fieldset>
			<?php if ($staffs) : ?>

			<hr>

			<div class="panel panel-default">
				<!-- Default panel contents -->
				<div class="panel-heading"><?php echo __('tags.staff_under'); ?></div>

				<!-- List group -->
				<div class="list-group">
					<?php foreach ($staffs as $staff) : ?>
						<a href="<?php echo Uri::to('admin/staffs/edit/' . $staff->id); ?>" class="list-group-item"><?php echo $staff->display_name; ?></a>
				<?php endforeach; ?>
				</div>
			</div>
			<?php endif; ?>

		</div>
		<div class="col-md-3">

		<?php echo Form::button(__('global.update'), array(
			'class' => 'btn btn-primary btn-lg btn-block',
			'type' => 'submit'
			)); ?>

		<?php echo Html::link('admin/tags/delete/' . $tag->id,
			__('global.delete'), array(
				'class' => 'btn btn-warning btn-lg btn-block delete'
				)); ?>


		</div>
	</form>

<?php echo $footer; ?>
