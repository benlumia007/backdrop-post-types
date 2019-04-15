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
class BackdropPostTypes {
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
	public function __construct( $text_domain ) {
		$this->text_domain = $text_domain;

		$this->posts = array();

		add_action( 'init', array( $this, 'register_custom_post_types' ) );
	}

	public function register_custom_post_types() {
		foreach ( $this->posts as $post => $value ) {
			register_post_type( $post, $value );
		}
	}

	public function create_post( $type, $singular_label, $plural_label, $settings = array() ) {
		$default = array(
			$labels = array(
				'name'               => esc_html( $plural_label, $this->text_domain ),
				'singular_name'      => esc_html( $singular_label, $this->text_domain ),
				'add_new'            => esc_html( 'Add New' . $singular_label, $this->text_domain ),
				'add_new_item'       => esc_html( 'Add New' . $singular_label . 'Item', $this->text_domain ),
				'edit_item'          => esc_html( 'Edit' . $singular_label . 'Item', $this->text_domain ),
				'new_item'           => esc_html( 'New' . $singular_label . 'Item', $this->text_domain ),
				'view_item'          => esc_html( 'View' . $singular_label . 'Item', $this->text_domain ),
				'search_items'       => esc_html( 'Search' . $singular_label . 'Item', $this->text_domain ),
				'not_found'          => esc_html( 'Not Found', $this->text_domain ),
				'not_found_in_trash' => esc_html( 'Not Found in Trash', $this->text_doamin ),
				'name_admin_bar'     => esc_html( $singular_label, $this->text_domain ),
				'parent_item_colon'  => esc_html( 'Parent Item: ', $this->text_domain ),
			),
			'public'      => true,
			'has_archive' => true,
			'supports'    => array( 'title', 'editor', 'thumbnail' ),
			'show_ui'     => true,
		);

		$this->posts[ $type ] = array_merge( $default, $settings );
	}
}
