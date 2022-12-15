<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              catchplugins.com
 * @since             1.0
 * @package           Header_Enhancement
 *
 * Plugin Name: Header Enhancement
 * Plugin URI:  https://catchplugins.com/plugins/header-enhancement/
 * Description: Header Enhancement allows you to add an expressive custom header video on your website with features like mobile compatibility and sound effects.
 * Version:     1.5.3
 * Author:      Catch Plugins
 * Author URI:  catchplugins.com
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: header-enhancement
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

register_activation_hook( __FILE__, 'check_pro_active' );
function check_pro_active() {
	$required = 'header-enhancement-pro/header-enhancement-pro.php';
	if ( is_plugin_active( $required ) ) {
		$message = esc_html__( 'Sorry, Pro version is already active. No need to activate Free version. If you still want to activate the Free version, please deactivate the Pro version first. %1$s&laquo; Return to Plugins%2$s.', 'header-enhancement' );
		$message = sprintf( $message, '<br><a href="' . esc_url( admin_url( 'plugins.php' ) ) . '">', '</a>' );
		wp_die( $message );
	}
}

// Define Version
define( 'HEADER_ENHANCEMENT_VERSION', '1.5.3' );

// The URL of the directory that contains the plugin
if ( ! defined( 'HEADER_ENHANCEMENT_URL' ) ) {
	define( 'HEADER_ENHANCEMENT_URL', plugin_dir_url( __FILE__ ) );
}


// The absolute path of the directory that contains the file
if ( ! defined( 'HEADER_ENHANCEMENT_PATH' ) ) {
	define( 'HEADER_ENHANCEMENT_PATH', plugin_dir_path( __FILE__ ) );
}

class HeaderEnhancement {
	private $plugin_name;
	public function __construct() {
		$this->plugin_name = 'header-enhancement';
		add_action( 'admin_menu', array( $this, 'add_plugin_settings_menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'wp_print_scripts', array( $this, 'dequeue_custom_header_video_js' ), 100 );

		add_filter( 'plugin_row_meta', array( $this, 'add_plugin_meta_links' ), 10, 2 );
		add_action( 'wp_enqueue_scripts', array( $this, 'frontend_enqueue_styles' ) );
	}

	function enqueue_scripts() {
		if ( isset( $_GET['page'] ) && 'header-enhancement' == $_GET['page'] ) {
			wp_register_script( 'match-height', HEADER_ENHANCEMENT_URL . 'js/jquery.matchHeight.min.js', array( 'jquery' ), '', false );
			wp_register_script( 'header-enhancement-dashboard', HEADER_ENHANCEMENT_URL . 'js/dashboard-main.js', array( 'jquery', 'match-height' ), '', false );
			wp_enqueue_script( 'header-enhancement-dashboard' );
		}
	}

	function enqueue_styles() {
		if ( isset( $_GET['page'] ) && 'header-enhancement' == $_GET['page'] ) {
			wp_enqueue_style( 'header-enhancement-style', HEADER_ENHANCEMENT_URL . 'css/header-enhancement.css', array(), HEADER_ENHANCEMENT_VERSION, 'all' );
			wp_enqueue_style( 'header-enhancement-dashboard', HEADER_ENHANCEMENT_URL . 'css/admin-dashboard.css', array(), HEADER_ENHANCEMENT_VERSION, 'all' );
		}
	}

	function frontend_enqueue_styles() {
		wp_enqueue_style( 'header-enhancement-style', HEADER_ENHANCEMENT_URL . 'css/frontend.css', array(), HEADER_ENHANCEMENT_VERSION, 'all' );
	}

	function dequeue_custom_header_video_js() {
		wp_dequeue_script( 'wp-custom-header' );
		wp_deregister_script( 'wp-custom-header' );
		wp_register_script( 'wp-custom-header', HEADER_ENHANCEMENT_URL . 'js/header-enhancement.js', array(), HEADER_ENHANCEMENT_VERSION, true );
		wp_enqueue_script( 'wp-custom-header' );
	}

	function add_plugin_settings_menu() {
		add_menu_page(
			esc_html__( 'Header Enhancement', 'header-enhancement' ), //page title
			esc_html__( 'Header Enhancement', 'header-enhancement' ), //menu title
			'edit_posts', //capability needed
			'header-enhancement', //menu slug (and page query url)
			array( $this, 'settings' ),
			'dashicons-video-alt3',
			'99.01564'
		);
	}

	function settings() {
		$child_theme = false;
		if ( ! current_user_can( 'edit_posts' ) ) {
			wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'header-enhancement' ) );
		}

		require_once plugin_dir_path( __FILE__ ) . 'partials/header-enhancement-display.php';
	}

	function add_plugin_meta_links( $meta_fields, $file ) {

		if ( $file == plugin_basename( __FILE__ ) ) {

			$meta_fields[] = "<a href='https://catchplugins.com/support-forum/forum/header-enhancement/' target='_blank'>Support Forum</a>";
			$meta_fields[] = "<a href='https://wordpress.org/support/plugin/header-enhancement/reviews#new-post' target='_blank' title='Rate'>
			        <i class='ct-rate-stars'>"
			  . "<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg>"
			  . "<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg>"
			  . "<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg>"
			  . "<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg>"
			  . "<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg>"
			  . '</i></a>';

			$stars_color = '#ffb900';

			echo '<style>'
				. '.ct-rate-stars{display:inline-block;color:' . $stars_color . ';position:relative;top:3px;}'
				. '.ct-rate-stars svg{fill:' . $stars_color . ';}'
				. '.ct-rate-stars svg:hover{fill:' . $stars_color . '}'
				. '.ct-rate-stars svg:hover ~ svg{fill:none;}'
				. '</style>';
		}

		return $meta_fields;
	}

}

$class = new HeaderEnhancement();

/* CTP tabs removal options */
require HEADER_ENHANCEMENT_PATH . 'partials/ctp-tabs-removal.php';

$ctp_options = ctp_get_options();
if ( 1 == $ctp_options['theme_plugin_tabs'] ) {
	/* Adds Catch Themes tab in Add theme page and Themes by Catch Themes in Customizer's change theme option. */
	if ( ! class_exists( 'CatchThemesThemePlugin' ) && ! function_exists( 'add_our_plugins_tab' ) ) {
		require HEADER_ENHANCEMENT_PATH . 'partials/CatchThemesThemePlugin.php';
	}
}
