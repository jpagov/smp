<?php echo $header; ?>




	<form class="form-signin" method="post" action="<?php echo Uri::to('admin/reset/' . $key); ?>">
		<input name="token" type="hidden" value="<?php echo $token; ?>">
		<?php echo $messages; ?>

		<h2 class="form-signin-heading"><?php echo __('users.new_password'); ?></h2>

		<fieldset>
			<p><label for="pass" class="sr-only"><?php echo __('users.new_password'); ?>:</label>

			<?php echo Form::password('pass', array(
				'id' => 'pass',
				'class' => 'form-control',
				'required' => 'true',
				'placeholder' => __('users.new_password')
			)); ?></p>

			<button class="btn btn-lg btn-primary btn-block" type="submit"><?php echo __('global.submit'); ?></button>

		</fieldset>
	</form>


<?php echo $footer; ?>
