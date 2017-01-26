<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title><?php bloginfo('name');?> | <?php bloginfo('description'); ?> </title>

	<!-- Bootstrap -->
	<!-- <link href="<?php echo get_template_directory_uri();?>/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo get_template_directory_uri();?>/css/bootstrap-social.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/font-awesome/css/font-awesome.min.css"> -->
	<link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	  <![endif]-->
	</head>
	<?php wp_head(); ?>
	<body <?php body_class(); ?>>
		<div class="container" >
			<div class="row" id="topnav">
				<?php 
					wp_nav_menu(array(
						'theme_location'=>'top_menu',
						'menu_class'=>'nav-top navbar-right',
						'walker'=> new wp_bootstrap_navwalker(),

						));
				 ?>
			</div>
			<div class="row" id="header">
				<div class="col-xs-6">
					
					<?php 
						$var = get_theme_mod('logo_uploader');
						if($var===''):?>
							<h1><?php bloginfo('name'); ?></h1>
						<?php else: ?>
							<a href="<?php bloginfo('home'); ?>"><img src="<?php echo get_theme_mod('logo_uploader') ?>" class="img-responsive"></a>
					 <?php endif; ?>
					
					
				</div>
				<div class="col-xs-6">
					<div class="row">
						<div class="col-xs-6">

						
						</div>
						<div class="col-xs-6">
							<div class="row">
								<?php my_social_icons(); ?>
							</div>
							<div class="row" id="searchform">
								<div class="right-inner-addon">

									<i class="glyphicon glyphicon-search"></i>
									<form method="get" action="<?php bloginfo('home'); ?>">
										<input name="s" type="search" class="form-control searchform" placeholder="Search">
									</form>
								</div><!-- end of right-inner-addon-->
							</div>
						
						</div>
					</div>

				</div>
			</div>
			<div class="row">

				<nav class="navbar navbar-default">

						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<?php  
							wp_nav_menu(array(
								'theme_location'=>'main_menu',
								'menu_class'=>'nav navbar-nav',
								'container_class'=>'collapse navbar-collapse',
								'container_id'=>'bs-example-navbar-collapse-1',
								'fallback_cb'=>'wp_bootstrap_navwalker::fallback',
								'walker'=> new wp_bootstrap_navwalker()
							))

						?>
				</nav>

			</div>