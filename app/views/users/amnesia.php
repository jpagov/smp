<?php echo $header; ?>

<div class="text-center"><a href="/">
  <img src="<?php echo asset('app/views/assets/img/jata-jpa.png'); ?>" alt="<?php echo Config::meta('sitename'); ?>"></a>
</div>

<form class="form-signin" method="post" action="<?php echo Uri::to('admin/amnesia'); ?>">

  <input name="token" type="hidden" value="<?php echo $token; ?>">

	<?php echo $messages; ?>

  <h2 class="form-signin-heading">Enter email</h2>

  <?php echo Form::email('email', Input::previous('email'), array(
    'class' => 'form-control',
    'id' => 'email',
    'autofocus' => 'true',
    'placeholder' => __('users.email')
  )); ?>

  <p class="buttons"><a href="<?php echo Uri::to('admin/login'); ?>"><?php echo __('users.remembered'); ?></a></p>

  <?php echo Form::button(__('global.reset'), array(
    'class' => 'btn btn-primary btn-block',
    'type' => 'submit')
  ); ?>

</form>

<?php echo $footer; ?>
