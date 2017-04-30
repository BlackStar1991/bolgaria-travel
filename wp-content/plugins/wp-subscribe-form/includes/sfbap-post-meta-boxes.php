<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
add_action( 'add_meta_boxes' , 'sfbap_add_meta_boxes');

/* META BOXES */

function sfbap_add_meta_boxes(){
// Shortcode meta box
	add_meta_box( 'sfbap_shortcode_meta_box' , 'Shortcode' , 'sfbap_shortcode_meta_box_UI' , 'sfbap_subscribe_form','side');

// Subscribe Form Showcase meta box
	add_meta_box( 'sfbap_form_showcase_meta_box' , 'Select Subscribe Form Template' , 'sfbap_form_showcase_meta_box_UI' , 'sfbap_subscribe_form'); 

// Meta Box to Load Subscribe Form Template
	add_meta_box( 'sfbap_form_load_form' , 'Customization & Subscription Settings' , 'sfbap_form_load_form_UI' , 'sfbap_subscribe_form'); 

// Meta Box Premium Version Offer
	add_meta_box( 'sfbap_buy_premium_meta_box' , 'Buy Premium And:' , 'sfbap_premium_version' , 'sfbap_subscribe_form' , 'side' , 'high'); 

// Meta Box Premium Version Offer
	add_meta_box( 'sfbap_promotion_meta_box' , 'You may also need:' , 'sfbap_promotion' , 'sfbap_subscribe_form' , 'side'); 
}


function sfbap_promotion(){
	?>
	<style type="text/css">
		#sfbap_promotion_meta_box .inside{
			margin: 0 !important;
			padding:0;
			margin-top: 5px; 
		}
	</style>
	<a href="https://www.arrowplugins.com/ultimate-popup" target="_blank"><img width="100%" src="<?php echo plugins_url('images/promotion.png' , __FILE__); ?>" /></a>
	<strong>
	<ul style="margin-left: 10px;">
		<li> - 14 Beautifully Designed Popup</li>
		<li> - MailChimp, GetResponse, Active Campaign</li>
		<li> - Highly Customizable</li>
		<li> - Mobile Friendly (Responsive)</li>
		<li> - And much more...</li>
	</ul>
	</strong>
<?php }


function sfbap_premium_version(){

	?>
	<style type="text/css">
	.sfbap-action-button{
		    width: 93%;
    text-align: center;
    background: #e14d43;
    display: block;
    padding: 18px 8px;
    font-size: 16px;
    border-radius: 5px;
    color: white;
    text-decoration: none;
    border: 2px solid #e14d43;

    transition: all  0.2s;
	}
	.sfbap-action-button:hover{
		    width: 93%;
    text-align: center;
    display: block;
    padding: 18px 8px;
    font-size: 16px;
    border-radius: 5px;
    color: white !important;
    text-decoration: none;
    background: #bb4138 !important;
    border: 2px solid #bb4138;
	}

	</style><strong>
	<ul>
		<li> - Unlock All Form Templates</li>
		<li> - Create Unlimited Forms</li>
		<li> - Unlock MailChimp Integration</li>
		<li> - Unlock GetResponse Integration</li>
		<li> - Unlock Active Campaign Integration</li>
		<li> - Embed Forms in your Widgets</li>
		<li> - Unlock All Customization Options</li>
		<li> - Get 24/7 Premium Support</li>
		<li> - Unlimited Updates</li>
	</ul>
	</strong>
	 <a href="https://www.arrowplugins.com/wordpress-subscribe-form/" target="_blank" class="sfbap-action-button">GET PREMIUM NOW</a>
	<?php
}

