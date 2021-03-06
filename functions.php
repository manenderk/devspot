<?php
/**
 * DevSpot functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package DevSpot
 */

// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

//Remove wordpress version number
remove_action('wp_head', 'wp_generator');

// remove version from rss
add_filter('the_generator', '__return_empty_string');

// remove version from scripts and styles
function devspot_remove_version_scripts_styles($src) {
	if (strpos($src, 'ver=')) {
		$src = remove_query_arg('ver', $src);
	}
	return $src;
}
add_filter('style_loader_src', 'devspot_remove_version_scripts_styles', 9999);
add_filter('script_loader_src', 'devspot_remove_version_scripts_styles', 9999);

//Remove recent comment styling
add_filter( 'show_recent_comments_widget_style', function() { return false; });

//Add class to menu item
function devspot_nav_item_class( $classes, $item, $args ) {
    //if ( 'menu-1' === $args->theme_location )
        $classes[] = 'nav-item';
    return $classes;
}
add_filter( 'nav_menu_css_class', 'devspot_nav_item_class', 10, 3 );

//Add class to menu item link
function devspot_nav_item_link_class( $atts, $item, $args) {
    //if ( 'menu-1' === $args->theme_location )
        $atts['class'] = "nav-link";
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'devspot_nav_item_link_class', 10, 3 );

//Defer JS
/*function to add async to all scripts*/
/* function js_async_attr($tag, $handle, $src){
	if($handle == 'devspot-script')
		return str_replace( ' src', ' defer="defer" src', $tag );
	else
		return $tag;
}
add_filter( 'script_loader_tag', 'js_async_attr', 10, 3 ); */

//Add search icon in header menu
function add_last_nav_item($items, $args) {
	if ( 'menu-1' === $args->theme_location ){
	    $items 	.= 	'<li class="nav-item dropdown">
		                <a class="nav-link nav-link-icon" id="navbar-default_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		                  <i class="fa fa-search" aria-hidden="true"></i>
		                  <span class="nav-link-inner--text d-lg-none">Search</span>
		                </a>
		                <div class="dropdown-menu dropdown-menu-right search-dropdown" aria-labelledby = "navbar-default_dropdown_1">
		                 	<form id="searchform" class="header-search-form" method="get" action="' . esc_url( home_url( '/' ) ) . '">
		                 		<div class="input-group">
						        	<input class="form-control" placeholder="Search..." type="text"  name="s" id="s" size="30">
						        	<div class="input-group-append">
							            <span class="input-group-text p-0 header-input-group">
							            	<button type="submit" class="btn">
							            		<i class="fa fa-search" aria-hidden="true"></i>
							            	</button>
							            </span>
							        </div>
							    </div>
						    </form>
		                </div>
		            </li>';
	}
  	return $items;
}
add_filter( 'wp_nav_menu_items', 'add_last_nav_item', 10, 4 );

