<?php
/**
 * Plugin Name: Kodeforest Recent Post
 * Plugin URI: http://kodeforest.com/
 * Description: A widget that show recent posts( Specified by category ).
 * Version: 1.0
 * Author: Kodeforest
 * Author URI: http://www.kodeforest.com
 *
 */

add_action( 'widgets_init', 'kode_contact_widget' );
if( !function_exists('kode_contact_widget') ){
	function kode_contact_widget() {
		register_widget( 'Kodeforest_Contact' );
	}
}

if( !class_exists('Kodeforest_Contact') ){
	class Kodeforest_Contact extends WP_Widget{

		// Initialize the widget
		function __construct() {
			parent::__construct(
				'kode_contact_widget', 
				esc_attr__('Kodeforest Contact Widget','KodeForest'), 
				array('description' => esc_attr__('A widget that show contact us information.', 'KodeForest')));  
		}

		// Output of the widget
		function widget( $args, $instance ) {
			global $theme_option;	
				
			$title = apply_filters( 'widget_title', $instance['title'] );
			// $description = $instance['description'];
			$address = $instance['address'];
			$phone = $instance['phone'];
			$email = $instance['email'];
			$website = $instance['website'];
			// $social_icons = $instance['social_icons'];
			

			// Opening of widget
			echo $args['before_widget'];
			
			// Open of title tag
			if( !empty($title) ){ 
				echo $args['before_title'] . esc_attr($title) . $args['after_title']; 
			}
			?>
				<div class="textwidget">
					<div class="kd-userinfo-widget">
						<ul>
							<li>
								<i class="fa fa-map-marker"></i>
								<p><?php echo esc_attr($address);?></p>
							</li>
							<li>
								<i class="fa fa-phone"></i>
								<p><?php echo esc_attr($phone);?></p>
							</li>
							<li>
								<i class="fa fa-home"></i>
								<p><?php echo esc_url($website);?></p>
							</li>
							<li>
								<i class="fa fa-envelope-o"></i>
								<p><?php echo esc_attr($email);?></p>
							</li>
						</ul>
					</div>
				</div>
<?php
					
			// Closing of widget
			echo $args['after_widget'];	
		}

		// Widget Form
		function form( $instance ) {
			$title = isset($instance['title'])? $instance['title']: '';
			$description = isset($instance['description'])? $instance['description']: '';
			$address = isset($instance['address'])? $instance['address']: '';
			$phone = isset($instance['phone'])? $instance['phone']: '';
			$email = isset($instance['email'])? $instance['email']: '';
			$website = isset($instance['website'])? $instance['website']: '';
		
			
			?>

			<!-- Text Input -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Title :', 'KodeForest'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
			</p>
			<!-- Description 			
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('description')); ?>"><?php esc_attr_e('Description :', 'KodeForest'); ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('description')); ?>" name="<?php echo esc_attr($this->get_field_name('description')); ?>" type="text" value="<?php echo esc_attr($description); ?>" />
			</p>
			<!-- Address --> 
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_attr_e('Address :', 'KodeForest'); ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" type="text" value="<?php echo esc_attr($address); ?>" />
			</p>
			<!-- Phone --> 
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php esc_attr_e('Phone :', 'KodeForest'); ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" type="text" value="<?php echo esc_attr($phone); ?>" />
			</p>
			<!-- Email --> 
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php esc_attr_e('Email :', 'KodeForest'); ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="text" value="<?php echo esc_attr($email); ?>" />
			</p>
			<!-- Website --> 
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('website')); ?>"><?php esc_attr_e('Website :', 'KodeForest'); ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('website')); ?>" name="<?php echo esc_attr($this->get_field_name('website')); ?>" type="text" value="<?php echo esc_attr($website); ?>" />
			</p>
			
		<?php
		}
		
		// Update the widget
		function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = (empty($new_instance['title']))? '': strip_tags($new_instance['title']);
			$instance['description'] = (empty($new_instance['description']))? '': strip_tags($new_instance['description']);
			$instance['address'] = (empty($new_instance['address']))? '': strip_tags($new_instance['address']);
			$instance['phone'] = (empty($new_instance['phone']))? '': strip_tags($new_instance['phone']);
			$instance['email'] = (empty($new_instance['email']))? '': strip_tags($new_instance['email']);
			$instance['website'] = (empty($new_instance['website']))? '': strip_tags($new_instance['website']);
			

			return $instance;
		}	
	}
}
?>