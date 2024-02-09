<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package corlate
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
<header id="header">
	<div class="top-bar">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-xs-4">
					<div class="top-number">
						<a href="tel:<?php echo get_theme_mod('Phn_no'); ?>">
							<img src="<?php if(get_theme_mod('Phn_no')): echo get_theme_mod('phn_logo'); endif; ?>" /><?php echo get_theme_mod('Phn_no'); ?>
						</a>
					</div>
				</div>
				<div class="col-sm-6 col-xs-8">
					<div class="social">
						<?php
						if(wp_get_nav_menu_object('Top Bar')):
								wp_nav_menu( 
									array(
									'theme_location' => 'Top_Bar',
									'menu_class' => 'social-share',
									'container' => '<ul>'
								)
							);
						endif;
						?>
						<div class="search">
							<?php get_search_form(); ?>
						</div>
					</div>
				</div>

			</div>
		</div><!--/.container-->
	</div><!--/.top-bar-->
	
	<nav class="navbar navbar-inverse" role="banner">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo get_site_url(); ?>">
				<?php
					the_custom_logo();
				?>
				</a>
			</div>
			
			<div class="collapse navbar-collapse navbar-right">
				<?php
					if(wp_get_nav_menu_object('Navbar')):
						wp_nav_menu(
							array(
								'menu' => 'Navbar',
								'theme_location' => 'Primary',
								'container' => '',
								'menu_class' => 'nav navbar-nav',
							)
						);
					endif;
				?>
			</div>
		</div><!--/.container-->
	</nav><!--/nav-->
	
</header><!--/header-->

