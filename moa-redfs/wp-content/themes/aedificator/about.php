<?php
/**
 * Aedificator About Theme
 *
 * @package Aedificator
 */
?>

<?php

// About theme info

add_action( 'admin_menu', 'aedificator_abouttheme' );

function aedificator_abouttheme() {

	add_theme_page( __('About Theme', 'aedificator'), __('About Theme', 'aedificator'), 'edit_theme_options', 'about-aedificator', 'aedificator_guide');

}

if( ! function_exists( 'admin_aedificator_enqueue_styles' ) ) {
	function admin_aedificator_enqueue_styles() {

		wp_enqueue_style( 'aedificator-style-admin', get_template_directory_uri() . '/assets/css/style-admin.css', array(), '1.0' );
	}
	add_action( 'admin_enqueue_scripts', 'admin_aedificator_enqueue_styles' );
}

//guidline for about theme

function aedificator_guide() {
?>
<div class="wrapper-info">
	<div class="aedifcator-box">
   		<div class="aedifcator-box-title">
			<?php esc_html_e('About Aedificator Theme', 'aedificator'); ?>
		</div>
		<p><?php esc_html_e('Aedificator is an awesome theme with fully responsive and compatible with newest version of WordPress, is easy to customizable, SEO Optimizable, Fast loading and an awesome panel options. Aedificator Theme is perfect for a construction business, but also for various other business or personal blog, The customization of this theme is very easy.','aedificator'); ?></p>
		<div class="proversion">
			<h3><?php esc_html_e('Upgrade to Pro version!', 'aedificator'); ?></h3>
				<a class="upgradepro" target="_blank" href="<?php echo esc_url('https://www.pwtthemes.com/theme/aedificator-responsive-wordpress-theme'); ?>" target="_blank"><?php esc_html_e('UPGRADE TO PRO', 'aedificator'); ?></a>
				<a class="livepreviw" target="_blank" href="<?php echo esc_url('https://www.pwtthemes.com/demo/aedificator'); ?>" target="_blank"><?php esc_html_e('LIVE PREVIEW', 'aedificator'); ?></a>
			  <p><?php esc_html_e('If you need assistance, please do not hesitate to', 'aedificator'); ?> <a target="_blank" href="<?php echo esc_url('http://www.pwtthemes.com/contact'); ?>"><?php esc_html_e('contact us', 'aedificator'); ?></a></p>
	        <h3><?php esc_html_e('FREE vs PRO', 'aedificator'); ?></h3>

    	</div>
		<a href="<?php echo esc_url('https://www.pwtthemes.com/theme/aedificator-responsive-wordpress-theme'); ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/demo/freevspro.jpg" alt="" /></a>
	</div>
</div>
<?php } ?>
