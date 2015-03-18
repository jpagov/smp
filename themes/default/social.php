	<meta property="og:locale" content="<?php echo language_current_id(); ?>">
	<meta property="og:description" content="<?php echo truncate(_e(site_description()), 250); ?>">
	<meta property="og:title" content="<?php echo page_title('Page can’t be found'); ?>">
	<meta property="og:url" content="<?php echo full_url(Uri::current()); ?>">
	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="@jpagov">
	<meta name="twitter:creator" content="@jpagov">
	<meta name="twitter:url" content="<?php echo full_url(Uri::current()); ?>">
	<meta name="twitter:domain" content="<?php echo page_title('Page can’t be found'); ?> - <?php echo site_name(); ?>">
	<?php if (is_staff()) : ?><meta property="og:type" content="profile">
	<meta property="og:image" content="<?php echo full_url('content/avatar/' . staff_custom_field('avatar')); ?>">
	<meta property="og:site_name" content="<?php echo page_title('Page can’t be found'); ?> - <?php echo site_name(); ?>">
	<meta property="profile:first_name" content="<?php echo staff_first_name(); ?>">
	<meta property="profile:last_name" content="<?php echo staff_last_name(); ?>">
	<meta property="profile:username" content="<?php echo staff_slug(); ?>">
	<?php if (staff_gender()) : ?><meta property="profile:gender" content="<?php echo gender(staff_gender()); ?>"><?php endif; ?>

	<meta name="twitter:description" content="<?php echo truncate(_e(site_description()), 250); ?>">
	<meta name="twitter:title" content="<?php echo page_title('Page can’t be found'); ?>">

	<meta name="twitter:image:src" content="<?php echo full_url('content/avatar/' . staff_custom_field('avatar')); ?>"><?php else : ?>
	<meta property="og:type" content="website">
	<meta property="og:image" content="<?php echo theme_full_url('img/jpa-101pxx119px.png'); ?>">
	<meta property="og:site_name" content="<?php echo site_name(); ?>">
	<meta property="og:description" content="<?php echo truncate(_e(site_description()), 250); ?>"><?php endif; ?>
