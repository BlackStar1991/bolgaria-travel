<?php
	/*	
	*	Team Listing
	*	---------------------------------------------------------------------
	*	This file contains functions that help you create team item
	*	---------------------------------------------------------------------
	*/
	
	//Team Listing
	if( !function_exists('kode_get_team_item') ){
		function kode_get_team_item( $settings ){
			// $settings['category'];
			// $settings['tag'];
			// $settings['num-excerpt'];
			// $settings['num-fetch'];
			// $settings['team-style'];
			// $settings['scope'];
			// $settings['order'];
			// $settings['margin-bottom'];
			// query posts section
			$args = array('post_type' => 'team', 'suppress_filters' => false);
			$args['posts_per_page'] = (empty($settings['num-fetch']))? '5': esc_attr($settings['num-fetch']);
			$args['orderby'] = (empty($settings['orderby']))? 'post_date': esc_attr($settings['orderby']);
			$args['order'] = (empty($settings['order']))? 'desc': esc_attr($settings['order']);
			$args['paged'] = (get_query_var('paged'))? get_query_var('paged') : 1;

			if( !empty($settings['category']) || (!empty($settings['tag'])) ){
				$args['tax_query'] = array('relation' => 'OR');
				
				if( !empty($settings['category']) ){
					array_push($args['tax_query'], array('terms'=>explode(',', $settings['category']), 'taxonomy'=>'team_category', 'field'=>'slug'));
				}
				if( !empty($settings['tag'])){
					array_push($args['tax_query'], array('terms'=>explode(',', $settings['tag']), 'taxonomy'=>'team_tag', 'field'=>'slug'));
				}				
			}			
			$query = new WP_Query( $args );

			// create the team filter
			$settings['num-excerpt'] = empty($settings['num-excerpt'])? 0: esc_attr($settings['num-excerpt']);
			$size = 4;
			$team  = '<div class="team-listing kd-team col-md-12"><div class="row">';
			if($settings['team-style'] == 'normal-view'){
				$size = 4;
				$team  = '<div class="team-grid kode-team col-md-12"><div class="row">';
			}else{
				$size = 2;
				$team  = '<div class="team-medium kode-team col-md-12"><div class="row">';
			}
			$current_size = 0;
			while($query->have_posts()){ $query->the_post();
				global $kode_post_option,$post,$kode_post_settings;
				$team_option = json_decode(kode_decode_stopbackslashes(get_post_meta($post->ID, 'post-option', true)), true);
				$designation = $team_option['designation'];
				$phone = $team_option['phone'];
				$website = $team_option['website'];
				$email = $team_option['email'];
				$facebook = $team_option['facebook'];
				$twitter = $team_option['twitter'];
				$youtube = $team_option['youtube'];
				$pinterest = $team_option['pinterest'];
				if( $current_size % $size == 0 ){
					$team .= '<div class="clear"></div>';
				}	
				if($settings['team-style'] == 'normal-view'){
					$team .= '<article class="theme-margin ' . esc_attr(kode_get_column_class('1/' . $size)) . '">
					<div class="team-mainsection kode-ux">
						<figure><a href="'.esc_url(get_permalink()).'">'.get_the_post_thumbnail($post->ID, array(350,350)).'</a></figure>
						<div class="kd-teaminfo">
							<h5><a href="'.esc_url(get_permalink()).'">'.esc_attr(get_the_title()).'</a></h5>
							<span>'.esc_attr($team_option['designation']).'</span>
							<p>'.esc_attr(strip_tags(substr(get_the_content(),0,111))).'</p>
							<!---<div class="kd-social-network">
								<ul>
									<li><a data-original-title="Facebook" href="'.esc_url($facebook).'"><i class="fa fa-facebook-square"></i></a></li>
									<li><a data-original-title="Twitter" href="'.esc_url($twitter).'"><i class="fa fa-twitter-square"></i></a></li>
									<li><a data-original-title="Google" href="'.esc_url($youtube).'"><i class="fa fa-youtube"></i></a></li>
									<li><a data-original-title="Linkedin" href="'.esc_url($pinterest).'"><i class="fa fa-pinterest"></i></a></li>
								</ul>
							</div>--->
						</div>
					</div></article>';
				}else{
				$team .= '<article class="theme-margin ' . esc_attr(kode_get_column_class('1/' . $size)) . '">
					<div class="team-mainsection kode-ux">
						<figure><a href="'.esc_url(get_permalink()).'">'.get_the_post_thumbnail($post->ID, array(350,350)).'</a></figure>
						<div class="kd-teaminfo">
							<h5><a href="'.esc_url(get_permalink()).'">'.esc_attr(get_the_title()).'</a></h5>
							<span>'.esc_attr($team_option['designation']).'</span>
							<p>'.esc_attr(strip_tags(substr(get_the_content(),0,111))).'</p>
<!-----
                                                        <div class="kd-social-network">
								<ul>
									<li><a data-original-title="Facebook" href="'.esc_url($facebook).'"><i class="fa fa-facebook-square"></i></a></li>
									<li><a data-original-title="Twitter" href="'.esc_url($twitter).'"><i class="fa fa-twitter-square"></i></a></li>
									<li><a data-original-title="Google" href="'.esc_url($youtube).'"><i class="fa fa-youtube"></i></a></li>
									<li><a data-original-title="Linkedin" href="'.esc_url($pinterest).'"><i class="fa fa-pinterest"></i></a></li>
								</ul>
							</div>
---->
						</div>
					</div></article>';
				}
				$current_size++;
			}
			if( $settings['pagination'] == 'enable' ){
				$team .= kode_get_pagination($query->max_num_pages, $args['paged']);
			}
			$team .= '</div>';
			$team .= '</div>';
			
			return $team;
		}
	}	
	
?>