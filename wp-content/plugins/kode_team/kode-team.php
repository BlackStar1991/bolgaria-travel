<?php
/*
Plugin Name: KodeForest Team
Plugin URI: http://www.kodeforest.com
Description: A Custom Post Type Plugin To Use With KodeForest Theme ( This plugin functionality might not working properly on another theme )
Version: 1.0
Author: KodeForest
Author URI: http://www.kodeforest.com
*/
include_once( 'kode-team-item.php');	
include_once( 'kode-team-option.php');	

// action to loaded the plugin translation file
add_action('plugins_loaded', 'kode_team_init');
if( !function_exists('kode_team_init') ){
	function kode_team_init() {
		load_plugin_textdomain( 'kode-team', false, dirname(plugin_basename( __FILE__ ))  . '/languages/' ); 
	}
}

// add action to create team post type
add_action( 'init', 'kode_create_team' );
if( !function_exists('kode_create_team') ){
	function kode_create_team() {
		global $theme_option;
		
		if( !empty($theme_option['team-slug']) ){
			$team_slug = $theme_option['team-slug'];
			$team_category_slug = $theme_option['team-category-slug'];
			$team_tag_slug = $theme_option['team-tag-slug'];
		}else{
			$team_slug = 'team';
			$team_category_slug = 'team_category';
			$team_tag_slug = 'team_tag';
		}
		
		register_post_type( 'team',
			array(
				'labels' => array(
					'name'               => esc_attr__('Team', 'kodeforest_team'),
					'singular_name'      => esc_attr__('Team', 'kodeforest_team'),
					'add_new'            => esc_attr__('Add New', 'kodeforest_team'),
					'add_new_item'       => esc_attr__('Add New Team', 'kodeforest_team'),
					'edit_item'          => esc_attr__('Edit Team', 'kodeforest_team'),
					'new_item'           => esc_attr__('New Team', 'kodeforest_team'),
					'all_items'          => esc_attr__('All Teams', 'kodeforest_team'),
					'view_item'          => esc_attr__('View Team', 'kodeforest_team'),
					'search_items'       => esc_attr__('Search Team', 'kodeforest_team'),
					'not_found'          => esc_attr__('No Teams found', 'kodeforest_team'),
					'not_found_in_trash' => esc_attr__('No Teams found in Trash', 'kodeforest_team'),
					'parent_item_colon'  => '',
					'menu_name'          => esc_attr__('Team', 'kodeforest_team')
				),
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				'rewrite'            => array( 'slug' => $team_slug  ),
				'capability_type'    => 'post',
				'has_archive'        => true,
				'hierarchical'       => false,
				'menu_position'      => 5,
				'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields' )
			)
		);
		
		// create team categories
		register_taxonomy(
			'team_category', array("team"), array(
				'hierarchical' => true,
				'show_admin_column' => true,
				'label' => esc_attr__('Team Categories', 'kodeforest_team'), 
				'singular_label' => esc_attr__('Team Category', 'kodeforest_team'), 
				'rewrite' => array( 'slug' => $team_category_slug  )));
		register_taxonomy_for_object_type('team_category', 'team');
		
		// create team tag
		register_taxonomy(
			'team_tag', array('team'), array(
				'hierarchical' => false, 
				'show_admin_column' => true,
				'label' => esc_attr__('Team Tags', 'kodeforest_team'), 
				'singular_label' => esc_attr__('Team Tag', 'kodeforest_team'),  
				'rewrite' => array( 'slug' => $team_tag_slug  )));
		register_taxonomy_for_object_type('team_tag', 'team');	

		// add filter to style single template
		if( defined('WP_THEME_KEY') && WP_THEME_KEY == 'kodeforest' ){
			add_filter('single_template', 'kode_register_team_template');
		}
	}
}

if( !function_exists('kode_register_team_template') ){
	function kode_register_team_template($single_template) {
		global $post;

		if ($post->post_type == 'team') {
			$single_template = dirname( __FILE__ ) . '/single-team.php';
		}
		return $single_template;	
	}
}

// add filter for adjacent team 
add_filter('get_previous_post_where', 'kode_team_post_where', 10, 2);
add_filter('get_next_post_where', 'kode_team_post_where', 10, 2);
if(!function_exists('kode_team_post_where')){
	function kode_team_post_where( $where, $in_same_cat ){ 
		global $post; 
		if ( $post->post_type == 'team' ){
			$current_taxonomy = 'team_category'; 
			$cat_array = wp_get_object_terms($post->ID, $current_taxonomy, array('fields' => 'ids')); 
			if($cat_array){ 
				$where .= " AND tt.taxonomy = '$current_taxonomy' AND tt.term_id IN (" . implode(',', $cat_array) . ")"; 
			} 
			}
		return $where; 
	} 	
}
	
add_filter('get_previous_post_join', 'get_team_post_join', 10, 2);
add_filter('get_next_post_join', 'get_team_post_join', 10, 2);	
if(!function_exists('get_team_post_join')){
	function get_team_post_join($join, $in_same_cat){ 
		global $post, $wpdb; 
		if ( $post->post_type == 'team' ){
			$current_taxonomy = 'team_category'; 
			if(wp_get_object_terms($post->ID, $current_taxonomy)){ 
				$join .= " INNER JOIN $wpdb->term_relationships AS tr ON p.ID = tr.object_id INNER JOIN $wpdb->term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id"; 
			} 
		}
		return $join; 
	}
}

?>