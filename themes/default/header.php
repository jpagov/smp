<!doctype html>
<html lang="<?php echo str_replace('_', '-', language_current_id()); ?>">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php if (base_url() == current_url()) : echo site_name(); else : echo page_title('Page can’t be found'); ?> - <?php echo site_name(); ?><?php endif; ?> ☎</title>
  <meta name="description" content="<?php echo _e(site_description()); ?>">
  <?php theme_include('critical'); ?>
  <link rel="stylesheet" href="<?php echo revision('css/app.min.css'); ?>">
  <link rel="alternate" type="application/rss+xml" title="RSS" href="<?php echo rss_url(); ?>">
  <link rel="alternate" hreflang="<?php echo (language_current_id() == 'ms_MY') ? 'en-GB' : 'ms-MY'; ?>" href="<?php echo current_url(); ?>?lang=<?php echo (language_current_id() == 'ms_MY') ? 'en-GB' : 'ms-MY'; ?>">
  <?php theme_include('social'); ?>

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <?php if(customised()): ?>
      <!-- Custom CSS -->
      <style><?php echo staff_css(); ?></style>

      <!--  Custom Javascript -->
      <script><?php echo staff_js(); ?></script>
    <?php endif; ?>
  </head>
  <body class="<?php echo trim(body_class()); ?>" itemscope itemtype="http://schema.org/GovernmentOrganization">
    <div class="navbar navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
            <span class="sr-only"><?php echo _e('site.toggle_navigation'); ?></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url(); ?>">

          <img itemprop="logo" height="28" alt="Jata Negara" src="<?php echo asset('app/views/assets/img/jpa-101pxx119px.png'); ?>">

          <?php if(!staff_id()) : ?><h1><?php endif; ?><span class="sr-only" itemprop="name"><?php echo site_name(); ?></span><?php if(!staff_id()) : ?></h1><?php endif; ?>

          </a>
        </div><!-- //.navbar-header -->
        <div class="navbar-collapse collapse navbar-inverse-collapse">

          <?php if(has_menu_items()): ?>
            <ul class="nav navbar-nav">
              <?php while(menu_items()): ?>
                <li <?php echo (menu_active() ? 'class="active"' : ''); ?>>
                  <a href="<?php echo menu_url(); ?>" title="<?php echo menu_title(); ?>">
                    <?php echo menu_name(); ?>
                  </a>
                </li>
              <?php endwhile; ?>
            </ul>
          <?php endif; ?>

          <ul class="nav navbar-nav navbar-right">

          	<?php if(total_languages()): ?>
          		<li class="dropdown">
          			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><img alt="<?php echo language_name(); ?>" src="<?php echo language_flag(language_current_id()); ?>"> <span class="sr-only" itemprop="inLanguage"><?php echo language_name(); ?></span> <span class="caret"></span></a>

          			<ul class="dropdown-menu" role="menu">
			            <?php while(languages()): ?>
						      <li><a class="view btn-xs" href="<?php echo language_url(); ?>"><img alt="<?php echo language_name(); ?>" src="<?php echo language_flag(language_id()); ?>"> <?php echo language_name(); ?></a></li>
						      <?php endwhile; ?>
			          </ul>

          		</li>
			      <?php endif; ?>

            <li<?php if(active('categories')) echo ' class="active"'; ?>>

            	<a class="view btn-lg" data-container="body" data-content="<?php echo _e('site.view_by_category'); ?>" href="<?php echo base_url('categories'); ?>"><span class="glyphicon glyphicon-th-list"></span>&nbsp; <span class="hidden-lg hidden-md"><?php echo _e('site.view_by_category'); ?></span></a>

            </li>

            <li<?php if(active('divisions')) echo ' class="active"'; ?>>

            	<a class="view btn-lg" data-container="body" data-content="<?php echo _e('site.view_by_division'); ?>" href="<?php echo base_url('divisions'); ?>"><span class="glyphicon glyphicon-th-large"></span>&nbsp; <span class="hidden-lg hidden-md"><?php echo _e('site.view_by_division'); ?></span></a>

            </li>

            <li>

            	<a class="view btn-lg" data-container="body" data-content="<?php echo _e('site.sign_in_explain'); ?>" href="<?php echo base_url('admin'); ?>"><span class="glyphicon glyphicon-log-in"></span>&nbsp; <span class="hidden-lg hidden-md"><?php echo _e('site.administrator'); ?></span></a>

            </li>

          </ul>


        <div class="col-sm-6" itemscope itemtype="http://schema.org/WebSite">
        <meta itemprop="url" content="<?php echo full_url(); ?>">
          <form class="navbar-form" role="search" action="<?php echo search_url(); ?>" id="search" itemprop="potentialAction" itemscope itemtype="http://schema.org/SearchAction">
            <div class="input-group col-xs-12">
            <meta itemprop="target" content="<?php echo full_url(); ?>search/term={query}">
              <input type="text" class="form-control search-query typeahead" id="search-term" name="term" placeholder="<?php echo _e('site.search_placeholder'); ?>" value="<?php echo search_term(); ?>">
              <button class="sr-only" type="submit"><?php echo _e('site.submit'); ?></button>
            </div>

            <?php foreach (search_divisions() as $division): ?>
            	<input class="hidden" type="checkbox" name="division[]" value="<?php echo $division; ?>" checked="checked">
            <?php endforeach; ?>

            <?php foreach (search_in() as $field): ?>
            	<input class="hidden" type="checkbox" name="in[]" value="<?php echo $field; ?>" checked="checked">
            <?php endforeach; ?>

          </form>
          </div>

        </div><!-- //.navbar-collapse -->
      </div><!-- //.container -->
    </div><!-- //.navbar -->

    <div class="container">
      <div class="row"<?php if (is_staff()) echo ' itemscope itemtype="http://schema.org/Person"'; ?>>

        <?php if (Uri::current() == '/') : ?>
    		<?php theme_include(is_category() ? 'categories' : 'divisions'); ?>
  			<?php endif; ?>


