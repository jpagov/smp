<?php theme_include('header'); ?>
<?php if (Uri::current() == '/') : theme_include('footer'); exit(); endif; ?>
<?php theme_include('breadcrumb'); ?>
<section class="content col-md-<?php  echo ( (show_division_meta() && division_has_meta()) || total_branchs() ) ? '9' : '12'; ?>">

	<?php if (isset($staffs)) : ?>

	<div id="staff-result">

		<article class="search-result row">
			<div class="panel panel-primary">
				<!-- Hierarchy panel contents -->
				<div class="panel-heading"><?php echo division_title(); ?></div>

				<!-- Table -->
				<table class="table">
					<thead>
					<tr>
						<th>Nama</th>
						<th data-toggle="tooltip" title="Jawatan"><i class="glyphicon glyphicon-barcode"></i> Jawatan</th>
						<th data-toggle="tooltip" title="Emel"><i class="glyphicon glyphicon-envelope"></i> Emel</th>
						<th data-toggle="tooltip" title="Telefon"><i class="glyphicon glyphicon-phone-alt"></i> Telefon</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$orgs['childs'] = group_by($staffs, division_id());

					echo htmlOrg($orgs);
					?>
					</tbody>
				</table>


			</div>



			<span class="clearfix borda"></span>
		</article>

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
