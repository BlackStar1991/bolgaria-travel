<?php
/**
 * Plugin Name: Kodeforest Tab
 * Plugin URI: http://kodeforest.com/
 * Description: A widget that show popular posts( Specified by comment ).
 * Version: 1.0
 * Author: Kodeforest
 * Author URI: http://www.kodeforest.com
 *
 */

add_action( 'widgets_init', 'kode_tab_widget' );
if( !function_exists('kode_tab_widget') ){
	function kode_tab_widget() {
		register_widget( 'Kodeforest_Tab' );
	}
}

if( !class_exists('Kodeforest_Tab') ){
	class Kodeforest_Tab extends WP_Widget{

		// Initialize the widget
		function __construct() {
			parent::__construct(
				'kode_tab_widget', 
				esc_attr__('Kodeforest Tab Widget','kode_forest'), 
				array('description' => esc_attr__('A widget that show popular posts ( by comment )', 'kode_forest')));  
		}

		// Output of the widget
		function widget( $args, $instance ) {
			global $theme_option;	
				
			$title = apply_filters( 'widget_title', $instance['title'] );
			$category = $instance['category'];
			$num_fetch = $instance['num_fetch'];
			
			// Opening of widget
			echo $args['before_widget'];
			
			// Open of title tag
			if( !empty($title) ){ 
				echo $args['before_title'] . esc_attr($title) . $args['after_title']; 
			}
				
			// Widget Content
			$current_post = array(get_the_ID());		
			$query_args = array('post_type' => 'post', 'suppress_filters' => false);
			$query_args['posts_per_page'] = $num_fetch;
			$query_args['orderby'] = 'kode_popular_post_views_count meta_value_num';
			$query_args['order'] = 'desc';
			$query_args['paged'] = 1;
			$query_args['meta_key'] = 'kode_popular_post_views_count';
			$query_args['category_name'] = $category;
			$query_args['ignore_sticky_posts'] = 1;
			$query_args['post__not_in'] = array(get_the_ID());
			$query = new WP_Query( $query_args );
                 echo '
				<div class="kd-bookingtab">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="active"><a href="#tab_popular" aria-controls="tab_popular" role="tab" data-toggle="tab">Popular Posts</a></li>
						<li><a href="#tab_recent" aria-controls="tab_recent" role="tab" data-toggle="tab">Recent Posts</a></li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content">';
					if($query->have_posts()){
						echo '<div role="tabpanel" class="tab-pane active" id="tab_popular">';
							echo '<div class="widget-blogpost">';
								echo '<ul class="recent-posts">';
									while($query->have_posts()){
										$query->the_post();
										$thumbnail = kode_get_image(get_post_thumbnail_id(), array(80,80));
										echo '
										<li>
											<figure><a href="' . esc_url(get_permalink()) . '">'.$thumbnail.'</a></figure>
											<div class="kd-post-info">
												<h6><a href="' . esc_url(get_permalink()) . '">' . esc_attr(get_the_title()) . '</a></h6>
												<div class="datetime">'.esc_attr(get_the_date()).'</div>
											</div>
										</li>';
									}
								echo '</ul>';
							echo '</div>';
						echo '</div>';
					} //Condition Ends
					wp_reset_postdata();
				$current_post = array(get_the_ID());		
				$k_query_args = array('post_type' => 'post', 'suppress_filters' => false);
				$k_query_args['posts_per_page'] = $num_fetch;
				$k_query_args['orderby'] = 'post_date';
				$k_query_args['order'] = 'desc';
				$k_query_args['paged'] = 1;
				$k_query_args['category_name'] = $category;
				$k_query_args['ignore_sticky_posts'] = 1;
				$k_query_args['post__not_in'] = array(get_the_ID());
				$k_query = new WP_Query( $k_query_args );
					if($k_query->have_posts()){
						echo '<div role="tabpanel" class="tab-pane" id="tab_recent">';
							echo '<div class="widget-blogpost">';
								echo '<ul class="recent-posts">';
									while($k_query->have_posts()){
										$k_query->the_post();
										$thumbnail = kode_get_image(get_post_thumbnail_id(), array(80,80));
										echo '
										<li>
											<figure><a href="' . esc_url(get_permalink()) . '">'.$thumbnail.'</a></figure>
											<div class="kd-post-info">
												<h6><a href="' . esc_url(get_permalink()) . '">' . esc_attr(get_the_title()) . '</a></h6>
												<div class="datetime">'.esc_attr(get_the_date()).'</div>
											</div>
										</li>';
									}
								echo '</ul>';
							echo '</div>';
						echo '</div>';
					} //Condition Ends
					echo '</div>';
				echo '</div>';	
			// Closing of widget
			echo $args['after_widget'];	
		}

		// Widget Form
		function form( $instance ) {
			$title = isset($instance['title'])? $instance['title']: '';
			$category = isset($instance['category'])? $instance['category']: '';
			$num_fetch = isset($instance['num_fetch'])? $instance['num_fetch']: 3;
			
			?>

			<!-- Text Input -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Title :', 'kode_forest'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
			</p>		

			<!-- Post Category -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('category')); ?>"><?php esc_attr_e('Category :', 'kode_forest'); ?></label>		
				<select class="widefat" name="<?php echo esc_attr($this->get_field_name('category')); ?>" id="<?php echo esc_attr($this->get_field_id('category')); ?>">
				<option value="" <?php if(empty($category)) echo ' selected '; ?>><?php esc_attr_e('All', 'kode_forest') ?></option>
				<?php 	
				$category_list = kode_get_term_list('category'); 
				foreach($category_list as $cat_slug => $cat_name){ ?>
					<option value="<?php echo esc_attr($cat_slug); ?>" <?php if ($category == $cat_slug) echo ' selected '; ?>><?php echo esc_attr($cat_name); ?></option>				
				<?php } ?>	
				</select> 
			</p>
				
			<!-- Show Num --> 
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('num_fetch')); ?>"><?php esc_attr_e('Num Fetch :', 'kode_forest'); ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('num_fetch')); ?>" name="<?php echo esc_attr($this->get_field_name('num_fetch')); ?>" type="text" value="<?php echo esc_attr($num_fetch); ?>" />
			</p>

		<?php
		}
		
		// Update the widget
		function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = (empty($new_instance['title']))? '': strip_tags($new_instance['title']);
			$instance['category'] = (empty($new_instance['category']))? '': strip_tags($new_instance['category']);
			$instance['num_fetch'] = (empty($new_instance['num_fetch']))? '': strip_tags($new_instance['num_fetch']);

			return $instance;
		}	
	}
}
?>