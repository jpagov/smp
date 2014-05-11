<?php echo $header; ?>

<?php echo Html::link('admin/setting', __('global.back'), array('class' => 'btn btn-lg btn-primary pull-right')); ?>

<h1 class="page-header"><?php echo __('metadata.metadata'); ?></h1>

<?php echo $messages; ?>

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
                    <label class="col-sm-3 control-label" for="homepage"><?php echo __('metadata.homepage'); ?></label>
                    <div class="col-sm-6">
                    <?php echo Form::select('homepage', $pages, Input::previous('homepage', $meta['home_page']), array('class' => 'form-control', 'id' => 'homepage',
                    )); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="postspage"><?php echo __('metadata.postspage'); ?></label>
                    <div class="col-sm-6">
                    <?php echo Form::select('postspage', $pages, Input::previous('postspage', $meta['posts_page']), array('class' => 'form-control', 'id' => 'postspage',
                    )); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="posts_per_page"><?php echo __('metadata.posts_per_page'); ?></label>
                    <div class="col-sm-6">
                    <div class="input-group">
                    <?php echo Form::input('range', 'posts_per_page', Input::previous('posts_per_page', $meta['posts_per_page']), array('class' => 'form-control',
                        'min' => 1,
                        'max' => 15,
                        'id' => 'posts_per_page',
                        'onchange' => 'ppp.value=value'
                    )); ?>
                    <output class="input-group-addon" id="ppp"><?php echo Input::previous('posts_per_page', $meta['posts_per_page']); ?></output>
                    </div>
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
                    <div class="col-sm-9">
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
