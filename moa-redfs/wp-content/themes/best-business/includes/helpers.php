<?php
/**
 * Helper functions.
 *
 * @package Best_Business
 */

if ( ! function_exists( 'best_business_get_global_layout_options' ) ) :

	/**
	 * Returns global layout options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function best_business_get_global_layout_options() {
		$choices = array(
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'best-business' ),
			'right-sidebar' => esc_html__( 'Right Sidebar', 'best-business' ),
			'three-columns' => esc_html__( 'Three Columns', 'best-business' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'best-business' ),
		);
		return $choices;
	}

endif;

if ( ! function_exists( 'best_business_get_breadcrumb_type_options' ) ) :

	/**
	 * Returns breadcrumb type options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function best_business_get_breadcrumb_type_options() {
		$choices = array(
			'disabled' => esc_html__( 'Disabled', 'best-business' ),
			'enabled'  => esc_html__( 'Enabled', 'best-business' ),
		);
		return $choices;
	}

endif;


if ( ! function_exists( 'best_business_get_archive_layout_options' ) ) :

	/**
	 * Returns archive layout options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function best_business_get_archive_layout_options() {
		$choices = array(
			'full'    => esc_html__( 'Full Post', 'best-business' ),
			'excerpt' => esc_html__( 'Post Excerpt', 'best-business' ),
		);
		return $choices;
	}

endif;

if ( ! function_exists( 'best_business_get_image_sizes_options' ) ) :

	/**
	 * Returns image sizes options.
	 *
	 * @since 1.0.0
	 *
	 * @param bool  $add_disable    True for adding No Image option.
	 * @param array $allowed        Allowed image size options.
	 * @param bool  $show_dimension True for showing dimension.
	 * @return array Image size options.
	 */
	function best_business_get_image_sizes_options( $add_disable = true, $allowed = array(), $show_dimension = true ) {

		global $_wp_additional_image_sizes;

		$choices = array();

		if ( true === $add_disable ) {
			$choices['disable'] = esc_html__( 'No Image', 'best-business' );
		}

		$choices['thumbnail'] = esc_html__( 'Thumbnail', 'best-business' );
		$choices['medium']    = esc_html__( 'Medium', 'best-business' );
		$choices['large']     = esc_html__( 'Large', 'best-business' );
		$choices['full']      = esc_html__( 'Full (original)', 'best-business' );

		if ( true === $show_dimension ) {
			foreach ( array( 'thumbnail', 'medium', 'large' ) as $key => $_size ) {
				$choices[ $_size ] = $choices[ $_size ] . ' (' . get_option( $_size . '_size_w' ) . 'x' . get_option( $_size . '_size_h' ) . ')';
			}
		}

		if ( ! empty( $_wp_additional_image_sizes ) && is_array( $_wp_additional_image_sizes ) ) {
			foreach ( $_wp_additional_image_sizes as $key => $size ) {
				$choices[ $key ] = $key;
				if ( true === $show_dimension ) {
					$choices[ $key ] .= ' (' . $size['width'] . 'x' . $size['height'] . ')';
				}
			}
		}

		if ( ! empty( $allowed ) ) {
			foreach ( $choices as $key => $value ) {
				if ( ! in_array( $key, $allowed, true ) ) {
					unset( $choices[ $key ] );
				}
			}
		}

		return $choices;

	}

endif;

if ( ! function_exists( 'best_business_get_image_alignment_options' ) ) :

	/**
	 * Returns image alignment options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function best_business_get_image_alignment_options() {
		$choices = array(
			'none'   => esc_html_x( 'None', 'alignment', 'best-business' ),
			'left'   => esc_html_x( 'Left', 'alignment', 'best-business' ),
			'center' => esc_html_x( 'Center', 'alignment', 'best-business' ),
			'right'  => esc_html_x( 'Right', 'alignment', 'best-business' ),
		);
		return $choices;
	}

endif;

if ( ! function_exists( 'best_business_get_featured_slider_transition_effects' ) ) :

	/**
	 * Returns the featured slider transition effects.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function best_business_get_featured_slider_transition_effects() {
		$choices = array(
			'fade'       => esc_html_x( 'fade', 'transition effect', 'best-business' ),
			'fadeout'    => esc_html_x( 'fadeout', 'transition effect', 'best-business' ),
			'none'       => esc_html_x( 'none', 'transition effect', 'best-business' ),
			'scrollHorz' => esc_html_x( 'scrollHorz', 'transition effect', 'best-business' ),
		);
		ksort( $choices );
		return $choices;
	}

endif;

if ( ! function_exists( 'best_business_get_featured_slider_content_options' ) ) :

	/**
	 * Returns the featured slider content options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function best_business_get_featured_slider_content_options() {
		$choices = array(
			'home-page' => esc_html__( 'Static Front Page', 'best-business' ),
			'disabled'  => esc_html__( 'Disabled', 'best-business' ),
		);
		return $choices;
	}

endif;

if ( ! function_exists( 'best_business_get_featured_slider_type' ) ) :

	/**
	 * Returns the featured slider type.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function best_business_get_featured_slider_type() {
		$choices = array(
			'featured-page' => esc_html__( 'Featured Pages', 'best-business' ),
		);
		return $choices;
	}

endif;
