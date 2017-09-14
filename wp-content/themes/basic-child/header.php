<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header" role="banner">

		<div class="section container">
			<div class="col-group">
				<div class="header-logo col-mb-4 col-tb-6 col-dt-4 col-ld-3">
					<a href="<?php echo get_option('home'); ?>/" class="logo">
						<span class="iso"></span>
						<span class="logo"></span>
					</a>
				</div>
				<div class="col-mb-8 col-tb-6 col-dt-8 col-ld-9">
					<nav id="site-navigation" class="main-navigation" role="navigation">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><p>Menu</p><i class="icon-menu"></i></button>
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
					</nav><!-- #site-navigation -->
				</div>
			</div>
		</div>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
