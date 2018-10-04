<?php 
/**
 * 
 * @package Aedificator 
 */
?>	
<?php if( get_theme_mod('pwt_slider_content1') or get_theme_mod('pwt_slider_content2')) { ?>
<div class="owl-carousel welcome-carousel">
	<?php 
	if( get_theme_mod('pwt_slider_content1')) { 
	$queryslider = new WP_query('page_id='.get_theme_mod('pwt_slider_content1' ,true)); 
	while( $queryslider->have_posts() ) : $queryslider->the_post();
	?>
	<div class="item animate-top-down"  <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?> style="background-image: url('<?php echo esc_url(wp_get_attachment_url( get_post_thumbnail_id($post->ID))); ?>')"  <?php  endif; ?>>
		<div class="container">
			<div class="gutter clearfix">
				<div class="welcome-text column-5-12 center">
					<h6>
					<span class="xx-large"><?php the_title(); ?></span>
					</h6>
					<p><?php the_excerpt(); ?></p>
					<?php if(get_theme_mod('pwt_slider_button_text_1')) { ?><a class="button" href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('pwt_slider_button_text_1')); ?></a><?php } ?>
				</div>
			</div>
		</div>
	</div>	
	<?php endwhile; wp_reset_postdata(); ?>
	<?php } ?>
	<?php 
	if( get_theme_mod('pwt_slider_content2')) { 
	$queryslider = new WP_query('page_id='.get_theme_mod('pwt_slider_content2' ,true)); 
	while( $queryslider->have_posts() ) : $queryslider->the_post();
	?>
	<div class="item animate-top-down"  <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?> style="background-image: url('<?php echo esc_url(wp_get_attachment_url( get_post_thumbnail_id($post->ID))); ?>')"  <?php  endif; ?>>
		<div class="container">
			<div class="gutter clearfix">
				<div class="welcome-text column-5-12 center">
					<h6>
					<span class="xx-large"><?php the_title(); ?></span>
					</h6>
					<p><?php the_excerpt(); ?></p>
					<?php if(get_theme_mod('pwt_slider_button_text_2')) { ?><a class="button" href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('pwt_slider_button_text_2')); ?></a><?php } ?>
				</div>
			</div>
		</div>
	</div>	
	<?php endwhile; wp_reset_postdata(); ?>
	<?php } ?>
</div> <!--  END welcome-carousel  -->
<?php }  ?>
<?php 
if( get_theme_mod('slider_bar_below')) { 
$queryslider = new WP_query('page_id='.get_theme_mod('slider_bar_below' ,true)); 
while( $queryslider->have_posts() ) : $queryslider->the_post();
?> 		
<div class="section section-get-quote">
	<div class="container">
		<div class="gutter">
			<div class="get-quote-block" <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?> style="background-image: url('<?php echo esc_url(wp_get_attachment_url( get_post_thumbnail_id($post->ID))); ?>')"  <?php  endif; ?>>
				<div class="section-overlay">
					<p><?php the_title(); ?></p>
					<a class="button" href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('pwt_slider_bar_below_button_text',__( 'get a quote', 'aedificator' ))); ?></a>
				</div>
			</div>
		</div>
	</div> <!--  END container  -->
