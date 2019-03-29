<?php
/**
 * Template Name: Fullwidth Card
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
					<?php
					while( have_posts() ) :
						the_post();
						the_title( '<h2 class="page-title">', '</h2>' );
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
								'<p class="edit-link">',
								'</p>'
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
</main>
<?php
get_footer();
