<?php
	/**
	 * The main template file
	 *
	 * This is the most generic template file in a WordPress theme
	 * and one of the two required files for a theme (the other being style.css).
	 * It is used to display a page when nothing more specific matches a query.
	 * E.g., it puts together the home page when no home.php file exists.
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
		<!-- SVG separator -->
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
										if (have_posts()):
											if (is_home() && !is_front_page()):
										?>
									<header>
										<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
									</header>
									<?php
										endif;
										/* Start the Loop */
										while (have_posts()):
											the_post();
											/*
											* Include the Post-Type-specific template for the content.
											* If you want to override this in a child theme, then include a file
											* called content-___.php (where ___ is the Post Type name) and that will be used instead.
											*/
											get_template_part('template-parts/content', get_post_type());
										endwhile;
											the_posts_navigation();
										else:
											get_template_part('template-parts/content', 'none');
										endif;
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