<?php get_header(); ?>
<?php  wp_head(); ?>
<div class="content">
	<div class="container">
		<div class="row">
		<?php 
			global $kode_sidebar, $theme_option;
			if( empty($kode_post_option['sidebar']) || $kode_post_option['sidebar'] == 'default-sidebar' ){
				$kode_sidebar = array(
					'type'=>$theme_option['post-sidebar-template'],
					'left-sidebar'=>$theme_option['post-sidebar-left'], 
					'right-sidebar'=>$theme_option['post-sidebar-right']
				); 
			}else{
				$kode_sidebar = array(
					'type'=>$kode_post_option['sidebar'],
					'left-sidebar'=>$kode_post_option['left-sidebar'], 
					'right-sidebar'=>$kode_post_option['right-sidebar']
				); 				
			}
			$kode_sidebar = kode_get_sidebar_class($kode_sidebar);
			if($kode_sidebar['type'] == 'both-sidebar' || $kode_sidebar['type'] == 'left-sidebar'){ ?>
				<div class="<?php echo esc_attr($kode_sidebar['left'])?>">
					<?php get_sidebar('left'); ?>
				</div>	
			<?php } ?>
			<div style="margin:30px 0px" class="kode-item  <?php echo esc_attr($kode_sidebar['center'])?>">
			<?php while ( have_posts() ){ the_post(); 
			global $EM_Event;
			$event_year = esc_attr(date('Y',$EM_Event->start));
			$event_month = esc_attr(date('m',$EM_Event->start));
			$event_day = esc_attr(date('d',$EM_Event->start));
			$event_start_time = esc_attr(date("G,i,s", strtotime($EM_Event->start_time)));
			$location = esc_attr($EM_Event->get_location()->name);
			?>
				<!-- Blog Detail -->
				<div class="event-detail row">
					<div class="col-md-12">
						<article class="kdevent">
							<figure>
								<a href="<?php echo esc_url($EM_Event->guid);?>">
									<?php echo get_the_post_thumbnail( $EM_Event->post_id, array(350,350));?>
								</a>
								<figcaption>
									<div class="countdown" data-year="<?php echo esc_attr($event_year)?>" data-month="<?php echo esc_attr($event_month)?>" data-day="<?php echo esc_attr($event_day)?>" data-time="<?php echo esc_attr($event_start_time)?>" id="defaultCountdown-<?php echo esc_attr($event->post_id)?>"></div>
								</figcaption>
							</figure>
							<div class="event-info">
								<?php if($location <> ''){ echo do_shortcode('[map address="'.$location.'" type="roadmap" width="100%" height="300px" zoom="14" scrollwheel="yes" scale="yes" zoom_pancontrol="yes"][/map]');}?>
								<div class="kd-detailinfo">
									<span><?php echo esc_attr(date('d M',$EM_Event->start));?> <?php echo esc_attr($EM_Event->start_time)?> to <?php echo esc_attr($EM_Event->end_time)?></span>
									<small><?php echo esc_attr($location);?></small>
								</div>
							</div>
						</article>					
						<article class="rich-editer">
							<ul class="kdpost-option kf-event-meta">
								<?php echo kode_get_event_info(array('tag','category','author'),true,'','li');?>
							</ul>
							<?php $content = str_replace(']]>', ']]&gt;',$EM_Event->post_content); ?>
							<p><?php echo do_shortcode($content); ?> </p>
							<div class="socialnetwork">
								<?php kode_get_social_shares();?>
							</div>
						</article>
					</div>
					<?php if($theme_option['single-post-author'] != "disable"){ ?>
					<div class="col-md-12">
						<div class="kd-posttitle">
							<h2><?php esc_attr_e('About Post Author', 'kode_forest'); ?></h2>
						</div>
					</div>
					<div class="col-md-12">
						<div class="about-auther">
							<figure><?php echo get_avatar(get_the_author_meta('ID'), 90); ?></figure>
							<div class="text">
								<?php the_author_posts_link(); ?>
								<p><?php echo get_the_author_meta('description'); ?></p>
								<div class="socialnetwork">
									<ul>
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-youtube"></i></a></li>
										<li><a href="#"><i class="fa fa-vimeo-square"></i></a></li>
										<li><a href="#"><i class="fa fa-rss"></i></a></li>
										<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>		
				</div>
				<!-- Blog Detail -->
				<?php comments_template( '', true ); ?>
			<?php } ?>
			</div>
			<?php
			if($kode_sidebar['type'] == 'both-sidebar' || $kode_sidebar['type'] == 'right-sidebar' && $kode_sidebar['right'] != ''){ ?>
				<div class="<?php echo esc_attr($kode_sidebar['right'])?>">
					<?php get_sidebar('right'); ?>
				</div>	
			<?php } ?>
		</div><!-- Row -->	
	</div><!-- Container -->		
</div><!-- content -->
<?php get_footer(); ?>