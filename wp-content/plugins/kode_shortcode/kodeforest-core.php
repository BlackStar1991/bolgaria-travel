<?php
/*
Plugin Name: KodeForest Shortcodes
Plugin URI: http://www.kodeforest.com
Description: KodeForest Shortcode Plugin for only KodeForest Themes
Version: 1.0
Author: Kodeforest
Author URI: http://www.kodeforest.com
*/

class KodeforestShortcodes {

    function __construct()
    {
    	require_once( 'shortcodes.php' );
		require_once( 'twitter-widget/twitter-widget.php' );
    	define('KODEFOREST_TINYMCE_URI', plugin_dir_url( __FILE__ ) . 'tinymce');
		define('KODEFOREST_TINYMCE_DIR', plugin_dir_path( __FILE__ ) .'tinymce');

        add_action('init', array(&$this, 'init'));
        add_action('admin_init', array(&$this, 'admin_init'));
        add_action('wp_ajax_kodeforest_shortcodes_popup', array(&$this, 'popup'));
	}

	/**
	 * Registers TinyMCE rich editor buttons
	 *
	 * @return	void
	 */
	function init()
	{

		if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
			return;

		if ( get_user_option('rich_editing') == 'true' )
		{
			add_filter( 'mce_external_plugins', array(&$this, 'add_rich_plugins') );
			add_filter( 'mce_buttons', array(&$this, 'register_rich_buttons') );
		}

	}

	// --------------------------------------------------------------------------

	/**
	 * Defins TinyMCE rich editor js plugin
	 *
	 * @return	void
	 */
	function add_rich_plugins( $plugin_array )
	{
		if( is_admin() ) {
			$plugin_array['kodeforest_button'] = KODEFOREST_TINYMCE_URI . '/plugin.js';
		}

		return $plugin_array;
	}

	// --------------------------------------------------------------------------

	/**
	 * Adds TinyMCE rich editor buttons
	 *
	 * @return	void
	 */
	function register_rich_buttons( $buttons )
	{
		array_push( $buttons, 'kodeforest_button' );
		return $buttons;
	}

	/**
	 * Enqueue Scripts and Styles
	 *
	 * @return	void
	 */
	function admin_init()
	{
		// css
		wp_enqueue_style( 'kodeforest-popup', KODEFOREST_TINYMCE_URI . '/css/popup.css', false, '1.0', 'all' );
		wp_enqueue_style( 'jquery.chosen', KODEFOREST_TINYMCE_URI . '/css/chosen.css', false, '1.0', 'all' );
		wp_enqueue_style( 'font-awesome', KODEFOREST_TINYMCE_URI . '/css/font-awesome.css', false, '3.2.1', 'all' );
		wp_enqueue_style( 'wp-color-picker' );

		// js
		wp_enqueue_script( 'jquery-ui-sortable' );
		wp_enqueue_script( 'jquery-livequery', KODEFOREST_TINYMCE_URI . '/js/jquery.livequery.js', false, '1.1.1', false );
		wp_enqueue_script( 'jquery-appendo', KODEFOREST_TINYMCE_URI . '/js/jquery.appendo.js', false, '1.0', false );
		wp_enqueue_script( 'base64', KODEFOREST_TINYMCE_URI . '/js/base64.js', false, '1.0', false );
		wp_enqueue_script( 'jquery.chosen', KODEFOREST_TINYMCE_URI . '/js/chosen.jquery.min.js', false, '1.0', false );
    	wp_enqueue_script( 'wp-color-picker' );

		wp_enqueue_script( 'kodeforest-popup', KODEFOREST_TINYMCE_URI . '/js/popup.js', false, '1.0', false );

		// Developer mode
		$dev_mode = current_theme_supports( 'kodeforest_shortcodes_embed' );
		if( $dev_mode ) {
			$dev_mode = 'true';
		} else {
			$dev_mode = 'false';
		}

		wp_localize_script( 'jquery', 'KodeforestShortcodes', array('plugin_folder' => plugins_url( '', __FILE__ ), 'dev' => $dev_mode) );
	}

	/**
	 * Popup function which will show shortcode options in thickbox.
	 *
	 * @return void
	 */
	function popup() {

		require_once( KODEFOREST_TINYMCE_DIR . '/kodeforest-sc.php' );

		die();

	}

}
$kodeforest_shortcodes_obj = new KodeforestShortcodes();
?>