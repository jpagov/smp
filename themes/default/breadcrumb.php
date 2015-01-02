<!-- Breadcrumb -->
<?php //dd(breadcrumbs()); ?>
<ul class="breadcrumb">

    <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="<?php echo base_url(); ?>" itemprop="url"><i class="glyphicon glyphicon-home"></i> <span class="sr-only" itemprop="title">Home</span></a></li>

    <?php if (is_managementpage()) : ?>

    <li class="active" itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><?php echo _e('site.top_management'); ?></li>

    <?php else: ?>

    <?php if (total_breadcrumb()) :
    $morethan3 = (count(breadcrumbs()) >= 3) ? true: false;
    foreach(breadcrumbs() as $key => $org):
    	$title = ($morethan3) ? acronym($org['title']) : $org['title'];
    $active = (((total_breadcrumb() - 1) === array_search($key, array_keys(breadcrumbs())))) ? true : false; ?>

    <?php if (is_staff()) : ?>
    <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="<?php echo base_url('division/' . $org['url']); ?>" title="<?php echo $org['title']; ?>"><?php echo $title; ?></a></li>

		<?php else : ?>

	<li<?php if ($active) { echo ' class="active"'; } else {  echo 'itemscope itemtype="http://data-vocabulary.org/Breadcrumb"'; }; ?>><?php if (!$active) : ?><a href="<?php echo base_url('division/' . $org['url']); ?>" title="<?php echo $org['title']; ?>" itemprop="url"><?php endif; ?><?php echo $title; ?><?php if (!$active) : ?></a><?php endif; ?></li>

	<?php endif; ?>

	<?php endforeach; ?>

	<?php if (is_staff()) : ?>

	<li class="active"><?php echo (staff_name()); ?></li>

	<?php endif; ?>

	<?php else : ?>

	<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="<?php echo staff_division_url(); ?>"><?php echo staff_division_slug(); ?></a></li>
    <li class="active"><?php echo (staff_name()); ?></li>

	<?php endif; ?>

    <?php endif; ?>
</ul>
