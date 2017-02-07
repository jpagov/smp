<?php echo $header; ?>

<?php echo Html::link('admin/setting/variables', __('global.back'), array('class' => 'btn btn-lg btn-primary pull-right')); ?>

<h1 class="page-header"><?php echo __('extend.editing_variable', $variable->user_key); ?></h1>

<?php echo $messages; ?>

<div class="row">

	<form class="form-horizontal" method="post" action="<?php echo Uri::to('admin/setting/variables/edit/'. $variable->key); ?>" novalidate>

		<div class="col-md-9">

		<input name="token" type="hidden" value="<?php echo $token; ?>">

		<fieldset class="split">

			<div class="form-group">
                <label class="col-sm-2 control-label" for="key"><?php echo __('extend.name'); ?></label>
                <div class="col-sm-6">
                <?php echo Form::text('key', Input::previous('key', $variable->user_key), array(
                    'class' => 'form-control',
                    'id' => 'key',
                )); ?>
                <em class="help-block"><?php echo __('extend.name_explain'); ?></em>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="value"><?php echo __('extend.value'); ?></label>
                <div class="col-sm-6">
                <?php echo Form::textarea('value', Input::previous('value', $variable->value), array(
                	'cols' => 20,
                    'class' => 'form-control',
                    'id' => 'value',
                )); ?>
                <em class="help-block"><?php echo __('extend.value_explain'); ?></em>
                </div>
            </div>


		</fieldset>

		</div><!-- /col-md-9 -->
		<aside class="col-md-3">

			<?php echo Form::button(__('global.update'), array(
				'class' => 'btn btn-primary btn-lg btn-block',
				'type' => 'submit'
				)); ?>

			<?php echo Html::link('admin/staffs/delete/' . $variable->key,
			__('global.delete'), array(
				'class' => 'btn btn-warning btn-lg btn-block delete'
				)); ?>

		</aside>


		</div>
	</form>


</div>

<?php echo $footer; ?>
