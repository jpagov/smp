<?php echo $header; ?>

<?php echo Html::link('admin/staffs', __('global.back'), array('class' => 'btn btn-lg btn-default pull-right')); ?>

<h1 class="page-header"><?php echo __('staff.editing_staff', $staff->display_name); ?></h1>

<?php echo $messages; ?>

<div class="row">

  <form class="form-horizontal" method="post" action="<?php echo Uri::to('admin/staffs/edit/' . $staff->id); ?>" novalidate autocomplete="off" enctype="multipart/form-data" role="form">
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

              <div class="form-group">
                <label class="col-sm-2 control-label" for="salutation"><?php echo __('staff.salutation'); ?></label>
                <div class="col-sm-4">
                  <?php echo Form::text('salutation', Input::previous('salutation', $staff->salutation), array('class' => 'form-control', 'id' => 'salutation',
                  )); ?>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="first_name"><?php echo __('staff.first_name'); ?></label>
                <div class="col-sm-4">
                  <?php echo Form::text('first_name', Input::previous('first_name', $staff->first_name), array('class' => 'form-control', 'id' => 'first_name')); ?>
                </div>

                <label class="col-sm-2 control-label" for="last_name"><?php echo __('staff.last_name'); ?></label>
                <div class="col-sm-4">
                  <?php echo Form::text('last_name', Input::previous('last_name', $staff->last_name), array('class' => 'form-control', 'id' => 'last_name')); ?>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="display_name"><?php echo __('staff.display_name'); ?></label>
                <div class="col-sm-10">
                  <?php echo Form::text('display_name', Input::previous('display_name', $staff->display_name), array('class' => 'form-control', 'id' => 'display_name',
                  )); ?>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="email"><?php echo __('staff.email'); ?></label>
                <div class="col-sm-4">
                  <?php echo Form::email('email', Input::previous('email', $staff->email), array('class' => 'form-control', 'id' => 'email')); ?>
                </div>

                <label class="col-sm-2 control-label" for="telephone"><?php echo __('staff.telephone'); ?></label>
                <div class="col-sm-4">
                  <?php echo Form::telephone('telephone', Input::previous('telephone', $staff->telephone), array('class' => 'form-control', 'id' => 'telephone')); ?>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="gender"><?php echo __('staff.gender'); ?></label>
                <div class="col-sm-2">
                  <?php echo Form::select('gender', $genders, Input::previous('gender', $staff->gender), array('class' => 'form-control', 'id' => 'gender',
                  )); ?>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="status"><?php echo __('staff.status'); ?></label>
                <div class="col-sm-4">
                  <?php echo Form::select('status', $statuses, Input::previous('status', $staff->status), array('class' => 'form-control', 'id' => 'status',
                  )); ?>
                </div>
              </div>

            </fieldset>
          </div>

          <div class="tab-pane" id="positions">
            <fieldset>
              <legend>Position</legend>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="scheme"><?php echo __('staff.scheme'); ?></label>
                <div class="col-sm-4">
                  <?php echo Form::select('scheme', $schemes, Input::previous('scheme', $staff->scheme), array('class' => 'form-control', 'id' => 'scheme',
                  )); ?>
                </div>

                <label class="col-sm-2 control-label" for="grade"><?php echo __('staff.grade'); ?></label>
                <div class="col-sm-4">
                  <?php echo Form::text('grade', Input::previous('grade', $staff->grade), array('class' => 'form-control', 'id' => 'grade',
                  )); ?>
                </div>

              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="job_title"><?php echo __('staff.job_title'); ?></label>
                <div class="col-sm-10">
                  <?php echo Form::text('job_title', Input::previous('job_title', $staff->job_title), array('class' => 'form-control', 'id' => 'job_title',
                  )); ?>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="position"><?php echo __('staff.position'); ?></label>
                <div class="col-sm-4">
                  <?php echo Form::text('position', Input::previous('position', $staff->position), array('class' => 'form-control', 'id' => 'position',
                  )); ?>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="description"><?php echo __('staff.description'); ?></label>
                <div class="col-sm-10">
                  <?php echo Form::textarea('description', Input::previous('description', $staff->description), array(
                        'rows' => 3,
                        'class' => 'form-control',
                        'id' => 'description'
                    )); ?>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="division"><?php echo __('staff.division'); ?></label>
                <div class="col-sm-6">
                  <?php echo Form::select('division', $divisions, Input::previous('division', $staff->division), array('class' => 'form-control', 'id' => 'division',
                  )); ?>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="branch"><?php echo __('staff.branch'); ?></label>
                <div class="col-sm-10">
                  <?php echo Form::select('branch', $branchs, Input::previous('branch', $staff->branch), array('class' => 'form-control', 'id' => 'branch',
                  )); ?>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="sector"><?php echo __('staff.sector'); ?></label>
                <div class="col-sm-6">
                  <?php echo Form::select('sector', $sectors, Input::previous('sector', $staff->sector), array('class' => 'form-control', 'id' => 'sector',
                  )); ?>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="unit"><?php echo __('staff.unit'); ?></label>
                <div class="col-sm-6">
                  <?php echo Form::select('unit', $units, Input::previous('unit', $staff->unit), array('class' => 'form-control', 'id' => 'unit',
                  )); ?>
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
                    <?php echo Form::checkbox('account', 1, Input::previous('account', $staff->account)); ?> Enable account
                  </label>
                </div>
                <span class="help-block"><?php echo __('staff.account_explain'); ?></span>
              </div>
            </div>

            <fieldset<?php echo (!$staff->account) ? ' disabled' : ''; ?>>
              <legend>Administration</legend>


              <div class="form-group">
                <label class="col-sm-2 control-label" for="username"><?php echo __('staff.username'); ?></label>
                <div class="col-sm-6">
                  <?php echo Form::text('username', Input::previous('username', $staff->username), array('class' => 'form-control', 'id' => 'username',
                  )); ?>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="password"><?php echo __('staff.password'); ?></label>
                <div class="col-sm-6">
                  <?php echo Form::password('password', array('class' => 'form-control', 'id' => 'password',
                  )); ?>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="role"><?php echo __('staff.role'); ?></label>
                <div class="col-sm-4">
                  <?php $role = ($staff->role) ? $staff->role : 'staff'; ?>
                  <?php echo Form::select('role', $roles, Input::previous('role', $role), array('class' => 'form-control', 'id' => 'role',
                  )); ?>
                </div>
              </div>

              <div class="form-group">
              <?php if ($divisions) : ?>
              <?php foreach($divisions as $key => $division): ?>
              <?php if ($key !== 0) : ?>

                <?php if (($key-1) % 2 == 0) : ?><div class="col-sm-offset-2 col-sm-4"><?php endif; ?>

                  <div class="checkbox">
                    <label for="division_role_<?php echo $key; ?>">
                    <?php $checked = (in_array($key, $division_roles)) ? true : false; ?>
                    <?php echo Form::checkbox('roles[]', $key, $checked, array('id' => 'division_role_' . $key)); ?> <?php echo $division; ?>
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

      <?php echo Form::button(__('global.update'), array(
        'class' => 'btn btn-primary btn-lg btn-block',
        'type' => 'submit'
      )); ?>

      <?php echo Html::link('admin/staffs/delete/' . $staff->id,
        __('global.delete'), array(
          'class' => 'btn btn-warning btn-lg btn-block delete'
        )); ?>

    </div>
  </form>
</div>

<?php echo $footer; ?>
