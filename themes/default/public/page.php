<?php theme_include('header'); ?>

	<?php if (Uri::current() == 'categories' or Uri::current() == 'divisions') : ?>

		<?php if (Uri::current() == 'categories') : ?>
		<?php theme_include('categories'); ?>
		<?php endif; ?>

		<?php if (Uri::current() == 'divisions') : ?>
		<?php theme_include('divisions'); ?>
		<?php endif; ?>

	<?php else: ?>

		<section class="content wrap">
			<h1><?php echo page_title(); ?></h1>

			<?php echo page_content(); ?>
		</section>

	<?php endif; ?>

<?php theme_include('footer'); ?>
