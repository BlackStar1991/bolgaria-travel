<?php
	/*	
	*	Kodeforest Load Style
	*	---------------------------------------------------------------------
	*	This file create the custom style
	*	For Color Scheme, and Typography Options
	*	---------------------------------------------------------------------
	*/	session_start();
		global $theme_option;
		
		// load the style using this file
		if(!is_admin()){
			//for Frontend only
			add_action('wp_footer', 'kode_generate_style_custom');
		}
		add_action('kode_save_' + KODE_SMALL_TITLE, 'kode_save_font_options');
		function kode_save_font_options($options){
			
			// write file content
			$theme_option = get_option(KODE_SMALL_TITLE . '_admin_option', array());
			
			// for updating google font list to use on front end
			global $kode_font_controller; $google_font_list = array(); 
			
			foreach( $options as $menu_key => $menu ){
				foreach( $menu['options'] as $submenu_key => $submenu ){
					if( !empty($submenu['options']) ){
						foreach( $submenu['options'] as $option_slug => $option ){
							if( !empty($option['selector']) ){
								// prevents warning message
								$option['data-type'] = (empty($option['data-type']))? 'color': $option['data-type'];
								
								// if( !empty($theme_option[$option_slug]) ){
									// $value = kode_check_option_data_type($theme_option[$option_slug], $option['data-type']);
								// }else{
									// $value = '';
								// }
								// if($value){
									// $kode_font = str_replace('#kode#', $value, $option['selector']) . "\r\n";
								// }
								
								// updating google font list
								if( $menu_key == 'font-settings' && $submenu_key == 'font-family' ){
									if( !empty($kode_font_controller->google_font_list[$theme_option[$option_slug]]) ){
										$google_font_list[$theme_option[$option_slug]] = $kode_font_controller->google_font_list[$theme_option[$option_slug]];
									}
								}
							}
						}
					}
				}
			}
			
			// update google font list
			update_option(KODE_SMALL_TITLE . '_google_font_list', $google_font_list);			
		}
	
		function kode_generate_style_custom( $options ){
			global $kode_font_controller,$google_font_list;
			// write file content
			$theme_option = get_option(KODE_SMALL_TITLE . '_admin_option', array());
			// $google_font_list = get_option(KODE_SMALL_TITLE . '_google_font_list', array());
			//echo $kode_font_controller->get_google_font_url($theme_option['navi-font-family']);
			// print_R($kode_font_controller);
			
				// if( empty($kode_font_controller->custom_font_list[$current_font]) && !in_array($current_font, $kode_font_controller->safe_font_list) ){
					// array_push($used_font, $current_font);
				// }
			
			
			// foreach( $used_font as $font_name ){
				// $font_id = str_replace( ' ', '-', $font_name );
				// print_r($font_id);
				// $array['style'][$font_id . '-google-font'] = $kode_font_controller->get_google_font_url($font_name);
			// }	
			// if( !empty($kode_font_controller->google_font_list[$theme_option[$option_slug]]) ){
				//$google_font_list[$theme_option[$option_slug]] = 
				
				// print_r($kode_font_controller);
			// }
			
			// $end_of_file = apply_filters('kode_style_custom_end', '', $theme_option);
			// print_r($google_font_list);
			
			//echo $theme_option['heading-font-family'];
			$style = '<style scoped>';			
			
			if(!empty($theme_option['navi-font-family'])){
				if($theme_option['navi-font-family'] <> ''){
					$style .= '.kode-navigation{';
					$style .= 'font-family:'.$theme_option['navi-font-family'] .'';
					$style .= '}' . "\r\n";
					
				}
			}
			
			if(!empty($theme_option['heading-font-family'])){
				if($theme_option['heading-font-family'] <> ''){
					$style .= '.kode-caption-title, .kode-caption-text, h1, h2, h3, h4, h5, h6{';
					$style .= 'font-family:'.$theme_option['heading-font-family'] .'';
					$style .= '}' . "\r\n";
					
				}
			}
			
			if(!empty($theme_option['body-font-family'])){
				if($theme_option['body-font-family'] <> ''){
					$style .= 'body{';
					$style .= 'font-family:'.$theme_option['body-font-family'] .'';
					$style .= '}' . "\r\n";
					
				}
			}
			
			if(!empty($theme_option['content-font-size'])){
				if($theme_option['content-font-size'] <> ''){
					$style .= 'body{';
					$style .= 'font-size:'.$theme_option['content-font-size'] .'px';
					$style .= '}' . "\r\n";
				}
			}
						
			if(!empty($theme_option['h1-font-size'])){
				if($theme_option['h1-font-size'] <> ''){
					$style .= 'h1{';
					$style .= 'font-size:'.$theme_option['h1-font-size'].'px';
					$style .= '}' . "\r\n";					
				}
			}
			
			
			if(!empty($theme_option['h2-font-size'])){
				if($theme_option['h2-font-size'] <> ''){
					$style .= 'h2{';
					$style .= 'font-size:'.$theme_option['h2-font-size'].'px';
					$style .= '}' . "\r\n";					
				}
			}
			
			
			if(!empty($theme_option['h3-font-size'])){
				if($theme_option['h3-font-size'] <> ''){
					$style .= 'h3{';
					$style .= 'font-size:'.$theme_option['h3-font-size'].'px';
					$style .= '}' . "\r\n";					
				}
			}
			
			
			if(!empty($theme_option['h4-font-size'])){
				if($theme_option['h4-font-size'] <> ''){
					$style .= 'h4{';
					$style .= 'font-size:'.$theme_option['h4-font-size'].'px';
					$style .= '}' . "\r\n";
				}
			}
			
			
			if(!empty($theme_option['h5-font-size'])){
				if($theme_option['h5-font-size'] <> ''){
					$style .= 'h5{';
					$style .= 'font-size:'.$theme_option['h5-font-size'].'px';
					$style .= '}' . "\r\n";					
				}
			}
			
			
			if(!empty($theme_option['h6-font-size'])){
				if($theme_option['h6-font-size'] <> ''){
					$style .= 'h6{';
					$style .= 'font-size:'.$theme_option['h6-font-size'].'px';
					$style .= '}' . "\r\n";					
				}
			}
			
			
			if(!empty($theme_option['enable-boxed-style'])){
				if($theme_option['enable-boxed-style'] == 'boxed-style'){
					if( !empty($theme_option['boxed-background-image']) && is_numeric($theme_option['boxed-background-image']) ){
						$alt_text = get_post_meta($theme_option['boxed-background-image'] , '_wp_attachment_image_alt', true);	
						$image_src = wp_get_attachment_image_src($theme_option['boxed-background-image'], 'full');
						$style .= 'body{background:url(' . esc_url($image_src[0]) . ');background-attachment:fixed;}';
					}else if( !empty($theme_option['boxed-background-image']) ){
						$style .= 'body{background:url(' . esc_url($theme_option['boxed-background-image']) . ');background-attachment:fixed;}';
					}
					
					$style .= '.body-wrapper .eccaption{top:40%;}';
					$style .= '.body-wrapper .main-content{background:#fff;}';
					$style .= '.body-wrapper {';
					$style .= 'background:#fff;width: 1200px; margin: 0 auto; margin-top: 40px; margin-bottom: 40px; box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.2);position:relative;';
					$style .= '}' . "\r\n";					
				}
			}
			
			
			
			
			if(empty($theme_option['color-scheme'])){
				$theme_option['color-scheme'] = '#03AF14';
			}
			if($theme_option['color-scheme'] <> ''){
				
				$style .= '.thcolor,.thcolorhover:hover,
				.kode-services article:hover h2 a,
				.kd-blog-list article:hover h2 a,
				.widget-blogpost ul li:hover h6 a,
				.kode-team article:hover h5 a,
				.kd-404 h1,
				.property-list .text h2{';
				
				$style .= 'color: ' . $theme_option['color-scheme'] . ' !important;  }' . "\r\n";
				
				$style .= '
				.nav.navbar-nav .menu .children li:hover:before, .kode-navigation-wrapper .sub-menu li:hover:before, .tagcloud a:hover, .widget_nav_menu ul li a:hover, .widget_archive ul li:hover, .widget_categories ul li:hover, .widget_pages ul li a:hover, .widget_meta ul li:hover, .widget_recent_entries ul li a:hover, .widget_calendar caption, .form-submit .submit,.thbg-color,.thbg-colorhover:hover,.kd-topbar,#lang_sel ul li ul,.nav.navbar-nav .menu ul > li > a:before, .navbar-nav > li > a:before,.sub-dropdown li:before,.kd-usernetwork:before,
.nav-tabs > li.active > a,.nav-tabs > li > a:hover, .nav-tabs > li.active > a:focus,.input-group-addon,.kode-team figure:before,.kd-tag ul li a:hover,
.kode-gallery ul li figure figcaption:before,.pagination a:before,.pagination a:after,/*Widget*/.widget_categories ul li:hover,.widget_archive ul li:hover,
.widget_search form input[type="submit"],.widget_tag a:hover,.kode-widget h3:before,.kode-widget h2:before,.kd-widget-title h2:before,.nav.navbar-nav .menu .children li:before,.kode-comments-area ul li .text a.comment-reply-link:hover,
.property-list .text a:hover,
.f-property .thumb{';

				$style .= 'background-color: ' . $theme_option['color-scheme'] . ' !important;  }' . "\r\n";
				
				$style .= '.th-bordercolor,.th-bordercolorhover:hover,blockquote,.kd-user-tag,.sub-dropdown,.property-list .text a:hover{';
				
				$style .= 'border-color: ' . $theme_option['color-scheme'] . ' !important;  }' . "\r\n";
				
				$style .= '.kode-navigation-wrapper .children, .kode-navigation-wrapper .sub-menu{';
				
				$style .= 'border-top-color: ' . $theme_option['color-scheme'] . ' !important;  }' . "\r\n";				
			}
			$style .='</style>';
			
			echo $style;
		}