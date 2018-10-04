<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Best_Business
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	/**
	 * Hook - best_business_single_image.
	 *
	 * @hooked best_business_add_image_in_single_display - 10
	 */
	do_action( 'best_business_single_image' );
	?>
	<header class="entry-header">
		<div class="entry-meta">
			<?php best_business_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'best-business' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php best_business_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->

