<?php echo $header; ?>

<?php echo Html::link('admin/staffs/add', __('staff.create_staff'), array('class' => 'btn btn-lg btn-primary pull-right')); ?>

<h1 class="page-header"><?php echo __('staff.staff'); ?></h1>

<?php echo $messages; ?>

<div class="row">
	<div class="col col-lg-9">

		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th><?php echo __('staff.name'); ?></th>
						<th><?php echo __('staff.email'); ?></th>
						<!--th><?php echo __('staff.role'); ?></th-->
            <th><?php echo __('staff.telephone'); ?></th>
						<th><?php echo __('staff.status'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($staffs->results as $staff): ?>
					<tr class="status draft">
						<td>1</td>
						<td><a href="<?php echo Uri::to('admin/staffs/edit/' . $staff->id); ?>" title=""><?php echo $staff->display_name; ?></a></td>
						<td><?php echo $staff->email; ?></td>
						<td><?php echo $staff->telephone; ?></td>
						<td><abbr title="<?php echo Date::format($staff->created); ?>"><?php echo __('global.' . $staff->status); ?></abbr></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

	<div class="col col-lg-3">

		<nav class="list-group sidebar">

		<?php echo Html::link('admin/staffs', '<span class="icon"></span> ' . __('global.all'), array(
			'class' => ($status == 'all') ? 'list-group-item active' : 'list-group-item'
		)); ?>

		<?php
		foreach(array('active', 'inactive') as $type):

			$status_count = Query::table(Base::table('staffs'))->where('status', '=', $type)->count();
		?>
			<?php echo Html::link('admin/staffs/status/' . $type, '<span class="icon"></span> ' . __('global.' . $type), array(
				'class' => ($status == $type) ? 'list-group-item active' : 'list-group-item',
				'badge' => $status_count
			)); ?>
			<?php endforeach; ?>
		</nav>

	</div>


	</div>

<?php echo $footer; ?>
