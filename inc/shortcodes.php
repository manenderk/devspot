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

function page_content_shortlink_dashboard(){
    ob_start();
    include get_template_directory() . '/inc/page-partials/shortlink-dashboard.php';
    return ob_get_clean();
}
add_shortcode('SHORTLINK_DASHBOARD', 'page_content_shortlink_dashboard');

function page_content_tools_page(){
    ob_start();
    include get_template_directory() . '/inc/page-partials/tools-page.php';
    return ob_get_clean();
}
add_shortcode('TOOLS_PAGE', 'page_content_tools_page');

function page_content_profile_page(){
    ob_start();
    include get_template_directory() . '/inc/page-partials/profile-page.php';
    return ob_get_clean();
}
add_shortcode('PROFILE_PAGE', 'page_content_profile_page');

function page_content_code_formatter_page(){
    ob_start();
    include get_template_directory() . '/inc/page-partials/code-formatter-page.php';
    return ob_get_clean();
}
add_shortcode('CODE_FORMATTER', 'page_content_code_formatter_page');
