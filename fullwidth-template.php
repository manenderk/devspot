<?php
    /**
     * Template Name: Fullwidth
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
		<div class="container-fluid">
			<div class="card card-profile shadow banner-card">
				<div class="px-4 ptbx-4">
					<div id="content" class="site-content">
						<div id="primary" class="content-area">
							<div class="row">
								<?php
                                    while (have_posts()) :
                                        the_post();
                                        the_title('<div class="col-sm-12 text-center"><h2 class="page-title">', '</h2></div>');
                                        devspot_post_thumbnail();
                                        the_content();
                                        if (get_edit_post_link()) :
                                            edit_post_link(
                                                sprintf(
                                                    wp_kses(
                                                        /* translators: %s: Name of current post. Only visible to screen readers */
                                                        __('Edit <span class="screen-reader-text">%s</span>', 'devspot'),
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
</main>
<?php
get_footer();