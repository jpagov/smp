<?php $base = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/'); ?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo __('global.welcome_to_app'); ?></title>

		<style>
			body {
				font: 100% "Helvetica Neue", "Open Sans", "DejaVu Sans", "Arial", sans-serif;
				text-align: center;
				background: #444f5f;
				color: #fff;
			}
			div {
				width: 400px;
				height: 160px;
				position: absolute;
				left: 50%;
				top: 30%;
				margin: -80px 0 0 -200px;
			}
			h1 {
				font-size: 29px;
				line-height: 35px;
				font-weight: 300;
				margin: 30px 0;
			}
			a {
				display: inline-block;
				padding: 0 22px;
				background: #2F3744;
				color: #96A4BB;
				font-size: 13px;
				line-height: 38px;
				font-weight: bold;
				text-decoration: none;
				border-radius: 5px;
			}
		</style>
	</head>
	<body>
		<div>
			<img src="<?php echo $base; ?>/app/views/assets/img/jata-92x74.png" alt="Logo Direktori">
			<h1><?php echo __('global.welcome_to_app_lets_go'); ?></h1>
			<a href="<?php echo $base . '/install/index.php'; ?>"><?php echo __('global.run_the_installer'); ?></a>
		</div>

		<script>
			(function(d) {
				var v = new Date().getTimezoneOffset();
				console.log(v);
				d.cookie = "app-install-timezone=" + v + "; path=/";
			}(document));
		</script>
	</body>
</html>
