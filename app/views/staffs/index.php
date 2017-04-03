<?php echo $header; ?>

<?php echo Html::link('admin/staffs/add', __('staffs.create_staff'), array('class' => 'btn btn-lg btn-primary pull-right')); ?>

<h1 class="page-header"><?php echo __('staffs.staff'); ?></h1>

<?php echo $messages; ?>

<div class="row">
	<form class="form-horizontal" role="search">
		<div class="col col-lg-9">
			<?php if($transfers->count): ?>
				<div class="panel panel-warning">
					<div class="panel-heading">
					<h3 class="panel-title"><?php echo Html::link('admin/transfers', __('transfers.transfers')); ?></h3>
					</div>
					<div class="panel-body">
					Sila ambil maklum, sebarang pertukaran memerlukan pengesahan daripada PTB masing-masing. Sekiranya tiada pengesahan dibuat dalam masa 7 hari, pertukaran tersebut secara automatik akan dibatalkan.
					</div>
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th><?php echo __('transfers.staff'); ?></th>
									<th><?php echo __('transfers.transfer_from'); ?></th>
									<th><?php echo __('transfers.transfer_to'); ?></th>
									<th class="hidden-xs"><?php echo __('transfers.request_by'); ?></th>
									<th class="hidden-xs"><?php echo __('transfers.transfer_at'); ?></th>
									<th class="hidden-xs"><?php echo __('transfers.confirm_at'); ?></th>
									<th class="hidden-xs"><?php echo __('transfers.confirm_by'); ?></th>
									<th><?php echo __('transfers.status'); ?></th>
									<th><?php echo __('transfers.action'); ?></th>
								</tr>
							</thead>
							<tbody>

								<?php foreach($transfers->results as $transfer): ?>
								<tr class="status draft">
									<td><?php echo $transfer->id; ?></td>
									<td>
										<a href="<?php echo Uri::to('admin/transfers/view/' . $transfer->id); ?>"><?php echo $transfer->staff; ?></a> -
										<a href="<?php echo Uri::to('admin/staffs/edit/' . $transfer->staff_id); ?>" data-toggle="tooltip" title="Kemaskini profil"><i class="glyphicon glyphicon-edit"></i></a>
									</td>
									<td class="text-uppercase"><?php echo $transfer->division_from_slug; ?></td>
									<td class="text-uppercase"><?php echo $transfer->division_to_slug; ?></td>
									<td class="hidden-xs">

										<a href="<?php echo Uri::to('admin/profile/' . $transfer->transfer_by); ?>"><?php echo $transfer->request_by; ?></a>


									</td>
									<td class="hidden-xs"><?php echo $transfer->transfered_at; ?></td>
									<td class="hidden-xs"><?php echo $transfer->confirmed_at; ?></td>
									<td class="hidden-xs"><?php echo $transfer->confirm_by; ?></td>
									<td>

										<span class="text-uppercase label label-<?php echo $labels[$transfer->status] ?>"><?php echo $statuses[$transfer->status] ?></span>
												</td>
									<td>

									<?php if ($transfer->transfer_by == $editor->id || (!$transfer->confirmed_at && in_array($transfer->division_from_id, $editor->roles)) ) : ?>
										<a class="btn btn-danger btn-xs" href="<?php echo Uri::to('admin/transfers/cancel/'. $transfer->id) ?>"><i class="glyphicon glyphicon-remove-sign"></i> Batal</a>
									<?php endif; ?>

									<?php if (!$transfer->confirmed_at && in_array($transfer->division_to_id, $editor->roles) ) : ?>
										<a class="btn btn-success btn-xs" href="<?php echo Uri::to('admin/transfers/confirm/'. $transfer->id) ?>"><i class="glyphicon glyphicon-ok-sign"></i> Sah</a>
									<?php endif; ?>

									</td>
								</tr>
							<?php endforeach; ?>

							</tbody>
						</table>

					</div>
				</div>
			<?php endif; ?>

			<div class="panel panel-primary">
				<!-- Default panel contents -->
				<div class="panel-heading">Senarai Pegawai</div>
				<div class="panel-body">
					<?php echo $search; ?>
				</div>

				<!-- Table -->
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th><?php echo __('staffs.name'); ?></th>
								<th><?php echo __('staffs.email'); ?></th>
								<th><?php echo __('staffs.telephone'); ?></th>
								<th><?php echo __('staffs.description'); ?></th>
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
								<td><?php echo truncate($staff->description, 75); ?></td>
								<td><abbr title="<?php echo Date::format($staff->created); ?>"><?php echo __('global.' . $staff->status); ?></abbr></td>

								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>

				<div class="panel-footer">
					<?php if ($staffs->links()) : ?>
						<ul class="pagination">
							<?php echo $staffs->links(); ?>
						</ul>
					<?php endif; ?>
				</div>

			</div><!-- /.panel panel-primary -->

		</div><!-- /.col col-lg-9 -->

		<div class="col col-lg-3">
			<nav class="sidebar">
				<div class="panel-group" id="accordion">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a class="accordion-toggle" data-toggle="collapse" href="#collapseDivision">
									Division
								</a>
								<button type="submit" class="btn btn-primary btn-xs">Submit</button>
							</h4>
						</div>
						<div id="collapseDivision" class="panel-collapse collapse <?php if (count($divisions) > 3) echo 'in'; ?>">

							<ul class="list-group checked-list-box">

							<?php echo Html::link('admin/staffs', '<span class="icon"></span> ' . __('global.all'), array(
								'class' => (!isset($division)) ? 'list-group-item active' : 'list-group-item'
								)); ?>

								<?php foreach($divisions as $div): ?>

									<li class="list-group-item<?php if (isset($division) && in_array($div->id, $division)) echo ' list-group-item-primary active'; ?>" style="cursor: pointer;">

									<span class="state-icon glyphicon glyphicon-<?php echo (isset($division) && in_array($div->id, $division)) ? 'check' : 'unchecked'; ?>"></span>

									<?php echo strtoupper($div->slug); ?>

									<input class="hidden" type="checkbox" name="division[]" value="<?php echo $div->id; ?>"<?php if (isset($division) && in_array($div->id, $division)) echo ' checked'; ?>>

									</li>
								<?php endforeach; ?>
							</ul>

						</div>
					</div><!--/.panel panel-default -->

					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a class="accordion-toggle" data-toggle="collapse" href="#collapseStatus">
									Status
								</a>
							</h4>
						</div>
						<div id="collapseStatus" class="panel-collapse collapse in">

							<ul class="list-group checked-list-box">

								<?php
								echo Html::link('admin/staffs', '<span class="icon"></span> ' . __('global.all'), array(
									'class' => ($status == 'all') ? 'list-group-item active' : 'list-group-item'
									));

								parse_str($_SERVER['QUERY_STRING'], $output);

								foreach(array('active', 'inactive') as $type): ?>
									<li class="list-group-item"<?php if ($status == $type) echo ' data-checked="true"'; ?>>
									<a href="?<?php echo http_build_query(array_replace($output, ['status' => $type])) ?>"><?php echo __('global.' . $type); ?></a></li>
								<?php endforeach; ?>
							</ul>

						</div>
					</div>
				</div>
			</nav>
		</div>
	</form>
</div>

<?php echo $footer; ?>
