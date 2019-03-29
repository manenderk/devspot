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
			
		