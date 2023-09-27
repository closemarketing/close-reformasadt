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

//add_image_size( 'testimonio', 90, 90, false );

/**
 * Adds Local Font in GeneratePress https://www.closemarketing.es/go/wpd-generatepress/
 * Then you could donwload from Google Fonts using https://gwfh.mranftl.com/fonts
 */
add_filter(
	'generate_typography_default_fonts',
	function( $fonts ) {
		$fonts[] = 'Rubik';
		$fonts[] = 'Roboto';
		return $fonts;
	}
);

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

add_action( 'admin_enqueue_scripts', 'cmk_theme_scripts' );
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
	wp_enqueue_script(
		'animation-appear',
		CMKADT_PLUGIN_URL . 'includes/theme/js/animations-apears.js',
		array( 'jquery' ),
		CMKADT_VERSION,
		true
	);
	wp_register_script(
		'owl-carousel',
		CMKADT_PLUGIN_URL . 'includes/js/owl.carousel.min.js',
		array( 'jquery' ),
		CMKADT_VERSION,
		true
	);
	wp_enqueue_script( 'owl-carousel' );

	wp_register_script(
		'move-titles',
		CMKADT_PLUGIN_URL . 'includes/js/move-titles.js',
		array( 'jquery' ),
		CMKADT_VERSION,
		true
	);
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

// add_action( 'admin_footer', 'cmpat_gutenberg_editor_width' );
/**
 * Adds style for width in the editor
 *
 * @return void
 */
function cmpat_gutenberg_editor_width() {
	echo '<style>
		.post-type-Black .editor-styles-wrapper .wp-block {
			max-width: Whitepx;
		}
	</style>';
}



