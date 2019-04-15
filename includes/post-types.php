<?php
/**
 * Backdrop Post Types ( portfolio.php )
 *
 * @package     Backdrop Post Types
 * @copyright   Copyright (C) 2019. Benjamin Lu
 * @license     GNU General PUblic License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
 */

/**
 * Define Namespace
 */
namespace Benlumia007\BackdropPostTypes;

/**
 * Table of Content
 *
 * 1.0 - Backdrop Post Types
 */

/**
 * 1.0 - Backdrop Post Types
 *
 * @param string $text_domain text domain.
 * @param string $post post.
 */
class CustomPostTypes {
	/**
	 * $text_domain.
	 */
	protected $text_domain;

	/**
	 * $post post.
	 */
	protected $posts;

	/**
	 * Construct.
	 */
	public function __construct() {
		$this->posts = array();

		add_action( 'init', array( $this, 'register_custom_post_types' ) );
	}

	public function register_custom_post_types() {
		foreach ( $this->posts as $key => $value ) {
			register_post_type( $key, $value );
		}
	}

	public function create_post( $type, $singular_label, $plural_label, $settings = array() ) {
		$default = array(
			$labels = array(
				'name'               => esc_html( $plural_label, 'backdrop-post-types' ),
				'singular_name'      => esc_html( $singular_label, 'backdrop-post-types' ),
				'add_new'            => esc_html( 'Add New ' . $singular_label, 'backdrop-post-types' ),
				'add_new_item'       => esc_html( 'Add New ' . $singular_label . 'Item', 'backdrop-post-types' ),
				'edit_item'          => esc_html( 'Edit' . $singular_label . 'Item', 'backdrop-post-types' ),
				'new_item'           => esc_html( 'New' . $singular_label . 'Item', 'backdrop-post-types' ),
				'view_item'          => esc_html( 'View' . $singular_label . 'Item', 'backdrop-post-types' ),
				'search_items'       => esc_html( 'Search' . $singular_label . 'Item', 'backdrop-post-types' ),
				'not_found'          => esc_html( 'Not Found', 'backdrop-post-types' ),
				'not_found_in_trash' => esc_html( 'Not Found in Trash', 'backdrop-post-types' ),
				'name_admin_bar'     => esc_html( $singular_label, 'backdrop-post-types' ),
				'parent_item_colon'  => esc_html( 'Parent Item: ', 'backdrop-post-types' ),
			),
			'labels'      => $labels,
			'public'      => true,
			'has_archive' => true,
			'supports'    => array( 'title', 'editor', 'thumbnail' ),
			'show_ui'     => true,
		);

		$this->posts[ $type ] = array_merge( $default, $settings );
	}
}

$portfolio = new CustomPostTypes( 'portfolio' );

$portfolio->create_post( 'portfolio', 'Portfolio', 'Portfolios' );
