<?php get_header(); ?>
<?php  wp_head(); ?>
<div class="content">
	<div class="container">
		<div class="row">
		<?php 
			global $kode_sidebar, $theme_option,$kode_post_settings;
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
			$theme_option['single-post-author'] = 'enable';
			$kode_post_settings['thumbnail-size'] = 'blog-post';
			$kode_sidebar = kode_get_sidebar_class($kode_sidebar);
			if($kode_sidebar['type'] == 'both-sidebar' || $kode_sidebar['type'] == 'left-sidebar'){ ?>
				<div class="<?php echo esc_attr($kode_sidebar['left'])?>">
					<?php get_sidebar('left'); ?>
				</div>	
			<?php } ?>
			<div class="<?php echo esc_attr($kode_sidebar['center'])?>">
				





<div class="kode-item kode-blog-full ">
					<?php while ( have_posts() ){ the_post();global $post; ?>
					<!-- Blog Detail -->
					<div class="kd-blog-detail">
						<?php get_template_part('single/thumbnail', get_post_format()); ?>
						<div class="inn-detail">
							<!-- <div class="kd-detail-time thbg-color">
								<span><?php echo esc_attr(get_the_date('j'));?></span>
								<?php echo esc_attr(get_the_date('M'));?>
							</div> -->
							<div class="kd-rich-editor">
								<h1><?php echo get_the_title();?></h1>
								 <!-- <ul class="kd-detailpost-option">
									<?php echo kode_get_blog_info(array('author','category','comments'), false, '','li');?>
								</ul>  -->
								<?php echo kode_content_filter($kode_post_settings['content'], true);?>
							</div>
						</div>
						
						
						
					</div>
					<!-- Blog Detail -->
					<?php comments_template( '', true ); ?>
					<?php } ?>
				</div>
				<div class="clear clearfix"></div>
			</div>
			<?php
			if($kode_sidebar['type'] == 'both-sidebar' || $kode_sidebar['type'] == 'right-sidebar' && $kode_sidebar['right'] != ''){ ?>
				<div class="<?php echo $kode_sidebar['right']?>">
					<?php get_sidebar('right'); ?>
				</div>	
			<?php } ?>
		</div><!-- Row -->	
	</div><!-- Container -->		
</div><!-- content -->
<?php get_footer(); ?>