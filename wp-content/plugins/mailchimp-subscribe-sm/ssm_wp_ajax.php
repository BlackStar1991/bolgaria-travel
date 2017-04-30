<?php

add_action( 'wp_ajax_nopriv_ssm_subscribe_form_db', 'ssm_subscribe_form_db_wp_ajax'  );
add_action( 'wp_ajax_ssm_subscribe_form_db', 'ssm_subscribe_form_db_wp_ajax' );

add_action( 'wp_ajax_nopriv_ssm_subscribe_form_mailchimp', 'ssm_subscribe_form_mailchimp_wp_ajax'  );
add_action( 'wp_ajax_ssm_subscribe_form_mailchimp', 'ssm_subscribe_form_mailchimp_wp_ajax' );

add_action( 'wp_ajax_nopriv_ssm_subscribe_form_getresponse', 'ssm_subscribe_form_getresponse_wp_ajax'  );
add_action( 'wp_ajax_ssm_subscribe_form_getresponse', 'ssm_subscribe_form_getresponse_wp_ajax' );


function ssm_subscribe_form_db_wp_ajax(){

function check_input($data){

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function ssm_send_email(){

    add_filter( 'wp_mail_content_type', 'ssm_set_html_content_type' );
    function ssm_set_html_content_type() {
        return 'text/html';
    }

		$headers = 'From: '.get_option('ssm_email_newsletter_from_name').' <'.get_option('ssm_email_newsletter_from_email').'>' . "\r\n";
	    $to = filter_var($_REQUEST['sm_email'],FILTER_SANITIZE_EMAIL);
	    $subject = get_option('ssm_email_newsletter_subject');
	    $message = get_option('ssm_email_newsletter');
	    wp_mail( $to, $subject, $message, $headers );

        remove_filter( 'wp_mail_content_type', 'ssm_set_html_content_type' );

}

function ssm_send_to_db() {
	global $wpdb;

	$s_name = filter_var($_REQUEST['sm_name'],FILTER_SANITIZE_STRING);
	$s_email = filter_var($_REQUEST['sm_email'],FILTER_SANITIZE_EMAIL);

	

	 if (!filter_var($s_email, FILTER_VALIDATE_EMAIL)) {
      echo  "Invalid email format"; 
      exit;
    }
	
	$ssm_Name = wp_strip_all_tags($s_name);
	$ssm_Email = wp_strip_all_tags($s_email);

	
	$table_name = $wpdb->prefix . 'ssm_data';

$check_existing = $wpdb->get_results(
	"SELECT * FROM `$table_name` WHERE `email` = '$ssm_Email'" 
	);

if (empty($check_existing)) {
	$resultss = $wpdb->insert( 
		$table_name, 
		array( 
			'name' => $ssm_Name, 
			'email' => $ssm_Email, 
		) 
	);
return $resultss;
}else{
	echo 'Subscriber Already Exists';
	exit;
}

}



$data = check_input($_REQUEST['sm_name']);
$data .= check_input($_REQUEST['sm_email']);
$data_lower = strtolower($data);
$data_spaces = str_replace(' ','',$data_lower);

$pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/";
if (!preg_match($pattern,$data_spaces))
{
    echo ("Invalid Input");
    exit;
}
else{

	$checkss = ssm_send_to_db();
	
	$sub_url = check_input($_REQUEST['ssm_sub_url']);
	if($checkss && !empty($sub_url)){
		$ssm_enable_newsletter = get_option('ssm_enable_email_newsletter');
		if ($ssm_enable_newsletter === 'true') {
			ssm_send_email();   		
		}
		echo "run_url";
		exit;
	}
	elseif ($checkss > 0){
		$ssm_enable_newsletter = get_option('ssm_enable_email_newsletter');
		if ($ssm_enable_newsletter === 'true') {
			ssm_send_email();   		
		}
		echo "success";
		exit;
	}
	else{
		echo $checkss;
	}

}

}






function ssm_subscribe_form_mailchimp_wp_ajax(){
	require_once('/inc/MCAPI.class.php');
	// grab an API Key from http://admin.mailchimp.com/account/api/
	$sm_api_key = get_option('ssm_mailchimp_api_key');
	$api = new MCAPI($sm_api_key);

function check_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function ssm_send_email(){

	add_filter( 'wp_mail_content_type', 'ssm_set_html_content_type' );
    function ssm_set_html_content_type() {
        return 'text/html';
}


	 //$attachments =  array( WP_CONTENT_DIR . '/uploads/2015/07/04_The-Make-Up.mp3' );
		$headers = 'From: '.get_option('ssm_email_newsletter_from_name').' <'.get_option('ssm_email_newsletter_from_email').'>' . "\r\n";
	    $to = check_input($_REQUEST['sm_email']);
	    $subject = get_option('ssm_email_newsletter_subject');
	    $message = get_option('ssm_email_newsletter');
	    wp_mail( $to, $subject, $message, $headers );

        remove_filter( 'wp_mail_content_type', 'ssm_set_html_content_type' );

}

$smf_fName = check_input($_REQUEST['sm_name']);
$smf_email = check_input($_REQUEST['sm_email']);

	$merge_vars = Array( 
        'EMAIL' => $smf_email,
        'FNAME' => $smf_fName
    );
	
$data = check_input($_REQUEST['sm_name']);
$data .= check_input($_REQUEST['sm_email']);
$data_lower = strtolower($data);
$data_spaces = str_replace(' ','',$data_lower);

$pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/";
if (!preg_match($pattern,$data_spaces))
{
    echo ("Invalid Input");
    exit; 
}
else{
	$ssm_enable_newsletter = get_option('ssm_enable_email_newsletter');
	$sm_mailchimp_doubleoptin = get_option('sm_mailchimp_doubleoptin');
	$list_id = get_option('ssm_mailchimp_list_id');
	$sub_url = check_input($_REQUEST['ssm_sub_url']);
	$retval = $api->listSubscribe($list_id, $smf_email,$merge_vars, '',$sm_mailchimp_doubleoptin);
	if ($retval === true && !empty($sub_url)) {
		if ($ssm_enable_newsletter === 'true') {
			ssm_send_email();   		
		}
		echo 'run_url';
		exit;
	}

	else if ($retval === true) {
			if ($ssm_enable_newsletter === 'true') {
			ssm_send_email();   		
		}
		$s_message = get_option('ssm_post_sub_message');
	
		if (!empty($s_message)) {
			echo "success";
			exit;
		} else{
			echo "success";
			exit;
		}
	}

	if($api->errorCode) {
		if ($api->errorCode === 214) {
		   echo "Subscriber Already Exists";
		   exit;
		} elseif ($api->errorCode === 104) {
			echo "Invalid API Key Or List Name";
			exit;
		} else {
			echo "Unknown Error Occurred";
			var_dump($api->errorCode);
			exit;
		}
	}
}
}



function ssm_subscribe_form_getresponse_wp_ajax(){
		function check_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function send_data_to_gr_api(){
require_once '/inc/jsonRPCClient.php';

$api_key = get_option('ssm_getresponse_api_key');

$api_url = 'http://api2.getresponse.com';

$client = new jsonRPCClient($api_url);

$campaign_name_wp = get_option('ssm_getresponse_campaign_id');
$user_given_campaign_name = array ( 'EQUALS' => $campaign_name_wp);
$campaigns = $client->get_campaigns(
    $api_key,
    array (
        # find by name literally
        'name' => $user_given_campaign_name
    )
);

$campaign_keys = array_keys($campaigns);
$CAMPAIGN_ID = array_pop($campaign_keys);

try {

	$result = $client->add_contact(
    $api_key,
    array (
        'campaign'  => $CAMPAIGN_ID,

        'name'      => $_REQUEST['sm_name']." ",
        'email'     => $_REQUEST['sm_email'],

    )

);
	
	echo "success";
	exit;
} catch (Exception $e) {
	$gr_contact_exists = "Contact already added to target campaign";
	$gr_contact_queue = "Contact already queued for target campaign";
	$gr_invalid_params = "Request have return error: Invalid params";
	$gr__invalid_param_result = strstr($e, $gr_invalid_params, $before_needle = true);
	$gr__c_exists_result = strstr($e, $gr_contact_exists, $before_needle = true);
	$gr_contact_queue_results = strstr($e, $gr_contact_queue, $before_needle = true);
	if($gr__invalid_param_result !== false){
		echo "Invalid API Key Or List Name";
		exit;
	} else if ($gr__c_exists_result !== false) {
		echo "Subscriber Already Exists";
		exit;
	} else if ($gr_contact_queue_results !== false) {
		echo "Subscriber Already Exists";
		exit;
	} else{
		echo "Unknown error occurred!";
		exit;
	}

	
}



}

function ssm_send_email(){


    add_filter( 'wp_mail_content_type', 'ssm_set_html_content_type' );
    function ssm_set_html_content_type() {
        return 'text/html';
    }


	 //$attachments =  array( WP_CONTENT_DIR . '/uploads/2015/07/04_The-Make-Up.mp3' );
	$headers = 'From: '.get_option('ssm_email_newsletter_from_name').' <'.get_option('ssm_email_newsletter_from_email').'>' . "\r\n";
	$to = check_input($_REQUEST['sm_email']);
	$subject = get_option('ssm_email_newsletter_subject');
	$message = get_option('ssm_email_newsletter');
	wp_mail( $to, $subject, $message, $headers );

    remove_filter( 'wp_mail_content_type', 'ssm_set_html_content_type' );

}


	
	$data = check_input($_REQUEST['sm_name']);
	$data .= check_input($_REQUEST['sm_email']);
	$data_lower = strtolower($data);
	$data_spaces = str_replace(' ','',$data_lower);

	$pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/";
	if (!preg_match($pattern,$data_spaces))
	{
	    echo ("Invalid Input");
	    exit;
	}
	else{


		$sub_url = check_input($_REQUEST['ssm_sub_url']);
		$result_send_data = send_data_to_gr_api();
		if($result_send_data === true && !empty($sub_url)) {
			$ssm_enable_newsletter = get_option('ssm_enable_email_newsletter');
			if ($ssm_enable_newsletter === 'true') {
				ssm_send_email();   		
			}
			echo 'run_url';
			exit;
			 
		} else if ($result_send_data === true) {
			$ssm_enable_newsletter = get_option('ssm_enable_email_newsletter');
			if ($ssm_enable_newsletter === 'true') {
				ssm_send_email();   		
			}
			echo "success";
			exit;
		} else{
			// An error ocurred, return error message	
			return 'Error: ';
		}

	}

}
?>