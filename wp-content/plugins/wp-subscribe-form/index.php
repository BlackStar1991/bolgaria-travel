<?php 
/*
Plugin Name: Subscribe Form by Arrow Plugins
Plugin URI: https://wordpress.org/plugins/wp-subscribe-form/
Description: Add beautiful and elegant subscribe forms in your Posts, Pages and Widget area to convert visitors into subscibers.
Author: Arrow Plugins
Author URI: https://profiles.wordpress.org/arrowplugins/
Version: 1.0
License: GplV2
Copyright: 2016 Arrow Plugins
*/
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
define( 'SFBAP_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
require('includes/sfbap-enqueue-scripts.php');
require('includes/sfbap-post-type.php');
require('includes/sfbap-custom-columns.php');
require('includes/sfbap-post-meta-boxes.php');
require('includes/sfbap-save-post-meta.php');
require('includes/sfbap-shortcode.php');
require('includes/sfbap-ajax-handler.php');
require('includes/sfbap-subscription-ajax.php');
require('includes/sfbap-subscription-table.php');
register_activation_hook( __FILE__, 'sfbap_create_table_function' );


add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'sfbap_plugin_action_links' );

function sfbap_plugin_action_links( $links ) {
   $links[] = '<a href="'. esc_url( get_admin_url(null, 'edit.php?post_type=sfbap_subscribe_form') ) .'">Dashboard</a>';
   $links[] = '<a href="'. esc_url( get_admin_url(null, 'edit.php?post_type=sfbap_subscribe_form&page=sfbap_form_support') ) .'">Support</a>';
   return $links;
}