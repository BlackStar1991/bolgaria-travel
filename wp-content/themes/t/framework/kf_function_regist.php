<?php 
	/*	
	*	Kodeforest Framework Register
	*	---------------------------------------------------------------------
	*	This file includes the function to upload values on activation
	*	---------------------------------------------------------------------
	*/

	//Custom background Support	
	$args = array(
		'color-scheme'          => '',
		'default-image'          => '',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => ''
	);

	//Custom Header Support	
	$defaults = array(
		'default-image'          => '',
		'random-default'         => false,
		'width'                  => 950,
		'height'                 => 200,
		'flex-height'            => false,
		'flex-width'             => false,
		'default-text-color'     => '',
		'header-text'            => true,
		'uploads'                => true,
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);
	global $wp_version;
	if ( version_compare( $wp_version, '3.4', '>=' ) ){ 
		add_theme_support( 'custom-background', $args );
		add_theme_support( 'custom-header', $defaults );
	}

	if (function_exists('register_sidebar')){	
		// default sidebar array
		$sidebar_attr = array(
			'name' => '',
			'description' => '',
			'before_widget' => '<div class="widget sidebar-recent-post sidebar_section %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>'
		);
		$item_class = 'col-md-4';
		if(isset($theme_option['footer-layout']) && $theme_option['footer-layout'] == 1){$item_class = 'col-md-3';}
		$kode_sidebar = array("Footer");
		foreach( $kode_sidebar as $sidebar_name ){
			$sidebar_attr['name'] = $sidebar_name;
			$sidebar_slug = strtolower(str_replace(' ','-',$sidebar_name));
			$sidebar_attr['id'] = 'sidebar-' . $sidebar_slug ;
			$sidebar_attr['before_widget'] = '<div id="%1$s" class="'.esc_attr($item_class).' widget %2$s kode-widget">' ;
			$sidebar_attr['after_widget'] = '</div>' ;
			$sidebar_attr['before_title'] = '<h3 class="widget-title">';
			$sidebar_attr['after_title'] = '</h3><div class="clear"></div>' ;
			$sidebar_attr['description'] = 'Please place widget here' ;
			register_sidebar($sidebar_attr);
		}
		
		if(!empty($theme_option['sidebar-element'])){
			$sidebar_id = 0;
			foreach( $theme_option['sidebar-element'] as $sidebar_name ){
				$sidebar_attr['name'] = $sidebar_name;
				$sidebar_attr['id'] = 'custom-sidebar' . $sidebar_id++ ;
				$sidebar_attr['before_widget'] = '<div id="%1$s" class="'.esc_attr($item_class).' widget %2$s kode-widget">' ;
				$sidebar_attr['after_widget'] = '</div>' ;
				$sidebar_attr['before_title'] = '<h3 class="widget-title">';
				$sidebar_attr['after_title'] = '</h3><div class="clear"></div>' ;
				register_sidebar($sidebar_attr);
			}		
		}
	}
	
	// video size 
	if( !function_exists('kode_get_video_size') ){
		function kode_get_video_size( $size ){
			global $_wp_additional_image_sizes, $theme_option, $kode_crop_video;

			// get video ratio
			if( !empty($theme_option['video-ratio']) && 
				preg_match('#^(\d+)[\/:](\d+)$#', $theme_option['video-ratio'], $number)){
				$ratio = $number[1]/$number[2];
			}else{
				$ratio = 16/9;
			}
			
			// get video size
			$video_size = array('width'=>620, 'height'=>9999);
			if( !empty($size) && is_numeric($size) ){
				$video_size['width'] = intval($size);
			}else if( !empty($size) && !empty($_wp_additional_image_sizes[$size]) ){
				$video_size = $_wp_additional_image_sizes[$size];
			}else if( !empty($size) && in_array($size, get_intermediate_image_sizes()) ){
				$video_size = array('width'=>get_option($size . '_size_w'), 'height'=>get_option($size . '_size_h'));
			}

			// refine video size
			if( $kode_crop_video || $video_size['height'] == 9999 ){
				return array('width'=>$video_size['width'], 'height'=>intval($video_size['width'] / $ratio));
			}else if( $video_size['width'] == 9999 ){
				return array('width'=>intval($video_size['height'] * $ratio), 'height'=>$video_size['height']);
			}
			return $video_size;
		}	
	}	
	

	// modify a wordpress gallery style
	add_filter('gallery_style', 'kode_gallery_style');
	if( !function_exists('kode_gallery_style') ){
		function kode_gallery_style( $style ){
			return str_replace('border: 2px solid #cfcfcf;', 'border-width: 1px; border-style: solid;', $style);
		}
	}
	
	// turn the page comment off by default
	add_filter( 'wp_insert_post_data', 'page_default_comments_off' );
	if( !function_exists('page_default_comments_off') ){
		function page_default_comments_off( $data ) {
			if( $data['post_type'] == 'page' && $data['post_status'] == 'auto-draft' ) {
				$data['comment_status'] = 0;
			} 

			return $data;
		}
	}	
	
	// add script and style to header area
	add_action( 'wp_head', 'kode_head_script' );
	if( !function_exists('kode_head_script') ){
		function kode_head_script() {	
			global $theme_option;
			
			if( !empty($theme_option['favicon-id']) ){
				if( is_numeric($theme_option['favicon-id']) ){ 
					$favicon = wp_get_attachment_image_src($theme_option['favicon-id'], 'full');
					$theme_option['favicon-id'] = esc_url($favicon[0]);
				}
				echo '<link rel="shortcut icon" href="' . esc_url($theme_option['favicon-id']) . '" type="image/x-icon" />';
			} ?>
			<!-- load the script for older ie version -->
			<!--[if lt IE 9]>
			<script src="<?php echo KODE_PATH . '/js/html5.js'; ?>" type="text/javascript"></script>			
			<![endif]-->
<?php			
		}
	}
	
	// include the shortcode support for the text widget
	add_filter('widget_text', 'do_shortcode');
	add_filter('widget_title', 'do_shortcode');

	// add support to post and comment RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// set up the content width based on the theme's design
	if ( !isset($content_width) ) $content_width = $theme_option['content-width'];	

	// rewrite permalink rule upon theme activation
	add_action( 'after_switch_theme', 'kode_flush_rewrite_rules' );
	if( !function_exists('kode_flush_rewrite_rules') ){
		function kode_flush_rewrite_rules() {
			global $pagenow, $wp_rewrite;
			if ( 'themes.php' == $pagenow && isset( $_GET['activated'] ) ){
				$wp_rewrite->flush_rules();
			}
		}
	}
	
	// add tinymce editor style
	add_action( 'init', 'my_theme_add_editor_styles' );
	if( !function_exists('my_theme_add_editor_styles') ){
		function my_theme_add_editor_styles() {
			add_editor_style('/stylesheet/editor-style.css');
		}
	}
	
	
	
	// action to require the necessary wordpress function
 	add_action( 'after_setup_theme', 'kode_theme_setup' );
	if( !function_exists('kode_theme_setup') ){
		function kode_theme_setup(){
			
			// for translating the theme
			load_theme_textdomain( 'KodeForest', KODE_LOCAL_PATH . '/languages/' );
			
			// register main navigation menu 
			register_nav_menus( array(
				'main_menu'=> __( 'Main Navigation Menu', 'KodeForest' ),
				'footer_menu'=> __( 'Footer Navigation Menu', 'KodeForest' ),
			));

			// adds RSS feed links to <head> for posts and comments.			
			add_theme_support( 'automatic-feed-links' );
			
			//title tags
			add_theme_support( 'title-tag' );
			
			// This theme supports a variety of post formats.
			add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio' ) );			
		}
	}
	
		add_filter('get_the_excerpt', 'kode_strip_excerpt_link');	
	if( !function_exists('kode_strip_excerpt_link') ){
		function kode_strip_excerpt_link( $excerpt ) {
			return preg_replace('#^https?://\S+#', '', $excerpt);
		}
	}	
	if( !function_exists('kode_set_excerpt_length') ){
		function kode_set_excerpt_length( $length ){
			global $kode_excerpt_length; return $kode_excerpt_length ;
		}
	}	

?>
