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
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th>Role</th>
						<th>Status</th>
						<th>Credit</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($users->results as $user): ?>
					<tr class="status draft">
						<td>1</td>
						<td><a href="<?php echo Uri::to('admin/users/edit/' . $user->id); ?>" title=""><?php echo $user->real_name; ?></a></td>
						<td><?php echo $user->email; ?></td>
						<td><?php echo __('users.' . $user->role); ?></td>
						<td><abbr title="<?php echo Date::format($user->created); ?>"><?php echo __('global.' . $user->status); ?></abbr></td>
						<td><?php echo $user->credit; ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

	</div>

<section class="wrap">
	<?php echo $messages; ?>

	<ul class="list">
		<?php foreach($users->results as $user): ?>
		<li>
			<a href="<?php echo Uri::to('admin/users/edit/' . $user->id); ?>">
				<strong><?php echo $user->real_name; ?></strong>
				<span><?php echo __('users.username'); ?>: <?php echo $user->username; ?></span>

				<em class="highlight"><?php echo __('users.' . $user->role); ?></em>
			</a>
		</li>
		<?php endforeach; ?>
	</ul>

	<aside class="paging"><?php echo $users->links(); ?></aside>
</section>

<?php echo $footer; ?>