if ( ! function_exists( 'devspot_setup' ) ) :
	
	function devspot_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on DevSpot, use a find and replace
		 * to change 'devspot' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'devspot', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'devspot' ),
			'menu-2' => esc_html__( 'Footer', 'devspot' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'devspot_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'devspot_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function devspot_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'devspot_content_width', 640 );
}
add_action( 'after_setup_theme', 'devspot_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function devspot_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'devspot' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'devspot' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'devspot_widgets_init' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Enqueue scripts and styles.
 */
function devspot_styles_and_scripts() {
	wp_enqueue_style( 'devspot-style', get_template_directory_uri() . '/build/css/devspot-style.min.css', array(), '0.1');   
	wp_enqueue_script( 'devspot-script', get_template_directory_uri() . '/build/js/devspot-script.min.js', array(), '0.1', true );
	
	global $wp;
	$currentUrl = basename($wp->request);
	
	if($currentUrl == 'shortlink-dashboard'){
		wp_enqueue_style('chart-style', get_template_directory_uri() . '/build/vendor/charts/chart.min.css', array(), '2.8.0');
    	wp_enqueue_script('chart-script', get_template_directory_uri() . '/build/vendor/charts/chart.bundle.min.js', array(), '2.8.0', true);
    	wp_enqueue_script('devspot-shortlink-dashboard-script', get_template_directory_uri() . '/build/tools/js/devspot-shortlink-dashboard.js', array(), '2.8.0', true);
	}
	else if($currentUrl == 'code-formatter'){
		wp_enqueue_style('highlight-style', get_template_directory_uri() . '/build/vendor/code-highlighter/highlight.css', array(), '0.0.1');
		wp_enqueue_script('highlight-script', get_template_directory_uri() . '/build/vendor/code-highlighter/highlight.js', array(), '0.0.1', true);
		wp_enqueue_script('devspot-code-formatter-script', get_template_directory_uri() . '/build/tools/js/devspot-code-formatter.js', array(), '0.0.1', true);
	}
	else if($currentUrl == 'aspect-ratio-calculator'){
		wp_enqueue_script('devspot-aspect-ratio-calculator-script', get_template_directory_uri() . '/build/tools/js/devspot-aspect-ratio-calculator.js', array(), '0.0.1', true);

	}
	else if($currentUrl == 'color-converter'){
		wp_enqueue_script('devspot-color-converter-script', get_template_directory_uri() . '/build/tools/js/devspot-color-converter.js', array(), '0.0.1', true);

	}
	else if($currentUrl == 'minify-css-javascript'){
		wp_enqueue_script('devspot-css-js-minifier-script', get_template_directory_uri() . '/build/tools/js/devspot-css-js-minifier.js', array(), '0.0.1', true);

	}
	else if($currentUrl == 'json-explorer'){
        wp_enqueue_style('devspot-json-explorer-style', get_template_directory_uri() . '/build/tools/css/devspot-json-explorer.css', array(), '0.0.1');
        wp_enqueue_script('devspot-json-explorer-script', get_template_directory_uri() . '/build/tools/js/devspot-json-explorer.js', array(), '0.0.1', true);
	}
	else if($currentUrl == 'my-portfolio'){
		wp_enqueue_style('google-font-clicker', 'https://fonts.googleapis.com/css?family=Clicker+Script&display=swap', false);
		wp_enqueue_style('devspot-3dgrid-normalize', get_template_directory_uri(). '/build/vendor/3dgrid/css/normalize.css', array(), '0.0.1');
		wp_enqueue_style('devspot-3dgrid-component', get_template_directory_uri(). '/build/vendor/3dgrid/css/component.css', array(), '0.0.1');
		wp_enqueue_script('devspot-3dgrid-modernizr', get_template_directory_uri(). '/build/vendor/3dgrid/js/modernizr.custom.js', array(), '0.0.1', true);
		wp_enqueue_script('devspot-3dgrid-classie', get_template_directory_uri(). '/build/vendor/3dgrid/js/classie.js', array(), '0.0.1', true);
		wp_enqueue_script('devspot-3dgrid-helper', get_template_directory_uri(). '/build/vendor/3dgrid/js/helper.js', array(), '0.0.1', true);
		wp_enqueue_script('devspot-3dgrid-grid3d', get_template_directory_uri(). '/build/vendor/3dgrid/js/grid3d.js', array(), '0.0.1', true);
		wp_enqueue_script('devspot-3dgrid-custom', get_template_directory_uri(). '/build/vendor/3dgrid/js/custom.js', array(), '0.0.1', true);
	}

	if (!is_admin()) {
        wp_deregister_script('jquery');
    }

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'devspot_styles_and_scripts' );

/* function devspot_add_footer_styles() {
    
};
add_action( 'get_footer', 'devspot_add_footer_styles' ); */

//Include shortcodes
include get_template_directory() . '/inc/shortcodes.php';

//Hide Admin Bar
function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
		show_admin_bar(false);
	}
}
add_action('after_setup_theme', 'remove_admin_bar');

