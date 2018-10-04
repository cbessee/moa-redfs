<?php
/**
 * The template for displaying page NOT FOUND.
 *
 * @package Aedificator
 */
 get_header(); ?>
<section class="section section-page-title" <?php if(get_theme_mod('pwt_blog_image')) { ?> style="background-image: url('<?php echo esc_url(get_theme_mod('pwt_blog_image')); ?>')"  <?php }  else { ?> style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/demo/bgh.jpg" <?php }?>>
	<div class="section-overlay">
		<div class="container">
			<div class="gutter">
				<h4><?php _e( 'Not found', 'aedificator' ); ?></h4>
				<br/><br/><p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'aedificator' ); ?></p><br/><br/>
                <?php get_search_form(); ?>
			</div>
		</div> <!--  END container  -->
	</div> <!--  END section-overlay  -->
</section> <!--  END section-page-title  -->	
<?php get_footer(); ?>