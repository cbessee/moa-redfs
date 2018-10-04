<?php
/**
* The template for displaying all single posts
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package vorosa
*/
get_header(); 
	if( have_posts() ) :
?>
<?php
	$causes_form_shortcode = get_post_meta(get_the_ID(),'_vorosa_causes_form_shortcode',true);
	$causes_form_link = get_post_meta(get_the_ID(),'_vorosa_causes_form_link',true);
	$causes_donate_option_select = get_post_meta(get_the_ID(),'_vorosa_donate_option_select',true);
	$causes_form_bitton_text = get_post_meta(get_the_ID(),'_vorosa_causes_form_button_text',true);
	$causes_form_box_additional_text = get_post_meta(get_the_ID(),'_vorosa_causes_form_additional_text',true);
?>				
<div class="page-area causes-all-area ptb-100">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-8">
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="causes-img-text">
						<?php if(has_post_thumbnail()): ?>
							<?php the_post_thumbnail('vorosa_causes_img'); ?>
						<?php endif; ?>
						<div class="causes-text">
							<?php the_content(); ?>
						</div>
					</div>
					<?php
				// End the loop.
				endwhile;
				?>
				<div class="row">
					<div class="col-xs-12 col-sm-12">
						<div class="donation-area">
							<?php
							if ( isset( $causes_donate_option_select ) && 'link' != $causes_donate_option_select ) { ?>
							<div class="donation-box">
								<?php if($causes_form_shortcode) : 
									if(function_exists('causes_form_shortcode_core')){
										causes_form_shortcode_core($causes_form_shortcode);
									} 
								endif; ?>
							</div>
							<?php } else { ?>
							<div class="donation-box ovh">
								<div class="give-btn-wrapper">
									<?php if ( isset( $causes_form_box_additional_text ) ) : ?>
									<h3><?php echo esc_html( $causes_form_box_additional_text ); ?></h3>
									<?php endif; ?>
									<a class="give-btn" href="<?php echo esc_url($causes_form_link); ?>"> <?php echo esc_html( $causes_form_bitton_text ); ?> </a> 
								</div>
							</div>
							<?php } ?>
						</div>
					</div>	
					<div class="clearfix"></div>	
					<div class="col-xs-12 col-sm-12">
					   <h2 class="sidebar-title related-post-title">
					    <?php esc_html_e( 'Related Causes', 'vorosa' ) ?>
					   </h2>							
					</div>
					<div class="clearfix"></div>
					<?php
			        $related = get_posts( array( 
			           'category__in' => wp_get_post_categories($post->ID),
			            'numberposts' => 3,
			            'post_type' => 'causes', 
			            'post__not_in' => array($post->ID) 
			        ) );
			        if( $related ) foreach( $related as $post ) { 
			        setup_postdata($post); ?>
					<div class="col-xs-12 col-sm-6 col-md-4">
						<div class="related-causes single-causes mb-30">
							<?php if(has_post_thumbnail()): ?>
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('vorosa_causes_img'); ?>
								</a>
							<?php endif; ?>
							<div class="causes-info">
								<h2 class="give-form-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<div class="causes-post-time">
									<p><?php the_time('F j, Y'); ?></p>
								</div>
								<?php if ( isset( $causes_form_bitton_text ) ) : ?>
								<div class="give-btn-wrapper">
									<a class="give-btn" href="<?php the_permalink(); ?>"><?php echo esc_html( $causes_form_bitton_text ); ?></a>
								</div>
								<?php endif; ?>
							</div>
						</div>					
					</div>
					<?php } ?>				
				</div>
			</div>
			<div class="col-xs-12 col-sm-4">
				<?php get_sidebar('right'); ?>		
			</div>
		</div>
	</div>
</div>
<?php endif;
get_footer();