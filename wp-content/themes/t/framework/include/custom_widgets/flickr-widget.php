<?php
/**
 * Plugin Name: Kodeforest Flickr Widget
 * Plugin URI: http://kodeforest.com/
 * Description: A widget that show flickr image.
 * Version: 1.0
 * Author: Kodeforest
 * Author URI: http://www.kodeforest.com
 *
 */

add_action( 'widgets_init', 'kode_flickr_widget' );
if( !function_exists('kode_flickr_widget') ){
	function kode_flickr_widget() {
		register_widget( 'Kodeforest_Flickr_Widget' );
	}
}

if( !class_exists('Kodeforest_Flickr_Widget') ){
	class Kodeforest_Flickr_Widget extends WP_Widget{

		// Initialize the widget
		function __construct() {
			parent::__construct(
				'kode_flickr_widget', 
				__('Kodeforest Flickr Widget','kode_forest'), 
				array('description' => __('A widget that show image from flickr', 'kode_forest')));  
		}

		// Output of the widget
		function widget( $args, $instance ) {
			global $theme_option;	
				
			$title = apply_filters( 'widget_title', $instance['title'] );
			$id = $instance['id'];
			$num_fetch = $instance['num_fetch'];
			$orderby = $instance['orderby'];
			
			// Opening of widget
			echo $args['before_widget'];
			
			// Open of title tag
			if( !empty($title) ){ 
				echo $args['before_title'] . esc_attr($title) . $args['after_title']; 
			}
				
			// Widget Content
			if(!empty($id)){ 
				$flickr  = '?count=' . $num_fetch;
				$flickr .= '&amp;display=' . $orderby;
				$flickr .= '&amp;user=' . $id;
				$flickr .= '&amp;size=s&amp;layout=x&amp;source=user';
				?>
					<div class="kode-flickr-widget">
					<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne<?php echo esc_url($flickr); ?>"></script>
					<div class="clear"></div>
					</div>
				<?php
			}
					
			// Closing of widget
			echo $args['after_widget'];	
		}

		// Widget Form
		function form( $instance ) {
			$title = isset($instance['title'])? esc_attr($instance['title']): '';
			$id = isset($instance['id'])? esc_attr($instance['id']): '';
			$num_fetch = isset($instance['num_fetch'])? esc_attr($instance['num_fetch']): 6;
			$orderby = isset($instance['orderby'])? esc_attr($instance['orderby']): 'latest';
			
			?>

			<!-- Text Input -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Title :', 'kode_forest'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
			</p>	
			
			<!-- ID --> 
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('id')); ?>"><?php esc_attr_e('Flickr ID :', 'kode_forest'); ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('id')); ?>" name="<?php echo esc_attr($this->get_field_name('id')); ?>" type="text" value="<?php echo esc_attr($id); ?>" />
			</p>			

			<!-- Show Num --> 
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('num_fetch')); ?>"><?php esc_attr_e('Num Fetch :', 'kode_forest'); ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('num_fetch')); ?>" name="<?php echo esc_attr($this->get_field_name('num_fetch')); ?>" type="text" value="<?php echo esc_attr($num_fetch); ?>" />
			</p>			

			<!-- Order By -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('orderby')); ?>"><?php esc_attr_e('Order By :', 'kode_forest'); ?></label>		
				<select class="widefat" name="<?php echo esc_attr($this->get_field_name('orderby')); ?>" id="<?php echo esc_attr($this->get_field_id('orderby')); ?>">
					<option value="latest" <?php if(empty($orderby) || $orderby == 'latest') echo ' selected '; ?>><?php esc_attr_e('Latest', 'kode_forest') ?></option>
					<option value="random" <?php if($orderby == 'random') echo ' selected '; ?>><?php esc_attr_e('Random', 'kode_forest') ?></option>				
				</select> 
			</p>
				


		<?php
		}
		
		// Update the widget
		function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = (empty($new_instance['title']))? '': strip_tags($new_instance['title']);
			$instance['id'] = (empty($new_instance['id']))? '': strip_tags($new_instance['id']);
			$instance['num_fetch'] = (empty($new_instance['num_fetch']))? '': strip_tags($new_instance['num_fetch']);
			$instance['orderby'] = (empty($new_instance['orderby']))? '': strip_tags($new_instance['orderby']);

			return $instance;
		}	
	}
}
?>