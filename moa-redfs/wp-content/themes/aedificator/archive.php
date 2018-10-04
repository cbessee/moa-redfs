<?php
/**
 * The template for displaying archive
 *
 *
 * @package Aedificator
 */
get_header();
?>
<section class="section section-page-title" <?php if(get_theme_mod('pwt_blog_image')) { ?> style="background-image: url('<?php echo esc_url(get_theme_mod('pwt_blog_image')); ?>')"  <?php }  else { ?> style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/demo/bgh.jpg" <?php }?>>
	<div class="section-overlay">
		<div class="container">
			<div class="gutter">
			     <h4><?php the_arhive_title(); ?></h4>
			</div>
		</div> <!--  END container  -->
	</div> <!--  END section-overlay  -->
</section> <!--  END section-page-title  -->
<?php
get_template_part( 'content', 'posts' ); 
get_footer(); 
?>