<?php
	/*	
	*	Kodeforest Pagebuilder File
	*	---------------------------------------------------------------------
	*	This file contains the page builder settings
	*	---------------------------------------------------------------------
	*/	
	
	// create the page option
	add_action('init', 'kode_create_page_options');
	if( !function_exists('kode_create_page_options') ){
	
		function kode_create_page_options(){
			global $theme_option;
		
			new kode_page_options( 
				
				// page option settings
				array(
					// 'page-layout' => array(
						// 'title' => __('Page Layout', 'kode_forest'),
						// 'options' => array(
								// 'sidebar' => array(
									// 'type' => 'radioimage',
									// 'options' => array(
										// 'no-sidebar'=>KODE_PATH . '/include/images/no-sidebar-2.png',
										// 'both-sidebar'=>KODE_PATH . '/include/images/both-sidebar-2.png', 
										// 'right-sidebar'=>KODE_PATH . '/include/images/right-sidebar-2.png',
										// 'left-sidebar'=>KODE_PATH . '/include/images/left-sidebar-2.png'
									// ),
									// 'default'=>'no-sidebar'
								// ),	
								// 'left-sidebar' => array(
									// 'title' => __('Left Sidebar' , 'kode_forest'),
									// 'type' => 'combobox',
									// 'options' => $kode_sidebar_controller->get_sidebar_array(),
									// 'wrapper-class' => 'sidebar-wrapper left-sidebar-wrapper both-sidebar-wrapper'
								// ),
								// 'right-sidebar' => array(
									// 'title' => __('Right Sidebar' , 'kode_forest'),
									// 'type' => 'combobox',
									// 'options' => $kode_sidebar_controller->get_sidebar_array(),
									// 'wrapper-class' => 'sidebar-wrapper right-sidebar-wrapper both-sidebar-wrapper'
								// ),		
								// 'page-style' => array(
									// 'title' => __('Page Style' , 'kode_forest'),
									// 'type' => 'combobox',
									// 'options' => array(
										// 'normal'=> __('Normal', 'kode_forest'),
										// 'no-header'=> __('No Header', 'kode_forest'),
										// 'no-footer'=> __('No Footer', 'kode_forest'),
										// 'no-header-footer'=> __('No Header / No Footer', 'kode_forest'),
									// )
								// ),
						// )
					// ),
					
					'page-option' => array(
						'title' => __('Page Option', 'kode_forest'),
						'options' => array(
							'show-sub' => array(
								'title' => __('Show Sub Header' , 'kode_forest'),
								'type' => 'checkbox',
								'default' => 'enable',
								'wrapper-class' => 'four columns kode-btn-icons',
							),	
							'page-caption' => array(
								'title' => __('Page Caption' , 'kode_forest'),
								'type' => 'textarea',
								'wrapper-class' => 'four columns kode-txt-area',
							),								
							'header-background' => array(
								'title' => __('Header Background Image' , 'kode_forest'),
								'button' => __('Upload', 'kode_forest'),
								'type' => 'upload',
								'wrapper-class' => 'four columns kode-bg-sec',
							),			
							// 'header-style' => array(
								// 'title' => __('Header Style' , 'kode_forest'),
								// 'type' => 'combobox',
								// 'options' => array(
									// 'default' => __('Default', 'kode_forest'),
									// 'solid' => __('Solid', 'kode_forest'),
									// 'transparent' => __('Transparent', 'kode_forest'),
								// )
							// )						
						)
					),

				),
				// page option attribute
				array(
					'post_type' => array('page'),
					'meta_title' => __('Page Option', 'kode_forest'),
					'meta_slug' => 'kodeforest-page-option',
					'option_name' => 'post-option',
					'position' => 'normal',
					'priority' => 'high',
				)
			);
			
		}
	}
	
	// create the page builder
	if( is_admin() ){
		add_action('init', 'kode_create_page_builder_option');
	}
	if( !function_exists('kode_create_page_builder_option') ){	
		function kode_create_page_builder_option(){
			global $theme_option;
			new kode_page_builder( 
				
				// page builder option setting
				apply_filters('kode_page_builder_option',
					array(
						'content-item' => array(
							'title' => __('Content & Post Options', 'KodeForest'),
							'blank_option' => __('- Select Content Element -', 'KodeForest'),
							'options' => array(
								'column1-1' => array(
									'title'=> __('Column', 'KodeForest'),
									'type'=>'wrapper',
									'icon'=>'fa-file-o',
									'size'=>'1/1'
								),
								'full-size-wrapper' => array(
									'title'=> __('Section', 'KodeForest'), 
									'type'=>'wrapper',
									'icon'=>'fa-circle-o-notch',
									'options'=>array(
										'element-item-id' => array(
											'title' => __('Page Item ID', 'KodeForest'),
											'type' => 'text',
											'default' => '',
											'description' => __('please add the page item id.', 'KodeForest')
										),
										'element-item-class' => array(
											'title' => __('Page Item Class', 'KodeForest'),
											'type' => 'text',
											'default' => '',
											'description' => __('please add the page item class.', 'KodeForest')
										),	
										'type' => array(
											'title' => __('Type', 'KodeForest'),
											'type' => 'combobox',
											'options' => array(
												'image'=> __('Background Image', 'KodeForest'),
												'pattern'=> __('Predefined Pattern', 'KodeForest'),
												'video'=> __('Video Background', 'KodeForest'),
												'color'=> __('Color Background', 'KodeForest'),
												'map'=> __('Google Map', 'KodeForest'),
											),
											'default'=>'color'
										),
										'video_url' => array(
											'title' => __('Video URL', 'KodeForest'),
											'type' => 'text',
											'default' => '',
											'wrapper-class'=>'type-wrapper video-wrapper',
											'description' => __('add video url for the parallax video background for mp4', 'KodeForest')
										),	
										'container' => array(
											'title' => __('Container', 'KodeForest'),
											'type' => 'combobox',
											'options' => array(
												'full-width'=> __('Full Width', 'KodeForest'),
												'container-width'=> __('Container (inside 1170px)', 'KodeForest'),
											),
											'description' => __('Select container width, container full width section will be full width.', 'KodeForest'),
											'default'=>'container-width'
										),
										'map_shortcode' => array(
											'title' => __('Google Map Shortcode', 'KodeForest'),
											'type' => 'text',
											'default' => '',
											'wrapper-class'=>'type-wrapper map-wrapper',
											'description' => __('Add google map shortcode to add background.', 'KodeForest')
										),											
										'background' => array(
											'title' => __('Background Image', 'KodeForest'),
											'button' => __('Upload', 'KodeForest'),
											'type' => 'upload',
											'wrapper-class' => 'type-wrapper image-wrapper'
										),	
										'background-color' => array(
											'title' => __('Overlay Color', 'KodeForest'),
											'type' => 'colorpicker',
											'default'=> '#ffffff',
											'wrapper-class'=>'type-wrapper image-wrapper color-wrapper'
										),												
										'opacity' => array(
											'title' => __('Opacity', 'KodeForest'),
											'type' => 'text',
											'default' => '0.03',
											'wrapper-class'=>'type-wrapper image-wrapper',
											'description' => __('add opacity to the background image. for example from .01 to 1', 'KodeForest')
										),	
										'background-speed' => array(
											'title' => __('Background Speed', 'KodeForest'),
											'type' => 'text',
											'default' => '0',
											'wrapper-class' => 'type-wrapper image-wrapper',
											'description' => __('Fill 0 if you don\'t want the background to scroll and 1 when you want the background to have the same speed as the scroll bar', 'KodeForest') .
												'<br><br><strong>' . __('*** only allow the number between -1 to 1', 'KodeForest') . '</strong>'
										),
										'padding-top' => array(
											'title' => __('Padding Top', 'KodeForest'),
											'type' => 'text',
											'description' => __('Spaces before starting any content in this section', 'KodeForest')
										),	
										'padding-bottom' => array(
											'title' => __('Padding Bottom', 'KodeForest'),
											'type' => 'text',
											'description' => __('Spaces after ending of the content in this section', 'KodeForest')
										),
									)
								),
								'accordion' => array(
									'title'=> __('Accordion', 'KodeForest'), 
									'icon'=>'fa-server',
									'type'=>'item',
									'options'=> array(
										'element-item-id' => array(
											'title' => __('Page Item ID', 'KodeForest'),
											'type' => 'text',
											'default' => '',
											'description' => __('please add the page item id.', 'KodeForest')
										),
										'element-item-class' => array(
											'title' => __('Page Item Class', 'KodeForest'),
											'type' => 'text',
											'default' => '',
											'description' => __('please add the page item class.', 'KodeForest')
										),	
										'accordion'=> array(
											'type'=> 'tab',
											'default-title'=> __('Accordion' ,'KodeForest')											
										),
										'initial-state'=> array(
											'title'=> __('On Load Open', 'KodeForest'),
											'type'=> 'text',
											'default'=> 1,
											'description'=> __('0 will close all tab as an initial state, 1 will open the first tab and so on.', 'KodeForest')						
										),												
										'margin-bottom' => array(
											'title' => __('Margin Bottom', 'KodeForest'),
											'type' => 'text',
											'description' => __('Spaces after ending of this item', 'KodeForest')
										),
									)
								),								
								
								'sidebar' => array(
									'title'=> __('Sidebar', 'KodeForest'), 
									'icon'=>'fa-th',
									'type'=>'item',
									'options'=> 
									array(
										'widget'=> array(
											'title'=> __('Select Widget Area' ,'KodeForest'),
											'type'=> 'combobox_sidebar',
											'options'=> $theme_option['sidebar-element'],
											'description'=> __('You can select Widget Area of your choice.', 'KodeForest')
										),	
									)
								),
								'blog' => array(
									'title'=> __('Blog', 'KodeForest'), 
									'icon'=>'fa-cube',
									'type'=>'item',
									'options'=>  array(
										'element-item-id' => array(
											'title' => __('Page Item ID', 'KodeForest'),
											'type' => 'text',
											'default' => '',
											'description' => __('please add the page item id.', 'KodeForest')
										),
										'element-item-class' => array(
											'title' => __('Page Item Class', 'KodeForest'),
											'type' => 'text',
											'default' => '',
											'description' => __('please add the page item class.', 'KodeForest')
										),									
										'category'=> array(
											'title'=> __('Category' ,'KodeForest'),
											'type'=> 'multi-combobox',
											'options'=> kode_get_term_list('category'),
											'description'=> __('Select categories to fetch its posts.', 'KodeForest')
										),	
										'tag'=> array(
											'title'=> __('Tag' ,'KodeForest'),
											'type'=> 'multi-combobox',
											'options'=> kode_get_term_list('post_tag'),
											'description'=> __('Select tags to fetch its posts.', 'KodeForest')
										),	
										'num-title'=> array(
											'title'=> __('Num Title (Character)' ,'KodeForest'),
											'type'=> 'text',	
											'default'=> '25',
											'description'=> __('This is a number of characters that you want to show on the post title.', 'KodeForest')
										),	
										'num-excerpt'=> array(
											'title'=> __('Num Excerpt (Word)' ,'KodeForest'),
											'type'=> 'text',	
											'default'=> '25',
											'description'=> __('This is a number of characters that you want to show on the post description.', 'KodeForest')
										),	
										'num-fetch'=> array(
											'title'=> __('Num Fetch' ,'KodeForest'),
											'type'=> 'text',	
											'default'=> '8',
											'description'=> __('Specify the number of posts you want to pull out.', 'KodeForest')
										),										
										'blog-style'=> array(
											'title'=> __('Blog Style' ,'KodeForest'),
											'type'=> 'combobox',
											'options'=> array(
												'blog-grid' => __('Blog Grid', 'KodeForest'),
												'blog-medium' => __('Blog Medium', 'KodeForest'),
												'blog-full' => __('Blog Full', 'KodeForest'),
											),
											'default'=>'blog-full'
										),
										'blog-size'=> array(
											'title'=> __('Blog Size' ,'KodeForest'),
											'type'=> 'combobox',
											'options'=> array(
												'2' => __('2 Column', 'KodeForest'),
												'3' => __('3 Column', 'KodeForest'),
												'4' => __('4 Column', 'KodeForest'),
											),
											'wrapper-class' => 'blog-grid-wrapper blog-small-wrapper blog-style-wrapper',
											'default'=>'blog-full'
										),											
										'orderby'=> array(
											'title'=> __('Order By' ,'KodeForest'),
											'type'=> 'combobox',
											'options'=> array(
												'date' => __('Publish Date', 'KodeForest'), 
												'title' => __('Title', 'KodeForest'), 
												'rand' => __('Random', 'KodeForest'), 
											)
										),
										'order'=> array(
											'title'=> __('Order' ,'KodeForest'),
											'type'=> 'combobox',
											'options'=> array(
												'desc'=>__('Descending Order', 'KodeForest'), 
												'asc'=> __('Ascending Order', 'KodeForest'), 
											)
										),	
										'pagination'=> array(
											'title'=> __('Enable Pagination' ,'KodeForest'),
											'type'=> 'checkbox'
										),	
										'margin-bottom' => array(
											'title' => __('Margin Bottom', 'KodeForest'),
											'type' => 'text',											
											'description' => __('Spaces after ending of this item', 'KodeForest')
										),										
									)
								),
								'small_box' => array(
									'title'=> __('Small Box', 'KodeForest'), 
									'icon'=>'fa-lock',
									'type'=>'item',
									'options'=>  array(
										'element-item-id' => array(
											'title' => __('Page Item ID', 'KodeForest'),
											'type' => 'text',
											'default' => '',
											'description' => __('please add the page item id.', 'KodeForest')
										),
										'element-item-class' => array(
											'title' => __('Page Item Class', 'KodeForest'),
											'type' => 'text',
											'default' => '',
											'description' => __('please add the page item class.', 'KodeForest')
										),									
										'box-icon'=> array(
											'title'=> __('Box Icon' ,'KodeForest'),
											'type'=> 'text',	
											'default'=> 'fa fa-lock',
											'description'=> __('Add font awesome icon here.', 'KodeForest')
										),	
										'box-icon-color' => array(
											'title'=> __('Box Icon Color' ,'KodeForest'),
											'type' => 'colorpicker',
											'default'=> '#ffffff',
											'wrapper-class'=>'type-wrapper image-wrapper color-wrapper'
										),	
										'box-heading'=> array(
											'title'=> __('Box Heading' ,'KodeForest'),
											'type'=> 'text',	
											'default'=> '',
											'description'=> __('Add box heading here.', 'KodeForest')
										),	
										'box-heading-color' => array(
											'title' => __('Box Heading Color', 'KodeForest'),
											'type' => 'colorpicker',
											'default'=> '#ffffff',
											'wrapper-class'=>'type-wrapper image-wrapper color-wrapper'
										),	
										'box-desc'=> array(
											'title'=> __('Box Description' ,'KodeForest'),
											'type'=> 'text',	
											'default'=> '',
											'description'=> __('Add box description here.', 'KodeForest')
										),
										'box-desc-color' => array(
											'title' => __('Box Description Color', 'KodeForest'),
											'type' => 'colorpicker',
											'default'=> '#ffffff',
											'wrapper-class'=>'type-wrapper image-wrapper color-wrapper'
										),	
										'box-video-link'=> array(
											'title'=> __('Box External URL' ,'KodeForest'),
											'type'=> 'text',	
											'default'=> '',
											'description'=> __('Add box video or external link here.', 'KodeForest')
										),
										'margin-bottom' => array(
											'title' => __('Margin Bottom', 'KodeForest'),
											'type' => 'text',											
											'description' => __('Spaces after ending of this item', 'KodeForest')
										),										
									)
								),								
								'news' => array(
									'title'=> __('News', 'KodeForest'), 
									'icon'=>'fa-cube',
									'type'=>'item',
									'options'=>  array(
										'element-item-id' => array(
											'title' => __('Page Item ID', 'KodeForest'),
											'type' => 'text',
											'default' => '',
											'description' => __('please add the page item id.', 'KodeForest')
										),
										'element-item-class' => array(
											'title' => __('Page Item Class', 'KodeForest'),
											'type' => 'text',
											'default' => '',
											'description' => __('please add the page item class.', 'KodeForest')
										),	
										'category'=> array(
											'title'=> __('Category' ,'KodeForest'),
											'type'=> 'multi-combobox',
											'options'=> kode_get_term_list('category'),
											'description'=> __('Select categories to fetch its posts.', 'KodeForest')
										),	
										'tag'=> array(
											'title'=> __('Tag' ,'KodeForest'),
											'type'=> 'multi-combobox',
											'options'=> kode_get_term_list('post_tag'),
											'description'=> __('Select tags to fetch its posts.', 'KodeForest')
										),	
										'news-style'=> array(
											'title'=> __('News Style' ,'KodeForest'),
											'type'=> 'combobox',
											'options'=> array(
												'news-grid' => __('News Grid', 'KodeForest'),
												'news-medium' => __('News Medium', 'KodeForest'),
												'news-timeline' => __('News Timeline', 'KodeForest'),
											),
											'default'=>'news-timeline'
										),		
										'num-excerpt'=> array(
											'title'=> __('Num Excerpt (Word)' ,'KodeForest'),
											'type'=> 'text',	
											'default'=> '25',
											'description'=> __('This is a number of word (decided by spaces) that you want to show on the post excerpt. <strong>Use 0 to hide the excerpt, -1 to show full posts and use the wordpress more tag</strong>.', 'KodeForest')
										),	
										'num-fetch'=> array(
											'title'=> __('Num Fetch' ,'KodeForest'),
											'type'=> 'text',	
											'default'=> '8',
											'description'=> __('Specify the number of posts you want to pull out.', 'KodeForest')
										),										
										'orderby'=> array(
											'title'=> __('Order By' ,'KodeForest'),
											'type'=> 'combobox',
											'options'=> array(
												'date' => __('Publish Date', 'KodeForest'), 
												'title' => __('Title', 'KodeForest'), 
												'rand' => __('Random', 'KodeForest'), 
											)
										),
										'order'=> array(
											'title'=> __('Order' ,'KodeForest'),
											'type'=> 'combobox',
											'options'=> array(
												'desc'=>__('Descending Order', 'KodeForest'), 
												'asc'=> __('Ascending Order', 'KodeForest'), 
											)
										),	
										'offset'=> array(
											'title'=> __('Offset' ,'KodeForest'),
											'type'=> 'text',
											'description'=> __('Fill in number of the posts you want to skip. Please noted that this will not works well with pagination', 'KodeForest')
										),										
										'pagination'=> array(
											'title'=> __('Enable Pagination' ,'KodeForest'),
											'type'=> 'checkbox'
										),											
										'margin-bottom' => array(
											'title' => __('Margin Bottom', 'KodeForest'),
											'type' => 'text',
											'default' => '',
											'description' => __('Spaces after ending of this item', 'KodeForest')
										),										
									)
								),
								'column-service' => array(
									'title'=> __('Services', 'kode_forest'), 
									'icon'=>'fa-gg',
									'type'=>'item',
									'options'=>array(
										'icon'=> array(
											'title'=> __('Icon Class' ,'kode_forest'),
											'type'=> 'text',
											'wrapper-class' => 'style-wrapper type-3-wrapper'											
										),		
										'title'=> array(
											'title'=> __('Title' ,'kode_forest'),
											'type'=> 'text',						
										),	
										'style'=> array(
											'title'=> __('Item Style' ,'kode_forest'),
											'type'=> 'combobox',
											'options'=> array(
												'type-1'=> __('Style 1' ,'kode_forest'),	
												'type-2'=> __('Style 2' ,'kode_forest'),
												'type-3'=> __('Style 3' ,'kode_forest')													
											)
										),
										'service_img' => array(
											'title' => __('Service Image', 'kode_forest'),
											'button' => __('Upload', 'kode_forest'),
											'type' => 'upload',
											'wrapper-class' => 'style-wrapper type-1-wrapper type-2-wrapper'
										),											
										'content'=> array(
											'title'=> __('Content Text' ,'kode_forest'),
											'type'=> 'tinymce',						
										),
										'link' => array(
											'title' => __('Link', 'kode_forest'),
											'type' => 'text',
											'description' => __('Please add link here for services.', 'kode_forest')
										),	
										'link-text' => array(
											'title' => __('Text Link', 'kode_forest'),
											'type' => 'text',
											'description' => __('Please add text here for services link.', 'kode_forest')
										),	
										'margin-bottom' => array(
											'title' => __('Margin Bottom', 'kode_forest'),
											'type' => 'text',
											'default' => '',
											'description' => __('Spaces after ending of this item', 'kode_forest')
										),	 
									)
								),
								'simple-column' => array(
									'title'=> __('Simple Column', 'KodeForest'), 
									'icon'=>'fa-sticky-note-o',
									'type'=>'item',
									'options'=>array(	
										'element-item-id' => array(
											'title' => __('Page Item ID', 'KodeForest'),
											'type' => 'text',
											'default' => '',
											'description' => __('please add the page item id.', 'KodeForest')
										),
										'element-item-class' => array(
											'title' => __('Page Item Class', 'KodeForest'),
											'type' => 'text',
											'default' => '',
											'description' => __('please add the page item class.', 'KodeForest')
										),										
										'content'=> array(
											'title'=> __('Content Text' ,'KodeForest'),
											'type'=> 'tinymce',						
										),
										'margin-bottom' => array(
											'title' => __('Margin Bottom', 'KodeForest'),
											'type' => 'text',											
											'description' => __('Spaces after ending of this item', 'KodeForest')
										),	 
									)
								),			
								'content' => array(
									'title'=> __('Content', 'KodeForest'), 
									'icon'=>'fa-contao',
									'type'=>'item',
									'options'=> array(
										'element-item-id' => array(
											'title' => __('Page Item ID', 'KodeForest'),
											'type' => 'text',
											'default' => '',
											'description' => __('please add the page item id.', 'KodeForest')
										),
										'element-item-class' => array(
											'title' => __('Page Item Class', 'KodeForest'),
											'type' => 'text',
											'default' => '',
											'description' => __('please add the page item class.', 'KodeForest')
										),	
										'show-title' => array(
											'title' => __('Show Title' , 'KodeForest'),
											'type' => 'checkbox',
											'default' => 'enable',
										),						
										'page-caption' => array(
											'title' => __('Page Caption' , 'KodeForest'),
											'type' => 'textarea'
										),		
										'show-content' => array(
											'title' => __('Show Content (From Default Editor)' , 'KodeForest'),
											'type' => 'checkbox',
											'default' => 'enable',
										),	
										'margin-bottom' => array(
											'title' => __('Margin Bottom', 'KodeForest'),
											'type' => 'text',											
											'description' => __('Spaces after ending of this item', 'KodeForest')
										),														
									)
								), 	

								'divider' => array(
									'title'=> __('Divider', 'KodeForest'), 
									'icon'=>'fa-minus',
									'type'=>'item',
									'options'=>array(									
										'margin-bottom' => array(
											'title' => __('Margin Bottom', 'KodeForest'),
											'type' => 'text',											
											'description' => __('Spaces after ending of this item', 'KodeForest')
										),										
									)
								),
								
								'portfolio' => array(),
								
								'gallery' => array(
									'title'=> __('Gallery', 'KodeForest'), 
									'icon'=>'fa-houzz',
									'type'=>'item',
									'options'=> array(
										'element-item-id' => array(
											'title' => __('Page Item ID', 'KodeForest'),
											'type' => 'text',
											'default' => '',
											'description' => __('please add the page item id.', 'KodeForest')
										),
										'element-item-class' => array(
											'title' => __('Page Item Class', 'KodeForest'),
											'type' => 'text',
											'default' => '',
											'description' => __('please add the page item class.', 'KodeForest')
										),	
										'slider'=> array(	
											'overlay'=> 'false',
											'caption'=> 'true',
											'type'=> 'slider',
										),				
										'thumbnail-size'=> array(
											'title'=> __('Thumbnail Size' ,'KodeForest'),
											'type'=> 'combobox',
											'options'=> kode_get_thumbnail_list()
										),
										
										'gallery-columns'=> array(
											'title'=> __('Gallery Image Columns' ,'KodeForest'),
											'type'=> 'combobox',
											'options'=> array('2'=>'2', '3'=>'3', '4'=>'4'),
											'default'=> '4'
										),	
										'num-fetch'=> array(
											'title'=> __('Num Fetch (Per Page)' ,'KodeForest'),
											'type'=> 'text',
											'description'=> __('Leave this field blank to fetch all image without pagination.', 'KodeForest'),
											'wrapper-class'=>'gallery-style-wrapper grid-wrapper'
										),
										'show-caption'=> array(
											'title'=> __('Show Caption' ,'KodeForest'),
											'type'=> 'combobox',
											'options'=> array('yes'=>'Yes', 'no'=>'No')
										),			
										'pagination'=> array(
											'title'=> __('Enable Pagination' ,'KodeForest'),
											'type'=> 'checkbox'
										),	
										'margin-bottom' => array(
											'title' => __('Margin Bottom', 'KodeForest'),
											'type' => 'text',
											'description' => __('Spaces after ending of this item', 'KodeForest')
										),	
									)	
								),		
								'post-slider' => array(
									'title'=> __('Post Slider', 'KodeForest'), 
									'icon'=>'fa-eye',
									'type'=>'item',
									'options'=>array(
										'element-item-id' => array(
											'title' => __('Page Item ID', 'KodeForest'),
											'type' => 'text',
											'default' => '',
											'description' => __('please add the page item id.', 'KodeForest')
										),
										'element-item-class' => array(
											'title' => __('Page Item Class', 'KodeForest'),
											'type' => 'text',
											'default' => '',
											'description' => __('please add the page item class.', 'KodeForest')
										),	
										'category'=> array(
											'title'=> __('Category' ,'KodeForest'),
											'type'=> 'combobox',
											'options'=> kode_get_term_list('category'),
											'description'=> __('Select categories to fetch its posts.', 'KodeForest')
										),	
										'num-excerpt'=> array(
											'title'=> __('Num Excerpt (Word)' ,'KodeForest'),
											'type'=> 'text',	
											'default'=> '25',
											'description'=> __('This is a number of word (decided by spaces) that you want to show on the post excerpt. <strong>Use 0 to hide the excerpt, -1 to show full posts and use the wordpress more tag</strong>.', 'KodeForest')
										),	
										'num-fetch'=> array(
											'title'=> __('Num Fetch' ,'KodeForest'),
											'type'=> 'text',	
											'default'=> '8',
											'description'=> __('Specify the number of posts you want to pull out.', 'KodeForest')
										),										
										'thumbnail-size'=> array(
											'title'=> __('Thumbnail Size' ,'KodeForest'),
											'type'=> 'combobox',
											'options'=> kode_get_thumbnail_list()
										),	
										'style'=> array(
											'title'=> __('Style' ,'KodeForest'),
											'type'=> 'combobox',
											'options'=> array(
												'no-excerpt'=>__('No Excerpt', 'KodeForest'),
												'with-excerpt'=>__('With Excerpt', 'KodeForest'),
											)
										),
										'caption-style'=> array(
											'title'=> __('Caption Style' ,'KodeForest'),
											'type'=> 'combobox',
											'options'=> array(
												'post-bottom post-slider'=>__('Bottom Caption', 'KodeForest'),
												'post-right post-slider'=>__('Right Caption', 'KodeForest'),
												'post-left post-slider'=>__('Left Caption', 'KodeForest')
											),
											'wrapper-class' => 'style-wrapper with-excerpt-wrapper'
										),											
										'orderby'=> array(
											'title'=> __('Order By' ,'KodeForest'),
											'type'=> 'combobox',
											'options'=> array(
												'date' => __('Publish Date', 'KodeForest'), 
												'title' => __('Title', 'KodeForest'), 
												'rand' => __('Random', 'KodeForest'), 
											)
										),
										'order'=> array(
											'title'=> __('Order' ,'KodeForest'),
											'type'=> 'combobox',
											'options'=> array(
												'desc'=>__('Descending Order', 'KodeForest'), 
												'asc'=> __('Ascending Order', 'KodeForest'), 
											)
										),			
										'margin-bottom' => array(
											'title' => __('Margin Bottom', 'KodeForest'),
											'type' => 'text',
											'description' => __('Spaces after ending of this item', 'KodeForest')
										),											
									)
								),
								
								'slider' => array(
									'title'=> __('Slider', 'KodeForest'), 
									'icon'=>'fa-sliders',
									'type'=>'item',
									'options'=>array(
										'element-item-id' => array(
											'title' => __('Page Item ID', 'KodeForest'),
											'type' => 'text',
											'default' => '',
											'description' => __('please add the page item id.', 'KodeForest')
										),
										'element-item-class' => array(
											'title' => __('Page Item Class', 'KodeForest'),
											'type' => 'text',
											'default' => '',
											'description' => __('please add the page item class.', 'KodeForest')
										),	
										'slider'=> array(	
											'overlay'=> 'false',
											'caption'=> 'true',
											'type'=> 'slider'						
										),	
										'slider-type'=> array(
											'title'=> __('Slider Type', 'KodeForest'),
											'type'=> 'combobox',
											'options'=> array(
												'flexslider' => __('Flex slider', 'KodeForest'),
												'bxslider' => __('BX Slider', 'KodeForest'),
												'nivoslider' => __('Nivo Slider', 'KodeForest')
											)
										),		
										'margin-bottom' => array(
											'title' => __('Margin Bottom', 'KodeForest'),
											'type' => 'text',											
											'description' => __('Spaces after ending of this item', 'KodeForest')
										),											
									)
								),	
								 					
							)
						),
					)
				),
				// page builder option attribute
				array(
					'post_type' => array('page'),					
					'meta_title' => __('Page Builder Options', 'KodeForest'),
				)
			);
			
		}
		
	}
	
	
	// show the pagebuilder item
	if( !function_exists('kode_show_page_builder') ){
		function kode_show_page_builder($content, $full_width = true){
		
			$section = array(0, false); // (size, independent)
			foreach( $content as $item ){			
				// determine the current item size
				$current_size = 1;
				if( !empty($item['size']) ){
					$current_size = kode_item_size_to_num($item['size']);
				}
				
				// print each section
				if( $item['type'] == 'color-wrapper' || $item['type'] == 'parallax-bg-wrapper' ||
					$item['type'] == 'full-size-wrapper' ){
					$section = kode_show_section($section, $current_size, true);	
				}else{
					$section = kode_show_section($section, $current_size, false);	
				}
				
				// start printing item
				if( $item['item-type'] == 'wrapper' ){
					if( $item['type'] == 'color-wrapper' ){
						kode_show_color_wrapper( $item );
					}else if(  $item['type'] == 'parallax-bg-wrapper'){
						kode_show_parallax_wrapper( $item );
					}else if(  $item['type'] == 'full-size-wrapper'){
						kode_show_full_size_wrapper( $item );
					}else{
						kode_show_column_wrapper( $item );
					}
				}else{
					kode_show_element( $item );
				}
			}
			
			echo '<div class="clear"></div>';
			
			if( !$section[1] ){
				echo '</div>';
				echo '</div>'; 
			} // close container of dependent section
			echo '</div>'; // close the last opened section
			
		}
	}
	
	// print each section
	if( !function_exists('kode_show_section') ){
		function kode_show_section( $section, $size, $independent = false ){
			global $kode_section_id;
			if( empty($kode_section_id) ){ $kode_section_id = 1; }

			if( $section[0] == 0 ){ // starting section
				echo '<div id="content-section-' . $kode_section_id . '" >';
				if( !$independent ){ echo '<div class="section-container container"><div class="row">'; } // open container
				
				$section = array($size, $independent);
				$kode_section_id ++;
			}else{

				if( $independent || $section[1] ){ // current or previous section is independent
				
					echo '<div class="clear"></div>';
					if( !$section[1] ){ echo '</div></div>'; } // close container of dependent section
					echo '</div>';
					
					echo '<div id="content-section-' . $kode_section_id . '" >';		
					if( !$independent ){ echo '<div class="section-container container"><div class="row">'; } // open container
					
					$section[0] = ceil($section[0]) + $size; $section[1] = $independent;
					$kode_section_id ++;
				}else{

					if( abs((float)$section[0] - floor($section[0])) < 0.01 || 	// is integer or
						(floor($section[0]) < floor($section[0] + $size - 0.01)) ){ 	// exceeding current line
						echo '<div class="clear"></div>';
					}
					if( $size == 1 ){
						echo '<div class="clear"></div>';
						$section[0] = ceil($section[0]) + $size; $section[1] = $independent;
					}else{
						$section[0] += $size; $section[1] = $independent;
					}
				}
			}
			
			return $section;
		}
	}	
	
	
	
	
	
	// show the item
	if( !function_exists('kode_show_element') ){
		function kode_show_element( $content ){
			switch ($content['type']){
				case 'accordion': echo kode_get_accordion_item($content['option']); break;
				case 'banner': echo kode_get_banner_item($content['option']); break;				
				case 'blog': echo kode_get_blog_item($content['option']); break;
				case 'small_box': echo kode_get_small_box_item($content['option']); break;
				case 'news': echo kode_get_news_item($content['option']); break;
				case 'events': 
					if(class_exists('EM_Events')){
						echo kode_get_events_item($content['option']); 
					}
				break;
				case 'team': 
					if(function_exists('kode_get_team_item') ){
						echo kode_get_team_item($content['option']); 
					}
				break;
				case 'work': 
					if(function_exists('kode_get_work_item') ){
						echo kode_get_work_item($content['option']); 
					}
				break;
				case 'package': 
					if(function_exists('kode_get_package_item') ){
						echo kode_get_package_item($content['option']); 
					}
				break;
				case 'ignitiondeck': 
					if(class_exists('Deck')){
						echo kode_get_crowdfunding_item($content['option']);
					}
				break;
				case 'package_marker': 
					if(function_exists('kode_get_package_marker_item') ){
						echo kode_get_package_marker_item($content['option']); 
					}
				break;
				
				
				case 'column-service': echo kode_get_column_service_item($content['option']); break;
				case 'simple-column': echo kode_get_simple_column_item($content['option']); break;
				case 'content': kode_get_default_content_item($content['option']); break;
				case 'divider': echo kode_get_divider_item($content['option']); break;
				case 'gallery': echo kode_get_gallery_item($content['option']); break;
				
				case 'post-slider': echo kode_get_post_slider_item($content['option']); break;
				
				
				
				
				case 'sidebar': echo '<div class="widget kode-widget kode-sidebar-element">';kode_get_sidebar_item($content['option']);echo '</div>'; break;
				case 'slider': echo kode_get_slider_item($content['option']); break;
								
				case 'testimonial': 
				if(function_exists('kode_get_testimonial_item') ){
					echo kode_get_testimonial_item($content['option']); 
				}
				break;
				case 'video': echo kode_get_video_item($content['option']); break;
				default: $default['show-title'] = 'enable'; $default['show-content'] = 'enable'; echo kode_get_content_item($default); break;

			}
		}	
	}
	
	// print color wrapper
	if( !function_exists('kode_show_color_wrapper') ){
		function kode_show_color_wrapper( $content ){
			$item_id = empty($content['option']['element-item-id'])? '': ' id="' . esc_attr($content['option']['element-item-id']) . '" ';
			
			global $kode_spaces;
			$padding  = (!empty($content['option']['padding-top']) && 
				($kode_spaces['top-wrapper'] != $content['option']['padding-top']))? 
				'padding-top: ' . esc_attr($content['option']['padding-top']) . '; ': '';
			$padding .= (!empty($content['option']['padding-bottom']) && 
				($kode_spaces['bottom-wrapper'] != $content['option']['padding-bottom']))? 
				'padding-bottom: ' . esc_attr($content['option']['padding-bottom']) . '; ': '';
				
			$border = '';
			if( !empty($content['option']['border']) && $content['option']['border'] != 'none' ){
				if($content['option']['border'] == 'top' || $content['option']['border'] == 'both'){
					$border .= ' border-top: 4px solid '. esc_attr($content['option']['border-top-color']) . '; ';
				}
				if($content['option']['border'] == 'bottom' || $content['option']['border'] == 'both'){
					$border .= ' border-bottom: 4px solid '. esc_attr($content['option']['border-bottom-color']) . '; ';
				}
			}

			$content['option']['show-section'] = !empty($content['option']['show-section'])? $content['option']['show-section']: '';
			echo '<div class="kode-color-wrapper ' . ' ' . esc_attr($content['option']['show-section']) . '" ' . $item_id;
			if( !empty($content['option']['background']) || !empty($padding) ){
				echo 'style="';
				if( empty($content['option']['background-type']) || $content['option']['background-type'] == 'color' ){
					echo !empty($content['option']['background'])? 'background-color: ' . esc_attr($content['option']['background']) . '; ': '';
				}
				echo $border;
				echo $padding;
				echo '" ';
			}
			echo '>';
			echo '<div class="container"><div class="row">';
		
			foreach( $content['items'] as $item ){	
				if( $item['item-type'] == 'wrapper' ){
					kode_show_column_wrapper( $item );
				}else{
					kode_show_element( $item );
				}
			}	
			
			echo '<div class="clear"></div>';
			echo '</div></div>'; // close container
			echo '</div>'; // close wrapper
		}
	}	
	
	// show parallax wrapper
	if( !function_exists('kode_show_parallax_wrapper') ){
		function kode_show_parallax_wrapper( $content ){
			global $parallax_wrapper_id;
			$parallax_wrapper_id = empty($parallax_wrapper_id)? 1: $parallax_wrapper_id;
			if( empty($content['option']['element-item-id']) ){
				$content['option']['element-item-id'] = 'kode-parallax-wrapper-' . $parallax_wrapper_id;
				$parallax_wrapper_id++;
			}
			$item_id = ' id="' . esc_attr($content['option']['element-item-id']) . '" ';

			global $kode_spaces;
			$padding  = (!empty($content['option']['padding-top']) && 
				($kode_spaces['top-wrapper'] != $content['option']['padding-top']))? 
				'padding-top: ' . esc_attr($content['option']['padding-top']) . '; ': '';
			$padding .= (!empty($content['option']['padding-bottom']) && 
				($kode_spaces['bottom-wrapper'] != $content['option']['padding-bottom']))? 
				'padding-bottom: ' . esc_attr($content['option']['padding-bottom']) . '; ': '';

			$border = '';

			echo '<div class="kode-parallax-wrapper kode-background-' . esc_attr($content['option']['type']) . '" ' . $item_id;
			
			// background parallax
			if( !empty($content['option']['background']) && $content['option']['type'] == 'image' ){
				if( !empty($content['option']['background-speed']) ){
					echo 'data-bgspeed="' . esc_attr($content['option']['background-speed']) . '" ';
				}else{
					echo 'data-bgspeed="0" ';
				}				
			
				if( is_numeric($content['option']['background']) ){
					$background = wp_get_attachment_image_src($content['option']['background'], 'full');
					$background = esc_url($background[0]);
				}else{
					$background = esc_url($content['option']['background']);
				}
				if(empty($content['option']['opacity']) || $content['option']['opacity'] == ''){ $content['option']['opacity'] = '0.03';}
				if(empty($content['option']['background-color']) || $content['option']['background-color'] == ''){ $content['option']['background-color'] = '#000';}
				echo 'style="background-image: url(\'' . esc_url($background) . '\'); ' . $padding . $border . '" >';			
				echo '<style scoped type="text/css">';
				echo '#' . esc_attr($content['option']['element-item-id']) . '{';
				echo ' position:relative;';
				echo '}';
				echo '#' . esc_attr($content['option']['element-item-id']) . ' .container{';
				echo ' position:relative;z-index:99999;';
				echo '}';
				echo '#' . esc_attr($content['option']['element-item-id']) . ':before{';
				echo 'opacity:'.esc_attr($content['option']['opacity']).';content:"";position:absolute;left:0px;top:0px;height:100%;width:100%;background-color:'.esc_attr($content['option']['background-color']).'';
				echo '}';
				echo '</style>';
				if( !empty($content['option']['background-mobile']) ){
					if( is_numeric($content['option']['background-mobile']) ){
						$background = wp_get_attachment_image_src($content['option']['background-mobile'], 'full');
						$background = esc_url($background[0]);
					}else{
						$background = esc_url($content['option']['background-mobile']);
					}				
				
					echo '<style type="text/css">@media only screen and (max-width: 767px){ ';
					echo '#' . esc_attr($content['option']['element-item-id']) . '{';
					echo ' background-image: url(\'' . esc_url($background) . '\') !important;';
					echo '}';
					echo '}</style>';
				}
				
			// background pattern 
			}else if($content['option']['type'] == 'pattern'){
				$background = KODE_PATH . '/images/pattern/pattern-' . esc_attr($content['option']['pattern']) . '.png';
				echo 'style="background-image: url(\'' . esc_url($background) . '\'); ' . $padding . $border . '" >';
			
			// background video
			}else if($content['option']['type'] == 'video'){
				echo ' style="' . $padding . $border . ';">';
				echo '<style scoped>';
				echo '#' . esc_attr($content['option']['element-item-id']) . '{';
				echo ' position:relative;';
				echo '}';
				echo '#' . esc_attr($content['option']['element-item-id']) . ' .container{';
				echo ' position:relative;z-index:99999;';
				echo '}';
				echo '#' . esc_attr($content['option']['element-item-id']) . ':before{';
				echo ''.$kode_solid_bg.';opacity:'.esc_attr($content['option']['opacity']).';content:"";position:absolute;left:0px;top:0px;height:100%;width:100%;z-index:10;';
				echo '}';
				echo '</style>';
				$content['option']['video_url'] = (empty($content['option']['video_url']))? KODE_PATH.'/images/dock.mp4': $content['option']['video_url'];
				echo '
				    <script>
						jQuery(document).ready(function($) {
							var BV = new $.BigVideo({
								useFlashForFirefox:false,
								container: $("#inner-' . esc_attr($content['option']['element-item-id']) . '"),
								forceAutoplay:true,
								controls:false,
								doLoop:false,			
								shrinkable:true
							});
							BV.init();
							BV.show([
								{ type: "video/mp4",  src: "'.$content['option']['video_url'].'" }
							]);
						});
					</script>
					<div class="kode-video-bg" id="inner-' . esc_attr($content['option']['element-item-id']) . '"></div>';
				
			}else if($content['option']['type'] == 'map'){
				echo '><span class="footertransparent-bg"></span>';
				echo do_shortcode($content['option']['map_shortcode']);
				echo '';
			}else if(!empty($padding) || !empty($border) ){
				echo 'style="' . $padding . $border . '" >';
			}

			echo '<div class="container">';
		
			foreach( $content['items'] as $item ){
				if( $item['item-type'] == 'wrapper' ){
					kode_show_column_wrapper( $item );
				}else{
					kode_show_element( $item );
				}
			}	
			
			echo '<div class="clear"></div>';
			echo '</div>'; // close container
			echo '</div>'; // close wrapper
		}
	}
	
	// print full size wrapper
	if( !function_exists('kode_show_full_size_wrapper') ){
		function kode_show_full_size_wrapper( $content ){
			global $kode_wrapper_id;
			$kode_wrapper_id = empty($kode_wrapper_id)? 1: $kode_wrapper_id;
			if( empty($content['option']['element-item-id']) ){
				$content['option']['element-item-id'] = 'kode-parallax-wrapper-' . $kode_wrapper_id;
				$kode_wrapper_id++;
			}
			
			$kode_trans_class = '';
			if( !empty($content['option']['trans-background']) ){
				$kode_trans_class = $content['option']['trans-background'];
			}
			
			$kode_wrapper_class = '';
			if( !empty($content['option']['element-item-class']) ){
				$kode_wrapper_class = $content['option']['element-item-class'];
			}
			$item_id = ' id="' . esc_attr($content['option']['element-item-id']) . '" ';
			
			$kode_solid_bg = '';
			if($kode_trans_class == 'enable'){
				$kode_trans_bg = "background-color:".esc_attr($content['option']['background-color'])."";
			}else{
				$kode_solid_bg = "background-color:".esc_attr($content['option']['background-color'])."";
			}
			
			global $kode_spaces;
			$padding  = (!empty($content['option']['padding-top']) && 
				($kode_spaces['top-wrapper'] != $content['option']['padding-top']))? 
				'padding-top: ' . esc_attr($content['option']['padding-top']) . '; ': '';
			$padding .= (!empty($content['option']['padding-bottom']) && 
				($kode_spaces['bottom-wrapper'] != $content['option']['padding-bottom']))? 
				'padding-bottom: ' . esc_attr($content['option']['padding-bottom']) . '; ': '';

			$border = '';
			$content['option']['type'] = (empty($content['option']['type']))? ' ': $content['option']['type'];
			
			echo '<div class="'.esc_attr($kode_wrapper_class).' kode-parallax-wrapper kode-background-' . esc_attr($content['option']['type']) . '" ' . $item_id;
			
			// background parallax
			if( !empty($content['option']['background']) && $content['option']['type'] == 'image' ){
				if( !empty($content['option']['background-speed']) ){
					echo 'data-bgspeed="' . esc_attr($content['option']['background-speed']) . '" ';
				}else{
					echo 'data-bgspeed="0" ';
				}				
			
				if( is_numeric($content['option']['background']) ){
					$background = wp_get_attachment_image_src($content['option']['background'], 'full');
					$background = esc_url($background[0]);
				}else{
					$background = esc_url($content['option']['background']);
				}
				if(empty($content['option']['opacity']) || $content['option']['opacity'] == ''){
					$content['option']['opacity'] = '0.03';
				}
				if(empty($content['option']['background-color']) || $content['option']['background-color'] == ''){
					$content['option']['background-color'] = '#000';
				}
				if($background <> ''){
					echo 'style="background-image: url(\'' . esc_url($background) . '\'); ' . $padding . $border . '" >';			
				}else{
					echo 'style="' . $padding . $border . '" >';			
				}
				echo '<style scoped>';
				echo '#' . esc_attr($content['option']['element-item-id']) . '{';
				echo ' position:relative;';
				echo '}';
				echo '#' . esc_attr($content['option']['element-item-id']) . ' .container{';
				echo ' position:relative;z-index:99999;';
				echo '}';
				echo '#' . esc_attr($content['option']['element-item-id']) . ':before{';
				echo 'opacity:'.esc_attr($content['option']['opacity']).';content:"";position:absolute;left:0px;top:0px;height:100%;width:100%;background-color:'.esc_attr($content['option']['background-color']).'';
				echo '}';
				echo '</style>';
				
			// background pattern 
			}else if($content['option']['type'] == 'pattern'){
				$background = KODE_PATH . '/images/pattern/pattern-' . esc_attr($content['option']['pattern']) . '.png';
				echo 'style="background-image: url(\'' . esc_url($background) . '\'); ' . $padding . $border . '" >';
			
			// background MAP
			}else if($content['option']['type'] == 'video'){
				echo ' style="' . $padding . $border . ';">';
				echo '<style scoped>';
				echo '#' . esc_attr($content['option']['element-item-id']) . '{';
				echo ' position:relative;';
				echo '}';
				echo '#' . esc_attr($content['option']['element-item-id']) . ' .container{';
				echo ' position:relative;z-index:99999;';
				echo '}';
				echo '#' . esc_attr($content['option']['element-item-id']) . ':before{';
				echo ''.$kode_solid_bg.';opacity:'.esc_attr($content['option']['opacity']).';content:"";position:absolute;left:0px;top:0px;height:100%;width:100%;z-index:10;';
				echo '}';
				echo '</style>';
				$content['option']['video_url'] = (empty($content['option']['video_url']))? KODE_PATH.'/images/dock.mp4': $content['option']['video_url'];
				echo '
				    <script>
						jQuery(document).ready(function($) {
							var BV = new $.BigVideo({
								useFlashForFirefox:false,
								container: $("#inner-' . esc_attr($content['option']['element-item-id']) . '"),
								forceAutoplay:true,
								controls:false,
								doLoop:false,			
								shrinkable:true
							});
							BV.init();
							BV.show([
								{ type: "video/mp4",  src: "'.$content['option']['video_url'].'" }
							]);
						});
					</script>
					<div class="kode-video-bg" id="inner-' . esc_attr($content['option']['element-item-id']) . '"></div>';
				
			}else if($content['option']['type'] == 'map'){
				echo '><span class="footertransparent-bg"></span>';
				echo do_shortcode($content['option']['map_shortcode']);
				echo '';
			}else if($content['option']['type'] == 'color'){
				$content['option']['background-color'] = (empty($content['option']['background-color']))? ' ': $content['option']['background-color'];
				echo ' style="' . $padding . $border . ';background:'.esc_attr($content['option']['background-color']).'">';
				echo '';
			}else if(!empty($padding) || !empty($border) ){
				echo 'style="' . $padding . $border . '" >';
			}
			$content['option']['container'] = (empty($content['option']['container']))? ' ': $content['option']['container'];
			if($content['option']['container'] == 'container-width'){
				echo '<div class="container">';
			}else{
				echo '<div class="container-fluid">';
				echo '<div class="row">';
			}
		
			foreach( $content['items'] as $item ){
				if( $item['item-type'] == 'wrapper' ){
					kode_show_column_wrapper( $item );
				}else{
					kode_show_element( $item );
				}
			}	
			
			echo '<div class="clear"></div>';
			if($content['option']['container'] == 'container-width'){
				echo '</div>'; // close container or Container
			}else{
				echo '</div>'; // close container or Row
				echo '</div>'; // close container or Container-fluid
			}			
			echo '</div>'; // close wrapper
		}
	}	
	
	// Column Sizes Bootstrap 3+
	if( !function_exists('kode_get_column_class') ){
		function kode_get_column_class( $size ){
			switch( $size ){
				case '1/6': return 'col-md-1 columns'; break;
				case '1/5': return 'col-md-2 column'; break;
				case '1/4': return 'col-md-3 columns'; break;
				case '2/5': return 'col-md-5 columns'; break;
				case '1/3': return 'col-md-4 columns'; break;
				case '1/2': return 'col-md-6 columns'; break;
				case '3/5': return 'col-md-7 columns'; break;
				case '2/3': return 'col-md-8 columns'; break;
				case '3/4': return 'col-md-9 columns'; break;
				case '4/5': return 'col-md-10 columns'; break;
				case '1/1': return 'col-md-12 columns'; break;
				default : return 'col-md-12 columns'; break;
			}
		}
	}
	
	// show column wrapper
	if( !function_exists('kode_show_column_wrapper') ){
		function kode_show_column_wrapper( $content ){
			
			echo '<div class="' . esc_attr(kode_get_column_class( $content['size'] )) . '" >';
			foreach( $content['items'] as $item ){
				kode_show_element( $item );
			}			
			echo '</div>'; // end of column section
		}
	}	
	
	
	
?>