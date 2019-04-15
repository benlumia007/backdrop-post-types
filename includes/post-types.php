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
	 * $post post.
	 */
	protected $posts;

	/**
	 * Construct.
	 */
	public function register() {
		add_action( 'init', array( $this, 'register_custom_post_types' ) );
	}

	/**
	 * Register Custom Post Types.
	 */
	public function register_custom_post_types() {
		foreach ( $this->posts as $key => $value ) {
			register_post_type( $key, $value );
		}
	}

	/**
	 * Create Posts by create_post().
	 *
	 * @param string $type a post type.
	 * @param string $singular_label a single label.
	 * @param string $plural_label a more than one.
	 * @param array  $settings stores post in an array.
	 */
	public function create_post( $type, $singular_label, $plural_label, $settings = array() ) {
		$default = array(
			$labels = array(
				'name'               => $plural_label,
				'singular_name'      => $singular_label,

				/* Translators: a single label for a post type */
				'add_new'            => sprintf( __( 'Add New %s', 'backdrop-post-types' ), $singular_label ),

				/* Translators: a single label for a post type */
				'add_new_item'       => sprintf( __( 'Add New %s Item', 'backdrop-post-types' ), $singular_label ),

				/* Translators: a single label for a post type */
				'edit_item'          => sprintf( __( 'Edit %s Item', 'backdrop-post-types' ), $singular_label ),

				/* Translators: a single label for a post type */
				'new_item'           => sprintf( __( 'New %s Item' ), $singular_label ),

				/* Translators: a single label for a post type */
				'view_item'          => sprintf( __( 'View %s Item', 'backdrop-post-types' ), $singular_label ),

				/* Translators: a single label for a post type */
				'search_items'       => sprintf( __( 'Search %s Item', 'backdrop-post-types' ), $singular_label ),

				'not_found'          => esc_html__( 'Not Found', 'backdrop-post-types' ),
				'not_found_in_trash' => esc_html__( 'Not Found in Trash', 'backdrop-post-types' ),
				'name_admin_bar'     => $singular_label,
				'parent_item_colon'  => esc_html__( 'Parent Item: ', 'backdrop-post-types' ),
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
$portfolio->register();
