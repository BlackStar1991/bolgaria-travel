<?php 
	/*	
	*	Kodeforest Framework File
	*	---------------------------------------------------------------------
	*	This file includes the functions to run the plugins - Theme Options
	*	---------------------------------------------------------------------
	*/

	define('AJAX_URL', admin_url('admin-ajax.php'));
	define('KODE_PATH', get_template_directory_uri());
	define('KODE_LOCAL_PATH', get_template_directory());
	
	if ( !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443 ) {
		define('KODE_HTTP', 'https://');
	}else{
		define('KODE_HTTP', 'http://');
	}
	
	//Data validation HTMl
	if( !function_exists('kode_esc_html') ){	
		function kode_esc_html ($html) {
			return esc_html($html);
		}
	}	
	
	//Data Validation
	if( !function_exists('kode_esc_html_excerpt') ){	
		function kode_esc_html_excerpt ($html) {
			return esc_html(strip_tags($html));
		}
	}
	//Get the Theme Options
	$theme_option = get_option(KODE_SMALL_TITLE . '_admin_option', array());
	
	//Define the content width - Clearing the ThemeCheck
	$theme_option['content-width'] = 960;
	
	//Default Variables
	$kode_gallery_id = 0;
	$kode_lightbox_id = 0;
	$kode_crop_video = false;
	$kode_excerpt_length = 55;
	$kode_excerpt_read_more = true;
	$kode_wrapper_id = 0;
	
	
	//Thumbnail sizes in array form
	$kode_thumbnail_size = array(
		'full-slider' => array('width'=>1600, 'height'=>900, 'crop'=>true),
		'post-thumbnail-size' => array('width'=>570, 'height'=>300, 'crop'=>true),
		'team-size' => array('width'=>350, 'height'=>350, 'crop'=>true),
		'small-grid-size' => array('width'=>360, 'height'=>300, 'crop'=>true),
		'post-slider-side' => array('width'=>770, 'height'=>330, 'crop'=>true),
		'blog-post' => array('width'=>1170, 'height'=>350, 'crop'=>true),

	);
	$kode_thumbnail_size = apply_filters('custom-thumbnail-size', $kode_thumbnail_size);
	// Create Sizes on the theme activation
	add_action( 'after_setup_theme', 'kode_define_thumbnail_size' );
	if( !function_exists('kode_define_thumbnail_size') ){
		function kode_define_thumbnail_size(){
			add_theme_support( 'post-thumbnails' );
		
			global $kode_thumbnail_size;		
			foreach($kode_thumbnail_size as $kode_size_slug => $kode_size){
				add_image_size($kode_size_slug, $kode_size['width'], $kode_size['height'], $kode_size['crop']);
			}
		}
	}
	
	// add the image size filter to ThemeOptions
	add_filter('image_size_names_choose', 'kode_define_custom_size_image');
	function kode_define_custom_size_image( $sizes ){	
		$additional_size = array();
		
		global $kode_thumbnail_size;
		foreach($kode_thumbnail_size as $kode_size_slug => $kode_size){
			$additional_size[$kode_size_slug] = $kode_size_slug;
		}
		
		return array_merge($sizes, $additional_size);
	}
	
	// Get All The Sizes
	function kode_get_thumbnail_list(){
		global $kode_thumbnail_size;
		
		$sizes = array();
		foreach( get_intermediate_image_sizes() as $size ){
			if(in_array( $size, array( 'thumbnail', 'medium', 'large' )) ){
				$sizes[$size] = $size . ' -- ' . get_option($size . '_size_w') . 'x' . get_option($size . '_size_h');
			}else if( !empty($kode_thumbnail_size[$size]) ){
				$sizes[$size] = $size . ' -- ' . $kode_thumbnail_size[$size]['width'] . 'x' . $kode_thumbnail_size[$size]['height'];
			}else{
			
			}
		}
		$sizes['full'] = __('full size (Real Images)', 'KodeForest');
		
		return $sizes;
	}	
	
	
	function newsletter_mailchimp(){
		global $theme_option;
		$email = $_POST['email'];				
		include_once( 'external/mailchimp/mailchimp.php' );
		$Mailchimp = new Mailchimp( $theme_option['mail-chimp-api'] );
		if(isset($MailChimp->errorCode) && $MailChimp->errorCode == 214) {
			echo json_encode(array('success'=>false, 'message'=>__('You have already subscribed to the list.')));
		}else{ 
			$Mailchimp_Lists = new Mailchimp_Lists( $Mailchimp );
			$subscriber = $Mailchimp_Lists->subscribe( $theme_option['mail-chimp-listid'], array( 'email' => htmlentities($email) ) );
			if ( ! empty( $subscriber['leid'] ) ) {
			   echo json_encode(array('success'=>false, 'message'=>__('Thank You For Your Subscription.')));
			}else{
				echo json_encode(array('fail'=>false, 'message'=>__('Please try again back later.')));
			}
		}

		die();
	}	
	
	function kode_ajax_newsletter_mailchimp(){

		wp_register_script('kode-news-ltr', KODE_PATH.'/js/newsletter.js', array('jquery') ); 
		wp_enqueue_script('kode-news-ltr');

		wp_localize_script( 'kode-news-ltr', 'ajax_login_object', array( 'loadingmessage' => __('Sending user info, please wait...','crunchpress')));

		// Enable the user with no privileges to run newsletter_mailchimp() in AJAX
		add_action( 'wp_ajax_nopriv_newsletter_mailchimp', 'newsletter_mailchimp' );
		add_action( 'wp_ajax_newsletter_mailchimp', 'newsletter_mailchimp' );
	}	
	
	// Execute the action only if the user isn't logged in
	add_action('init', 'kode_ajax_newsletter_mailchimp');		
	
	// create page builder
	include_once( 'kf_function_regist.php');	
	
	// Create Theme Options
	include_once( 'include/kf_pagebuilder.php');	
	include_once( 'include/kf_themeoption.php');
	include_once( 'include/kode_meta/kode-include-script.php');
	include_once( 'include/kode_meta/kode_google_fonts.php');
	include_once( 'external/import_export/kodeforest-importer.php');
	
	
	
	// Frontend Assets & functions
	include_once( 'include/kode_front_func/kf_function_utility.php');		
	include_once( 'include/kode_front_func/kode_loadstyle.php');

	//Events
	if(class_exists('EM_Events')){
		include_once( 'include/kode_front_func/kode-events-options.php');
	}
	//IgnitionDeck
	if(class_exists('Deck')){
		include_once( 'include/kode_front_func/kode-igni-options.php');
	}
	// create page options
	include_once( 'include/kode_front_func/kode-post-options.php');
	
	//Frontend
	include_once( 'include/kode_front_func/elements/kf_media_center.php');
	include_once( 'include/kode_front_func/elements/kode_page_elements.php');
	include_once( 'include/kode_front_func/elements/kf_blogging.php');		
	
	// page builder template
	include_once('include/kode_meta/kf_themeoptions_html.php');	
	include_once('include/kode_meta/kf_theme_meta.php');
	
	include_once('include/kode_meta/kf_pagebuilder_backend.php');	
	include_once('include/kode_meta/kf_pagebuilder_meta.php');	
	include_once('include/kode_meta/kf_pagebuilder_scripts.php');	
?>