</div> <!--  END section-get-quote  -->		
<?php endwhile; wp_reset_postdata(); ?>
<?php } ?>
<div class="section section-we-are">
	<div class="container">
		<div class="column-container we-are-container">
			<?php 
			if( get_theme_mod('pwt_who_box1')) { 
			$queryslider = new WP_query('page_id='.get_theme_mod('pwt_who_box1' ,true)); 
			while( $queryslider->have_posts() ) : $queryslider->the_post();
			?> 		
			<div class="column-4-12">
				<div class="gutter">
					<article class="article-we-are">
					    <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
						<div class="article-image">
							<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url(wp_get_attachment_url( get_post_thumbnail_id($post->ID))); ?>" alt="" /></a>
							<a class="fa fa-link" href="<?php the_permalink(); ?>"></a>
						</div>
						<?php  endif; ?>
						<div class="article-text">
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<p><?php the_excerpt(); ?></p>
						</div>
					</article>
				</div>
			</div>			
			<?php endwhile; wp_reset_postdata(); ?>
			<?php } ?>
			<?php 
			if( get_theme_mod('pwt_who_box2')) { 
			$queryslider = new WP_query('page_id='.get_theme_mod('pwt_who_box2' ,true)); 
			while( $queryslider->have_posts() ) : $queryslider->the_post();
			?> 		
			<div class="column-4-12">
				<div class="gutter">
					<article class="article-we-are">
					    <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
						<div class="article-image">
							<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url(wp_get_attachment_url( get_post_thumbnail_id($post->ID))); ?>" alt="" /></a>
							<a class="fa fa-link" href="<?php the_permalink(); ?>"></a>
						</div>
						<?php  endif; ?>
						<div class="article-text">
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<p><?php the_excerpt(); ?></p>
						</div>
					</article>
				</div>
			</div>			
			<?php endwhile; wp_reset_postdata(); ?>
			<?php } ?>
			<?php 
			if( get_theme_mod('pwt_who_box3')) { 
			$queryslider = new WP_query('page_id='.get_theme_mod('pwt_who_box3' ,true)); 
			while( $queryslider->have_posts() ) : $queryslider->the_post();
			?> 		
			<div class="column-4-12">
				<div class="gutter">
					<article class="article-we-are">
					    <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
						<div class="article-image">
							<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url(wp_get_attachment_url( get_post_thumbnail_id($post->ID))); ?>" alt="" /></a>
							<a class="fa fa-link" href="<?php the_permalink(); ?>"></a>
						</div>
						<?php  endif; ?>
						<div class="article-text">
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<p><?php the_excerpt(); ?></p>
						</div>
					</article>
				</div>
			</div>			
			<?php endwhile; wp_reset_postdata(); ?>
			<?php } ?>			
		</div>
	</div> <!--  END container  -->
</div> <!--  END section-we-are  -->
<?php 
if( get_theme_mod('pwt_history')) { 
$queryslider = new WP_query('page_id='.get_theme_mod('pwt_history' ,true)); 
while( $queryslider->have_posts() ) : $queryslider->the_post();
?> 	
<section class="section section-starting-point" <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?> style="background-image: url('<?php echo esc_url(wp_get_attachment_url( get_post_thumbnail_id($post->ID))); ?>')"  <?php  endif; ?>>
	<div class="section-overlay">
		<div class="container">
			<div class="gutter">
				<div class="starting-point">
					<h4><?php the_title(); ?></h4>
					<p class="italic"><?php the_excerpt(); ?></p>					
					<a class="button" href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('pwt_history_button_text',__( 'Contact Us', 'aedificator' ))); ?></a>
				</div>
			</div>
		</div> <!--  END container  -->
	</div> <!--  END section-overlay  -->
</section> <!--  END section-starting-point  -->		
<?php endwhile; wp_reset_postdata(); ?>
<?php } ?>
<?php while (have_posts()) : the_post(); ?>  
<div class="section section-we-are">
	<div class="container">
		<div class="column-container blog-columns-container">	
			<div class="column-12-12 left">
				<div class="gutter">
					<article class="single-post">								
						<div class="article-text">
							<?php the_content(); ?>	 															
						</div>			
					</article>
				</div>
			</div>			
		</div>
	</div> <!--  END container  -->
</div> <!--  END section-blog  -->
<?php endwhile; ?>	
<section class="section section-latest-news">
	<div class="container">
		<div class="gutter">
			<h4><?php echo esc_html(get_theme_mod('pwt_blog_page_title',__( 'Recent Articles', 'aedificator' ))); ?></h4>
		</div>
		<div class="column-container latest-news-container">
			<?php 
			$i=0;
			$aedificator_get_list_posts = aedificator_get_list_posts(3);
			while ( $aedificator_get_list_posts->have_posts() ) {
			$aedificator_get_list_posts->the_post(); $i++;
			if($i<=3) {
			?>	
			<div class="column-4-12">
				<div class="gutter">
					<article class="article-latest-news">
						<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
						<div class="article-image">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('aedificator-photo-360-240'); ?></a>
							<a class="fa fa-link" href="<?php the_permalink(); ?>"></a>
						</div>
						<?php endif; ?>
						<div class="article-text">
							<p class="meta"><?php _e( 'Posted', 'aedificator' ); ?> <?php the_time(get_option( 'date_format')); ?></p>
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<?php the_excerpt(); ?>
							<a class="read-more" href="<?php the_permalink(); ?>"><?php _e( 'read more', 'aedificator' ); ?></a>
						</div>
					</article>
				</div>
			</div>					
			<?php }} ?>			
		</div>
	</div> <!--  END container  -->
</section> <!--  END section-latest-news  -->