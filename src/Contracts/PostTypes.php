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
namespace Benlumia007\Backdrop\Contracts;

/**
 * Table of Content
 *
 * 1.0 - Backdrop Post Types
 */

/**
 * 1.0 - Backdrop Post Types
 *
 * @param string $post post.
 */
abstract class PostTypes {
	/**
	 * $post post.
	 *
	 * @var $this Controller.
	 */
	protected $posts;

	/**
	 * Construct.
	 */
	public function init() {}

	/**
	 * Register Custom Post Types.
	 */
	public function register_custom_post_types() {}

	/**
	 * Register Custom Taxonomies
	 */
	public function register_custom_post_taxonomies() {}

	/**
	 * Create Posts by create_post_type().
	 *
	 * @param string $type a post type.
	 * @param string $singular_label a single label.
	 * @param string $plural_label a more than one.
	 */
	public function create_post_type( $type, $singular_label, $plural_label ) {}

	/**
	 * Custom Post Types ( Category )
	 *
	 * @param string $type Category.
	 */
	public function create_custom_post_types_category( $type ) {}
}
