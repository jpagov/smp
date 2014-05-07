<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?php echo __('global.manage'); ?> <?php echo Config::meta('sitename'); ?></title>

  <link href="<?php echo asset('app/views/assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo asset('app/views/assets/css/app.css'); ?>">
  <link rel="stylesheet" href="<?php echo asset('app/views/assets/css/bootstrap-markdown.min.css'); ?>">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body<?php echo onload(); ?>>
<div class="navbar navbar-inverse" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo Uri::to('admin/staffs'); ?>">Employee Directory</a>
    </div>

    <?php $user = Auth::user(); if($user): ?>
    <div class="navbar-collapse collapse navbar-inverse-collapse">

    <?php
      $menu = array('staffs', 'pages');
      $hierarchies = array('divisions', 'branchs', 'sectors', 'units');
      $admin = array('users');
    ?>

      <ul class="nav navbar-nav">

        <?php foreach($menu as $url): ?>
        <li <?php if(strpos(Uri::current(), $url) !== false) echo 'class="active"'; ?>>
          <a href="<?php echo Uri::to('admin/' . $url); ?>"><?php echo __($url . '.' . $url); ?></a>
        </li>
        <?php endforeach; ?>

        <?php if($user->role == 'administrator'): ?>
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('global.administration'); ?> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <?php foreach($hierarchies as $url): ?>
              <li <?php if(strpos(Uri::current(), $url) !== false) echo 'class="active"'; ?>>
                <a href="<?php echo Uri::to('admin/' . $url); ?>">
                  <?php echo __('global.' . $url); ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </li>
        <?php endif; ?>

      </ul>

      <ul class="nav navbar-nav navbar-right">
       <li><a href="<?php echo Uri::to('admin/logout'); ?>"><span class="glyphicon glyphicon-off"></span> <?php echo __('global.logout'); ?></a></li>
       <li class="dropdown">
         <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('settings.setting'); ?> <b class="caret"></b></a>
         <ul class="dropdown-menu">
            <li><a href="<?php echo Uri::to('admin/users'); ?>"><?php echo __('users.users'); ?></a></li>
           <li><a href="<?php echo Uri::to('admin/setting/fields'); ?>"><?php echo __('settings.fields'); ?></a></li>
           <li><a href="<?php echo Uri::to('admin/setting/variables'); ?>"><?php echo __('settings.variables'); ?></a></li>
           <li><a href="<?php echo Uri::to('admin/setting/metadata'); ?>"><?php echo __('metadata.metadata'); ?></a></li>
           <li class="divider"></li>
           <li><a href="<?php echo Uri::to('/'); ?>"><?php echo __('global.visit_your_site'); ?></a></li>
         </ul>
       </li>
      </ul>
    </div> <!-- //.navbar-collapse -->
    <?php endif; ?>

  </div> <!-- //.container -->
</div> <!-- //.navbar -->

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="well admin-container">
