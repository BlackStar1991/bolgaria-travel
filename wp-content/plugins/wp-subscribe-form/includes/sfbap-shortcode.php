<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/* Allow shortcodes in widget areas */
add_shortcode( 'arrow_forms', 'sfbap_arrow_forms_shortcode' );
function sfbap_arrow_forms_shortcode($atts , $content){

	extract( shortcode_atts( array( 'id' => null , 'widget' => 'false' ) , $atts ) );
	$sfbap_subscribe_form = get_post_meta( $id,'_sfbap_form_template',true);
	ob_start();
	if (!empty($sfbap_subscribe_form) && $sfbap_subscribe_form == 'subscribeform1') {
		if( get_post_meta($id, '_sfbap-form1-width', true) !='' )
			$form_width = get_post_meta($id, '_sfbap-form1-width', true);
		else
			$form_width = '450';

		if( get_post_meta($id, '_sfbap-form1-background-image', true) !='' )
			$form_background_image = get_post_meta($id, '_sfbap-form1-background-image', true);

		if( get_post_meta($id, '_sfbap-form1-background-color', true) !='' )
			$form_background_color = get_post_meta($id, '_sfbap-form1-background-color', true);
		else
			$form_background_color = 'white';

		if( get_post_meta($id, '_sfbap-form1-heading', true) !='' )
			$form_heading = get_post_meta($id, '_sfbap-form1-heading', true);
		else
			$form_heading = 'Join our mailing list for exclusive offers and crazy deals!';

		if( get_post_meta($id, '_sfbap-form1-heading-color', true) !='' )
			$form_heading_color = get_post_meta($id, '_sfbap-form1-heading-color', true);
		else
			$form_heading_color = 'black';

		if( get_post_meta($id, '_sfbap-form1-subscribe-button-text', true) !='' )
			$button_text = get_post_meta($id, '_sfbap-form1-subscribe-button-text', true);
		else
			$button_text = 'SUBSCRIBE NOW!';

		if( get_post_meta($id, '_sfbap-form1-border-size', true) !='' )
			$border_size = get_post_meta($id, '_sfbap-form1-border-size', true);
		else
			$border_size = '1';

		if( get_post_meta($id, '_sfbap-form1-border-style', true) !='Select Border Style' && get_post_meta($id, '_sfbap-form1-border-style', true) !='' )
			$border_style = get_post_meta($id, '_sfbap-form1-border-style', true);
		else
			$border_style = 'solid';

		if( get_post_meta($id, '_sfbap-form1-border-color', true) !='' )
			$border_color = get_post_meta($id, '_sfbap-form1-border-color', true);
		else
			$border_color = '#bfb9bc';

		if( get_post_meta($id, '_sfbap-form1-name-field-border-color', true) !='' )
			$name_border_color = get_post_meta($id, '_sfbap-form1-name-field-border-color', true);
		else
			$name_border_color = 'rgba(128, 126, 126, 0.12)';

		if( get_post_meta($id, '_sfbap-form1-email-field-border-color', true) !='' )
			$email_border_color = get_post_meta($id, '_sfbap-form1-email-field-border-color', true);
		else
			$email_border_color = 'rgba(128, 126, 126, 0.12)';

		if( get_post_meta($id, '_sfbap-form1-button-background-color', true) !='' )
			$button_background_color = get_post_meta($id, '_sfbap-form1-button-background-color', true);
		else
			$button_background_color = '#ff0066';

		if( get_post_meta($id, '_sfbap-form1-button-text-size', true) !='' )
			$button_text_size = get_post_meta($id, '_sfbap-form1-button-text-size', true);
		else
			$button_text_size = '16';

		if( get_post_meta($id, '_sfbap-form1-button-text-color', true) !='' )
			$button_text_color = get_post_meta($id, '_sfbap-form1-button-text-color', true);
		else
			$button_text_color = 'white';

		if( get_post_meta($id, '_sfbap-form1-button-border-color', true) !='' )
			$button_border_color = get_post_meta($id, '_sfbap-form1-button-border-color', true);
		else
			$button_border_color = 'transparent';

		?> 
		<style>

			#sfbap-form2-container{
				width: <?php if($widget != 'true'){ echo $form_width.'px';}else{echo '250px';} ?> !important;
				border: <?php echo $border_size; ?>px <?php echo $border_style; ?> <?php echo $border_color; ?> !important;
				display: block !important;
				text-align: center !important;
				padding: 15px !important;
				border-radius: 2px !important;
				font-family: 'Arial' !important;
				background: <?php echo $form_background_color; ?> !important;
				background-image: url('<?php echo $form_background_image; ?>') !important;
				background-size: cover !important;
				margin: 0 auto !important;
				position: relative !important;


			}
			.sfbap-form2-fields{
				width: 90% !important;
				display: inline-block !important;
				padding-left: 15px !important;
				margin-top: 10px !important;
				font-size: 16px !important;
				background-color: rgba(128, 126, 126, 0.04) !important;
				border: 1px solid rgba(128, 126, 126, 0.12) !important;
				border-radius: 2px !important;
				height: 40px !important;
				font-weight: bold !important;
				outline: none !important;
				background: white !important;
				outline-color: transparent !important;
			}

			#sfbap-form2-button{
				border-radius: 2px !important;
				width: 90% !important;
				display: inline-block !important;
				float: none !important;
				border: none !important;
				margin-top: 10px !important;
				background-color: <?php echo $button_background_color; ?> !important;
				color: <?php echo $button_text_color; ?> !important;
				font-size: <?php echo $button_text_size;?>px !important;
				transition-duration: 0.4s !important;
				height: 40px !important;
				font-weight: bold !important;
				cursor: pointer !important;
				outline: none !important;
				outline-color: transparent !important;
				box-shadow: none !important;
			}
			#sfbap-form2-button:hover {
			}
			#sfbap-form2-heading{
				margin: 0;
				line-height: 1.5;
				font-weight: bold;
				color:<?php echo $form_heading_color; ?> !important;
			}
			.sfbap-form-name{
				border: 1px solid <?php echo $name_border_color; ?> !important;
			}
			.sfbap-form-email{
				border: 1px solid <?php echo $email_border_color; ?> !important;
			}


		</style>

		<?php  ?>
		<form id="sfbap_subscribe_form" action="" method="POST">
			<div id="sfbap-form2-container" class="sfbap-main-form-container">
				<h3 id="sfbap-form2-heading"><?php echo $form_heading;?></h3>
				<input id="sfbap-form2-name" name="sfbap-form-name" class="sfbap-form2-fields sfbap-form-name" type="text" value="" placeholder="YOUR NAME">
				<input id="sfbap-form2-email" name="sfbap-form-email" class="sfbap-form2-fields sfbap-form-email" type="email" value="" placeholder="YOUR EMAIL">
				<input type="submit" id="sfbap-form2-button" class="sfbap-form-submit-button" value="<?php echo $button_text;?>" />
				<div id="sfbap_thanks_container" style="display:none;justify-content:center;align-items:center;width:100%;height:100%;    position: absolute;background: rgba(0,0,0,0.8);top: 0;left: 0;">
					<div style="width:100%;padding: 15%">
						<p id="sfbap_thanks_image" style="margin: 0;text-align: center;"><img src="<?php echo plugins_url('../images/tick.png',__FILE__);?>"></p>
						<p id="sfbap_thanks_message" style="margin: 0;text-align: center; font-size: 25px;color: white;font-weight: bold;font-family:'Arial'">You Have Successfully Subscribed to the Newsletter</p>
					</div>
				</div>
			</div>
		</form>
		<input type='hidden' id='sfbap_post_type_id' name="sfbap_post_type_id" value="<?php echo $id; ?>" /> 
		<?php

	}


	if (!empty($sfbap_subscribe_form) && $sfbap_subscribe_form == 'subscribeform2') {
		if( get_post_meta($id, '_sfbap-form2-width', true) !='' )
			$form_width = get_post_meta($id, '_sfbap-form2-width', true);
		else
			$form_width = '550';

		if( get_post_meta($id, '_sfbap-form2-background-image', true) !='' )
			$form_background_image = get_post_meta($id, '_sfbap-form2-background-image', true);

		if( get_post_meta($id, '_sfbap-form2-background-color', true) !='' )
			$form_background_color = get_post_meta($id, '_sfbap-form2-background-color', true);

		if( get_post_meta($id, '_sfbap-form2-heading', true) !='' )
			$form_heading = get_post_meta($id, '_sfbap-form2-heading', true);
		else
			$form_heading = 'Get new posts delivered to your inbox!';

		if( get_post_meta($id, '_sfbap-form2-sub-heading', true) !='' )
			$form_sub_heading = get_post_meta($id, '_sfbap-form2-sub-heading', true);
		else
			$form_sub_heading = 'Signup now and receive an email once I publish new content.';

		if( get_post_meta($id, '_sfbap-form2-subscribe-button-text', true) !='' )
			$button_text = get_post_meta($id, '_sfbap-form2-subscribe-button-text', true);
		else
			$button_text = 'Subscribe';

		if( get_post_meta($id, '_sfbap-form2-border-size', true) !='' )
			$border_size = get_post_meta($id, '_sfbap-form2-border-size', true);
		else
			$border_size = '0';

		if( get_post_meta($id, '_sfbap-form2-border-style', true) !='Select Border Style' && get_post_meta($id, '_sfbap-form2-border-style', true) !='' )
			$border_style = get_post_meta($id, '_sfbap-form2-border-style', true);
		else
			$border_style = 'solid';

		if( get_post_meta($id, '_sfbap-form2-border-color', true) !='' )
			$border_color = get_post_meta($id, '_sfbap-form2-border-color', true);
		else
			$border_color = '';

		if( get_post_meta($id, '_sfbap-form2-name-field-border-color', true) !='' )
			$name_border_color = get_post_meta($id, '_sfbap-form2-name-field-border-color', true);
		else
			$name_border_color = '#ddd';

		if( get_post_meta($id, '_sfbap-form2-email-field-border-color', true) !='' )
			$email_border_color = get_post_meta($id, '_sfbap-form2-email-field-border-color', true);
		else
			$email_border_color = '#ddd';

		if( get_post_meta($id, '_sfbap-form2-button-background-color', true) !='' )
			$button_background_color = get_post_meta($id, '_sfbap-form2-button-background-color', true);
		else
			$button_background_color = '#ce5273';

		if( get_post_meta($id, '_sfbap-form2-button-text-size', true) !='' )
			$button_text_size = get_post_meta($id, '_sfbap-form2-button-text-size', true);
		else
			$button_text_size = '16';

		if( get_post_meta($id, '_sfbap-form2-button-text-color', true) !='' )
			$button_text_color = get_post_meta($id, '_sfbap-form2-button-text-color', true);
		else
			$button_text_color = 'white';

		if( get_post_meta($id, '_sfbap-form2-heading-color', true) !='' )
			$form_heading_color = get_post_meta($id, '_sfbap-form2-heading-color', true);
		else
			$form_heading_color = 'black';

		if( get_post_meta($id, '_sfbap-form2-sub-heading-color', true) !='' )
			$form_sub_heading_color = get_post_meta($id, '_sfbap-form2-sub-heading-color', true);
		else
			$form_sub_heading_color = 'black';

		?>
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
		<style>
			#sfbap-form3-container{
				font-family:  'Josefin Sans' !important;
				text-align: center;
				position: relative;
				margin: 0 auto !important;
				width: <?php if($widget != 'true'){ echo $form_width.'px';}else{echo '250px';} ?> !important;
			}
			.sfbap-form2-login-block {
				width: <?php if($widget != 'true'){ echo $form_width.'px';}else{echo '250px';} ?> !important;
				padding: 20px !important;
				background: #f4f4f4;
				border-radius: 5px !important;
				border-top: 5px solid <?php echo $button_background_color;?> !important;
				margin: 0 auto !important;
				background-color: <?php echo $form_background_color; ?> !important;
				background-image: url('<?php echo $form_background_image; ?>') !important;
				background-size: cover !important;
				position: relative;

			}

			.sfbap-form2-login-block h1 {
				text-align: center !important;
				color: <?php echo $form_heading_color;?> !important;
				font-size: 19px !important;
				text-transform: uppercase !important;
				margin-top: 0 !important;
				margin-bottom: 0 !important;
				font-weight: bold;
				font-family:  'Josefin Sans' !important;
			}

			.sfbap-form2-login-block input {
				width: 100% !important;
				height: 42px !important;
				box-sizing: border-box !important;
				border-radius: 5px !important;
				border: 1px solid #ccc !important;
				margin-bottom: 10px !important;
				font-size: 14px !important;
				font-family:  'Josefin Sans' !important;
				padding: 0 20px 0 15px !important;
				outline: none !important;
			}



			.sfbap-form2-login-block input:active, .sfbap-form2-login-block input:focus {
				border: 1px solid #ff656c !important;
			}

			.sfbap-form2-login-block .sfbap-form-submit-button {
				width: 100% !important;
				height: 40px !important;
				background: <?php echo $button_background_color;?> !important;
				box-sizing: border-box !important;
				border-radius: 5px !important;
				border: none !important;
				color: <?php echo $button_text_color;?> !important;
				font-weight: bold !important;
				text-transform: uppercase !important;
				font-size: <?php echo $button_text_size;?>px !important;
				font-family:  'Josefin Sans' !important;
				outline: none !important;
				box-shadow: none !important;
				cursor: pointer !important;
			}
			.sfbap-form-submit-button:hover{
				box-shadow: none !important;
			}
			.sfbap-form-name{
				border: 1px solid <?php echo $name_border_color; ?> !important;
			}
			.sfbap-form-email{
				border: 1px solid <?php echo $email_border_color; ?> !important;
			}
			#sfbap_form2_subheading{
				margin: 5px 0 15px 0 !important;
				font-size:15px !important;
				font-weight: bold !important;
				text-align: center !important;
				color: <?php echo $form_sub_heading_color; ?> !important;
			}


		</style>
		<?php  ?>
		<form id="sfbap_subscribe_form" action="" method="POST">
			<div id="sfbap-form3-container">
				<div class="sfbap-form2-logo"></div>
				<div class="sfbap-form2-login-block">
					<h1><?php echo $form_heading; ?></h1>
					<p id="sfbap_form2_subheading" ><?php echo $form_sub_heading; ?></p>
					<input type="text" value="" placeholder="Name" id="sfbap_form2_name" name="sfbap-form-name" class="sfbap-form-name" />
					<input type="email" value="" placeholder="Email" id="sfbap_form2_email" name="sfbap-form-email" class="sfbap-form-email" />
					<input type="submit" class="sfbap-form-submit-button" id="sfbap-form3-button" value="<?php echo $button_text; ?>" />
				</div>
				<div id="sfbap_thanks_container" style="display:none;justify-content:center;align-items:center;width:100%;height:100%;    position: absolute;background: rgba(0,0,0,0.8);top: 0;left: 0;">
					<div style="width:100%;padding: 15%">
						<p id="sfbap_thanks_image" style="margin: 0;text-align: center;"><img src="<?php echo plugins_url('../images/tick.png',__FILE__);?>"></p>
						<p id="sfbap_thanks_message" style="margin: 0;text-align: center; font-size: 25px;color: white;font-weight: bold;font-family:'Arial'">You Have Successfully Subscribed to the Newsletter</p>
					</div>
				</div>
			</div>

		</form>


		<input type='hidden' id='sfbap_post_type_id' name="sfbap_post_type_id" value="<?php echo $id; ?>" /> 
		<?php


	}


	if (!empty($sfbap_subscribe_form) && $sfbap_subscribe_form == 'subscribeform3') {
		if( get_post_meta($id, '_sfbap-form3-width', true) !='' )
			$form_width = get_post_meta($id, '_sfbap-form3-width', true);
		else
			$form_width = '700';

		if( get_post_meta($id, '_sfbap-form3-background-image', true) !='' )
			$form_background_image = get_post_meta($id, '_sfbap-form3-background-image', true);

		if( get_post_meta($id, '_sfbap-form3-background-color', true) !='' )
			$form_background_color = get_post_meta($id, '_sfbap-form3-background-color', true);
		else
			$form_background_color = '#f2f2f2';

		if( get_post_meta($id, '_sfbap-form3-heading-color', true) !='' )
			$form_heading_color = get_post_meta($id, '_sfbap-form3-heading-color', true);
		else
			$form_heading_color = '#6a6a6a';

		if( get_post_meta($id, '_sfbap-form3-sub-heading-color', true) !='' )
			$form_sub_heading_color = get_post_meta($id, '_sfbap-form3-sub-heading-color', true);
		else
			$form_sub_heading_color = '#6e6e6e';

		if( get_post_meta($id, '_sfbap-form3-heading', true) !='' )
			$form_heading = get_post_meta($id, '_sfbap-form3-heading', true);
		else
			$form_heading = 'We are building a new fantastic website.';

		if( get_post_meta($id, '_sfbap-form3-sub-heading', true) !='' )
			$form_sub_heading = get_post_meta($id, '_sfbap-form3-sub-heading', true);
		else
			$form_sub_heading = 'Leave your e-mail and we let you know when we started.';

		if( get_post_meta($id, '_sfbap-form3-subscribe-button-text', true) !='' )
			$button_text = get_post_meta($id, '_sfbap-form3-subscribe-button-text', true);
		else
			$button_text = 'Subscribe';

		if( get_post_meta($id, '_sfbap-form3-border-size', true) !='' )
			$border_size = get_post_meta($id, '_sfbap-form3-border-size', true);
		else
			$border_size = '5';

		if( get_post_meta($id, '_sfbap-form3-border-style', true) !='Select Border Style' && get_post_meta($id, '_sfbap-form3-border-style', true) !='' )
			$border_style = get_post_meta($id, '_sfbap-form3-border-style', true);
		else
			$border_style = 'solid';

		if( get_post_meta($id, '_sfbap-form3-border-color', true) !='' )
			$border_color = get_post_meta($id, '_sfbap-form3-border-color', true);
		else
			$border_color = '#c90000';

		if( get_post_meta($id, '_sfbap-form3-name-field-border-color', true) !='' )
			$name_border_color = get_post_meta($id, '_sfbap-form3-name-field-border-color', true);
		else
			$name_border_color = '#c90000';

		if( get_post_meta($id, '_sfbap-form3-email-field-border-color', true) !='' )
			$email_border_color = get_post_meta($id, '_sfbap-form3-email-field-border-color', true);
		else
			$email_border_color = '#c90000';

		if( get_post_meta($id, '_sfbap-form3-button-background-color', true) !='' )
			$button_background_color = get_post_meta($id, '_sfbap-form3-button-background-color', true);
		else
			$button_background_color = '#c90000';

		if( get_post_meta($id, '_sfbap-form3-button-text-size', true) !='' )
			$button_text_size = get_post_meta($id, '_sfbap-form3-button-text-size', true);
		else
			$button_text_size = '16';

		if( get_post_meta($id, '_sfbap-form3-button-text-color', true) !='' )
			$button_text_color = get_post_meta($id, '_sfbap-form3-button-text-color', true);
		else
			$button_text_color = 'white';
		?>
		<style>
			#sfbap-form3-container {
				width: <?php if($widget != 'true'){ echo $form_width.'px';}else{echo '250px';} ?> !important;
				background: <?php echo $form_background_color;?> !important;
				color: #a0a4a9 !important;
				text-align: center !important;
				border-left: <?php echo $border_size; ?>px <?php echo $border_style;?> <?php echo $border_color;?> !important;
				box-shadow: 0px 2px 30px 2px #a0a4a9 !important;
				padding-bottom: 50px !important;
				background-image: url('<?php echo $form_background_image; ?>') !important;
				background-size: cover !important;
				margin: 0 auto !important;
				position: relative !important;
			}



			#sfbap-form3-heading1 {
				margin: 0px !important;
				margin-top: 50px !important;
				line-height: 1 !important;
				display: inline-block !important;
				font-size: 30px !important;
				font-family: 'Arial' !important;
				color: <?php echo $form_heading_color;?> !important;
			}

			#sfbap-form3-heading2 {
				/* margin: 0px; */
				font-size: 24px !important;
				font-family: 'Arial' !important;
				font-weight: normal !important;
				color: <?php echo $form_sub_heading_color;?> !important;
			}

			#sfbap-form3-email-text {
				background: #f2f2f2 !important;
				border-radius: 0 !important;
				border: 2px solid #c90000 !important;
				color: #474747 !important;
				font-size: 15px !important;
				height: 35px !important;
				margin-top: 20px !important;
				padding-left: 10px !important;
				width: 60% !important;
				font-weight: bold !important;
				padding: 0;
			}

			#sfbap-form3-button {
				width: 30% !important;
				/* border: 0; */
				margin-top: 20px !important;
				background: <?php echo $button_background_color?> !important;
				font-size: <?php echo $button_text_size;?>px !important;
				color: <?php echo $button_text_color;?> !important;
				cursor: pointer !important;
				padding: 0 !important;
				height: 38px !important;
				border: transparent !important;
				margin-left: -5px !important;
				box-shadow: none !important;
			}
			#sfbap-form3-button:hover {
				width: 30% !important;
				/* border: 0; */
				margin-top: 20px !important;
				background: <?php echo $button_background_color?> !important;
				font-size: <?php echo $button_text_size;?>px !important;
				color: <?php echo $button_text_color;?> !important;
				cursor: pointer !important;
				padding: 0 !important;
				height: 38px !important;
				border: transparent !important;
				margin-left: -5px !important;
				box-shadow: none !important;
			}
			.sfbap-form-email{
				border: 1px solid <?php echo $email_border_color; ?> !important;
			}


		</style>
		<?php  ?>
		<form id="sfbap_subscribe_form" action="" method="POST">
			<div id="sfbap-form2-container" class="sfbap-main-form-container">
				<div id="sfbap-form3-container">
					<h3 id="sfbap-form3-heading1"><?php echo $form_heading; ?></h3>
					<h3 id="sfbap-form3-heading2"><?php echo $form_sub_heading; ?></h3>
					<div><input type="email" id="sfbap-form3-email-text" name="sfbap-form-email" class="sfbap-form-email" value="" placeholder="Your Email">
						<input type="submit" id="sfbap-form3-button" class="sfbap-form-submit-button" name="" value="<?php echo $button_text; ?>"></div>
						<div id="sfbap_thanks_container" style="display:none;justify-content:center;align-items:center;width:100%;height:100%;    position: absolute;background: rgba(0,0,0,0.8);top: 0;left: 0;">
							<div style="width:100%;padding: 15%">
								<p id="sfbap_thanks_image" style="margin: 0;text-align: center;"><img src="<?php echo plugins_url('../images/tick.png',__FILE__);?>"></p>
								<p id="sfbap_thanks_message" style="margin: 0;text-align: center; font-size: 25px;color: white;font-weight: bold;font-family:'Arial'">You Have Successfully Subscribed to the Newsletter</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
		<input type='hidden' id='sfbap_post_type_id' name="sfbap_post_type_id" value="<?php echo $id; ?>" /> 
		<?php

	}


	if (!empty($sfbap_subscribe_form) && $sfbap_subscribe_form == 'subscribeform4') {
		if( get_post_meta($id, '_sfbap-form4-width', true) !='' )
			$form_width = get_post_meta($id, '_sfbap-form4-width', true);
		else
			$form_width = '550';

		if( get_post_meta($id, '_sfbap-form4-background-image', true) !='' )
			$form_background_image = get_post_meta($id, '_sfbap-form4-background-image', true);

		if( get_post_meta($id, '_sfbap-form4-background-color', true) !='' )
			$form_background_color = get_post_meta($id, '_sfbap-form4-background-color', true);
		else
			$form_background_color = '#F8A434';

		if( get_post_meta($id, '_sfbap-form4-heading-color', true) !='' )
			$form_heading_color = get_post_meta($id, '_sfbap-form4-heading-color', true);
		else
			$form_heading_color = 'white';

		if( get_post_meta($id, '_sfbap-form4-sub-heading-color', true) !='' )
			$form_sub_heading_color = get_post_meta($id, '_sfbap-form4-sub-heading-color', true);
		else
			$form_sub_heading_color = 'white';

		if( get_post_meta($id, '_sfbap-form4-heading', true) !='' )
			$form_heading = get_post_meta($id, '_sfbap-form4-heading', true);
		else
			$form_heading = 'SIGN UP FOR BETA';

		if( get_post_meta($id, '_sfbap-form4-sub-heading', true) !='' )
			$form_sub_heading = get_post_meta($id, '_sfbap-form4-sub-heading', true);
		else
			$form_sub_heading = 'Website is almost ready, if you are interested in testing it out, then sign up below to get exlusive access.';

		if( get_post_meta($id, '_sfbap-form4-subscribe-button-text', true) !='' )
			$button_text = get_post_meta($id, '_sfbap-form4-subscribe-button-text', true);
		else
			$button_text = 'Subscribe';

		if( get_post_meta($id, '_sfbap-form4-border-size', true) !='' )
			$border_size = get_post_meta($id, '_sfbap-form4-border-size', true);
		else
			$border_size = '0';

		if( get_post_meta($id, '_sfbap-form4-border-style', true) !='Select Border Style' && get_post_meta($id, '_sfbap-form4-border-style', true) !='' )
			$border_style = get_post_meta($id, '_sfbap-form4-border-style', true);
		else
			$border_style = 'solid';

		if( get_post_meta($id, '_sfbap-form4-border-color', true) !='' )
			$border_color = get_post_meta($id, '_sfbap-form4-border-color', true);
		else
			$border_color = 'transparent';

		if( get_post_meta($id, '_sfbap-form4-email-field-border-color', true) !='' )
			$email_border_color = get_post_meta($id, '_sfbap-form4-email-field-border-color', true);
		else
			$email_border_color = '';

		if( get_post_meta($id, '_sfbap-form4-button-background-color', true) !='' )
			$button_background_color = get_post_meta($id, '_sfbap-form4-button-background-color', true);
		else
			$button_background_color = '#d45d7d';

		if( get_post_meta($id, '_sfbap-form4-button-text-size', true) !='' )
			$button_text_size = get_post_meta($id, '_sfbap-form4-button-text-size', true);
		else
			$button_text_size = '14';

		if( get_post_meta($id, '_sfbap-form4-button-text-color', true) !='' )
			$button_text_color = get_post_meta($id, '_sfbap-form4-button-text-color', true);
		else
			$button_text_color = 'white';
		?>
		<style>
			#sfbap-success-message{
				display: none !important;
				margin: 0 !important;
				width: 100% !important;
				text-align: center !important;
				padding: 10px 20px !important;
				font-family: monospace !important;
				font-size: 14px !important;
				letter-spacing: 1px !important;

			}
			#sfbap-form4-container {
				background: <?php echo $form_background_color;?> !important;
				width: <?php if($widget != 'true'){ echo $form_width.'px';}else{echo '250px';} ?> !important;
				font-family: 'Lato', sans-serif !important;
				color: #FDFCFB !important;
				padding: 50px 25px !important;
				text-align: center !important;
				background-image: url('<?php echo $form_background_image; ?>') !important;
				border: <?php echo $border_size; ?>px <?php echo $border_style;?> <?php echo $border_color;?> !important;
				background-size: cover !important;
				margin: 0 auto !important;
				position: relative !important;

			}


			#sfbap-form4-container form {
				width: 100% !important;
				margin: 0 auto !important;
			}


			#sfbap-form4-container .header {
				font-size: 35px !important;
				text-transform: uppercase !important;
				letter-spacing: 5px !important;
			}

			#sfbap-form4-container .header p {
				font-size: 35px !important;
				text-transform: uppercase !important;
				letter-spacing: 5px !important;
				margin: 0 !important;
				text-align: center;
				color: <?php echo $form_heading_color;?> !important;
				line-height: 1.5 !important;
			}


			#sfbap-form4-container .description {
				font-size: 14px !important;
				letter-spacing: 1px !important;
				line-height: 1.3em !important;
				color: <?php echo $form_sub_heading_color; ?> !important;
				margin: -2px 0 45px !important;
				text-align: center;
			}


			#sfbap-form4-container .input {
				display: flex !important;
				align-items: center !important;
			}


			#sfbap-form4-container .sfbap-button {
				height: 44px !important;
				border: none !important;
				width: 100% !important;
				margin: 0 !important;
				padding: 0 !important;
				padding-left: 10px !important;

			}


			#sfbap-form4-container #email {
				width: 75% !important;
				background: #FDFCFB !important;
				font-family: inherit !important;
				color: #737373 !important;
				letter-spacing: 1px !important;
				text-indent: 5% !important;
				border-radius: 5px 0 0 5px !important;
			}


			#sfbap-form4-container #submit {
				width: 40% !important;
				height: 44px !important;
				background: <?php echo $button_background_color; ?> !important;
				font-family: inherit !important;
				font-weight: bold !important;
				color: <?php echo $button_text_color; ?> !important;
				font-size: <?php echo $button_text_size; ?>px;
				letter-spacing: 1px !important;
				border-radius: 0 5px 5px 0 !important;
				cursor: pointer !important;
				transition: background .3s ease-in-out !important;
				padding-left: 0 !important;
				box-shadow: none !important;
			}

			#sfbap-form4-subheading{
				text-align: center;
			}


			#sfbap-form4-container input:focus {
				outline: none !important;
				outline: 2px solid #E86C8D !important;
				box-shadow: 0 0 2px #E86C8D !important;
			}
			.sfbap-form-email{
				border: 1px solid <?php echo $email_border_color; ?> !important !important;
			}
		</style>
		<?php  ?>
		<form id="sfbap_subscribe_form" action="" method="POST">
			<div id="sfbap-form4-container" class="sfbap-main-form-container">

				<div class="header">
					<p id="sfbap-form4-heading"><?php echo $form_heading; ?></p>
				</div>
				<div class="description">
					<p id="sfbap-form4-subheading"><?php echo $form_sub_heading; ?></p>
				</div>
				<div class="input">
					<input id="sfbap-form4-email" type="email" class="sfbap-button sfbap-form-email" name="sfbap-form-email" placeholder="NAME@EXAMPLE.COM">
					<input type="submit" class="sfbap-button sfbap-form-submit-button" id="submit" value="<?php echo $button_text; ?>">
				</div>
				<div id="sfbap_thanks_container" style="display:none;justify-content:center;align-items:center;width:100%;height:100%;    position: absolute;background: rgba(0,0,0,0.8);top: 0;left: 0;">
					<div style="width:100%;padding: 15%">
						<p id="sfbap_thanks_image" style="margin: 0;text-align: center;"><img src="<?php echo plugins_url('../images/tick.png',__FILE__);?>"></p>
						<p id="sfbap_thanks_message" style="margin: 0;text-align: center; font-size: 25px;color: white;font-weight: bold;font-family:'Arial'">You Have Successfully Subscribed to the Newsletter</p>
					</div>
				</div>
			</div>
		</div> 
	</form>

	<input type='hidden' id='sfbap_post_type_id' name="sfbap_post_type_id" value="<?php echo $id; ?>" /> 
	<?php


}


