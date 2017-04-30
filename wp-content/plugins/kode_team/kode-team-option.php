<?php
	/*	
	*	Goodlayers Portfolio Option file
	*	---------------------------------------------------------------------
	*	This file creates all team options and attached to the theme
	*	---------------------------------------------------------------------
	*/
	
	// add a team option to team page
	if( is_admin() ){ add_action('after_setup_theme', 'kode_create_team_options'); }
	if( !function_exists('kode_create_team_options') ){
	
		function kode_create_team_options(){
			global $theme_option;
			
			if( !class_exists('kode_page_options') ) return;
			new kode_page_options( 				
				// page option settings
				array(
					'page-layout' => array(
						'title' => esc_attr__('Page Layout', 'kode-team'),
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
									'title' => esc_attr__('Left Sidebar' , 'kode-team'),
									'type' => 'combobox',
									'options' => $theme_option['sidebar-element'],
									'wrapper-class' => 'sidebar-wrapper left-sidebar-wrapper both-sidebar-wrapper'
								),
								'right-sidebar' => array(
									'title' => esc_attr__('Right Sidebar' , 'kode-team'),
									'type' => 'combobox',
									'options' => $theme_option['sidebar-element'],
									'wrapper-class' => 'sidebar-wrapper right-sidebar-wrapper both-sidebar-wrapper'
								),						
						)
					),
					
					'page-option' => array(
						'title' => esc_attr__('Page Option', 'kode-team'),
						'options' => array(
							'page-caption' => array(
								'title' => esc_attr__('Page Caption' , 'kode-team'),
								'type' => 'textarea'
							),							
							'header-background' => array(
								'title' => esc_attr__('Header Background Image' , 'kode-team'),
								'button' => esc_attr__('Upload', 'kode-team'),
								'type' => 'upload',
							),	
							
							'designation' => array(
								'title' => esc_attr__('Designation' , 'kode-team'),
								'type' => 'text',
							),
							'phone' => array(
								'title' => esc_attr__('Phone Number' , 'kode-team'),
								'type' => 'text',
							),
							'website' => array(
								'title' => esc_attr__('Website' , 'kode-team'),
								'type' => 'text',
							),
							'email' => array(
								'title' => esc_attr__('Email Id' , 'kode-team'),
								'type' => 'text',
							),	
							'facebook' => array(
								'title' => esc_attr__('Facebook' , 'kode-team'),
								'type' => 'text',
							),
							'twitter' => array(
								'title' => esc_attr__('Twitter' , 'kode-team'),
								'type' => 'text',
							),
							'youtube' => array(
								'title' => esc_attr__('Youtube' , 'kode-team'),
								'type' => 'text',
							),
							'pinterest' => array(
								'title' => esc_attr__('Pinterest' , 'kode-team'),
								'type' => 'text',
							),	
						)
					),
					
					// page option attribute
				array(
					'post_type' => array('team'),
					'meta_title' => esc_attr__('Team Option', 'kode-team'),
					'meta_slug' => 'team-page-option',
					'option_name' => 'post-option',
					'position' => 'normal',
					'priority' => 'high',
				),

				)
			);
			
		}
	}	
	
	// add team in page builder area
	add_filter('kode_page_builder_option', 'kode_register_team_item');
	if( !function_exists('kode_register_team_item') ){
		function kode_register_team_item( $page_builder = array() ){
			global $kode_spaces;
		
			$page_builder['content-item']['options']['team'] = array(
				'title'=> esc_attr__('Team', 'kode-team'), 
				'icon'=>'fa-user-plus',
				'type'=>'item',
				'options'=>array(
					'category'=> array(
						'title'=> esc_attr__('Category' ,'kode-team'),
						'type'=> 'combobox',
						'options'=> kode_get_term_list('team_category'),
						'description'=> esc_attr__('You can use Ctrl/Command button to select multiple categories or remove the selected category. <br><br> Leave this field blank to select all categories.', 'kode-team')
					),	
					'tag'=> array(
						'title'=> esc_attr__('Tag' ,'kode-team'),
						'type'=> 'combobox',
						'options'=> kode_get_term_list('team_tag'),
						'description'=> esc_attr__('Will be ignored when the team filter option is enabled.', 'kode-team')
					),					
					'team-style'=> array(
						'title'=> esc_attr__('Portfolio Style' ,'kode-team'),
						'type'=> 'combobox',
						'options'=> array(
							'normal-view' => esc_attr__('Normal View', 'kode-team'),
							'modern-view' => esc_attr__('Modern View', 'kode-team')
						),
					),					
					'num-fetch'=> array(
						'title'=> esc_attr__('Num Fetch' ,'kode-team'),
						'type'=> 'text',	
						'default'=> '8',
						'description'=> esc_attr__('Specify the number of teams you want to pull out.', 'kode-team')
					),	
					'num-excerpt'=> array(
						'title'=> esc_attr__('Num Excerpt' ,'kode-team'),
						'type'=> 'text',	
						'default'=> '20',
						'wrapper-class'=>'team-style-wrapper classic-team-wrapper classic-team-no-space-wrapper'
					),
					'orderby'=> array(
						'title'=> esc_attr__('Order By' ,'kode-team'),
						'type'=> 'combobox',
						'options'=> array(
							'date' => esc_attr__('Publish Date', 'kode-team'), 
							'title' => esc_attr__('Title', 'kode-team'), 
							'rand' => esc_attr__('Random', 'kode-team'), 
						)
					),
					'order'=> array(
						'title'=> esc_attr__('Order' ,'kode-team'),
						'type'=> 'combobox',
						'options'=> array(
							'desc'=>esc_attr__('Descending Order', 'kode-team'), 
							'asc'=> esc_attr__('Ascending Order', 'kode-team'), 
						)
					),			
					'pagination'=> array(
						'title'=> esc_attr__('Enable Pagination' ,'kode-team'),
						'type'=> 'checkbox'
					),					
					'margin-bottom' => array(
						'title' => esc_attr__('Margin Bottom', 'kode-team'),
						'type' => 'text',
						'default' => '',
						'description' => esc_attr__('Spaces after ending of this item', 'kode-team')
					),				
				)
			);
			return $page_builder;
		}
	}
	
?>