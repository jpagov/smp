<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo page_title('Page can’t be found'); ?> - <?php echo site_name(); ?></title>

  <meta name="description" content="<?php echo site_description(); ?>">
  <link href="<?php echo asset('app/views/assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo asset('app/views/assets/css/app.css'); ?>">

  <link rel="alternate" type="application/rss+xml" title="RSS" href="<?php echo rss_url(); ?>">

  <meta property="og:title" content="<?php echo site_name(); ?>">
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo e(current_url()); ?>">
  <meta property="og:image" content="<?php echo theme_url('img/og_image.gif'); ?>">
  <meta property="og:site_name" content="<?php echo site_name(); ?>">
  <meta property="og:description" content="<?php echo site_description(); ?>">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php if(customised()): ?>
      <!-- Custom CSS -->
      <style><?php echo staff_css(); ?></style>

      <!--  Custom Javascript -->
      <script><?php echo staff_js(); ?></script>
    <?php endif; ?>
  </head>
  <body class="<?php echo body_class(); ?>">
    <div class="navbar navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url(); ?>"><?php echo site_name(); ?></a>
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
          <form class="navbar-form navbar-right" role="search" action="<?php echo search_url(); ?>" method="post" id="search">
            <div class="input-group">
              <input type="text" class="form-control typeahead" id="term" name="term" placeholder="To search, type and hit enter&hellip;" value="<?php echo search_term(); ?>">
              <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
              </div>
            </div>
          </form>

        </div><!-- //.navbar-collapse -->
      </div><!-- //.container -->
    </div><!-- //.navbar -->

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="well admin-container">


      <aside>
        <b>Divisions</b>
        <ul>
          <?php while(divisions()): ?>
           <li>
            <a href="<?php echo division_url(); ?>" title="<?php echo division_description(); ?>">
             <?php echo division_title(); ?> <span><?php echo division_count(); ?></span>
           </a>
         </li>
       <?php endwhile; ?>
     </ul>
   </aside>
