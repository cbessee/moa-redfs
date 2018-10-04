<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package vorosa
 */
get_header(); 
?>
	<div class="our-blog-area">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-8">
					<div class="staff-grid">
					<?php
						if ( have_posts() ) : ?>
							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();
								if(get_post_type() == 'staff-member') {
									get_template_part( 'template-parts/staff', 'grid-member' );
								}
							endwhile; ?>
							<div class="text-center">
								<?php vorosa_blog_pagination(); ?>
							</div> <?php
							else :
							get_template_part( 'template-parts/content', 'none' );
						endif; ?>
						</div>
				</div>
				<div class="col-xs-12 col-sm-4">
					<?php get_sidebar('right'); ?>
				</div>
			</div><!-- #row -->
		</div><!-- #container -->
	</div><!-- #primary -->
<?php
get_footer();