<?php
/**
 * vorosa functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package vorosa
 */

if ( ! function_exists( 'vorosa_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function vorosa_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on vorosa, use a find and replace
	 * to change 'vorosa' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'vorosa', get_template_directory() . '/languages' );
	
	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style('css/editor-style.css');
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('vorosa_portfolio_img',630,410,true);
	add_image_size('vorosa_blog_img_mini',370,270,true);
	add_image_size('vorosa_blog_img',945,600,true);
	add_image_size('vorosa_event_img_mini',571,322,true);
	add_image_size('vorosa_event_img',870,500,true);
	add_image_size('vorosa_causes_img_mini',370,270,true);
	add_image_size('vorosa_causes_img',870,500,true);
	add_image_size('vorosa_avatar_size',120,120,true);
	add_image_size('vorosa_related_post_img_size',300,300,true);
	add_image_size('vorosa_recent_post_thumb_size',120,100,true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'        => esc_html__( 'Primary', 'vorosa' ),
		'onepage'        => esc_html__( 'One Page Menu', 'vorosa' ),
		'left-menu'      => esc_html__( 'Top Bar Left menu', 'vorosa' ),
		'right-menu' 	 => esc_html__( 'Top Bar Right menu', 'vorosa' ),
		'copyright-menu' => esc_html__( 'Footer Copyright Menu', 'vorosa' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'vorosa_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
	// woocommerce support
	add_theme_support( 'woocommerce' );
}
endif;
add_action( 'after_setup_theme', 'vorosa_setup' );

// woocommerce helper file
if( class_exists( 'woocommerce' ) ):
	require get_template_directory().'/inc/woocommerce.php';
endif;	


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */

 if ( !function_exists( 'vorosa_content_width')){
	 	function vorosa_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'vorosa_content_width', 640 );
	}
} 
add_action( 'after_setup_theme', 'vorosa_content_width', 0 );

/**
 * Register custom fonts.
 */
 if ( !function_exists( 'vorosa_fonts_url' ) ) :
function vorosa_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'vorosa' ) ) {
		$fonts[] = 'Open Sans:300,400,600,700';
	}

	/* translators: If there are characters in your language that are not supported by Raleway, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Roboto Slab font: on or off', 'vorosa' ) ) {
		$fonts[] = 'Roboto Slab:300,400,500,600,700,900';
	}
	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Enqueue scripts and styles.
 */
