<?php echo $header; ?>

<?php echo Html::link('admin/setting', __('global.back'), array('class' => 'btn btn-lg btn-primary pull-right')); ?>

<h1 class="page-header"><?php echo __('metadata.metadata'); ?></h1>

<?php echo $messages; ?>
<?php Session::get('lang'); ?>
<div class="row">

    <form  class="form-horizontal" method="post" action="<?php echo Uri::to('admin/setting/metadata'); ?>" novalidate>

        <input name="token" type="hidden" value="<?php echo $token; ?>">

        <section class="col-md-9">
            <fieldset>
                <legend>Site</legend>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="sitename"><?php echo __('metadata.sitename'); ?></label>
                    <div class="col-sm-6">
                    <?php echo Form::text('sitename', Input::previous('sitename', $meta['sitename']), array(
                        'class' => 'form-control',
                        'id' => 'sitename',
                    )); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="description"><?php echo __('metadata.sitedescription'); ?></label>
                    <div class="col-sm-9">
                    <?php echo Form::textarea('description', Input::previous('description', $meta['description']), array(
                        'rows' => 3,
                        'class' => 'form-control',
                        'id' => 'description'
                    )); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="home_page"><?php echo __('metadata.homepage'); ?></label>
                    <div class="col-sm-6">
                    <?php echo Form::select('home_page', $pages, Input::previous('home_page', $meta['home_page']), array('class' => 'form-control', 'id' => 'home_page',
                    )); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="staffspage"><?php echo __('metadata.staffspage'); ?></label>
                    <div class="col-sm-6">
                    <?php echo Form::select('staffs_page', $pages, Input::previous('staffs_page', $meta['staffs_page']), array('class' => 'form-control', 'id' => 'staffspage',
                    )); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="management_page"><?php echo __('metadata.management_page'); ?></label>
                    <div class="col-sm-6">
                    <?php echo Form::select('management_page', $pages, Input::previous('management_page', $meta['management_page']), array('class' => 'form-control', 'id' => 'management_page',
                    )); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="staffs_per_page"><?php echo __('metadata.staffs_per_page'); ?></label>
                    <div class="col-sm-6">
                    <div class="input-group">
                    <?php echo Form::input('range', 'staffs_per_page', Input::previous('staffs_per_page', $meta['staffs_per_page']), array('class' => 'form-control',
                        'min' => 1,
                        'max' => 15,
                        'id' => 'staffs_per_page',
                        'onchange' => 'ppp.value=value'
                    )); ?>
                    <output class="input-group-addon" id="ppp"><?php echo Input::previous('staffs_per_page', $meta['staffs_per_page']); ?></output>
                    </div>
                    </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                    <div class="checkbox">
                      <label><?php $checked = Input::previous('category', $meta['category']) ? ' checked' : ''; ?>
                        <?php echo Form::checkbox('category', 1, $checked, array(
                        'id' => 'category')); ?> <?php echo __('metadata.category'); ?>
                      </label>
                    </div>
                    <span class="help-block"><?php echo __('metadata.category_explain'); ?></span>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                    <div class="checkbox">
                      <label><?php $checked = Input::previous('show_division_meta', $meta['show_division_meta']) ? ' checked' : ''; ?>
                        <?php echo Form::checkbox('show_division_meta', 1, $checked, array(
                        'id' => 'show_division_meta')); ?> <?php echo __('metadata.show_division_meta'); ?>
                      </label>
                    </div>
                    <span class="help-block"><?php echo __('metadata.show_division_meta_explain'); ?></span>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                    <div class="checkbox">
                      <label><?php $checked = Input::previous('show_hierarchy', $meta['show_hierarchy']) ? ' checked' : ''; ?>
                        <?php echo Form::checkbox('show_hierarchy', 1, $checked, array(
                        'id' => 'show_hierarchy')); ?> <?php echo __('metadata.show_hierarchy'); ?>
                      </label>
                    </div>
                    <span class="help-block"><?php echo __('metadata.show_hierarchy_explain'); ?></span>
                  </div>
                </div>

            </fieldset>

            <fieldset>
                <legend><?php echo __('metadata.staff_settings'); ?></legend>

                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                    <div class="checkbox">
                      <label><?php $checked = Input::previous('show_message', $meta['show_message']) ? ' checked' : ''; ?>
                        <?php echo Form::checkbox('show_message', 1, $checked, array(
                        'id' => 'show_message')); ?> <?php echo __('metadata.show_message'); ?>
                      </label>
                    </div>
                    <span class="help-block"><?php echo __('metadata.show_message_explain'); ?></span>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                    <div class="checkbox">
                      <label><?php $checked = Input::previous('show_rating', $meta['show_rating']) ? ' checked' : ''; ?>
                        <?php echo Form::checkbox('show_rating', 1, $checked, array(
                        'id' => 'show_rating')); ?> <?php echo __('metadata.show_rating'); ?>
                      </label>
                    </div>
                    <span class="help-block"><?php echo __('metadata.show_rating_explain'); ?></span>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                    <div class="checkbox">
                      <label><?php $checked = Input::previous('show_direct_report', $meta['show_direct_report']) ? ' checked' : ''; ?>
                        <?php echo Form::checkbox('show_direct_report', 1, $checked, array(
                        'id' => 'show_direct_report')); ?> <?php echo __('metadata.show_direct_report'); ?>
                      </label>
                    </div>
                    <span class="help-block"><?php echo __('metadata.show_direct_report_explain'); ?></span>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                    <div class="checkbox">
                      <label><?php $checked = Input::previous('show_personal_assistant', $meta['show_personal_assistant']) ? ' checked' : ''; ?>
                        <?php echo Form::checkbox('show_personal_assistant', 1, $checked, array(
                        'id' => 'show_personal_assistant')); ?> <?php echo __('metadata.show_personal_assistant'); ?>
                      </label>
                    </div>
                    <span class="help-block"><?php echo __('metadata.show_personal_assistant_explain'); ?></span>
                  </div>
                </div>

            </fieldset>

            <fieldset>
                <legend><?php echo __('metadata.revision_settings'); ?></legend>

                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                    <div class="checkbox">
                      <label><?php $checked = Input::previous('revision', $meta['revision']) ? ' checked' : ''; ?>
                        <?php echo Form::checkbox('revision', 1, $checked, array(
                        'id' => 'revision')); ?> <?php echo __('metadata.enable_revision'); ?>
                      </label>
                    </div>
                    <span class="help-block"><?php echo __('metadata.auto_publish_comments_explain'); ?></span>
                  </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="max_revision"><?php echo __('metadata.max_revision'); ?></label>
                    <div class="col-sm-2">
                    <?php echo Form::text('max_revision', Input::previous('max_revision', $meta['max_revision']), array(
                        'class' => 'form-control',
                        'id' => 'max_revision',
                    )); ?>
                    </div>
                </div>

            </fieldset>

            <fieldset>
                <legend><?php echo __('metadata.comment_settings'); ?></legend>

                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                    <div class="checkbox">
                      <label><?php $checked = Input::previous('auto_published_comments', $meta['auto_published_comments']) ? ' checked' : ''; ?>
                        <?php echo Form::checkbox('auto_published_comments', 1, $checked, array(
                        'id' => 'auto_published_comments')); ?> <?php echo __('metadata.auto_publish_comments'); ?>
                      </label>
                    </div>
                    <span class="help-block"><?php echo __('metadata.auto_publish_comments_explain'); ?></span>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                    <div class="checkbox">
                      <label><?php $checked = Input::previous('comment_notifications', $meta['comment_notifications']) ? ' checked' : ''; ?>
                        <?php echo Form::checkbox('comment_notifications', 1, $checked, array(
                        'id' => 'comment_notifications')); ?> <?php echo __('metadata.comment_notifications'); ?>
                      </label>
                    </div>
                    <span class="help-block"><?php echo __('metadata.comment_notifications_explain'); ?></span>
                  </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="comment_moderation_keys"><?php echo __('metadata.comment_moderation_keys'); ?></label>
                    <div class="col-sm-9">
                    <?php echo Form::textarea('comment_moderation_keys', Input::previous('comment_moderation_keys', $meta['comment_moderation_keys']), array(
                        'rows' => 3,
                        'class' => 'form-control',
                        'id' => 'comment_moderation_keys'
                    )); ?>
                    </div>
                </div>

            </fieldset>
            <fieldset>
                <legend><?php echo __('metadata.theme_settings'); ?></legend>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="theme"><?php echo __('metadata.current_theme'); ?></label>
                    <div class="col-sm-6">
                    <?php echo Form::select('theme', $themes, Input::previous('theme', $meta['theme']), array('class' => 'form-control', 'id' => 'theme',
                    )); ?>
                    </div>
                </div>
            </fieldset>
        </section>
        <aside class="col-md-3">

            <?php echo Form::button(__('global.save'), array(
                'class' => 'btn btn-primary btn-lg btn-block',
                'type' => 'submit'
            )); ?>

        </aside>

    </form>

</div>

<?php echo $footer; ?>
