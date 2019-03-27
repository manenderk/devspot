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
      <!-- Circles background -->
      <div class="shape shape-style-1 shape-primary alpha-4">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
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
        <div class="card card-profile shadow mt--300">
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
