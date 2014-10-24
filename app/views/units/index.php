<?php echo $header; ?>

<?php echo Html::link('admin/units/add', __('hierarchy.create_unit'), array('class' => 'btn btn-primary pull-right')); ?>

<h1 class="page-header"><?php echo __('hierarchy.unit'); ?></h1>

<?php echo $messages; ?>

<div class="row">
	<div class="col-lg-9">
		<?php //print_r($units); ?>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th><?php echo __('hierarchy.unit'); ?></th>
					</tr>
				</thead>
				<tbody>
				<?php if($units->count): ?>
					<?php foreach($units->results as $unit): ?>
					<tr class="status draft">
						<td><?php echo $unit->id; ?></td>
						<td><a href="<?php echo Uri::to('admin/units/edit/' . $unit->id); ?>"><?php echo $unit->title; ?></a></td>
					</tr>
				<?php endforeach; ?>
				<?php else: ?>
                <tr>
                  <td colspan="7"><?php echo __('hierarchy.no_reports'); ?></td>
                </tr>
				<?php endif; ?>
			</tbody>
		</table>

		<?php if ($units->links()) : ?>
		<ul class="pagination">
			<?php echo $units->links(); ?>
		</ul>
		<?php endif; ?>

		</div>
	</div>
	<div class="col col-lg-3">
		<nav class="list-unit sidebar">

			<div class="panel panel-default">
				<div class="panel-heading">Related</div>
				<div class="list-group">
					<?php foreach($hierarchies as $key => $hierarchy): ?>

						<?php if ( $key.'s' !== basename(Uri::current()) ) : ?>

						<?php echo Html::link('admin/' . $key . 's', __('hierarchy.' . $key), array('class' => 'list-group-item'
						)); ?>

						<?php endif; ?>
					<?php endforeach; ?>
				</div>
			</div>
		</nav>
	</div>
</div>

<?php echo $footer; ?>
