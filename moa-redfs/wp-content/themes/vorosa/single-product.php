<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); 
$vorosa_opt = vorosa_get_opt();

$shoplayout = 'fullw';
if(isset($vorosa_opt['vorosa_shop_single_page_layout']) && $vorosa_opt['vorosa_shop_single_page_layout']!=''){
	$single_layout = $vorosa_opt['vorosa_shop_single_page_layout'];
}
$singleclass = 12;
switch($single_layout){
	case 'right':
	$singleclass = 9;
	break;
	case 'left':
	$singleclass = 9;
	break;
	default:
	$singleclass = 12;
} 
if(!is_active_sidebar('sidebar-shop')){
	
	$shopcolclass = 12;
}

?>

<div class="page-area ptb-120 single-product-area">
	<div class="container">
		<div class="row">
			<?php
				/**
				 * woocommerce_before_main_content hook.
				 *
				 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
				 * @hooked woocommerce_breadcrumb - 20
				 */
				remove_action('woocommerce_before_main_content','woocommerce_breadcrumb',20);
				do_action( 'woocommerce_before_main_content' );
			?>

			<div class="col-xs-12 col-sm-8 <?php echo 'col-md-'.$singleclass; ?> <?php echo wp_kses_post( $single_layout ) == 'left' ? 'pull-right' : ''; ?>">

				<?php while ( have_posts() ) : the_post(); 

					wc_get_template_part( 'content', 'single-product' ); 

				 endwhile; // end of the loop. ?>
				
			</div>				
			
			<?php 
				if($single_layout=='left'): ?>
				<div class="col-xs-12 col-sm-4 col-md-3">
				<?php /**
				 * woocommerce_sidebar hook.
				 *
				 * @hooked woocommerce_get_sidebar - 10
				 */
				do_action( 'woocommerce_sidebar' ); ?>
				</div>
				<?php endif; 

					if($single_layout=='right'): ?>
					<div class="col-xs-12 col-sm-4 col-md-3">
					<?php 
					/**
					 * woocommerce_sidebar hook.
					 *
					 * @hooked woocommerce_get_sidebar - 10
					 */
					do_action( 'woocommerce_sidebar' ); ?>
					</div>
					<?php endif;

				/**
				 * woocommerce_after_main_content hook.
				 *
				 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
				 */
				do_action( 'woocommerce_after_main_content' );
			?>
		</div>
	</div>
</div>

<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
