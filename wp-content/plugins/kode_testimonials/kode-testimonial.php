<?php
/*
Plugin Name: KodeForest Testimonial
Plugin URI: http://www.kodeforest.com
Description: A Custom Post Type Plugin To Use With KodeForest Theme ( This plugin functionality might not working properly on another theme )
Version: 1.0
Author: KodeForest
Author URI: http://www.kodeforest.com
*/
include_once( 'kode-testimonial-item.php');	
include_once( 'kode-testimonial-option.php');	

// action to loaded the plugin translation file
add_action('plugins_loaded', 'kode_testimonial_init');
if( !function_exists('kode_testimonial_init') ){
	function kode_testimonial_init() {
		load_plugin_textdomain( 'kode-testimonial', false, dirname(plugin_basename( __FILE__ ))  . '/languages/' ); 
	}
}

// add action to create testimonial post type
add_action( 'init', 'kode_create_testimonial' );
if( !function_exists('kode_create_testimonial') ){
	function kode_create_testimonial() {
		global $theme_option;
		
		if( !empty($theme_option['testimonial-slug']) ){
			$testimonial_slug = $theme_option['testimonial-slug'];
			$testimonial_category_slug = $theme_option['testimonial-category-slug'];
			$testimonial_tag_slug = $theme_option['testimonial-tag-slug'];
		}else{
			$testimonial_slug = 'testimonial';
			$testimonial_category_slug = 'testimonial_category';
			$testimonial_tag_slug = 'testimonial_tag';
		}
		
		register_post_type( 'testimonial',
			array(
				'labels' => array(
					'name'               => esc_attr__('Testimonial', 'kodeforest_testimonial'),
					'singular_name'      => esc_attr__('Testimonial', 'kodeforest_testimonial'),
					'add_new'            => esc_attr__('Add New', 'kodeforest_testimonial'),
					'add_new_item'       => esc_attr__('Add New Testimonial', 'kodeforest_testimonial'),
					'edit_item'          => esc_attr__('Edit Testimonial', 'kodeforest_testimonial'),
					'new_item'           => esc_attr__('New Testimonial', 'kodeforest_testimonial'),
					'all_items'          => esc_attr__('All Testimonials', 'kodeforest_testimonial'),
					'view_item'          => esc_attr__('View Testimonial', 'kodeforest_testimonial'),
					'search_items'       => esc_attr__('Search Testimonial', 'kodeforest_testimonial'),
					'not_found'          => esc_attr__('No Teams found', 'kodeforest_testimonial'),
					'not_found_in_trash' => esc_attr__('No Teams found in Trash', 'kodeforest_testimonial'),
					'parent_item_colon'  => '',
					'menu_name'          => esc_attr__('Testimonial', 'kodeforest_testimonial')
				),
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				'rewrite'            => array( 'slug' => $testimonial_slug  ),
				'capability_type'    => 'post',
				'has_archive'        => true,
				'hierarchical'       => false,
				'menu_position'      => 5,
				'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields' )
			)
		);
		
		// create testimonial categories
		register_taxonomy(
			'testimonial_category', array("testimonial"), array(
				'hierarchical' => true,
				'show_admin_column' => true,
				'label' => esc_attr__('Categories', 'kodeforest_testimonial'), 
				'singular_label' => esc_attr__('Category', 'kodeforest_testimonial'), 
				'rewrite' => array( 'slug' => $testimonial_category_slug  )));
		register_taxonomy_for_object_type('testimonial_category', 'testimonial');
		

		//add filter to style single template
		if( defined('WP_THEME_KEY') && WP_THEME_KEY == 'kodeforest' ){
			add_filter('single_template', 'kode_register_testimonial_template');
		}
	}
}

if( !function_exists('kode_register_testimonial_template') ){
	function kode_register_testimonial_template($single_template) {
		global $post;

		if ($post->post_type == 'testimonial') {
			$single_template = dirname( __FILE__ ) . '/single-testimonial.php';
		}
		return $single_template;	
	}
}

// add filter for adjacent testimonial 
add_filter('get_previous_post_where', 'kode_testimonial_post_where', 10, 2);
add_filter('get_next_post_where', 'kode_testimonial_post_where', 10, 2);
if(!function_exists('kode_testimonial_post_where')){
	function kode_testimonial_post_where( $where, $in_same_cat ){ 
		global $post; 
		if ( $post->post_type == 'testimonial' ){
			$current_taxonomy = 'testimonial_category'; 
			$cat_array = wp_get_object_terms($post->ID, $current_taxonomy, array('fields' => 'ids')); 
			if($cat_array){ 
				$where .= " AND tt.taxonomy = '$current_taxonomy' AND tt.term_id IN (" . implode(',', $cat_array) . ")"; 
			} 
			}
		return $where; 
	} 	
}
	
add_filter('get_previous_post_join', 'get_testimonial_post_join', 10, 2);
add_filter('get_next_post_join', 'get_testimonial_post_join', 10, 2);	
if(!function_exists('get_testimonial_post_join')){
	function get_testimonial_post_join($join, $in_same_cat){ 
		global $post, $wpdb; 
		if ( $post->post_type == 'testimonial' ){
			$current_taxonomy = 'testimonial_category'; 
			if(wp_get_object_terms($post->ID, $current_taxonomy)){ 
				$join .= " INNER JOIN $wpdb->term_relationships AS tr ON p.ID = tr.object_id INNER JOIN $wpdb->term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id"; 
			} 
		}
		return $join; 
	}
}

?>