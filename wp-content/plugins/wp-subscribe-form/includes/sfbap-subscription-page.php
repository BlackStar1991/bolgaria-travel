<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
if( isset($_GET["settings-updated"]) ) { ?>
<div id="message" class="updated">
	<p><strong><?php _e("Settings saved.") ?></strong></p>
</div>
<?php } ?>

<style>
	#sfbap-int-container{
		width: 30%;
		background: #ffffff;
		padding: 0px;
		border: 2px solid #dcdcdc;
		display: inline-block;
		margin: 10px;
		vertical-align: top;
		min-height: 350px;
	}
	#sfbap-mc-header{
		margin: 0;
		padding: 10px;
		text-align: center;
		background: #fceacc;
		color: white;
		font-size: 16px;
		font-family: 'Arial';
		font-weight: bold;
		letter-spacing: 2px;
		background-image: url('<?php echo plugins_url('../images/mc-logo.png',__FILE__);?>');
		background-position: center;
		background-repeat: no-repeat;
		height: 44px;
		background-size: 43%;
	}
	#sfbap-gr-header{
		margin: 0;
		padding: 10px;
		text-align: center;
		background: #262626;
		color: white;
		font-size: 16px;
		font-family: 'Arial';
		font-weight: bold;
		letter-spacing: 2px;
		background-image: url('<?php echo plugins_url('../images/gr-logo.svg',__FILE__);?>');
		background-position: center;
		background-repeat: no-repeat;
		height: 44px;
		background-size: 49%;
	}
	#sfbap-ac-header{
		margin: 0;
		padding: 10px;
		text-align: center;
		background: #4073b5;
		color: white;
		font-size: 16px;
		font-family: 'Arial';
		font-weight: bold;
		letter-spacing: 2px;
		background-image: url('<?php echo plugins_url('../images/ac-logo.png',__FILE__);?>');
		background-position: center;
		background-repeat: no-repeat;
		height: 44px;
	}
	#sfbap-cc-header{
		margin: 0;
		padding: 10px;
		text-align: center;
		background: #c8921d;
		color: white;
		font-size: 16px;
		font-family: 'Arial';
		font-weight: bold;
		letter-spacing: 2px;
		background-image: url('<?php echo plugins_url('../images/cc-logo.jpg',__FILE__);?>');
		background-position: center;
		background-repeat: no-repeat;
		height: 44px;
		    background-size: 50%;
	}
	#sfbap-aw-header{
		margin: 0;
		padding: 10px;
		text-align: center;
		background: #d6d6d6;
		color: white;
		font-size: 16px;
		font-family: 'Arial';
		font-weight: bold;
		letter-spacing: 2px;
		background-image: url('<?php echo plugins_url('../images/aw-logo.png',__FILE__);?>');
		background-position: center;
		background-repeat: no-repeat;
		height: 44px;
		    background-size: 50%;
	}
		#sfbap-mm-header{
		margin: 0;
		padding: 10px;
		text-align: center;
		background: #aed8f2;
		color: white;
		font-size: 16px;
		font-family: 'Arial';
		font-weight: bold;
		letter-spacing: 2px;
		background-image: url('<?php echo plugins_url('../images/mm-logo.png',__FILE__);?>');
		background-size: contain;
		background-position: center;
		background-repeat: no-repeat;
		height: 44px;
	}
	#sfbap_form_load_form{
		position: absolute;
		width: 98%;
	}
	#sfbap-int-container-content{
		padding: 10px;
	}
	#sfbap-int-container-content label{
		color: black;
		font-size: 13px;
		font-weight: bold;
	}
	#sfbap-int-container-content input{
		color: black;
		font-size: 13px;
		font-weight: bold;
		border: 2px solid black;
		margin-top: 10px;
		width: 100%;
		height: 40px;
	}
