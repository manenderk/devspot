<?php
function page_content_minify_css_javascript(){
    ob_start();
    include get_template_directory() . '/inc/page-partials/minify-css-javascript.php';
    return ob_get_clean();
}
add_shortcode('MINIFY_CSS_JAVSCRIPT', 'page_content_minify_css_javascript');

function page_content_color_converter(){
    ob_start();
    include get_template_directory() . '/inc/page-partials/color-converter.php';
    return ob_get_clean();
}
add_shortcode('COLOR_CONVERTER', 'page_content_color_converter');

function page_content_aspect_ratio_calculator(){
    ob_start();
    include get_template_directory() . '/inc/page-partials/aspect-ratio-calculator.php';
    return ob_get_clean();
}
add_shortcode('ASPECT_RATIO_CALCULATOR', 'page_content_aspect_ratio_calculator');

function page_content_home_page(){
    ob_start();
    include get_template_directory() . '/inc/page-partials/home-page.php';
    return ob_get_clean();
}
add_shortcode('HOME_PAGE', 'page_content_home_page');

/*function page_content_login_page(){
    ob_start();
    include get_template_directory() . '/inc/page-partials/login-page.php';
    return ob_get_clean();
}
add_shortcode('devspot-login', 'page_content_login_page');*/