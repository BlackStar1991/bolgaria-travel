<?php
	/*	
	*	Kodeforest Theme Options panel
	*	---------------------------------------------------------------------
	*	This file create the theme options
	*	---------------------------------------------------------------------
	*	Settings - Options - Values
	*/	
	
	if( !class_exists('kode_themeoption_panel') ){
		
		class kode_themeoption_panel{
			
			public $settings;
			public $options;		
			public $values;
			
			function __construct($settings = array(), $options = array(), $values = array()){
				
				$default_config = array(
					'page_title' => __('Custom Option', 'KodeForest'),
					'menu_title' => __('Custom Menu', 'KodeForest'),
					'menu_slug' => 'custom-menu',
					'save_option' => 'kode_admin_option',
					'role' => 'edit_theme_options',
					'icon_url' => '',
					'position' => 82
				);
				
				$this->settings = wp_parse_args($settings, $default_config);
				$this->options = $options;
				$this->value = $values;

				new kode_theme_customizer($options);
				
				// send the hook to create the admin menu
				add_action('admin_menu', array(&$this, 'register_main_themeoption'));
				
				// set the hook for saving the admin menu
				add_action('wp_ajax_kode_save_admin_panel', array(&$this, 'kode_save_admin_panel'));
			}
			
			// create the admin menu
			function register_main_themeoption(){
				
				// add the hook to create admin option
				$page = add_menu_page($this->settings['page_title'], $this->settings['menu_title'], $this->settings['role'], $this->settings['menu_slug'], array(&$this, 'kode_create_themeoption'), $this->settings['icon_url'], $this->settings['position']); 

				// include the script to admin option
				add_action('admin_print_styles-' . $page, array($this, 'register_admin_option_style'));	
				add_action('admin_print_scripts-' . $page, array($this, 'register_admin_option_script'));			
			}
						
			// include script and style when you're on admin option
			function register_admin_option_style(){
				
				wp_enqueue_style('wp-color-picker');
				wp_enqueue_style('kode-alert-box', KODE_PATH . '/framework/include/backend_assets/css/kf_msg.css');						
				wp_enqueue_style('kode-admin-panel', KODE_PATH . '/framework/include/backend_assets/css/kf_themeoption.css');						
				wp_enqueue_style('kode-font-awesome', KODE_PATH . '/css/font-awesome.css');	
				wp_enqueue_style('kode-admin-chosen', KODE_PATH . '/framework/include/backend_assets/css/kode-chosen/chosen.min.css');
				wp_enqueue_style('kode-admin-panel-html', KODE_PATH . '/framework/include/backend_assets/css/kf_element_meta.css');
				wp_enqueue_style('kode-date-picker', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
			}
			function register_admin_option_script(){
				if(function_exists( 'wp_enqueue_media' )){
					wp_enqueue_media();
				}		
				
				wp_enqueue_script('jquery-ui-core');
				wp_enqueue_script('jquery-ui-slider');
				wp_enqueue_script('wp-color-picker');							
				wp_enqueue_script('kode-alert-box', KODE_PATH . '/framework/include/backend_assets/js/kf_msg.js');
				wp_enqueue_script('kode-admin-panel', KODE_PATH . '/framework/include/backend_assets/js/kf_themeoption.js');
				wp_enqueue_script('kode-save-settings', KODE_PATH . '/framework/include/backend_assets/js/kf_save_settings.js');
				wp_enqueue_script('kode-admin-chosen', KODE_PATH . '/framework/include/backend_assets/js/kode-chosen/chosen.jquery.min.js');
				wp_enqueue_script('kode-admin-panel-html', KODE_PATH . '/framework/include/backend_assets/js/kf_element_meta.js');
				
			}
			
			// saving admin option
			function kode_save_admin_panel(){
				if( !check_ajax_referer(KODE_SMALL_TITLE . '-create-nonce', 'security', false) ){
					die(json_encode(array(
						'status'=>'failed', 
						'message'=> '<span class="head">' . esc_attr__('Invalid Nonce', 'KodeForest') . '</span> ' .
							esc_attr__('Please refresh the page and try this again.' ,'KodeForest')
					)));
				}
				
				if( isset($_POST['option']) ){		
					parse_str(kode_stripslashes($_POST['option']), $option ); 
					$option = kode_stripslashes($option);
					
					$old_option = get_option($this->settings['save_option']);
					  
					if($old_option == $option || update_option($this->settings['save_option'], $option)){
						$ret = array(
							'status'=> 'success', 
							'message'=> '<span class="head">' . esc_attr__('Save Options Complete' ,'KodeForest') . '</span> '
						);		
					}else{
						$ret = array(
							'status'=> 'failed', 
							'message'=> '<span class="head">' . esc_attr__('Save Options Failed', 'KodeForest') . '</span> ' .
							esc_attr__('Please refresh the page and try this again.' ,'KodeForest')
						);					
					}
				}else{
					$ret = array(
						'status'=>'failed', 
						'message'=> '<span class="head">' . esc_attr__('Cannot Retrieve Options', 'KodeForest') . '</span> ' .
							esc_attr__('Please refresh the page and try this again.' ,'KodeForest')
					);	
				}
				
				do_action('kode_save_' + $this->settings['menu_slug'], $this->options);
				
				die(json_encode($ret));
			}
			
			// creating the content of the admin option
			function kode_create_themeoption(){
				echo '<div class="kode-admin-panel-wrapper">';

				echo '<form action="#" method="POST" id="kode-admin-form" data-action="kode_save_admin_panel" ';
				echo 'data-ajax="' . esc_url(AJAX_URL) . '" ';
				echo 'data-security="' . wp_create_nonce(KODE_SMALL_TITLE . '-create-nonce') . '" >';
				
				// print navigation section
				$this->kode_show_admin_nav();
				
				// print content section
				$this->kode_show_admin_content();
				
				echo '<div class="clear"></div>';
				echo '</form>';	

				echo '</div>'; // kode-admin-panel-wrapper
			}	

			function kode_show_admin_nav(){
				
				// admin navigation
				echo '<div class="clearfix clear"></div>';
				echo '<div class="kode-admin-nav-wrapper" id="kode-admin-nav" >';
					echo '<div class="kode-admin-head">';
						echo '<a href="'.esc_url(admin_url()).'admin.php?page='.KODE_SLUG.'"><img src="' . KODE_PATH . '/framework/include/backend_assets/images/admin-panel/admin-logo.png" alt="admin logo" /></a>';
						echo '<div class="kode-admin-head-gimmick"></div>';
					echo '</div>';
				
				$is_first = 'active';
				
				echo '<ul class="admin-menu" >';
				foreach( $this->options as $menu_slug => $menu_settings ){
					echo '<li class="' . esc_attr($menu_slug) . '-wrapper">';
					
					echo '<div class="menu-title">';
					echo '<i class="fa ' . esc_attr($menu_settings['icon']) . '" ></i>';
					echo '<span>' . esc_attr($menu_settings['title']) . '</span>';
					echo '</div>';
					
					
					
					echo '</li>';
				}
				echo '</ul>';
				
				echo '<div class="kode-admin-head kode-admin-save-btn">';
				echo '<div class="kode-save-button">';
				echo '<img class="now-loading" src="' . KODE_PATH . '/framework/include/backend_assets/images/admin-panel/loading.gif" alt="loading" />';				
				echo '<input value="' . esc_attr__('Save Changes', 'KodeForest') . '" type="submit" class="kdf-button" />';
				echo '</div>'; 
				echo '<div class="clear"></div>';
				echo '</div>'; // kode-admin-head
				
				echo '</div>'; // kode-admin-nav-wrapper				
			}
			
			function kode_show_admin_content(){
			
				$option_generator = new kode_generate_admin_html();
				
				$is_first = 'active';
				
				// admin content
				echo '<div class="clearfix clear"></div>';
				echo '<div class="kode-admin-content-wrapper" id="kode-admin-content">';
				
				
				echo '<div class="kode-sidebar-section">';
					foreach( $this->options as $menu_slug => $menu_settings ){
						echo '<ul id="' . esc_attr($menu_slug) . '-wrapper" class="admin-sub-menu ' . esc_attr($is_first) . '">';
						foreach( $menu_settings['options'] as $sub_menu_slug => $sub_menu_settings ){
							if( !empty($sub_menu_settings) ){
								echo '<li class="' . esc_attr($sub_menu_slug) . '-wrapper ' . esc_attr($is_first) . ' admin-sub-menu-list" data-id="' . esc_attr($sub_menu_slug) . '" >';
								echo '<div class="sub-menu-title">';
								echo esc_attr($sub_menu_settings['title']);
								echo '</div>';
								echo '</li>';
								
								$is_first = '';
							}
						}
						echo '</ul>';
					}
				echo '</div>';
				$is_first = 'active';
				echo '<div class="kode-content-group">';
				foreach( $this->options as $menu_slug => $menu_settings ){
					foreach( $menu_settings['options'] as $sub_menu_slug => $sub_menu_settings ){
						if( !empty($sub_menu_settings) ){
							echo '<div class="kode-content-section ' . esc_attr($is_first) . '" id="' . esc_attr($sub_menu_slug) . '" >';
							foreach( $sub_menu_settings['options'] as $option_slug => $option_settings ){
								$option_settings['slug'] = esc_attr($option_slug);
								$option_settings['name'] = esc_attr($option_slug);
								if( isset($this->value[$option_slug]) ){
									$option_settings['value'] = $this->value[$option_slug];
								}
								
								$option_generator->kode_generate_html($option_settings);
							}
							echo '</div>'; // Content Ends
						}
						$is_first = '';
					}
				}								
				echo '</div>'; // Content Group Ends
				echo '</div>'; // Content Wrapper Ends
			
			}
			
		}
		
	}	

?>