function sfbap_shortcode_meta_box_UI( $post ){
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );

	$sfbap_generated_shortcode = get_post_meta($post->ID, '_sfbap_shortcode_value', true);
	?>
	<p id="sfbap_shortcode_label">Use this shortcode to add Subscribe Form in your posts & pages: </p>
	<input type="text" readonly id="sfbap_shortcode_value" name="sfbap_shortcode_value" value="[arrow_forms id='<?php echo $post->ID; ?>']" />
	<p id="sfbap_shortcode_label" >To add Subscribe Form into your Widget area use this shortcode:</p>
	<a href="https://www.arrowplugins.com/wordpress-subscribe-form" target="_blank">Add Forms in your Widgets (Premium Feature)</a>
	
	<?php
}

function sfbap_form_showcase_meta_box_UI( $post ){




	wp_nonce_field( 'sfbap_form_options_data' , 'sfbap_form_options_nonce_meta_box' );

	$sfbap_form_template = get_post_meta($post->ID, '_sfbap_form_template', true);
	?>
	<div id="sfbap-loading-div" style="display: none;"><img id="sfbap-gears" src='<?php echo plugins_url('images/gears.gif',__FILE__);?>'/></div>

	<div id="sfbap_form_template_container" class="sfbap_form_template_container">
		<input id="sfbap_form1_template"  type="radio" name='sfbap_form_template' value='subscribeform1'<?php checked( "subscribeform1", $sfbap_form_template); ?> />
		<label for="sfbap_form1_template"><strong><?php _e('Form 1', 'sfbap'); ?></strong></label><br/>
		<label for="sfbap_form1_template">
			<img width="300px" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/form1.png'; ?>"/>
		</label> 
	</div>
	<div id="sfbap_form_template_container" class="">
		<input id="sfbap_form2_template" disabled  type="radio" name='sfbap_form_template'/>
		<label for="sfbap_form2_template"><strong><?php _e('Form 2 <a href="https://www.arrowplugins.com/wordpress-subscribe-form" target="_blank">Included in Premium Version</a>', 'sfbap'); ?></strong></label><br/>
		<label for="sfbap_form2_template">
			<img width="300px" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/form2.png'; ?>"/>
		</label>
	</div>
	<div id="sfbap_form_template_container" class="">
		<input id="sfbap_form3_template" disabled type="radio" name='sfbap_form_template' />
		<label for="sfbap_form3_template"><strong><?php _e('Form 3 <a href="https://www.arrowplugins.com/wordpress-subscribe-form" target="_blank">Included in Premium Version</a>', 'sfbap'); ?></strong></label><br/>
		<label for="sfbap_form3_template">
			<img width="300px" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/form3.png'; ?>"/>
		</label>
	</div>
	<div id="sfbap_form_template_container" class="">
		<input id="sfbap_form4_template" disabled type="radio" name='sfbap_form_template' />
		<label for="sfbap_form4_template"><strong><?php _e('Form 4 <a href="https://www.arrowplugins.com/wordpress-subscribe-form" target="_blank">Included in Premium Version</a>', 'sfbap'); ?></strong></label><br/>
		<label for="sfbap_form4_template">
			<img width="300px" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/form4.png'; ?>"/>
		</label>
	</div>
	<div id="sfbap_form_template_container" class="">
		<input id="sfbap_form5_template" disabled type="radio" name='sfbap_form_template' />
		<label for="sfbap_form5_template"><strong><?php _e('Form 5 <a href="https://www.arrowplugins.com/wordpress-subscribe-form" target="_blank">Included in Premium Version</a>', 'sfbap'); ?></strong></label><br/>
		<label for="sfbap_form5_template">
			<img width="300px" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/form5.png'; ?>"/>
		</label>
	</div>
	<div id="sfbap_form_template_container" class="">
		<input id="sfbap_form6_template" disabled type="radio" name='sfbap_form_template' />
		<label for="sfbap_form6_template"><strong><?php _e('Form 6 <a href="https://www.arrowplugins.com/wordpress-subscribe-form" target="_blank">Included in Premium Version</a>', 'sfbap'); ?></strong></label><br/>
		<label for="sfbap_form6_template">
			<img width="300px" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/form6.png'; ?>"/>
		</label>
	</div>
	<div id="sfbap_form_template_container" class="">
		<input id="sfbap_form7_template" disabled type="radio" name='sfbap_form_template' />
		<label for="sfbap_form7_template"><strong><?php _e('Form 7 <a href="https://www.arrowplugins.com/wordpress-subscribe-form" target="_blank">Included in Premium Version</a>', 'sfbap'); ?></strong></label><br/>
		<label for="sfbap_form7_template">
			<img width="300px" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/form7.png'; ?>"/>
		</label>
	</div>
	<div id="sfbap_form_template_container" class="">
		<input id="sfbap_form8_template" disabled type="radio" name='sfbap_form_template' />
		<label for="sfbap_form8_template"><strong><?php _e('Form 8 <a href="https://www.arrowplugins.com/wordpress-subscribe-form" target="_blank">Included in Premium Version</a>', 'sfbap'); ?></strong></label><br/>
		<label for="sfbap_form8_template">
			<img width="300px" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/form8.png'; ?>"/>
		</label>
	</div>
	<div id="sfbap_form_template_container" class="">
		<input id="sfbap_form9_template" disabled type="radio" name='sfbap_form_template' />
		<label for="sfbap_form9_template"><strong><?php _e('Form 9 <a href="https://www.arrowplugins.com/wordpress-subscribe-form" target="_blank">Included in Premium Version</a>', 'sfbap'); ?></strong></label><br/>
		<label for="sfbap_form9_template">
			<img width="300px" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/form9.png'; ?>"/>
		</label>
	</div>
	<div id="sfbap_form_template_container" class="">
		<input id="sfbap_form10_template" disabled type="radio" name='sfbap_form_template' />
		<label for="sfbap_form10_template"><strong><?php _e('Form 10 <a href="https://www.arrowplugins.com/wordpress-subscribe-form" target="_blank">Included in Premium Version</a>', 'sfbap'); ?></strong></label><br/>
		<label for="sfbap_form10_template">
			<img width="300px" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/form10.png'; ?>"/>
		</label>
	</div>
	<div id="sfbap_form_template_container" class="">
		<input id="sfbap_form11_template" disabled type="radio" name='sfbap_form_template' />
		<label for="sfbap_form11_template"><strong><?php _e('Form 11 <a href="https://www.arrowplugins.com/wordpress-subscribe-form" target="_blank">Included in Premium Version</a>', 'sfbap'); ?></strong></label><br/>
		<label for="sfbap_form11_template">
			<img width="300px" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/form11.png'; ?>"/>
		</label>
	</div>
	<div id="sfbap_form_template_container" class="">
		<input id="sfbap_form12_template" disabled type="radio" name='sfbap_form_template' />
		<label for="sfbap_form12_template"><strong><?php _e('Form 12 <a href="https://www.arrowplugins.com/wordpress-subscribe-form" target="_blank">Included in Premium Version</a>', 'sfbap'); ?></strong></label><br/>
		<label for="sfbap_form12_template">
			<img width="300px" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/form12.png'; ?>"/>
		</label>
	</div>
	<input style="opacity: 0;" type="submit" name="submit" id="sfbap_submit" class="button button-primary" value="Save Changes"  />
	<?php
	/*include('/../forms/subscribeform1.php');*/
}

