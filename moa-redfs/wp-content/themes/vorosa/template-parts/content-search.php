<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vorosa
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="single-blog mb-30">
		<?php if(has_post_thumbnail()): ?>
		<div class="bolg-img">
			<a href="<?php echo esc_url( get_the_permalink() ); ?>">
				<?php the_post_thumbnail( 'vorosa_blog_img' ); ?>
			</a>
		</div>
		<?php endif; ?>
		<div class="blog-text">
			<h2><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h2>
			<div class="blog-date">
				<span><i class="fa fa-calendar"></i> <?php echo get_the_time(get_option('date_format')); ?></span>
				<span><i class="fa fa-folder-o"></i> <?php the_author_posts_link(); ?></span>
				<span><i class="fa fa-comment"></i> <?php comments_popup_link(esc_html__('0','vorosa'),esc_html__('1','vorosa'),' ',esc_html__('Comments off','vorosa') );?> </span>

			</div>
			<p><?php vorosa_post_excerpt();		
					wp_link_pages( array(
						'before'      => '<div class="pagination"><span class="page-links-title">' . esc_html__( 'Pages:', 'vorosa' ) . '</span>',
						'after'       => '</div>',
						'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'vorosa' ) . ' </span>%',
					) );
			 ?></p>
			<a class="blog-read-more" href="<?php echo esc_url(get_the_permalink()); ?>"><?php vorosa_read_more(); ?></a>
		</div>
	</div>
</article><!-- #post-## -->