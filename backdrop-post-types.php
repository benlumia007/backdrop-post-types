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
 * Version: 1.0.0
 *
 * @package     Backdrop Post Types
 * @copyright   Copyright (C) 2019. Benjamin Lu
 * @license     GNU General PUblic License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
 */

/**
 * Table of Content
 *
 * 1.0 - Forbidden Access
 * 2.0 - Required Files
 * 3.0 - Register Default Post Type
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
require_once plugin_dir_path( __FILE__ ) . '/includes/register-post-type.php';

/**
 * 3.0 - Register Default Post Type
 */
function backdrop_post_types_register_portfolio() {
	if ( ! apply_filters( 'backdrop_post_types_override_portfolio', false ) ) {
		$portfolio = new \Benlumia007\BackdropPostTypes\RegisterPostType( 'portfolio' );
		$portfolio->create_post_type( 'portfolio', 'Portfolio', 'Portfolios' );
		$portfolio->register();
	}
}
add_action( 'init', 'backdrop_post_types_register_portfolio' );
