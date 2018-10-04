<?php
/**
 * Aedificator Theme Customizer
 *
 * @package Aedificator
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function aedificator_customize_register( $wp_customize ) {

	// Update Your Settings

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';


    // Add General Sections

    $wp_customize->add_section('general',             array('title' => __('General', 'aedificator'),          'description' => '',                                         'priority' => 130,));
    $wp_customize->add_section('blogpage',            array('title' => __('Blog', 'aedificator'),             'description' => '',                                         'priority' => 160,));


	// Add Panels

	$wp_customize->add_panel('slider',                array('title' => __('Slider', 'aedificator' ),          'description' => __( 'Slides Details', 'aedificator' ),      'priority' => 140));
    $wp_customize->add_panel('homepage',              array('title' => __('Home Page', 'aedificator'),        'description' => '',                                         'priority' => 170,));

	// Panels Slider

	$wp_customize->add_section('slide1',              array('title' => __('Slide 1', 'aedificator'),          'description' => '',             'panel' => 'slider',		'priority' => 140,));
	$wp_customize->add_section('slide2',              array('title' => __('Slide 2', 'aedificator'),          'description' => '',             'panel' => 'slider',		'priority' => 140,));

	// Panels Home Page

	$wp_customize->add_section('barbelowslider',      array('title' => __('Bar Slider', 'aedificator'),        'description' => '',             'panel' => 'homepage',		 'priority' => 140,));
	$wp_customize->add_section('whoweare',            array('title' => __('Who We Are', 'aedificator'),        'description' => '',             'panel' => 'homepage',		 'priority' => 140,));
	$wp_customize->add_section('history',             array('title' => __('History Bar', 'aedificator'),       'description' => '',             'panel' => 'homepage',		 'priority' => 140,));




    // Add Control General Settings

	$wp_customize->add_setting('pwt_header_email',array(
			'default'	=> __('info@example.com','aedificator'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('pwt_header_email',array(
			'label'	=> __('Header Email','aedificator'),
			'section'	=> 'general',
			'setting'	=> 'pwt_header_email'
	));

	$wp_customize->add_setting('pwt_header_phone',array(
			'default'	=> __('+1 812-878-587','aedificator'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('pwt_header_phone',array(
			'label'	=> __('Header Phone','aedificator'),
			'section'	=> 'general',
			'setting'	=> 'pwt_header_phone'
	));

	$wp_customize->add_setting('pwt_copyrights',array(
			'default'	=> __('Copyright 2016 Aedificator Theme All Rights Reserved.','aedificator'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('pwt_copyrights',array(
			'label'	=> __('Copyrights Text','aedificator'),
			'section'	=> 'general',
			'setting'	=> 'pwt_copyrights'
	));

    // Add Control Blog Settings

	$wp_customize->add_setting('pwt_blog_page_title',array(
			'default'	=> __('Our Blog','aedificator'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('pwt_blog_page_title',array(
			'label'	=> __('Blog Page Title','aedificator'),
			'section'	=> 'blogpage',
			'setting'	=> 'pwt_blog_page_title'
	));

    // Add Control Slider

	$wp_customize->add_setting('pwt_slider_content1',array(
			'default'	=> 0,
			'sanitize_callback'	=> 'aedificator_sanitize_integer'

	));

	$wp_customize->add_control('pwt_slider_content1',array(
			'label'	=> __('Slider Content 1','aedificator'),
			'section'	=> 'slide1',
			'setting'	=> 'pwt_slider_content1',
			'type' => 'dropdown-pages'
	));

	$wp_customize->add_setting('pwt_slider_button_text_1',array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('pwt_slider_button_text_1',array(
			'label'	=> __('Slider Button Text','aedificator'),
			'section'	=> 'slide1',
			'setting'	=> 'pwt_slider_button_text_1'
	));


	$wp_customize->add_setting('pwt_slider_content2',array(
			'default'	=> 0,
			'sanitize_callback'	=> 'aedificator_sanitize_integer'

	));

	$wp_customize->add_control('pwt_slider_content2',array(
			'label'	=> __('Slider Content 2','aedificator'),
			'section'	=> 'slide2',
			'setting'	=> 'pwt_slider_content2',
			'type' => 'dropdown-pages'
	));

	$wp_customize->add_setting('pwt_slider_button_text_2',array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('pwt_slider_button_text_2',array(
			'label'	=> __('Slider Button Text','aedificator'),
			'section'	=> 'slide2',
			'setting'	=> 'pwt_slider_button_text_2'
	));


    // Add Control Home Page

	$wp_customize->add_setting('slider_bar_below',array(
			'default'	=> 0,
			'sanitize_callback'	=> 'aedificator_sanitize_integer'

	));

	$wp_customize->add_control('slider_bar_below',array(
			'label'	=> __('Slider Bar Below','aedificator'),
			'section'	=> 'barbelowslider',
			'setting'	=> 'slider_bar_below',
			'type' => 'dropdown-pages'
	));

	$wp_customize->add_setting('pwt_slider_bar_below_button_text',array(
			'default'	=> __('get a quote','aedificator'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('pwt_slider_bar_below_button_text',array(
			'label'	=> __('Slider Bar Below Button Text','aedificator'),
			'section'	=> 'barbelowslider',
			'setting'	=> 'pwt_slider_bar_below_button_text'
	));

	$wp_customize->add_setting('pwt_who_box1',array(
			'default'	=> 0,
			'sanitize_callback'	=> 'aedificator_sanitize_integer'

	));

	$wp_customize->add_control('pwt_who_box1',array(
			'label'	=> __('Who We Are Box 1','aedificator'),
			'section'	=> 'whoweare',
			'setting'	=> 'pwt_who_box1',
			'type' => 'dropdown-pages'
	));

	$wp_customize->add_setting('pwt_who_box2',array(
			'default'	=> 0,
			'sanitize_callback'	=> 'aedificator_sanitize_integer'

	));

	$wp_customize->add_control('pwt_who_box2',array(
			'label'	=> __('Who We Are Box 2','aedificator'),
			'section'	=> 'whoweare',
			'setting'	=> 'pwt_who_box2',
			'type' => 'dropdown-pages'
	));

	$wp_customize->add_setting('pwt_who_box3',array(
			'default'	=> 0,
			'sanitize_callback'	=> 'aedificator_sanitize_integer'

	));

	$wp_customize->add_control('pwt_who_box3',array(
			'label'	=> __('Who We Are Box 3','aedificator'),
			'section'	=> 'whoweare',
			'setting'	=> 'pwt_who_box3',
			'type' => 'dropdown-pages'
	));


	$wp_customize->add_setting('pwt_history',array(
			'default'	=> 0,
			'sanitize_callback'	=> 'aedificator_sanitize_integer'

	));

	$wp_customize->add_control('pwt_history',array(
			'label'	=> __('Bar History','aedificator'),
			'section'	=> 'history',
			'setting'	=> 'pwt_history',
			'type' => 'dropdown-pages'
	));

	$wp_customize->add_setting('pwt_history_button_text',array(
			'default'	=> __('Contact Us','aedificator'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('pwt_history_button_text',array(
			'label'	=> __('Bar History Button Text','aedificator'),
			'section'	=> 'history',
			'setting'	=> 'pwt_history_button_text'
	));

}
add_action( 'customize_register', 'aedificator_customize_register' );

function aedificator_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {  return intval( $input ); }
}
