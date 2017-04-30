<?php get_header(); ?>
<div class="content">
	<div class="container">
		<div class="row">
		<?php 
			global $kode_sidebar, $theme_option,$kode_post_option;
			// if( empty($kode_post_option['sidebar']) || $kode_post_option['sidebar'] == 'default-sidebar' ){
				// $kode_sidebar = array(
					// 'type'=>$theme_option['post-sidebar-template'],
					// 'left-sidebar'=>$theme_option['post-sidebar-left'], 
					// 'right-sidebar'=>$theme_option['post-sidebar-right']
				// ); 
			// }else{
				$kode_sidebar = array(
					'type'=>$kode_post_option['sidebar'],
					'left-sidebar'=>$kode_post_option['left-sidebar'], 
					'right-sidebar'=>$kode_post_option['right-sidebar']
				); 				
			// }
			
			$kode_sidebar = kode_get_sidebar_class($kode_sidebar);
			if($kode_sidebar['type'] == 'both-sidebar' || $kode_sidebar['type'] == 'left-sidebar'){ ?>
				<div class="<?php echo $kode_sidebar['left']?>">
					<?php get_sidebar('left'); ?>
				</div>	
			<?php } ?>
			<div class="<?php echo esc_attr($kode_sidebar['center'])?>">
				
				
				<div class="kode-item kode-blog-full team-detail">
				<?php while ( have_posts() ){ 
					the_post(); 
					global $post;
					$price = $kode_post_option['price'];
					$duration = $kode_post_option['days'];
					$duration_pre = $kode_post_option['days-prefix'];
					$location = $kode_post_option['location'];
					$availability = $kode_post_option['availability'];
					$book_text = $kode_post_option['book_text'];
					$book_url = $kode_post_option['book_url'];
					$kode_post_settings['thumbnail-size'] = 'blog-post';
					?>
					 <!--// Package Detail //-->
					<div class="kd-package-detail">
						<?php get_template_part('single/thumbnail', get_post_format()); ?>	
						<div class="kd-pkg-info">
							<ul>
								<li><i class="fa fa-map-marker"></i> <strong><?php esc_attr_e('Количество дней:','kodeforest');?></strong> <?php echo esc_attr($duration).' '.esc_attr($duration_pre);?></li>
								<li><i class="fa fa-paper-plane"></i> <strong><?php esc_attr_e('Звезд:','kodeforest');?></strong> <?php echo esc_attr($location);?></li>
								<li><i class="fa fa-ticket"></i> <strong><?php esc_attr_e('Свободные места:','kodeforest');?></strong> <?php echo esc_attr($availability);?></li>
								<li><i class="fa fa-tag"></i> <strong><?php esc_attr_e('Цена:','kodeforest');?></strong> <?php echo esc_attr($price);?></li>
							</ul>
							<a href="<?php echo esc_url($book_url);?>" class="kd-booking-btn thbg-color"><?php echo esc_attr($book_text);?></a>
						</div>
						<div class="kd-rich-editor">
							<?php $content = get_the_content(); echo kode_content_filter($content,false);?>
						</div>
						<!--// User Tag //-->
						<div class="kd-user-tag">
							<div class="row">
								<div class="col-md-8">
									<div class="kd-tag">
										<span><i class="fa fa-tag"></i> Теги:</span>
										<ul>
											<?php echo kode_get_package_info(array('tag'), false, '','li');?>
										</ul>
									</div>
								</div>
								<div class="col-md-4">
									<div class="kd-social-network">
										<?php kode_get_social_shares();?>
									</div>
								</div>
							</div>
						</div>
						<!--// User Tag //-->
					</div>
					<!--// Package Detail //-->
					<?php comments_template( '', true ); ?>
				<?php } ?>
				</div>
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