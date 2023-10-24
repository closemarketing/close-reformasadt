<?php
/**
 * Theme Functions
 *
 * @package    WordPress
 * @author     Angie Mulero <angie@close.marketing>
 * @copyright  2022 Closemarketing
 * @version    1.0
 */
/**
 * ## Image sizes
 * --------------------------- */
add_action( 'admin_init', 'cmpat_remove_google_fonts_array' );
/**
 * Remove Google Fonts from GeneratePress
 *
 * @return void
 */
function cmpat_remove_google_fonts_array() {
	add_filter( 'generate_typography_google_fonts', '__return_empty_string', 100 ); // Must be greater than 50.
	add_filter( 'generate_google_fonts_array', '__return_empty_array' );
	add_filter( 'generate_typography_customize_list', '__return_empty_array' );
}

add_action( 'wp_enqueue_scripts', 'cmpat_remove_google_fonts', 10 );
/**
 * Remove Google Fonts
 *
 * @return void
 */
function cmpat_remove_google_fonts() {
	wp_dequeue_style( 'generate-fonts' );
	wp_dequeue_style( 'generateblocks-google-fonts' );
}

add_action( 'wp_enqueue_scripts', 'cmk_theme_scripts', 99 );
/**
 * Loads Scriptss
 *
 * @return void
 */
function cmk_theme_scripts() {
	wp_enqueue_style(
		'closemarketing',
		CMKADT_PLUGIN_URL . 'includes/theme/style.css',
		array(),
		CMKADT_VERSION
	);
	wp_register_script(
		'owl-carousel',
		plugin_dir_url( __FILE__ ) . 'js/owl.carousel.min.js',
		array( 'jquery' ),
		CMKADT_VERSION,
		true
	);
	wp_enqueue_script( 'owl-carousel' );

	wp_register_script(
		'cmklv-home-carr',
		plugin_dir_url( __FILE__ ) . 'js/cmklv-home-carr.js',
		array( 'jquery' ),
		CMKADT_VERSION,
		true
	);
	wp_enqueue_script( 'cmklv-home-carr' );
}

/**
 * # Gutenberg - Visual Editor
 * ---------------------------------------------------------------------------------------------------- */

add_action( 'after_setup_theme', 'cmpat_add_editor_style' );
/**
 * Editor Styles
 *
 * @return void
 */
function cmpat_add_editor_style() {
	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );

	// Enqueue editor styles.
	add_editor_style( CMKADT_PLUGIN_URL . 'includes/theme/style-editor.css' );

	// Adds default style.
	add_theme_support( 'wp-block-styles' );

}

/**
 * # Tag Manager
 * ---------------------------------------------------------------------------------------------------- */
add_action( 'wp_body_open', 'cmpat_tag_manager' );

/**
* Adds Tag manager to body tag.
*
* @return void
*/
function cmpat_tag_manager() {
	if ( function_exists( 'gtm4wp_the_gtm_tag' ) ) {
		gtm4wp_the_gtm_tag();
	}
}