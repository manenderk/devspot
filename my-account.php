<?php
/**
 * Template Name: My Account
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
		<?php if(is_user_logged_in()) : ?>
		<section class="section">
			<div class="container">
				<div class="card card-profile shadow banner-card mt--200">
					<div class="px-4 ptbx-4">
						<div id="content" class="site-content">
							<div id="primary" class="content-area">
								<div class="row">
									<?php
										while( have_posts() ) :
											the_post();
											the_title( '<div class="col-sm-12"><h2 class="page-title">', '</h2></div>' );
											devspot_post_thumbnail();
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
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php else : ?>
		<section class="section">
			<div class="container">
				<div class="row justify-content-center mt--200">
					<div class="col-lg-8">
						<div class="card bg-gradient-secondary shadow">
							<div class="card-body p-lg-5">
								<?php
									while( have_posts() ) :
										the_post();
										the_title( '<div class="col-sm-12"><h2 class="page-title">', '</h2></div>' );
										devspot_post_thumbnail();
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
					</div>
				</div>
			</div>
		</section>
		<?php endif; ?>
	</div>
	
</main>
<?php
get_footer();