function sfbap_form_load_form_UI( $post ){
 wp_nonce_field( 'sfbap_meta_box_nonce', 'sfbap_nonce' );

	$sfbap_selected_form_template = get_post_meta($post->ID, '_sfbap_form_template', true);
	$sfbap_subscription_selection_dd = get_post_meta($post->ID, '_sfbap_subscription_selection_dd', true);
	$sfbap_sent_to_email = get_post_meta($post->ID, '_sfbap_sent_to_email', true);
	if(isset($sfbap_selected_form_template) && $sfbap_selected_form_template != ''){

		?>
		<div id="sfbap_subscriber_selection_container">
			<table>
				<tr>
					<td>
						<label>Where to save Subscriber: </label>
					</td>
					<td>
						<select id="sfbap_subscription_selection_dd" name="sfbap_subscription_selection_dd">
							<option value="database" <?php selected( $sfbap_subscription_selection_dd, 'database' ); ?>>Local Database</option>
							<option value="mail" <?php selected( $sfbap_subscription_selection_dd, 'mail' ); ?>>Sent to Mail</option>
							<option value="mailchimp">MailChimp (Premium)</option>
							<option value="getresponse">GetResponse (Premium)</option>
							<option value="activecampaign">Active Campaign (Premium)</option>
						</select>
					</td>
					<td>
					<div id="sfbap_mail_selection" style="display: none;">
						<label>Enter email address: </label>
						<input type="email" id="sfbap_sent_to_email" name="sfbap_sent_to_email" value="<?php echo $sfbap_sent_to_email; ?>" placeholder="name@domain.com" />
					</div>
						<div id="sfbap_mailchimp_selection" style="display: none;">

						<?php 
						$get_mc_lists = get_option('sfbap_mc_api_key');
						if ($get_mc_lists == '') {
							?>
								<p style="margin: 0;font-size: 17px;">To Unlock MailChimp Integration Please <a href="https://www.arrowplugins.com/wordpress-subscribe-form" target="_blank">BUY PREMIUM VERSION</a></p>
								<?php
						} ?>
						</div>
						<div id="sfbap_getresponse_selection" style="display: none;">
						<?php 
						$get_gr_lists = get_option('sfbap_gr_api_key');
						if (isset($get_gr_lists) && $get_gr_lists =='') {
							?>
								<p style="margin: 0;font-size: 17px;">To Unlock GetResponse Integration Please <a href="https://www.arrowplugins.com/wordpress-subscribe-form" target="_blank">BUY PREMIUM VERSION</a></p>
								<?php
						}?>
						</div>
						<div id="sfbap_activecampaign_selection" style="display: none;">
							<?php 
							$sfbap_ac_url = get_option('sfbap_ac_url');
							$sfbap_ac_api_key = get_option('sfbap_ac_api_key');
							if ( isset($sfbap_ac_url) && isset($sfbap_ac_api_key) && $sfbap_ac_url == '') {
								?>
								<p style="margin: 0;font-size: 17px;">To Unlock Active Campaign Integration Please <a href="https://www.arrowplugins.com/wordpress-subscribe-form" target="_blank">BUY PREMIUM VERSION</a></p>
								<?php
								}?>


						</div>
					</td>
				</tr>
			</table>
		</div>
<input type="text" readonly id="sfbap_shortcode_value" name="sfbap_shortcode_value" value="Shortcode: [arrow_forms id='<?php echo $post->ID; ?>']" />
<div id="sfbap-form-customizer-container" style="">
	<div id="sfbap_option_subcontainer">
		<?php include( SFBAP_PLUGIN_PATH . 'forms/'.$sfbap_selected_form_template.'-options.php'); ?>
	</div>
	<div id="sfbap_form_view_container">
		<?php 
			include( SFBAP_PLUGIN_PATH . 'forms/'.$sfbap_selected_form_template.'.php'); 
		?> 
	</div>
	
	<p>
		<input name="save" type="submit" class="sfbap-update-form-button button button-primary button-large" id="publish" value="Update Form">
	</p>
</div> <?php
}
}

add_filter( 'gettext', 'sfbap_change_publish_button', 10, 2 );

function sfbap_change_publish_button( $translation, $text ) {
	if ( 'sfbap_subscribe_form' == get_post_type())
		switch($text) {
			case "Publish":                    return "Save Form";
			case "Published on: <b>%1$s</b>":  return "Saved on: <b>%1$s</b>";
			case "Publish <b>immediately</b>": return "Approve <b>immediately</b>";
			case "Publish on: <b>%1$s</b>":    return "Approve on: <b>%1$s</b>";
			case "Privately Published":        return "Privately Saved";
			case "Published":                  return "Form Saved";
case "Save & Publish":             return "Save & Publish Form"; //"Double-save"? :)
default:                           return $translation;
}
return $translation;
}