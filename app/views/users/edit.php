<?php echo $header; ?>

<?php echo Html::link('admin/staffs', __('global.back'), array('class' => 'btn btn-lg btn-default pull-right')); ?>

<h1 class="page-header"><?php echo __('users.editing_user', $user->display_name); ?></h1>

<?php echo $messages; ?>

<div class="row">
  <div class="col-md-9">
    <form class="form-horizontal" method="post" action="<?php echo Uri::to('admin/users/edit/' . $user->id); ?>" enctype="multipart/form-data" role="form">


      <input name="token" type="hidden" value="<?php echo $token; ?>">

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('account', 1, Input::previous('account', $user->account), array('id' => 'account')); ?> <?php echo __('staff.enable_account'); ?>
            </label>
          </div>
          <span class="help-block"><?php echo __('staff.account_explain'); ?></span>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label" for="display_name"><?php echo __('staff.display_name'); ?></label>
        <div class="col-sm-6">
          <?php echo Form::text('display_name', Input::previous('display_name', $user->display_name), array('class' => 'form-control', 'id' => 'display_name',
          )); ?>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label" for="username"><?php echo __('staff.username'); ?></label>
        <div class="col-sm-6">
          <?php echo Form::text('username', Input::previous('username', $user->username), array('class' => 'form-control', 'id' => 'username',
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
        <label class="col-sm-2 control-label" for="email"><?php echo __('staff.email'); ?></label>
        <div class="col-sm-6">
          <?php echo Form::email('email', Input::previous('email', $user->email), array('class' => 'form-control', 'id' => 'email')); ?>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label" for="role"><?php echo __('staff.role'); ?></label>
        <div class="col-sm-4">
          <?php $role = ($user->role) ? $user->role : 'staff'; ?>
          <?php echo Form::select('role', $roles, Input::previous('role', $role), array('class' => 'form-control', 'id' => 'role',
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
                  <?php $checked = (in_array($key, $division_roles)) ? true : false; ?>
                  <?php echo Form::checkbox('roles[]', $key, $checked, array('id' => 'division-role-' . $key)); ?> <?php echo $division; ?>
                </label>
              </div>

              <?php if (($key-1) % 2 == 1) : ?></div><?php endif; ?>

            <?php endif; ?>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">

          <?php echo Form::button(__('global.update'), array('class' => 'btn btn-primary', 'type' => 'submit')); ?>

          <?php echo Html::link('admin/staffs/delete/' . $user->id, __('global.delete'), array('class' => 'btn btn-warning delete')); ?>

        </div>
      </div>

    </form>
  </div> <!-- /.col-md-9 -->

  <div class="col-md-3">

  <div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Panel heading</div>
    <div class="panel-body">
      <p>...</p>
    </div>

    <!-- List group -->
    <ul class="list-group">
      <li class="list-group-item">Cras justo odio</li>
      <li class="list-group-item">Dapibus ac facilisis in</li>
      <li class="list-group-item">Morbi leo risus</li>
      <li class="list-group-item">Porta ac consectetur ac</li>
      <li class="list-group-item">Vestibulum at eros</li>
    </ul>
  </div>

  </div>
</div>

<?php echo $footer; ?>
