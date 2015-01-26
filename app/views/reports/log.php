<?php echo $header; ?>

<h1 class="page-header"><?php echo __('reports.log'); ?></h1>

<?php echo $messages; ?>

<div class="row">
	<div class="col-lg-12">
		<?php //print_r($logs); ?>
		<form class="form-horizontal" role="search">

		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th><?php echo __('reports.log_when'); ?></th>
						<th><?php echo __('reports.log_who'); ?></th>
						<th><?php echo __('reports.log_ip'); ?></th>
						<th><?php echo __('reports.log_method'); ?></th>
						<th><?php echo __('reports.log_what'); ?></th>
					</tr>
				</thead>
				<tbody>
				<?php if($logs->count): ?>
					<?php foreach($logs->results as $log): ?>
					<tr class="status draft">
						<td><?php echo Date::format($log->when, 'D, d M Y H:i:s'); ?></td>
						<td><?php echo $log->name; ?></td>
						<td><?php echo $log->ip; ?></td>
						<td><?php echo $log->method; ?></td>
						<td><?php echo $log->what; ?></td>
					</tr>
				<?php endforeach; ?>
				<?php else: ?>
                <tr>
                  <td colspan="7"><?php echo __('reports.no_reports'); ?></td>
                </tr>
				<?php endif; ?>
			</tbody>
		</table>

		<?php if ($logs->links()) : ?>
		<ul class="pagination">
			<?php echo $logs->links(); ?>
		</ul>
		<?php endif; ?>

		</div>

		</form>
	</div>

</div>

<?php echo $footer; ?>
