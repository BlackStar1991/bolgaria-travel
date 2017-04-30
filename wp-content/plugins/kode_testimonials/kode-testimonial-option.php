<?php
	/*	
	*	Testimonial Option file
	*	---------------------------------------------------------------------
	*	This file creates all testimonial options and attached to the theme
	*	---------------------------------------------------------------------
	*/
	
	// add a testimonial option to testimonial page
	if( is_admin() ){ add_action('after_setup_theme', 'kode_create_testimonial_options'); }
	if( !function_exists('kode_create_testimonial_options') ){
	
		function kode_create_testimonial_options(){
			global $theme_option;
			
			if( !class_exists('kode_page_options') ) return;
			new kode_page_options( 
				
				
					  
				// page option settings
				array(
					'page-layout' => array(
						'title' => esc_attr__('Page Layout', 'kode_testimonial'),
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
									'title' => esc_attr__('Left Sidebar' , 'kode_testimonial'),
									'type' => 'combobox',
									'options' => $theme_option['sidebar-element'],
									'wrapper-class' => 'sidebar-wrapper left-sidebar-wrapper both-sidebar-wrapper'
								),
								'right-sidebar' => array(
									'title' => esc_attr__('Right Sidebar' , 'kode_testimonial'),
									'type' => 'combobox',
									'options' => $theme_option['sidebar-element'],
									'wrapper-class' => 'sidebar-wrapper right-sidebar-wrapper both-sidebar-wrapper'
								),						
						)
					),
					
					'page-option' => array(
						'title' => esc_attr__('Page Option', 'kode_testimonial'),
						'options' => array(
							'page-caption' => array(
								'title' => esc_attr__('Page Caption' , 'kode_testimonial'),
								'type' => 'textarea'
							),							
							'header-background' => array(
								'title' => esc_attr__('Header Background Image' , 'kode_testimonial'),
								'button' => esc_attr__('Upload', 'kode_testimonial'),
								'type' => 'upload',
							),	
							'designation' => array(
								'title' => esc_attr__('Designation' , 'kode_testimonial'),
								'type' => 'text',
							),						
						)
					),

				),
				
				// page option attribute
				array(
					'post_type' => array('testimonial'),
					'meta_title' => esc_attr__('Testimonial Option', 'kode_testimonial'),
					'meta_slug' => 'testimonial-page-option',
					'option_name' => 'post-option',
					'position' => 'normal',
					'priority' => 'high',
				)
			);
			
		}
	}	
	
	// add testimonial in page builder area
	add_filter('kode_page_builder_option', 'kode_register_testimonial_item');
	if( !function_exists('kode_register_testimonial_item') ){
		function kode_register_testimonial_item( $page_builder = array() ){
			global $kode_spaces;
		
			$page_builder['content-item']['options']['testimonial'] = array(
				'title'=> esc_attr__('Testimonial', 'kode_testimonial'), 
				'type'=>'item',
				'icon'=>'fa-quote-left',
				'options'=>array(					
					'category'=> array(
						'title'=> esc_attr__('Category' ,'kode_testimonial'),
						'type'=> 'combobox',
						'options'=> kode_get_term_list('testimonial_category'),
						'description'=> esc_attr__('You can use Ctrl/Command button to select multiple categories or remove the selected category. <br><br> Leave this field blank to select all categories.', 'kode_testimonial')
					),			
					'testimonial-style'=> array(
						'title'=> esc_attr__('Testimonial Style' ,'kode_testimonial'),
						'type'=> 'combobox',
						'options'=> array(
							'normal-view' => esc_attr__('Normal View', 'kode_testimonial'),
							'modern-view' => esc_attr__('Modern View', 'kode_testimonial'),
							'grid-view' => esc_attr__('Grid View', 'kode_testimonial')
						),
					),					
					'num-fetch'=> array(
						'title'=> esc_attr__('Num Fetch' ,'kode_testimonial'),
						'type'=> 'text',	
						'default'=> '8',
						'description'=> esc_attr__('Specify the number of testimonials you want to pull out.', 'kode_testimonial')
					),	
					'num-excerpt'=> array(
						'title'=> esc_attr__('Num Excerpt' ,'kode_testimonial'),
						'type'=> 'text',	
						'default'=> '20'
					),
					'orderby'=> array(
						'title'=> esc_attr__('Order By' ,'kode_testimonial'),
						'type'=> 'combobox',
						'options'=> array(
							'date' => esc_attr__('Publish Date', 'kode_testimonial'), 
							'title' => esc_attr__('Title', 'kode_testimonial'), 
							'rand' => esc_attr__('Random', 'kode_testimonial'), 
						)
					),
					'order'=> array(
						'title'=> esc_attr__('Order' ,'kode_testimonial'),
						'type'=> 'combobox',
						'options'=> array(
							'desc'=>esc_attr__('Descending Order', 'kode_testimonial'), 
							'asc'=> esc_attr__('Ascending Order', 'kode_testimonial'), 
						)
					),							
					'margin-bottom' => array(
						'title' => esc_attr__('Margin Bottom', 'kode_testimonial'),
						'type' => 'text',
						'default' => '',
						'description' => esc_attr__('Spaces after ending of this item', 'kode_testimonial')
					),				
				)
			);
			return $page_builder;
		}
	}
	
?>