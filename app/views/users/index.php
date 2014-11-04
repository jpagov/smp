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
						<td><?php echo __('staffs.' . $user->role); ?></td>
            <td><?php foreach($user->roles as $role): echo '<code>' . $role . '</code><br>'; endforeach; ?></td>
						<td><abbr title="<?php echo Date::format($user->created); ?>"><?php echo __('global.' . $user->status); ?></abbr></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

	</div>

	<div class="col col-lg-3">

		<nav class="sidebar">

			<div class="panel-group" id="accordion">
				<div class="panel panel-default">

					<div class="panel-heading">
						<h4 class="panel-title">
					        <a data-toggle="collapse" data-parent="#accordion" href="#collapseDivision" title="Filter by Division">
					          Division <span class="pull-right division-toggle glyphicon glyphicon-plus"></span>
					        </a>
					    </h4>
					</div><!--/.panel-heading -->

					<div id="collapseDivision" class="panel-collapse collapse <?php echo (count($divisions) > 3) ? '' : 'in'; ?>">
						<div class="list-group">

			        		<?php echo Html::link('admin/users', '<span class="icon"></span> ' . __('global.all'), array(
			        			'class' => (!isset($division)) ? 'list-group-item active' : 'list-group-item'
			        		)); ?>

			        		<?php
			        		foreach($divisions as $div):

			                    $division_link = 'admin/users/division/' . $div->slug;

			                    if ($status != 'all') {
			                        $division_link = 'admin/users/division/' . $div->slug . '/' .'status/' . $status;
			                    }

			                    if ($users->links() && $users->page != 1) {
			                        $division_link .= '/' . $users->page;
			                    }
			        		?>
			        			<?php echo Html::link($division_link, '<span class="icon"></span> ' . strtoupper($div->slug), array(
			        				'class' => (isset($division) && $division == $div->slug) ? 'list-group-item active' : 'list-group-item',
			        				'badge' => $div->staff
			        			)); ?>
			        			<?php endforeach; ?>
			             </div>
					</div>
				</div><!--/.panel panel-default -->

				<div class="panel panel-default">

					<div class="panel-heading">
						<h4 class="panel-title">
					        <a data-toggle="collapse" data-parent="#accordion" href="#collapseStatus" title="Filter by Status">
					          Status <span class="pull-right status-toggle glyphicon glyphicon-minus"></span>
					        </a>
					    </h4>
					</div><!--/.panel-heading -->

					<div id="collapseStatus" class="panel-collapse collapse in">
						<div class="list-group">

			                <?php

			                echo Html::link(isset($division) ? 'admin/users/division/' . $division : 'admin/users', '<span class="icon"></span> ' . __('global.all'), array(
			                    'class' => ($status == 'all') ? 'list-group-item active' : 'list-group-item'
			                )); ?>

			                <?php
			                foreach(array('active', 'inactive') as $type):

			                    $query = User::where('account', '=', 1)->where('status', '=', $type);

			                    $status_link = 'admin/users/status/' . $type;

			                    if (isset($division)) {
			                        $query = $query->where('division', '=', $division);
			                        $status_link = 'admin/users/division/' . $division . '/' .'status/' . $type;
			                    }

			                    if ($users->links() && $users->page != 1) {
			                        $status_link .= '/' . $users->page;
			                    }

			                    $status_count = $query->count();
			                ?>
			                    <?php echo Html::link($status_link, '<span class="icon"></span> ' . __('global.' . $type), array(
			                        'class' => ($status == $type) ? 'list-group-item active' : 'list-group-item',
			                        'badge' => $status_count
			                    )); ?>
			                    <?php endforeach; ?>
			             </div>
					</div>

				</div><!--/.panel panel-default -->

			</div>

		</nav>

	</div>


	</div>

<?php echo $footer; ?>
