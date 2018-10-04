<?php
/**
 * The template for displaying all pages.
 *
 *
 * @package Aedificator
 */
get_header(); ?>
<?php while (have_posts()) : the_post(); ?>  
<section class="section section-page-title" <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?> style="background-image: url('<?php echo esc_url(wp_get_attachment_url( get_post_thumbnail_id($post->ID))); ?>')"  <?php  endif; ?>>
	<div class="section-overlay">
		<div class="container">
			<div class="gutter">
				<h4><?php the_title(); ?></h4>
			</div>
		</div> <!--  END container  -->
	</div> <!--  END section-overlay  -->
</section> <!--  END section-page-title  -->
<div class="section section-we-are">
	<div class="container">
		<div class="column-container blog-columns-container">	
			<div class="column-9-12 left">
				<div class="gutter">
					<article class="single-post">								
						<div class="article-text">
							<?php the_content(); ?>	 															
						</div>
						<div class="padinate-page"><?php wp_link_pages(); ?></div> 						
					</article>
					<div class="comments">
						<?php comments_template(); ?>
					</div>
				</div>
			</div>
			<div class="column-3-12 right">
				<div class="gutter">
					<?php  get_sidebar(); ?>
				</div>
			</div>			
		</div>
	</div> <!--  END container  -->
</div> <!--  END section-blog  -->
<?php endwhile; ?>	
<?php get_footer(); ?>