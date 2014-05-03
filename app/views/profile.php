<div class="container">
  <div class="row">
    <div class="col-lg-12">
			<div class="panel panel-warning">
			  <div class="panel-heading">
			    <h3 class="panel-title"><?php echo __('global.profile'); ?></h3>
			  </div>
			  <div class="panel-body">
			    <?php foreach($profile as $row): ?>
					<pre><code><?php echo $row['sql']; ?></code></pre>
					<?php endforeach; ?>

					<p><?php echo __('global.profile_memory_usage'); ?>
					<?php echo readable_size(memory_get_peak_usage(true)); ?></p>
			  </div>
			</div>
		</div>
	</div>
</div>
