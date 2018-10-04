<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vorosa
 */

get_header();
?>
	<div class="our-blog-area pt-80 pb-60">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-8">
				<?php
					if ( have_posts() ) : ?>
					<div class="clearfix"></div>
					<?php
						get_template_part( 'template-parts/content', get_post_format() );
					else :
					get_template_part( 'template-parts/content', 'none' );
					endif; ?>
				</div>
				<div class="col-xs-12 col-sm-4">
					<?php get_sidebar('right'); ?>
				</div>	
			</div><!-- #main -->
		</div><!-- #primary -->
	</div><!-- #primary -->
<?php
get_footer();
