<?php echo $header; ?>

<?php echo Html::link('admin/staffs/add', __('staffs.create_staff'), array('class' => 'btn btn-lg btn-primary pull-right')); ?>

<h1 class="page-header"><?php echo __('staffs.staff'); ?></h1>

<?php echo $messages; ?>

<div class="row">
	<div class="col col-lg-9">

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
					</tr>
				</thead>
				<tbody>
					<?php foreach($staffs->results as $staff): ?>
					<tr class="status draft">
						<td><?php echo $staff->id; ?></td>
						<td><a href="<?php echo Uri::to('admin/staffs/edit/' . $staff->id); ?>" title=""><?php echo $staff->display_name; ?></a></td>
						<td><?php echo $staff->email; ?></td>
						<td><?php echo $staff->telephone; ?></td>
						<td><abbr title="<?php echo Date::format($staff->created); ?>"><?php echo __('global.' . $staff->status); ?></abbr></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>

      <?php if ($staffs->links()) : ?>
        <ul class="pagination">
         <?php echo $staffs->links(); ?>
       </ul>
     <?php endif; ?>

		</div>
	</div>

	<div class="col col-lg-3">

		<nav class="sidebar">

            <div class="list-group">

        		<?php echo Html::link('admin/staffs', '<span class="icon"></span> ' . __('global.all'), array(
        			'class' => (!isset($division)) ? 'list-group-item active' : 'list-group-item'
        		)); ?>

        		<?php
        		foreach($divisions as $div):

                    $division_link = 'admin/staffs/division/' . $div->slug;

                    if ($status != 'all') {
                        $division_link = 'admin/staffs/division/' . $div->slug . '/' .'status/' . $status;
                    }

                    if ($staffs->links() && $staffs->page != 1) {
                        $division_link .= '/' . $staffs->page;
                    }
        		?>
        			<?php echo Html::link($division_link, '<span class="icon"></span> ' . strtoupper($div->slug), array(
        				'class' => (isset($division) && $division == $div->slug) ? 'list-group-item active' : 'list-group-item',
        				'badge' => $div->staff
        			)); ?>
        			<?php endforeach; ?>
             </div>

             <div class="list-group">

                <?php

                echo Html::link(isset($division) ? 'admin/staffs/division/' . $division : 'admin/staffs', '<span class="icon"></span> ' . __('global.all'), array(
                    'class' => ($status == 'all') ? 'list-group-item active' : 'list-group-item'
                )); ?>

                <?php
                foreach(array('active', 'inactive') as $type):

                    $query = Query::table(Base::table('staffs'))->where('status', '=', $type);

                    $status_link = 'admin/staffs/status/' . $type;

                    if (isset($division)) {
                        $query = $query->where('division', '=', $division);
                        $status_link = 'admin/staffs/division/' . $division . '/' .'status/' . $type;
                    }

                    if ($staffs->links() && $staffs->page != 1) {
                        $status_link .= '/' . $staffs->page;
                    }

                    $status_count = $query->count();
                ?>
                    <?php echo Html::link($status_link, '<span class="icon"></span> ' . __('global.' . $type), array(
                        'class' => ($status == $type) ? 'list-group-item active' : 'list-group-item',
                        'badge' => $status_count
                    )); ?>
                    <?php endforeach; ?>
             </div>

		</nav>

	</div>


	</div>

<?php echo $footer; ?>
