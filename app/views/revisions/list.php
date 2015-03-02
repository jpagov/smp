<?php echo $header; ?>

<h1 class="page-header"><?php echo __('revision.revision'); ?></h1>

<?php echo $messages; ?>

<div class="row">

	<div class="col col-lg-9">

		<form class="form-horizontal" role="search">

		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th><?php echo __('staffs.name'); ?></th>
						<th><?php echo __('staffs.email'); ?></th>
						<!--th><?php echo __('staffs.role'); ?></th-->
						<th><?php echo __('staffs.telephone'); ?></th>
						<th><?php echo __('staffs.status'); ?></th>
						<th><?php echo __('revision.revision'); ?></th>
						<th><?php echo __('revision.restore'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($revisions->results as $revision): ?>
						<tr class="status draft">
							<td><?php echo $revision->staff_id; ?></td>
							<td><a href="<?php echo Uri::to('admin/revisions/edit/' . $revision->staff_id); ?>" title=""><?php echo $revision->display_name; ?></a></td>
							<td><?php echo $revision->email; ?></td>
							<td><?php echo $revision->telephone; ?></td>
							<td><abbr title="<?php echo Date::format($revision->created); ?>"><?php echo __('global.' . $revision->status); ?></abbr></td>
							<td><?php echo $revision->revision_date; ?></td>
							<td><?php echo Html::link('admin/revisions/restore/' . $revision->id, __('revision.restore'), array('class' => 'btn btn-xs btn-primary pull-right')); ?></td>



							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>

				<?php if ($revisions->links()) : ?>
					<ul class="pagination">
						<?php echo $revisions->links(); ?>
					</ul>
				<?php endif; ?>

			</div>
		</div>

		<div class="col col-lg-3">

			<nav class="sidebar">

			<div class="panel panel-default">
				<div class="panel-heading">
				<h3 class="panel-title">Panel title</h3>
				</div>
				<div class="panel-body">
				Panel content
				</div>
			</div>



						</nav>

					</div>

					</form>
				</div>

				<?php echo $footer; ?>
