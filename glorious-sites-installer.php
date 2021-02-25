<?php
/**
 * Plugin Name: Glorious Sites Installer
 * Plugin URI: https://gloriousthemes.com/demo-importer/
 * Description: Import GloriousThemes official themes demo content, widgets and theme settings with just one click.
 * Version: 1.0.0
 * Author: GloriousThemes
 * Author URI: https://gloriousthemes.com
 * License: GPLv3 or later
 * Text Domain: glorious-sites-installer
 * Domain Path: /languages/
 *
 * @package GloriousThemes_Demo_Importer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Define TGDM_PLUGIN_FILE.
if ( ! defined( 'TGDM_PLUGIN_FILE' ) ) {
	define( 'TGDM_PLUGIN_FILE', __FILE__ );
}

// Include the main GloriousThemes Starter Sites class.
if ( ! class_exists( 'GloriousThemes_Demo_Importer' ) ) {
	include_once dirname( __FILE__ ) . '/includes/class-glorious-sites-installer.php';
}

/**
 * Main instance of GloriousThemes Demo importer.
 *
 * Returns the main instance of TGDM to prevent the need to use globals.
 *
 * @since  1.3.4
 * @return GloriousThemes_Demo_Importer
 */
function tgdm() {
	return GloriousThemes_Demo_Importer::instance();
}

// Global for backwards compatibility.
$GLOBALS['gloriousthemes-starter-sites'] = tgdm();
