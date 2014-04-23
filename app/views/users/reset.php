<?php echo $header; ?>

<div class="text-center"><a href="/">
  <img src="<?php echo asset('app/views/assets/img/jata-jpa.png'); ?>" alt="<?php echo Config::meta('sitename'); ?>"></a>
</div>

<form class="form-signin" method="post" action="<?php echo Uri::to('admin/reset/' . $key); ?>" role="form">
  <input name="token" type="hidden" value="<?php echo $token; ?>">

  <?php echo $messages; ?>

  <h2 class="form-signin-heading">Enter new password</h2>
  <?php echo Form::password('pass', array(
    'class' => 'form-control',
    'required' => 'true',
    'id' => 'pass'
  )); ?>

  <?php echo Form::button(__('global.submit'), array(
    'class' => 'btn btn-primary btn-block',
    'type' => 'submit')
  ); ?>

</form>

<?php echo $footer; ?>
