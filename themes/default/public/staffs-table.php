<?php theme_include('header'); ?>
<?php if (Uri::current() == '/') : theme_include('footer'); exit(); endif; ?>

<section class="content col-md-<?php  echo ( (show_division_meta() && division_has_meta()) || total_branchs() ) ? '9' : '12'; ?>">

	<?php theme_include('breadcrumb'); ?>
	<?php echo $messages; ?>

	<?php if (isset($staffs)) : ?>

	<div id="staff-result">

			<?php
			$division_id = division_id();
			$division_title = division_title();
			$organizations = group_by($staffs, $division_id);

			if (isset($organizations['staffs'])) :
			?>
			<div class="panel panel-primary">
				<!-- Hierarchy panel contents -->
				<div class="panel-heading"><?php echo $division_title; ?></div>

				<!-- Table -->
				<table class="table">
					<thead>
					<tr>
						<th width="30%">Nama</th>
						<th data-toggle="tooltip" title="Jawatan"><i class="glyphicon glyphicon-barcode"></i> Jawatan</th>
						<th data-toggle="tooltip" title="Emel"><i class="glyphicon glyphicon-envelope"></i> Emel</th>
						<th data-toggle="tooltip" title="Telefon"><i class="glyphicon glyphicon-phone-alt"></i> Telefon</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($organizations['staffs'] as $staff) : ?>
						<tr>
							<td><a class="staff-ajax" data-toggle="modal" href="<?php echo base_url(Page::staff() . '/' . $staff->slug) ?>" data-target="#staffModal"><?php echo $staff->display_name; ?></a></td>
							<td><?php echo $staff->job_title; ?></td>
							<td>
							<?php if ($staff->email) : ?>
								<span><img src="<?php echo Encode::email2image($staff->email); ?>" alt="<?php echo $staff->display_name; ?>"></span>
							<?php else: echo __('site.na') ?>
							<?php endif; ?>
							</td>
							<td><?php echo ( site_meta('short_phone', false) ? str_replace(site_meta('short_phone', array('03-8885', '03 8885')), '', $staff->telephone) : $staff->telephone ); ?></td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>


			</div>
			<?php endif; ?>

			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="false">

			<?php echo htmlOrg($organizations); ?>

			</div><!-- .panel-group -->

			<span class="clearfix borda"></span>
	</div>

	<?php else: ?>
		<p><?php echo _e('staffs.nothing'); ?></p>
	<?php endif; ?>

</section>


<?php if ( show_division_meta() || total_branchs() || total_sectors() ) : ?>
<section class="col-sm-3">

	<?php if (total_branchs()): ?>
	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading"><?php echo _e('staffs.branch'); ?></div>
			<ul class="list-group">
				<?php while (branchs()): ?>
				<li class="list-group-item"><a href="<?php echo base_url('division/' . division_slug() .  '/' . branch_slug()); ?>"><?php echo branch_title(); ?></a></li>
				<?php endwhile; ?>
			</ul>

	</div>
	<?php endif; ?>

	<?php if (division_has_meta()): ?>
	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading"><?php echo _e('staffs.info'); ?></div>
		<div class="panel-body">
			<?php if (division_address()): ?>
			<h3><?php echo _e('staffs.address'); ?></h3>
			<address><?php echo division_address(); ?></address>
			<?php endif; ?>

			<?php if (division_telephone()): ?>
			<h3><?php echo _e('staffs.telephone'); ?></h3>
			<?php echo division_telephone(); ?>
			<?php endif; ?>

			<?php if (division_fax()): ?>
			<h3><?php echo _e('staffs.fax'); ?></h3>
			<?php echo division_fax(); ?>
			<?php endif; ?>
		</div>
	</div>
	<?php endif; ?>

</section>
<?php endif; ?>
<!-- Staff Modal -->
<div id="staffModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="staffModalLabel" aria-hidden="true"></div>

<?php theme_include('footer'); ?>
