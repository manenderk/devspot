<?php
function page_content_minify_css_javascript(){
    ob_start();
    include get_template_directory() . '/inc/page-partials/minify-css-javascript.php';
    return ob_get_clean();
}

add_shortcode('MINIFY_CSS_JAVSCRIPT', 'page_content_minify_css_javascript');