function getPageSlug(){
    global $wp;
    $currentUrl = basename($wp->request);
    return $currentUrl;
}

//PROTECT PAGES
function protect_restricted_pages() {
	$currentUrl = getPageSlug();
    $protectedPages = [
		'shortlink-dashboard'
	];

	if(!is_user_logged_in() && in_array($currentUrl, $protectedPages) ){
		$loginUrlPageId = get_option('user_registration_myaccount_page_id');
		$loginPage = '';
		if($loginUrlPageId === false){
			$loginPage = home_url('/my-account/');
		}
		else{
			$loginPage = get_permalink($loginUrlPageId);
		}
		wp_redirect($loginPage);
	}

}
add_action( 'wp_head', 'protect_restricted_pages' );

//ADD LAZY LOAD
if(get_theme_mod('enable_image_lazy_load')){
	function devspot_additional_script_styles() {
		wp_enqueue_script( 'lazyload', get_template_directory_uri() . '/assets/js/lazyload.js', array(), '0.1', true );
	}
	add_action( 'wp_enqueue_scripts', 'devspot_additional_script_styles' );

	function add_lazyload($content) {
		$pattern = '/(<img(.|)*)src/mi';
		$replacement = '$1data-src';
		return preg_replace($pattern, $replacement, $content);
	}
	add_filter('the_content', 'add_lazyload', 1000);
}

//optimize plugin scripts
/*add_filter( 'script_loader_tag', function ( $tag, $handle ) {
	if( $handle == 'jquery-core')
		return '';

    if ( 'ur-google-recaptcha' == $handle)
        return str_replace( ' src', ' defer src', $tag );

    return $tag;
}, 10, 2 );*/
/*
add_action( 'wp_print_scripts', 'cyb_list_scripts' );
function cyb_list_scripts() {
    global $wp_scripts;
    $enqueued_scripts = array();
    foreach( $wp_scripts->queue as $handle ) {
        $enqueued_scripts[] = $wp_scripts->registered[$handle]->src;
    }
    var_dump($enqueued_scripts);
}
add_action( 'wp_print_styles', 'cyb_list_styles' );
function cyb_list_styles() {
    global $wp_styles;
    $enqueued_styles = array();
    foreach( $wp_styles->queue as $handle ) {
        $enqueued_styles[] = $wp_styles->registered[$handle]->src;
    }
    var_dump($enqueued_styles);
}*/

//Remove Contact Form 7 plugin Css and Script
add_action('wp_print_scripts', 'deregister_cf7_javascript', 100);
function deregister_cf7_javascript() {
	$currentUrl = getPageSlug();
    if ($currentUrl != 'feedback') {
        wp_deregister_script('contact-form-7');
    }
}
add_action('wp_print_styles', 'deregister_cf7_styles', 100);
function deregister_cf7_styles() {
	$currentUrl = getPageSlug();
    if ($currentUrl != 'feedback') {
        wp_deregister_style('contact-form-7');
	}
	
}

//Remove dashicons from frontend
add_action('wp_print_styles', 'deregister_dashicons', 200);
function deregister_dashicons() {
    $currentUrl = getPageSlug();
    if(!is_user_logged_in()){
        wp_deregister_style('dashicons');
    }
}

//Remove user registration plugin css 
add_action('wp_print_styles', 'deregister_user_registration_css', 300);
function deregister_user_registration_css()
{
	$currentUrl = getPageSlug();
	$loginPages = [
		'my-account',
		'register',
		'edit-password',
		'user-logout',
		'lost-password',
		'edit-profile'
	];
    if (!in_array($currentUrl, $loginPages)) {
        wp_deregister_style('user-registration-general');
		wp_deregister_style('user-registration-smallscreen');
		wp_deregister_style('user-registration-my-account-layout');
    }
}


