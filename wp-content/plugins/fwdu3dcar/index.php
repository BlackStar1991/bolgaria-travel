<?php
/*
Plugin Name: FWD Ultimate 3D Carousel
Plugin URI: http://codecanyon.net/user/FWDesign/portfolio
Description: This is the Wordpress plugin with a CMS menu for the installation and configuration of the FWD Ultimate 3D Carousel.
Author: FWD
Version: 3.1
Author URI: http://webdesign-flash.ro/
*/

require "update-checker/plugin-update-checker.php";
$fwdu3dcarPUC = PucFactory::buildUpdateChecker(
	"http://webdesign-flash.ro/w/u3dcar/update/info.json",
	__FILE__,
	"fwdu3dcar"
);

include_once "php/FWDU3DCar.php";
include_once "php/FWDU3DCarData.php";

function fwdu3dcar_check_if_admin()
{
	$roles = wp_get_current_user()->roles;
	$role = "administrator";
	 
	return in_array($role, $roles);
}

function fwdu3dcar_admin_init()
{
	if (fwdu3dcar_check_if_admin())
	{
		$role = get_role("administrator");
		$role->add_cap(FWDU3DCar::CAPABILITY);
	}
}

function fwdu3dcar_init_plugin()
{	
	$car = new FWDU3DCar();
}

add_action("init", "fwdu3dcar_init_plugin");
add_action("admin_init", "fwdu3dcar_admin_init");
add_filter("plugin_action_links_" . plugin_basename(__FILE__), array("FWDU3DCar", "set_action_links"));

?>