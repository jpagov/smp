<?php echo $header; ?>

<?php echo Html::link('admin/staffs', __('global.back'), array('class' => 'btn btn-lg btn-default pull-right')); ?>

<h1 class="page-header"><?php echo __('reports.confirm'); ?></h1>

<?php echo $messages; ?>

<div class="row">
	<div class="col-lg-12">
		<?php //print_r($confirms); ?>
		<form class="form-horizontal" role="search">

		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th><?php echo __('reports.confirm'); ?></th>
						<th><?php echo __('reports.confirm_staff_name'); ?></th>
						<th><?php echo __('reports.confirm_email_send'); ?></th>
						<th><?php echo __('reports.confirm_date'); ?></th>
					</tr>
				</thead>
				<tbody>
				<?php if($confirms->count): ?>
					<?php foreach($confirms->results as $confirm): ?>

					<tr class="status draft">
						<td><button type="button" class="btn btn-<?php echo ($confirm->confirm_date) ? 'success' : 'danger'; ?> btn-xs"><span class="<?php echo ($confirm->confirm_date) ? 'glyphicon glyphicon-thumbs-up' : 'glyphicon glyphicon-thumbs-down'; ?>"></span></button> <?php if (!$confirm->confirm_date): ?><a href="<?php echo Uri::to('admin/confirm/resend/' . $confirm->id); ?>" class="btn btn-primary btn-xs" role="button"><span class="glyphicon glyphicon-envelope"></span> <?php echo __('reports.confirm_resend_email'); ?></a><?php endif; ?></td>
						<td><?php echo $confirm->name; ?></td>
						<td><?php echo Date::format($confirm->created, 'D, d M Y H:i:s'); ?></td>
						<td><?php echo Date::format($confirm->confirm_date, 'D, d M Y H:i:s'); ?></td>
					</tr>
				<?php endforeach; ?>
				<?php else: ?>
                <tr>
                  <td colspan="7"><?php echo __('reports.no_reports'); ?></td>
                </tr>
				<?php endif; ?>
			</tbody>
		</table>

		<?php if ($confirms->links()) : ?>
		<ul class="pagination">
			<?php echo $confirms->links(); ?>
		</ul>
		<?php endif; ?>

		</div>

		</form>
	</div>

</div>

<?php echo $footer; ?>
