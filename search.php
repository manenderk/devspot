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
						<h2 class="site-title-small text-white"><?php bloginfo( 'name' ); ?></h2>
						<div class="mt-4">
							<p class="text-white">
								<?php 
									include get_template_directory()."/inc/breadcrumb.php";
								?>						
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
            <div id="content" class="site-content">		
				<div id="primary" class="content-area">

					<?php if ( have_posts() ) : ?>

						<header class="page-header">
							<h1 class="page-title">
								<?php
								/* translators: %s: search query. */
								printf( esc_html__( 'Search Results for: %s', 'devspot' ), '<span>' . get_search_query() . '</span>' );
								?>
							</h1>
						</header><!-- .page-header -->

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
