<?php
	/*	
	*	Package Option file
	*	---------------------------------------------------------------------
	*	This file creates all package options and attached to the theme
	*	---------------------------------------------------------------------
	*/
	
	// add a package option to package page
	if( is_admin() ){ add_action('after_setup_theme', 'kode_create_package_options'); }
	if( !function_exists('kode_create_package_options') ){
	
		function kode_create_package_options(){
			global $theme_option;
			
			if( !class_exists('kode_page_options') ) return;
			new kode_page_options( 

				// page option settings
				array(
					'page-layout' => array(
						'title' => esc_attr__('Page Layout', 'kode-package'),
						'options' => array(
								'sidebar' => array(
									'type' => 'radioimage',
									'options' => array(
										'no-sidebar'=>		KODE_PATH . '/framework/include/backend_assets/images/no-sidebar.png',
										'both-sidebar'=>	KODE_PATH . '/framework/include/backend_assets/images/both-sidebar.png', 
										'right-sidebar'=>	KODE_PATH . '/framework/include/backend_assets/images/right-sidebar.png',
										'left-sidebar'=>	KODE_PATH . '/framework/include/backend_assets/images/left-sidebar.png'
									),
									'default' => 'no-sidebar'
								),	
								'left-sidebar' => array(
									'title' => esc_attr__('Left Sidebar' , 'kode-package'),
									'type' => 'combobox_sidebar',
									'options' => $theme_option['sidebar-element'],
									'wrapper-class' => 'sidebar-wrapper left-sidebar-wrapper both-sidebar-wrapper'
								),
								'right-sidebar' => array(
									'title' => esc_attr__('Right Sidebar' , 'kode-package'),
									'type' => 'combobox_sidebar',
									'options' => $theme_option['sidebar-element'],
									'wrapper-class' => 'sidebar-wrapper right-sidebar-wrapper both-sidebar-wrapper'
								),						
						)
					),
					
					'page-option' => array(
						'title' => esc_attr__('Page Option', 'kode-package'),
						'options' => array(
							'page-caption' => array(
								'title' => esc_attr__('Page Caption' , 'kode-package'),
								'type' => 'textarea'
							),							
							'header-background' => array(
								'title' => esc_attr__('Header Background Image' , 'kode-package'),
								'button' => esc_attr__('Upload', 'kode-package'),
								'type' => 'upload',
							),	
							'price' => array(
								'title' => esc_attr__('Цена' , 'kode-package'),
								'type' => 'text',
							),
							'price-prefix' => array(
								'title' => esc_attr__('Префикс цены' , 'kode-package'),
								'type' => 'text',
							),
							'days' => array(
								'title' => esc_attr__('Количество дней' , 'kode-package'),
								'type' => 'text',
								'description' => 'Number of days, months or weeks in numeric',
							),
							'days-prefix' => array(
								'title' => esc_attr__('Количество дней префикс' , 'kode-package'),
								'type' => 'text',
								'description' => 'Days, Months or Weeks',
							),
							'location' => array(
								'title' => esc_attr__('Звезд' , 'kode-package'),
								'type' => 'text',
							),
							'map_icon' => array(
								'title' => esc_attr__('Map Icon' , 'kode-package'),
								'type' => 'upload',
								//'wrapper-class' => 'image-wrapper inside-thumbnail-type-wrapper'
							),	
							'availability' => array(
								'title' => esc_attr__('Количество мест' , 'kode-package'),
								'type' => 'text',
							),	
							'book_text' => array(
								'title' => esc_attr__('Кнопка забронировать' , 'kode-package'),
								'type' => 'text',
							),
							'book_url' => array(
								'title' => esc_attr__('Кнопка забронировать URL' , 'kode-package'),
								'type' => 'text',
							),
							'post_media_type' => array(
								'title' => esc_attr__('Select Post Media' , 'kodeforest'),
								'type' => 'combobox',
								'options' => array(
									'audio'=>	esc_attr__('Audio URL' , 'kodeforest'),
									'video'=>	esc_attr__('Video URL' , 'kodeforest'),
									'featured_image'=>	esc_attr__('Feature Image' , 'kodeforest'),
									'slider'=>	esc_attr__('Slider' , 'kodeforest'),
								),
								'description'=> esc_attr__('Select post media type.', 'kodeforest')
							),	
							'kode_audio' => array(
								'title' => __('Audio URL' , 'KodeForest'),
								'type' => 'text',
								'wrapper-class' => 'audio-wrapper post_media_type-wrapper',
								'description' => __('Add audio url, it could be uploaded mp3 , wav or add soundcloud track or profile url.', 'KodeForest')
							),		
							'kode_video' => array(
								'title' => __('Video URL' , 'KodeForest'),
								'type' => 'text',
								'wrapper-class' => 'video-wrapper post_media_type-wrapper',
								'description' => __('Add video url, it could be uploaded video track or youtube, vimeo.', 'KodeForest')
							),	
							'slider'=> array(	
								'overlay'=> 'false',
								'caption'=> 'false',
								'type'=> 'slider',
								'wrapper-class' => 'slider-wrapper post_media_type-wrapper',
							),								
						)
					),

				),
				// page option attribute
				array(
					'post_type' => array('package'),
					'meta_title' => esc_attr__('Package Option', 'kode-package'),
					'meta_slug' => 'package-page-option',
					'option_name' => 'post-option',
					'position' => 'normal',
					'priority' => 'high',
				)
			);
			
		}
	}	
	
	// add package in page builder area
	add_filter('kode_page_builder_option', 'kode_register_package_item');
	if( !function_exists('kode_register_package_item') ){
		function kode_register_package_item( $page_builder = array() ){
			global $kode_spaces;
		
			$page_builder['content-item']['options']['package'] = array(
				'title'=> esc_attr__('Package', 'kode-package'), 
				'type'=>'item',
				'icon'=>'fa-briefcase',
				'options'=> array(		
					'title-num-fetch'=> array(
						'title'=> esc_attr__('Title Num Fetch' ,'kode-package'),
						'type'=> 'text',	
						'default'=> '8',
						'description'=> esc_attr__('Specify the number of package title you want to pull out.', 'kode-package')
					),					
					'category'=> array(
						'title'=> esc_attr__('Category' ,'kode-package'),
						'type'=> 'multi-combobox',
						'options'=> kode_get_term_list('package_category'),
						'description'=> esc_attr__('You can use Ctrl/Command button to select multiple categories or remove the selected category. <br><br> Leave this field blank to select all categories.', 'kode-package')
					),	
					'tag'=> array(
						'title'=> esc_attr__('Tag' ,'kode-package'),
						'type'=> 'multi-combobox',
						'options'=> kode_get_term_list('package_tag'),
						'description'=> esc_attr__('Will be ignored when the package filter option is enabled.', 'kode-package')
					),					
					'package-style'=> array(
						'title'=> esc_attr__('Package Style' ,'kode-package'),
						'type'=> 'combobox',
						'options'=> array(
							'simple-view' => esc_attr__('Simple View', 'kode-package'),
							'normal-view' => esc_attr__('Normal View', 'kode-package'),
							'listing-view' => esc_attr__('Listing View', 'kode-package'),
							'modern-view' => esc_attr__('Modern View', 'kode-package')
						),
					),	
					'package-layout'=> array(
						'title'=> esc_attr__('Package Layout' ,'kode-package'),
						'type'=> 'combobox',
						'options'=> array(
							'grid-3column' => esc_attr__('3 Column', 'kode-package'),
							'grid-4column' => esc_attr__('4 Column', 'kode-package')
						),
						'wrapper-class'=>'package-style-wrapper modern-view-wrapper'
					),						
					'num-fetch'=> array(
						'title'=> esc_attr__('Num Fetch' ,'kode-package'),
						'type'=> 'text',	
						'default'=> '8',
						'description'=> esc_attr__('Specify the number of packages you want to pull out.', 'kode-package')
					),	
					'num-excerpt'=> array(
						'title'=> esc_attr__('Num Excerpt' ,'kode-package'),
						'type'=> 'text',	
						'default'=> '20',
						'wrapper-class'=>'package-style-wrapper classic-package-wrapper classic-package-no-space-wrapper'
					),
					'orderby'=> array(
						'title'=> esc_attr__('Order By' ,'kode-package'),
						'type'=> 'combobox',
						'options'=> array(
							'date' => esc_attr__('Publish Date', 'kode-package'), 
							'title' => esc_attr__('Title', 'kode-package'), 
							'rand' => esc_attr__('Random', 'kode-package'), 
						)
					),
					'order'=> array(
						'title'=> esc_attr__('Order' ,'kode-package'),
						'type'=> 'combobox',
						'options'=> array(
							'desc'=>esc_attr__('Descending Order', 'kode-package'), 
							'asc'=> esc_attr__('Ascending Order', 'kode-package'), 
						)
					),			
					'pagination'=> array(
						'title'=> esc_attr__('Enable Pagination' ,'kode-package'),
						'type'=> 'checkbox'
					),					
					'margin-bottom' => array(
						'title' => esc_attr__('Margin Bottom', 'kode-package'),
						'type' => 'text',
						'default' => '',
						'description' => esc_attr__('Spaces after ending of this item', 'kode-package')
					),				
				)
			);

			return $page_builder;
		}
	}
	
	// add package in page builder area
	add_filter('kode_page_builder_option', 'kode_register_package_marker_item');
	if( !function_exists('kode_register_package_marker_item') ){
		function kode_register_package_marker_item( $page_builder = array() ){
			global $kode_spaces;

			$page_builder['content-item']['options']['package_marker'] = array(
				'title'=> esc_attr__('Packages Marker', 'kode-package'), 
				'type'=>'item',
				'icon'=>'fa fa-lock',
				'options'=>array(					
				
					'category'=> array(
						'title'=> esc_attr__('Category' ,'kode-package'),
						'type'=> 'combobox',
						'options'=> kode_get_term_list('package_category'),
						'description'=> esc_attr__('You can use Ctrl/Command button to select multiple categories or remove the selected category. <br><br> Leave this field blank to select all categories.', 'kode-package')
					),	
					'tag'=> array(
						'title'=> esc_attr__('Tag' ,'kode-package'),
						'type'=> 'combobox',
						'options'=> kode_get_term_list('package_tag'),
						'description'=> esc_attr__('Will be ignored when the package filter option is enabled.', 'kode-package')
					),					
					// 'marker-style'=> array(
						// 'title'=> esc_attr__('Marker Style' ,'kode-package'),
						// 'type'=> 'combobox',
						// 'options'=> array(
							// 'normal-view' => esc_attr__('Normal View', 'kode-package'),
							// 'modern-view' => esc_attr__('Modern View', 'kode-package')
						// ),
					// ),					
					'num-fetch'=> array(
						'title'=> esc_attr__('Num Fetch' ,'kode-package'),
						'type'=> 'text',	
						'default'=> '8',
						'description'=> esc_attr__('Specify the number of packages you want to pull out.', 'kode-package')
					),	
					'map-height'=> array(
						'title'=> esc_attr__('Map Height' ,'kode-package'),
						'type'=> 'text',	
						'default'=> '350px',
						//'wrapper-class'=>'package-style-wrapper classic-package-wrapper classic-package-no-space-wrapper'
					),
					
					'orderby'=> array(
						'title'=> esc_attr__('Order By' ,'kode-package'),
						'type'=> 'combobox',
						'options'=> array(
							'date' => esc_attr__('Publish Date', 'kode-package'), 
							'title' => esc_attr__('Title', 'kode-package'), 
							'rand' => esc_attr__('Random', 'kode-package'), 
						)
					),
					'order'=> array(
						'title'=> esc_attr__('Order' ,'kode-package'),
						'type'=> 'combobox',
						'options'=> array(
							'desc'=>esc_attr__('Descending Order', 'kode-package'), 
							'asc'=> esc_attr__('Ascending Order', 'kode-package'), 
						)
					),			
					// 'pagination'=> array(
						// 'title'=> esc_attr__('Enable Pagination' ,'kode-package'),
						// 'type'=> 'checkbox'
					// ),					
					'margin-bottom' => array(
						'title' => esc_attr__('Margin Bottom', 'kode-package'),
						'type' => 'text',
						'default' => '',
						'description' => esc_attr__('Spaces after ending of this item', 'kode-package')
					),				
				)
			);
			
			
			return $page_builder;
		}
	}
	
	add_action('pre_post_update', 'kode_save_post_meta_option');
	if( !function_exists('kode_save_post_meta_option') ){
	function kode_save_post_meta_option( $post_id ){
			if( get_post_type() == 'package' && isset($_POST['post-option']) ){
				$post_option = kode_stopbackslashes(kode_stripslashes($_POST['post-option']));
				$post_option = json_decode(kode_decode_stopbackslashes($post_option), true);
				
				if(!empty($post_option['price'])){
					update_post_meta($post_id, 'price', esc_attr($_POST['price']));
				}else{
					delete_post_meta($post_id, 'price');
				}
				if(!empty($post_option['days'])){
					update_post_meta($post_id, 'days', esc_attr($_POST['days']));
				}else{
					delete_post_meta($post_id, 'days');
				}
				if(!empty($post_option['location'])){
					update_post_meta($post_id, 'location', esc_attr($_POST['location']));
				}else{
					delete_post_meta($post_id, 'location');
				}
				if(!empty($post_option['availability'])){
					update_post_meta($post_id, 'availability', esc_attr($_POST['availability']));
				}else{
					delete_post_meta($post_id, 'availability');
				}
				if(!empty($post_option['book_text'])){
					update_post_meta($post_id, 'book_text', esc_attr($_POST['book_text']));
				}else{
					delete_post_meta($post_id, 'book_text');
				}
				if(!empty($post_option['book_url'])){
					update_post_meta($post_id, 'book_url', esc_url($_POST['book_url']));
				}else{
					delete_post_meta($post_id, 'book_url');
				}
			}
		}
	}
	
?>