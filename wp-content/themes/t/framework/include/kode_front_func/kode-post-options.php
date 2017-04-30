<?php
	/*	
	*	Kodeforest Post Option file
	*	---------------------------------------------------------------------
	*	This file creates all post options to the post page
	*	---------------------------------------------------------------------
	*/
	
	// Generate Options in theme Option Panel
	add_filter('kode_themeoption_panel', 'kode_register_post_themeoption');
	if( !function_exists('kode_register_post_themeoption') ){
		function kode_register_post_themeoption( $array ){		
			global $theme_option;
			if(!isset($theme_option['sidebar-element'])){$theme_option['sidebar-element'] = array('blog','contact');}
			//if empty
			if( empty($array['general']['options']) ){
				return $array;
			}
			//Blog options
			$post_themeoption = array(
				'title' => __('Blog Settings', 'KodeForest'),
				'options' => array(
					'post-title' => array(
						'title' => 'Sub Header Post Title',
						'type' => 'text',	
						'description' => 'Sub Header Post Title'
					),
					'post-caption' => array(
						'title' => 'Sub Header Post Caption',
						'type' => 'textarea',
						'description' => 'Add Sub Header Post Caption'
					),
					'post-sidebar-template' => array(
						'title' => __('Single Default Sidebar', 'KodeForest'),
						'type' => 'radioimage',
						'options' => array(
							'no-sidebar'=>		KODE_PATH . '/framework/include/backend_assets/images/no-sidebar.png',
							'both-sidebar'=>	KODE_PATH . '/framework/include/backend_assets/images/both-sidebar.png', 
							'right-sidebar'=>	KODE_PATH . '/framework/include/backend_assets/images/right-sidebar.png',
							'left-sidebar'=>	KODE_PATH . '/framework/include/backend_assets/images/left-sidebar.png'
						),
					),
					'post-sidebar-left' => array(
						'title' => __('Single Default Sidebar Left', 'KodeForest'),
						'type' => 'combobox_sidebar',
						'wrapper-class' => 'left-sidebar-wrapper both-sidebar-wrapper post-sidebar-template-wrapper',
						'options' => $theme_option['sidebar-element'],		
					),
					'post-sidebar-right' => array(
						'title' => __('Single Default Sidebar Right', 'KodeForest'),
						'type' => 'combobox_sidebar',
						'wrapper-class' => 'right-sidebar-wrapper both-sidebar-wrapper post-sidebar-template-wrapper',
						'options' => $theme_option['sidebar-element'],
					),	
					'single-post-author' => array(
						'title' => __('Single Post Author', 'KodeForest'),
						'type' => 'checkbox',							
					),					
				)
			);
			
			
			$array['general']['options']['blog-style'] = $post_themeoption;
			return $array;
		}
	}		

	// add a post option to post page
	if( is_admin() ){
		add_action('init', 'kode_create_post_options');
	}
	if( !function_exists('kode_create_post_options') ){
	
		function kode_create_post_options(){
			global $theme_option;
			if( !class_exists('kode_page_options') ) return;
			new kode_page_options( 
				
				// page option settings
				array(
					'page-layout' => array(
						'title' => __('Page Layout', 'KodeForest'),
						'options' => array(
								'sidebar' => array(
									'title' => __('Sidebar Template' , 'KodeForest'),
									'type' => 'radioimage',
									'options' => array(
										//'default-sidebar'=>KODE_PATH . '/framework/include/backend_assets/images/default-sidebar-2.png',
										'no-sidebar'=>KODE_PATH . '/framework/include/backend_assets/images/no-sidebar.png',
										'both-sidebar'=>KODE_PATH . '/framework/include/backend_assets/images/both-sidebar.png', 
										'right-sidebar'=>KODE_PATH . '/framework/include/backend_assets/images/right-sidebar.png',
										'left-sidebar'=>KODE_PATH . '/framework/include/backend_assets/images/left-sidebar.png'
									),
									'default' => 'default-sidebar'
								),	
								'left-sidebar' => array(
									'title' => __('Left Sidebar' , 'KodeForest'),
									'type' => 'combobox_sidebar',
									'options' => $theme_option['sidebar-element'],
									'wrapper-class' => 'sidebar-wrapper left-sidebar-wrapper both-sidebar-wrapper'
								),
								'right-sidebar' => array(
									'title' => __('Right Sidebar' , 'KodeForest'),
									'type' => 'combobox_sidebar',
									'options' => $theme_option['sidebar-element'],
									'wrapper-class' => 'sidebar-wrapper right-sidebar-wrapper both-sidebar-wrapper'
								),						
						)
					),
					
					'page-option' => array(
						'title' => __('Page Option', 'KodeForest'),
						'options' => array(
							'page-title' => array(
								'title' => __('Post Title' , 'KodeForest'),
								'type' => 'text',
							),
							'page-caption' => array(
								'title' => __('Post Caption' , 'KodeForest'),
								'type' => 'textarea'
							)						
						)
					),

				),
				// page option attribute
				array(
					'post_type' => array('post'),
					'meta_title' => __('Kodeforest Post Option', 'KodeForest'),
					'meta_slug' => 'kodeforest-page-option',
					'option_name' => 'post-option',
					'position' => 'normal',
					'priority' => 'high',
				)
			);	
		}
	}
	
	add_action('pre_post_update', 'kode_save_post_meta_option');
	if( !function_exists('kode_save_post_meta_option') ){
	function kode_save_post_meta_option( $post_id ){
			if( get_post_type() == 'post' && isset($_POST['post-option']) ){
				$post_option = kode_stopbackslashes(kode_stripslashes($_POST['post-option']));
				$post_option = json_decode(kode_decode_stopbackslashes($post_option), true);
				
				if(!empty($post_option['rating'])){
					update_post_meta($post_id, 'kode-post-rating', floatval($post_option['rating']) * 100);
				}else{
					delete_post_meta($post_id, 'kode-post-rating');
				}
			}
		}
	}
	
?>