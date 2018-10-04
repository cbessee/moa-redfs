<?php
/**
 *
 * @package Aedificator
 */
 get_header(); ?>
 <?php while (have_posts()) : the_post(); ?>
		<section class="section section-page-title" <?php if(get_theme_mod('pwt_blog_image')) { ?> style="background-image: url('<?php echo esc_url(get_theme_mod('pwt_blog_image')); ?>')"  <?php }  else { ?> style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/demo/bgh.jpg" <?php }?>>
			<div class="section-overlay">
				<div class="container">
					<div class="gutter">
						 <h4><?php echo esc_html(get_theme_mod('pwt_blog_page_title',__( 'Recent Articles', 'aedificator' ))); ?></h4>
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
								<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
								<div class="article-image">
									<?php the_post_thumbnail('aedificator-photo-800-500'); ?>
								</div>						
								<?php endif; ?>								
								<div class="article-text">
									<p class="meta"><span class="column-3-12 left"><?php _e( 'Posted', 'aedificator' ); ?> <?php the_time(get_option( 'date_format' )); ?></span><span class="column-9-12 right"><i class="fa fa-comment-o"></i><?php comments_popup_link( 'No comments', '1 comment', '% comments', 'comments-link', 'Comments are off'); ?> <span class="separe">|</span> <i class="fa fa-tag"></i><?php the_category(', '); ?></span></p>
									<h2><?php the_title(); ?></h2>
									<?php the_content(); ?>
									<p class="tags"><span><?php _e( 'Tags:', 'aedificator' ); ?></span> <?php the_tags(); ?></p>
                                    <p><?php wp_link_pages(); ?></p>
								</div>
								<div class="comments">
									<?php comments_template(); ?>
								</div>
							</article>
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