<?php
/**
 * Plugin Name: CLOSE Reformas ADT
 * Plugin URI:  https://close.marketing
 * Description: Plugin para desarrollo de la página de Reformas ADT.
 * Version:     1.0.0
 * Author:      Closemarketing
 * Author URI:  https://close.marketing
 * Text Domain: closemarketing
 * Domain Path: /languages
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package     WordPress
 * @author      David Pérez
 * @copyright   2023 Closemarketing
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 *
 * Prefix:      CMKADT_
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

define( 'CMKADT_VERSION', '1.0.0' );
define( 'CMKADT_PLUGIN', __FILE__ );
define( 'CMKADT_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'CMKADT_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

add_action( 'plugins_loaded', 'CMKADT_plugin_init' );
/**
 * Load localization files
 *
 * @return void
 */
function cmkadt_plugin_init() {
	load_plugin_textdomain( 'closemarketing', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

/**
 * ## Includes
 * --------------------------- */
require_once CMKADT_PLUGIN_PATH . 'includes/custom-login/class-ccaa-admin.php';
require_once CMKADT_PLUGIN_PATH . 'includes/post-types/cpt-proyectos.php';
require_once CMKADT_PLUGIN_PATH . 'includes/post-types/cpt-servicios.php';


add_filter( 'stylesheet_directory', 'cmkadt_filter_stylesheet_directory', 10, 3 );
/**
 * Adds stylesheet directory support
 *
 * @param string $stylesheet_dir
 * @param string $stylesheet
 * @param string $theme_root
 * @return string
 */
function cmkadt_filter_stylesheet_directory( $stylesheet_dir, $stylesheet, $theme_root ) {
	$stylesheet_dir = CMKADT_PLUGIN_PATH . 'includes/theme';
	return $stylesheet_dir;
}
