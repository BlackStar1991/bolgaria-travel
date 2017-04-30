<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
include('subscribeform1-settings.php');
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

	#sfbap-form2-container{
		width: <?php echo $form_width;?>px;
		border: <?php echo $border_size; ?>px <?php echo $border_style; ?> <?php echo $border_color; ?>;
		display: block;
		text-align: center;
		padding: 15px;
		border-radius: 2px;
		font-family: 'Arial';
		background: <?php echo $form_background_color; ?>;
		background-image: url('<?php echo $form_background_image; ?>');
		background-size: cover;
		margin: 0 auto;


	}
	.sfbap-form2-fields{
		width: 90%;
		display: inline-block;
		padding-left: 15px;
		margin-top: 10px;
		font-size: 16px;
		background-color: rgba(128, 126, 126, 0.04);
		border: 1px solid rgba(128, 126, 126, 0.12);
		border-radius: 2px;
		height: 40px;
		font-weight: bold;
		outline: none;
		outline-color: transparent;
	}

	#sfbap-form2-button{
		border-radius: 2px;
		width: 90%;
		display: inline-block;
		float: none;
		border: none;
		margin-top: 10px;
		background-color: <?php echo $button_background_color; ?>;
		color: <?php echo $button_text_color; ?>;
		font-size: <?php echo $button_text_size;?>px;
		transition-duration: 0.4s;
		height: 40px;
		font-weight: bold;
		cursor: pointer;
		outline: none;
		outline-color: transparent;
	}
	#sfbap-form2-button:hover {
	}
	#sfbap-form2-heading{
		margin: 0;
		line-height: 1.5;
		font-weight: bold;
		color:<?php echo $form_heading_color; ?>;
	}
	.sfbap-form-name{
		border: 1px solid <?php echo $name_border_color; ?> !important;
	}
	.sfbap-form-email{
		border: 1px solid <?php echo $email_border_color; ?> !important;
	}
	
</style>
<form id="sfbap_subscribe_form" action="" method="POST">
	<div id="sfbap-form2-container" class="sfbap-main-form-container">
		<h3 id="sfbap-form2-heading"><?php echo $form_heading;?></h3>
		<input id="sfbap-form2-name" name="sfbap-form-name" class="sfbap-form2-fields sfbap-form-name" type="text" value="" placeholder="YOUR NAME">
		<input id="sfbap-form2-email" name="sfbap-form-email" class="sfbap-form2-fields sfbap-form-email" type="email" value="" placeholder="YOUR EMAIL">
		<input type="submit" id="sfbap-form2-button" class="sfbap-form-submit-button" value="<?php echo $button_text;?>" />

	</div>
	
</form>

