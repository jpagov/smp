<?php echo $header; ?>

<?php echo Html::link('admin/users/add', __('users.create_user'), array('class' => 'btn btn-lg btn-primary pull-right')); ?>

<h1 class="page-header"><?php echo __('users.users'); ?></h1>

<?php echo $messages; ?>

<div class="row">
	<div class="col col-lg-9">

		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>ID</th>
            <th><?php echo __('staffs.name'); ?></th>
            <th><?php echo __('staffs.role'); ?></th>
            <th><?php echo __('staffs.division'); ?></th>
            <th><?php echo __('staffs.status'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($users->results as $user): ?>
					<tr class="status draft">
						<td><?php echo $user->id; ?></td>
						<td><a href="<?php echo Uri::to('admin/staffs/edit/' . $user->id . '#admin'); ?>" title=""><?php echo $user->display_name; ?></a></td>
						<td><?php echo __('users.' . $user->role); ?></td>
            <td><?php foreach($user->roles as $role): echo '<code>' . $role . '</code><br>'; endforeach; ?></td>
						<td><abbr title="<?php echo Date::format($user->created); ?>"><?php echo __('global.' . $user->status); ?></abbr></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

	</div>

	<div class="col col-lg-3">

		<nav class="list-group sidebar">

		<?php echo Html::link('admin/users', '<span class="icon"></span> ' . __('global.all'), array(
			'class' => ($status == 'all') ? 'list-group-item active' : 'list-group-item'
		)); ?>

		<?php
		foreach(array('active', 'inactive') as $type):

			$status_count = Query::table(Base::table('staffs'))->where('status', '=', $type)->count();
		?>
			<?php echo Html::link('admin/users/status/' . $type, '<span class="icon"></span> ' . __('global.' . $type), array(
				'class' => ($status == $type) ? 'list-group-item active' : 'list-group-item',
				'badge' => $status_count
			)); ?>
			<?php endforeach; ?>
		</nav>

	</div>


	</div>

<?php echo $footer; ?>
