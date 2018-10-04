<?php

/**
 * Plugin Name: Vorosa Helper Plugin
 * Plugin URI: https://devitems.com/
 * Description: After install the vorosa WordPress Theme, you must need to install this "Vorosa Helper Plugin" first to get all functions of vorosa Theme.
 * Version: 1.0.0
 * Author: Grand-Themes
 * Author URI: http://wphash.com/
 * Text Domain: vorosa
 * License: GPL/GNU.
 /*Copyright 2017 vorosa(email:support@bootexperts.com)
*/


//define
define( 'SPLG_URL', plugins_url() );
define( 'SPLG_DIR', dirname( __FILE__ ) ); 

/**----------------------------------------------------------------*/
/* Include all file
/*-----------------------------------------------------------------*/  

include_once(SPLG_DIR. '/include/vorosa-custom-post.php');
include_once(SPLG_DIR. '/include/social-share.php');
include_once(SPLG_DIR. '/include/vorosa-custom-texanomy.php');
include_once(SPLG_DIR. '/shortcode-act.php');

/**
* display Cause shortcode
*/
function causes_form_shortcode_core ($causes_form_shortcode){
	echo do_shortcode( $causes_form_shortcode );
}