<?php
/**
 * DevSpot Theme Customizer
 *
 * @package DevSpot
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function devspot_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'devspot_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'devspot_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'devspot_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function devspot_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function devspot_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function devspot_customize_preview_js() {
	wp_enqueue_script( 'devspot-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'devspot_customize_preview_js' );


//CUSTOMIZER FOR THEME OPTIONS
add_action('customize_register', 'devspot_theme_options_settings');

function devspot_theme_options_settings( $wp_customize ){
	$wp_customize->add_section('theme_utitlies', array(
		'title' => 'Theme Utilities',
		'priority' => '200',
		'description' => 'Devspot theme utitlies'
	));
	$wp_customize->add_setting('enable_image_lazy_load', array(
		'default' => false,
		'transport' => 'refresh'
	));
	$wp_customize->add_control('enable_image_lazy_load', array(
		'label' => 'Enable Image Lazy Load',
		'section' => 'theme_utitlies',
		'settings' => 'enable_image_lazy_load',
		'type' => 'checkbox'
	));	
}

//get_theme_mod('enable_image_lazy_load');
