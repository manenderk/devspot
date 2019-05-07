<?php
/**
 * Template Name: Landing Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DevSpot
 */

get_header();
?>
<main>
	<div class="position-relative">
		<section class="section section-lg section-hero section-shaped">
			<div class="shape shape-style-1 shape-default">
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
							<a href="<?php echo esc_url( home_url( '/' ) ) ?>">
								<h2 class="site-title text-white"><?php bloginfo( 'name' ); ?></h2>
							</a>
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
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="separator separator-bottom separator-skew zindex-100">
				<svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
					<polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
				</svg>
			</div>
		</section>
	</div>
	

	
			<div id="content" class="site-content">		
				<div id="primary" class="content-area">
						<?php
						while( have_posts() ) :
							the_post();
							the_content();
							if ( get_edit_post_link() ) :
								edit_post_link(
									sprintf(
										wp_kses(
											/* translators: %s: Name of current post. Only visible to screen readers */
											__( 'Edit <span class="screen-reader-text">%s</span>', 'devspot' ),
											array(
												'span' => array(
													'class' => array(),
												),
											)
										),
										get_the_title()
									),
									'<div class="col-sm-12"><p class="edit-link">',
									'</p></div>'
								);							
							endif;
						endwhile;
						?>
				
				</div>	    
			</div>
	   
</main>
<?php
get_footer();

