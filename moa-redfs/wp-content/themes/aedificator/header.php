<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Aedificator
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="wrapper" class="wrapper">
		<header id="header" class="header">
			<div class="top-bar">
				<div class="container">
					<div class="column-container top-bar-container">
						<div class="column-6-12 left">
							<div class="gutter">
								<p class="wellcome-user"><?php bloginfo( 'name' ); ?></p>
							</div>
						</div>
						<div class="column-6-12 right">
							<div class="gutter">
								<p class="contact-information">
								    <a class="icon-envelope" href="mailto:<?php echo antispambot(sanitize_email(get_theme_mod('pwt_header_email',__( 'info@example.com', 'aedificator' )))); ?>"><?php echo antispambot(sanitize_email(get_theme_mod('pwt_header_email',__( 'info@example.com', 'aedificator' )))); ?></a>
									<a class="icon-phone" href="tel:<?php echo esc_html(get_theme_mod('pwt_header_phone',__( '+80 12-878-587', 'aedificator' ))); ?>"><?php echo esc_html(get_theme_mod('pwt_header_phone',__( '+1 802-878-587', 'aedificator' ))); ?></a>
								</p>
							</div>
						</div>
					</div>
				</div> <!--  END container  -->	
			</div> <!--  END top-bar  -->
			<div class="header-block">
				<div class="container">
					<div class="gutter clearfix">
					    <?php aedificator_the_custom_logo(); ?>	
						<nav class="menu-top-container">
							<a class="icon-menu" href="#"><?php _e( 'Menu', 'aedificator' ); ?></a>
							<?php if ( has_nav_menu( 'aedificator-menu' ) ) { ?>
							   <?php wp_nav_menu( array('container'=> '', 'theme_location' => 'aedificator-menu', 'items_wrap'  => '<ul class="menu-top">%3$s</ul>'  ) ); ?>
							   <?php wp_nav_menu( array('container'=> '', 'theme_location' => 'aedificator-menu', 'items_wrap'  => '<ul class="menu-top-mob">%3$s</ul>'  ) ); ?>
							<?php } else { ?>
								<?php wp_nav_menu(  array('container'=> '', 'menu_class'  => 'menu-top', 'items_wrap'  => '<ul class="menu-top">%3$s</ul>' ) ); ?>
								<?php wp_nav_menu(  array('container'=> '', 'menu_class'  => 'menu-top-mob', 'items_wrap'  => '<ul class="menu-top-mob">%3$s</ul>' ) ); ?>									
							<?php } ?>							
						</nav> <!--  END menu-top-container  -->
					</div>
				</div> <!--  END container  -->	
			</div> <!--  END header-block  -->
		</header> <!--  END header  -->
	<div id="content" class="content">