<?php echo $header; ?>

<?php echo Html::link('admin/sectors/add', __('hierarchy.create_sector'), array('class' => 'btn btn-primary pull-right')); ?>

<h1 class="page-header"><?php echo __('hierarchy.sector'); ?></h1>

<?php echo $messages; ?>

<div class="row">
	<div class="col-lg-9">
		<?php //print_r($sectors); ?>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th><?php echo __('hierarchy.sector'); ?></th>
					</tr>
				</thead>
				<tbody>
				<?php if($sectors->count): ?>
					<?php foreach($sectors->results as $sector): ?>
					<tr class="status draft">
						<td><?php echo $sector->id; ?></td>
						<td><a href="<?php echo Uri::to('admin/sectors/edit/' . $sector->id); ?>"><?php echo $sector->title; ?></a></td>
					</tr>
				<?php endforeach; ?>
				<?php else: ?>
                <tr>
                  <td colspan="7"><?php echo __('hierarchy.no_reports'); ?></td>
                </tr>
				<?php endif; ?>
			</tbody>
		</table>

		<?php if ($sectors->links()) : ?>
		<ul class="pagination">
			<?php echo $sectors->links(); ?>
		</ul>
		<?php endif; ?>

		</div>
	</div>
	<div class="col col-lg-3">
		<nav class="list-sector sidebar">

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