if (!empty($sfbap_subscribe_form) && $sfbap_subscribe_form == 'subscribeform5') {
	if( get_post_meta($id, '_sfbap-form5-width', true) !='' )
		$form_width = get_post_meta($id, '_sfbap-form5-width', true);
	else
		$form_width = '550';

	if( get_post_meta($id, '_sfbap-form5-background-image', true) !='' )
		$form_background_image = get_post_meta($id, '_sfbap-form5-background-image', true);
	else
		$form_background_image = plugins_url('../images/form5-bg.png' , __FILE__);

	if( get_post_meta($id, '_sfbap-form5-background-color', true) !='' )
		$form_background_color = get_post_meta($id, '_sfbap-form5-background-color', true);

	if( get_post_meta($id, '_sfbap-form5-heading', true) !='' )
		$form_heading = get_post_meta($id, '_sfbap-form5-heading', true);
	else
		$form_heading = 'Subscribe Now!';

	if( get_post_meta($id, '_sfbap-form5-sub-heading', true) !='' )
		$form_sub_heading = get_post_meta($id, '_sfbap-form5-sub-heading', true);
	else
		$form_sub_heading = 'To sign-up for a free and amazing offers and other cool things, stay with us and pelase subscibe us.';

	if( get_post_meta($id, '_sfbap-form5-subscribe-button-text', true) !='' )
		$button_text = get_post_meta($id, '_sfbap-form5-subscribe-button-text', true);
	else
		$button_text = 'SUBSCRIBE NOW';

	if( get_post_meta($id, '_sfbap-form5-border-size', true) !='' )
		$border_size = get_post_meta($id, '_sfbap-form5-border-size', true);
	else
		$border_size = '0';

	if( get_post_meta($id, '_sfbap-form5-border-style', true) !='Select Border Style' && get_post_meta($id, '_sfbap-form5-border-style', true) !='' )
		$border_style = get_post_meta($id, '_sfbap-form5-border-style', true);
	else
		$border_style = 'solid';

	if( get_post_meta($id, '_sfbap-form5-border-color', true) !='' )
		$border_color = get_post_meta($id, '_sfbap-form5-border-color', true);
	else
		$border_color = 'transparent';

	if( get_post_meta($id, '_sfbap-form5-name-field-border-color', true) !='' )
		$name_border_color = get_post_meta($id, '_sfbap-form5-name-field-border-color', true);
	else
		$name_border_color = 'black';

	if( get_post_meta($id, '_sfbap-form5-email-field-border-color', true) !='' )
		$email_border_color = get_post_meta($id, '_sfbap-form5-email-field-border-color', true);
	else
		$email_border_color = 'black';

	if( get_post_meta($id, '_sfbap-form5-button-text-size', true) !='' )
		$button_text_size = get_post_meta($id, '_sfbap-form5-button-text-size', true);
	else
		$button_text_size = '20';

	if( get_post_meta($id, '_sfbap-form5-button-text-color', true) !='' )
		$button_text_color = get_post_meta($id, '_sfbap-form5-button-text-color', true);
	else
		$button_text_color = 'white';

	if( get_post_meta($id, '_sfbap-form5-heading-color', true) !='' )
		$form_heading_color = get_post_meta($id, '_sfbap-form5-heading-color', true);
	else
		$form_heading_color = '#FFF';

	if( get_post_meta($id, '_sfbap-form5-sub-heading-color', true) !='' )
		$form_sub_heading_color = get_post_meta($id, '_sfbap-form5-sub-heading-color', true);
	else
		$form_sub_heading_color = '#6E6E6E';
	?>
	<style>
		#sfbap-form5-wrapper {
			width: <?php if($widget != 'true'){ echo $form_width.'px';}else{echo '250px';} ?> !important;
			background-color: <?php echo $background_color;?> !important;
			font-family: 'Arial' !important;
			background-image: url('<?php echo $form_background_image; ?>') !important;
			background-size: cover !important;
			padding: 25px 40px !important;
			border: <?php echo $border_size;?>px <?php echo $border_style; ?> <?php echo $border_color;?> !important;
			margin: 0 auto !important;
			position: relative !important;

		}

		#sfbap-form5-wrapper h1 {
			text-align: center !important;
			font-size: 25px !important;
			color: <?php echo $form_heading_color; ?> !important;
			text-transform: uppercase !important;
			text-shadow: #000 0px 1px 5px !important;
			margin: 0px !important;
			line-height: 1.5 !important;
		}

		#sfbap-form5-wrapper p {
			font-size: 13px !important;
			color: <?php echo $form_sub_heading_color; ?> !important;
			text-shadow: #000 0px 1px 5px !important;
			margin-bottom: 30px !important;
		}

		#sfbap-form5-wrapper .form {
			width: 100% !important;
		}

		#sfbap-form5-wrapper input[type="text"], #sfbap-form5-wrapper input[type="email"] {
			width: 98% !important;
			padding: 15px 0px 15px 8px !important;
			border-radius: 5px !important;
			box-shadow: inset 4px 6px 10px -4px rgba(0, 0, 0, 0.3), 0 1px 1px -1px rgba(255, 255, 255, 0.3) !important;
			background: rgba(0, 0, 0, 0.2) !important;
			outline: none !important;
			border: none !important;
			border: 1px solid black !important;
			margin-bottom: 10px !important;
			color: #6E6E6E !important;
			text-shadow: #000 0px 1px 5px !important;
		}

		#sfbap-form5-wrapper input[type="submit"] {
			width: 100% !important;
			padding: 15px !important;
			border-radius: 5px !important;
			outline: none !important;
			border: none !important;
			background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#28D2DE), to(#1A878F)) !important;
			background-image: -webkit-linear-gradient(#28D2DE 0%, #1A878F 100%) !important;
			background-image: -moz-linear-gradient(#28D2DE 0%, #1A878F 100%) !important;
			background-image: -o-linear-gradient(#28D2DE 0%, #1A878F 100% !important);
			background-image: linear-gradient(#28D2DE 0%, #1A878F 100%) !important;
			font-size: <?php echo $button_text_size; ?>px !important;
			color: <?php echo $button_text_color; ?> !important;
			text-transform: uppercase !important !important;
			text-shadow: #000 0px 1px 5px !important;
			border: 1px solid #000 !important;
			opacity: 0.7 !important;
			-webkit-box-shadow: 0 8px 6px -6px rgba(0, 0, 0, 0.7) !important;
			-moz-box-shadow: 0 8px 6px -6px rgba(0, 0, 0, 0.7) !important;
			box-shadow: 0 8px 6px -6px rgba(0, 0, 0, 0.7) !important;
			border-top: 1px solid rgba(255, 255, 255, 0.8) !important;
			-webkit-box-reflect: below 0px -webkit-gradient(linear, left top, left bottom, from(transparent), color-stop(50%, transparent), to(rgba(255, 255, 255, 0.2))) !important;
		}

		#sfbap-form5-wrapper input:focus {
			box-shadow: inset 4px 6px 10px -4px rgba(0, 0, 0, 0.7), 0 1px 1px -1px rgba(255, 255, 255, 0.3);
			background: rgba(0, 0, 0, 0.3) !important;
			-webkit-transition: 1s ease !important;
			-moz-transition: 1s ease !important;
			-o-transition: 1s ease !important;
			-ms-transition: 1s ease !important;
			transition: 1s ease !important;
		}

		#sfbap-form5-wrapper input[type="submit"]:hover {
			opacity: 1 !important;
			cursor: pointer !important;
		}

		#sfbap-form5-wrapper .name-help, #sfbap-form5-wrapper .email-help {
			display: none;
			padding: 0px !important;
			margin: 0px 0px 15px 0px !important;
		}

		#sfbap-form5-wrapper .optimize {
			position: fixed !important;
			right: 3% !important;
			top: 0px !important;
		}
		.sfbap-form-name{
			border: 1px solid <?php echo $name_border_color; ?> !important;
		}
		.sfbap-form-email{
			border: 1px solid <?php echo $email_border_color; ?> !important;
		}



	</style>
	<?php  ?>
	<form id="sfbap_subscribe_form" action="" method="POST">
		<div id="sfbap-form5-wrapper" class="sfbap-main-form-container">
			<h1 id="sfbap-form5-heading" name="sfbap-form5-heading"><?php echo $form_heading; ?></h1>
			<p id="sfbap-form5-subheading" name="sfbap-form5-subheading"><?php echo $form_sub_heading; ?></p>

			<input type="text" id="sfbap-form5-name" name="sfbap-form-name"  class="sfbap-form-name" placeholder="Name">
			<input type="email" id="sfbap-form5-email" name="sfbap-form-email"  class="sfbap-form-email" placeholder="Email">
			<input type="submit" class="submit sfbap-form-submit-button" value="<?php echo $button_text; ?>">

			<div id="sfbap_thanks_container" style="display:none;justify-content:center;align-items:center;width:100%;height:100%;    position: absolute;background: rgba(0,0,0,0.8);top: 0;left: 0;">
				<div style="width:100%;padding: 15%">
					<p id="sfbap_thanks_image" style="margin: 0;text-align: center;"><img src="<?php echo plugins_url('../images/tick.png',__FILE__);?>"></p>
					<p id="sfbap_thanks_message" style="margin: 0;text-align: center; font-size: 25px;color: white;font-weight: bold;font-family:'Arial'">You Have Successfully Subscribed to the Newsletter</p>
				</div>
			</div>
		</div>

	</div>
