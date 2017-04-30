<?php
	/*	
	*	Kodeforest Include Script File
	*	---------------------------------------------------------------------
	*	This file use to include a necessary script when it's requires
	*	---------------------------------------------------------------------
	*/
	
	//Add Scripts in Theme
	if(!is_admin()){
		add_action('wp_enqueue_scripts','register_non_admin_styles');
		add_action('wp_enqueue_scripts','register_non_admin_scripts');
	}
	
	// Register all Css
	function register_non_admin_styles(){	
		
		global $post,$post_id,$kode_content_raw,$theme_option,$kode_font_controller;		
		
		wp_deregister_style('ignitiondeck-base');
		wp_enqueue_style( 'style', get_stylesheet_uri() );  //Default Stylesheet	
		
		wp_enqueue_style( 'font-awesome', KODE_PATH . '/framework/include/frontend_assets/font-awesome/css/font-awesome.min.css' );  //Font Awesome
		
		if( is_page() && kode_match_page_builder($kode_content_raw, 'item', 'slider', array('slider-type', 'flexslider')) ){
			wp_enqueue_style( 'flexslider', KODE_PATH . '/framework/include/frontend_assets/flexslider/flexslider.css' );  //Font Awesome
		}
		
		wp_enqueue_style( 'nivo-slider', KODE_PATH . '/framework/include/frontend_assets/nivo-slider/nivo-slider.css' );  //Font Awesome
		wp_register_script('kode-nivo-slider', KODE_PATH.'/framework/include/frontend_assets/nivo-slider/jquery.nivo.slider.js', false, '1.0', true);
		wp_enqueue_script('kode-nivo-slider');
		
		if( is_page() && kode_match_page_builder($kode_content_raw, 'item', 'slider', array('slider-type', 'nivo-slider')) ){
			wp_enqueue_style( 'nivo-slider', KODE_PATH . '/framework/include/frontend_assets/nivo-slider/nivo-slider.css' );  //Font Awesome
			wp_register_script('kode-nivo-slider', KODE_PATH.'/framework/include/frontend_assets/nivo-slider/jquery.nivo.slider.js', false, '1.0', true);
			wp_enqueue_script('kode-nivo-slider');
		}
		
		if( is_page() && kode_match_page_builder($kode_content_raw, 'wrapper', 'full-size-wrapper', array('type', 'video')) ){
			wp_register_script('kode-video', KODE_PATH.'/framework/include/frontend_assets/video_background/video.js', false, '1.0', true);
			wp_enqueue_script('kode-video');
			wp_register_script('kode-bigvideo', KODE_PATH.'/framework/include/frontend_assets/video_background/bigvideo.js', false, '1.0', true);
			wp_enqueue_script('kode-bigvideo');
			
		}
		
		
		
		if( is_page() && kode_match_page_builder($kode_content_raw, 'item', 'testimonial') ){
			wp_enqueue_style( 'bx-slider', KODE_PATH . '/framework/include/frontend_assets/bxslider/bxslider.css' );  //Font Awesome
		}
		
		wp_enqueue_style( 'style-responsive', KODE_PATH . '/css/responsive.css' );  //Font Awesome
		wp_enqueue_style( 'style-prettyphoto', KODE_PATH . '/framework/include/frontend_assets/default/css/prettyphoto.css' );  //Font Awesome		
		wp_enqueue_style( 'style-bootstrap', KODE_PATH . '/css/bootstrap.css' );  //Font Awesome
		wp_enqueue_style( 'style-bootstrap-theme', KODE_PATH . '/css/bootstrap-theme.css' );  //Font Awesome
		wp_enqueue_style( 'style-typo', KODE_PATH . '/css/themetypo.css' );  //Font Awesome
		wp_enqueue_style( 'style-widget', KODE_PATH . '/css/widget.css' );  //Font Awesome
		// wp_enqueue_style( 'style-rtl', KODE_PATH . '/css/rtl.css' );  //RTL Layout
		wp_enqueue_style( 'style-shortcode', KODE_PATH . '/css/shortcode.css' );  //Font Awesome
		
		wp_register_script('kode-jquery_waypoint', KODE_PATH.'/framework/include/frontend_assets/default/js/waypoints-min.js', false, '1.0', true);
		wp_enqueue_script('kode-jquery_waypoint');
		
		wp_register_script('kode-circle-chart', KODE_PATH.'/framework/include/frontend_assets/default/js/jquery.circlechart.js', false, '1.0', true);
		wp_enqueue_script('kode-circle-chart');
		
		
		if(isset($theme_option['navi-font-family'])){
			$font_id = str_replace( ' ', '-', $theme_option['navi-font-family'] );
			wp_enqueue_style( 'style-shortcode-'.$font_id, $kode_font_controller->get_google_font_url($theme_option['navi-font-family']));
		}
		if(isset($theme_option['heading-font-family'])){
			$font_id = str_replace( ' ', '-', $theme_option['heading-font-family'] );
			wp_enqueue_style( 'style-shortcode-'.$font_id, $kode_font_controller->get_google_font_url($theme_option['heading-font-family']));
		}
		if(isset($theme_option['body-font-family'])){
			$font_id = str_replace( ' ', '-', $theme_option['body-font-family'] );
			wp_enqueue_style( 'style-shortcode-'.$font_id, $kode_font_controller->get_google_font_url($theme_option['body-font-family']));
		}
		
		
	}
		 
    // Register all scripts
	function register_non_admin_scripts(){
		
		global $post,$post_id,$kode_content_raw,$theme_option;	
		
		wp_enqueue_script('jquery');
		
		if ( is_singular() && get_option( 'thread_comments' ) ) 	wp_enqueue_script( 'comment-reply' );
			
		//BootStrap Script Loaded
		wp_register_script('kode-bootstrap', KODE_PATH.'/js/bootstrap.min.js', array('jquery'), '1.0', true);
		wp_localize_script('kode-bootstrap', 'ajax_var', array('url' => admin_url('admin-ajax.php'),'nonce' => wp_create_nonce('ajax-nonce')));
		wp_enqueue_script('kode-bootstrap');
		

		wp_register_script('kode-countdown', KODE_PATH.'/framework/include/frontend_assets/default/js/jquery.countdown.js', false, '1.0', true);
		wp_enqueue_script('kode-countdown');
		
		wp_register_script('kode-accordion', KODE_PATH.'/framework/include/frontend_assets/default/js/jquery.accordion.js', false, '1.0', true);
		wp_enqueue_script('kode-accordion');
		
		wp_register_script('kode-singlepage', KODE_PATH.'/framework/include/frontend_assets/default/js/jquery.singlePageNav.js', false, '1.0', true);
		wp_enqueue_script('kode-singlepage');
		
		wp_register_script('kode-filterable', KODE_PATH.'/framework/include/frontend_assets/default/js/filterable.js', false, '1.0', true);
		wp_enqueue_script('kode-filterable');
		
		wp_enqueue_style( 'style-component', KODE_PATH . '/framework/include/frontend_assets/dl-menu/component.css' );  //Font Awesome
		wp_register_script('kode-modernizr', KODE_PATH.'/framework/include/frontend_assets/dl-menu/modernizr.custom.js', false, '1.0', true);
		wp_enqueue_script('kode-modernizr');
		wp_register_script('kode-dlmenu', KODE_PATH.'/framework/include/frontend_assets/dl-menu/jquery.dlmenu.js', false, '1.0', true);
		wp_enqueue_script('kode-dlmenu');
		
		
		
		if( is_page() && kode_match_page_builder($kode_content_raw, 'item', 'testimonial') ){
			wp_enqueue_style( 'kode-bxslider', KODE_PATH . '/framework/include/frontend_assets/bxslider/bxslider.css' );  //Font Awesome
			wp_register_script('kode-bxslider', KODE_PATH.'/framework/include/frontend_assets/bxslider/jquery.bxslider.min.js', false, '1.0', true);
			wp_enqueue_script('kode-bxslider');				
		}
		
		//Custom Script Loaded
		if( is_page() && kode_match_page_builder($kode_content_raw, 'item', 'slider', array('slider-type', 'flexslider')) ){
			wp_register_script('kode-flexslider', KODE_PATH.'/framework/include/frontend_assets/flexslider/jquery.flexslider.js', false, '1.0', true);
			wp_enqueue_script('kode-flexslider');
		}
		
		
		
		// flexslider
		if( is_search() || is_archive() || 
			( empty($theme_option['enable-flex-slider']) || $theme_option['enable-flex-slider'] != 'disable' ) ||
			( is_page() && kode_search_page_builder($kode_content_raw, 'item', 'blog') ) ||
			( is_page() && kode_search_page_builder($kode_content_raw, 'item', 'portfolio') ) ||
			( is_page() && kode_search_page_builder($kode_content_raw, 'item', 'post-slider') ) ||
			( is_page() && kode_search_page_builder($kode_content_raw, 'item', 'slider', array('slider-type', 'flexslider')) ) ||				
			( is_single() && strpos($kode_post_option, '"post_media_type":"slider"') ) ||
			( is_single() && strpos($kode_post_option, '"inside-thumbnail-type":"thumbnail-type"') && strpos($kode_post_option, '"thumbnail-type":"slider"') )
		){
			wp_enqueue_style( 'kode-bxslider', KODE_PATH . '/framework/include/frontend_assets/bxslider/bxslider.css' );  //Font Awesome
			wp_register_script('kode-bxslider', KODE_PATH.'/framework/include/frontend_assets/bxslider/jquery.bxslider.min.js', false, '1.0', true);
			wp_enqueue_script('kode-bxslider');			
		}
		
		if( is_page() && kode_match_page_builder($kode_content_raw, 'item', 'slider', array('slider-type', 'bxslider')) ){
			wp_enqueue_style('kode-bxslider', KODE_PATH . '/framework/include/frontend_assets/bxslider/bxslider.css' );  //Font Awesome
			wp_register_script('kode-bxslider', KODE_PATH.'/framework/include/frontend_assets/bxslider/jquery.bxslider.min.js', false, '1.0', true);
			wp_enqueue_script('kode-bxslider');		
		}
		
		wp_register_script('kode-prettyphoto', KODE_PATH.'/framework/include/frontend_assets/default/js/jquery.prettyphoto.js', false, '1.0', true);
		wp_enqueue_script('kode-prettyphoto');
		wp_register_script('kode-prettypp', KODE_PATH.'/framework/include/frontend_assets/default/js/kode_pp.js', false, '1.0', true);
		wp_enqueue_script('kode-prettypp');
		
		if( is_page() && kode_match_page_builder($kode_content_raw, 'wrapper', 'full-size-wrapper', array('type', 'video')) ){
			wp_register_script('kode-video', KODE_PATH.'/framework/include/frontend_assets/video_background/video.js', false, '1.0', true);
			wp_enqueue_script('kode-video');
			wp_register_script('kode-bigvideo', KODE_PATH.'/framework/include/frontend_assets/video_background/bigvideo.js', false, '1.0', true);
			wp_enqueue_script('kode-bigvideo');
		}
		
		wp_register_script('kode-easing', KODE_PATH.'/framework/include/frontend_assets/jquery.easing.js', false, '1.0', true);
		wp_enqueue_script('kode-easing');
		
		if(isset($theme_option['enable-nice-scroll'])){
			if($theme_option['enable-nice-scroll'] == 'enable'){
				wp_register_script('kode-nicescroll', KODE_PATH.'/framework/include/frontend_assets/default/js/jquery.nicescroll.min.js', false, '1.0', true);
				wp_enqueue_script('kode-nicescroll');
			}
		}
		
		
		wp_register_script('kode-functions', KODE_PATH.'/js/functions.js', false, '1.0', true);
		wp_enqueue_script('kode-functions');
		
	}
	
	// set the global variable based on the opened page, post, ...
	add_action('wp', 'kode_define_global_variable');
	if( !function_exists('kode_define_global_variable') ){
		function kode_define_global_variable(){
			global $post;		
			if( is_page() ){
				global $kode_content_raw,$kode_post_option;				
				$kode_content_raw = json_decode(kode_decode_stopbackslashes(get_post_meta(get_the_ID(), 'kode_content', true)), true);
				$kode_content_raw = (empty($kode_content_raw))? array(): $kode_content_raw;
				$kode_post_option = kode_decode_stopbackslashes(get_post_meta($post->ID, 'post-option', true));
			}else if( is_single() || (!empty($post)) ){
				global $kode_post_option;			
				$kode_post_option = kode_decode_stopbackslashes(get_post_meta($post->ID, 'post-option', true));
			}
			
			
		}
	}