</style>
<div class="wrap">
	<form method="post" action="options.php">
		<?php 	
		settings_fields( 'sfbap_integration_options_group' );
		do_settings_sections( 'sfbap_integration_options_group' );
		?>
		<h1 style="text-align: center; font-weight: bold;">Subscription Settings Page</h1>
		<h1 style="text-align: center; font-weight: bold;"><a href="https://www.arrowplugins.com/wordpress-subscribe-form" target="_blank">Buy Premium Version</a> To Unlock all the amazing Subscription Services Integration</h1>
		<h2></h2>
		<div id="sfbap-int-container">
			<p id="sfbap-mc-header"></p>
			<div id="sfbap-int-container-content">
				<label for="sfbap-mc-api-key">Enter Your MailChimp API Key:</label>
				<br/>
				<input disabled type="text" id="sfbap-mc-api-key" name="sfbap_mc_api_key" class="" placeholder="MailChimp API Key" />
				<p>Your <strong>List ID's</strong> will auto generate when you will create new Subscribe form to send users info to specific MailChimp's List ID.</p>
				<a href="http://kb.mailchimp.com/integrations/api-integrations/about-api-keys" target="_blank">Help: How to find your MailChimp API Key</a>
			</div>
		</div>
		<div id="sfbap-int-container">
			<p id="sfbap-gr-header"></p>
			<div id="sfbap-int-container-content">
				<label for="sfbap-gr-api-key">Enter Your GetResponse API Key:</label>
				<br/>
				<input disabled type="text" id="sfbap-gr-api-key" name="sfbap_gr_api_key" class="" placeholder="GetResponse API Key" />
				<p>Your <strong>Campaign Names</strong> will auto generate when you will create new Subscribe form to send users info to specific GetResponse Campaign.</p>
				<a href="https://support.getresponse.com/faq/where-i-find-api-key" target="_blank">Help: How to find your GetResponse API Key</a>
			</div>
		</div>
		<div id="sfbap-int-container">
			<p id="sfbap-ac-header"></p>
			<div id="sfbap-int-container-content">
				<label for="sfbap-ac-url">Enter Your Active Campaign URL:</label>
				<br/>
				<input disabled type="text" id="sfbap-ac-url" class="" name="sfbap_ac_url"  placeholder="https://<account-name>.api-us1.com" />
				<br/><br/>
				<label for="sfbap-ac-api-key">Enter Your Active Campaign API Key:</label>
				<br/>
				<input disabled type="text" id="sfbap-ac-api-key" name="sfbap_ac_api_key" class=""  placeholder="Active Campaign API Key" />
				<p>Your <strong>List ID's</strong> will auto generate when you will create new Subscribe form to send users info to specific Active Campaign's List ID.</p>
				<a href="http://www.activecampaign.com/help/using-the-api/" target="_blank">Help: How to find your Active Campaig URL & API KEY</a>
			</div>
		</div>
		<div id="sfbap-int-container" style="min-height: 105px;">
			<p id="sfbap-cc-header"></p>
			<div id="sfbap-int-container-content" style="text-align: center;
    color: red;
    font-weight: bold;
    font-size: 1.7em;">Coming Soon in next few updates</div>
			<!-- <div id="sfbap-int-container-content">
				<label for="sfbap-mm-username">Enter Your MadMimi Username ( OR Email Address ):</label>
				<br/>
				<input disabled type="text" id="sfbap-mm-username" class="" name="sfbap_mm_username" value="<?php echo esc_attr( get_option('sfbap_mm_username') ); ?>" placeholder="example@domain.com" />
				<br/><br/>
				<label for="sfbap-mm-api-key">Enter Your MadMimi API Key:</label>
				<br/>
				<input disabled type="text" id="sfbap-mm-api-key" name="sfbap_mm_api_key" class="" value="<?php echo esc_attr( get_option('sfbap_mm_api_key') ); ?>" placeholder="MadMimi API Key" />
				<p>Your MadMimi <strong>Lists</strong> will auto generate when you will create new Subscribe form to send users info to specific MadMimi List.</p>
				<a href="https://help.madmimi.com/where-can-i-find-my-api-key/" target="_blank">Help: How to find your MadMimi API KEY</a>
			</div> -->
		</div>
			<div id="sfbap-int-container" style="min-height: 105px;">
			<p id="sfbap-mm-header"></p>
			<div id="sfbap-int-container-content" style="text-align: center;
    color: red;
    font-weight: bold;
    font-size: 1.7em;">Coming Soon in next few updates</div>
			<!-- <div id="sfbap-int-container-content">
				<label for="sfbap-mm-username">Enter Your MadMimi Username ( OR Email Address ):</label>
				<br/>
				<input disabled type="text" id="sfbap-mm-username" class="" name="sfbap_mm_username" value="<?php echo esc_attr( get_option('sfbap_mm_username') ); ?>" placeholder="example@domain.com" />
				<br/><br/>
				<label for="sfbap-mm-api-key">Enter Your MadMimi API Key:</label>
				<br/>
				<input disabled type="text" id="sfbap-mm-api-key" name="sfbap_mm_api_key" class="" value="<?php echo esc_attr( get_option('sfbap_mm_api_key') ); ?>" placeholder="MadMimi API Key" />
				<p>Your MadMimi <strong>Lists</strong> will auto generate when you will create new Subscribe form to send users info to specific MadMimi List.</p>
				<a href="https://help.madmimi.com/where-can-i-find-my-api-key/" target="_blank">Help: How to find your MadMimi API KEY</a>
			</div> -->
		</div>
					<div id="sfbap-int-container" style="min-height: 105px;">
			<p id="sfbap-aw-header"></p>
			<div id="sfbap-int-container-content" style="text-align: center;
    color: red;
    font-weight: bold;
    font-size: 1.7em;">Coming Soon in next few updates</div>
			<!-- <div id="sfbap-int-container-content">
				<label for="sfbap-mm-username">Enter Your MadMimi Username ( OR Email Address ):</label>
				<br/>
				<input disabled type="text" id="sfbap-mm-username" class="" name="sfbap_mm_username" value="<?php echo esc_attr( get_option('sfbap_mm_username') ); ?>" placeholder="example@domain.com" />
				<br/><br/>
				<label for="sfbap-mm-api-key">Enter Your MadMimi API Key:</label>
				<br/>
				<input disabled type="text" id="sfbap-mm-api-key" name="sfbap_mm_api_key" class="" value="<?php echo esc_attr( get_option('sfbap_mm_api_key') ); ?>" placeholder="MadMimi API Key" />
				<p>Your MadMimi <strong>Lists</strong> will auto generate when you will create new Subscribe form to send users info to specific MadMimi List.</p>
				<a href="https://help.madmimi.com/where-can-i-find-my-api-key/" target="_blank">Help: How to find your MadMimi API KEY</a>
			</div> -->
		</div>

		<?php 
		


submit_button(); ?>
</form>

</div>

