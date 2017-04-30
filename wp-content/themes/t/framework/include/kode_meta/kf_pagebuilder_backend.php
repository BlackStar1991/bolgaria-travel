<?php
	/*	
	*	Kodeforest Admin Panel
	*	---------------------------------------------------------------------
	*	This file create the class that help you create the controls page builder  
	*	option for custom theme
	*	---------------------------------------------------------------------
	*/	
	
	if( !class_exists('kode_page_builder') ){
		
		class kode_page_builder{

			
			public $options;
			public $settings;
		
			function __construct($options = array(),$settings = array()){
				
				$default_config = array(
					'post_type' => array('page'),
					'meta_title' => __('Page Builder Options', 'KodeForest'),					
					'meta_slug' => 'page-builder',
					'position' => 'normal',
					'priority' => 'high',
					'section' => array(
						// 'above-sidebar' => array( 
							// 'title' => __('Above Sidebar Section', 'KodeForest'),
							// 'class' => 'above-sidebar-section',
						// ),
						'kode_content' => array( 
							'title' => __('Click and Drop Element Here', 'KodeForest'),
							'class' => 'with-sidebar-section',
						),
						// 'below-sidebar' => array( 
							// 'title' => __('Below Sidebar Section', 'KodeForest'),
							// 'class' => 'below-sidebar-section',
						// )					
					)
				);
				
				$this->settings = wp_parse_args($settings, $default_config);
				$this->options = $options;
				
				// send the hook to create custom meta box
				add_action('add_meta_boxes', array(&$this, 'add_page_builder_meta'));
				
				// add hook to save the page builder option
				add_action('pre_post_update', array(&$this, 'save_page_builder'));
				
				// add action for ajax call to print the tiny mce editor
				add_action('wp_ajax_kode_print_tinymce_editor', array(&$this, 'kode_print_tinymce_editor'));					
			}		
			
			// load the necessary script for the page builder item
			function kode_load_admin_scripts(){
			
				add_action('admin_enqueue_scripts', array(&$this, 'enqueue_wp_media') );
			
				// include the sidebar generator style
				wp_enqueue_style('wp-color-picker');
				wp_enqueue_style('kode-page-builder', KODE_PATH . '/framework/include/backend_assets/css/kf_pagebuilder.css');	
				wp_enqueue_style('kode-font-awesome', KODE_PATH . '/css/font-awesome.css');	
				wp_enqueue_style('kode-alert-box', KODE_PATH . '/framework/include/backend_assets/css/kf_msg.css');	
				wp_enqueue_style('kode-edit-box', KODE_PATH . '/framework/include/backend_assets/css/kf_popup_window.css');
				wp_enqueue_style('kode-admin-chosen', KODE_PATH . '/framework/include/backend_assets/css/kode-chosen/chosen.min.css');
				wp_enqueue_style('kode-page-option', KODE_PATH . '/framework/include/backend_assets/css/kf_pageoption.css');					
				
				wp_enqueue_script('wp-color-picker');
				wp_enqueue_script('kode-utility', KODE_PATH . '/framework/include/backend_assets/js/kf_filter.js');	
				wp_enqueue_script('kode-alert-box', KODE_PATH . '/framework/include/backend_assets/js/kf_msg.js');
				wp_enqueue_script('kode-save-settings', KODE_PATH . '/framework/include/backend_assets/js/kf_save_settings.js');
				wp_enqueue_script('kode-edit-box', KODE_PATH . '/framework/include/backend_assets/js/kf_popup_window.js');				
				wp_enqueue_script('kode-slider-selection', KODE_PATH . '/framework/include/backend_assets/js/kf_media_center.js');
				wp_enqueue_script('kode-admin-chosen', KODE_PATH . '/framework/include/backend_assets/js/kode-chosen/chosen.jquery.min.js');
				wp_enqueue_script('kode-page-builder', KODE_PATH . '/framework/include/backend_assets/js/kf_pagebuilder.js');
				
				
				wp_localize_script( 'kode-edit-box', 'KODE', array('ajax_url'=>AJAX_URL) );
			}	
			function enqueue_wp_media(){
				if(function_exists( 'wp_enqueue_media' )){
					wp_enqueue_media();
				}		
			}			
			
			// create the page builder meta at the add_meta_boxes hook
			function add_page_builder_meta(){
				global $post; 
				
				if( in_array($post->post_type, $this->settings['post_type']) ){
					$this->kode_load_admin_scripts();
					
					foreach( $this->settings['post_type'] as $post_type ){
						add_meta_box(
							$this->settings['meta_slug'],
							$this->settings['meta_title'],
							array(&$this, 'create_page_builder_elements'),
							$post_type,
							$this->settings['position'],
							$this->settings['priority']
						);			
					}
				}
				
			}
		
			// start creating the page builder element
			function create_page_builder_elements(){		
				echo '<div class="kode-page-builder" id="kode-page-builder">';
				
				echo '<div id="page-builder-add-item" class="page-builder-creator-wrapper">';
				$this->print_page_builder_creator();
				echo '</div>';
				
				echo '<div id="page-builder-default-item">';
				$this->print_page_builder_default_item();
				echo '</div>';
				
				echo '<div id="page-builder-content-item" class="page-builder-content-wrapper">';
				$this->print_page_builder_content();
				echo '</div>';
				
				echo '</div>'; // kode-page-builder
			}
			
			// add page builder section
			function print_page_builder_creator(){
				
				// head section
				echo '<div class="page-builder-head-wrapper">';
				echo '<h4 class="page-builder-head add-content">' . __('Add Content Item', 'KodeForest') . '</h4>';
				echo '</div>';
				
				echo '<div class="page-builder-creator row">';
				foreach( $this->options as $add_item_slug => $add_item_wrapper ){
					echo '<div class="item-selector-wrapper">';
					echo '<h5 class="item-selector-header">' . $add_item_wrapper['title'] . '</h5>'; 
					
					echo '<div class="kode-combobox-wrapper" >';
					//echo '<select class="content-item-selector" >';
					//echo '<option>' . esc_attr($add_item_wrapper['blank_option']) . '</option>';
					$size = '';
					echo '<div class="kode-list-item">';
					foreach( $add_item_wrapper['options'] as $item_slug => $item_wrapper ){
						if( !empty($item_wrapper) ){
							//echo '<option value="' . esc_attr($item_slug) . '" >';
							$size = (!empty($item_wrapper['size']))? esc_attr($item_wrapper['size']) . ' ': '';
							$icon = (!empty($item_wrapper['icon']))? esc_attr($item_wrapper['icon']) . ' ': '';
							// echo esc_attr($item_wrapper['title']) . '</option>';
							echo '
								<div class="k_list_item" data-slug="'.esc_attr($item_slug).'" data-size="'.esc_attr($size).'">
									<span><i class="fa '.esc_attr($icon).'"></i></span>
									<p>'. esc_attr($item_wrapper['title']).'</p>
								</div>';
						}
					}
					echo '</div>';
					//echo '</select>';
					echo '</div>'; // kode-combobox-wrapper
					
					//echo '<input class="kdf-add-item" type="button" value="+" />';
					//echo '<a class="kdf-add-item"><i class="fa fa-plus"></i> Add Element</a>';
					echo '</div>'; // item selector wrapper
				}
				
				echo '<div class="clear"></div>';
				echo '</div>';
			
			}
			
			// print default item to be a prototype
			function print_page_builder_default_item(){
				$page_builder_html = new kode_page_builder_html();
			
				foreach( $this->options as $add_item_slug => $add_item_wrapper ){
					foreach( $add_item_wrapper['options'] as $item_slug => $item_wrapper ){
						echo '<div id="' . esc_attr($item_slug) . '-default" >';

						// dragable section
						$item_wrapper['slug'] = $item_slug; 
						if( $item_wrapper['type'] == 'wrapper' ){
							$page_builder_html->print_draggable_wrapper($item_wrapper);
						}else{
							$page_builder_html->print_draggable_item($item_wrapper);
						}

						echo '</div>';
					}
				}
			}
			
			// merge all options to use in html section
			function merge_page_builder_items(){
				$all_items = array();
				
				foreach( $this->options as $items ){
					if( !empty($items['options']) ){
						$all_items = array_merge($all_items, $items['options']);
					}
				}
				
				return $all_items;
			}
			
			// page builder content section
			function print_page_builder_content(){
				global $post;
				
				$page_builder_html = new kode_page_builder_html( $this->merge_page_builder_items() );
				
				// head section
				echo '<div class="page-builder-head-wrapper">';
				echo '<h4 class="page-builder-head page-builder">' . __('Page Builder Section', 'KodeForest') . '</h4>';
				
				// echo '<div class="command-button-wrapper">';
				// echo '<input class="undo-button" type="button" value="' . __('Undo', 'KodeForest') . '" />';
				// echo '<input class="redo-button" type="button" value="' . __('Redo', 'KodeForest') . '" />';
				// echo '</div>';	
				echo '</div>'; // page-builder-head-wrapper
				
				echo '<div class="page-builder-content">';
				
				foreach( $this->settings['section'] as $section_slug => $section ){
					$value = kode_decode_stopbackslashes(get_post_meta($post->ID, $section_slug, true));
					$array_value = json_decode( $value, true );
					
					echo '<div class="content-section-wrapper ' . $section['class'] . '">';
					// echo '<div class="content-section-head-wrapper active">';
					// echo '<h6 class="content-section-head">' . $section['title'] . '</h6>';
					// echo '</div>';
					
					echo '<div class="kode-sortable-wrapper" data-type="' . $section['class'] . '" >';
					echo '<div class="page-builder-item-area kode-sortable clear-fix row ';
					echo (!empty($array_value))? '': 'blank';
					echo '" >';
					$page_builder_html->print_page_builder( $array_value );	
					echo '</div>';
					echo '</div>'; // kode-sortable-wrapper
					
					echo '<textarea class="kode-input-hidden" name="' . esc_attr($section_slug) . '" >' . esc_textarea($value) . '</textarea>';
					echo '</div>'; // content-section-wrapper
					
					echo '<div class="clear"></div>';
				}
				echo '</div>'; // page-builder-content
			
			}
			
			// function to allow printing the editor on ajax call
			function kode_print_tinymce_editor(){
				wp_editor( kode_stopbackslashes($_POST['content']), 
					$_POST['id'], array('textarea_name'=> $_POST['name']) );			
				die();
			}	
			
			// save page builder setting
			function save_page_builder( $post_id ){
				foreach( $this->settings['section'] as $section_slug => $section ){
					if( isset($_POST[$section_slug]) ){
						update_post_meta($post_id, $section_slug, kode_stopbackslashes($_POST[$section_slug]));
					}
				}
			}
			
		}
		
		
	}

?>