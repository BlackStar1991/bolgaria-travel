<?php
/**
 * Plugin Name: Kodeforest Travel
 * Plugin URI: http://kodeforest.com/
 * Description: A widget that show travelling detail.
 * Version: 1.0
 * Author: Kodeforest
 * Author URI: http://www.kodeforest.com
 *
 */

add_action( 'widgets_init', 'kode_travel_widget' );
if( !function_exists('kode_travel_widget') ){
	function kode_travel_widget() {
		register_widget( 'Kodeforest_Travel' );
	}
}

if( !class_exists('Kodeforest_Travel') ){
	class Kodeforest_Travel extends WP_Widget{

		// Initialize the widget
		function __construct() {
			parent::__construct(
				'kode_travel_widget', 
				esc_attr__('Kodeforest Travel Widget','kode_forest'), 
				array('description' => esc_attr__('A widget that show travelling detail.', 'kode_forest')));  
		}

		// Output of the widget
		function widget( $args, $instance ) {
			global $theme_option;	
				
			$title = apply_filters( 'widget_title', $instance['title'] );
			$tab_icon_1 = $instance['tab_icon_1'];
			$tab_1 = $instance['tab_1'];
			$tab_icon_2 = $instance['tab_icon_2'];
			$tab_2 = $instance['tab_2'];
			$tab_icon_3 = $instance['tab_icon_3'];
			$tab_3 = $instance['tab_3'];
			$tab_icon_4 = $instance['tab_icon_4'];
			$tab_4 = $instance['tab_4'];
			
			// Opening of widget
			echo $args['before_widget'];
			
			// Open of title tag
			if( !empty($title) ){ 
				echo $args['before_title'] . esc_attr($title) . $args['after_title']; 
			}
				
			 echo '<div class="kd-bookingtab">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="active"><a href="#tab_1" aria-controls="tab_1" role="tab" data-toggle="tab"><i class="fa '.esc_attr($tab_icon_1).'"></i></a></li>
					<li><a href="#tab_2" aria-controls="tab_2" role="tab" data-toggle="tab"><i class="fa '.esc_attr($tab_icon_2).'"></i></a></li>
					<li><a href="#tab_3" aria-controls="tab_3" role="tab" data-toggle="tab"><i class="fa '.esc_attr($tab_icon_3).'"></i></a></li>
					<li><a href="#tab_4" aria-controls="tab_4" role="tab" data-toggle="tab"><i class="fa '.esc_attr($tab_icon_4).'"></i></a></li>
				</ul>
                <!-- Tab panes -->
                <div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="tab_1">
						'.do_shortcode(html_entity_decode($tab_1)).'
					</div>
					<div role="tabpanel" class="tab-pane" id="tab_2">
						'.do_shortcode(html_entity_decode($tab_2)).'
					</div>
					<div role="tabpanel" class="tab-pane" id="tab_3">
						'.do_shortcode(html_entity_decode($tab_3)).'
					</div>
					<div role="tabpanel" class="tab-pane" id="tab_4">
						'.do_shortcode(html_entity_decode($tab_4)).'
					</div>
				</div>
			</div>';
					
			// Closing of widget
			echo $args['after_widget'];	
		}

		// Widget Form
		function form( $instance ) {
			$title = isset($instance['title'])? $instance['title']: '';
			$tab_icon_1 = isset($instance['tab_icon_1'])? $instance['tab_icon_1']: '';
			$tab_icon_2 = isset($instance['tab_icon_2'])? $instance['tab_icon_2']: '';
			$tab_icon_3 = isset($instance['tab_icon_3'])? $instance['tab_icon_3']: '';
			$tab_icon_4 = isset($instance['tab_icon_4'])? $instance['tab_icon_4']: '';
			$tab_1 = isset($instance['tab_1'])? $instance['tab_1']: '';
			$tab_2 = isset($instance['tab_2'])? $instance['tab_2']: '';
			$tab_3 = isset($instance['tab_3'])? $instance['tab_3']: '';
			$tab_4 = isset($instance['tab_4'])? $instance['tab_4']: '';
			?>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Title :', 'kode_forest'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
			</p>	
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('tab_icon_1')); ?>"><?php esc_attr_e('Tab Icon 1', 'kode_forest'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('tab_icon_1')); ?>" name="<?php echo esc_attr($this->get_field_name('tab_icon_1')); ?>" type="text" value="<?php echo esc_attr($tab_icon_1); ?>" />
			</p>	
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('tab_1')); ?>">
					<?php esc_attr_e('Tab 1 Description:','kode_forest');?>
					<textarea rows="2"  cols="35" class="widefat" id="<?php echo esc_html($this->get_field_id('tab_1')); ?>" name="<?php echo esc_html($this->get_field_name('tab_1')); ?>"><?php echo esc_html($tab_1); ?></textarea>
				</label>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('tab_icon_2')); ?>"><?php esc_attr_e('Tab Icon 2', 'kode_forest'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('tab_icon_2')); ?>" name="<?php echo esc_attr($this->get_field_name('tab_icon_2')); ?>" type="text" value="<?php echo esc_attr($tab_icon_2); ?>" />
			</p>	
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('tab_2')); ?>">
					<?php esc_attr_e('Tab 2 Description:','kode_forest');?>
					<textarea rows="2"  cols="35" class="widefat" id="<?php echo esc_html($this->get_field_id('tab_2')); ?>" name="<?php echo esc_html($this->get_field_name('tab_2')); ?>"><?php echo esc_html($tab_2); ?></textarea>
				</label>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('tab_icon_3')); ?>"><?php esc_attr_e('Tab Icon 3', 'kode_forest'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('tab_icon_3')); ?>" name="<?php echo esc_attr($this->get_field_name('tab_icon_3')); ?>" type="text" value="<?php echo esc_attr($tab_icon_3); ?>" />
			</p>	
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('tab_3')); ?>">
					<?php esc_attr_e('Tab 3 Description:','kode_forest');?>
					<textarea rows="2"  cols="35" class="widefat" id="<?php echo esc_html($this->get_field_id('tab_3')); ?>" name="<?php echo esc_html($this->get_field_name('tab_3')); ?>"><?php echo esc_html($tab_3); ?></textarea>
				</label>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('tab_icon_4')); ?>"><?php esc_attr_e('Tab Icon 4', 'kode_forest'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('tab_icon_4')); ?>" name="<?php echo esc_attr($this->get_field_name('tab_icon_4')); ?>" type="text" value="<?php echo esc_attr($tab_icon_4); ?>" />
			</p>	
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('tab_4')); ?>">
					<?php esc_attr_e('Tab 4 Description:','kode_forest');?>
					<textarea rows="2"  cols="35" class="widefat" id="<?php echo esc_html($this->get_field_id('tab_4')); ?>" name="<?php echo esc_html($this->get_field_name('tab_4')); ?>"><?php echo esc_html($tab_4); ?></textarea>
				</label>
			</p>
		<?php
		}
		
		// Update the widget
		function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = (empty($new_instance['title']))? '': esc_html($new_instance['title']);
			$instance['tab_icon_1'] = (empty($new_instance['tab_icon_1']))? '': esc_html($new_instance['tab_icon_1']);
			$instance['tab_1'] = (empty($new_instance['tab_1']))? '': esc_html($new_instance['tab_1']);
			$instance['tab_icon_2'] = (empty($new_instance['tab_icon_2']))? '': esc_html($new_instance['tab_icon_2']);
			$instance['tab_2'] = (empty($new_instance['tab_2']))? '': esc_html($new_instance['tab_2']);
			$instance['tab_icon_3'] = (empty($new_instance['tab_icon_3']))? '': esc_html($new_instance['tab_icon_3']);
			$instance['tab_3'] = (empty($new_instance['tab_3']))? '': esc_html($new_instance['tab_3']);
			$instance['tab_icon_4'] = (empty($new_instance['tab_icon_4']))? '': esc_html($new_instance['tab_icon_4']);
			$instance['tab_4'] = (empty($new_instance['tab_4']))? '': esc_html($new_instance['tab_4']);
			
			return $instance;
		}	
	}
}
?>