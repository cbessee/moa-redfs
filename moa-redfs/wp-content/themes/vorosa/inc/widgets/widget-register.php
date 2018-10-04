<?php 
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

 require get_template_directory() . '/inc/widgets/company-info-widget.php';
 require get_template_directory() . '/inc/widgets/recent-post.php';
 require get_template_directory() . '/inc/widgets/newsletter.php';
 require get_template_directory() . '/inc/widgets/author-info.php';
 require get_template_directory() . '/inc/widgets/video-popup.php';
 require get_template_directory() . '/inc/widgets/single-banner.php';

if(!function_exists('vorosa_widgets_init')){
	function vorosa_widgets_init() {
		register_sidebar( array(
			'name'          => esc_html__( 'Ritht Sidebar', 'vorosa' ),
			'id'            => 'sidebar-right',
			'description'   => esc_html__( 'Add widgets here.', 'vorosa' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="sidebar-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Left Sidebar', 'vorosa' ),
			'id'            => 'sidebar-left',
			'description'   => esc_html__( 'Add widgets here.', 'vorosa' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="sidebar-title">',
			'after_title'   => '</h3>',
		) );

		if(class_exists('Woocommerce')):
			register_sidebar( array(
				'name'          => esc_html__( 'Woocommerce', 'vorosa' ),
				'id'            => 'sidebar-shop',
				'description'   => esc_html__( 'Add widgets here.', 'vorosa' ),
				'before_widget' => '<div id="%1$s" class="sidebar-widget shop-widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="sidebar-title">',
				'after_title'   => '</h3>',
			) );
		endif;		

		$vorosa_opt = vorosa_get_opt();
		if(isset( $vorosa_opt['vorosa_footer_layoutcolumns'] ) ){
			$footer_widget_column = $vorosa_opt['vorosa_footer_layoutcolumns'];
		}else{
			$footer_widget_column = 4;
		}

		for( $footer = 1; $footer <= $footer_widget_column; $footer++){
			register_sidebar( array(
				'name'          => 'Footer ' .$footer,
				'id'            => 'vorosa-footer-' .$footer,
				'description'   => esc_html__( 'Add widgets here.', 'vorosa' ),
				'before_widget' => '<div id="%1$s" class="single-footer widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="footer-title">',
				'after_title'   => '</h4>',
			) );
		}
	}		 
}
add_action( 'widgets_init', 'vorosa_widgets_init' );