<?php
/*
Plugin Name: KodeForest Packages
Plugin URI: http://www.kodeforest.com
Description: A Custom Post Type Plugin To Use With KodeForest Theme ( This plugin functionality might not working properly on another theme )
Version: 1.0.0
Author: KodeForest
Author URI: http://www.kodeforest.com
*/
include_once( 'kode-package-item.php');	
include_once( 'kode-package-option.php');	

// action to loaded the plugin translation file
add_action('plugins_loaded', 'kode_package_init');
if( !function_exists('kode_package_init') ){
	function kode_package_init() {
		load_plugin_textdomain( 'kode-package', false, dirname(plugin_basename( __FILE__ ))  . '/languages/' ); 
	}
}

// add action to create package post type
add_action( 'init', 'kode_create_package' );
if( !function_exists('kode_create_package') ){
	function kode_create_package() {
		global $theme_option;
		
		if( !empty($theme_option['package-slug']) ){
			$package_slug = esc_attr($theme_option['package-slug']);
			$package_category_slug = esc_attr($theme_option['package-category-slug']);
			$package_tag_slug = esc_attr($theme_option['package-tag-slug']);
		}else{
			$package_slug = 'package';
			$package_category_slug = 'package_category';
			$package_tag_slug = 'package_tag';
		}
		
		register_post_type( 'package',
			array(
				'labels' => array(
					'name'               => esc_attr__('Tour Packages', 'kodeforest_package'),
					'singular_name'      => esc_attr__('Tour Packages', 'kodeforest_package'),
					'add_new'            => esc_attr__('Add New', 'kodeforest_package'),
					'add_new_item'       => esc_attr__('Add New Package', 'kodeforest_package'),
					'edit_item'          => esc_attr__('Edit Package', 'kodeforest_package'),
					'new_item'           => esc_attr__('New Package', 'kodeforest_package'),
					'all_items'          => esc_attr__('All Package', 'kodeforest_package'),
					'view_item'          => esc_attr__('View Package', 'kodeforest_package'),
					'search_items'       => esc_attr__('Search Package', 'kodeforest_package'),
					'not_found'          => esc_attr__('No Packages found', 'kodeforest_package'),
					'not_found_in_trash' => esc_attr__('No Packages found in Trash', 'kodeforest_package'),
					'parent_item_colon'  => '',
					'menu_name'          => esc_attr__('Package', 'kodeforest_package')
				),
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				'rewrite'            => array( 'slug' => $package_slug  ),
				'capability_type'    => 'post',
				'has_archive'        => true,
				'hierarchical'       => false,
				'menu_position'      => 5,
				'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields' )
			)
		);
		
		// create package categories
		register_taxonomy(
			'package_category', array("package"), array(
				'hierarchical' => true,
				'show_admin_column' => true,
				'label' => __('Package Categories', 'kodeforest_package'), 
				'singular_label' => __('Package Category', 'kodeforest_package'), 
				'rewrite' => array( 'slug' => $package_category_slug  )));
		register_taxonomy_for_object_type('package_category', 'package');
		
		// create package tag
		register_taxonomy(
			'package_tag', array('package'), array(
				'hierarchical' => false, 
				'show_admin_column' => true,
				'label' => __('Package Tags', 'kodeforest_package'), 
				'singular_label' => __('Package Tag', 'kodeforest_package'),  
				'rewrite' => array( 'slug' => $package_tag_slug  )));
		register_taxonomy_for_object_type('package_tag', 'package');	

		// add filter to style single template
		if( defined('WP_THEME_KEY') && WP_THEME_KEY == 'kodeforest' ){
			add_filter('single_template', 'kode_register_package_template');
		}
	}
}

if( !function_exists('kode_register_package_template') ){
	function kode_register_package_template($single_template) {
		global $post;

		if ($post->post_type == 'package') {
			$single_template = dirname( __FILE__ ) . '/single-package.php';
		}
		return $single_template;	
	}
}

// add filter for adjacent package 
add_filter('get_previous_post_where', 'kode_package_post_where', 10, 2);
add_filter('get_next_post_where', 'kode_package_post_where', 10, 2);
if(!function_exists('kode_package_post_where')){
	function kode_package_post_where( $where, $in_same_cat ){ 
		global $post; 
		if ( $post->post_type == 'package' ){
			$current_taxonomy = 'package_category'; 
			$cat_array = wp_get_object_terms($post->ID, $current_taxonomy, array('fields' => 'ids')); 
			if($cat_array){ 
				$where .= " AND tt.taxonomy = '$current_taxonomy' AND tt.term_id IN (" . implode(',', $cat_array) . ")"; 
			} 
			}
		return $where; 
	} 	
}
	
add_filter('get_previous_post_join', 'get_package_post_join', 10, 2);
add_filter('get_next_post_join', 'get_package_post_join', 10, 2);	
if(!function_exists('get_package_post_join')){
	function get_package_post_join($join, $in_same_cat){ 
		global $post, $wpdb; 
		if ( $post->post_type == 'package' ){
			$current_taxonomy = 'package_category'; 
			if(wp_get_object_terms($post->ID, $current_taxonomy)){ 
				$join .= " INNER JOIN $wpdb->term_relationships AS tr ON p.ID = tr.object_id INNER JOIN $wpdb->term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id"; 
			} 
		}
		return $join; 
	}
}

?>