<?php
    /**
     * Template Name: Blank
     *
     * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
     *
     * @package DevSpot
     */
    
    get_header();
    ?>
<main>
    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <?php
                while (have_posts()) :
                    the_post();
                    //the_title('<div class="col-sm-12 text-center"><h2 class="page-title">', '</h2></div>');
                    //devspot_post_thumbnail();
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
</main>
<?php
get_footer();