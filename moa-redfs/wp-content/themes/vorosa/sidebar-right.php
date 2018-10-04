<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vorosa
 */
$page_right_sidebar = get_post_meta( get_the_id(), '_vorosa_page_right_sidebar', true );

if(!empty($page_right_sidebar)){
	if(! is_active_sidebar( $page_right_sidebar )){
		return;
	}
} elseif(! is_active_sidebar( 'sidebar-right' )) {
	return;
}

?>

<aside id="secondary" class="widget-area sidebar-right">
	<?php
		if($page_right_sidebar){
			dynamic_sidebar( $page_right_sidebar );
		} else {
			dynamic_sidebar( 'sidebar-right' );
		}
	?>
</aside><!-- #secondary -->