</form>

<input type='hidden' id='sfbap_post_type_id' name="sfbap_post_type_id" value="<?php echo $id; ?>" /> 
<?php


}


if (!empty($sfbap_subscribe_form) && $sfbap_subscribe_form == 'subscribeform6') {

	if( get_post_meta($id, '_sfbap-form6-width', true) !='' )
		$form_width = get_post_meta($id, '_sfbap-form6-width', true);
	else
		$form_width = '700';

	if( get_post_meta($id, '_sfbap-form6-background-image', true) !='' )
		$form_background_image = get_post_meta($id, '_sfbap-form6-background-image', true);

	if( get_post_meta($id, '_sfbap-form6-background-color', true) !='' )
		$form_background_color = get_post_meta($id, '_sfbap-form6-background-color', true);
	else
		$form_background_color = '#f2f2f2';

	if( get_post_meta($id, '_sfbap-form6-heading', true) !='' )
		$form_heading = get_post_meta($id, '_sfbap-form6-heading', true);
	else
		$form_heading = 'New in town? Here is 20% off.';

	if( get_post_meta($id, '_sfbap-form6-sub-heading', true) !='' )
		$form_sub_heading = get_post_meta($id, '_sfbap-form6-sub-heading', true);
	else
		$form_sub_heading = 'Enter your email to receive your warm welcome. Enjoy your stay (and your fit).';

	if( get_post_meta($id, '_sfbap-form6-border-size', true) !='' )
		$border_size = get_post_meta($id, '_sfbap-form6-border-size', true);
	else
		$border_size = '0';

	if( get_post_meta($id, '_sfbap-form6-border-style', true) !='Select Border Style' && get_post_meta($id, '_sfbap-form6-border-style', true) !='' )
		$border_style = get_post_meta($id, '_sfbap-form6-border-style', true);
	else
		$border_style = 'solid';

	if( get_post_meta($id, '_sfbap-form6-border-color', true) !='' )
		$border_color = get_post_meta($id, '_sfbap-form6-border-color', true);
	else
		$border_color = 'transparent';

	if( get_post_meta($id, '_sfbap-form6-email-field-border-color', true) !='' )
		$email_border_color = get_post_meta($id, '_sfbap-form6-email-field-border-color', true);
	else
		$email_border_color = 'b2b2b2';

	if( get_post_meta($id, '_sfbap-form6-button-background-color', true) !='' )
		$button_background_color = get_post_meta($id, '_sfbap-form6-button-background-color', true);
	else
		$button_background_color = '#4c4c4c';

	if( get_post_meta($id, '_sfbap-form6-heading-color', true) !='' )
		$form_heading_color = get_post_meta($id, '_sfbap-form6-heading-color', true);
	else
		$form_heading_color = '#2b2b2b';

	if( get_post_meta($id, '_sfbap-form6-sub-heading-color', true) !='' )
		$form_sub_heading_color = get_post_meta($id, '_sfbap-form6-sub-heading-color', true);
	else
		$form_sub_heading_color = '#6e6e6e';
	?>
	<style>

		#sfbap-form6-container {
			width: <?php if($widget != 'true'){ echo $form_width.'px';}else{echo '250px';} ?> !important;
			background: <?php echo $form_background_color; ?> !important;
			background-image: url('<?php echo $form_background_image; ?>') !important;
			background-size: cover !important;
			color: white !important;
			text-align: center !important;
			box-shadow: 0px 2px 30px 2px #a0a4a9 !important;
			padding-bottom: 50px !important;
			border: <?php echo $border_size;?>px <?php echo $border_style; ?> <?php echo $border_color;?> !important;
			margin: 0 auto !important;
			position: relative !important;

		}


		#sfbap-form6-heading1 {
			margin: 0px !important;
			margin-top: 50px !important;
			line-height: 1 !important;
			display: inline-block !important;
			font-size: 35px !important;
			font-family: 'Arial' !important;
			color: <?php echo $form_heading_color; ?> !important;
		}

		#sfbap-form6-heading2 {
			/* margin: 0px; */
			font-size: 20px;
			font-family: 'Times New Romen' !important;
			font-weight: normal !important;
			color: <?php echo $form_sub_heading_color;?> !important;
			width: 79% !important;
			margin: 0 auto !important;
			line-height: 1 !important;
			margin-top: 30px !important;
			margin-bottom: 20px !important;
		}
		#sfbap-form6-privacy {
			/* margin: 0px; */
			font-size: 13px !important;
			font-family: 'Times New Romen' !important;
			font-weight: normal !important;
			color: #6e6e6e !important;
			width: 90% !important;
			margin: 0 auto !important;
			line-height: 1 !important;
			margin-top: 30px !important;
			margin-bottom: 0px !important;
			font-style: italic !important;
		}

		#sfbap-form6-email-text {
			background: #f2f2f2 !important;
			border-radius: 0 !important;
			border: 1px solid #b2b2b2 !important;
			color: #9c9c9c !important;
			font-size: 15px !important;
			height: 35px !important;
			margin-top: 20px !important;
			padding-left: 10px !important;
			width: 80% !important;
			height: 44px !important;
			padding: 0;
			/* font-weight: bold; */

		}

		#sfbap-form6-button {
			height: 36px !important;
			width: 50px !important;
			/* border: 0; */
			margin-top: 20px !important;
			background: <?php echo $button_background_color;?> !important;

			font-size: 18px !important;
			color: white !important;
			cursor: pointer !important;
			padding: 0 !important;
			height: 45px !important;
			box-shadow: none !important;
			border: transparent !important;
			margin-left: -6px !important;
			border-bottom: 2px solid <?php echo $button_background_color;?> !important;
		}
		.sfbap-form-email{
			border: 1px solid <?php echo $email_border_color; ?> !important;
		}



	</style>
	<?php  ?>
	<form id="sfbap_subscribe_form" action="" method="POST">
		<div id="sfbap-form7-container" class="sfbap-main-form-container">

			<div id="sfbap-form6-container">
				<h3 id="sfbap-form6-heading1"><?php echo $form_heading; ?></h3>
				<h3 id="sfbap-form6-heading2"><?php echo $form_sub_heading; ?></h3>
				<div><input type="email" id="sfbap-form6-email-text" name="" class="sfbap-form-email" value="" placeholder="Your Email">
					<input type="submit" class="sfbap-form-submit-button" id="sfbap-form6-button" name="" value="+"></div>
					<h3 id="sfbap-form6-privacy">By signing up, you agree to receive emails and promotions. You can unsubscribe at any time.</h3>
					<div id="sfbap_thanks_container" style="display:none;justify-content:center;align-items:center;width:100%;height:100%;    position: absolute;background: rgba(0,0,0,0.8);top: 0;left: 0;">
						<div style="width:100%;padding: 15%">
							<p id="sfbap_thanks_image" style="margin: 0;text-align: center;"><img src="<?php echo plugins_url('../images/tick.png',__FILE__);?>"></p>
							<p id="sfbap_thanks_message" style="margin: 0;text-align: center; font-size: 25px;color: white;font-weight: bold;font-family:'Arial'">You Have Successfully Subscribed to the Newsletter</p>
						</div>
					</div>
				</div>
			</div>


		</div>

	</form>

	<input type='hidden' id='sfbap_post_type_id' name="sfbap_post_type_id" value="<?php echo $id; ?>" /> 
	<?php

}


