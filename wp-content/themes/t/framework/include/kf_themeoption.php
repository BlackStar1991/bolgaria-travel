<?php
	/*	
	*	Kodeforest Framework File
	*	---------------------------------------------------------------------
	*	This file contains the admin option setting 
	*	---------------------------------------------------------------------
	*	http://stackoverflow.com/questions/2270989/what-does-apply-filters-actually-do-in-wordpress
	*/
	
	// create the main admin option
	if( is_admin() ){
		add_action('after_setup_theme', 'kode_create_themeoption');
	}
	
	if( !function_exists('kode_create_themeoption') ){
	
		function kode_create_themeoption(){
		
			global $theme_option;
			if(!isset($theme_option['sidebar-element'])){$theme_option['sidebar-element'] = array('blog','contact');}
			// Theme Options Default data
			$default_data_array = 
			array(
				'page_title' => KODE_FULL_NAME . ' ' . __('Option', 'KodeForest'),
				'menu_title' => KODE_FULL_NAME,
				'menu_slug' => KODE_SLUG,
				'save_option' => KODE_SMALL_TITLE . '_admin_option',
				'role' => 'edit_theme_options'
			);
			
			
			new kode_themeoption_panel(
				
				// Theme Options Default data
				$default_data_array,
				
				// Theme Options setting
				apply_filters('kode_themeoption_panel',
					array(
						// general menu
						'general' => array(
							'title' => __('General Settings', 'kode_forest'),
							'icon' => 'fa fa-gear',
							'options' => array(
								
	
								'header-logo' => array(
									'title' => __('Logo Settings', 'kode_forest'),
									'options' => array(
										'logo' => array(
											'title' => __('Upload Logo', 'kode_forest'),
											'button' => __('Set As Logo', 'kode_forest'),
											'type' => 'upload'
										),									
										'logo-top-margin' => array(
											'title' => __('Logo Top Margin', 'kode_forest'),
											'type' => 'sliderbar',
											'default' => '30',
											'selector' => '.kode-logo{ margin-top: #kode#; }',
											'data-type' => 'pixel'											
										),
										'logo-bottom-margin' => array(
											'title' => __('Logo Bottom Margin', 'kode_forest'),
											'type' => 'sliderbar',
											'default' => '30',
											'selector' => '.kode-logo{ margin-bottom: #kode#; }',
											'data-type' => 'pixel'											
										),
										'favicon-id' => array(
											'title' => __('Upload Favicon ( .ico file )', 'kode_forest'),
											'button' => __('Select Icon', 'kode_forest'),
											'type' => 'upload'
										),											
									)
								),	
								'layout-style' => array(
									'title' => __('Style & Layouts', 'kode_forest'),
									'options' => array(
										'color-scheme' => array(
											'title' => __('Color Scheme', 'kode_forest'),
											'type' => 'colorpicker',
											'default' => '#ffffff',
											'selector'=> ''
										),
										'enable-boxed-style' => array(
											'title' => __('Container Style', 'kode_forest'),
											'type' => 'combobox',	
											'options' => array(
												'full-style' => __('Full Style', 'kode_forest'),
												'boxed-style' => __('Boxed Style', 'kode_forest')
											)
										),
										'boxed-background-image' => array(
											'title' => __('Background Image', 'kode_forest'),
											'type' => 'upload',
											'wrapper-class'=> 'enable-boxed-style-wrapper boxed-style-wrapper'
										),	
										// 'kode-header-style' => array(
											// 'title' => __('Header Style', 'kode_forest'),
											// 'type' => 'combobox',	
											// 'options' => array(
												// 'header-style-1' => __('Header Style 1', 'kode_forest'),
												// 'header-style-2' => __('Header Style 2', 'kode_forest'),
												// 'header-style-3' => __('Header Style 3', 'kode_forest')
											// )
										// ),	
										'enable-top-bar' => array(
											'title' => __('Enable Top Bar', 'kode_forest'),
											'type' => 'checkbox',	
											//'wrapper-class'=> 'header-style-1-wrapper kode-header-style-wrapper'											
										),
										'top-bar-right-text' => array(
											'title' => __('Top Bar Right Text', 'kode_forest'),
											'type' => 'textarea',	
											//'wrapper-class'=> 'header-style-1-wrapper kode-header-style-wrapper'											
										),
										'enable-header-sticky' => array(
											'title' => __('Header Sticky', 'kode_forest'),
											'type' => 'checkbox',	
											'default' => 'enable'
										),	
										'enable-nice-scroll' => array(
											'title' => __('Nice Scroll', 'kode_forest'),
											'type' => 'checkbox',	
											'default' => 'enable'
										),	
										'enable-responsive-mode' => array(
											'title' => __('Enable Responsive', 'kode_forest'),
											'type' => 'checkbox',	
											'default' => 'enable'
										),	
										'enable-social-icon' => array(
											'title' => __('Show Social Icon', 'kode_forest'),
											'type' => 'checkbox',	
											'default' => 'enable'
										),			
										'enable-login-signup' => array(
											'title' => __('Show Login and Signup', 'kode_forest'),
											'type' => 'checkbox',	
											'default' => 'enable'
										),													
									)
								),								
								'page-style' => array(
									'title' => __('Page Settings', 'kode_forest'),
									'options' => array(
										
										'default-page-title' => array(
											'title' => __('Default Page Title Background', 'kode_forest'),
											'type' => 'upload',	
											'selector' => '.kode-page-title-wrapper { background-image: url(\'#kode#\'); }',
											'data-type' => 'upload'
										),	
										'default-post-title-background' => array(
											'title' => __('Default Post Title Background', 'kode_forest'),
											'type' => 'upload',	
											'selector' => 'body.single .kode-page-title-wrapper { background-image: url(\'#kode#\'); }',
											'data-type' => 'upload'
										),
										// 'default-portfolio-title-background' => array(
											// 'title' => __('Default Portfolio Title Background', 'kode_forest'),
											// 'type' => 'upload',	
											// 'selector' => 'body.single-portfolio .kode-page-title-wrapper { background-image: url(\'#kode#\'); }',
											// 'data-type' => 'upload'
										// ),
										'default-search-archive-title-background' => array(
											'title' => __('Default Search Archive Title Background', 'kode_forest'),
											'type' => 'upload',	
											'selector' => 'body.archive .kode-page-title-wrapper, body.search .kode-page-title-wrapper { background-image: url(\'#kode#\'); }',
											'data-type' => 'upload'
										),
										'default-404-title-background' => array(
											'title' => __('Default 404 Title Background', 'kode_forest'),
											'type' => 'upload',	
											'selector' => 'body.error404 .kode-page-title-wrapper { background-image: url(\'#kode#\'); }',
											'data-type' => 'upload'
										),	
										// 'additional-style' => array(
											// 'title' => __('Additional Style', 'kode_forest'),
											// 'type' => 'textarea',	
											// 'class' => 'full-width',
										// ),	
										// 'additional-script' => array(
											// 'title' => __('Additional Script ', 'kode_forest'),
											// 'type' => 'textarea',	
											// 'class' => 'full-width',
										// ),											
									)
								),
								
								
								'blog-style' => array(),	
								
								//'portfolio-style' => array(),		

								'search-archive-style' => array(
									'title' => __('Search - Archive Style', 'kode_forest'),
									'options' => array(
										'package-search-page' => array(
											'title' => __('Select Search Page', 'kodeforest'),
											'type'=> 'combobox',
											'options'=> kode_get_post_list_id('page'),
										),	
										'currency' => array(
											'title' => __('Currency Type', 'kode_forest'),
											'type' => 'text',
											'description' => 'Select Currency Type USD, Euro'
										),
										'archive-sidebar-template' => array(
											'title' => __('Search - Archive Sidebar Template', 'kode_forest'),
											'type' => 'radioimage',
											'options' => array(
												'no-sidebar'=>KODE_PATH . '/framework/include/backend_assets/images/no-sidebar.png',
												'both-sidebar'=>KODE_PATH . '/framework/include/backend_assets/images/both-sidebar.png', 
												'right-sidebar'=>KODE_PATH . '/framework/include/backend_assets/images/right-sidebar.png',
												'left-sidebar'=>KODE_PATH . '/framework/include/backend_assets/images/left-sidebar.png'
											),
											'default' => 'no-sidebar'							
										),
										'archive-sidebar-left' => array(
											'title' => __('Search - Archive Sidebar Left', 'kode_forest'),
											'type' => 'combobox',
											'options' => $theme_option['sidebar-element'],		
											'wrapper-class'=>'left-sidebar-wrapper both-sidebar-wrapper archive-sidebar-template-wrapper',											
										),
										'archive-sidebar-right' => array(
											'title' => __('Search - Archive Sidebar Right', 'kode_forest'),
											'type' => 'combobox',
											'options' => $theme_option['sidebar-element'],
											'wrapper-class'=>'right-sidebar-wrapper both-sidebar-wrapper archive-sidebar-template-wrapper',
										),		
										'archive-blog-style' => array(
											'title' => __('Search - Archive Blog Style', 'kode_forest'),
											'type' => 'combobox',
											'options' => array(
												// 'blog-1-4' => '1/4 ' . __('Blog Grid', 'kode_forest'),
												// 'blog-1-3' => '1/3 ' . __('Blog Grid', 'kode_forest'),
												// 'blog-1-2' => '1/2 ' . __('Blog Grid', 'kode_forest'),
												// 'blog-1-1' => '1/1 ' . __('Blog Grid', 'kode_forest'),
												// 'blog-medium' => __('Blog Medium', 'kode_forest'),
												// 'blog-full' => __('Blog Full', 'kode_forest'),
												//'blog-medium' => __('Blog Medium', 'kode_forest'),
												'blog-grid' => __('Blog Grid', 'kode_forest'),
												//'blog-medium' => __('Blog Medium', 'kode_forest'),
												'blog-full' => __('Blog Full', 'kode_forest'),
											),
											'default' => 'blog-full'							
										),			
										'archive-num-excerpt'=> array(
											'title'=> __('Search - Archive Num Excerpt (Word)' ,'kode_forest'),
											'type'=> 'text',	
											'default'=> '25',
											'wrapper-class'=>'blog-full-wrapper archive-blog-style-wrapper',
											'description'=> __('This is a number of word (decided by spaces) that you want to show on the post excerpt. <strong>Use 0 to hide the excerpt, -1 to show full posts and use the wordpress more tag</strong>.', 'kode_forest')
										),
										// 'archive-thumbnail-size'=> array(
											// 'title'=> __('Thumbnail Size' ,'kode_forest'),
											// 'type'=> 'combobox',
											// 'options'=> kode_get_thumbnail_list(),
											// 'default'=> 'small-grid-size',
											// 'description'=> __('Only effects to <strong>standard and gallery post format</strong>','kode_forest')
										// ),		
										// 'archive-portfolio-style'=> array(
											// 'title'=> __('Archive Portfolio Style' ,'kode_forest'),
											// 'type'=> 'combobox',
											// 'options'=> array(
												// 'classic-portfolio' => __('Portfolio Classic Style', 'kode_forest'),
												// 'modern-portfolio' => __('Portfolio Modern Style', 'kode_forest')
											// ),
										// ),							
										// 'archive-portfolio-size'=> array(
											// 'title'=> __('Portfolio Size' ,'kode_forest'),
											// 'type'=> 'combobox',
											// 'options'=> array(
												// '1/4'=>'1/4',
												// '1/3'=>'1/3',
												// '1/2'=>'1/2',
												// '1/1'=>'1/1'
											// ),
											// 'default'=>'1/3',
											// 'wrapper-class'=> 'classic-portfolio-wrapper modern-portfolio-wrapper archive-portfolio-style-wrapper'
										// ),	
										// 'archive-portfolio-num-excerpt'=> array(
											// 'title'=> __('Portfolio Num Excerpt (Word)' ,'kode_forest'),
											// 'type'=> 'text',	
											// 'default'=> '25',
											// 'wrapper-class'=> 'classic-portfolio-wrapper archive-portfolio-style-wrapper',
											// 'description'=> __('This is a number of word (decided by spaces) that you want to show on the post excerpt. <strong>Use 0 to hide the excerpt, -1 to show full posts and use the wordpress more tag</strong>.', 'kode_forest')
										// ),
										// 'archive-portfolio-thumbnail-size'=> array(
											// 'title'=> __('Thumbnail Size' ,'kode_forest'),
											// 'type'=> 'combobox',
											// 'options'=> kode_get_thumbnail_list(),
											// 'default'=> 'small-grid-size',
											// 'description'=> __('Only effects to <strong>standard and gallery post format</strong>','kode_forest')
										// ),	
										
									)
								),			

								'woocommerce-style' => array(
									'title' => __('Woocommerce Style', 'kode_forest'),
									'options' => array(	
										'all-products-per-row' => array(
											'title' => __('Products Per Row', 'kode_forest'),
											'type' => 'combobox',
											'options' => array(
												'1'=> '1',
												'2'=> '2',
												'3'=> '3',
												'4'=> '4',
												'5'=> '5'
											),
											'default' => '3'							
										),
										'all-products-sidebar' => array(
											'title' => __('All Products Sidebar', 'kode_forest'),
											'type' => 'radioimage',
											'options' => array(
												'no-sidebar'=>KODE_PATH . '/framework/include/backend_assets/images/no-sidebar.png',
												'both-sidebar'=>KODE_PATH . '/framework/include/backend_assets/images/both-sidebar.png', 
												'right-sidebar'=>KODE_PATH . '/framework/include/backend_assets/images/right-sidebar.png',
												'left-sidebar'=>KODE_PATH . '/framework/include/backend_assets/images/left-sidebar.png'
											),
											'default' => 'no-sidebar'							
										),
										'all-products-sidebar-left' => array(
											'title' => __('All Products Sidebar Left', 'kode_forest'),
											'type' => 'combobox',
											'options' => $theme_option['sidebar-element'],		
											'wrapper-class'=>'left-sidebar-wrapper both-sidebar-wrapper all-products-sidebar-wrapper',											
										),
										'all-products-sidebar-right' => array(
											'title' => __('All Products Sidebar Right', 'kode_forest'),
											'type' => 'combobox',
											'options' => $theme_option['sidebar-element'],
											'wrapper-class'=>'right-sidebar-wrapper both-sidebar-wrapper all-products-sidebar-wrapper',
										),		
										'single-products-sidebar' => array(
											'title' => __('Single Products Sidebar', 'kode_forest'),
											'type' => 'radioimage',
											'options' => array(
												'no-sidebar'=>KODE_PATH . '/framework/include/backend_assets/images/no-sidebar.png',
												'both-sidebar'=>KODE_PATH . '/framework/include/backend_assets/images/both-sidebar.png', 
												'right-sidebar'=>KODE_PATH . '/framework/include/backend_assets/images/right-sidebar.png',
												'left-sidebar'=>KODE_PATH . '/framework/include/backend_assets/images/left-sidebar.png'
											),
											'default' => 'no-sidebar'							
										),
										'single-products-sidebar-left' => array(
											'title' => __('Single Products Sidebar Left', 'kode_forest'),
											'type' => 'combobox',
											'options' => $theme_option['sidebar-element'],		
											'wrapper-class'=>'left-sidebar-wrapper both-sidebar-wrapper single-products-sidebar-wrapper',											
										),
										'single-products-sidebar-right' => array(
											'title' => __('Single products Sidebar Right', 'kode_forest'),
											'type' => 'combobox',
											'options' => $theme_option['sidebar-element'],
											'wrapper-class'=>'right-sidebar-wrapper both-sidebar-wrapper single-products-sidebar-wrapper',
										),											
									)
								),									
								
								'footer-style' => array(
									'title' => __('Footer - Copyright Style', 'kode_forest'),
									'options' => array(
										'show-footer' => array(
											'title' => __('Show Footer', 'kode_forest'),
											'type' => 'checkbox',
											'default' => 'enable'
										),											
										'footer-layout' => array(
											'title' => __('Footer Layout', 'kode_forest'),
											'type' => 'radioimage',
											'options' => array(
												'1'=>KODE_PATH . '/framework/include/backend_assets/images/footer-style1.png',
												'2'=>KODE_PATH . '/framework/include/backend_assets/images/footer-style2.png', 
												// '3'=>KODE_PATH . '/framework/include/backend_assets/images/footer-style3.png',
												'4'=>KODE_PATH . '/framework/include/backend_assets/images/footer-style4.png',
												// '5'=>KODE_PATH . '/framework/include/backend_assets/images/footer-style5.png',
												// '6'=>KODE_PATH . '/framework/include/backend_assets/images/footer-style6.png'
											),
											'default' => '2'
										),
										'show-copyright' => array(
											'title' => __('Show Copyright', 'kode_forest'),
											'type' => 'checkbox',
											'default' => 'enable'
										),
										'copyright-text' => array(
											'title' => __('Copyright Text', 'kode_forest'),
											'type' => 'textarea',	
											'class' => 'full-width',
										),	
									)
								),		

								'import-export-option' => array(
									'title' => __('Import/Export Option', 'kode_forest'),
									'options' => array(
										'export-option' => array(
											'title' => __('Export Option', 'kode_forest'),
											'type' => 'custom',
											'option' => 
												'<input type="button" id="kode-export" class="kdf-button" value="' . __('Export', 'kode_forest') . '" />' .
												'<textarea class="full-width"></textarea>'
										),
										'import-option' => array(
											'title' => __('Import Option', 'kode_forest'),
											'type' => 'custom',
											'option' => 
												'<input type="button" id="kode-import" class="kdf-button" value="' . __('Import', 'kode_forest') . '" />' .
												'<textarea class="full-width"></textarea>'
										),										
									)
								),									
							
							)
						),

						// overall elements menu
						'overall-elements' => array(
							'title' => __('Social Settings', 'KodeForest'),
							'icon' => 'fa fa-user',
							'options' => array(

								'header-social' => array(),
								
								'social-shares' => array(),
								
							)				
						),
						
						// font setting menu
						'font-settings' => array(
							'title' => __('Font Settings', 'KodeForest'),
							'icon' => 'fa fa-font',
							'options' => array(
								'font-family' => array(
									'title' => __('Font Family', 'kode_forest'),
									'options' => array(
										'navi-font-family' => array(
											'title' => __('Navigation Font', 'kode_translate'),
											'type' => 'font_option',
											'default' => 'Arial, Helvetica, sans-serif',
											'data-type' => 'font_option',
											'selector' => '.kode-navigation{ font-family: #kode#; }'
										),
										'heading-font-family' => array(
											'title' => __('Header Font', 'kode_translate'),
											'type' => 'font_option',
											'default' => 'Arial, Helvetica, sans-serif',
											'data-type' => 'font_option',
											'selector' => 'h1, h2, h3, h4, h5, h6{ font-family: #kode#; }'
										),			
										'body-font-family' => array(
											'title' => __('Content Font', 'kode_translate'),
											'type' => 'font_option',
											'default' => 'Arial, Helvetica, sans-serif',
											'data-type' => 'font_option',
											'selector' => 'body, input, textarea{ font-family: #kode#; }'
										),			
										
									),	
								),

								'font-size' => array(
									'title' => __('Font Size', 'kode_forest'),
									'options' => array(
										
										'content-font-size' => array(
											'title' => __('Content Size', 'kode_forest'),
											'type' => 'sliderbar',
											'default' => '14',
											//'selector' => 'body{ font-size: #kode#; }',
											'data-type' => 'pixel'											
										),				
										'h1-font-size' => array(
											'title' => __('H1 Size', 'kode_forest'),
											'type' => 'sliderbar',
											'default' => '30',
											//'selector' => 'h1{ font-size: #kode#; }',
											'data-type' => 'pixel'											
										),
										'h2-font-size' => array(
											'title' => __('H2 Size', 'kode_forest'),
											'type' => 'sliderbar',
											'default' => '25',
											//'selector' => 'h2{ font-size: #kode#; }',
											'data-type' => 'pixel'											
										),
										'h3-font-size' => array(
											'title' => __('H3 Size', 'kode_forest'),
											'type' => 'sliderbar',
											'default' => '20',
											//'selector' => 'h3{ font-size: #kode#; }',
											'data-type' => 'pixel'											
										),
										'h4-font-size' => array(
											'title' => __('H4 Size', 'kode_forest'),
											'type' => 'sliderbar',
											'default' => '18',
											//'selector' => 'h4{ font-size: #kode#; }',
											'data-type' => 'pixel'											
										),
										'h5-font-size' => array(
											'title' => __('H5 Size', 'kode_forest'),
											'type' => 'sliderbar',
											'default' => '16',
											//'selector' => 'h5{ font-size: #kode#; }',
											'data-type' => 'pixel'											
										),
										'h6-font-size' => array(
											'title' => __('H6 Size', 'kode_forest'),
											'type' => 'sliderbar',
											'default' => '15',
											//'selector' => 'h6{ font-size: #kode#; }',
											'data-type' => 'pixel'											
										),
										
									)
								),								
							)					
						),
							
						
						// plugin setting menu
						'plugin-settings' => array(
							'title' => __('Slider Settings', 'KodeForest'),
							'icon' => 'fa fa-image',
							'options' => array(
								'bx-slider' => array(
									'title' => __('BX Slider', 'KodeForest'),
									'options' => array(		
										'bx-slider-effects' => array(
											'title' => __('BX Slider Effect', 'KodeForest'),
											'type' => 'combobox',
											'options' => array(
												'fade' => __('Fade', 'KodeForest'),
												'slide'	=> __('Slide', 'KodeForest')
											)
										),
										'bx-pause-time' => array(
											'title' => __('BX Slider Pause Time', 'KodeForest'),
											'type' => 'text',
											'default' => '7000'
										),
										'bx-slide-speed' => array(
											'title' => __('BX Slider Animation Speed', 'KodeForest'),
											'type' => 'text',
											'default' => '600'
										),	
									)
								),
								'flex-slider' => array(
									'title' => __('Flex Slider', 'KodeForest'),
									'options' => array(		
										'flex-slider-effects' => array(
											'title' => __('Flex Slider Effect', 'KodeForest'),
											'type' => 'combobox',
											'options' => array(
												'fade' => __('Fade', 'KodeForest'),
												'slide'	=> __('Slide', 'KodeForest')
											)
										),
										'flex-pause-time' => array(
											'title' => __('Flex Slider Pause Time', 'KodeForest'),
											'type' => 'text',
											'default' => '7000'
										),
										'flex-slide-speed' => array(
											'title' => __('Flex Slider Animation Speed', 'KodeForest'),
											'type' => 'text',
											'default' => '600'
										),	
									)
								),
								
								'nivo-slider' => array(
									'title' => __('Nivo Slider', 'KodeForest'),
									'options' => array(		
										'nivo-slider-effects' => array(
											'title' => __('Nivo Slider Effect', 'KodeForest'),
											'type' => 'combobox',
											'options' => array(
												'sliceDownRight'	=> __('sliceDownRight', 'KodeForest'),
												'sliceDownLeft'		=> __('sliceDownLeft', 'KodeForest'),
												'sliceUpRight'		=> __('sliceUpRight', 'KodeForest'),
												'sliceUpLeft'		=> __('sliceUpLeft', 'KodeForest'),
												'sliceUpDown'		=> __('sliceUpDown', 'KodeForest'),
												'sliceUpDownLeft'	=> __('sliceUpDownLeft', 'KodeForest'),
												'fold'				=> __('fold', 'KodeForest'),
												'fade'				=> __('fade', 'KodeForest'),
												'boxRandom'			=> __('boxRandom', 'KodeForest'),
												'boxRain'			=> __('boxRain', 'KodeForest'),
												'boxRainReverse'	=> __('boxRainReverse', 'KodeForest'),
												'boxRainGrow'		=> __('boxRainGrow', 'KodeForest'),
												'boxRainGrowReverse'=> __('boxRainGrowReverse', 'KodeForest')
											)
										),
										'nivo-pause-time' => array(
											'title' => __('Nivo Slider Pause Time', 'KodeForest'),
											'type' => 'text',
											'default' => '7000'
										),
										'nivo-slide-speed' => array(
											'title' => __('Nivo Slider Animation Speed', 'KodeForest'),
											'type' => 'text',
											'default' => '600'
										),	
									)
								),
							)					
						),
						
						'sidebar-settings' => array(
							'title' => __('Sidebar Settings', 'KodeForest'),
							'icon' => 'fa fa-columns',
							'options' => array(
								'sidebar_element' => array(
									'title' => __('Sidebar', 'KodeForest'),
									'options' => array(		
										'sidebar-element' => array(
											'title' => __('Sidebar Name', 'KodeForest'),
											'placeholder' => __('type sidebar name', 'KodeForest'),
											'type' => 'sidebar',
											'btn_title' => 'Add Sidebar'
										)										
									)
								),
							)
						),
						'api-settings' => array(
							'title' => __('API Settings', 'KodeForest'),
							'icon' => 'fa fa-gear',
							'options' => array(
								'api_configuration' => array(
									'title' => __('API Settings', 'KodeForest'),
									'options' => array(		
										'mail-chimp-api' => array(
											'title' => __('Mail Chimp API', 'KodeForest'),
											'type' => 'text',
											'default' => 'API KEY',
											'description' => 'Please add mail chimp API Key here'
										),									
										'mail-chimp-listid' => array(
											'title' => __('MailChimp List ID', 'KodeForest'),
											'type' => 'text',
											'description' => 'For getting list id first login to your mail chimp account then click on list > List name and Campaign defaults > you will see list id written on the right side of first section.'
										),
									)
								),
							)
						),
						
					)
				), 
				
				
				
				$theme_option
			);
			
		}
		
	}

?>