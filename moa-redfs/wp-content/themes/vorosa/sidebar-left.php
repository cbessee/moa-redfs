<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vorosa
 */

if ( ! is_active_sidebar( 'sidebar-left' ) ) {
	return;
}
$page_left_sidebar = get_post_meta( get_the_id(), '_vorosa_page_left_sidebar', true );
if(!empty($page_left_sidebar)){
	if(! is_active_sidebar( $page_left_sidebar )){
		return;
	}
} elseif(! is_active_sidebar( 'sidebar-left' )) {
	return;
}

?>

<aside id="secondary" class="widget-area sidebar-left">
	<?php
		if($page_left_sidebar){
			dynamic_sidebar( $page_left_sidebar );
		} else {
			dynamic_sidebar( 'sidebar-left' );
		}
	?>	
</aside><!-- #secondary -->