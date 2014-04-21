<?php echo $header; ?>

<?php echo Html::link('admin/staffs', __('global.back'), array('class' => 'btn btn-lg btn-primary pull-right')); ?>

<h1 class="page-header"><?php echo __('staff.editing_staff', $staff->given_name); ?></h1>

<div class="row">

  <form class="form-horizontal" method="post" action="<?php echo Uri::to('admin/staffs/edit/' . $staff->id); ?>" novalidate autocomplete="off" enctype="multipart/form-data" role="form">
    <div class="col-lg-9">

      <input name="token" type="hidden" value="<?php echo $token; ?>">

      <!-- tabs right -->
      <div class="tabbable tabs-right">

        <ul class="nav nav-tabs">
          <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
          <li><a href="#position" data-toggle="tab">Position</a></li>
          <li><a href="#auth" data-toggle="tab">Authentication</a></li>
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
                <label class="col-sm-2 control-label" for="given_name"><?php echo __('staff.given_name'); ?></label>
                <div class="col-sm-10">
                  <?php echo Form::text('given_name', Input::previous('given_name', $staff->given_name), array('class' => 'form-control', 'id' => 'given_name',
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

            </fieldset>
          </div>

          <div class="tab-pane" id="position">
            <fieldset>
              <legend>Position</legend>
            </fieldset>
          </div>

          <div class="tab-pane" id="auth">
            <fieldset>
              <legend>Authentication</legend>
            </fieldset>
          </div>

        </div>
      </div><!-- /tabs -->

    </div><!-- /col-lg-9 -->
    <div class="col-lg-3"><button type="button" class="btn btn-primary btn-lg btn-block">Block level button</button> <button type="button" class="btn btn-primary btn-lg btn-block">Block level button</button></div>
  </form>
</div>



<section class="wrap">
  <?php echo $messages; ?>

  <form method="post" action="<?php echo Uri::to('admin/staffs/edit/' . $staff->id); ?>" novalidate autocomplete="off">

    <input name="token" type="hidden" value="<?php echo $token; ?>">

    <fieldset class="half split">
      <p>
        <label><?php echo __('staff.given_name'); ?>:</label>
        <?php echo Form::text('given_name', Input::previous('given_name', $staff->given_name)); ?>
        <em><?php echo __('staff.given_name_explain'); ?></em>
      </p>
      <p>
        <label><?php echo __('staff.bio'); ?>:</label>
        <?php echo Form::textarea('bio', Input::previous('bio', $staff->bio), array('cols' => 20)); ?>
        <em><?php echo __('staff.bio_explain'); ?></em>
      </p>
      <p>
        <label><?php echo __('staff.status'); ?>:</label>
        <?php echo Form::select('status', $statuses, Input::previous('status', $staff->status)); ?>
        <em><?php echo __('staff.status_explain'); ?></em>
      </p>
      <p>
        <label><?php echo __('staff.role'); ?>:</label>
        <?php echo Form::select('role', $roles, Input::previous('role', $staff->role)); ?>
        <em><?php echo __('staff.role_explain'); ?></em>
      </p>
    </fieldset>

    <fieldset class="half split">
      <p>
        <label><?php echo __('staff.username'); ?>:</label>
        <?php echo Form::text('username', Input::previous('username', $staff->username)); ?>
        <em><?php echo __('staff.role_explain'); ?></em>
      </p>
      <p>
        <label><?php echo __('staff.password'); ?>:</label>
        <?php echo Form::password('password'); ?>
        <em><?php echo __('staff.password_explain'); ?></em>
      </p>
      <p>
        <label><?php echo __('staff.email'); ?>:</label>
        <?php echo Form::text('email', Input::previous('email', $staff->email)); ?>
        <em><?php echo __('staff.email_explain'); ?></em>
      </p>
    </fieldset>

    <aside class="buttons">
      <?php echo Form::button(__('global.update'), array(
        'class' => 'btn',
        'type' => 'submit'
        )); ?>

        <?php echo Html::link('admin/staffs/delete/' . $staff->id, __('global.delete'), array('class' => 'btn delete red')); ?>
      </aside>
    </form>

  </section>

  <?php echo $footer; ?>
