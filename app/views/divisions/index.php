<?php echo $header; ?>

<?php echo Html::link('admin/divisions/add', __('division.create_division'), array('class' => 'btn btn-primary pull-right')); ?>

<h1 class="page-header"><?php echo __('division.division'); ?></h1>

<?php echo $messages; ?>

<div class="row">
	<div class="col-lg-9">
		<?php //print_r($divisions); ?>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th><?php echo __('division.division'); ?></th>
						<th><?php echo __('division.staff'); ?></th>
						<th><?php echo __('division.view'); ?></th>
					</tr>
				</thead>
				<tbody>
				<?php if($divisions->count): ?>
					<?php foreach($divisions->results as $key => $division): ?>
					<tr class="status draft">
						<td><?php echo $key+1; ?></td>
						<td><a href="<?php echo Uri::to('admin/divisions/' . $division->id); ?>"><?php echo $division->title; ?></a></td>
						<td><?php echo $division->staff; ?></td>
						<td><?php echo $division->view; ?></td>
					</tr>
				<?php endforeach; ?>
				<?php else: ?>
                <tr>
                  <td colspan="7"><?php echo __('divisions.no_reports'); ?></td>
                </tr>
				<?php endif; ?>
			</tbody>
		</table>

		<?php if ($divisions->links()) : ?>
		<ul class="pagination">
			<?php echo $divisions->links(); ?>
		</ul>
		<?php endif; ?>
		
		</div>
	</div>
	<div class="col col-lg-3">
		<nav class="list-division sidebar">

			<div class="panel panel-default">
				<!-- Default panel contents -->
				<div class="panel-heading">Related</div>

				<!-- List group -->
				<div class="list-group">
				
				<?php foreach($hierarchies as $key => $hierarchy): ?>

					<?php if ( $key.'s' !== basename(Uri::current()) ) : ?>
				
					<?php echo Html::link('admin/' . $key, __('division.' . $key), array('class' => 'list-group-item'
					)); ?>

					<?php endif; ?>
				<?php endforeach; ?>
				</div>
			</div>

			


		</nav>
	</div>
</div>

<?php echo $footer; ?>