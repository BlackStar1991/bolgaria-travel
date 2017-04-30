<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $sfbap_db_version;
$sfbap_db_version = '1.0';

function sfbap_create_table_function() {
	global $wpdb;
	global $sfbap_db_version;
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	$charset_collate = $wpdb->get_charset_collate();

	$subscription_lists_table = $wpdb->prefix . 'sfbap_subscription_lists';
   if($wpdb->get_var("show tables like '$subscription_lists_table'") != $subscription_lists_table) {

	$subscription_lists_table_sql = "CREATE TABLE $subscription_lists_table (
		sfbap_id mediumint(9) NOT NULL AUTO_INCREMENT,
		sfbap_service_name varchar(255) NOT NULL,
		sfbap_service_list_id text NOT NULL,
		sfbap_service_list_name text NOT NULL,
		PRIMARY KEY  (sfbap_id)
	) $charset_collate;";
	dbDelta( $subscription_lists_table_sql );

}

	$subscribers_table = $wpdb->prefix . "sfbap_subscribers_lists";
   if($wpdb->get_var("show tables like '$subscribers_table'") != $subscribers_table) {

      $sfbap_subscribers_table_sql = "CREATE TABLE " . $subscribers_table . " (
     id mediumint(9) NOT NULL AUTO_INCREMENT,
     name tinytext NOT NULL,
     email text NOT NULL,
     UNIQUE KEY id (id)
   ); $charset_collate;";
	dbDelta( $sfbap_subscribers_table_sql );

}

	add_option( 'sfbap_db_version', $sfbap_db_version );
}
