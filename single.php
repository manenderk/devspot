<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package DevSpot
 */

get_header();
?>
<main>
	<section class="section-profile-cover section-shaped my-0">
		<div class="shape shape-style-1 shape-primary alpha-4">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
		<div class="container banner-small shape-container d-flex align-items-center py-lg">
			<div class="col px-0">
				<div class="row align-items-center justify-content-center">
					<div class="col-lg-6 text-center">
						<h2 class="site-title-small text-white"><?php bloginfo('name'); ?></h2>
						<div class="mt-4">
							<p class="text-white">
								<?php include get_template_directory() . "/inc/breadcrumb.php"; ?>						
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="separator separator-bottom separator-skew">
			<svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
				<polygon class="fill-grey" points="2560 0 2560 100 0 100"></polygon>
			</svg>
		</div>
	</section>
	<section class="section bg-secondary">
		<div class="container">
			<div class="card card-profile shadow banner-card">
				<div class="px-4 ptbx-4">
					<div class="row">
						<div class="col-md-8">
							<div id="content" class="site-content">
								<div id="primary" class="content-area">

								<?php
								while ( have_posts() ) :
									the_post();

									get_template_part( 'template-parts/content', get_post_type() );

									the_post_navigation();

									// If comments are open or we have at least one comment, load up the comment template.
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;

								endwhile; // End of the loop.
								?>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<?php get_sidebar(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
<?php
get_footer();