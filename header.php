<?php
	/**
	 * The header for our theme
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package DevSpot
	 */
	
	?>
<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<header class="header-global">
			<nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom">
				<div class="container">
					<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ) ?>">
						<?php the_custom_logo() ?>
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbar-default">
						<div class="navbar-collapse-header">
							<div class="row">
								<div class="col-6 collapse-brand">
									<a href="<?php echo esc_url( home_url( '/' ) ) ?>">
									<img src="<?php echo get_template_directory_uri() ?>/assets/img/brand/blue.png">
									</a>
								</div>
								<div class="col-6 collapse-close">
									<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
									<span></span>
									<span></span>
									</button>
								</div>
							</div><div class="btn-wrapper mt-5">
										<a href="https://www.creative-tim.com/product/argon-design-system" class="btn btn-lg btn-white btn-icon mb-3 mb-sm-0">
										<span class="btn-inner--icon"><i class="ni ni-cloud-download-95"></i></span>
										<span class="btn-inner--text">Download HTML</span>
										</a>
										<a href="https://github.com/creativetimofficial/argon-design-system" class="btn btn-lg btn-github btn-icon mb-3 mb-sm-0" target="_blank">
										<span class="btn-inner--icon"><i class="fa fa-github"></i></span>
										<span class="btn-inner--text">
										<span class="text-warning">Star us</span> on Github</span>
										</a>
									</div>
									<div class="mt-5">
										<small class="text-white font-weight-bold mb-0 mr-2">*proudly coded by</small>
										<img src="<?php echo get_template_directory_uri() ?>/assets/img/brand/creativetim-white-slim.png" style="height: 28px;">
									</div>
						</div>
						<?php
							wp_nav_menu( array(
								'theme_location'=> 'menu-1',							
								'container'		=> 'ul',
								'menu_class'	=> 'navbar-nav ml-lg-auto',
								'fallback_cb'	=> false
							) );
						?>
					</div>
				</div>
			</nav>			
		</header>
		
		<main>
			<div class="position-relative">
				<!-- Hero for FREE version -->
				<section class="section section-lg section-hero section-shaped">
					<!-- Background circles -->
					<div class="shape shape-style-1 shape-primary">
						<span class="span-150"></span>
						<span class="span-50"></span>
						<span class="span-50"></span>
						<span class="span-75"></span>
						<span class="span-100"></span>
						<span class="span-75"></span>
						<span class="span-50"></span>
						<span class="span-100"></span>
						<span class="span-50"></span>
						<span class="span-100"></span>
					</div>
					<div class="container shape-container d-flex align-items-center py-lg">
						<div class="col px-0">
							<div class="row align-items-center justify-content-center">
								<div class="col-lg-6 text-center">
									<h2 class="site-title text-white"><?php bloginfo( 'name' ); ?></h2>
									<p class="lead margin-top-0 text-white">
										<?php echo get_bloginfo( 'description', 'display' ) ? get_bloginfo( 'description', 'display' ) : '' ?>
									</p>
									<div class="btn-wrapper mt-5">
										<a href="https://www.creative-tim.com/product/argon-design-system" class="btn btn-lg btn-white btn-icon mb-3 mb-sm-0">
										<span class="btn-inner--icon"><i class="ni ni-cloud-download-95"></i></span>
										<span class="btn-inner--text">Download HTML</span>
										</a>
										<a href="https://github.com/creativetimofficial/argon-design-system" class="btn btn-lg btn-github btn-icon mb-3 mb-sm-0" target="_blank">
										<span class="btn-inner--icon"><i class="fa fa-github"></i></span>
										<span class="btn-inner--text">
										<span class="text-warning">Star us</span> on Github</span>
										</a>
									</div>
									<div class="mt-5">
										<small class="text-white font-weight-bold mb-0 mr-2">*proudly coded by</small>
										<img src="<?php echo get_template_directory_uri() ?>/assets/img/brand/creativetim-white-slim.png" style="height: 28px;">
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- SVG separator -->
					<div class="separator separator-bottom separator-skew zindex-100">
						<svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
							<polygon class="fill-grey" points="2560 0 2560 100 0 100"></polygon>
						</svg>
					</div>
				</section>
			</div>
			
		</main>
		
		<section class="section bg-secondary">
			<div class="container">
				<div id="content" class="site-content">
			
		