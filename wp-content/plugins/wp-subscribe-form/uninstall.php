<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}
// deleting registered settings
delete_option('sfbap_mc_api_key');
delete_option('sfbap_gr_api_key');
delete_option('sfbap_ac_url');
delete_option('sfbap_ac_api_key');

global $wpdb;
// deleting plugin data
$wpdb->query("DELETE FROM {$wpdb->prefix}posts WHERE post_type='sfbap_subscribe_form'");
$wpdb->query("DELETE FROM {$wpdb->prefix}postmeta WHERE meta_key LIKE '%_sfbap%';");
 
// drop a custom database table
$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}sfbap_subscribers_lists");
$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}sfbap_subscription_lists");