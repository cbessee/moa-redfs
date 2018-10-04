<?php
/**
 * Template Name: Both Sidebar
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vorosa
 */
get_header();
?>
	<div class="page-area ptb-80">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-3">
					<?php get_sidebar('left'); ?>
				</div>
				<div class="col-xs-12 col-sm-6">
					<?php
						while ( have_posts() ) : the_post();
							the_content();
						endwhile; // End of the loop.
					?>
				</div>
				<div class="col-xs-12 col-sm-3">
					<?php get_sidebar('right'); ?>
				</div>
			</div>
		</div><!-- #primary -->
	</div><!-- #primary -->
<?php

get_footer();