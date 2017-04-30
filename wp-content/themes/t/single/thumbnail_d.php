<?php 
	if( !is_single() ){ 
		global $kode_post_settings,$post,$theme_option,$kode_post_option; 
	}else{
		global $kode_post_settings, $theme_option, $kode_post_option,$post;
	}
	$kode_post_settings['content'] = get_the_content();
	
	if ( has_post_thumbnail() && ! post_password_required() ){
		
		$k_post_option = json_decode(get_post_meta($post->ID, 'post-option', true), true);		
		
		$thumbnail_size = (empty($kode_post_settings['thumbnail-size']))? $theme_option['post-thumbnail-size']: $kode_post_settings['thumbnail-size'];
		
		//Get Thumbnail Width and Height
		$kode_img_size = kode_get_video_size($thumbnail_size);
		$kode_width = $kode_img_size['width'];
		$kode_height = $kode_img_size['height'];
		
		// Get Slider Images
		$k_post_option['slider'] = (empty($k_post_option['slider']))? ' ': $k_post_option['slider'];
		$raw_slider_data = kode_decode_stopbackslashes($k_post_option['slider']);	
		$filter_slider_data = json_decode(kode_stripslashes($raw_slider_data), true);		
		
		//Get Media Type Selected
		$k_post_option['post_media_type'] = (empty($k_post_option['post_media_type']))? ' ': $k_post_option['post_media_type'];
		
		//Condition for Audio, Video, Slider
		if($k_post_option['post_media_type'] == 'audio'){
			if(strpos($k_post_option['kode_audio'],'soundcloud')){				
				echo $html_thumb_view = '<div class="kode-blog-thumbnail kode-audio">' . do_shortcode('[soundcloud url="'.esc_url($k_post_option['kode_audio']).'" comments="yes" auto_play="no" color="#ff7700" width="100%" height="'.esc_attr($kode_height).'px"][/soundcloud]') . '</div>';				
			}else{				
				$kode_get_image = kode_get_image(get_post_thumbnail_id(), esc_attr($thumbnail_size), true);
				if(!empty($kode_get_image)){
					echo '<div class="kode-blog-thumbnail">';
						if( is_single() ){
								echo kode_get_image(get_post_thumbnail_id(), $thumbnail_size, true);	
								echo '<div class="kode-blog-thumbnail kode-audio">' . do_shortcode('[audio mp3="'.$k_post_option['kode_audio'].'"][/audio]') . '</div>';
						}else{
							$temp_option = json_decode(get_post_meta(get_the_ID(), 'post-option', true), true);
							echo '<a href="' . esc_url(get_permalink()) . '"> ';
							echo kode_get_image(get_post_thumbnail_id(), $thumbnail_size,true);
							echo '</a>';
							echo '<div class="kode-blog-thumbnail kode-audio">' . do_shortcode('[audio mp3="'.$k_post_option['kode_audio'].'"][/audio]') . '</div>';							
							if( is_sticky() ){
								echo '<div class="kode-sticky-banner">';
								echo '<i class="fa fa-bullhorn" ></i>';
								echo esc_attr__('Sticky Post', 'kode_forest');
								echo '</div>';
							}
						}						
					echo '</div>';
				}else{
					echo '<div class="kode-blog-thumbnail kode-audio">' . do_shortcode('[audio mp3="'.$k_post_option['kode_audio'].'"][/audio]') . '</div>';
				}
				
			}
		}else if($k_post_option['post_media_type'] == 'video'){
			echo $html_thumb_view = '<div class="kode-blog-thumbnail kode-video">' . kode_get_video($k_post_option['kode_video'],$thumbnail_size).'</div>';
		}else if($k_post_option['post_media_type'] == 'slider'){
			echo kode_get_slider( $filter_slider_data, esc_attr($thumbnail_size), 'bxslider' );
		}else{
			$kode_get_image = kode_get_image(get_post_thumbnail_id(), esc_attr($thumbnail_size), true);
			if(!empty($kode_get_image)){
				echo '<div class="kode-blog-thumbnail">';
					if( is_single() ){
							echo kode_get_image(get_post_thumbnail_id(), esc_attr($thumbnail_size), true);						
					}else{
						$temp_option = json_decode(get_post_meta(get_the_ID(), 'post-option', true), true);
						
						echo '<a href="' . esc_url(get_permalink()) . '"> ';
						echo kode_get_image(get_post_thumbnail_id(), esc_attr($thumbnail_size));
						echo '</a>';
						
						if( is_sticky() ){
							echo '<div class="kode-sticky-banner">';
							echo '<i class="fa fa-bullhorn" ></i>';
							echo esc_attr__('Sticky Post', 'kode_forest');
							echo '</div>';
						}
					}
				echo '</div>';
			}
		}
		
	} 
?>	