<?php theme_include('header'); ?>

<h1 class="page-header">Search Results</h1>

<?php echo search_form_notifications(); ?>

<?php if(has_search_results()): ?>

	<p class="lead"><strong class="text-danger"><?php echo total_search_results(); ?></strong> results were found for the search for &ldquo;<strong class="text-danger"><?php echo search_term(); ?></strong>&rdquo;</p>

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

	<?php if(has_search_pagination()): ?>
		<?php if (search_links()) : ?>
			<ul class="pagination">
				<?php echo search_links(); ?>
			</ul>
	<?php endif; ?>

	<?php endif; ?>

<?php else: ?>
	<p class="lead"><?php echo __('site.search_noresult', search_term()); ?></p>
<?php endif; ?>


<?php theme_include('footer'); ?>
