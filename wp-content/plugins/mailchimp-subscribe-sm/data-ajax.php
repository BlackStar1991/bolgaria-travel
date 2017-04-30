<?php
$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
include($path.'wp-load.php');

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
	
$resultss = $wpdb->insert( 
		$table_name, 
		array( 
			'name' => $ssm_Name, 
			'email' => $ssm_Email, 
		) 
	);
return $resultss;
}



$data = check_input($_REQUEST['sm_name']);
$data .= check_input($_REQUEST['sm_email']);
$data_lower = strtolower($data);
$data_lower = strtolower($data);
$data_spaces = str_replace(' ','',$data_lower);

$pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/";
if (!preg_match($pattern,$data_spaces))
{
    echo ("Invalid Input");
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
	}
	elseif ($checkss > 0){
		$ssm_enable_newsletter = get_option('ssm_enable_email_newsletter');
		if ($ssm_enable_newsletter === 'true') {
			ssm_send_email();   		
		}
		echo 'success';
	}
	else{
		echo $checkss;
	}

	// remove_filter( 'wp_mail_content_type', 'ssm_set_html_content_type' );

	 

}


 ?>
