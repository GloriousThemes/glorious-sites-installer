<?php
/**
 * Plugin Name: Glorious Sites Installer
 * Plugin URI: https://gloriousthemes.com/demo-importer/
 * Description: Import GloriousThemes official themes demo content, widgets and theme settings with just one click.
 * Version: 1.0.1
 * Author: GloriousThemes
 * Author URI: https://gloriousthemes.com
 * License: GPLv3 or later
 * Text Domain: glorious-sites-installer
 * Domain Path: /languages/
 *
 * @package GloriousThemes_Demo_Importer
 * @Hosted All Files Locally with no zip files but making a test run with github
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

if ( ! function_exists( 'gsi_fs' ) ) {
    // Create a helper function for easy SDK access.
    function gsi_fs() {
        global $gsi_fs;

        if ( ! isset( $gsi_fs ) ) {
            // Include Freemius SDK.
            require_once dirname(__FILE__) . '/freemius/start.php';

            $gsi_fs = fs_dynamic_init( array(
                'id'                  => '7914',
                'slug'                => 'glorious-sites-installer',
                'type'                => 'plugin',
                'public_key'          => 'pk_f165dd94af9c445185c0f19fbd40f',
                'is_premium'          => false,
                'has_addons'          => false,
                'has_paid_plans'      => false,
                'menu'                => array(
                    'first-path'     => 'themes.php?page=demo-importer&browse=all',
                    'account'        => false,
                    'contact'        => false,
                    'support'        => false,
                ),
            ) );
        }

        return $gsi_fs;
    }

    // Init Freemius.
    gsi_fs();
    // Signal that SDK was initiated.
    do_action( 'gsi_fs_loaded' );
}
