<?php echo $header; ?>

<?php echo Html::link('admin/setting/fields', __('global.back'), array('class' => 'btn btn-lg btn-primary pull-right')); ?>

<h1 class="page-header"><?php echo __('extend.editing_custom_field', $field->label); ?></h1>

<?php echo $messages; ?>

<div class="row">

    <form class="form-horizontal" method="post" action="<?php echo Uri::to('admin/setting/fields/edit/' . $field->id); ?>" novalidate>

        <div class="col-md-9">

            <input name="token" type="hidden" value="<?php echo $token; ?>">

            <div class="form-group">
                <label class="col-sm-2 control-label" for="type"><?php echo __('settings.type'); ?></label>
                <div class="col-sm-6">
                <?php echo Form::select('type', $types, Input::previous('type', $field->type), array(
                    'class' => 'form-control',
                    'id' => 'type',
                )); ?>
                <em class="help-block"><?php echo __('extend.type_explain'); ?></em>
                </div>
            </div>

            <div class="form-group">
            <label class="col-sm-2 control-label" for="field"><?php echo __('settings.field'); ?></label>
                <div class="col-sm-6">
                <?php echo Form::select('field', $fields, Input::previous('field', $field->field), array(
                    'class' => 'form-control',
                    'id' => 'field',
                )); ?>
                <em class="help-block"><?php echo __('extend.field_explain'); ?></em>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="key"><?php echo __('settings.key'); ?></label>
                <div class="col-sm-6">
                <?php echo Form::text('key', Input::previous('key', $field->key), array(
                    'class' => 'form-control',
                    'id' => 'key',
                )); ?>
                <em class="help-block"><?php echo __('extend.key_explain'); ?></em>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="label"><?php echo __('settings.label'); ?></label>
                <div class="col-sm-6">
                <?php echo Form::text('label', Input::previous('label', $field->label), array(
                    'class' => 'form-control',
                    'id' => 'label',
                )); ?>
                <em class="help-block"><?php echo __('extend.label_explain'); ?></em>
                </div>
            </div>

            <div class="form-group attributes_type hide">
                <label class="col-sm-2 control-label" for="attributes_type"><?php echo __('settings.attribute_type'); ?></label>
                <div class="col-sm-6">
                <?php $value = isset($field->attributes->type) ? $field->attributes->type : ''; ?>
                <?php echo Form::text('attributes[type]', Input::previous('attributes.type', $value), array(
                    'class' => 'form-control',
                    'id' => 'attributes_type',
                )); ?>
                <em class="help-block"><?php echo __('extend.attribute_type_explain'); ?></em>
                </div>
            </div>

            <div class="form-group attributes_width hide">
                <label class="col-sm-2 control-label" for="attributes_size_width"><?php echo __('settings.attributes_size_width'); ?></label>
                <div class="col-sm-6">
                <?php $value = isset($field->attributes->size->width) ? $field->attributes->size->width : ''; ?>
                <?php echo Form::text('attributes[size][width]', Input::previous('attributes.size.width', $value), array(
                    'class' => 'form-control',
                    'id' => 'attributes_size_width',
                )); ?>
                <em class="help-block"><?php echo __('extend.attributes_size_width_explain'); ?></em>
                </div>
            </div>

            <div class="form-group attributes_height hide">
                <label class="col-sm-2 control-label" for="attributes_size_height"><?php echo __('settings.attributes_size_height'); ?></label>
                <div class="col-sm-6">
                <?php $value = isset($field->attributes->size->height) ? $field->attributes->size->height : ''; ?>
                <?php echo Form::text('attributes[size][height]', Input::previous('attributes.size.width', $value), array(
                    'class' => 'form-control',
                    'id' => 'attributes_size_height',
                )); ?>
                <em class="help-block"><?php echo __('extend.attributes_size_height_explain'); ?></em>
                </div>
            </div>

        </div><!--/.col-md-9 -->

        <aside class="col-md-3">

            <?php echo Form::button(__('global.update'), array(
                'class' => 'btn btn-primary btn-lg btn-block',
                'type' => 'submit'
            )); ?>

            <?php echo Html::link('admin/setting/fields/delete/' . $field->id,
                __('global.delete'), array(
                'class' => 'btn btn-warning btn-lg btn-block delete'
            )); ?>


        </aside>

    </form>



</div>


<?php echo $footer; ?>