function vorosa_scripts() {
	
	wp_enqueue_style('vorosa-font',vorosa_fonts_url());
	wp_enqueue_style('bootstrap',get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style('font-awesome',get_template_directory_uri() . '/css/font-awesome.min.css');
	wp_enqueue_style('bicon',get_template_directory_uri() . '/css/bicon.min.css');
	wp_enqueue_style('magnific-popup',get_template_directory_uri() . '/css/magnific-popup.css');
	wp_enqueue_style('animate',get_template_directory_uri() . '/css/animate.css');
	wp_enqueue_style('slick',get_template_directory_uri() . '/css/slick.css');
	wp_enqueue_style('carousels',get_template_directory_uri() . '/css/owl.carousel.min.css');
	wp_enqueue_style('slick-theme',get_template_directory_uri() . '/css/slick-theme.css');
	wp_enqueue_style('mean-menu',get_template_directory_uri() . '/css/meanmenu.min.css');
	wp_enqueue_style( 'vorosa-style', get_stylesheet_uri() );
	wp_enqueue_style('vorosa-responsive',get_template_directory_uri() . '/css/responsive.css');
	// js file
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.6', true );
	wp_enqueue_script( 'scrollUp', get_template_directory_uri() . '/js/jquery.scrollUp.min.js', array('jquery'), '3.2', true );
	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array('jquery'), '1.1.0', true );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), '1.1.2', true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '1.1.4', true );
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow-min.js', array('jquery'), '1.1.5', true );
	wp_enqueue_script( 'imagesloaded');
	wp_enqueue_script( 'vorosa-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '', true );
	wp_enqueue_script( 'skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '', true );
	wp_enqueue_script( 'mean-menu', get_template_directory_uri() . '/js/jquery.meanmenu.min.js', array(), '', true );
	wp_enqueue_script( 'YTPlayer', get_template_directory_uri() . '/js/jquery.mb.YTPlayer.src.js', array(), '', true );
	wp_enqueue_script( 'masonry', get_template_directory_uri() . '/js/masonry.pkgd.min.js', array(), '', true );
	wp_enqueue_script( 'countdown', get_template_directory_uri() . '/js/countdown.min.js', array(), '', true );
	wp_enqueue_script( 'onepage-nav', get_template_directory_uri() . '/js/jquery.onepage.nav.js', array(), '', true );
	wp_enqueue_script( 'vorosa-main', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'vorosa_scripts' );

// vorosa Company Info widget js
if( !function_exists('vorosa_media_scripts') ) {
  function vorosa_media_scripts() {
	wp_enqueue_style( 'vorosa-wp-admin-css', get_template_directory_uri() . '/css/admin-style.css', false, '1.0.0' );
    wp_enqueue_media();
    wp_enqueue_script('vorosa-logo-uploader', get_template_directory_uri() .'/js/site-logo-uploader.js', false, '', true );
    wp_enqueue_script('vorosa-conditionals', get_template_directory_uri() .'/js/vorosa-conditionals.js', false, '', true );
  }
}
add_action('admin_enqueue_scripts', 'vorosa_media_scripts');
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
/*
	Load options framework
*/
require get_template_directory().'/inc/admin/option-framework.php';

/*
	Load metabox
*/
require get_template_directory().'/inc/metabox/metabox.php';
/*
/*
	Load metabox conditionals filed
*/
require get_template_directory().'/inc/metabox/conditionals-filed.php';
/*
	Load breadcrumb
*/
require get_template_directory().'/inc/breadcrumb/breadcrumb.php';

/*
	Load widget
*/
require get_template_directory().'/inc/widgets/widget-register.php';
/*
	Load custom function
*/
require get_template_directory().'/inc/tgm-plugin/required-plugins.php';
/*
	Load global function
*/
require get_template_directory().'/inc/global-functions.php';
/*
	Comment form
*/
require get_template_directory().'/inc/comment-form.php';

// demo import
require get_template_directory().'/inc/demo-import.php';

/*
 inline css form reduxframework
*/
require get_template_directory().'/inc/inline-css.php';

	//Content word count
	if(!function_exists('vorosa_read_more_text')){
		function vorosa_read_more_text($limit){
			$content = explode(' ', get_the_content());
			$count   = array_slice($content, 0 , $limit);
			echo implode (' ', $count);
		}
	}
	//blog pagination
	if(!function_exists('vorosa_blog_pagination')){
		function vorosa_blog_pagination(){
			?>
			<div class="post-pagination">
			<?php
				the_posts_pagination(array(
					'prev_text'          => '<i class="fa fa-angle-left"></i>',
					'next_text'          => '<i class="fa fa-angle-right"></i>',
					'screen_reader_text' => ' ',
					'type'               => 'list'
				));
				?>
				</div>
			<?php
		}
	}

	// Inline mobile menu
	if(!function_exists('vorosa_mobile_script')){
		function vorosa_mobile_script() {
	 		$vorosa_opt = vorosa_get_opt();
	 		if( isset( $vorosa_opt['vorosa_mobile_menu_width'] ) && !empty( $vorosa_opt['vorosa_mobile_menu_width'] ) ){
				$vorosa_mobile_menu = $vorosa_opt['vorosa_mobile_menu_width'];
			}else{
				$vorosa_mobile_menu = 991;
			}

		    $mobile_menu_arr = array(
		       "menu_width" => "$vorosa_mobile_menu"
		    );
		
		    wp_localize_script( "vorosa-main", "mobile_menu_data", $mobile_menu_arr );
		}
	}
	add_action( "wp_enqueue_scripts", "vorosa_mobile_script",100 );

	// fallback menu
	if( !function_exists('vorosa_fallback')){
	function vorosa_fallback( ) { 
		if(is_user_logged_in()):
	?>
	<ul>
		<li><a href="<?php echo esc_url( admin_url('nav-menus.php') ); ?>"><?php echo esc_html__('Create Menu','vorosa'); ?></a></li>
	</ul>
	<?php endif; } }

	// comment nav
	function vorosa_get_post_navigation(){
		if( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ):
			require( get_template_directory() . '/inc/comment-nav.php' );
		endif;
	}