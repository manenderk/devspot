<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DevSpot
 */

get_header();
?>
<main>
	<?php include 'inc/common-banner.php' ?>
	<section class="section bg-secondary">
		<div class="container">
			<div class="card card-profile shadow banner-card">
				<div class="px-4 ptbx-4">
					<div class="row">
						<div class="col-md-8">
							<div id="content" class="site-content">
								<div id="primary" class="content-area">

									<?php if (have_posts()) : ?>

									<header class="page-header">
										<?php
                                            the_archive_title('<h1 class="page-title">', '</h1>');
                                            the_archive_description('<div class="archive-description">', '</div>');
                                            ?>
									</header><!-- .page-header -->

									<?php
                                        /* Start the Loop */
                                        while (have_posts()) :
                                            the_post();

                                            /*
                                         * Include the Post-Type-specific template for the content.
                                         * If you want to override this in a child theme, then include a file
                                         * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                                         */
                                            get_template_part('template-parts/content', get_post_type());

                                        endwhile;
                                        the_posts_navigation();
                                    else :
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
