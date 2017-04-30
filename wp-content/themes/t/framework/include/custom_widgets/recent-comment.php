<?php
/**
 * Plugin Name: Kodeforest Recent Comment
 * Plugin URI: http://kodeforest.com/
 * Description: A widget that show recent comment.
 * Version: 1.0
 * Author: Kodeforest
 * Author URI: http://www.kodeforest.com
 *
 */

add_action( 'widgets_init', 'kode_recent_comment_widget' );
if( !function_exists('kode_recent_comment_widget') ){
	function kode_recent_comment_widget() {
		register_widget( 'Kodeforest_Recent_Comment' );
	}
}

if( !class_exists('Kodeforest_Recent_Comment') ){
	class Kodeforest_Recent_Comment extends WP_Widget{

		// Initialize the widget
		function __construct() {
			parent::__construct(
				'kode_recent_comment_widget', 
				esc_attr__('Kodeforest Recent Comment Widget','kode_forest'), 
				array('description' => esc_attr__('A widget that show lastest comment', 'kode_forest')));  
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
			$posts_list = get_posts(array('category_name' => $category, 'numberposts'=>9999));
			$post_ids = array();
			foreach ($posts_list as $post) {
				$post_ids[] = $post->ID;
			}			
			
			$recent_comments = get_comments( array(
				'post_id__in' => $post_ids, 
				'number' => $num_fetch, 
				'status' => 'approve') 
			);
			
			echo '<div class="kode-recent-comment-widget">';
			foreach( $recent_comments as $recent_comment ){
					$comment_permalink = get_permalink($recent_comment->comment_post_ID) . '#comment-' . $recent_comment->comment_ID;
					echo '<div class="recent-commnet-widget">';

					echo '<div class="recent-comment-widget-thumbnail"><a href="' . esc_url($comment_permalink) . '" >';
					echo get_avatar( $recent_comment->user_id, 55 );
					echo '</a></div>';

					echo '<div class="recent-comment-widget-content">';
					echo '<div class="recent-comment-widget-title"><a href="' . esc_url($comment_permalink) . '" >' . esc_attr($recent_comment->comment_author) . '</a></div>';
					
					echo '<div class="recent-comment-widget-info">';
					echo esc_attr__('Commented On', 'kode_forest') . ' ';
					echo esc_attr(get_comment_date($theme_option['date-format'], $recent_comment->comment_ID)); 			
					echo '</div>';
					
					echo '<div class="recent-comment-widget-excerpt">';
					echo esc_attr(substr($recent_comment->comment_content, 0, 90));
					if( strlen($recent_comment->comment_content) > 90 ){
						echo '...';
					}
					echo '</div>';
					echo '</div>';
					
					echo '<div class="clear"></div>';
					echo '</div>';

			}
			echo '<div class="clear"></div>';
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