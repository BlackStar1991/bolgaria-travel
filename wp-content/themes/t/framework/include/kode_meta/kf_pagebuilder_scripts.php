<?php
	/*	
	*	Kodeforest Admin Panel
	*	---------------------------------------------------------------------
	*	This file create the class that help you create the controls page builder  
	*	option for custom theme
	*	---------------------------------------------------------------------
	*/	
	
	if( !class_exists('kode_page_options') ){
		
		class kode_page_options{

			public $settings;
			public $options;
		
			function __construct($options = array(),$settings = array() ){
				
				$default_setting = array(
					'post_type' => array('page'),
					'meta_title' => __('Page Option', 'KodeForest'),
					'meta_slug' => 'kodeforest-page-option',
					'option_name' => 'post-option',
					'position' => 'side',
					'priority' => 'high',
				);
				
				$this->settings = wp_parse_args($settings, $default_setting);
				$this->options = $options;
				
				// send the hook to create custom meta box
				add_action('add_meta_boxes', array(&$this, 'add_page_option_meta'));

				// add hook to save page options
				add_action('pre_post_update', array(&$this, 'save_page_option'));
			}			
			
			// load the necessary script for the page builder item
			function load_admin_script(){

				add_action('admin_enqueue_scripts', array(&$this, 'enqueue_wp_media') );
			
				// include the sidebar generator style
				wp_enqueue_style('wp-color-picker');
				wp_enqueue_style('kode-alert-box', KODE_PATH . '/framework/include/backend_assets/css/kf_msg.css');	
				wp_enqueue_style('kode-page-option', KODE_PATH . '/framework/include/backend_assets/css/kf_pageoption.css');
				wp_enqueue_style('kode-font-awesome', KODE_PATH . '/css/font-awesome.css');	
				wp_enqueue_style('kode-admin-panel-html', KODE_PATH . '/framework/include/backend_assets/css/kf_element_meta.css');	
				wp_enqueue_style('kode-edit-box', KODE_PATH . '/framework/include/backend_assets/css/kf_popup_window.css');				

				// include the sidebar generator script
				wp_enqueue_script('wp-color-picker');
				wp_enqueue_script('kode-utility', KODE_PATH . '/framework/include/backend_assets/js/kf_filter.js');	
				wp_enqueue_script('kode-alert-box', KODE_PATH . '/framework/include/backend_assets/js/kf_msg.js');
				wp_enqueue_script('kode-admin-panel-html', KODE_PATH . '/framework/include/backend_assets/js/kf_element_meta.js');
				wp_enqueue_script('kode-save-settings', KODE_PATH . '/framework/include/backend_assets/js/kf_save_settings.js');
				wp_enqueue_script('kode-edit-box', KODE_PATH . '/framework/include/backend_assets/js/kf_popup_window.js');	
				wp_enqueue_script('kode-slider-selection', KODE_PATH . '/framework/include/backend_assets/js/kf_media_center.js');
				wp_enqueue_script('kode-page-builder', KODE_PATH . '/framework/include/backend_assets/js/kf_pagebuilder.js');
			}			
			
			//Media Manager
			function enqueue_wp_media(){
				if(function_exists( 'wp_enqueue_media' )){
					wp_enqueue_media();
				}		
			}
			
			// create the page builder meta at the add_meta_boxes hook
			function add_page_option_meta(){
				global $post;
				
				if( in_array($post->post_type, $this->settings['post_type']) ){
					$this->load_admin_script();
				
					foreach( $this->settings['post_type'] as $post_type ){
						add_meta_box(
							$this->settings['meta_slug'],
							$this->settings['meta_title'],
							array(&$this, 'create_page_option_elements'),
							$post_type,
							$this->settings['position'],
							$this->settings['priority']
						);			
					}
				}
				
			}
		
			// start creating the page builder element
			function create_page_option_elements(){
				global $post;

				$option_value = kode_decode_stopbackslashes(get_post_meta( $post->ID, $this->settings['option_name'], true ));
				if( !empty($option_value) ){
					$option_value = json_decode( $option_value, true );					
				}
	
				$option_generator = new kode_generate_admin_html();
				
				echo '<div class="kode-page-option-wrapper position-' . esc_attr($this->settings['position']) . '" >';
				
				foreach( $this->options as $option_section ){
					echo '<div class="kode-page-option">';
					echo '<div class="kode-page-option-title">' . esc_attr($option_section['title']) . '</div>';
					echo '<div class="kode-page-option-input-wrapper row">';
					
					foreach ( $option_section['options'] as $option_slug => $option ){
						$option['slug'] = $option_slug;
						$option['name'] = $option_slug;
						if( !empty($option_value) && isset($option_value[$option_slug]) ){
							$option['value'] = $option_value[$option_slug];
						}
						
						$option_generator->kode_generate_html( $option );
					}
					
					echo '</div>'; // page-option-input-wrapper
					echo '</div>'; // page-option-title
					
					
				}
				echo '<textarea class="kode-input-hidden" name="' . esc_attr($this->settings['option_name']) . '"></textarea>';
				echo '</div>'; // kode-page-option-wrapper
			}
			
			// save page option setting
			function save_page_option( $post_id ){
				if( isset($_POST[$this->settings['option_name']]) ){
					update_post_meta($post_id, $this->settings['option_name'], kode_stopbackslashes($_POST[$this->settings['option_name']]));
				}
			}
			
		}
		
		
	}

?>