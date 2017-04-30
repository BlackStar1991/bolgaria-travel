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
			<div style="margin:30px 0px" class="kode-item kode-funding-full <?php echo esc_attr($kode_sidebar['center'])?>">
			<?php while ( have_posts() ){ the_post();
						global $post;
				$kode_ign_fund_end = get_post_meta($post->ID, 'ign_fund_end', true);
				$kode_ignition_datee = date('d-m-Y h:i:s',strtotime($kode_ign_fund_end));
				$kode_ign_project_id = get_post_meta($post->ID, 'ign_project_id', true);
				$kode_ign_fund_goal = get_post_meta($post->ID, 'ign_fund_goal', true);
				$kode_ign_product_image1 = get_post_meta($post->ID, 'ign_product_image1', true);
				$kode_thumbnail_id = get_post_thumbnail_id( $post->ID, 'ign_project_id', true );
				$kode_getPledge_cp = getPledge_cp($kode_ign_project_id);
				$kode_current_date = date('d-m-Y h:i:s');
				$kode_project_date = new DateTime($kode_ignition_datee);
				$kode_current = new DateTime($kode_current_date);
				$kode_days = round(($kode_project_date->format('U') - $kode_current->format('U')) / (60*60*24));
				$kode_thumbnail = wp_get_attachment_image_src( $kode_thumbnail_id , 'blog-post' );
			?>
				<!-- Crowd Funding Detail -->
				<div class="funding-detail row">
					<div class="col-md-12">
						<article class="theme-margin">
							<figure class="detail-thumb">
								<a href="<?php echo esc_url(get_permalink());?>"><img src="<?php echo esc_url($kode_thumbnail[0])?>" alt=""></a>
							</figure>
							<div class="funding-info">
								<small>$<?php echo esc_attr(getTotalProductFund_cp($kode_ign_project_id));?></small>
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
										<span class="sr-only"><?php echo esc_attr(getPercentRaised_cp($kode_ign_project_id));?>% <?php esc_attr_e('Complete','kodeforest');?></span>
									</div>
								</div>
								<small class="secend-price">$<?php echo esc_attr($kode_ign_fund_goal);?></small>
							</div>
						</article>
						<article class="rich-editer">
							<h2><?php echo esc_attr(get_the_title());?></h2>
							<a href="<?php echo esc_url(get_permalink());?>" class="kd-readmore th-bordercolorhover thbg-colorhover"><i class="fa fa-heart"></i><?php esc_attr_e('Donate now','kode_forest');?></a>
							<div class="clearfix clear"></div>
							<p><?php echo do_shortcode(get_the_content());?></p>
						</article>
						
						<?php if($theme_option['single-post-author'] != "disable"){ ?>
						<div class="row">
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
										<p><?php echo esc_attr(get_the_author_meta('description')); ?></p>
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
						</div>
						<?php } ?>
					</div>
					<!--// CroudFunding //-->
                </div>
				<!-- Crowdfund Detail -->
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