if (!empty($sfbap_subscribe_form) && $sfbap_subscribe_form == 'subscribeform7') {
	if( get_post_meta($id, '_sfbap-form7-width', true) !='' )
		$form_width = get_post_meta($id, '_sfbap-form7-width', true);
	else
		$form_width = '550';

	if( get_post_meta($id, '_sfbap-form7-background-image', true) !='' )
		$form_background_image = get_post_meta($id, '_sfbap-form7-background-image', true);

	if( get_post_meta($id, '_sfbap-form7-background-color', true) !='' )
		$form_background_color = get_post_meta($id, '_sfbap-form7-background-color', true);
	else
		$form_background_color = 'white';

	if( get_post_meta($id, '_sfbap-form7-heading', true) !='' )
		$form_heading = get_post_meta($id, '_sfbap-form7-heading', true);
	else
		$form_heading = 'Did you like this article?';

	if( get_post_meta($id, '_sfbap-form7-sub-heading', true) !='' )
		$form_sub_heading = get_post_meta($id, '_sfbap-form7-sub-heading', true);
	else
		$form_sub_heading = 'Sign up to get the latest content first.';

	if( get_post_meta($id, '_sfbap-form7-subscribe-button-text', true) !='' )
		$button_text = get_post_meta($id, '_sfbap-form7-subscribe-button-text', true);
	else
		$button_text = 'Subscribe';

	if( get_post_meta($id, '_sfbap-form7-border-size', true) !='' )
		$border_size = get_post_meta($id, '_sfbap-form7-border-size', true);
	else
		$border_size = '4';

	if( get_post_meta($id, '_sfbap-form7-border-style', true) !='Select Border Style' && get_post_meta($id, '_sfbap-form7-border-style', true) !='' )
		$border_style = get_post_meta($id, '_sfbap-form7-border-style', true);
	else
		$border_style = 'solid';

	if( get_post_meta($id, '_sfbap-form7-border-color', true) !='' )
		$border_color = get_post_meta($id, '_sfbap-form7-border-color', true);
	else
		$border_color = '#6a6a6a';

	if( get_post_meta($id, '_sfbap-form7-email-field-border-color', true) !='' )
		$email_border_color = get_post_meta($id, '_sfbap-form7-email-field-border-color', true);
	else
		$email_border_color = 'transparent';

	if( get_post_meta($id, '_sfbap-form7-button-background-color', true) !='' )
		$button_background_color = get_post_meta($id, '_sfbap-form7-button-background-color', true);
	else
		$button_background_color = '#5C97BF';

	if( get_post_meta($id, '_sfbap-form7-button-text-size', true) !='' )
		$button_text_size = get_post_meta($id, '_sfbap-form7-button-text-size', true);
	else
		$button_text_size = '18';

	if( get_post_meta($id, '_sfbap-form7-button-text-color', true) !='' )
		$button_text_color = get_post_meta($id, '_sfbap-form7-button-text-color', true);
	else
		$button_text_color = 'white';

	if( get_post_meta($id, '_sfbap-form7-heading-color', true) !='' )
		$form_heading_color = get_post_meta($id, '_sfbap-form7-heading-color', true);
	else
		$form_heading_color = 'black';

	if( get_post_meta($id, '_sfbap-form7-sub-heading-color', true) !='' )
		$form_sub_heading_color = get_post_meta($id, '_sfbap-form7-sub-heading-color', true);
	else
		$form_sub_heading_color = 'black';

	?>
	<style>
		@import url(http://fonts.googleapis.com/css?family=Pacifico);

		#sfbap-success-message{
			display: none;
			margin: 0;
			width: 100%;
			text-align: center;
			padding: 10px 20px;
			font-family: monospace;
			font-size: 14px;
			letter-spacing: 1px;

		}
		#sfbap-form7-container {
			width: <?php if($widget != 'true'){ echo $form_width.'px';}else{echo '250px';} ?> !important;
			background: <?php echo $form_background_color; ?> !important;
			background-image: url('<?php echo $form_background_image; ?>');
			background-size: cover !important;
			border: <?php echo $border_size;?>px <?php echo $border_style; ?> <?php echo $border_color;?> !important;
			margin: 0 auto !important;
			position: relative !important;

		}
		#sfbap-form7-container h3 {
			font-family: pacifico !important;
			color: <?php echo $form_heading_color; ?> !important;
			font-size: 2.4em !important;
		}

		#sfbap-form7-container h4 {
			margin-bottom: 2em 0 !important;
			color: <?php echo $form_sub_heading_color; ?> !important;
		}

		#sfbap-form7-container .email-capture {
			text-align: center !important;
			padding: 3em !important;
			-webkit-border-radius: 4px !important;
			-moz-border-radius: 4px !important;
			border-radius: 4px !important;
		}
		#sfbap-form7-container .email-capture .form-group {
			width: 100% !important;
		}

		#sfbap-form7-container .mailchimp {
			width: 100% !important;
		}
		#sfbap-form7-container .mailchimp form {
			width: 100% !important;
		}
		#sfbap-form7-container .mailchimp input[type="email"] {
			width: 100% !important;
			background: #f5f5f5 !important;
			height: 55px !important;
			padding: 18px 20px !important;
			font-size: 20px !important;
			margin-bottom: 15px !important;
			text-align: center !important;
			border: none !important;
			outline: none !important;
			color: #444 !important;
			float: left !important;
			-webkit-appearance: none !important;
			-webkit-border-radius: 4px !important;
			-moz-border-radius: 4px !important;
			border-radius: 4px !important;
			-webkit-box-shadow: inset 0 -1px rgba(0, 0, 0, 0.1) !important;
			-moz-box-shadow: inset 0 -1px rgba(0, 0, 0, 0.1) !important;
			box-shadow: inset 0 -1px rgba(0, 0, 0, 0.1) !important;
			padding: 0 !important;
			margin: 0 auto !important;
		}
		#sfbap-form7-container .mailchimp input[type="submit"] {
			width: 100%;
			background: <?php echo $button_background_color;?> !important;
			color: <?php echo $button_text_color; ?> !important;
			font-size: 18px !important;
			height: 55px !important;
			float: left !important;
			-webkit-border-radius: 4px !important;
			cursor: pointer !important;
			-moz-border-radius: 4px !important;
			border-radius: 4px !important;
			box-shadow: none !important;
			box-shadow: none !important;
			border: none !important;
		}
		#sfbap-form7-container .mailchimp .form_nospam {
			font-size: 12px !important;
			font-size: 1rem !important;
			margin-top: 10px !important;
			font-family: 'Arial' !important;
		}
		.sfbap-form-email{
			border: 1px solid <?php echo $email_border_color; ?> !important;
		}



	</style>
	<?php  ?>
	<form id="sfbap_subscribe_form" action="" method="POST">
		<div id="sfbap-form7-container" class="sfbap-main-form-container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 email-capture">
					<h3 id="sfbap-form7-heading"><?php echo $form_heading; ?></h3>
					<h4 id="sfbap-form7-subheading"><?php echo $form_sub_heading; ?></h4>
					<!-- Begin MailChimp Signup Form -->
					<div id="mc_embed_signup" class="mailchimp">

						<div class="form-group">
							<input type="email" value="" name="sfbap-form-email" class="required email form-control  sfbap-form-email" id="sfbap-form7-email" placeholder="Enter email">
							<input type="submit" value="<?php echo $button_text; ?>" name="subscribe" id="sfbap-form7-button" class="btn btn__bottom--border mailchimp__btn sfbap-form-submit-button" >        
						</div>

						<div id="mce-responses" class="clear">
							<div class="response" id="mce-error-response" style="display:none"></div>
							<div class="response" id="mce-success-response" style="display:none"></div>
						</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
						<div class="" style="position: absolute; left: -5000px;"><input type="text" name="" value=""></div>                          

						<span class="form_nospam">No spam - pinky promise</span>  
					</div><!--End mc_embed_signup-->
				</div>
			</div> <!-- /end of Row-->
			<div id="sfbap_thanks_container" style="display:none;justify-content:center;align-items:center;width:100%;height:100%;    position: absolute;background: rgba(0,0,0,0.8);top: 0;left: 0;">
				<div style="width:100%;padding: 15%">
					<p id="sfbap_thanks_image" style="margin: 0;text-align: center;"><img src="<?php echo plugins_url('../images/tick.png',__FILE__);?>"></p>
					<p id="sfbap_thanks_message" style="margin: 0;text-align: center; font-size: 25px;color: white;font-weight: bold;font-family:'Arial'">You Have Successfully Subscribed to the Newsletter</p>
				</div>
			</div>
		</div>

	</div> <!-- End of container-->
