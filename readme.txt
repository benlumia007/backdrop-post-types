== Backdrop Post Types ==
Contributors: benlumia007
Donate link: https://benjlu.com
Tags: post-types
Requires at least: 5.0
Tested up to: 5.2
Stable tag: 1.0.1
Requires PHP: 7.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Backdrop Post Types allows you to create a new post type without configurations. By Default, Portfolio Post Type is registered.

== Description ==
Backdrop Post Types allows you to create a new post type without configurations. By Default, Portfolio Post Type is registered.

= Working with Themes =
By default, portoflio post type is already registered. If you wish to not used the default post type, you can disable it using add_filter(); in your functions.php as follow

add_filter( 'backdrop_post_types_override_portfolio', '__return_true' );

To create a new post type by creating a folder called post-types/demo.php somewhere in your theme and use the following to register a new post type.

$demo = new \Benlumia007\BackdropPostTypes\Register\PostType( 'demo' );
$demo->create_post_type( 'demo', 'Demo', 'Demos' );
$demo->register();

== Installation ==

1.0 - In your admin panel, go to Appearance -> Plugins and click the Add New button.
2.0 - Click Upload and Choose File, then select the theme's ZIP file. Click Install Now.
3.0 - Click Activate to use your new plugin right away.

== Frequently Asked Questions ==
How to disabled the default post type ( portoflio )
add_filter( 'backdrop_post_types_override_portfolio', '__return_true' );

== Upgrade Notice == 
No Upgrades at the moment

== Changelog ==
= 1.0.1 =
added with_front = false

= 1.0.0 = 
*Release Date: April 16, 2019*

* Initial Release