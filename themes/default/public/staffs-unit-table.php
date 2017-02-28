<?php theme_include('header'); ?>
<?php if (Uri::current() == '/') : theme_include('footer'); exit(); endif; ?>

<section class="content col-md-<?php  echo ( (show_division_meta() && division_has_meta()) ) ? '9' : '12'; ?>">
    <?php theme_include('breadcrumb'); ?>

	<?php if(has_staffs()): ?>

	<div id="staff-result">
		<table class="table table-bordered" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/Person">
			<thead>
			<tr>
				<th width="30%">Nama</th>
				<th data-toggle="tooltip" title="Jawatan"><i class="glyphicon glyphicon-barcode"></i> Jawatan</th>
				<th data-toggle="tooltip" title="Emel"><i class="glyphicon glyphicon-envelope"></i> Emel</th>
				<th data-toggle="tooltip" title="Telefon"><i class="glyphicon glyphicon-phone-alt"></i> Telefon</th>
			</tr>
			</thead>
			<tbody>
				<?php if(has_staffs()): ?>
					<?php $i = 0; while(staffs()): $i++; ?>
					<tr>
						<td>
							<a class="staff-ajax" data-toggle="modal" href="<?php echo staff_url(); ?>" data-target="#staffModal" itemprop="name">
								<?php echo staff_name(); ?>
							</a>
						</td>
						<td itemprop="jobTitle"><?php echo staff_job_title(); ?></td>
						<td>
						<?php if (staff_has_email()) : ?><span><?php echo staff_email_image(); ?></span><?php else: echo __('site.na'); endif; ?>
						</td>
						<td itemprop="telephone"><?php echo staff_telephone(); ?></td>
					</tr>
					<?php endwhile; ?>
				<?php else: ?>
					<tr>
						<td class="lead"><?php echo _e('staffs.nothing'); ?></td>
					</tr>
				<?php endif; ?>

			</tbody>
		</table>
	</div>

	<?php if(has_pagination()): ?>
	<nav class="pagination">
            <?php echo staffs_paging()->links(); ?>
	</nav>
	<?php endif; ?>

	<?php else: ?>
		<p><?php echo _e('staffs.nothing'); ?></p>
	<?php endif; ?>

</section>


<?php if( show_division_meta() ) : ?>
<section class="col-sm-3">

	<?php if(division_has_meta()): ?>
	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading"><?php echo _e('staffs.info'); ?></div>
		<div class="panel-body">
			<?php if(division_address()): ?>
			<h3><?php echo _e('staffs.address'); ?></h3>
			<address><?php echo division_address(); ?></address>
			<?php endif; ?>

			<?php if(division_telephone()): ?>
			<h3><?php echo _e('staffs.telephone'); ?></h3>
			<?php echo division_telephone(); ?>
			<?php endif; ?>

			<?php if(division_fax()): ?>
			<h3><?php echo _e('staffs.fax'); ?></h3>
			<?php echo division_fax(); ?>
			<?php endif; ?>
		</div>
	</div>
	<?php endif; ?>

</section>
<?php endif; ?>
<div id="staffModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="staffModalLabel" aria-hidden="true"></div>
<?php theme_include('footer'); ?>
