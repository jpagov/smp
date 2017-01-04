<?php echo $header; ?>

<?php echo Html::link('admin/setting/variables/add', __('extend.create_variable'), array('class' => 'btn btn-lg btn-primary pull-right')); ?>

<h1 class="page-header"><?php echo __('extend.variables'); ?></h1>

<?php echo $messages; ?>

<div class="row">
  <div class="col col-lg-9">

	<section class="wrap">

		<?php if(count($variables)): ?>

		<dl class="dl-horizontal">
			<?php foreach($variables as $var): ?>
			<dt><a href="<?php echo Uri::to('admin/setting/variables/edit/' . $var->key); ?>"><strong><?php echo substr($var->key, strlen('custom_')); ?></strong></a></dt>
			<dd>
				<pre><?php echo e($var->value); ?></pre>
			</dd>
			<?php endforeach; ?>
		</dl>
		<?php else: ?>
		<p class="empty">
			<span class="icon"></span> <?php echo __('extend.novars_desc'); ?>
		</p>
		<?php endif; ?>
	</section>

	</div>
</div>

<?php echo $footer; ?>
