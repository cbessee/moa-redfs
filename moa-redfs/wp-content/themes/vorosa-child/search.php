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
					<?php
						if ( have_posts() ) : ?>
							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();
								/**
								 * Run the loop for the search to output the results.
								 * If you want to overload this in a child theme then include a file
								 * called content-search.php and that will be used instead.
								 */
								if(get_post_type() != 'staff-member') {
									get_template_part( 'template-parts/content', 'search' );
								}
							endwhile; ?>
							<div class="text-center">
								<?php vorosa_blog_pagination(); ?>
							</div> <?php
							else :
							get_template_part( 'template-parts/content', 'none' );
						endif; ?>
				</div>
				<div class="col-xs-12 col-sm-4">
					<?php get_sidebar('right'); ?>
				</div>
			</div><!-- #row -->
		</div><!-- #container -->
	</div><!-- #primary -->
<?php
get_footer();