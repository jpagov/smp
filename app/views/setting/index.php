<?php echo $header; ?>

<h1 class="page-header"><?php echo __('extend.extend'); ?></h1>

<section class="wrap">
	<?php echo $messages; ?>

	<div class="list-group">

		<a href="<?php echo Uri::to('admin/setting/fields'); ?>" class="list-group-item">
			<h3 class="list-group-item-heading"><?php echo __('extend.fields'); ?></h3>
			<p class="list-group-item-text"><?php echo __('extend.fields_desc'); ?></p>
		</a>


		<a href="<?php echo Uri::to('admin/setting/variables'); ?>" class="list-group-item">
			<h3 class="list-group-item-heading"><?php echo __('extend.variables'); ?></h3>
			<p class="list-group-item-text"><?php echo __('extend.variables_desc'); ?></p>
		</a>


		<a href="<?php echo Uri::to('admin/setting/metadata'); ?>" class="list-group-item">
			<h3 class="list-group-item-heading"><?php echo __('metadata.metadata'); ?></h3>
			<p class="list-group-item-text"><?php echo __('metadata.metadata_desc'); ?></p>
		</a>


		<a href="<?php echo Uri::to('admin/setting/plugins'); ?>" class="list-group-item">
			<h3 class="list-group-item-heading">Plugins</h3>
			<p class="list-group-item-text">Coming soon, yo!</p>
		</a>

	</div>
</section>

<?php echo $footer; ?>
