<?php echo $header; ?>

<h1 class="page-header"><?php echo __('reports.staff_dashboard'); ?></h1>

<?php echo $messages; ?>

<div class="row">
	<div class="col-sm-12">

		<h2><?php echo _e('reports.staff_report', $title, 'All Division'); ?></h2>

		<div class="row">

			<div class="col-sm-9">

			<div class="row">

				<div class="col-sm-4">
					<div class="panel panel-default">
						<!-- Default panel contents -->
						<div class="panel-heading"><?php echo _e('reports.summary', 'Summary'); ?></div>

						<ul class="list-group">
							<li class="list-group-item">Total visit <span class="badge"><?php echo $total_visit; ?></span></li>
							<li class="list-group-item">Total staff <span class="badge"><?php echo $total_staff; ?></span></li>
							<li class="list-group-item">Active <span class="badge"><?php echo $staff_active; ?></span></li>
							<li class="list-group-item">Inactive <span class="badge"><?php echo $staff_inactive; ?></span></li>

						</ul>

					</div>
				</div><!--/.col-sm-4 -->

				<div class="col-sm-4">
					<div class="panel panel-default">
						<!-- Default panel contents -->
						<div class="panel-heading"><?php echo _e('reports.admin', 'Administrator'); ?></div>

						<ul class="list-group">
						<?php if ($administrators->count) : ?>
						<?php foreach($administrators->results as $admin): ?>
							<li class="list-group-item"><?php echo $admin->name; ?></li>
						<?php endforeach; ?>
						<?php else: ?>
						<p>No data</p>
					<?php endif; ?>
						</ul>

					</div>
				</div><!--/.col-sm-4 -->

				<div class="col-sm-4">
					<div class="panel panel-default">
						<!-- Default panel contents -->
						<div class="panel-heading"><?php echo _e('reports.warning', 'Warning'); ?></div>

						<ul class="list-group">
							<li class="list-group-item"><span class="badge"><?php echo $staff_noemail->count; ?></span> <abbr title="Staff has no email">No email</abbr></li>
							<li class="list-group-item"><span class="badge"><?php echo $staff_notel->count; ?></span> <abbr title="Staff has no telephone number">No telephone</abbr></li>
						</ul>

					</div>
				</div><!--/.col-sm-4 -->


			</div><!--/.row -->


			<div class="row">
				<div class="col-md-6">
					<div class="panel panel-default">
						<!-- Default panel contents -->
						<div class="panel-heading"><?php echo _e('reports.staff_noemail', 'No email address'); ?></div>

						<ul class="list-group">
						 <?php if($staff_noemail->count): foreach($staff_noemail->results as $noemail): ?>
							<li class="list-group-item"><a href="<?php echo Uri::to('admin/staffs/edit/' . $noemail->id); ?>"><?php echo $noemail->display_name; ?></a></li>
							<?php endforeach; else: ?>
							<li class="list-group-item"><?php echo __('pages.nopages_desc'); ?></li>
							<?php endif; ?>
					    </ul>

					    <?php if ($staff_noemail->links()) : ?>
					    <div class="panel-footer">
							<ul class="pager">
								<li class="previous"><?php echo $staff_noemail->prev_link(true); ?></li>
								<li class="next"><?php echo $staff_noemail->next_link(true); ?></li>
							</ul>
					    </div>
					    <?php endif; ?>

					</div>
				</div>

				<div class="col-md-6">
					<div class="panel panel-default">
						<!-- Default panel contents -->
						<div class="panel-heading"><?php echo _e('reports.staff_noemail', 'No telephone number'); ?></div>

						<ul class="list-group">
						 <?php if($staff_notel->count): foreach($staff_notel->results as $notel): ?>
							<li class="list-group-item"><a href="<?php echo Uri::to('admin/staffs/edit/' . $notel->id); ?>"><?php echo $notel->display_name; ?></a></li>
							<?php endforeach; else: ?>
							<li class="list-group-item"><?php echo __('pages.nopages_desc'); ?></li>
							<?php endif; ?>
					    </ul>

					    <?php if ($staff_notel->links()) : ?>
					    <div class="panel-footer">
							<ul class="pager">
								<li class="previous"><?php echo $staff_notel->prev_link(); ?></li>
								<li class="next"><?php echo $staff_notel->next_link(); ?></li>
							</ul>
					    </div>
					    <?php endif; ?>

					</div>
				</div>
			</div>


				<div class="panel panel-default">
					<!-- Default panel contents -->
					<div class="panel-heading"><?php echo _e('reports.last_access', 'Latest updates'); ?></div>

					<div class="list-group">
				    <?php foreach($updates as $update): ?>
					<a href="#" class="list-group-item <?php echo admin_color($update->role); ?>">
				        <h4 class="list-group-item-heading"><?php echo $update->display_name; ?></h4>
				        <p class="list-group-item-text"><?php echo Date::format($update->updated); ?> <code><?php echo $update->email; ?></code> <code><?php echo $update->telephone; ?></code></p>
				    </a>
					<?php endforeach; ?>
				    </div>

				</div>

			</div><!--/.col-sm-9 -->

			<div class="col-sm-3">

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

									<?php echo Html::link('admin/reports/staff', '<span class="icon"></span> ' . __('global.all'), array(
										'class' => (!isset($division)) ? 'list-group-item active' : 'list-group-item'
										)); ?>

									<?php
									foreach($divisions as $div):

										$division_link = 'admin/reports/staff/?division=' . $div->slug;
									?>
									<?php echo Html::link($division_link, '<span class="icon"></span> ' . strtoupper($div->slug), array(
										'class' => (isset($division) && $division == $div->slug) ? 'list-group-item active' : 'list-group-item',
										'badge' => $div->staff
										)); ?>
									<?php endforeach; ?>
								</div>
							</div>
						</div><!--/.panel panel-default -->


					</div><!--/.panel-group -->





				</nav>

			</div><!--/.col-sm-3 -->

		</div><!--/.row -->

	</div>

</div>

<?php echo $footer; ?>
