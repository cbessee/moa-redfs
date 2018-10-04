<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vorosa
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>
	<?php

		$vorosa_opt = vorosa_get_opt();

		$vorosa_layout_width = isset($vorosa_opt['vorosa_layout_width']) ? $vorosa_opt['vorosa_layout_width'] : '';
		
		if ( isset( $vorosa_layout_width ) ) {
			$vorosa_layout_width_value = $vorosa_layout_width;
		} else {
			$vorosa_layout_width_value = $vorosa_layout_width;
		};
		
	// transparent header
	$transparent_class_val = '';

	$transparent_class = isset($vorosa_opt['vorosa_header_transparent']) ? $vorosa_opt['vorosa_header_transparent'] : '' == true ? 'header-transparent' : '';

	$page_transparent_class = get_post_meta(get_the_id(),'_vorosa_page_menu_transparent',true);


	if ( $page_transparent_class ) {
		if ( '' != $page_transparent_class ) {
			$transparent_class_val = $page_transparent_class;
		}
	} else {
		if ( isset( $transparent_class ) ) {
			$transparent_class_val = $transparent_class;
		}
	}

	$enable_top_bar_value = '';
	$enable_top_bar = get_post_meta(get_the_id(),'_vorosa_page_topbar_status', true);
	$vorosa_header_show = ( isset($vorosa_opt['vorosa_header_show']) ? $vorosa_opt['vorosa_header_show'] : '' == true ) ? 'yes' : 'no' ;

	if ( $enable_top_bar && 'default' == $enable_top_bar ) {
		$enable_top_bar_value = $vorosa_header_show;
	} elseif( 'yes' == $enable_top_bar ) {
		$enable_top_bar_value = $enable_top_bar;
	} else {
		$enable_top_bar_value = $enable_top_bar;
	}

	
	?>
<body <?php body_class(); ?>>

	<div id="page" class="site site-wrapper <?php echo esc_attr( $vorosa_layout_width_value ); ?>">
		<div id="vorosa">
			<header class="<?php echo esc_attr( $transparent_class_val ); ?>">
				<?php 


					if ( isset( $enable_top_bar_value ) && 'yes' == $enable_top_bar_value ) {
						get_template_part('/inc/header/header-top-bar');
					}
				

					$menu_style = get_post_meta(get_the_id(),'_vorosa_page_menu_style',true);
					
					 $style = isset($vorosa_opt['vorosa_header_layout']) ? $vorosa_opt['vorosa_header_layout'] : '';
					
					if( $menu_style != 'none' && !is_front_page()){
						$style = $menu_style;
					}

					switch($style){
						case 1:
						get_template_part('/inc/header/header-1');
						break;
						
						case 2:
						get_template_part('/inc/header/header-2');
						break;
						
						case 3:
						get_template_part('/inc/header/header-3');
						break;
						
						case 4:
						get_template_part('/inc/header/header-4');
						break;
						
						case 5:
						get_template_part('/inc/header/header-5');
						break;
						
						default:
						get_template_part('/inc/header/header-default');
						  break;
					}

				?>
				
			</header>
		<div id="content" class="site-content">
		<?php get_template_part('/inc/breadcrumb/header-page-title'); ?>