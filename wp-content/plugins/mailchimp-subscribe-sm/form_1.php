<style type="text/css">

	#sm_wrapper{
		width:100%;
		max-width: 650px;
		min-width: 230px;
		border-radius: 5px;
		padding: 5px;
		margin: 0 auto;
	}
	#sm_top{
		background: #ECEEAD;
		margin-bottom: -20px;
	}
	#sm_top li{
		list-style:none;
		margin-left: 5%;
		font-family: helvetica,sans-serif;
		font-size: 25px;
		font-weight: bold;
		padding:15px 0 10px 0;
	}
	#sm_content{
		background: #fff;
		border-bottom: 1px solid #d0d0d0;
	
	}
	#sm_content > p{
		font-size: 16px;
		font-family: helvetica,sans-serif;
		padding: 15px 5px 10px 5%;
		line-height: 1.8;

	}

	#sm_form > input[type="submit"], 
	#sm_form > input[type="button"]{

		margin: 0 ;
		border: none !important;
		color: #fff !important;
		font-size: 18px !important;
		margin-left: 1% !important;
		font-family: helvetica,sans-serif;

		background-color: rgb(122,188,255) !important;
		background: rgb(122,188,255) !important; /* Old browsers */
		background: -moz-linear-gradient(top,  rgba(122,188,255,1) 0%, rgba(96,171,248,1) 44%, rgba(64,150,238,1) 100%); /* FF3.6+ */
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(122,188,255,1)), color-stop(44%,rgba(96,171,248,1)), color-stop(100%,rgba(64,150,238,1))); /* Chrome,Safari4+ */
		background: -webkit-linear-gradient(top,  rgba(122,188,255,1) 0%,rgba(96,171,248,1) 44%,rgba(64,150,238,1) 100%); /* Chrome10+,Safari5.1+ */
		background: -o-linear-gradient(top,  rgba(122,188,255,1) 0%,rgba(96,171,248,1) 44%,rgba(64,150,238,1) 100%); /* Opera 11.10+ */
		background: -ms-linear-gradient(top,  rgba(122,188,255,1) 0%,rgba(96,171,248,1) 44%,rgba(64,150,238,1) 100%); /* IE10+ */
		background: linear-gradient(to bottom,  rgba(122,188,255,1) 0%,rgba(96,171,248,1) 44%,rgba(64,150,238,1) 100%); /* W3C */
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#7abcff', endColorstr='#4096ee',GradientType=0 ); /* IE6-9 */

	} 
	#sm_form > input[type="text"], #sm_form > input[type="email"]{
		margin: 0;
		padding: 0;
		width: 50%;
		height: 35px;
		margin-left: 5%;
		margin-bottom: 5%;
		font-size: 16px;
		font-family: helvetica,sans-serif;
	}
	
	.sm_field{
		margin: 0;
		padding: 0;
		width: 50%;
		height: 35px;
		margin-left: 5%;
		margin-bottom: 5%;
		font-size: 16px;
	}
	.sm_submit:hover{
		background-color: #4b8bcc !important;
		background: #4b8bcc !important;
	}
	.sm_submit,#sm_submit{
		margin: 0 ;
		padding:1.2% 4% 1.5% 4% !important;
		border: none !important;
		color: #fff !important;
		font-size: 18px !important;
		margin-left: -3% !important;

		background-color: rgb(122,188,255) !important;
		background: rgb(122,188,255) !important; /* Old browsers */
		background: -moz-linear-gradient(top,  rgba(122,188,255,1) 0%, rgba(96,171,248,1) 44%, rgba(64,150,238,1) 100%); /* FF3.6+ */
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(122,188,255,1)), color-stop(44%,rgba(96,171,248,1)), color-stop(100%,rgba(64,150,238,1))); /* Chrome,Safari4+ */
		background: -webkit-linear-gradient(top,  rgba(122,188,255,1) 0%,rgba(96,171,248,1) 44%,rgba(64,150,238,1) 100%); /* Chrome10+,Safari5.1+ */
		background: -o-linear-gradient(top,  rgba(122,188,255,1) 0%,rgba(96,171,248,1) 44%,rgba(64,150,238,1) 100%); /* Opera 11.10+ */
		background: -ms-linear-gradient(top,  rgba(122,188,255,1) 0%,rgba(96,171,248,1) 44%,rgba(64,150,238,1) 100%); /* IE10+ */
		background: linear-gradient(to bottom,  rgba(122,188,255,1) 0%,rgba(96,171,248,1) 44%,rgba(64,150,238,1) 100%); /* W3C */
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#7abcff', endColorstr='#4096ee',GradientType=0 ); /* IE6-9 */

	}
	#sm_footer{
		font-size: 16px;
		line-height: 1.8;
		background: #e3e3e3;
		padding: 9px 0 1px 15px;
		font-family: helvetica,sans-serif;

	}
	#sm_footer p {
		margin: 0 0 7px 0;
	}
	#response{
		display: none;
		font-family: helvetica,sans-serif;
		font-style: italic;
		color: #E86850;
	}

