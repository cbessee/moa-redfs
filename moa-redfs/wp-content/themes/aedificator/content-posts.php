<?php
/**
 *
 * @package Aedificator
 */
?>
<div class="section section-we-are">
	<div class="container">
		<div class="column-container blog-columns-container">
			<div class="column-9-12 left">
				<div class="gutter">
					<?php while (have_posts()) : the_post(); ?>
					<article class="article-blog">
					   <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
							<div class="article-image">
								<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('aedificator-photo-800-500'); ?></a>
							</div>
							<?php endif; ?>
							<div class="article-text">
								<p class="meta"><span class="column-3-12 left">
									<?php _e( 'Posted', 'aedificator' ); ?>
									<?php the_time(get_option( 'date_format' )); ?></span>
									<span class="column-9-12 right"><i class="fa fa-comment-o"></i><?php comments_popup_link( __('No comments', "aedificator"), __('1 comment', "aedificator"), __('% comments', "aedificator"), __('comments-link', "aedificator"), __( 'Comments are off', "aedificator")); ?>
								  <span class="separe">|</span><i class="fa fa-tag"></i><?php the_category(', '); ?></span>
								</p>
								<h2><a href="<?php the_permalink() ?>"><?php if(get_the_title($post->ID)) { the_title(); } else { the_time( get_option( 'date_format' ) ); } ?></a></h2>
								<p><?php the_excerpt(); ?></p>
								<a class="read-more" href="<?php the_permalink() ?>"><?php _e( 'read more', 'aedificator' ); ?></a>
							</div>
						</div>
					</article>
					<?php endwhile; ?>
					<p class="pagination">
						<span class="left button-gray"><?php next_posts_link(__('Previous Posts', 'aedificator')) ?></span>
						<span class="right button-gray"><?php previous_posts_link(__('Next posts', 'aedificator')) ?></span>
					</p>
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
