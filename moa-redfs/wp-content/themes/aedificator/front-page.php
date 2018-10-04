<?php 
/**
 * 
 * @package Aedificator 
 */
get_header(); 
if ( have_posts() ) : 
if ( 'posts' == get_option( 'show_on_front')) {	
?>
<section class="section section-page-title" <?php if(get_theme_mod('pwt_blog_image')) { ?> style="background-image: url('<?php echo esc_url(get_theme_mod('pwt_blog_image')); ?>')"  <?php }  else { ?> style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/demo/bgh.jpg" <?php }?>>
	<div class="section-overlay">
		<div class="container">
			<div class="gutter">
			     <h4><?php echo esc_html(get_theme_mod('pwt_blog_page_title',__( 'Recent Articles', 'aedificator' ))); ?></h4>
			</div>
		</div> <!--  END container  -->
	</div> <!--  END section-overlay  -->
</section> <!--  END section-page-title  -->
<?php
	get_template_part( 'content', 'posts' ); 
} 
else {	
	get_template_part( 'content', 'home' ); 
} 
endif; 
get_footer(); ?>