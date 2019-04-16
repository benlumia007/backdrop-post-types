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
	 *
	 * @var $this Controller.
	 */
	protected $posts;

	/**
	 * Construct.
	 */
	public function register() {
		add_action( 'init', array( $this, 'register_custom_post_types' ) );
		add_action( 'init', array( $this, 'register_custom_post_types_category' ) );
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
	 * Create Posts by create_post_type().
	 *
	 * @param string $type a post type.
	 * @param string $singular_label a single label.
	 * @param string $plural_label a more than one.
	 */
	public function create_post_type( $type, $singular_label, $plural_label ) {
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
		);

		$args = array(
			'labels'      => $labels,
			'public'      => true,
			'has_archive' => true,
			'menu_icon'   => 'dashicons-category',
			'supports'    => array( 'title', 'editor', 'thumbnail' ),
			'taxonomies'  => array( $this->posts[ $type ] . '_category' ),
			'show_ui'     => true,
		);

		$this->posts[ $type ] = array_merge( $labels, $args );
	}

	public function register_custom_post_types_category( $type ) {
		$labels = array(
			'name'                       => _x( 'Categories', 'Taxonomy General Name', 'backdrop-post-types' ),
			'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'backdrop-post-types' ),
			'menu_name'                  => __( 'Categories', 'backdrop-post-types' ),
			'all_items'                  => __( 'All Categories', 'backdrop-post-types' ),
			'parent_item'                => __( 'Parent Category', 'backdrop-post-types' ),
			'parent_item_colon'          => __( 'Parent Category:', 'backdrop-post-types' ),
			'new_item_name'              => __( 'New Category Name', 'backdrop-post-types' ),
			'add_new_item'               => __( 'Add New Category', 'backdrop-post-types' ),
			'edit_item'                  => __( 'Edit Categories', 'backdrop-post-types' ),
			'update_item'                => __( 'Update Categories', 'backdrop-post-types' ),
			'view_item'                  => __( 'View Categories', 'backdrop-post-types' ),
			'separate_items_with_commas' => __( 'Separate categories with commas', 'backdrop-post-types' ),
			'add_or_remove_items'        => __( 'Add or remove categories', 'backdrop-post-types' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'backdrop-post-types' ),
			'popular_items'              => __( 'Popular Categories', 'backdrop-post-types' ),
			'search_items'               => __( 'Search Categories', 'backdrop-post-types' ),
			'not_found'                  => __( 'Not Found', 'backdrop-post-types' ),
		);

		$args = array(
			'labels'            => $labels,
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => false,
			'show_tagcloud'     => false,
		);
		register_taxonomy( $type . '_category', array( $type ), $args );
	}
}

$portfolio = new CustomPostTypes( 'portfolio' );
$portfolio->create_post_type( 'portfolio', 'Portoflio', 'Portfolios' );
$portfolio->register();

$portfolio = new CustomPostTypes( 'theme' );
$portfolio->create_post_type( 'theme', 'Theme', 'Themes' );
$portfolio->register();
