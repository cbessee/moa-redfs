<?php
/*
Plugin Name: Company Directory Pro
Plugin Script: company-directory-pro.php
Plugin URI: http://goldplugins.com/our-plugins/company-directory-pro/
Description: Pro Add-on for Company Directory. Requires the Company Directory plugin.
Version: 9999
Author: Gold Plugins
Author URI: http://goldplugins.com/
*/

add_action( 'company_directory_bootstrap', 'company_directory_pro_init' );

function company_directory_pro_init()
{
	require_once('include/Company_Directory_Pro_Plugin.php');
	//require_once('include/lib/BikeShed/bikeshed.php');
		
	$company_directory_pro = new Company_Directory_Pro_Plugin( __FILE__ );

	// create an instance of BikeShed that we can use later
	global $Company_Directory_BikeShed;
	if ( is_admin() && empty($Company_Directory_BikeShed) ) {
		//$Company_Directory_BikeShed = new Company_Directory_GoldPlugins_BikeShed();
	}
}

function company_directory_pro_activation_hook()
{
	set_transient('company_directory_pro_just_activated', 1);
}
add_action( 'activate_company-directory-pro/company-directory-pro.php', 'company_directory_pro_activation_hook' );