</form>

<input type='hidden' id='sfbap_post_type_id' name="sfbap_post_type_id" value="<?php echo $id; ?>" /> 
<?php


}


if (!empty($sfbap_subscribe_form) && $sfbap_subscribe_form == 'subscribeform8') {
	if( get_post_meta($id, '_sfbap-form8-width', true) !='' )
		$form_width = get_post_meta($id, '_sfbap-form8-width', true);
	else
		$form_width = '650';



	if( get_post_meta($id, '_sfbap-form8-background-color', true) !='' )
		$form_background_color = get_post_meta($id, '_sfbap-form8-background-color', true);
	else
		$form_background_color = '#2D4256';

	if( get_post_meta($id, '_sfbap-form8-heading', true) !='' )
		$form_heading = get_post_meta($id, '_sfbap-form8-heading', true);
	else
		$form_heading = 'Free Daily Options Video Newsletter';

	if( get_post_meta($id, '_sfbap-form8-sub-heading', true) !='' )
		$form_sub_heading = get_post_meta($id, '_sfbap-form8-sub-heading', true);
	else
		$form_sub_heading = 'Sign up today to get free Daily Options videos.';

	if( get_post_meta($id, '_sfbap-form8-subscribe-button-text', true) !='' )
		$button_text = get_post_meta($id, '_sfbap-form8-subscribe-button-text', true);
	else
		$button_text = 'Subscribe Now';

	if( get_post_meta($id, '_sfbap-form8-border-size', true) !='' )
		$border_size = get_post_meta($id, '_sfbap-form8-border-size', true);
	else
		$border_size = '5';

	if( get_post_meta($id, '_sfbap-form8-border-style', true) !='Select Border Style' && get_post_meta($id, '_sfbap-form8-border-style', true) !='' )
		$border_style = get_post_meta($id, '_sfbap-form8-border-style', true);
	else
		$border_style = 'solid';

	if( get_post_meta($id, '_sfbap-form8-border-color', true) !='' )
		$border_color = get_post_meta($id, '_sfbap-form8-border-color', true);
	else
		$border_color = '#86A54A';

	if( get_post_meta($id, '_sfbap-form8-name-field-border-color', true) !='' )
		$name_border_color = get_post_meta($id, '_sfbap-form8-name-field-border-color', true);
	else
		$name_border_color = '';

	if( get_post_meta($id, '_sfbap-form8-email-field-border-color', true) !='' )
		$email_border_color = get_post_meta($id, '_sfbap-form8-email-field-border-color', true);
	else
		$email_border_color = '';

	if( get_post_meta($id, '_sfbap-form8-button-background-color', true) !='' )
		$button_background_color = get_post_meta($id, '_sfbap-form8-button-background-color', true);
	else
		$button_background_color = '#86A54A';

	if( get_post_meta($id, '_sfbap-form8-button-text-size', true) !='' )
		$button_text_size = get_post_meta($id, '_sfbap-form8-button-text-size', true);
	else
		$button_text_size = '16';

	if( get_post_meta($id, '_sfbap-form8-button-text-color', true) !='' )
		$button_text_color = get_post_meta($id, '_sfbap-form8-button-text-color', true);
	else
		$button_text_color = 'white';

	if( get_post_meta($id, '_sfbap-form8-heading-color', true) !='' )
		$form_heading_color = get_post_meta($id, '_sfbap-form8-heading-color', true);
	else
		$form_heading_color = 'white';

	if( get_post_meta($id, '_sfbap-form8-sub-heading-color', true) !='' )
		$form_sub_heading_color = get_post_meta($id, '_sfbap-form8-sub-heading-color', true);
	else
		$form_sub_heading_color = 'white';

	?>
	<style>
		#sfbap-success-message{
			display: none;
			margin: 0;
			width: 100%;
			text-align: center;
			padding: 10px 20px;
			font-family: monospace;
			font-size: 14px;
			letter-spacing: 1px;

		}
		#sfbap-form9-newsletter {
			width: <?php if($widget != 'true'){ echo $form_width.'px';}else{echo '250px';} ?> !important;
			font-family: 'Open Sans', sans-serif !important;
			background-color: #0A1A29 !important;
			box-shadow: 0 2px 4px -2px rgba(0, 0, 0, .4) !important;
			padding-bottom: 20px !important;
			margin: 0 auto !important;
			position: relative !important;

		}

		#sfbap-form9-newsletter header {
			color: #fff !important;
			text-align: center !important;
			padding: 30px 20px 30px !important;
			background: <?php echo $form_background_color; ?> !important;
			border-top: <?php echo $border_size;?>px <?php echo $border_style; ?> <?php echo $border_color;?> !important;

		}

		#sfbap-form9-newsletter .arrow-down {
			width: 0 !important;
			height: 0 !important;
			border-left: 15px solid transparent !important;
			border-right: 15px solid transparent !important;
			margin: 0 auto !important;
			border-top: 15px solid #2D4256 !important;
			background-color: #0A1A29 !important;
			padding-bottom: 20px !important;
		}

		#sfbap-form9-newsletter h1 {
			font-size: 2em !important;
			margin: 10px 0 0 !important;
		}

		#sfbap-form9-newsletter p {
			font-size: 14px !important;
			text-align: center;
		}

		#sfbap-form9-newsletter form {
			padding: 40px 0 !important;
			background-color: #0A1A29 !important;
		}

		#sfbap-form9-newsletter form input {
			font-family: 'Open Sans', sans-serif !important;
			font-weight: bold !important;
			color: black !important;
		}

		#sfbap-form9-newsletter .field-container,
		#sfbap-form9-newsletter .controls-container {
			position: relative !important;
			width: 90% !important;
			margin: 0 auto !important;
		}

		#sfbap-form9-newsletter .field-container {
			margin-bottom: 10px !important;
		}

		#sfbap-form9-newsletter .field-container label {
			display: none !important;
		}

		#sfbap-form9-newsletter .field-container input {
		    display: block !important;
			width: 96% !important;
		    color: #666 !important;
		    border: 0 !important;
		    border-radius: 2px !important;
		    box-shadow: 0 1px 2px -1px rgba(0, 0, 0, .3) !important;
		    outline: none !important;
		    height: 35px;
		    padding-left: 16px;
		    height: 35px;
		}

		#sfbap-form9-newsletter .field-container i {
			position: absolute !important;
			font-size: 1.4em !important;
			color: #6ACAC3 !important;
			top: 16px !important;
			right: 15px !important;
			transition: color .4s ease !important;
		}

		#sfbap-form9-newsletter .field-container input:focus:invalid ~ i {
			color: #666 !important;
		}

		#sfbap-form9-newsletter .field-container input:focus:valid ~ i {
			color: #6ACAC3 !important;
		}

		#sfbap-form9-newsletter .controls-container input {
			position: relative !important;
			display: block !important;
			width: 100% !important;
			color: <?php echo $button_text_color;?> !important;
			font-size: <?php echo $button_text_size; ?>px !important;
			font-weight: 600 !important;
			padding: 12px !important;
			border: 0 !important;
			border-radius: 2px !important;
			background-color: <?php echo $button_background_color; ?> !important;
			box-shadow: 0 3px 1px -2px rgba(0, 0, 0, .3) !important;
			transition: opacity .4s ease !important;
			cursor: pointer !important;
		}

		#sfbap-form9-newsletter .controls-container input:hover,
		#sfbap-form9-newsletter .controls-container input:focus {
			opacity: .8 !important;
		}

		#sfbap-form9-newsletter .controls-container input:active {
			box-shadow: none !important;
			top: 1px !important;
		}
		#sfbap-form9-heading{
			color: white !important;
		}
		.sfbap-form-name{
			border: 1px solid <?php echo $name_border_color; ?> !important;
		}
		.sfbap-form-email{
			border: 1px solid <?php echo $email_border_color; ?> !important;
		}



	</style>
	<?php  ?>
	<form id="sfbap_subscribe_form" action="" method="POST">
		<div id="sfbap-form9-newsletter" class="newsletter-grid newsletter-clearfix sfbap-main-form-container" >
			<header>
				<h1 id="sfbap-form9-heading"><?php echo $form_heading; ?></h1>
				<p><?php echo $form_sub_heading; ?></p>
			</header>
			<div class="arrow-down"></div>

			<div class="field-container">
				<label>Name:</label>
				<input id="sfbap-form9-name" name="sfbap-form-name" class="sfbap-form-name" type="text" placeholder="First name"  />
			</div>
			<div class="field-container">
				<label>Email:</label>
				<input id="sfbap-form9-email" name="sfbap-form-email" class="sfbap-form-email" type="email" placeholder="Your email"  />
			</div>
			<div class="controls-container">
				<input id="sfbap-form-submit-button" class="sfbap-form-submit-button" type="submit" value="<?php echo $button_text; ?>" />
			</div>

			<div id="sfbap_thanks_container" style="display:none;justify-content:center;align-items:center;width:100%;height:100%;    position: absolute;background: rgba(0,0,0,0.8);top: 0;left: 0;">
				<div style="width:100%;padding: 15%">
					<p id="sfbap_thanks_image" style="margin: 0;text-align: center;"><img src="<?php echo plugins_url('../images/tick.png',__FILE__);?>"></p>
					<p id="sfbap_thanks_message" style="margin: 0;text-align: center; font-size: 25px;color: white;font-weight: bold;font-family:'Arial'">You Have Successfully Subscribed to the Newsletter</p>
				</div>
			</div>
		</div>

	</div>
