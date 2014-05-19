<?php theme_include('header'); ?>
<?php if (Uri::current() == '/') : theme_include('footer'); exit(); endif; ?>



<section class="content col-lg-8 hiro one-edge-shadow">
    <?php theme_include('breadcrumb'); ?>
	<?php if(has_staffs()): ?>
		<ul class="items">
			<?php staffs(); ?>
			<li>
				<article class="wrap">
					<h1>
						<a href="<?php echo staff_url(); ?>" title="<?php echo staff_name(); ?>"><?php echo staff_name(); ?></a>
					</h1>

					<div class="content">
						<?php echo staff_markdown(); ?>
					</div>

					<footer>
						Posted <time datetime="<?php echo date(DATE_W3C, staff_time()); ?>"><?php echo relative_time(staff_time()); ?></time> by <?php echo staff_author('real_name'); ?>.
					</footer>
				</article>
			</li>
			<?php $i = 0; while(staffs()): ?>
			<?php $bg = sprintf('background: hsl(215, 28%%, %d%%);', round(((++$i / staffs_per_page()) * 20) + 20)); ?>
			<li style="<?php echo $bg; ?>">
				<article class="wrap">
					<h2>
						<a href="<?php echo staff_url(); ?>" title="<?php echo staff_name(); ?>"><?php echo staff_name(); ?></a>
					</h2>
				</article>
			</li>
			<?php endwhile; ?>
		</ul>

		<?php if(has_pagination()): ?>
		<nav class="pagination">
			<div class="wrap">
				<?php echo staffs_prev(); ?>
				<?php echo staffs_next(); ?>
			</div>
		</nav>
		<?php endif; ?>

	<?php else: ?>
		<p>Looks like you have some writing to do!</p>
	<?php endif; ?>

</section>

<?php theme_include('footer'); ?>
