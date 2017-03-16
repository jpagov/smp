<?php echo $header; ?>

<?php echo Html::link('admin/branchs/add', __('hierarchy.create_branch'), array('class' => 'btn btn-primary pull-right')); ?>

<h1 class="page-header"><?php echo __('hierarchy.branch'); ?></h1>

<?php echo $messages; ?>

<div class="row">
	<div class="col-lg-9">
		<?php //print_r($branchs); ?>
		<form class="form-horizontal" role="search">
			<?php echo $search; ?>

		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th><?php echo __('hierarchy.branch'); ?></th>
						<th><?php echo __('hierarchy.sort'); ?></th>
					</tr>
				</thead>
				<tbody>
				<?php if($branchs->count): ?>
					<?php foreach($branchs->results as $branch): ?>
					<tr class="status draft">
						<td><?php echo $branch->id; ?></td>
						<td><a href="<?php echo Uri::to('admin/branchs/edit/' . $branch->id); ?>"><?php echo $branch->title; ?></a></td>
						<td><?php echo $branch->sort; ?></td>
					</tr>
				<?php endforeach; ?>
				<?php else: ?>
                <tr>
                  <td colspan="7"><?php echo __('hierarchy.no_result'); ?></td>
                </tr>
				<?php endif; ?>
			</tbody>
		</table>

		<?php if ($branchs->links()) : ?>
		<ul class="pagination">
			<?php echo $branchs->links(); ?>
		</ul>
		<?php endif; ?>

		</div>

		</form>
	</div>
	<div class="col col-lg-3">
		<nav class="list-branch sidebar">

			<div class="panel-group" id="accordion">

				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
					        <a data-toggle="collapse" data-parent="#accordion" href="#collapseDivision" title="Filter by Division">
					          Division <span class="pull-right division-toggle glyphicon glyphicon-minus"></span>
					        </a>
					    </h4>
					</div>
					<div id="collapseDivision" class="panel-collapse collapse<?php echo (count($divisions) > 3) ? '' : 'in'; ?>">
						<div class="list-group">
							<?php echo Html::link('admin/branchs', __('global.all'), array(
			        			'class' => (!isset($division)) ? 'list-group-item active' : 'list-group-item'
			        		)); ?>

			        		<?php
			        		foreach($divisions as $div):

			                    $division_link = 'admin/branchs/?division=' . $div->slug;

			                    if ($status != 'all') {
			                        $division_link = 'admin/branchs/?division=' . $div->slug . '/' .'status/' . $status;
			                    }

			                    if ($branchs->links() && $branchs->page != 1) {
			                        $division_link .= '/' . $branchs->page;
			                    }
			        		?>
			        			<?php echo Html::link($division_link, strtoupper($div->slug), array(
			        				'class' => (isset($division) && $division == $div->slug) ? 'list-group-item active' : 'list-group-item',
			        				'badge' => $div->staff
			        			)); ?>
			        			<?php endforeach; ?>
						</div>
					</div>
				</div>

				<?php $relateds = array('divisions', 'branchs', 'sectors', 'units', 'categories', 'tags'); ?>

            <div class="panel panel-default">
                <div class="panel-heading"><?php echo __('global.related'); ?></div>
                <div class="list-group">
                <?php foreach ($relateds as $related) : ?>
                <a class="list-group-item <?php if(is_active('admin/' . $related)) echo 'active'; ?>" href="<?php echo Uri::to('admin/' . $related); ?>"><?php echo __('global.' . $related); ?></a>
                 <?php  endforeach; ?>
                </div>
            </div>
			</div>

		</nav>
	</div>
</div>

<?php echo $footer; ?>
