<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package vorosa
 */

get_header(); 
	$vorosa_opt = vorosa_get_opt();
	$vorosa_blog_single = '';
	$vorosa_blog_single = isset($vorosa_opt ['vorosa_single_pos']) ? $vorosa_opt ['vorosa_single_pos'] : '';
	$post_layout_value = get_post_meta(get_the_id(),'_vorosa_post_layout',true);
	if( !empty( $post_layout_value ) ){
		$post_details_layout = $post_layout_value ;
	}else{
		$post_details_layout = $vorosa_blog_single;
	}
	
?>
	<div class="blog-story-area pt-80">
		<div class="container">
			<div class="row">
				<?php if( $post_details_layout == 'full'){ ?>
				<!-- single blog full width start -->
				<div class="col-sm-10 col-sm-offset-1">
          <?php the_content(); ?>
				</div>
				<!--single blog full width end -->
				<?php }elseif( $post_details_layout == 'left'){ ?>
				<!-- single blog left sidebar start -->
				<div class="col-xs-12 col-sm-8 pull-right">
          <?php the_content(); ?>

				</div>				
				<div class="col-xs-12 col-sm-4">
					<?php get_sidebar('left'); ?>
				</div>
				<!-- single blog left sidebar end -->
				<?php }else{ ?>
				<!-- single blog right sidebar start -->
				<div class="col-xs-12 col-sm-8">
          <?php the_content(); ?>
				</div>
				<div class="col-xs-12 col-sm-4">
					<?php get_sidebar('right'); ?>
				</div>
				<!--single blog right sidebar end -->
				<?php }	?>
			</div>
		</div>
	</div>
<?php
get_footer();