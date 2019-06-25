<?php
	/**
	 * The template for displaying search results pages
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
					<div id="content" class="site-content">
						<div id="primary" class="content-area">
							
							<?php if ( have_posts() ) : ?>
								<div class="row">
									<div class="col-md-12">
										<header class="page-header">
										<h1 class="page-title">
											<?php
												/* translators: %s: search query. */
												printf( esc_html__( 'Search Results for: %s', 'devspot' ), '<span>' . get_search_query() . '</span>' );
												?>
										</h1>
										</header>
									</div>
								</div>
								<div class="row">
									<div class="col-md-8">
										<!-- .page-header -->
										<?php
											/* Start the Loop */
											while ( have_posts() ) :
												the_post();
											
												/**
												 * Run the loop for the search to output the results.
												 * If you want to overload this in a child theme then include a file
												 * called content-search.php and that will be used instead.
												 */
												get_template_part( 'template-parts/content', 'search' );
											
											endwhile;
											
											the_posts_navigation();
											
											
										?>
									</div>
									<div class="col-md-4">
										<?php get_sidebar(); ?>
									</div>
								</div>
							<?php
								else :
								
									get_template_part( 'template-parts/content', 'none' );
											
								endif;
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
<?php
get_footer();