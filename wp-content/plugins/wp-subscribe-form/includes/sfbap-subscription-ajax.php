<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
add_action( 'admin_footer', 'sfbap_my_action_javascript' ); // Write our JS below here

function sfbap_my_action_javascript() { ?>
<script type="text/javascript" >
	jQuery(document).ready(function($) {
		$("#sfbap_subscription_selection_dd").change(function() {
			if($('select#sfbap_subscription_selection_dd option:selected').val() == 'database'){
				$('#sfbap_mail_selection').hide(); 
				$('#sfbap_mailchimp_selection').hide(); 
				$('#sfbap_getresponse_selection').hide(); 
				$('#sfbap_activecampaign_selection').hide(); 
			}
			if($('select#sfbap_subscription_selection_dd option:selected').val() == 'mail'){
				$('#sfbap_mail_selection').show(); 
				$('#sfbap_mailchimp_selection').hide(); 
				$('#sfbap_getresponse_selection').hide(); 
				$('#sfbap_activecampaign_selection').hide(); 
			}
			if($('select#sfbap_subscription_selection_dd option:selected').val() == 'mailchimp'){
				
				$('#sfbap_mail_selection').hide(); 
				$('#sfbap_mailchimp_selection').show(); 
				$('#sfbap_getresponse_selection').hide(); 
				$('#sfbap_activecampaign_selection').hide(); 
			}
			if($('select#sfbap_subscription_selection_dd option:selected').val() == 'getresponse'){
				$('#sfbap_mail_selection').hide(); 
				$('#sfbap_mailchimp_selection').hide(); 
				$('#sfbap_getresponse_selection').show(); 
				$('#sfbap_activecampaign_selection').hide(); 
				
			}
			if($('select#sfbap_subscription_selection_dd option:selected').val() == 'activecampaign'){
				$('#sfbap_mail_selection').hide(); 
				$('#sfbap_mailchimp_selection').hide(); 
				$('#sfbap_getresponse_selection').hide(); 
				$('#sfbap_activecampaign_selection').show(); 
			}
		});
	});
</script> <?php
}

