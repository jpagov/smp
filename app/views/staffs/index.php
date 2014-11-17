<?php echo $header; ?>

<?php echo Html::link('admin/staffs/add', __('staffs.create_staff'), array('class' => 'btn btn-lg btn-primary pull-right')); ?>

<h1 class="page-header"><?php echo __('staffs.staff'); ?></h1>

<?php echo $messages; ?>

<div class="row">

	<div class="col col-lg-9">

		<form class="form-horizontal" role="search">
			<?php echo $search; ?>

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
						<th><?php echo __('staffs.role'); ?></th>
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
							<td><?php echo ucfirst($staff->role); ?></td>

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
											)); ?>

											<?php foreach(array('active', 'inactive') as $type): ?>
												<li class="list-group-item"<?php if ($status == $type) echo ' data-checked="true"'; ?>><?php echo __('global.' . $type); ?></li>
											<?php endforeach; ?>
										</ul>

									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a class="accordion-toggle" data-toggle="collapse" href="#collapseThree">
												Collapsible Group Item #3
											</a>
										</h4>
									</div>
									<div id="collapseThree" class="panel-collapse collapse">
										<div class="panel-body">
											Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
										</div>
									</div>
								</div>
							</div>





						</nav>

					</div>

					</form>
				</div>

				<?php echo $footer; ?>
