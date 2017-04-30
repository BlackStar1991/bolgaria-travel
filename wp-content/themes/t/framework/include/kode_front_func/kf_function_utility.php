<?php
	/*	
	*	Kodeforest Framework File
	*	---------------------------------------------------------------------
	*	This file contains utility function in the theme
	*	---------------------------------------------------------------------
	*/
	
	// page builder content/text filer to execute the shortcode	
	if( !function_exists('kode_content_filter') ){
		add_filter( 'kode_the_content', 'wptexturize'        ); add_filter( 'kode_the_content', 'convert_smilies'    );
		add_filter( 'kode_the_content', 'convert_chars'      ); add_filter( 'kode_the_content', 'wpautop'            );
		add_filter( 'kode_the_content', 'shortcode_unautop'  ); add_filter( 'kode_the_content', 'prepend_attachment' );	
		add_filter( 'kode_the_content', 'do_shortcode'       );
		function kode_content_filter( $content, $main_content = false ){
			if($main_content) return str_replace( ']]>', ']]&gt;', apply_filters('the_content', $content) );
			return apply_filters('kode_the_content', $content);
		}		
	}
	if( !function_exists('kode_text_filter') ){
		add_filter( 'kode_text_filter', 'do_shortcode' );
		function kode_text_filter( $text ){
			return apply_filters('kode_text_filter', $text);
		}
	}	
	
	// filter shortcode out if the plugin is not activated
	if( !function_exists('kode_enable_shortcode_filter') ){
		add_filter( 'widget_text', 'kode_enable_shortcode_filter' );
		add_filter( 'the_content', 'kode_enable_shortcode_filter' ); 
		add_filter( 'kode_text_filter', 'kode_enable_shortcode_filter' ); 	
		add_filter( 'kode_the_content', 'kode_enable_shortcode_filter' ); 	
		function kode_enable_shortcode_filter( $text ){
			if( !function_exists('kode_add_tinymce_button') ){
				$text = preg_replace('#\[kode_[^\]]+]#', '', $text);
				$text = preg_replace('#\[/kode_[^\]]+]#', '', $text);
			}
			return $text;
		}
	}	
			
	// use for generating the option from admin panel
	if( !function_exists('kode_check_option_data_type') ){
		function kode_check_option_data_type( $value, $data_type = 'color' ){
			if( $data_type == 'color' ){
				return (strpos($value, '#') === false)? '#' . $value: $value; 
			}else if( $data_type == 'text' ){
				return $value;
			}else if( $data_type == 'pixel' ){
				return (is_numeric($value))? $value . 'px': $value;
			}else if( $data_type == 'upload' ){
				if(is_numeric($value)){
					$image_src = wp_get_attachment_image_src($value, 'full');	
					return (!empty($image_src))? $image_src[0]: false;
				}else{
					return $value;
				}
			}else if( $data_type == 'font'){
				if( strpos($value, ',') === false ){
					return '"' . $value . '"';
				}
				return $value;
			}else if( $data_type == 'percent' ){
				return (is_numeric($value))? $value . '%': $value;
			}
		
		}
	}	
	
	// use for layouting the sidebar size
	if( !function_exists('kode_get_sidebar_class') ){
		function kode_get_sidebar_class( $sidebar = array() ){
			global $theme_option;
			$theme_option['both-sidebar-size'] = 3;
			$theme_option['sidebar-size'] = 4;
			if( $sidebar['type'] == 'no-sidebar' ){
				return array_merge($sidebar, array('right'=>'', 'outer'=>'col-md-12', 'left'=>'col-md-12', 'center'=>'col-md-12'));
			}else if( $sidebar['type'] == 'both-sidebar' ){
				if( $theme_option['both-sidebar-size'] == 3 ){
					return array_merge($sidebar, array('right'=>'col-md-3', 'outer'=>'col-md-6', 'left'=>'col-md-3', 'center'=>'col-md-6'));
				}else if( $theme_option['both-sidebar-size'] == 4 ){
					return array_merge($sidebar, array('right'=>'col-md-4', 'outer'=>'col-md-4', 'left'=>'col-md-4', 'center'=>'col-md-4'));
				}
			}else{ 
			
				// determine the left/right sidebar size
				$size = ''; $center = '';
				switch ($theme_option['sidebar-size']){
					case 1: $size = 'col-md-1'; $center = 'col-md-11'; break;
					case 2: $size = 'col-md-2'; $center = 'col-md-10'; break;
					case 3: $size = 'col-md-3'; $center = 'col-md-9'; break;
					case 4: $size = 'col-md-4'; $center = 'col-md-8'; break;
					case 5: $size = 'col-md-5'; $center = 'col-md-7'; break;
					case 6: $size = 'col-md-6'; $center = 'col-md-6'; break;
				}

				if( $sidebar['type'] == 'left-sidebar'){
					$sidebar['outer'] = 'col-md-8';
					$sidebar['left'] = $size;
					$sidebar['center'] = $center;
					return $sidebar;
				}else if( $sidebar['type'] == 'right-sidebar'){
					$sidebar['outer'] = $center;
					$sidebar['right'] = $size;
					$sidebar['center'] = 'col-md-8';
					return $sidebar;			
				}else{
					$sidebar['left'] = 'col-md-12';
					$sidebar['outer'] = 'col-md-12';
					$sidebar['center'] = 'col-md-12';
					return $sidebar;
				}
			}
		}
	}

	// retrieve all posts as a list
	if( !function_exists('kode_get_post_list') ){	
		function kode_get_post_list( $post_type ){
			$post_list = get_posts(array('post_type' => $post_type, 'numberposts'=>1000));

			$ret = array();
			if( !empty($post_list) ){
				foreach( $post_list as $post ){
					$ret[$post->post_name] = $post->post_title;
				}
			}
				
			return $ret;
		}	
	}	
	
	// retrieve all categories from each post type
	if( !function_exists('kode_get_term_list') ){	
		function kode_get_term_list( $taxonomy, $parent='' ){
			$term_list = get_categories( array('taxonomy'=>$taxonomy, 'hide_empty'=>0, 'parent'=>$parent) );

			$ret = array();
			if( !empty($term_list) && empty($term_list['errors']) ){
				foreach( $term_list as $term ){
					if(isset($term->slug)){
						$ret[$term->slug] = $term->name;
					}
				}
			}
				
			return $ret;
		}	
	}
	
	if( !function_exists('kode_get_term_id') ){	
		function kode_get_term_id( $taxonomy, $parent='' ){
			$term_list = get_categories( array('taxonomy'=>$taxonomy, 'hide_empty'=>0, 'parent'=>$parent) );

			$ret = array();
			if( !empty($term_list) && empty($term_list['errors']) ){
				foreach( $term_list as $term ){
					$ret[$term->id] = $term->term_id;
				}
			}
				
			return $ret;
		}	
	}
	
	if( !function_exists('kode_get_sidebar_list') ){	
		function kode_get_sidebar_list(  ){
			$term_list = get_categories( array('taxonomy'=>$taxonomy, 'hide_empty'=>0, 'parent'=>$parent) );

			$ret = array();
			if( !empty($term_list) && empty($term_list['errors']) ){
				foreach( $term_list as $term ){
					$ret[$term->slug] = $term->name;
				}
			}
				
			return $ret;
		}	
	}
	
	// string to css class name
	if( !function_exists('kode_string_to_class') ){	
		function kode_string_to_class($string){
			$class = preg_replace('#[^\w\s]#','',strtolower(strip_tags($string)));
			$class = preg_replace('#\s+#', '-', trim($class));
			return 'kode-skin-' . $class;
		}
	}
	
	// calculate the size as a number ex "1/2" = 0.5
	if( !function_exists('kode_item_size_to_num') ){	
		function kode_item_size_to_num( $size ){
			if( preg_match('/^(\d+)\/(\d+)$/', $size, $size_array) )
			return $size_array[1] / $size_array[2];
			return 1;
		}	
	}		

	// create pagination link
	if( !function_exists('kode_get_pagination') ){	
		function kode_get_pagination($max_num_page, $current_page, $format = 'paged'){
			if( $max_num_page <= 1 ) return '';
		
			$big = 999999999; // need an unlikely integer
			return 	'<div class="kode-pagination">' . paginate_links(array(
				'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
				'format' => '?' . $format . '=%#%',
				'current' => max(1, $current_page),
				'total' => $max_num_page,
				'prev_text'=> __('&lsaquo; Previous', 'KodeForest'),
				'next_text'=> __('Next &rsaquo;', 'KodeForest')
			)) . '</div>';
		}	
	}		
	
	if( !function_exists('kode_get_breadcumbs') ){	
		function kode_get_breadcumbs () {
			 
			// Settings
			$separator  = '&gt;';
			$id         = 'breadcrumbs';
			$class      = 'breadcrumbs';
			$home_title = __('Главная ','kodeforest');
			 $parents = '';
			// Get the query & post information
			global $post,$wp_query;
			$category = get_the_category();
			echo '<div class="breadcrumb">';
            //echo '<span><i class="fa fa-home"></i> '.__('You are here:','kodeforest').'</span>';
               
			// Build the breadcrums
			echo '<ul id="' . esc_attr($id) . '" class="' . esc_attr($class) . '">';
			 
			// Do not display on the homepage
			if ( !is_front_page() ) {
				 
				// Home page
				echo '<li class="item-home"><a class="bread-link bread-home" href="' . esc_url(get_home_url()) . '" title="' . esc_attr($home_title) . '">' . esc_attr($home_title) . '</a></li>';
				//echo '<li class="separator separator-home"> ' . $separator . ' </li>';
				 
				if ( is_single() ) {
					 $post_type = get_post_type_object(get_post_type());
					$cat = array();
					//print_r($post_type->name);
					if($post_type->name == 'post'){
						// Single post (Only display the first category)
						echo '<li class="item-cat item-cat-' . esc_attr($category[0]->term_id) . ' item-cat-' . esc_attr($category[0]->category_nicename) . '"><a class="bread-cat bread-cat-' . esc_attr($category[0]->term_id) . ' bread-cat-' . esc_attr($category[0]->category_nicename) . '" href="' . esc_url(get_category_link($category[0]->term_id )) . '" title="' . esc_attr($category[0]->cat_name) . '">' . esc_attr($category[0]->cat_name) . '</a></li>';
						//echo '<li class="separator separator-' . $category[0]->term_id . '"> ' . $separator . ' </li>';
						echo '<li class="item-current item-' . esc_attr($post->ID) . '"><strong class="bread-current bread-' . esc_attr($post->ID) . '" title="' . esc_attr(get_the_title()) . '">' . esc_attr(get_the_title()) . '</strong></li>';
						 
					}else{
						$post_type = get_post_type_object(get_post_type());
						$slug = $post_type->rewrite;
						
						echo '<li><a href="'.esc_url(get_permalink()).'">'.esc_attr(substr(get_the_title(),0,15)).'</a></li>';
					}
					
				} else if ( is_category() ) {
					 
					// Category page
					echo '<li class="item-current item-cat-' . esc_attr($category[0]->term_id) . ' item-cat-' . esc_attr($category[0]->category_nicename) . '"><strong class="bread-current bread-cat-' . esc_attr($category[0]->term_id) . ' bread-cat-' . esc_attr($category[0]->category_nicename) . '">' . esc_attr($category[0]->cat_name) . '</strong></li>';
					 
				} else if ( is_page() ) {
					 
					// Standard page
					if( $post->post_parent ){
						 
						// If child page, get parents 
						$anc = get_post_ancestors( $post->ID );
						 
						// Get parents in the right order
						$anc = array_reverse($anc);
						 
						// Parent page loop
						foreach ( $anc as $ancestor ) {
							$parents .= '<li class="item-parent item-parent-' . esc_attr($ancestor) . '"><a class="bread-parent bread-parent-' . esc_attr($ancestor) . '" href="' . esc_url(get_permalink($ancestor)) . '" title="' . esc_attr(get_the_title($ancestor)) . '">' . esc_attr(get_the_title($ancestor)) . '</a></li>';
							//$parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
						}
						 
						// Display parent pages
						echo $parents;
						 
						// Current page
						echo '<li class="item-current item-' . esc_attr($post->ID) . '"><strong title="' . esc_attr(get_the_title()) . '"> ' . esc_attr(get_the_title()) . '</strong></li>';
						 
					} else {
						 
						// Just display current page if not parents
						echo '<li class="item-current item-' . esc_attr($post->ID) . '"><strong class="bread-current bread-' . esc_attr($post->ID) . '"> ' . esc_attr(get_the_title()) . '</strong></li>';
						 
					}
					 
				} else if ( is_tag() ) {
					 
					// Tag page
					 
					// Get tag information
					$term_id = get_query_var('tag_id');
					$taxonomy = 'post_tag';
					$args ='include=' . $term_id;
					$terms = get_terms( $taxonomy, $args );
					 
					// Display the tag name
					echo '<li class="item-current item-tag-' . esc_attr($terms[0]->term_id) . ' item-tag-' . esc_attr($terms[0]->slug) . '"><strong class="bread-current bread-tag-' . esc_attr($terms[0]->term_id) . ' bread-tag-' . esc_attr($terms[0]->slug) . '">' . esc_attr($terms[0]->name) . '</strong></li>';
				 
				} elseif ( is_day() ) {
					 
					// Day archive
					 
					// Year link
					echo '<li class="item-year item-year-' . esc_attr(get_the_time('Y')) . '"><a class="bread-year bread-year-' . esc_attr(get_the_time('Y')) . '" href="' . esc_attr(get_year_link( get_the_time('Y') )) . '" title="' . esc_attr(get_the_time('Y')) . '">' . esc_attr(get_the_time('Y')) . ' Archives</a></li>';
					//echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
					 
					// Month link
					echo '<li class="item-month item-month-' . esc_attr(get_the_time('m')) . '"><a class="bread-month bread-month-' . esc_attr(get_the_time('m')) . '" href="' . esc_url(get_month_link( get_the_time('Y'), get_the_time('m') )) . '" title="' . esc_attr(get_the_time('M')) . '">' . esc_attr(get_the_time('M')) . ' Archives</a></li>';
					//echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
					 
					// Day display
					echo '<li class="item-current item-' . esc_attr(get_the_time('j')) . '"><strong class="bread-current bread-' . esc_attr(get_the_time('j')) . '"> ' . esc_attr(get_the_time('jS')) . ' ' . esc_attr(get_the_time('M')) . ' Archives</strong></li>';
					 
				} else if ( is_month() ) {
					 
					// Month Archive
					 
					// Year link
					echo '<li class="item-year item-year-' . esc_attr(get_the_time('Y')) . '"><a class="bread-year bread-year-' . esc_attr(get_the_time('Y')) . '" href="' . esc_url(get_year_link( get_the_time('Y') )) . '" title="' . esc_attr(get_the_time('Y')) . '">' . esc_attr(get_the_time('Y')) . ' Archives</a></li>';
					//echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
					 
					// Month display
					echo '<li class="item-month item-month-' . esc_attr(get_the_time('m')) . '"><strong class="bread-month bread-month-' . esc_attr(get_the_time('m')) . '" title="' . esc_attr(get_the_time('M')) . '">' . esc_attr(get_the_time('M')) . ' Archives</strong></li>';
					 
				} else if ( is_year() ) {
					 
					// Display year archive
					echo '<li class="item-current item-current-' . esc_attr(get_the_time('Y')) . '"><strong class="bread-current bread-current-' . esc_attr(get_the_time('Y')) . '" title="' . esc_attr(get_the_time('Y')) . '">' . esc_attr(get_the_time('Y')) . ' Archives</strong></li>';
					 
				} else if ( is_author() ) {
					 
					// Auhor archive
					 
					// Get the author information
					global $author;
					$userdata = get_userdata( $author );
					 
					// Display author name
					echo '<li class="item-current item-current-' . esc_attr($userdata->user_nicename) . '"><strong class="bread-current bread-current-' . esc_attr($userdata->user_nicename) . '" title="' . esc_attr($userdata->display_name) . '">' . 'Author: ' . esc_attr($userdata->display_name) . '</strong></li>';
				 
				} else if ( get_query_var('paged') ) {
					 
					// Paginated archives
					echo '<li class="item-current item-current-' . esc_attr(get_query_var('paged')) . '"><strong class="bread-current bread-current-' . esc_attr(get_query_var('paged')) . '" title="Page ' . esc_attr(get_query_var('paged')) . '">'.esc_attr__('Page','kodeforest') . ' ' . esc_attr(get_query_var('paged')) . '</strong></li>';
					 
				} else if ( is_search() ) {
				 
					// Search results page
					echo '<li class="item-current item-current-' . esc_attr(get_search_query()) . '"><strong class="bread-current bread-current-' . esc_attr(get_search_query()) . '" title="Результаты поиска:' . esc_attr(get_search_query()) . '">Результаты поиска: ' . esc_attr(get_search_query()) . '</strong></li>';
				 
				} elseif ( is_404() ) {
					 
					// 404 page
					echo '<li>' . 'Ошибка 404' . '</li>';
				}
				 
			}
			 
			echo '</ul></div>';
			 
		}
	}
	
	//Event Booking Button
	if( !function_exists('kode_event_booking') ){	
		function kode_event_booking($event){
			$notice_full = get_option('dbem_booking_button_msg_full');
			$button_text = get_option('dbem_booking_button_msg_book');
			$button_already_booked = get_option('dbem_booking_button_msg_already_booked');
			$button_booking = get_option('dbem_booking_button_msg_booking');
			$button_success = get_option('dbem_booking_button_msg_booked');
			$button_fail = get_option('dbem_booking_button_msg_error');
			$button_cancel = get_option('dbem_booking_button_msg_cancel');
			$button_canceling = get_option('dbem_booking_button_msg_canceling');
			$button_cancel_success = get_option('dbem_booking_button_msg_cancelled');
			$button_cancel_fail = get_option('dbem_booking_button_msg_cancel_error');

			if( is_user_logged_in() ){ //only show this to logged in users
				ob_start();
				$EM_Booking = $event->get_bookings()->has_booking();
				if( is_object($EM_Booking) && $EM_Booking->booking_status != 3 && get_option('dbem_bookings_user_cancellation') ){
					?><a id="em-cancel-button_<?php echo $EM_Booking->booking_id; ?>_<?php echo wp_create_nonce('booking_cancel'); ?>" class="button em-cancel-button" href="#"><?php echo $button_cancel; ?></a><?php
				}elseif( $event->get_bookings()->is_open() ){
					if( !is_object($EM_Booking) ){
						?><a id="em-booking-button_<?php echo $event->event_id; ?>_<?php echo wp_create_nonce('booking_add_one'); ?>" class="button em-booking-button" href="#"><?php echo $button_text; ?></a><?php 
					}else{
						?><span class="em-booked-button"><?php echo $button_already_booked ?></span><?php
					}
				}elseif( $event->get_bookings()->get_available_spaces() <= 0 ){
					?><span class="em-full-button"><?php echo $notice_full ?></span><?php
				}
				return apply_filters( 'em_booking_button', ob_get_clean(), $event );
			}else{
			return "<span class='em-full-button'>".__("Please Sign in","kodeforest")."</span>";
			} 
		}	
	}
	
	// Match the values
	if( !function_exists('kode_match_page_builder') ){
		function kode_match_page_builder($array, $item_type, $type, $data = array()){
			if(isset($array)){
				foreach($array as $item){
					if($item['item-type'] == $item_type && $item['type'] == $type){
						if(empty($data)){
							return true;
						}else{	
							if( strpos($item['option'][$data[0]], $data[1]) !== false ) return true;
						}
					}
					if($item['item-type'] == 'wrapper'){
						if( kode_match_page_builder($item['items'], $item_type, $type) ) return true;
					}
				}
			}
			return false;
		}
	}	
	
	
	//Strip Down slashes
	if( !function_exists('kode_stripslashes') ){
		function kode_stripslashes($data){
			$data = is_array($data) ? array_map('stripslashes_deep', $data) : stripslashes($data);
			return $data;
		}
	}
	//Stop backslashes from Array
	if( !function_exists('kode_stopbackslashes') ){
		function kode_stopbackslashes($data){
			$data = str_replace('\\\\\\\\\\\\\"', '|bb6|', $data);
			$data = str_replace('\\\\\\\\\\\"', '|bb5|', $data);
			$data = str_replace('\\\\\\\\\"', '|bb4|', $data);
			$data = str_replace('\\\\\\\"', '|bb3|', $data);
			$data = str_replace('\\\\\"', '|bb2|', $data);
			$data = str_replace('\\\"', '|bb"|', $data);
			$data = str_replace('\\\\\\t', '|p2k|', $data);
			$data = str_replace('\\\\t', '|p1k|', $data);			
			$data = str_replace('\\\\\\n', '|p2k|', $data);
			$data = str_replace('\\\\n', '|p1k|', $data);
			return $data;
		}
	}
	//decode and Stop back slashes
	if( !function_exists('kode_decode_stopbackslashes') ){
		function kode_decode_stopbackslashes($data){
			$data = str_replace('|bb6|', '\\\\\\"', $data);
			$data = str_replace('|bb5|', '\\\\\"', $data);
			$data = str_replace('|bb4|', '\\\\"', $data);
			$data = str_replace('|bb3|', '\\\"', $data);
			$data = str_replace('|bb2|', '\\"', $data);
			$data = str_replace('|bb"|', '\"', $data);
			$data = str_replace('|p2k|', '\\\t', $data);
			$data = str_replace('|p1k|', '\t', $data);			
			$data = str_replace('|p2k|', '\\\n', $data);
			$data = str_replace('|p1k|', '\n', $data);
			return $data;
		}
	}	
	
	
	function kode_ajax_login(){

		// First check the nonce, if it fails the function will break
		check_ajax_referer( 'ajax-login-nonce', 'security' );

		// Nonce is checked, get the POST data and sign user on
		$info = array();
		$info['user_login'] = $_POST['username'];
		$info['user_password'] = $_POST['password'];
		$info['remember'] = true;

		$user_signon = wp_signon( $info, false );
		if ( is_wp_error($user_signon) ){
			echo json_encode(array('loggedin'=>false, 'message'=>esc_attr__('Wrong username or password.')));
		} else {
			echo json_encode(array('loggedin'=>true, 'message'=>esc_attr__('Login successful, Now Redirecting...')));
		}

		die();
	}	
	
	function kode_ajax_login_init(){

		wp_register_script('ajax-login-script', KODE_PATH.'/js/ajax-login-script.js', array('jquery') ); 
		wp_enqueue_script('ajax-login-script');

		wp_localize_script( 'ajax-login-script', 'ajax_login_object', array( 
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'redirecturl' => home_url(),
			'loadingmessage' => __('Sending user info, please wait...','kodeforest')
		));

		// Enable the user with no privileges to run ajax_login() in AJAX
		add_action( 'wp_ajax_nopriv_ajaxlogin', 'kode_ajax_login' );
	}	
	
	// Execute the action only if the user isn't logged in
	if (!is_user_logged_in()) {
		add_action('init', 'kode_ajax_login_init');		
	}
	
	function kode_signin_form(){ ?>
		
		<a data-target="#Modalbox" data-toggle="modal" href="#"><?php esc_attr_e('Login','kodeforest');?></a>
		<!-- Modal -->
		<div aria-hidden="true" role="dialog" tabindex="-1" id="Modalbox" class="modal fade kd-loginbox">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
						<a aria-label="Close" data-dismiss="modal" class="close" href="#"><span aria-hidden="true">×</span></a>
						<?php if (is_user_logged_in()) {
							global $current_user;?>
							<div class="kd-login-title">
								<h2><?php esc_attr_e('You Are Already Signed In','kodeforest');?></h2>
								<span><?php esc_attr_e('AS ','kodeforest');?><?php echo esc_attr($current_user->display_name);?></span>
								<div class="kd-login-network">
									<ul>
										<li><a data-original-title="Facebook" href="<?php echo esc_url(wp_logout_url( home_url() )); ?>"><i class="fa fa-user"></i> <?php esc_attr_e('Logout','kodeforest');?></a></li>
									</ul>
								</div>
							</div>
						<?php }else{ ?>
						<div class="kd-login-title">
							<h2><?php esc_attr_e('LOGIN TO','kodeforest');?></h2>
							<span><?php esc_attr_e('Your Account','kodeforest');?></span>
							<div class="kd-login-network">
								<ul>
									<li><a data-original-title="Facebook" href="#"><i class="fa fa-facebook"></i><?php esc_attr_e('Login with Facebook','kodeforest');?> </a></li>
									<li><a data-original-title="Twitter" href="#"><i class="fa fa-twitter"></i><?php esc_attr_e(' Login with Twitter','kodeforest');?></a></li>
								</ul>
							</div>
						</div>
						<div class="kd-login-sepratore"><span>OR</span></div>
						<form id="login" action="login" method="post">
							<p><i class="fa fa-envelope-o"></i> <input id="username" name="username" type="text" placeholder="Username"></p>
							<p><i class="fa fa-lock"></i> <input id="password" name="password" type="password" placeholder="Your Password"></p>
							<p><input type="submit" class="thbg-color" value="Login now"> <a href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_attr_e('Forget Password?','kodeforest');?></a></p>
							<p class="status"></p>
							<?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
						</form>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
	
	
	
	function kode_ajax_signup(){
		
		// First check the nonce, if it fails the function will break
		//check_ajax_referer( 'ajax-signup-nonce', 'security' );

		// Nonce is checked, get the POST data and sign user on
		foreach ($_REQUEST as $keys=>$values) {
			$$keys = $values;
		}
		$default_role = get_option('default_role');
		//$info = array();
		$nickname = $_POST['nickname'];
		//$first_name = $_POST['first_name'];
		//$last_name = $_POST['last_name'];
		$user_email = $_POST['user_email'];
		$user_pass = $_POST['user_pass'];
		$captcha_code = $_POST['captcha_code'];
		$ajax_captcha = $_POST['ajax_captcha'];
		

		$userdata = array(
			'user_login'    => $nickname,
			//'first_name'  => $first_name,
			//'last_name'  => $last_name,
			'user_email'  => $user_email,
			'user_pass'  => $user_pass,
			'role' => $default_role
		);
		$user_signup = wp_insert_user( $userdata );
		$exists = email_exists($user_email);
		if ( !$exists ){
			if(strtolower($captcha_code) == strtolower($ajax_captcha)){
				if ( is_wp_error($user_signup) ){
					echo json_encode(array('signup'=>false, 'message'=>esc_attr__('Please verify the details you are providing.','kodeforest')));
				} else {
					echo json_encode(array('signup'=>true, 'message'=>esc_attr__('Your request submitted successfully, Redirecting you to login page!','kodeforest')));
				}
			}else{
				echo json_encode(array('signup'=>false, 'message'=>esc_attr__('Notice: Invalid Captcha','kodeforest')));
			}
			//echo $exists;
		}else{
			echo json_encode(array('signup'=>false, 'message'=>'Notice: Email already exists!'.$exists.''));
			//echo $exists;
		}

		die();
	}	
	
	function kode_ajax_signup_init(){

		wp_register_script('ajax-signup-script', KODE_PATH.'/js/ajax-signup-script.js', array('jquery') ); 
		wp_enqueue_script('ajax-signup-script');

		wp_localize_script( 'ajax-signup-script', 'ajax_signup_object', array( 
			'ajaxurl' => esc_url(admin_url( 'admin-ajax.php' )),
			'redirecturl' => esc_url(home_url()),
			'loadingmessage' => esc_attr__('Sending user info, please wait...','kodeforest')
		));
		
		// Enable the user with no privileges to run ajax_login() in AJAX
		add_action('wp_ajax_ajaxsignup', 'kode_ajax_signup');
		add_action('wp_ajax_nopriv_ajaxsignup', 'kode_ajax_signup' );
	}
	
	add_action('init', 'kode_ajax_signup_init');	
	
	
	function kode_signup_form(){ ?>
		<a data-target="#registerModalbox" data-toggle="modal" href="#"><?php esc_html_e('Register','kodeforest');?></a>
		<?php
		$users_can_register = get_option('users_can_register');
		if($users_can_register <> 1){ ?>
			<!-- Modal -->
			<div aria-hidden="true" role="dialog" tabindex="-1" id="registerModalbox" class="modal fade kd-loginbox">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-body">
							<a aria-label="Close" data-dismiss="modal" class="close" href="#"><span aria-hidden="true">×</span></a>
							<div class="kd-login-title">
								<p class="kode-allowed"><?php esc_attr_e('Sign up not allowed by admin.','kodeforest');?></p>
								<p class="kode-allowed"><?php esc_attr_e('Please contact admin for the registration.','kodeforest');?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php }else{ ?>
			<div class="modal fade kd-loginbox" id="registerModalbox" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-body">
							<a href="#" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>
							<div class="kd-login-title">
								<h2><?php _e('Register TO','kodeforest');?></h2>
								<span><?php _e('Your Account','kodeforest');?></span>
								<div class="kd-login-network">
									<ul>
										<li><a href="#" data-original-title="Facebook"><i class="fa fa-facebook"></i> <?php esc_attr_e('Login with Facebook','kodeforest');?></a></li>
										<li><a href="#" data-original-title="Twitter"><i class="fa fa-twitter"></i> <?php esc_attr_e('Login with Twitter','kodeforest');?></a></li>
									</ul>
								</div>
							</div>
							<div class="kd-login-sepratore"><span>OR</span></div>
							<?php
								//Start Session for Captcha
								$session_variable = '';
								$_SESSION = array();
								$temp_root = get_root_directory('framework/include/frontend_assets/captcha/cp_default_captcha.php');
								include_once($temp_root . 'framework/include/frontend_assets/captcha/cp_default_captcha.php'); // include this file to write style-custom.css file
								$_SESSION['captcha'] = simple_php_captcha();
								if(isset($_SESSION['captcha'])){
									$session_variable = $_SESSION['captcha']['image_src'];
								}
							?>
							<form id="sing-up" action="signup" method="post">		
								<p><i class="fa fa-user"></i> <input type="text" id="user_nickname" name="user_nickname" placeholder="Enter user name" /></p>
								<p><i class="fa fa-envelope-o"></i><input type="text" id="user_email" name="user_email" placeholder="Enter your email" /></p>
								<p><i class="fa fa-lock"></i> <input id="user_pass" name="user_pass" type="password" placeholder="Enter your password"></p>
								<?php wp_nonce_field( 'ajax-signup-nonce', 'security' ); ?>
								<p><img src="<?php echo esc_attr($session_variable);?>" alt="CAPTCHA CODE" /></p>
								<p><i class="fa fa-lock"></i><input name="captcha_code" id="captcha_code" type="text" placeholder="Enter Captcha Code" /></p>
								<?php wp_nonce_field( 'ajax-signup-nonce', 'security' ); ?>
								<p><input type="submit" value="Register now" class="thbg-color" /> </p>
								<input type="hidden" id="ajax_captcha" name="ajax_captcha" value="<?php echo esc_attr($_SESSION['captcha']['code']);?>" />
								<p class="status"></p>
							</form>
							
						</div>
					</div>
				</div>
			</div>
		<?php }
	}
	
	// get the path for the file ( to support child theme )
	if( !function_exists('get_root_directory') ){
		function get_root_directory( $path ){
			if( file_exists( get_stylesheet_directory() . '/' . $path ) ){
				return get_stylesheet_directory() . '/';
			}else{
				return SERVER_PATH . '/';
			}
		}
	}
	
	
	
	
	//Get Popular posts
	if( !function_exists('kode_popular_set_post_views') ){
		function kode_popular_set_post_views($postID) {
			$count_key = 'kode_popular_post_views_count';
			$count = get_post_meta($postID, $count_key, true);
			if($count==''){
				$count = 0;
				delete_post_meta(esc_attr($postID), esc_attr($count_key));
				add_post_meta(esc_attr($postID), esc_attr($count_key), '0');
			}else{
				$count++;
				update_post_meta(esc_attr($postID), esc_attr($count_key), esc_attr($count));
			}
		}
	}
	
	if( !function_exists('kode_popular_track_post_views') ){
		function kode_popular_track_post_views ($post_id) {
			if ( !is_single() ) return;
			if ( empty ( $post_id) ) {
				global $post;
				$post_id = $post->ID;    
			}
			kode_popular_set_post_views($post_id);
		}
	}
	add_action( 'wp_head', 'kode_popular_track_post_views');

	if( !function_exists('kode_get_post_views') ){
		function kode_get_post_views($postID){
			$count_key = 'kode_popular_post_views_count';
			$count = get_post_meta(esc_attr($postID), esc_attr($count_key), true);
			if($count==''){
				delete_post_meta(esc_attr($postID), esc_attr($count_key));
				add_post_meta(esc_attr($postID), esc_attr($count_key), '0');
				return "0 View";
			}
			return $count.' Views';
		}
	}
	
	/*-----------------------------------------------------------------------------------*/
	/*	Packages sorting
	/*-----------------------------------------------------------------------------------*/
	if( !function_exists( 'kode_sort_packages' ) ){
		function kode_sort_packages($package_query_args){
			if (isset($_GET['sortby'])) {
				$orderby = $_GET['sortby'];
				if ($orderby == 'price-asc') {
					$package_query_args['orderby'] = 'meta_value_num';
					$package_query_args['meta_key'] = 'kode_package_price';
					$package_query_args['order'] = 'ASC';
				} else if ($orderby == 'price-desc') {
					$package_query_args['orderby'] = 'meta_value_num';
					$package_query_args['meta_key'] = 'kode_package_price';
					$package_query_args['order'] = 'DESC';
				} else if ($orderby == 'date-asc') {
					$package_query_args['orderby'] = 'date';
					$package_query_args['order'] = 'ASC';
				} else if ($orderby == 'date-desc') {
					$package_query_args['orderby'] = 'date';
					$package_query_args['order'] = 'DESC';
				}
			}
			return $package_query_args;
		}
	}
	
	// retrieve all posts as a list
	if( !function_exists('kode_get_post_list_id') ){	
		function kode_get_post_list_id( $post_type ){
			$post_list = get_posts(array('post_type' => $post_type, 'numberposts'=>1000));

			$ret = array();
			if( !empty($post_list) ){
				foreach( $post_list as $post ){
					$ret[$post->ID] = $post->post_title;
				}
			}
				
			return $ret;
		}	
	}	
	
	/*-----------------------------------------------------------------------------------*/
	/*	Properties Search Filter
	/*-----------------------------------------------------------------------------------*/
	if(!function_exists('kode_search')){
		function kode_search($search_args){

			/* taxonomy query and meta query arrays */
			$tax_query = array();
			$meta_query = array();

			/* Keyword Based Search */
			if( isset ( $_GET['keyword'] ) ) {
				$keyword = trim( $_GET['keyword'] );
				if ( ! empty( $keyword ) ) {
					$search_args['s'] = $keyword;
				}
			}
			
			/* Property Bedrooms Parameter */
			if((!empty($_GET['days'])) && ( $_GET['days'] != 'any' ) ){
				$meta_query[] = array(
					'key' => 'days',
					'value' => $_GET['days'],
					'compare' => '>=',
					'type'=> 'DECIMAL'
				);
			}

			/* Logic for Min and Max Price Parameters */
			if( isset($_GET['min-price']) && ($_GET['min-price'] != 'any') && isset($_GET['max-price']) && ($_GET['max-price'] != 'any') ){
				$min_price = doubleval($_GET['min-price']);
				$max_price = doubleval($_GET['max-price']);
				if( $min_price >= 0 && $max_price > $min_price ){
					$meta_query[] = array(
						'key' => 'price',
						'value' => array( $min_price, $max_price ),
						'type' => 'NUMERIC',
						'compare' => 'BETWEEN'
					);
				}
			}elseif( isset($_GET['min-price']) && ($_GET['min-price'] != 'any') ){
				$min_price = doubleval($_GET['min-price']);
				if( $min_price > 0 ){
					$meta_query[] = array(
						'key' => 'price',
						'value' => $min_price,
						'type' => 'NUMERIC',
						'compare' => '>='
					);
				}
			}elseif( isset($_GET['max-price']) && ($_GET['max-price'] != 'any') ){
				$max_price = doubleval($_GET['max-price']);
				if( $max_price > 0 ){
					$meta_query[] = array(
						'key' => 'price',
						'value' => $max_price,
						'type' => 'NUMERIC',
						'compare' => '<='
					);
				}
			}

			/* if more than one taxonomies exist then specify the relation */
			$tax_count = count( $tax_query );
			if( $tax_count > 1 ){
				$tax_query['relation'] = 'AND';
			}

			/* if more than one meta query elements exist then specify the relation */
			$meta_count = count( $meta_query );
			if( $meta_count > 1 ){
				$meta_query['relation'] = 'AND';
			}

			if( $tax_count > 0 ){
				$search_args['tax_query'] = $tax_query;
			}

			/* if meta query has some values then add it to base home page query */
			if( $meta_count > 0 ){
				$search_args['meta_query'] = $meta_query;
			}

			/* Sort By Price */
			if( (isset($_GET['min-price']) && ($_GET['min-price'] != 'any')) || ( isset($_GET['max-price']) && ($_GET['max-price'] != 'any') ) ){
				$search_args['orderby'] = 'meta_value_num';
				$search_args['meta_key'] = 'price';
				$search_args['order'] = 'ASC';
			}

			return $search_args;
		}
	}
	add_filter('kode_search_parameters','kode_search');
	
	/*-----------------------------------------------------------------------------------*/
	// Numbers loop
	/*-----------------------------------------------------------------------------------*/
	if(!function_exists('kode_numbers_list')){
		function kode_numbers_list($numbers_list_for){
			$numbers_array = array(1,2,3,4,5,6,7,8,9,10);
			$searched_value = '';
			$html = '';
			if($numbers_list_for == 'days'){
				if(isset($_GET['days'])){
					$searched_value = $_GET['days'];
				}
			}
			
			if(!empty($numbers_array)){
				foreach($numbers_array as $number){
					if($searched_value == $number){
						$html .= '<option value="'.$number.'" selected="selected">'.$number.'</option>';
					}else {
						$html .= '<option value="'.$number.'">'.$number.'</option>';
					}
				}
			}

			if($searched_value == 'any' || empty($searched_value)) {
				$html .= '<option value="any" selected="selected">'.__( 'Любая', 'KodeForest').'</option>';
			} else {
				$html .= '<option value="any">'.__( 'Любая', 'KodeForest').'</option>';
			}
			return $html;
		}
	}
	
	function kode_search_form_banner($title=""){
		global $theme_option; 
		$theme_option['package-search-page'] = (empty($theme_option['package-search-page']))? ' ': $theme_option['package-search-page'];
		$package_keyword = (empty($_GET['keyword']))? ' ': $_GET['keyword'];
		return '
		<div class="container">
		<div class="row">
		<div class="col-md-12">
		<div class="kd-tourform">
			<span class="formbtn">'.esc_attr($title).'</span>
			<form class="advance-search-form" action="'.esc_url(get_permalink($theme_option['package-search-page'])).'" method="get">
				<ul>
					<li>	
						<span class="keyword-txt">'. __('Название отеля', 'kodeforest').'</span>
						<input type="text" name="keyword" id="keyword-txt" value="'.$package_keyword.'" placeholder="'. __('Любая', 'kodeforest').'" />
					</li>
					<li>
						<span class="select-days">'. __('Дней', 'kodeforest').'</span>
						<label for="select-days">
							<select name="days" id="select-days" class="search-select">
								'.kode_numbers_list('days').'
							</select>
						</label>
					</li>
					<li>
						<span class="select-min-price">'. __('Цена от', 'kodeforest').'</span>
						<label for="select-min-price">
							<select name="min-price" id="select-min-price" class="search-select">
								'.kode_min_prices_list().'
							</select>
						</label>
					</li>
					<li>
						<span class="select-min-price">'. __('Цена до', 'kodeforest').'</span>
						<label for="select-min-price">
							<select name="max-price" id="select-max-price" class="search-select">
								'.kode_max_prices_list().'
							</select>
						</label>
					</li>
					<li class="k-submit-btn"><input type="submit" class="thbg-color" value="'.__('Поиск','kodeforest').'"></li>
				</ul>
			</form>
		</div>
		</div>
		</div>
		</div>
		';
	
	}
	
	/*-----------------------------------------------------------------------------------*/
	/*	Properties sorting
	/*-----------------------------------------------------------------------------------*/
	if( !function_exists( 'kode_sort_packages' ) ){
		/**
		 * @param $property_query_args
		 * @return mixed
		 */
		function kode_sort_packages($package_query_args){
			if (isset($_GET['sortby'])) {
				$orderby = $_GET['sortby'];
				if ($orderby == 'price-asc') {
					$property_query_args['orderby'] = 'meta_value_num';
					$property_query_args['meta_key'] = 'price';
					$property_query_args['order'] = 'ASC';
				} else if ($orderby == 'price-desc') {
					$property_query_args['orderby'] = 'meta_value_num';
					$property_query_args['meta_key'] = 'price';
					$property_query_args['order'] = 'DESC';
				} else if ($orderby == 'date-asc') {
					$property_query_args['orderby'] = 'date';
					$property_query_args['order'] = 'ASC';
				} else if ($orderby == 'date-desc') {
					$property_query_args['orderby'] = 'date';
					$property_query_args['order'] = 'DESC';
				}
			}
			return $property_query_args;
		}
	}
	
	/*-----------------------------------------------------------------------------------*/
	// Maximum Prices
	/*-----------------------------------------------------------------------------------*/
	if(!function_exists('kode_max_prices_list')){
		function kode_max_prices_list(){

			$max_price_array = array( 100, 150, 200, 250, 300, 350, 400, 450, 500, 550, 600, 650, 700, 750, 800, 850, 900, 1000  );
			$maximum_price = '';
			$html = '';
			if(isset($_GET['max-price'])){
				$maximum_price = doubleval($_GET['max-price']);
			}
			
			if($maximum_price == 'any' || empty($maximum_price)) {
				$html .= '<option value="any" selected="selected">'.__( 'Любая', 'KodeForest').'</option>';
			} else {
				$html .= '<option value="any">'.__( 'Любая', 'KodeForest').'</option>';
			}

			if(!empty($max_price_array)){
				foreach($max_price_array as $price){
					if($maximum_price == $price){
						$html .= '<option value="'.$price.'" selected="selected">'.get_custom_price($price).'</option>';
					}else {
						$html .= '<option value="'.$price.'">'.get_custom_price($price).'</option>';
					}
				}
			}
			
			return $html;
		}
	}
	
	/*-----------------------------------------------------------------------------------*/
	// Minimum Prices
	/*-----------------------------------------------------------------------------------*/
	if(!function_exists('kode_min_prices_list')){
		function kode_min_prices_list(){
			$min_price_array = array( 100, 150, 200, 250, 300, 350, 400, 450, 500, 550, 600, 650, 700, 750, 800, 850, 900, 1000 );

			$minimum_price = '';
			$html = '';
			if(isset($_GET['min-price'])){
				$minimum_price = doubleval($_GET['min-price']);
			}
			
			
			if($minimum_price == 'any' || empty($minimum_price)) {
				$html .= '<option value="any" selected="selected">'.__( 'Любая', 'KodeForest').'</option>';
			} else {
				$html .= '<option value="any">'.__( 'Любая', 'KodeForest').'</option>';
			}

			if(!empty($min_price_array)){
				foreach($min_price_array as $price){
					if($minimum_price == $price){
						$html .= '<option value="'.esc_attr($price).'" selected="selected">'.esc_attr(get_custom_price($price)).'</option>';
					}else {
						$html .= '<option value="'.esc_attr($price).'">'.get_custom_price($price).'</option>';
					}
				}
			}

			
			
			return $html;

		}
	}
	
	/*-----------------------------------------------------------------------------------*/
	/*	Get Currency
	/*-----------------------------------------------------------------------------------*/
	if(!function_exists('get_theme_currency')){
		function get_theme_currency(){
			$currency = get_option( 'theme_currency_sign' );
			if(!empty($currency)){
				return $currency;
			}
			return __('$','KodeForest');
		}
	}
	
	if(!function_exists('get_custom_price')){
		function get_custom_price($amount){
			$amount = doubleval($amount);
			if($amount){
				$currency = get_theme_currency();
				$decimals = intval(get_option( 'theme_decimals'));
				$decimal_point = get_option( 'theme_dec_point' );
				$thousands_separator = get_option( 'theme_thousands_sep' );
				$currency_position = get_option( 'theme_currency_position' );
				$formatted_price = number_format($amount,$decimals, $decimal_point, $thousands_separator);
				if($currency_position == 'after'){
					return $formatted_price . $currency;
				}else{
					return $currency . $formatted_price;
				}
			} else {
				return false;
			}
		}
	}
	
	// retrieve all posts as a list
	if( !function_exists('kode_get_post_list_id') ){	
		function kode_get_post_list_id( $post_type ){
			$post_list = get_posts(array('post_type' => $post_type, 'numberposts'=>1000));

			$ret = array();
			if( !empty($post_list) ){
				foreach( $post_list as $post ){
					$ret[$post->ID] = $post->post_title;
				}
			}
				
			return $ret;
		}	
	}

?>
