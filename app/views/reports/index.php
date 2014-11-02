<?php echo $header; ?>

<h1 class="page-header"><?php echo __('reports.report_dashboard'); ?></h1>

<?php echo $messages; ?>

<div class="row">
	<div class="col-sm-12">

	<h2><?php echo __('reports.trending', $trends[$trend]); ?> <?php echo Form::select('trend', $trends, $trend, array('class' => 'col-sm-4 input-sm pull-right', 'id' => 'trend',
                        )); ?></h2>

    	<div class="row">

			<div class="col-sm-3 trending-staff">
				<div class="list-group">
					<h3><a href="<?php echo Uri::to('admin/reports/staff'); ?>">Staff</a></h3>
					<?php if (count($staffs)) : ?>
					<?php foreach($staffs as $staff): ?>
					<li class="list-group-item"><span class="badge"><?php echo custom_number_format($staff->stats); ?></span><?php echo $staff->trend; ?></li>
					<?php endforeach; ?>
					<?php else: ?>
					<p>No data</p>
					<?php endif; ?>
				</div>

			</div><!--/.col-sm-3 -->

			<div class="col-sm-3 trending-division">

				<div class="list-group">
					<h3><a href="<?php echo Uri::to('admin/reports/division'); ?>">Division</a></h3>
					<?php if (count($divisions)) : ?>
					<?php foreach($divisions as $division): ?>
					<li class="list-group-item"><span class="badge"><?php echo custom_number_format($division->stats); ?></span><?php echo $division->trend; ?></li>
					<?php endforeach; ?>
					<?php else: ?>
					<p>No data</p>
					<?php endif; ?>
				</div>

			</div><!--/.col-sm-3 -->

			<div class="col-sm-3 trending-category">

				<div class="list-group">
					<h3><a href="<?php echo Uri::to('admin/reports/category'); ?>">Category</a></h3>
					<?php if (count($categories)) : ?>
					<?php foreach($categories as $category): ?>
					<li class="list-group-item"><span class="badge"><?php echo custom_number_format($category->stats); ?></span><?php echo $category->trend; ?></li>
					<?php endforeach; ?>
					<?php else: ?>
					<p>No data</p>
					<?php endif; ?>
				</div>

			</div><!--/.col-sm-3 -->

			<div class="col-sm-3 trending-search">

				<div class="list-group">
					<h3><a href="<?php echo Uri::to('admin/reports/search'); ?>">Search Keyword</a></h3>
					<?php if (count($searchs)) : ?>
					<?php foreach($searchs as $search): ?>
					<li class="list-group-item"><span class="badge"><?php echo custom_number_format($search->stats); ?></span><?php echo (!empty($search->trend)) ? $search->trend : __('reports.no_keyword'); ?></li>
					<?php endforeach; ?>
					<?php else: ?>
					<p>No data</p>
					<?php endif; ?>
				</div>

			</div><!--/.col-sm-3 -->

		</div>

	<h2>Most View <small>Top 5 visit</small></h2>

		<div class="row">

			<div class="col-sm-3 most-view-staff">
				<div class="list-group">
					<h3><a href="<?php echo Uri::to('admin/reports/staff'); ?>">Staff</a></h3>
					<?php if (count($top_staffs)) : ?>
					<?php foreach($top_staffs as $staff): ?>
					<li class="list-group-item"><span class="badge"><?php echo custom_number_format($staff->stats); ?></span><?php echo $staff->trend; ?></li>
					<?php endforeach; ?>
					<?php else: ?>
					<p>No data</p>
					<?php endif; ?>
				</div>

			</div><!--/.col-sm-3 -->

			<div class="col-sm-3 most-view-division">

				<div class="list-group">
					<h3><a href="<?php echo Uri::to('admin/reports/division'); ?>">Division</a></h3>
					<?php if (count($top_divisions)) : ?>
					<?php foreach($top_divisions as $division): ?>
					<li class="list-group-item"><span class="badge"><?php echo custom_number_format($division->stats); ?></span><?php echo $division->trend; ?></li>
					<?php endforeach; ?>
					<?php else: ?>
					<p>No data</p>
					<?php endif; ?>
				</div>

			</div><!--/.col-sm-3 -->

			<div class="col-sm-3 most-view-category">

				<div class="list-group">
					<h3><a href="<?php echo Uri::to('admin/reports/category'); ?>">Category</a></h3>
					<?php if (count($top_categories)) : ?>
					<?php foreach($top_categories as $category): ?>
					<li class="list-group-item"><span class="badge"><?php echo custom_number_format($category->stats); ?></span><?php echo $category->trend; ?></li>
					<?php endforeach; ?>
					<?php else: ?>
					<p>No data</p>
					<?php endif; ?>
				</div>

			</div><!--/.col-sm-3 -->

			<div class="col-sm-3 most-view-search">

				<div class="list-group">
					<h3><a href="<?php echo Uri::to('admin/reports/search'); ?>">Search Keyword</a></h3>
					<?php if (count($top_searchs)) : ?>
					<?php foreach($top_searchs as $search): ?>
					<li class="list-group-item"><span class="badge"><?php echo custom_number_format($search->stats); ?></span><?php echo (!empty($search->trend)) ? $search->trend : __('reports.no_keyword'); ?></li>
					<?php endforeach; ?>
					<?php else: ?>
					<p>No data</p>
					<?php endif; ?>
				</div>

			</div><!--/.col-sm-3 -->

		</div>

		<h2>Latest <small>Top 5</small></h2>

		<div class="row">

			<div class="col-sm-3">

				<div class="list-group">
					<h3>Last Access</h3>

					<?php foreach($access as $admin): ?>
					<a href="#" class="list-group-item <?php echo admin_color($admin->role); ?>">
				        <h4 class="list-group-item-heading"><?php echo $admin->display_name; ?></h4>
				        <p class="list-group-item-text"><?php echo Date::format($admin->last_visit); ?></p>
				    </a>
					<?php endforeach; ?>
				    </div>
			</div>

			<div class="col-sm-9">

				<div class="col-sm-6 recent-add">
					<h3>Recent Add</h3>

					<div class="list-group">
					<?php foreach($adds as $add): ?>
					<a href="#" class="list-group-item <?php echo admin_color($add->role); ?>">
				        <h4 class="list-group-item-heading"><?php echo $add->display_name; ?></h4>
				        <p class="list-group-item-text"><?php echo Date::format($add->created); ?> <code><?php echo $add->email; ?></code> <code><?php echo $add->telephone; ?></code></p>
				    </a>
					<?php endforeach; ?>
				    </div>

				</div>

				<div class="col-sm-6 recent-update">
					<h3>Recent Update</h3>

					<div class="list-group">
				    <?php foreach($updates as $update): ?>
					<a href="#" class="list-group-item <?php echo admin_color($update->role); ?>">
				        <h4 class="list-group-item-heading"><?php echo $update->display_name; ?></h4>
				        <p class="list-group-item-text"><?php echo Date::format($update->updated); ?> <code><?php echo $update->email; ?></code> <code><?php echo $update->telephone; ?></code></p>
				    </a>
					<?php endforeach; ?>
				    </div>

				</div>

			</div><!--/.row -->

		</div><!--/.col-sm-9 -->

		<div class="col-sm-3">

		</div>

	</div>

	</div>

<?php echo $footer; ?>