<?php
$sm_modal = get_post_meta($post->ID,'sm_popup_active',true);
$smf_popup_close_color = get_post_meta($post->ID,'smf_popup_close_color',true);
$smf_popup_overlay_color = get_post_meta($post->ID,'smf_popup_overlay_color',true);
if ($sm_modal === 'true') {
	echo "

	@import url(https://fonts.googleapis.com/css?family=Great+Vibes);

		.sm_modal{
		width: 100%;
		height: 100%;
		position: fixed;
		top: 0;
		bottom: 0;
		left: 0;
		right: 0;
		background: $smf_popup_overlay_color;
		margin: 0 auto;
		z-index: 99999;
		display: none;
	}
	.sm_close{
		margin-top: 3%;
		color: $smf_popup_close_color;
		font-size: 1.2vw;
		font-family: 'Great Vibes', cursive;
		float: left;
		display: block;
		cursor: pointer;
		border-bottom: 1px solid $smf_popup_close_color;
	}
	#sm_wrapper{
		position: absolute;
  		top: 50%;
 	 	left: 50%;
  		transform: translate(-50%, -50%);
	}
	#sm_top{
		margin-bottom:-21px; 
	}";
}

 ?>


</style>
<?php
$smf_popup_delay = get_post_meta( $post->ID,'smf_popup_delay',true);

    if (empty($smf_popup_delay)) {
        $smf_popup_delay = '1';
    }

if ($sm_modal === 'true') {
	echo '
	<link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet" type="text/css">
	<div class="sm_modal">';
} ?>
<div id='sm_wrapper' class='smwrapper' data-delay="<?php echo $smf_popup_delay.'000';?>" >
	<div id='sm_top'>
	 <li><?php echo get_post_meta($post->ID,'sm_form_header',true); ?></li>		
	</div>
	<div id='sm_content'>
		<p><?php echo get_post_meta($post->ID,'sm_form_content',true); ?></p>

		<?php echo get_post_meta($post->ID,'ssm_select_data_save_method',true); ?>

			 <input type='hidden' name='ssm_sub_url' class="ssm_sub_url" value='' >
			 <input type='text' id='sm_input' class='sm_field' name='sm_name' placeholder="<?php echo get_post_meta($post->ID,'sm_form_name_placeholder',true); ?>" >
			 <input type='email' id='sm_input' class='sm_field' name='sm_email' placeholder="<?php echo get_post_meta($post->ID,'sm_form_email_placeholder',true); ?>" required >
			 <input type="submit"  name="submit" value="<?php echo get_post_meta($post->ID,'sm_form_cta_text',true); ?>" class="sm_submit" id='sm_submit' />

		</form>      
	</div>
	<div id='sm_footer'>
		<span id="response">
		<?php

			$ssm_post_sub_messages = get_option('ssm_post_sub_message' );
			if (!empty($ssm_post_sub_messages)) {
				echo $ssm_post_sub_messages;
			}else {
				echo "Thank you for subscribing.";
			}
		   ?>
    	</span>		<p><?php echo get_post_meta($post->ID,'sm_form_footer_msg',true); ?></p>
	</div>
	<?php
if ($sm_modal === 'true') {
	$smf_popup_close_text = get_post_meta($post->ID,'smf_popup_close_text',true);
	if (!empty($smf_popup_close_text)) {
		echo "<div class='sm_close'>$smf_popup_close_text</div>";
	}else{
		echo "<div class='sm_close'>No, Thanks Let me see the website.</div>";
	}
	
}	?>

</div>
</div>
<?php
if ($sm_modal === 'true') {
	echo '</div>';
}	?>
