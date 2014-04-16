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

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="<?php echo Auth::guest() ? 'login' : 'admin'; ?>">

        <div class="navbar navbar-inverse">
        	<div class="container">
	          <div class="navbar-header">
	            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	            </button>
	            <a class="navbar-brand" href="<?php echo Uri::to('admin/posts'); ?>">Employee Directory</a>
	          </div>
					
          <div class="navbar-collapse collapse navbar-inverse-collapse">
	          <?php if(Auth::user()): ?>
						<?php $menu = array('posts', 'comments', 'pages', /*'menu',*/ 'categories', 'users', 'extend'); ?>

	            <ul class="nav navbar-nav">
	            <?php foreach($menu as $url): ?>
	              <li <?php if(strpos(Uri::current(), $url) !== false) echo 'class="active"'; ?>>
	                  <a href="<?php echo Uri::to('admin/' . $url); ?>">
	                      <?php echo ucfirst(__($url . '.' . $url)); ?>
	                  </a>
	              </li>
	              <?php endforeach; ?>
	            </ul>
	            <ul class="nav navbar-nav navbar-right">
	              <li><?php echo Html::link('admin/logout', __('global.logout')); ?></li>
	              <li class="dropdown">
	                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
	                <ul class="dropdown-menu">
	                  <li><a href="#">Action</a></li>
	                  <li><a href="#">Another action</a></li>
	                  <li><a href="#">Something else here</a></li>
	                  <li class="divider"></li>
	                  <li><a href="#">Separated link</a></li>
	                </ul>
	              </li>
	            </ul>
	            <?php endif; ?>
            </div> <!-- //.navbar-collapse -->
          </div> <!-- //.container -->
				</div> <!-- //.navbar -->

				<div class="container">
		      <div class="row">
		        <div class="col-lg-12">
		          <div class="well admin-container">