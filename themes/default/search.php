<?php theme_include('header'); ?>

<?php echo search_form_notifications(); ?>

<h1 class="wrap">You searched for &ldquo;<?php echo search_term(); ?>&rdquo;.</h1>

<?php if(has_search_results()): ?>
	<ul class="items">
		<?php $i = 0; while(search_results()): $i++; ?>
		<li style="background: hsl(215,28%,<?php echo round((($i / staffs_per_page()) * 20) + 20); ?>%);">
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
			<?php echo search_prev(); ?>
			<?php echo search_next(); ?>
		</div>
	</nav>
	<?php endif; ?>

<?php else: ?>
	<p class="wrap"><?php echo __('site.search_noresult', search_term()); ?></p>
<?php endif; ?>

<?php theme_include('footer'); ?>
