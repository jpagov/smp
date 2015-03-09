<?php echo $header; ?>

<?php echo Html::link('admin/staffs', __('global.back'), array('class' => 'btn btn-lg btn-default pull-right')); ?>

<h1 class="page-header"><?php echo __('reports.search'); ?></h1>

<?php echo $messages; ?>

<div class="row">
	<div class="col-lg-12">
		<?php //print_r($searchs); ?>
		<form class="form-horizontal" role="search">
		<?php echo $search; ?>

		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th><?php echo __('reports.search'); ?></th>
						<th><?php echo __('reports.search_total'); ?></th>
					</tr>
				</thead>
				<tbody>
				<?php if($searchs->count): ?>
					<?php foreach($searchs->results as $search): ?>

					<tr class="status draft">
						<td><?php echo $search->search; ?></td>
						<td><span class="badge"><?php echo $search->total; ?></span></td>
					</tr>
				<?php endforeach; ?>
				<?php else: ?>
                <tr>
                  <td colspan="7"><?php echo __('reports.no_reports'); ?></td>
                </tr>
				<?php endif; ?>
			</tbody>
		</table>

		<?php if ($searchs->links()) : ?>
		<ul class="pagination">
			<?php echo $searchs->links(); ?>
		</ul>
		<?php endif; ?>

		</div>

		</form>
	</div>

</div>

<?php echo $footer; ?>
