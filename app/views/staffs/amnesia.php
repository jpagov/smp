<?php echo $header; ?>

	<form class="form-signin" method="post" action="<?php echo Uri::to('admin/amnesia'); ?>">

		<?php echo $messages; ?>

		<input name="token" type="hidden" value="<?php echo $token; ?>">

		<h2 class="form-signin-heading"><?php echo __('users.your_email'); ?></h2>

		<fieldset>
			<p><label for="email" class="sr-only"><?php echo __('users.email'); ?>:</label>
			<?php echo Form::email('email', Input::previous('email'), array(
				'class' => 'form-control',
				'id' => 'email',
				'autocapitalize' => 'off',
				'autofocus' => 'true',
				'placeholder' => __('users.email')
			)); ?></p>

			<p class="buttons">
			    <a href="<?php echo Uri::to('admin/login'); ?>"><?php echo __('users.remembered'); ?></a>
			</p>

			<button class="btn btn-lg btn-primary btn-block" type="submit"><?php echo __('global.reset'); ?></button>

		</fieldset>
	</form>

<?php echo $footer; ?>
