<!-- Breadcrumb -->
<?php //dd(breadcrumbs()); ?>
<ul class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">

    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">

      <a itemprop="item" href="<?php echo base_url(); ?>"><i class="glyphicon glyphicon-home"></i> <span class="sr-only" itemprop="name">Home</span></a>
      <meta itemprop="position" content="1" />
    </li>

    <?php if (is_managementpage()) : ?>

    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><span itemprop="name"><?php echo _e('site.top_management'); ?></span></li>

    <?php else: ?>

    <?php if (total_breadcrumb()) :
    $morethan3 = (count(breadcrumbs()) >= 3) ? true: false;

    $position = 2;
    foreach(breadcrumbs() as $key => $org):
    	$title = ($morethan3) ? acronym($org['slug']) : $org['title'];
    $active = (((total_breadcrumb() - 1) === array_search($key, array_keys(breadcrumbs())))) ? true : false; ?>

    <?php if (is_staff()) : ?>
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
    	<a itemprop="item" href="<?php echo base_url('division/' . $org['url']); ?>" title="<?php echo $org['title']; ?>"><span itemprop="name"><?php echo $title; ?></span></a>
    	<meta itemprop="position" content="<?php echo $position; ?>" />

    </li>

	<?php else : ?>

	<li<?php if ($active) { echo ' class="active"'; } else {  echo ' itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"'; }; ?>><?php if (!$active) : ?>

		<a itemprop="item" href="<?php echo base_url('division/' . $org['url']); ?>" title="<?php echo $org['title']; ?>"><?php endif; ?><span itemprop="name"><?php echo $title; ?></span><?php if (!$active) : ?></a>
		<meta itemprop="position" content="<?php echo $position; ?>" />

	<?php endif; ?></li>
	<?php endif; $position++; endforeach; ?>

	<?php if (is_staff()) : ?>

	<li class="active"><?php echo (staff_name()); ?></li>

	<?php endif; ?>

	<?php else : ?>

	<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">

		<a itemprop="item" href="<?php echo staff_division_url(); ?>"><span itemprop="name"><?php echo staff_division_slug(); ?></span></a>
		<meta itemprop="position" content="2" />

	</li>

    <li class="active"><?php echo (staff_name()); ?></li>

	<?php endif; ?>

    <?php endif; ?>
</ul>