</form>

<input type='hidden' id='sfbap_post_type_id' name="sfbap_post_type_id" value="<?php echo $id; ?>" /> 
<?php


}


if (!empty($sfbap_subscribe_form) && $sfbap_subscribe_form == 'subscribeform9') {

	if( get_post_meta($id, '_sfbap-form9-background-color', true) !='' )
		$form_background_color = get_post_meta($id, '_sfbap-form9-background-color', true);
	else
		$form_background_color = 'white';

	if( get_post_meta($id, '_sfbap-form9-heading', true) !='' )
		$form_heading = get_post_meta($id, '_sfbap-form9-heading', true);
	else
		$form_heading = 'Newsletter';

	if( get_post_meta($id, '_sfbap-form9-sub-heading', true) !='' )
		$form_sub_heading = get_post_meta($id, '_sfbap-form9-sub-heading', true);
	else
		$form_sub_heading = 'Send us your email, we will make sure you never miss a thing!';

	if( get_post_meta($id, '_sfbap-form9-subscribe-button-text', true) !='' )
		$button_text = get_post_meta($id, '_sfbap-form9-subscribe-button-text', true);
	else
		$button_text = 'Subscribe';

	if( get_post_meta($id, '_sfbap-form9-border-size', true) !='' )
		$border_size = get_post_meta($id, '_sfbap-form9-border-size', true);
	else
		$border_size = '2';

	if( get_post_meta($id, '_sfbap-form9-border-style', true) !='Select Border Style' && get_post_meta($id, '_sfbap-form9-border-style', true) !='' )
		$border_style = get_post_meta($id, '_sfbap-form9-border-style', true);
	else
		$border_style = 'solid';

	if( get_post_meta($id, '_sfbap-form9-border-color', true) !='' )
		$border_color = get_post_meta($id, '_sfbap-form9-border-color', true);
	else
		$border_color = '#e3e3e3';

	if( get_post_meta($id, '_sfbap-form9-name-field-border-color', true) !='' )
		$name_border_color = get_post_meta($id, '_sfbap-form9-name-field-border-color', true);
	else
		$name_border_color = '#c9c9c9';

	if( get_post_meta($id, '_sfbap-form9-button-text-size', true) !='' )
		$button_text_size = get_post_meta($id, '_sfbap-form9-button-text-size', true);
	else
		$button_text_size = '14';

	if( get_post_meta($id, '_sfbap-form9-button-text-color', true) !='' )
		$button_text_color = get_post_meta($id, '_sfbap-form9-button-text-color', true);
	else
		$button_text_color = 'white';

	if( get_post_meta($id, '_sfbap-form9-heading-color', true) !='' )
		$form_heading_color = get_post_meta($id, '_sfbap-form9-heading-color', true);
	else
		$form_heading_color = '#4783ce';

	if( get_post_meta($id, '_sfbap-form9-sub-heading-color', true) !='' )
		$form_sub_heading_color = get_post_meta($id, '_sfbap-form9-sub-heading-color', true);
	else
		$form_sub_heading_color = 'black';
	?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<style>
		#sfbap-success-message{
			display: none;
			margin: 0;
			width: 100%;
			text-align: center;
			padding: 10px 20px;
			font-family: monospace;
			font-size: 14px;
			letter-spacing: 1px;

		}
		#sfbap-form9-newsletter input {
			height:38px !important;
			font-size:<?php echo $button_text_size; ?> !important;
			width:100% !important;
			box-sizing: border-box !important; 
			border-radius:3px !important;
			border-width:1px !important;
			border-style:solid !important;
			border-color:transparent !important;
		}
		#sfbap-form9-newsletter input[type="text"] {
			padding:2px 12px !important;
			margin-bottom:8px !important;
			border-color:#c9c9c9 !important;
			box-shadow:inset 0 1px 3px rgba(0,0,0,0.25) !important;
			width: 90% !important;
			margin: 0 auto !important;
			margin-bottom: 10px !important;
		}
		#sfbap-form9-newsletter input[type="submit"] {
			color:<?php echo $button_text_color;?> !important;
			font-weight:bold !important;
			font-family:'Open Sans', sans-serif !important;
			border-color:#1c385c !important;
			box-shadow:inset 0 1px 0 #7fade7 !important;
			text-shadow:0 -1px #34629f !important;
			cursor: pointer !important;
			width: 90% !important;
			margin: 0 auto !important;
			box-shadow: none !important;
			margin-bottom: 10px !important;
			background: linear-gradient(to top, #3e74bb 0, #4887dd 100%) !important;
			font-size: <?php echo $button_text_size;?>px !important;
			height: auto !important;
		}
		#sfbap-form9-newsletter {
			width:500px !important;
			background:<?php echo $form_background_color; ?> !important;
			position:relative !important;
			border-radius:4px !important;
			z-index:20 !important;
			border: <?php echo $border_size;?>px <?php echo $border_style; ?> <?php echo $border_color;?> !important;
			margin: 0 auto !important;

			font-family: 'Arial' !important;
		}
		#sfbap-form9-newsletter:before {
			display:block !important;
			content:"" !important;
			height:5px !important;
			width:100% !important;
			top:-20px !important;
			right:-20px !important;
			left:-20px !important;
			border-top-right-radius:4px !important;
			border-top-left-radius:4px !important;
			background: repeating-linear-gradient(-225deg, #4782ce, #4782ce 12px, #fff 12px, #fff 24px, #ea222e 24px, #ea222e 36px, #fff 36px, #fff 48px) !important;
		}
		#sfbap-form9-newsletter .seal {
			position:absolute !important;
			top:-1px !important;
			right:0 !important;
		}
		#sfbap-form9-newsletter .seal:before,
		#sfbap-form9-newsletter .seal:after {
			display:block !important;
			content:"" !important;
			border:1px solid #dcdcdc !important;
			border-radius:50% !important;
			position:absolute !important;
		}
		#sfbap-form9-newsletter.seal:before {
			width:50px !important;
			height:50px !important;
			top:8px !important;
			right:8px !important;
		}
		#sfbap-form9-newsletter.seal:after {
			width:60px !important;
			height:60px !important;
			top:3px !important;
			right:3px !important;
		}
		#sfbap-form9-newsletter .seal i {
			position:absolute !important;
			font-size:24px !important;
			color:#afafaf !important;
			top:20px !important;
			right:22px !important;
			transform: rotate(12deg) !important;
		}
		#sfbap-form9-newsletter form {
			padding:24px 20px 20px !important;
		}
		#sfbap-form9-heading {
			font-size:24px !important;
			font-weight:100 !important;
			color:<?php echo $form_heading_color;?> !important;
			margin-bottom:5px !important;
			margin-top: 31px !important;
			margin-left: 25px !important;

		}
		#sfbap-form9-newsletter form label {
			display:block !important;
			font-size:16px !important;
			line-height:24px !important;
			color:#818181 !important;
			margin-bottom:20px !important;
		}
		.sfbap-form9-newsletter-shadow {
			width:240px !important;
			height:30px !important;
			margin:0 auto !important;
			box-shadow:10px 10px 15px rgba(0,0,0,0.4) !important;
			border-radius:50% !important;
			position:relative !important;
			top:-30px !important;
			z-index:10 !important;
		}
		#sfbap-form9-fields-elements{
			text-align: center !important;
		}
		#sfbap-form9-subheading{
			margin-left: 25px !important;
			color: <?php echo $form_sub_heading_color;?> !important;
			font-size: 16px !important;
		}


	</style>
	<?php  ?>
	<form id="sfbap_subscribe_form" action="" method="POST">
		<div id="sfbap-form9-newsletter" class="sfbap-main-form-container">

			<div class="seal">
				<i class="fa fa-envelope-o"></i>
			</div>
			<div id="sfbap-form9-heading" class="title">
				<?php echo $form_heading; ?>
			</div>
			<p id="sfbap-form9-subheading">
				<?php echo $form_sub_heading; ?>
			</p>
			<p id="sfbap-form9-fields-elements"><input id="sfbap-form9-email" class="sfbap-form-email" name="sfbap-form9-email" type="text" placeholder="enter your email here" />
				<input id="sfbap-form-submit-button" class="sfbap-form-submit-button" type="submit" value="<?php echo $button_text; ?>" />
			</p>

			<div id="sfbap_thanks_container" style="display:none;justify-content:center;align-items:center;width:100%;height:100%;    position: absolute;background: rgba(0,0,0,0.8);top: 0;left: 0;">
				<div style="width:100%;padding: 15%">
					<p id="sfbap_thanks_image" style="margin: 0;text-align: center;"><img src="<?php echo plugins_url('../images/tick.png',__FILE__);?>"></p>
					<p id="sfbap_thanks_message" style="margin: 0;text-align: center; font-size: 25px;color: white;font-weight: bold;font-family:'Arial'">You Have Successfully Subscribed to the Newsletter</p>
				</div>
			</div>
		</div>
	</div>
