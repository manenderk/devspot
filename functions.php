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

if ( ! function_exists( 'devspot_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
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

	wp_enqueue_style( 'devspot-argon', get_template_directory_uri() . '/assets/css/argon.css' );
	wp_enqueue_style( 'devspot-custom', get_template_directory_uri() . '/assets/css/custom.css' );

	wp_enqueue_script( 'devspot-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'jQuery', get_template_directory_uri() . '/assets/vendor/jquery/jquery.min.js', array(), '3.2.1', true );

	wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/vendor/popper/popper.min.js', array(), '1.0', true );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/bootstrap.min.js', array(), '4.1.3', true );

	wp_enqueue_script( 'headroom', get_template_directory_uri() . '/assets/vendor/headroom/headroom.min.js', array(), '1.0', true );

	wp_enqueue_script( 'onscreen', get_template_directory_uri() . '/assets/vendor/onscreen/onscreen.min.js', array(), '0.0.0', true );
	wp_enqueue_script( 'nouislider', get_template_directory_uri() . '/assets/vendor/nouislider/js/nouislider.min.js', array(), '11.0.3', true );
	wp_enqueue_script( 'bootstrap-datepicker', get_template_directory_uri() . '/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js', array(), '1.8.0', true );

	wp_enqueue_script( 'devspot-argon', get_template_directory_uri() . '/assets/js/argon.js', array(), '1.0', true );

	wp_enqueue_script( 'devspot-custom', get_template_directory_uri() . '/assets/js/custom.js', array(), '1.0', true );



	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'devspot_styles_and_scripts' );

function devspot_add_footer_styles() {
    wp_enqueue_style( 'devspot-font', get_template_directory_uri() . '/assets/css/devspot-font.min.css' );
    wp_enqueue_style( 'nucleo-icon', get_template_directory_uri() . '/assets/vendor/nucleo/css/nucleo.css' );
    wp_enqueue_style( 'font-awesome-icon', get_template_directory_uri() . '/assets/vendor/font-awesome/css/font-awesome.min.css' );
    
};
add_action( 'get_footer', 'devspot_add_footer_styles' );


