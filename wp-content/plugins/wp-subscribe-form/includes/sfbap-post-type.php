<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
add_action( 'init', 'sfbap_subscribe_form_function' );
add_action('admin_menu', 'sfbap_custom_menu_pages');
add_action('admin_init','sfbap_register_integration_options');
register_activation_hook( __FILE__ , 'sfbap_add_integration_options' );

function sfbap_subscribe_form_function() {
	$labels = array(
		'name'               => _x( 'Subscribe Forms', 'post type general name' ),
		'singular_name'      => _x( 'Subscribe Form', 'post type singular name' ),
		'menu_name'          => _x( 'Subscribe Forms', 'admin menu' ),
		'name_admin_bar'     => _x( 'Subscribe Form', 'add new on admin bar' ),
		'add_new'            => _x( 'Add New', 'Form' ),
		'add_new_item'       => __( 'Add New Subscribe Form' ),
		'new_item'           => __( 'New Subscribe Form' ),
		'edit_item'          => __( 'Edit Subscribe Form' ),
		'view_item'          => __( 'View Subscribe Form' ),
		'all_items'          => __( 'All Subscribe Forms' ),
		'search_items'       => __( 'Search Subscribe Forms' ),
		'parent_item_colon'  => __( 'Parent Subscribe Forms:' ),
		'not_found'          => __( 'No Subscribe Forms found.' ),
		'not_found_in_trash' => __( 'No Subscribe Forms found in Trash.' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Add beautiful Subsscribe Forms into your Posts, Pages & Widget area' ),
		'public'             => true,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'rewrite'            => array( 'slug' => 'arrow_subscribe_forms' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 25,
		'menu_icon'		 => 'dashicons-media-code',
		'supports'           => array( 'title' , 'custom_fields')
	);

	register_post_type( 'sfbap_subscribe_form', $args );
}

 
function sfbap_custom_menu_pages() {
    add_submenu_page(
        'edit.php?post_type=sfbap_subscribe_form',
        'Subscription Settings',
        'Subscription Settings',
        'manage_options',
        'sfbap_subscription_settings',
        'sfbap_subscriber_options_menu' );
    add_submenu_page(
        'edit.php?post_type=sfbap_subscribe_form',
        'Subscribers List',
        'Subscribers List',
        'manage_options',
        'sfbap_subscribers_list',
        'sfbap_subscribers_list_menu' );
    add_submenu_page(
        'edit.php?post_type=sfbap_subscribe_form',
        'Support',
        'Support',
        'manage_options',
        'sfbap_form_support',
        'sfbap_support_page' );
}
 
function sfbap_subscriber_options_menu() {
    require('sfbap-subscription-page.php');
}

function sfbap_subscribers_list_menu() {
    require('sfbap-subscribers-list.php');
}

function sfbap_support_page(){
    require('sfbap-support-page.php');
}
function sfbap_add_integration_options() {
    add_option('sfbap_mc_api_key','');
    add_option('sfbap_gr_api_key','');
    add_option('sfbap_ac_url','');
    add_option('sfbap_ac_api_key','');
}

function sfbap_register_integration_options(){
    register_setting('sfbap_integration_options_group','sfbap_mc_api_key');
    register_setting('sfbap_integration_options_group','sfbap_gr_api_key');
    register_setting('sfbap_integration_options_group','sfbap_ac_url');
    register_setting('sfbap_integration_options_group','sfbap_ac_api_key');
    register_setting('sfbap_integration_options_group','sfbap_mm_username');
    register_setting('sfbap_integration_options_group','sfbap_mm_api_key');
}
add_action('load-post-new.php', 'sfbap_limit_cpt' );

function sfbap_limit_cpt()
{
    global $typenow;

    if( 'sfbap_subscribe_form' !== $typenow )
        return;

    $total = get_posts( array( 
        'post_type' => 'sfbap_subscribe_form', 
        'numberposts' => -1, 
        'post_status' => 'publish,future,draft' 
    ));

    if( $total && count( $total ) >= 5 )
        wp_die(
            '<p style="text-align:center;font-weight:bold;">Sorry, Creation of maximum number of Subscribe Form reached, Please <a href="https://www.arrowplugins.com/wordpress-subscribe-form/" target="_blank">Buy Premium Version</a> to create more amazing Subscribe Form With Awesome Features</p>', 
            'Maximum reached',  
            array( 
                'response' => 500, 
                'back_link' => true 
            )
        );  
}