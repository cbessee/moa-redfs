<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vorosa
 */


$vorosa_opt = vorosa_get_opt();
$vorosa_blog_excerpt_value = '';
$vorosa_blog_excerpt_value = isset($vorosa_opt['vorosa_blog_excerpt']) ? $vorosa_opt['vorosa_blog_excerpt'] : '';

$vorosa_blog_info_value = '';
$vorosa_blog_info_value = isset($vorosa_opt['vorosa_blog_info']) ? $vorosa_opt['vorosa_blog_info'] : '';

$blog_icon = isset($vorosa_opt['blog_Icon']) ? $vorosa_opt['blog_Icon'] : '' ;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="single-blog mb-30">

		<?php if(has_post_thumbnail()): ?>
			<div class="blog-img">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('vorosa_blog_img'); ?></a>
				<?php if ( !empty($blog_icon['url']) ): ?>
					<div class="blog-icon">
						<a class="blog-link" href="<?php the_permalink(); ?>">
							<img src="<?php echo wp_kses_post( $blog_icon['url'] ); ?>" alt="<?php esc_html_e('blog link image', 'vorosa'); ?>">
						</a>
					</div>
				<?php endif ?>
			</div>
		<?php endif; ?>

		<div class="blog-info blog-title">
			<span><?php echo get_the_date(); ?></span>
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<?php
				if ('show' ==$vorosa_blog_info_value) {
					?>
						<div class="blog-date">
							<span><i class="fa fa-calendar"></i> <?php echo get_the_time(get_option('date_format')); ?></span>
							<span><i class="fa fa-folder-o"></i> <?php the_author_posts_link(); ?></span>
							<span><i class="fa fa-comment"></i> <?php comments_popup_link(esc_html__('0','vorosa'),esc_html__('1','vorosa'),' ',esc_html__('Comments off','vorosa') );?> </span>
						</div>
					<?php
				}
				
			?>
			
			<?php

				if ('show' == $vorosa_blog_excerpt_value) {
					?>
					<p><?php echo wp_trim_words( get_the_content(), 20, '...' ); ?></p>
					<?php
				}

				wp_link_pages( array(
					'before'      => '<div class="pagination"><span class="page-links-title">' . esc_html__( 'Pages:', 'vorosa' ) . '</span>',
					'after'       => '</div>',
					'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'vorosa' ) . ' </span>%',
				) );
			?>
			<a href="<?php the_permalink(); ?>"><?php vorosa_read_more(); ?> <i class="fa fa-angle-right"></i></a>
		</div>




	</div>  

</article><!-- #post-## -->