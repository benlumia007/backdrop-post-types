<?php
/**
 * Plugin Name: Backdrop Post Types
 * Author: Benjamin Lu
 * Author URI: https://benjlu.com
 * Description: Backdrop Post Types registers post types of your choice.
 * License: GNU General Public License v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path: /languages
 * Text Domain: backdrop-post-types
 * Version: 1.0.5
 *
 * @package     Backdrop Post Types
 * @copyright   Copyright (C) 2019. Benjamin Lu
 * @license     GNU General PUblic License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
 */

/**
 * Define namespace
 */
namespace Benlumia007\Backdrop;

/**
 * Table of Content
 *
 * 1.0 - Forbidden Access
 * 2.0 - Required Files
 * 3.0 - Register Default Post Type
 * 4.0 - Plugin Text Domain
 */

/**
 * 1.0 - Forbidden Access
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * 2.0 - Required Files
 */
if ( file_exists( plugin_dir_path( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once plugin_dir_path( __FILE__ ) . '/vendor/autoload.php';
}

/**
 * 3.0 - Register Default Post Type
 *
 * By default when this plugin is activated, it will automatically creates a new post type ( portoflio ).
 * This will allow users to use portfolio but can also be disabled by using an add_filter();
 *
 * add_filter( 'backdrop_post_types_override_portfolio', '__return_true' ); to disable portfolio post type.
 */
if ( ! apply_filters( 'backdrop_post_types_override_portfolio', false ) ) {
	$portfolio = new \Benlumia007\Backdrop\PostTypes\Register();
	$portfolio->create_post_type( 'portfolio', 'Portfolio', 'Portfolios' );
	$portfolio->init();
}

/**
 * 4.0 - Plugin Text Domain
 */
function backdrop_post_types_load_textdomain() {
	load_plugin_textdomain( 'backdrop-post-types', false, basename( dirname( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', __NAMESPACE__ . '\backdrop_post_types_load_textdomain' );