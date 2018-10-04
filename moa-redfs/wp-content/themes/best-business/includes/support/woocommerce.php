<?php
/**
 * WooCommerce support class.
 *
 * @package Best_Business
 */

/**
 * Woocommerce support class.
 *
 * @since 1.0.0
 */
class Best_Business_Woocommerce {

	/**
	 * Construcor.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		$this->init();

	}

	/**
	 * Initialize hooks.
	 *
	 * @since 1.0.0
	 */
	function init() {

		// Wrapper.
		remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
		remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
		add_action( 'woocommerce_before_main_content', array( $this, 'wrapper_start' ), 10 );
		add_action( 'woocommerce_after_main_content', array( $this, 'wrapper_end' ), 10 );

		// Breadcrumb.
		add_filter( 'woocommerce_breadcrumb_defaults', array( $this, 'custom_breadcrumbs_defaults' ) );
		add_action( 'wp', array( $this, 'hooking_woo' ) );

		// Sidebar.
		add_action( 'woocommerce_sidebar', array( $this, 'add_secondary_sidebar' ), 11 );

		// Remove archive title.
		add_filter( 'woocommerce_show_page_title', '__return_false' );

		// Remove product title.
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );

		// Modify global layout.
		add_filter( 'best_business_filter_theme_global_layout', array( $this, 'modify_global_layout' ), 15 );
	}

	/**
	 * Hooking Woocommerce.
	 *
	 * @since 1.0.0
	 */
	function hooking_woo() {
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

		if ( 'disabled' !== best_business_get_option( 'breadcrumb_type' ) && is_woocommerce() ) {
			add_action( 'best_business_add_breadcrumb', 'woocommerce_breadcrumb', 10 );
			remove_action( 'best_business_add_breadcrumb', 'best_business_add_breadcrumb', 10 );
		}

		// Fixing primary sidebar.
		$global_layout = best_business_get_option( 'global_layout' );
		$global_layout = apply_filters( 'best_business_filter_theme_global_layout', $global_layout );

		if ( in_array( $global_layout, array( 'no-sidebar' ), true ) ) {
			remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
		}
	}

	/**
	 * Modify global layout.
	 *
	 * @since 1.0.0
	 *
	 * @param string $layout Layout.
	 */
	function modify_global_layout( $layout ) {

		// Fix for shop page.
		if ( is_shop() && ( $shop_id = absint( wc_get_page_id( 'shop' ) ) ) > 0 ) {
			$post_options = get_post_meta( $shop_id, 'best_business_settings', true );
			if ( isset( $post_options['post_layout'] ) && ! empty( $post_options['post_layout'] ) ) {
				$layout = esc_attr( $post_options['post_layout'] );
			}
		}

		return $layout;

	}

	/**
	 * Add secondary sidebar in Woocommerce.
	 *
	 * @since 1.0.0
	 */
	function add_secondary_sidebar() {

		$global_layout = best_business_get_option( 'global_layout' );
		$global_layout = apply_filters( 'best_business_filter_theme_global_layout', $global_layout );

		switch ( $global_layout ) {
			case 'three-columns':
				get_sidebar( 'secondary' );
			break;

			default:
			break;
		}

	}

	/**
	 * Woocommerce content wrapper start.
	 *
	 * @since 1.0.0
	 */
	function wrapper_start() {
		echo '<div id="primary">';
		echo '<main role="main" class="site-main" id="main">';
	}

	/**
	 * Woocommerce content wrapper end.
	 *
	 * @since 1.0.0
	 */
	function wrapper_end() {
		echo '</main><!-- #main -->';
		echo '</div><!-- #primary -->';
	}

	/**
	 * Woocommerce breadcrumb defaults.
	 *
	 * @since 1.0.0
	 *
	 * @param array $defaults Breadcrumb defaults.
	 * @return array Modified breadcrumb defaults.
	 */
	function custom_breadcrumbs_defaults( $defaults ) {

		$defaults['delimiter']   = '';
		$defaults['wrap_before'] = '<div id="breadcrumb" itemprop="breadcrumb"><div class="container"><ul id="crumbs">';
		$defaults['wrap_after']  = '</ul></div></div>';
		$defaults['before']      = '<li>';
		$defaults['after']       = '</li>';
		$defaults['home']        = esc_html__( 'Home', 'best-business' );
		return $defaults;

	}
}

// Initialize.
$best_business_woocommerce = new Best_Business_Woocommerce();