</form>

<input type='hidden' id='sfbap_post_type_id' name="sfbap_post_type_id" value="<?php echo $id; ?>" /> 
<?php

}


if (!empty($sfbap_subscribe_form) && $sfbap_subscribe_form == 'subscribeform10') {
	if( get_post_meta($id, '_sfbap-form10-width', true) !='' )
		$form_width = get_post_meta($id, '_sfbap-form10-width', true);
	else
		$form_width = '550';

	if( get_post_meta($id, '_sfbap-form10-background-image', true) !='' )
		$form_background_image = get_post_meta($id, '_sfbap-form10-background-image', true);

	if( get_post_meta($id, '_sfbap-form10-background-color', true) !='' )
		$form_background_color = get_post_meta($id, '_sfbap-form10-background-color', true);
	else
		$form_background_color = 'white';

	if( get_post_meta($id, '_sfbap-form10-heading', true) !='' )
		$form_heading = get_post_meta($id, '_sfbap-form10-heading', true);
	else
		$form_heading = 'SUBSCRIBE NOW';

	if( get_post_meta($id, '_sfbap-form10-sub-heading', true) !='' )
		$form_sub_heading = get_post_meta($id, '_sfbap-form10-sub-heading', true);
	else
		$form_sub_heading = 'Get informed about the next updates';

	if( get_post_meta($id, '_sfbap-form10-subscribe-button-text', true) !='' )
		$button_text = get_post_meta($id, '_sfbap-form10-subscribe-button-text', true);
	else
		$button_text = 'SUBSCRIBE';

	if( get_post_meta($id, '_sfbap-form10-border-size', true) !='' )
		$border_size = get_post_meta($id, '_sfbap-form10-border-size', true);
	else
		$border_size = '1';

	if( get_post_meta($id, '_sfbap-form10-border-style', true) !='Select Border Style' && get_post_meta($id, '_sfbap-form10-border-style', true) !='' )
		$border_style = get_post_meta($id, '_sfbap-form10-border-style', true);
	else
		$border_style = 'solid';

	if( get_post_meta($id, '_sfbap-form10-border-color', true) !='' )
		$border_color = get_post_meta($id, '_sfbap-form10-border-color', true);
	else
		$border_color = '';

	if( get_post_meta($id, '_sfbap-form10-email-field-border-color', true) !='' )
		$email_border_color = get_post_meta($id, '_sfbap-form10-email-field-border-color', true);
	else
		$email_border_color = 'rgba(0, 0, 0, 0.3);';

	if( get_post_meta($id, '_sfbap-form10-button-background-color', true) !='' )
		$button_background_color = get_post_meta($id, '_sfbap-form10-button-background-color', true);
	else
		$button_background_color = '#FF316B';

	if( get_post_meta($id, '_sfbap-form10-button-text-size', true) !='' )
		$button_text_size = get_post_meta($id, '_sfbap-form10-button-text-size', true);
	else
		$button_text_size = '14';

	if( get_post_meta($id, '_sfbap-form10-button-text-color', true) !='' )
		$button_text_color = get_post_meta($id, '_sfbap-form10-button-text-color', true);
	else
		$button_text_color = 'white';

	if( get_post_meta($id, '_sfbap-form10-heading-color', true) !='' )
		$form_heading_color = get_post_meta($id, '_sfbap-form10-heading-color', true);
	else
		$form_heading_color = 'black';

	if( get_post_meta($id, '_sfbap-form10-sub-heading-color', true) !='' )
		$form_sub_heading_color = get_post_meta($id, '_sfbap-form10-sub-heading-color', true);
	else
		$form_sub_heading_color = 'black';
	?>
	<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>

	<style>
		#sfbap-success-message{
			display: none;
			margin: 0;
			width: 100%;
			text-align: center;
			padding: 10px 20px;
			font-family: monospace;
			font-size: 14px;
			letter-spacing: 1px;

		}    /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
		#sfbap-form10-container {
			width: <?php if($widget != 'true'){ echo $form_width.'px';}else{echo '250px';} ?> !important;
			background-color: <?php echo $form_background_color; ?> !important;
			background-image: url('<?php echo $form_background_image; ?>') !important;
			background-size: cover !important;
			border-radius: 2px !important;
			box-shadow: 0px 0px 7px 0px rgba(0, 0, 0, 0.2) !important;
			font-family: 'Arial' !important;
			padding-bottom: 10px !important;
			padding-top: 1px !important;
			margin: 0 auto !important;
			border: <?php echo $border_size; ?>px <?php echo $border_style; ?> <?php echo $border_color; ?> !important;
			position: relative !important;

		}
		#sfbap-form10-container h1 {
			font-size: 26px !important;
			text-align: center !important;
			text-transform: uppercase !important;
			line-height: 2 !important;
			color: <?php echo $form_heading_color;?> !important;
		}

		#sfbap-form10-container .logo img {
			margin: 30px auto !important;
			display: block !important;
		}

		#sfbap-form10-container hr {
			width: 35px !important;
			height: 1px !important;
			background-color: rgba(0, 0, 0, 0.9) !important;
			border: 0px !important;
			margin-top: -15px !important;
		}

		#sfbap-form10-container h6 {
			text-align: center !important;
			font-size: 12px !important;
			color: <?php echo $form_sub_heading_color;?> !important;
		}

		#sfbap-form10-container input {
			margin: 20px auto !important;
			display: block !important;
		}

		#sfbap-form10-container input[name="sfbap-form-email"], #sfbap-form10-container input[name="button"] {
			width: 93% !important;
			height: 35px !important;
			border: none !important;
			box-shadow: none !important;
			outline: none !important;
			padding: 0;
		}

		#sfbap-form10-container input[name="sfbap-form-email"] {
			border: 1px solid rgba(0, 0, 0, 0.3) !important;
			padding-left: 10px !important;
		}

		#sfbap-form10-container input[name="button"] {
			background-color: <?php echo $button_background_color;?> !important;
			color: <?php echo $button_text_color;?> !important;
			text-transform: uppercase !important;
			cursor: pointer !important;
			font-size: <?php echo $button_text_size;?>px !important;
			padding-left: 15px;
		}
		#sfbap-form10-subheading{
			margin: 0 !important;
		}


	</style>
	<?php  ?>
	<form id="sfbap_subscribe_form" action="" method="POST">


		<div id="sfbap-form10-container" class="sfbap-main-form-container">
			<h1 id="sfbap-form10-heading"><?php echo $form_heading; ?></h1>
			<h6 id="sfbap-form10-subheading"><?php echo $form_sub_heading; ?></h6>
			<input id="sfbap-form10-email" name="sfbap-form-email" class="sfbap-form-email" type="email" placeholder="Your Email" name="email"/>
			<input id="sfbap-form-submit-button" class="sfbap-form-submit-button" type="submit" value="<?php echo $button_text; ?>" name="button"/>
			<div id="sfbap_thanks_container" style="display:none;justify-content:center;align-items:center;width:100%;height:100%;    position: absolute;background: rgba(0,0,0,0.8);top: 0;left: 0;">
				<div style="width:100%;padding: 15%">
					<p id="sfbap_thanks_image" style="margin: 0;text-align: center;"><img src="<?php echo plugins_url('../images/tick.png',__FILE__);?>"></p>
					<p id="sfbap_thanks_message" style="margin: 0;text-align: center; font-size: 25px;color: white;font-weight: bold;font-family:'Arial'">You Have Successfully Subscribed to the Newsletter</p>
				</div>
			</div>
		</div>
	</div>
</form>


<input type='hidden' id='sfbap_post_type_id' name="sfbap_post_type_id" value="<?php echo $id; ?>" /> 
<?php


}


