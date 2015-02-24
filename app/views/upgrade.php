<?php echo $header; ?>
<?php $base = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/'); ?>
		<div class="text-center">
			<img src="<?php echo $base; ?>/app/views/assets/img/jata-jpa.png" alt="Directory logo">

			<h1><?php echo __('global.good_news'); ?></h1>
			<p><?php echo __('global.new_version_available'); ?></p>

			<a class="btn btn-primary" href="<?php echo $url; ?>"><?php echo __('global.download_now'); ?></a>
			<a class="btn btn-primary" href="<?php echo $base; ?>/admin"><?php echo __('global.upgrade_later'); ?></a>
		</div>
<?php echo $footer; ?>
