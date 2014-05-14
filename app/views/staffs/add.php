<?php echo $header; ?>

<?php echo Html::link('admin/staffs', __('global.back'), array('class' => 'btn btn-lg btn-default pull-right')); ?>

<h1 class="page-header"><?php echo __('staffs.add_staff'); ?></h1>

<?php echo $messages; ?>

<div class="row">

  <form class="form-horizontal" method="post" action="<?php echo Uri::to('admin/staffs/add'); ?>" novalidate autocomplete="off" enctype="multipart/form-data" role="form">
    <div class="col-lg-9">

      <input name="token" type="hidden" value="<?php echo $token; ?>">

      <!-- tabs -->
      <div class="tabbable tabs-right">

        <ul class="nav nav-tabs">
          <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
          <li><a href="#positions" data-toggle="tab">Position</a></li>
          <?php if($fields): ?>
          <li><a href="#extend" data-toggle="tab">Extend</a></li>
          <?php endif; ?>
          <?php if(Auth::user()->role == 'administrator'): ?>
          <li><a href="#admin" data-toggle="tab">Administration</a></li>
          <?php endif; ?>
        </ul>

        <div class="tab-content">

          <div class="tab-pane active" id="profile">
            <fieldset>
              <legend>Profile</legend>

              <div class="row">

                <div class="col-md-3 col-md-push-9">
                  <div class="form-group">

                    <label class="control-label" for="extend_avatar">
                      <img src="<?php echo avatar('default-male.jpg'); ?>" class="img-responsive img-thumbnail pull-left"></label>
                      <input class="sr-only" id="extend_avatar" name="extend[avatar]" type="file">
                    <span class="help-block"><?php echo __('staffs.avatar_explain'); ?></span>
                    </div>
                  </div> <!-- /col-md-3 -->

                  <div class="col-sm-offset-1 col-md-8 col-md-pull-3">

                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="salutation"><?php echo __('staffs.salutation'); ?></label>
                      <div class="col-sm-6">
                        <?php echo Form::text('salutation', Input::previous('salutation'), array('class' => 'form-control', 'id' => 'salutation',
                        )); ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="first_name"><?php echo __('staffs.first_name'); ?></label>
                      <div class="col-sm-6">
                        <?php echo Form::text('first_name', Input::previous('first_name'), array('class' => 'form-control', 'id' => 'first_name')); ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="last_name"><?php echo __('staffs.last_name'); ?></label>
                      <div class="col-sm-6">
                        <?php echo Form::text('last_name', Input::previous('last_name'), array('class' => 'form-control', 'id' => 'last_name')); ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="display_name"><?php echo __('staffs.display_name'); ?></label>
                      <div class="col-sm-9">
                        <?php echo Form::text('display_name', Input::previous('display_name'), array('class' => 'form-control', 'id' => 'display_name',
                        )); ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="email"><?php echo __('staffs.email'); ?></label>
                      <div class="col-sm-9">
                        <?php echo Form::email('email', Input::previous('email'), array('class' => 'form-control', 'id' => 'email')); ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="telephone"><?php echo __('staffs.telephone'); ?></label>
                      <div class="col-sm-9">
                        <?php echo Form::telephone('telephone', Input::previous('telephone'), array('class' => 'form-control', 'id' => 'telephone')); ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="gender"><?php echo __('staffs.gender'); ?></label>
                      <div class="col-sm-4">
                        <?php echo Form::select('gender', $genders, Input::previous('gender'), array('class' => 'form-control', 'id' => 'gender',
                        )); ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="status"><?php echo __('staffs.status'); ?></label>
                      <div class="col-sm-4">
                        <?php echo Form::select('status', $statuses, Input::previous('status'), array('class' => 'form-control', 'id' => 'status',
                        )); ?>
                      </div>
                    </div>
                  </div> <!-- /col-sm-offset-1 col-md-8 -->

                </div>

            </fieldset>
          </div>

          <div class="tab-pane" id="positions">
            <fieldset>
              <legend>Position</legend>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="scheme"><?php echo __('staffs.scheme'); ?></label>
                <div class="col-sm-4">
                  <?php echo Form::select('scheme', $schemes, Input::previous('scheme'), array('class' => 'form-control', 'id' => 'scheme',
                  )); ?>
                </div>

                <label class="col-sm-2 control-label" for="grade"><?php echo __('staffs.grade'); ?></label>
                <div class="col-sm-4">
                  <?php echo Form::text('grade', Input::previous('grade'), array('class' => 'form-control', 'id' => 'grade',
                  )); ?>
                </div>

              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="job_title"><?php echo __('staffs.job_title'); ?></label>
                <div class="col-sm-10">
                  <?php echo Form::text('job_title', Input::previous('job_title'), array('class' => 'form-control', 'id' => 'job_title',
                  )); ?>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="position"><?php echo __('staffs.position'); ?></label>
                <div class="col-sm-4">
                  <?php echo Form::text('position', Input::previous('position'), array('class' => 'form-control', 'id' => 'position',
                  )); ?>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="description"><?php echo __('staffs.description'); ?></label>
                <div class="col-sm-10">
                  <?php echo Form::textarea('description', Input::previous('description'), array(
                        'rows' => 3,
                        'class' => 'form-control',
                        'id' => 'description'
                    )); ?>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="division"><?php echo __('staffs.division'); ?></label>
                <div class="col-sm-6">
                  <?php echo Form::select('division', $divisions, Input::previous('division'), array('class' => 'form-control', 'id' => 'division',
                  )); ?>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="branch"><?php echo __('staffs.branch'); ?></label>
                <div class="col-sm-8 branch-prefetch">
                  <?php echo Form::text('branch', Input::previous('branch'), array('class' => 'form-control typeahead col-sm-12', 'id' => 'branch')); ?>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="sector"><?php echo __('staffs.sector'); ?></label>
                <div class="col-sm-8 sector-prefetch">
                  <?php echo Form::text('sector', Input::previous('sector'), array('class' => 'form-control typeahead', 'id' => 'sector')); ?>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="unit"><?php echo __('staffs.unit'); ?></label>
                <div class="col-sm-8 unit-prefetch">
                  <?php echo Form::text('unit', Input::previous('unit'), array('class' => 'form-control typeahead', 'id' => 'unit')); ?>
                </div>
              </div>

            </fieldset>
          </div>

          <?php if($fields): ?>
          <div class="tab-pane" id="extend">

            <fieldset>

            <?php foreach($fields as $field): ?>
             <div class="form-group">
              <label class="col-lg-2 control-label" for="extend_<?php echo $field->key; ?>"><?php echo $field->label; ?></label>
              <div class="col-lg-6">
                <?php echo Extend::html($field); ?>
              </div>
            </div>
            <?php endforeach; ?>

            </fieldset>

          </div>
          <?php endif; ?>

          <?php if(Auth::user()->role == 'administrator'): ?>
          <div class="tab-pane" id="admin">

             <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                  <label>
                    <?php echo Form::checkbox('account', 1, Input::previous('account'), array('id' => 'account')); ?> Enable account
                  </label>
                </div>
                <span class="help-block"><?php echo __('staffs.account_explain'); ?></span>
              </div>
            </div>

            <fieldset disabled id="accountAuth">
              <legend>Administration</legend>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="username"><?php echo __('staffs.username'); ?></label>
                <div class="col-sm-6">
                  <?php echo Form::text('username', Input::previous('username'), array('class' => 'form-control', 'id' => 'username',
                  )); ?>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="password"><?php echo __('staffs.password'); ?></label>
                <div class="col-sm-6">
                  <?php echo Form::password('password', array('class' => 'form-control', 'id' => 'password',
                  )); ?>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="role"><?php echo __('staffs.role'); ?></label>
                <div class="col-sm-4">
                  <?php echo Form::select('role', $roles, Input::previous('role', 'staff'), array('class' => 'form-control', 'id' => 'role',
                  )); ?>
                </div>
              </div>

              <div class="form-group">
              <?php if ($divisions) : ?>
              <?php foreach($divisions as $key => $division): ?>
              <?php if ($key !== 0) : ?>

                <?php if (($key-1) % 2 == 0) : ?><div class="col-sm-offset-2 col-sm-4"><?php endif; ?>

                  <div class="checkbox" id="division-role">
                    <label for="division-role-<?php echo $key; ?>">
                    <?php echo Form::checkbox('roles[]', $key, false, array('id' => 'division-role-' . $key)); ?> <?php echo $division; ?>
                    </label>
                  </div>

                <?php if (($key-1) % 2 == 1) : ?></div><?php endif; ?>

              <?php endif; ?>
              <?php endforeach; ?>
              <?php endif; ?>
              </div>

            </fieldset>
          </div>
          <?php endif; ?>

        </div><!-- /tab-content -->
      </div><!-- /tabs -->

    </div><!-- /col-lg-9 -->
    <div class="col-lg-3">

      <?php echo Form::button(__('global.create'), array(
        'class' => 'btn btn-primary btn-lg btn-block',
        'type' => 'submit'
      )); ?>

    </div>
  </form>
</div>

<?php echo $footer; ?>
