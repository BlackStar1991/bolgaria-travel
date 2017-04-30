<?php get_header(); ?>
<div class="content">
	<div class="container">
		<div class="row">
		<?php 
			global $kode_sidebar, $theme_option,$kode_post_option;
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
				<div class="<?php echo $kode_sidebar['left']?>">
					<?php get_sidebar('left'); ?>
				</div>	
			<?php } ?>
			<div class="<?php echo $kode_sidebar['center']?>">
				<div class="kode-item kode-blog-full team-detail">
				<?php while ( have_posts() ){ 
					the_post(); 
					global $post;
					$designation = $kode_post_option['designation'];
					?>
					<div class="row">
						<div class="col-md-4">
							<div class="kode-team-shortinfo">
								<figure>
									<?php echo get_the_post_thumbnail($post->ID, array(350,350)); ?>	
								</figure>
								<div class="team-info">
									<h4><a href="<?php echo esc_url(get_permalink());?>"><?php echo esc_attr(get_the_title());?></a></h4>
									<p><?php echo esc_attr($designation)?></p>
								</div>
							</div>
						</div>
						
						<div class="col-md-8">
							<div class="team-detail-text">
								<?php $content = get_the_content();
								echo kode_content_filter($content,false);
								?>
							</div>
						</div>
					</div>
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