if (!empty($sfbap_subscribe_form) && $sfbap_subscribe_form == 'subscribeform11') {
	if( get_post_meta($id, '_sfbap-form11-width', true) !='' )
		$form_width = get_post_meta($id, '_sfbap-form11-width', true);
	else
		$form_width = '600';

	if( get_post_meta($id, '_sfbap-form11-background-image', true) !='' )
		$form_background_image = get_post_meta($id, '_sfbap-form11-background-image', true);

	if( get_post_meta($id, '_sfbap-form11-background-color', true) !='' )
		$form_background_color = get_post_meta($id, '_sfbap-form11-background-color', true);

	if( get_post_meta($id, '_sfbap-form11-heading', true) !='' )
		$form_heading = get_post_meta($id, '_sfbap-form11-heading', true);
	else
		$form_heading = 'Get Free Email Updates!';

	if( get_post_meta($id, '_sfbap-form11-sub-heading', true) !='' )
		$form_sub_heading = get_post_meta($id, '_sfbap-form11-sub-heading', true);
	else
		$form_sub_heading = 'Signup now and receive an email once I publish new content.';

	if( get_post_meta($id, '_sfbap-form11-subscribe-button-text', true) !='' )
		$button_text = get_post_meta($id, '_sfbap-form11-subscribe-button-text', true);
	else
		$button_text = 'SIGN UP';

	if( get_post_meta($id, '_sfbap-form11-border-size', true) !='' )
		$border_size = get_post_meta($id, '_sfbap-form11-border-size', true);
	else
		$border_size = '1';

	if( get_post_meta($id, '_sfbap-form11-border-style', true) !='Select Border Style' && get_post_meta($id, '_sfbap-form11-border-style', true) !='' )
		$border_style = get_post_meta($id, '_sfbap-form11-border-style', true);
	else
		$border_style = 'solid';

	if( get_post_meta($id, '_sfbap-form11-border-color', true) !='' )
		$border_color = get_post_meta($id, '_sfbap-form11-border-color', true);
	else
		$border_color = '#cacaca';

	if( get_post_meta($id, '_sfbap-form11-name-field-border-color', true) !='' )
		$name_border_color = get_post_meta($id, '_sfbap-form11-name-field-border-color', true);
	else
		$name_border_color = '#cfcfcf';

	if( get_post_meta($id, '_sfbap-form11-email-field-border-color', true) !='' )
		$email_border_color = get_post_meta($id, '_sfbap-form11-email-field-border-color', true);
	else
		$email_border_color = '#cfcfcf';

	if( get_post_meta($id, '_sfbap-form11-button-background-color', true) !='' )
		$button_background_color = get_post_meta($id, '_sfbap-form11-button-background-color', true);
	else
		$button_background_color = '#20a64c';

	if( get_post_meta($id, '_sfbap-form11-button-text-size', true) !='' )
		$button_text_size = get_post_meta($id, '_sfbap-form11-button-text-size', true);
	else
		$button_text_size = '';

	if( get_post_meta($id, '_sfbap-form11-button-text-color', true) !='' )
		$button_text_color = get_post_meta($id, '_sfbap-form11-button-text-color', true);
	else
		$button_text_color = 'white';

	if( get_post_meta($id, '_sfbap-form11-heading-color', true) !='' )
		$form_heading_color = get_post_meta($id, '_sfbap-form11-heading-color', true);
	else
		$form_heading_color = '#f0483d';

	if( get_post_meta($id, '_sfbap-form11-sub-heading-color', true) !='' )
		$form_sub_heading_color = get_post_meta($id, '_sfbap-form11-sub-heading-color', true);
	else
		$form_sub_heading_color = 'black';
	?>
	<link href="https://fonts.googleapis.com/css?family=Architects+Daughter" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Farsan" rel="stylesheet">
	<style>
		#sfbap-form11-container{

			width: <?php if($widget != 'true'){ echo $form_width.'px';}else{echo '250px';} ?> !important;
			border: <?php echo $border_size; ?>px <?php echo $border_style; ?> <?php echo $border_color; ?> !important;
			border-radius: 5px !important;
			padding: 20px !important;
			background-color: white !important;
			box-shadow: 5px 5px 5px #f5f5f5 !important;
			text-align: center !important;
			background-image: url('<?php echo plugins_url('../images/bg.jpg',__FILE__);?>') !important;
			margin: 0 auto !important;
			position: relative !important;

		}

		#sfbap-form11-heading{
			font-family: 'Architects Daughter', cursive !important;
			color:<?php echo $form_heading_color; ?> !important;
			font-size: 30px !important;
			font-style:italic !important;
			margin:0 !important;
		}

		#sfbap-form11-subheading{
			font-family: 'Farsan', cursive !important;
			margin-top:0 !important;
			color: <?php echo $form_sub_heading_color;?> !important;
			text-align: center;
			font-size: 16px !important;

		}

		#sfbap-form11-name{
			padding-left:10px !important;
			width:30% !important;
			height:32px !important;
			border-radius: 5px !important;
			box-shadow: none !important;
			border: 1px solid <?php echo $name_border_color;?> !important;
			display: inline-block !important;
			padding: 0 !important;
			padding-left: 10px !important;
			background: white;


		}

		#sfbap-form11-email{
			padding-left:10px !important;
			width:32% !important;
			height:30px !important;
			border-radius: 5px !important;
			box-shadow: none !important;
			border: 1px solid <?php echo $email_border_color;?> !important;
			display: inline-block !important;
			padding: 0 !important;
			padding-left: 10px !important;
			background: white;



		}

		#sfbap-form11-button{
			height:30px !important;
			background-color: #20a64c !important;
			color:white !important;
			border-radius:5px !important;
			border:none !important;
			box-shadow: none !important;
			background-color: <?php echo $button_background_color; ?> !important;
			color: <?php echo $button_text_color; ?> !important;
			font-size: <?php echo $button_text_size;?>px !important;
		    padding: 0px 20px !important;
		}

		#sfbap-form11-closing-note{
			font-size: 11px !important;
			font-family: 'Arial' !important;
			margin: 0 !important;
			margin-top: 10px !important;
			margin-bottom: -10px !important;
			text-align: center !important;

		}



	</style>
	<?php  ?>
	<form id="sfbap_subscribe_form" action="" method="POST">

		<div id="sfbap-form11-container" class="sfbap-main-form-container">

			<h1 id="sfbap-form11-heading">
				<?php echo $form_heading; ?>

			</h1>

			<p id="sfbap-form11-subheading">
				<?php echo $form_sub_heading; ?>
			</p>

			<input id="sfbap-form11-name" type="text" name="sfbap-form-name" class="sfbap-form-name" placeholder="Enter Your Name">

			<input id="sfbap-form11-email" type="text" name="sfbap-form-email" class="sfbap-form-email" placeholder="Enter Your Email Address">

			<input id="sfbap-form11-button" type="submit" value="<?php echo $button_text; ?>">

			<p id="sfbap-form11-closing-note">
				You can unsubscribe at any time.

			</p>
			<div id="sfbap_thanks_container" style="display:none;justify-content:center;align-items:center;width:100%;height:100%;    position: absolute;background: rgba(0,0,0,0.8);top: 0;left: 0;">
				<div style="width:100%;padding: 15%">
					<p id="sfbap_thanks_image" style="margin: 0;text-align: center;"><img src="<?php echo plugins_url('../images/tick.png',__FILE__);?>"></p>
					<p id="sfbap_thanks_message" style="margin: 0;text-align: center; font-size: 25px;color: white;font-weight: bold;font-family:'Arial'">You Have Successfully Subscribed to the Newsletter</p>
				</div>
			</div>
		</div>

	</div>
</form>
<input type='hidden' id='sfbap_post_type_id' name="sfbap_post_type_id" value="<?php echo $id; ?>" /> 
<?php


}


if (!empty($sfbap_subscribe_form) && $sfbap_subscribe_form == 'subscribeform12') {

	if( get_post_meta($id, '_sfbap-form12-width', true) !='' )
		$form_width = get_post_meta($id, '_sfbap-form12-width', true);
	else
		$form_width = '550';

	if( get_post_meta($id, '_sfbap-form12-background-image', true) !='' )
		$form_background_image = get_post_meta($id, '_sfbap-form12-background-image', true);
	else
		$form_background_image = ''. plugins_url('../images/prism.jpg',__FILE__);

	if( get_post_meta($id, '_sfbap-form12-background-color', true) !='' )
		$form_background_color = get_post_meta($id, '_sfbap-form12-background-color', true);
	else
		$form_background_color = '';

	if( get_post_meta($id, '_sfbap-form12-heading', true) !='' )
		$form_heading = get_post_meta($id, '_sfbap-form12-heading', true);
	else
		$form_heading = 'Get new posts delivered to your inbox!';

	if( get_post_meta($id, '_sfbap-form12-sub-heading', true) !='' )
		$form_sub_heading = get_post_meta($id, '_sfbap-form12-sub-heading', true);
	else
		$form_sub_heading = 'Be the first one to find out more about our awesome themes!';

	if( get_post_meta($id, '_sfbap-form12-subscribe-button-text', true) !='' )
		$button_text = get_post_meta($id, '_sfbap-form12-subscribe-button-text', true);
	else
		$button_text = 'Subscribe';

	if( get_post_meta($id, '_sfbap-form12-border-size', true) !='' )
		$border_size = get_post_meta($id, '_sfbap-form12-border-size', true);
	else
		$border_size = '';

	if( get_post_meta($id, '_sfbap-form12-border-style', true) !='Select Border Style' && get_post_meta($id, '_sfbap-form12-border-style', true) !='' )
		$border_style = get_post_meta($id, '_sfbap-form12-border-style', true);
	else
		$border_style = '';

	if( get_post_meta($id, '_sfbap-form12-border-color', true) !='' )
		$border_color = get_post_meta($id, '_sfbap-form12-border-color', true);
	else
		$border_color = '';

	if( get_post_meta($id, '_sfbap-form12-email-field-border-color', true) !='' )
		$email_border_color = get_post_meta($id, '_sfbap-form12-email-field-border-color', true);
	else
		$email_border_color = 'transparent';

	if( get_post_meta($id, '_sfbap-form12-button-background-color', true) !='' )
		$button_background_color = get_post_meta($id, '_sfbap-form12-button-background-color', true);
	else
		$button_background_color = '#57b557';

	if( get_post_meta($id, '_sfbap-form12-button-text-size', true) !='' )
		$button_text_size = get_post_meta($id, '_sfbap-form12-button-text-size', true);
	else
		$button_text_size = '';

	if( get_post_meta($id, '_sfbap-form12-button-text-color', true) !='' )
		$button_text_color = get_post_meta($id, '_sfbap-form12-button-text-color', true);
	else
		$button_text_color = 'white';

	if( get_post_meta($id, '_sfbap-form12-heading-color', true) !='' )
		$form_heading_color = get_post_meta($id, '_sfbap-form12-heading-color', true);
	else
		$form_heading_color = 'white';

	if( get_post_meta($id, '_sfbap-form12-sub-heading-color', true) !='' )
		$form_sub_heading_color = get_post_meta($id, '_sfbap-form12-sub-heading-color', true);
	else
		$form_sub_heading_color = 'white';
	?>
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<style>

		#sfbap-form12-envelope{


		}

		#sfbap-form12-envelope-container{
			text-align:left !important;
			width:100% !important;

		}


		#sfbap-form12-container{
			background: <?php echo $form_background_color; ?> !important;
			background-image: url('<?php echo $form_background_image; ?>') !important;
			background-size: cover !important;
			width:<?php if($widget != 'true'){ echo $form_width.'px';}else{echo '250px';} ?> !important;
			text-align:center !important;
			border-radius: 10px !important;
			position:relative !important;
			padding:15px !important;
			margin: 0 auto !important;
			border: <?php echo $border_size; ?>px <?php echo $border_style;?> <?php echo $border_color; ?> !important;
			position: relative !important;

		}

		#sfbap-form12-heading{
			width:100% !important;
			font-size: 25px !important;
			line-height: 1 !important;
			display:block !important;
			color:<?php echo $form_heading_color; ?> !important;
			font-family: 'Nunito', sans-serif !important;


		}

		#sfbap-form12-subheading{
			width:100% !important;
			font-size: 14px !important;
			font-family: 'Nunito', sans-serif !important;
			line-height: 1 !important;
			display:block !important;
			margin: 10px !important;
			color:<?php echo $form_sub_heading_color; ?> !important;
			text-align: center;
		}

		#sfbap-form12-email{
		    width: 80% !important;
		    border-radius: 5px !important;
		    font-size: 15px !important;
		    font-weight: bold !important;
		    padding: 0px !important;
		    border: none !important;
		    box-shadow: none !important;
		    margin: 0 auto !important;
		    padding-left: 15px !important;
		    height: 40px !important;
		    margin-top: 5px !important;

		}

		#sfbap-form12-closing-note{
			font-size:12px !important;
			color:white !important;
			font-style:italic !important;
			margin: 10px !important;
			text-align: center;

		}

		#sfbap-form12-subscribe{
			height:auto !important;
			color:white !important;
			background-color: #57b557 !important;
			font-family: 'Nunito', sans-serif !important;
			box-shadow:none !important;
			border:none !important;
			border-radius:5px !important;
			font-weight:bold !important;
			display:block !important;
			margin:30px auto !important;
			cursor: pointer !important;
			background-color: <?php echo $button_background_color; ?> !important;
			color: <?php echo $button_text_color; ?> !important;
			font-size: <?php echo $button_text_size;?>px !important;
			padding: 10px 20px !important;
		}


	</style>
	<form id="sfbap_subscribe_form" action="" method="POST">
		<div id="sfbap-form12-container" class="sfbap-main-form-container">
			<div id="sfbap-form12-envelope-container">
				<img id="sfbap-form12-envelope" src="<?php echo plugins_url('../images/sfbap-envelope.png',__FILE__);?>" width="50px">
			</div>
			<h1 id="sfbap-form12-heading">
				<?php echo $form_heading;?>
			</h1>
			<p id="sfbap-form12-subheading">
				<?php echo $form_sub_heading;?>
			</p>
			<input id="sfbap-form12-email" name="sfbap-form-email" class="sfbap-form-email" type="text" placeholder="youremail@gmail.com">
			<p id="sfbap-form12-closing-note">
				We value your privacy. Your email address will not be shared.
			</p>
			<input id="sfbap-form12-subscribe" type="submit" value="Subscribe">
			<div id="sfbap_thanks_container" style="display:none;justify-content:center;align-items:center;width:100%;height:100%;    position: absolute;background: rgba(0,0,0,0.8);top: 0;left: 0;">
				<div style="width:100%;padding: 15%">
					<p id="sfbap_thanks_image" style="margin: 0;text-align: center;"><img src="<?php echo plugins_url('../images/tick.png',__FILE__);?>"></p>
					<p id="sfbap_thanks_message" style="margin: 0;text-align: center; font-size: 25px;color: white;font-weight: bold;font-family:'Arial'">You Have Successfully Subscribed to the Newsletter</p>
				</div>
			</div>
		</div>
	</div>
</form>
<input type='hidden' id='sfbap_post_type_id' name="sfbap_post_type_id" value="<?php echo $id; ?>" /> 
<?php



}
return ob_get_clean();
}